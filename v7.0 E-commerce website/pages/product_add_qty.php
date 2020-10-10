<?php
  session_start();

  if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location:../admin_index.php');
    exit();
  }
?>


<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
    $prod_id = mysqli_real_escape_string($dbconn, $_POST['prod_id']);

    $prod_name=$_POST['prod_name'];
    $prod_desc=$_POST['prod_desc'];
    $prod_qty=$_POST['prod_qty'];
    $prod_cost=$_POST['prod_cost'];
    $prod_price=$_POST['prod_price'];
    $category=$_POST['category'];
    $supplier=$_POST['supplier'];
    $prod_serial=$_POST['prod_serial'];
    // checking empty field
   
        if(empty($prod_qty)) {
            echo "<font color='red'>Product Quantity field is empty!</font><br/>";
        
        } else {    

        //updating the table
        $query = "UPDATE products SET prod_qty=prod_qty+'$prod_qty' WHERE prod_id=$prod_id";

        $result = mysqli_query($dbconn,$query);
       
       if($result){
            
            $prod_name = $_POST['prod_name'];
            $prod_qty = $_POST['prod_qty'];
            
            date_default_timezone_set('Asia/Manila');

            $date = date("Y-m-d H:i:s");
            $id=$_SESSION['id'];
            
            $query=mysqli_query($dbconn,"SELECT * FROM products WHERE prod_id='$prod_id'")or die(mysqli_error());
          
                while($res=mysqli_fetch_array($query)){
                $prod_name=$res['prod_name'];
                $remarks="added $prod_qty of $prod_name";  
            }
                mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

        //redirecting to the display page.
        header("Location: admin_panel.php");
        }
        
    }
}
?>
            




<?php
    //getting id from url
    $prod_id=isset($_GET['prod_id']) ? $_GET['prod_id'] : die('ERROR: Record ID not found.');
    //selecting data associated with this particular id
    $result = mysqli_query($dbconn, "SELECT * FROM products WHERE prod_id=$prod_id");
        while($res = mysqli_fetch_array($result))
        {
            $prod_name = $res['prod_name'];
            $prod_desc = $res['prod_desc'];
            $prod_qty = $res['prod_qty'];
            $prod_cost = $res['prod_cost'];
            $prod_price = $res['prod_price'];
            $category = $res['category'];
            $supplier = $res['supplier'];
            $prod_serial = $res['prod_serial'];
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Electricks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your projects -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<body class="index-page sidebar-collapse">

    <!-- End Navbar -->
    <div class="wrapper">

<br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>Purchased Product Information</h2>
                      <hr color="orange">
                      <a href='admin_panel.php' class='btn btn-warning btn-round'>Back to Index</a>
                <br>
                <div class="col-md-12">

    <div class="panel panel-success panel-size-custom">
  <div class="panel-heading"><h3>Add Product Quantity</h3></div>
  <div class="panel-body">
    <form action="product_add_qty.php" method="post">
        <div class="form group">
            <input type="hidden" class="form-control" id="prod_id" name="prod_id" value=<?php echo $_GET['prod_id'];?>>
            <label for="prod_name" id="prod_name" name="prod_name">Product Name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $prod_name;?></label><br><br>
            <label for="prod_serial">Product Serial: &nbsp &nbsp &nbsp <?php echo $prod_serial;?></label><br><br>
            <label for="prod_name">Name: &nbsp &nbsp &nbsp <?php echo $prod_name;?></label><br><br>
            <label for="prod_desc">Description: &nbsp &nbsp &nbsp <?php echo $prod_desc;?></label><br><br>
            <label for="prod_price">Product Cost (Php): &nbsp &nbsp &nbsp &nbsp <?php echo $prod_price;?></label><br><br>
            <label for="category">Product Supplier: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $category;?></label><br><br>
            <label for="supplier">Product Category: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $supplier;?></label><br><br>
            <label for="qty">Available Quantity: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $prod_qty;?></label><br><br>
            <label for="prod_qty">Number of Quantity/Volume to be added:</label>
            <input type="text" class="form-control" id="prod_qty" name="prod_qty" placeholder="Value e.g. 1234">
        </div>
        <br/>
        <div class="form group">
            <button type="submit" class="btn btn-success btn-round" id="submit" name="submit">
            <i class="now-ui-icons ui-1_check"></i> Add Quantity
            </button> 
        </div>
    </form>
  
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
                                Rohit Shakya
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

</html>