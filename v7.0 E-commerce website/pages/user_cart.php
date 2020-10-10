<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>EcartBooks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="index-page sidebar-collapse">
    <div class="wrapper"><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>       <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 $cid=$row['user_id'];
                                 echo $row['firstname'];
                                ?>'s Shopping Cart
                      </h2>
                      <a class="btn btn-primary btn-round" href="user_index.php"><i class="now-ui-icons shopping_basket"></i> &nbsp Shop more items</a>
                      <hr color="orange"> 
                
                <div class="col-md-12">
                <br>
            
                <div class="panel panel-success panel-size-custom">
                        <div class="panel-body">



      <?php 
        $user_id = $_SESSION['id'];

        $query3=mysqli_query($dbconn,"SELECT * FROM order_details WHERE user_id='$user_id' AND order_id=''") or die (mysql_error());
        $count2=mysqli_num_rows($query3);
      ?>

  <form method="post" action="user_payment.php">

   

    <h5>[ <small><?php echo $count2;?> </small>] types of item.</h5>  

      <table class="table table-condensed table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th width="100">Quantity</th>
                  <th width="100">Price(Php)</th>
                  <th width="100">Total(Php)</th>
                  <th width="100">Option</th>
                </tr>
              </thead>

              <tbody>

          <?php 
            $query=mysqli_query($dbconn,"SELECT * FROM order_details WHERE user_id='$user_id' and order_id=''") or die (mysqli_error());
            while($row=mysqli_fetch_array($query)){
            $count=mysqli_num_rows($query);
            $prod_id=$row['prod_id'];

            $query2=mysqli_query($dbconn,"SELECT * FROM products WHERE prod_id='$prod_id'") or die (mysqli_error());
            $row2=mysqli_fetch_array($query2);
          ?>

              <tr>
                  <td> <img width="150" height="100" src="../uploads/<?php echo $row2['prod_pic1'];?>" alt=""/></td>
                  <td><b><?php echo $row2['prod_name'];?></b><br><br>
                    <?php echo $row2['prod_desc'];
                    ?>
                  </td>
                  <td><br><?php  echo $row['prod_qty']; ?></td>
                  <td><br><?php  echo $row2['prod_price']; ?></td>
                  <td><br><?php echo $row['total'];?></td>
                  <td>     
                    <a href="edit_order_details.php?order_id=<?php echo $row['order_details_id'];?>" ><button class="btn btn-warning btn-round" type="button">update qty</button></a>
                     <a href="delete_order_details.php?order_id=<?php echo $row['order_details_id'];?>" ><button class="btn btn-danger btn-round" onclick="return confirm('Are you sure you want to delete?')" type="button">remove</button></a>
                  </td>

                  <?php
                 } ?>

              </tr>
        
              <tr>
                  <td></td>
                  <td></td>
                  <td colspan="2" align="right"><b>Total Price</b></td>
                  <td class="label label-important"> <strong>
                     <?php
                      $result5 = mysqli_query($dbconn,"SELECT sum(total) FROM order_details WHERE user_id='$user_id' and order_id=''");
                      while($row5 = mysqli_fetch_array($result5))
                        { 
                        echo 'Php'.$row5['sum(total)'];
                        echo '<input type="hidden" name="total" value="'.$row5['sum(total)'].'">';
                        }
                      ?></strong>
                  </td>
                  <td></td>
              </tr>

              </tbody>
          </table>
    

                <?php
              if($count2==0 ){
            ?>

                <script type="text/javascript">
                  alert("Shopping Cart Empty! Add an item.");
                  window.location= "user_index.php";
                </script>

               <?php
              }else{
            ?>
           
                <button  type="submit" id="" onclick="return confirm('Are you sure you want to Checkout?')" name="submit" class="btn btn-success btn-round pull-right" data-toggle="modal" data-target="#myModal">
                <i class="now-ui-icons shopping_bag-16"></i> Check Out</button> 

               <?php
                }
              ?>

            <!-- Modal Core -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Shipping Address:</h4>
                  </div>
                  <div class="modal-body">

                      <div class="form-group">
                      <input type="text" class="form-control" name="shipaddress" placeholder="Complete Address For Delivery Purpose." required/>
                      <select class="btn btn-warning btn-round dropdown-toggle" size="1" name="city">
                      <option value="Manila City">Manila</option>
                      <option value="Caloocan City">Caloocan</option>
                      <option value="Las Pinas City">Las Pinas</option>
                      <option value="Makati City">Makati</option>
                      <option value="Malabon City">Malabon</option>
                      <option value="Mandaluyong City">Mandaluyong</option>
                      <option value="Marikina City">Marikina</option>
                      <option value="Muntinlupa City">Muntinlupa</option>
                      <option value="Navotas City">Navotas</option>
                      <option value="Paranaque City">Paranaque</option>
                      <option value="Pasay City">Pasay</option>
                      <option value="Pasig City">Pasig</option>
                      <option value="Quezon City">Quezon</option>
                      <option value="San Juan City">San Juan</option>
                      <option value="Taguig City">Taguig</option>
                      <option value="Valenzuela City">Valenzuela</option>
                      </select>  
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Close</button>
                    <a><button type="submit" name="submit" class="btn btn-success btn-round"><i class="now-ui-icons shopping_delivery-fast"></i> Submit</button></a>
                  </div>
              </div>
            </div>
            </div>

    </form>





           





                        </div>
                    </div> 
                </div>
            </div>
        </div>
<br><br><br><br>
<footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                EcartBooks
                            </a>
                        </li>
                        <li>
                            New Delhi
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Rohit Shakya, Inc.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>


   <!---  inserted  -->
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

</html>