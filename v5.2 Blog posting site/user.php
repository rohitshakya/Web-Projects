<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site 
 -->
<?php
session_start(); 
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
	<title>UserPage</title>
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
<body style="background:white">
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
?>
</h2></strong>
<p>"You are successfully authenticated!!"</p>
<a href="logout.php">Logout</a><br><br></a>
</div></h2></div>
<!--alert box over-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  <hr>
    <div class="info">
      <label for="example">Add Commment
      </label>
      <!--<form action="comment.php" method="post" onsubmit="alert('Commment posted successfully!')"> for alert on submission-->
      <form action="comment.php" method="post">
        <label>Title</label>
      <input id="example" type="text" name="title" style="border: 1px solid #F2F2F2;">
      <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="desc"></textarea>
      <input id=sent type="submit" name="submit">
      </form> 
    </div>
</div>


<style>
    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
</style>

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

  // output data of each row
  echo "Title &nbsp&nbsp&nbsp&nbsp"."Description<br>";
  while($row = $result->fetch_assoc()) {
    echo  $row["title"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
  
$conn->close();
?>
</div>

  
</body>
</html>
