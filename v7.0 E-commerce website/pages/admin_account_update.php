<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['update']))
{   
    $id = mysqli_real_escape_string($dbconn, $_POST['user_id']);
    $fname = mysqli_real_escape_string($dbconn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($dbconn, $_POST['lastname']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']); 
    $uname = mysqli_real_escape_string($dbconn, $_POST['username']); 
    $pword = mysqli_real_escape_string($dbconn, $_POST['password']); 

    $pass1=md5($pword);
    $salt="a1Bz20ydqelm8m1wql";
    $pass1=$salt.$pass1;
    
    // checking empty fields
    if(empty($fname) || empty($lname) || empty($email) || empty($uname) || empty($pword)) {    
            
        if(empty($fname)) {
            echo "<font color='red'>Firstname field is empty!</font><br/>";
        }
        
        if(empty($lname)) {
            echo "<font color='red'>Lastname field is empty!</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty!</font><br/>";
        }
        
        if(empty($uname)) {
            echo "<font color='red'>Username field is empty!</font><br/>";
        }    

        if(empty($pword)) {
            echo "<font color='red'>Password field is empty!</font><br/>";
        }    
    } else {    
        //updating the table
        $query = "UPDATE admin SET firstname='$fname',lastname='$lname',email='$email',username='$uname',password='$pass1' WHERE user_id=$id";
        $result = mysqli_query($dbconn,$query);
        
        if($result){
            //redirecting to the display page. In our case, it is index.php
        header("Location: admin_panel.php");
        }
        
    }
}
?>

<?php
//getting id from url
$id=isset($_GET['user_id']) ? $_GET['user_id'] : die('ERROR: Record ID not found.');
//selecting data associated with this particular id
$result = mysqli_query($dbconn, "SELECT * FROM admin WHERE user_id=$id");
while($res = mysqli_fetch_array($result))
{
    $fname = $res['firstname'];
    $lname = $res['lastname'];
    $email = $res['email'];
    $uname = $res['username'];
    $pword = $res['password'];
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
                      <h2>Admin Account Information</h2>
                      <hr color="orange">
                      <a href='admin_panel.php' class='btn btn-warning btn-round'>Back</a>
                <br>
                <div class="col-md-12">
      

            <div class="panel panel-success panel-size-custom">
                <div class="panel-heading"><h3>Update Admin</h3></div>
                  <div class="panel-body">
                    <form action="admin_account_update.php" method="post">
                        <div class="form group">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value=<?php echo $_GET['user_id'];?>>
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $fname;?>">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lname;?>">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $uname;?>">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $pword;?>">
                            
                        </div>
                        <br>
                        <div class="form group">
                            <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                            <i class="now-ui-icons ui-1_check"></i> Update Account
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