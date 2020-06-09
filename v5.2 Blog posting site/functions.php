<?php
function showComment() {

$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "connection error";
} 
  
  $sql = "SELECT * FROM story WHERE id=$_SESSION[id]";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row
  echo "Title &nbsp&nbsp&nbsp&nbsp"."Description<br>";
  while($row = $result->fetch_assoc()) {
    echo  $row["title"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
  $conn->close();  
}

function insert() {
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
$title=$_POST['title'];
$desc=$_POST['desc'];
$id=$_SESSION['id'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;
// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO story (id,title, description)
VALUES ('$id','$title', '$desc')";
if ($conn->query($sql) === TRUE) {
	$_SESSION['msg']="Successfully Posted";
 // header('Location:user.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close();  
}


?>