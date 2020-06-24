<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.6
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
  while($row = $result->fetch_assoc()) {
    echo  "<h3><strong>".$row["title"]."</strong></h3>". $row["description"]. "<br>Posted by ".ucfirst($_SESSION['username'])." on ". date("d/m/Y")."</small> ";
      $pid=$row["post_id"];?>
    <a href='user.php?clearPost=true&num=<?php echo $pid?>'>Delete</a><?php echo "<hr>";
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
// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "connection error";
} 

$title=$_POST['title'];
$desc=$_POST['desc'];
$id=$_SESSION['id'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

$sql = "INSERT INTO story (id,title, description)
VALUES ('$id','$title', '$desc')";
if ($conn->query($sql) === TRUE) {
	$_SESSION['msg']="Successfully Posted";
 // header('Location:user.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close();  
header("Location: user.php");
}

function deleteFunction() {
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

$id=$_SESSION['id'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

$sql = "DELETE FROM `story` WHERE id=$id";
if ($conn->query($sql) === TRUE) {
  $_SESSION['msg']="Successfully Deleted";
 // header('Location:user.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close(); 
header("Location: user.php"); 

  }
function getImage()
{
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

$id=$_SESSION['id'];

error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

  $query = "SELECT profile FROM user WHERE user_id=$id";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['profile'] ).'" height="200" width="200" class="img-thumnail" alt="avatar" style="border-radius: 50%; /> 
                                     
                               </td>  
                          </tr>  
                     ';  
                }  

  
}

function deletePostFunction($num) {
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

$id=$_SESSION['id'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

$sql = "DELETE FROM `story` WHERE `story`.`post_id` = $num";
if ($conn->query($sql) === TRUE) {
  $_SESSION['msg']="Successfully Deleted";
 // header('Location:user.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close(); 
header("Location:user.php"); 

  }
?>