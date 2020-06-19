<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.3
 -->


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
  
  $sql = "SELECT * FROM story WHERE id=$_SESSION[id] ORDER BY title"; //for descending order use "ORDER BY title DESC"
  $result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row
  echo "Title &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Description<br>";
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
header("Refresh:0; url=user.php");
}

function deleteFunction() {
    echo 'Delete function called';
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
$id=$_SESSION['id'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;
// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "DELETE FROM `story` WHERE id=$id";
if ($conn->query($sql) === TRUE) {
  $_SESSION['msg']="Successfully Deleted";
 // header('Location:user.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close(); 
header("Refresh:0; url=user.php"); 

  }
function getImage()
{
  
//$id = $_GET['id'];
  // do some validation here to ensure id is safe
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;
// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  $query = "SELECT profile FROM user";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['profile'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                }  

  
}
?>