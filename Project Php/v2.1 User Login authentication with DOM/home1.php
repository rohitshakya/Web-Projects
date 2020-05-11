<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Username and password authentication system 
 -->
 <?php
 session_start();
 $_SESSION["msg"] = "Invalid Username or Password!";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>HomePage</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body style="background: orange;">

</body>
</html>
<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
$name=$_POST['name'];
$pass=$_POST['pass'];



error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
  $message="";
if(count($_POST)>0) {
   $result = mysqli_query($conn,"SELECT * FROM user WHERE name='" . $_POST["name"] . "' and password = '". $_POST["pass"]."'");
   $count  = mysqli_num_rows($result);
   if($count==0) {
      header('Location: failure.php');
   } else {
    header('Location: user1.php');
   }
}
echo $message;

   
         

?>
		