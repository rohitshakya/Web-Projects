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

function fun($email,$fname)
{
	echo $email;
	for ($i=0; $i <10 ; $i++) { 
	echo "$fname<br>";
}

}
  fun($email,$fname);
  echo $lname; 
  echo $email; 
  $conn->close();

?>
		