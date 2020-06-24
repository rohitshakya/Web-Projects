<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.6
 -->


<?php
session_start();
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
    $_SESSION['msg']="connection error!!";
} 
if($pass===$cpass)
{
$sql = "INSERT INTO `user` (`user_id`, `name`, `password`, `profile`) VALUES (NULL, '$name', '$pass', NULL);";
if ($conn->query($sql) === TRUE) {
  $_SESSION['msg']="Successfully created!!";

}}
else {$_SESSION['msg']="Both passwords must be same!";}
$conn->close(); 
header("Refresh:0; url=status.php");


?>
