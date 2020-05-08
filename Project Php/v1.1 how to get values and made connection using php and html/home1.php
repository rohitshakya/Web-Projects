<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * title : Connection with database  
 -->
<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$name=$_POST['name'];

// Create connection
$conn = new mysqli($servername, $dbusername, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  echo $name;
  echo " Priya";
  $conn->close();

?>
		