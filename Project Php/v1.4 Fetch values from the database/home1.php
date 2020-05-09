<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Fetch from the database 
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
$database="myDB";
$fname=$_POST['fname'];


// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  echo "Successfully connected<br>";

  $sql = "SELECT firstname,lastname FROM mydetails WHERE firstname='$fname' ";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row
  echo "FirstName &nbsp&nbsp&nbsp&nbsp"."Lastname<br>";
  while($row = $result->fetch_assoc()) {
    echo  $row["firstname"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
	
$conn->close();
?>
		