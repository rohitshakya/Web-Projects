<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Username and Password Authentication System 
 -->
 <?php
  session_start();
  if(!isset($_POST['submit']))
  {
  	header('Location:user.php');
  }
  $_SESSION['start'] = time();
  $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ; //session exist for 5 minutes 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Comment page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" >
  <meta name="author" content="Rohit Shakya">
  <meta name="keywords" content="Commment, Map, User, Authentication, Weather, Report, News ">
  <meta name="title" content="Commment Posting Site">
  <meta name="description" content="Welcome to our comment posting site. Enjoy!!">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>

<?php
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

 // header('Location:user.php');

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close();  
         

?>

<div class="alert alert-success">
  <div class="container">
  <h2><strong>Welcome!!
<?php
if(!isset($_SESSION['username']))
{
  header('Location: home1.html');
}
else
{
  echo ucfirst($_SESSION['username']);  
  
}
 
?></h2></strong>
<p>"You are successfully authenticated!!"</p>
<a href="logout.php">Logout</a><br><br></a>
</div></h2></div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  <hr>
    <div class="info">
      <label for="example">Add Commment
      </label>
      <!--<form action="comment.php" method="post" onsubmit="alert('Commment posted successfully!')"> for alert on submission-->
      <form action="comment.php" method="post">
        <label>Title</label>
      <input id="example" type="text" name="title" >
      <label>Description</label>
      <input id="example" type="text" name="desc">
      <input id=sent type="submit" name="submit">
      </form> 
    </div>
</div>
<div class="container-fluid" id="Commments">
<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";


// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  

  $sql = "SELECT * FROM story WHERE id=$_SESSION[id]";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {

  
  while($row = $result->fetch_assoc()) {
    echo  "<strong>Title:</strong> ".$row["title"]. "<br>" . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
  
$conn->close();
?></div>
  
</body>
</html>
