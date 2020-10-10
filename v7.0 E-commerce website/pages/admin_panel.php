<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
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
    <title>Ecartbooks</title>
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

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="admin_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Rohit Shakya, Inc." data-placement="bottom" target="">
                    Ecartbooks
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_panel.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo 'Admin '.$row['firstname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Books</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

        <div class="wrapper">
            <div class="page-header page-header-small" filter-color="white">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/header.jpg');"></div>
                <div class="container">
                    <div class="content-center">
                        <div class="photo-container">
                            <img src="../assets/img/default-avatar.png" alt="">
                        </div>
                        <h2 class="title">
                            <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            echo ''.$row['firstname'].' '.$row['lastname'].'';
                            ?>
                        </h2>
                        <p class="category">Administrator</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="button-container">
                    <a href="" class="btn btn-primary btn-round btn-lg">Follow me on</a>
                    <a href="https://www.twitter.com" target="_blank" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                </div>
               <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Administrator Dashboard</h4>
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#userlog" role="tablist">
                                        <i class="now-ui-icons loader_refresh"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#adminlog" role="tablist">
                                        <i class="now-ui-icons loader_refresh"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#products" role="tablist">
                                        <i class="now-ui-icons shopping_tag-content"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#supplier" role="tablist">
                                        <i class="now-ui-icons shopping_delivery-fast"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#user_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#admin_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="products" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Product Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM products ORDER BY prod_name ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table id="" class="table table-condensed table-striped">
                                    <tr>
                                      <th>Serial</th>
                                      <th>Product Name</th>
                                      <th>Description</th>
                                      <th>Cost(Php)</th>
                                      <th>Price(Php)</th>
                                      <th>Quantity</th>
                                      <th>Category</th>
                                      <th>Supplier</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['prod_serial']."</td>";
                                                echo "<td>".$res['prod_name']."</td>";
                                                echo "<td>".$res['prod_desc']."</td>";
                                                echo "<td>".$res['prod_cost']."</td>";  
                                                echo "<td>".$res['prod_price']."</td>"; 

                                                $prod_qty=$res['prod_qty'];
                                                
                                                if ($prod_qty<=10){
                                                ?>
                                                 <td><span style="color:red;"><?php echo $res['prod_qty'];?> : Reorder!</span></td>  
                                                 <?php
                                                }else{
                                               ?>
                                               <td><?php echo $res['prod_qty'];?></td>
                                               </ul>
                                               <?php } 

                                                echo "<td>".$res['category']."</td>";
                                                echo "<td>".$res['supplier']."</td>";
                                                echo "<td><a href=\"product_add_qty.php?prod_id=$res[prod_id]\">Add Qty</a> | <a href=\"product_update.php?prod_id=$res[prod_id]\">Edit</a> | <a href=\"product_delete.php?prod_id=$res[prod_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"admin_product_details.php?prod_id=$res[prod_id]\">View</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>






                                <br><br>
                                <a class="btn btn-success btn-round" href="product_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="supplier" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Supplier Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM supplier ORDER BY supp_name ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table id="" class="table table-condensed table-striped">
                                    <tr>
                                      <th>Supplier Name</th>
                                      <th>Address</th>
                                      <th>Contact</th>
                                      <th>Email</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['supp_name']."</td>";
                                                echo "<td>".$res['supp_address']."</td>";
                                                echo "<td>".$res['supp_contact']."</td>";
                                                echo "<td>".$res['supp_email']."</td>";  
                                                echo "<td><a href=\"supplier_update.php?supp_id=$res[supp_id]\">Edit</a> | <a href=\"supplier_delete.php?supp_id=$res[supp_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                <br><br>
                                <a class="btn btn-success btn-round" href="supplier_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Supplier</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="userlog" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                        <br>
                                        <div class="row">
                                            <div align="center">
                                                <h3>User Logs Information</h3>
                                            </div>
                                        </div>
                                      <?php
                                      include('../config/dbconn.php');
                                      ?>
                                      <br><br>
                                        <table id="" class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                              <th>--------------------Start of Log--------------------</th>
                                            </tr>
                                          </thead>
                                            <?php
                                                $query=mysqli_query($dbconn,"SELECT * FROM logs NATURAL JOIN users ORDER BY date DESC")or die(mysqli_error());
                                                while($row=mysqli_fetch_array($query)){ 
                                            ?>
                                          <tr>
                                            <td><?php echo $row['firstname']." ".$row['lastname']." ".$row['action']." last ".$row['date'];?></td>
                                          </tr>               
                                                <?php
                                              }
                                            ?>           
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th>--------------------End of Log--------------------</th>
                                          </tr>           
                                        </tfoot>
                                      </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="adminlog" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                        <br>
                                        <div class="row">
                                            <div align="center">
                                                <h3>Admin Logs Information</h3>
                                            </div>
                                        </div>
                                      <?php
                                      include('../config/dbconn.php');
                                      ?>
                                      <br><br>
                                        <table id="" class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                              <th>--------------------Start of Log--------------------</th>
                                            </tr>
                                          </thead>
                                            <?php
                                                $query=mysqli_query($dbconn,"SELECT * FROM logs NATURAL JOIN admin ORDER BY date DESC")or die(mysqli_error());
                                                while($row=mysqli_fetch_array($query)){ 
                                            ?>
                                          <tr>
                                            <td><?php echo $row['firstname']." ".$row['lastname']." ".$row['action']." last ".$row['date'];?></td>
                                          </tr>               
                                                <?php
                                              }
                                            ?>           
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th>--------------------End of Log--------------------</th>
                                          </tr>           
                                        </tfoot>
                                      </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="user_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>User Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM users ORDER BY firstname ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Contact</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['firstname']."</td>";
                                                echo "<td>".$res['lastname']."</td>";
                                                echo "<td>".$res['address']."</td>";  
                                                echo "<td>".$res['email']."</td>"; 
                                                echo "<td>".$res['contact']."</td>";
                                                echo "<td><a href=\"user_delete.php?user_id=$res[user_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="admin_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Admin Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM admin ORDER BY firstname ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Username</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['firstname']."</td>";
                                                echo "<td>".$res['lastname']."</td>";
                                                echo "<td>".$res['email']."</td>";
                                                echo "<td>".$res['username']."</td>";  
                                                //echo "<td>".$res['password']."</td>"; 
                                                echo "<td><a href=\"admin_account_update.php?user_id=$res[user_id]\">Edit</a> | <a href=\"admin_account_delete.php?user_id=$res[user_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                <br><br>
                                <a class="btn btn-success btn-round" href="admin_signup.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Admin Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer" data-background-color="black">
           <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                Ecartbooks
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