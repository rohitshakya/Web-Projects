<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * title : Insert into database 
 -->
<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
</head>
<body style="background: orange;">
<a href="home1.html">Click here to go back<br></a>
</body>
</html>
<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];

// Create connection
$conn = new mysqli($servername, $dbusername, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	// Create database

$sql = "CREATE DATABASE IF NOT EXISTS myDB"; //date base creation if not exist, otherwise it does nothing
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}
$database="myDB";
$conn = new mysqli($servername, $dbusername, $password,$database); //select database
if ($conn->query($sql) === TRUE) {
  echo "Database selected successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table
$query="SELECT TABLE MyDetails";
if ($conn->query($query) === TRUE) {
  echo "Table MyDetails successfully<br>";
} else {
  
$sql = "CREATE TABLE MyDetails (
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";
echo "Table selected  successfully <br>";
}

$sql = "INSERT INTO MyDetails (firstname, lastname, email)
VALUES ('$fname', '$lname', '$email')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	
$conn->close();
?>
		