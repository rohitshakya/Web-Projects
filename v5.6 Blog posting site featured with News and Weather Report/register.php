<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.6
 -->


<?php
if (isset($_POST['submit'])){
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
$name=$_POST['name'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;
// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($pass===$cpass)
{


$sql = "INSERT INTO `user` (`user_id`, `name`, `password`, `profile`) VALUES (NULL, '$name', '$pass', NULL);";
if ($conn->query($sql) === TRUE) {
  session_start();
  $_SESSION['msg']="Successfully created!";
  header('Location: status.php');
  

}
}
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  $_SESSION['msg']="error!!";
}

$conn->close();  
}
?>
