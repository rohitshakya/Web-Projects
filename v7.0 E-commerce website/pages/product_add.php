<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location: admin_login_page.php');
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
               

<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit'])){

    $prod_name=$_POST['prod_name'];
    $prod_desc=$_POST['prod_desc'];
    $prod_qty=$_POST['prod_qty'];
    $prod_cost=$_POST['prod_cost'];
    $prod_price=$_POST['prod_price'];
    $category=$_POST['category'];
    $supplier=$_POST['supplier'];
    $prod_serial=$_POST['prod_serial'];

    move_uploaded_file($_FILES["prod_pic1"]["tmp_name"],"../uploads/" . $_FILES["prod_pic1"]["name"]);         
    $prod_pic1=$_FILES["prod_pic1"]["name"];
    move_uploaded_file($_FILES["prod_pic2"]["tmp_name"],"../uploads/" . $_FILES["prod_pic2"]["name"]);         
    $prod_pic2=$_FILES["prod_pic2"]["name"];
    move_uploaded_file($_FILES["prod_pic3"]["tmp_name"],"../uploads/" . $_FILES["prod_pic3"]["name"]);         
    $prod_pic3=$_FILES["prod_pic3"]["name"];

     // checking empty fields
    if(empty($prod_name) || empty($prod_desc) || empty($prod_qty) || empty($prod_cost) || empty($prod_price) || empty($category) 
        || empty($supplier) || empty($prod_serial) || empty($prod_pic1) || empty($prod_pic2) || empty($prod_pic3)){    
            
        if(empty($prod_name)) {
            echo "<font color='red'>Product name field is empty!</font><br/>";
        }
        
        if(empty($prod_desc)) {
            echo "<font color='red'>Product description field is empty!</font><br/>";
        }

        if(empty($prod_qty)) {
            echo "<font color='red'>Quantity field is empty!</font><br/>";
        }   

        if(empty($prod_price)) {
            echo "<font color='red'>Product price field is empty!</font><br/>";
        }   

        if(empty($category)) {
            echo "<font color='red'>Category field is empty!</font><br/>";
        }  

        if(empty($supplier)) {
            echo "<font color='red'>Supplier field is empty!</font><br/>";
        } 

        if(empty($prod_serial)) {
            echo "<font color='red'>Serial field is empty!</font><br/>";
        }

        if(empty($prod_pic1)) {
            echo "<font color='red'>Picture1 field is empty!</font><br/>";
        }

        if(empty($prod_pic2)) {
            echo "<font color='red'>Picture2 field is empty!</font><br/>";
        }

        if(empty($prod_pic3)) {
            echo "<font color='red'>Picture3 field is empty!</font><br/>";
        }

    } else {    

        $query = "INSERT INTO products (prod_name, prod_desc, prod_qty, prod_cost, prod_price, category, supplier, prod_serial, prod_pic1, prod_pic2, prod_pic3) 
        VALUES ('$prod_name','$prod_desc','$prod_qty','$prod_cost','$prod_price','$category','$supplier','$prod_serial','$prod_pic1','$prod_pic2','$prod_pic3')";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
            
            $prod_name = $_POST['prod_name'];
            $prod_qty = $_POST['prod_qty'];
            
            date_default_timezone_set('Asia/Manila');

            $date = date("Y-m-d H:i:s");
            $id=$_SESSION['id'];
            
            $query=mysqli_query($dbconn,"SELECT prod_name FROM products WHERE prod_id='$prod_name'")or die(mysqli_error());
          
                $row=mysqli_fetch_array($query);
                $product=$row['prod_name'];
                $remarks="added a new product $prod_qty of $prod_name";  
            
                mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

        //redirecting to the display page.
        header("Location: admin_panel.php");
        }
        
    }
}

?>



<div class="panel panel-success panel-size-custom">
          <div class="panel-heading"><h3>Add Purchased Products</h3></div>

          <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form group">
                    <label for="prod_name">Product Name:</label>
                    <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Product Name"/>
                    <label for="prod_desc">Product Description:</label>
                    <input type="text" class="form-control" id="prod_desc" name="prod_desc" placeholder="Product Description"/>
                    <label for="prod_cost">Product Cost (Php):</label>
                    <input type="text" class="form-control" id="prod_cost" name="prod_cost" placeholder="Value e.g. 123.4"/>
                    <label for="prod_price">Product Price (Php):</label>
                    <input type="text" class="form-control" id="prod_price" name="prod_price" placeholder="Value e.g. 123.4"/>
                    <label for="prod_qty">Quantity:</label>
                    <input type="text" class="form-control" id="prod_qty" name="prod_qty" placeholder="Value e.g. 123"/>

                    <div class="form-group">
                        <label for="supplier">Supplier:</label>
                        <div class="input-group">
                            <select class="form-control" id="supplier" name="supplier" required>
                              <?php
                              include('../config/dbconn.php');
                              $query=mysqli_query($dbconn,"SELECT supp_name FROM supplier ORDER BY supp_name ASC")or die(mysqli_error());
                              while($row=mysqli_fetch_array($query)){
                                  ?>
                                <option value="<?php echo $row['supp_name'];?>"><?php echo $row['supp_name'];?></option>
                                <?php }?>
                            </select>
                        </div>

                        <label for="category">Category:</label>
                        <div class="input-group">
                            <select class="form-control" id="category" name="category" required>
                              <?php
                              include('../config/dbconn.php');
                              $query=mysqli_query($dbconn,"SELECT cat_name FROM category ORDER BY cat_name ASC")or die(mysqli_error());
                              while($row=mysqli_fetch_array($query)){
                              ?>
                                <option value="<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></option>
                                <?php }?>
                            </select>
                        </div>

                        
                        <label for="prod_pic1">Picture 1 (Front View):</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="prod_pic1" name="prod_pic1">  
                        </div>
                        <label for="prod_pic2">Picture 2 (Side View):</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="prod_pic2" name="prod_pic2">  
                        </div>
                        <label for="prod_pic3">Picture 3 (Specifications):</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="prod_pic3" name="prod_pic3">  
                        </div>

                    </div>

                    <label for="prod_serial">Serial:</label>
                    <input type="text" class="form-control" id="prod_serial" name="prod_serial" placeholder="Value e.g. 1234"/>

                </div>
                <br>

                <div class="form group">
                    <button type="submit" class="btn btn-success btn-round" id="submit" name="submit">
                    <i class="now-ui-icons ui-1_check"></i> Add Product
                    </button> 
                </div>
            </form>
          </div>
        </div> 
        <br> 
    </div>
</div>
</div>
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

</html>