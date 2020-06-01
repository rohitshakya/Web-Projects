<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Username and Password Authentication System 
 -->
<?php
session_start(); 
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
	<title>UserPage</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
 
?></h2></strong>
<p>"You are successfully authenticated!!"</p><a href="logout.php">Logout<br><br></a></div>
</h2></div></div> 
<!--alert box over-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  
    <div class="info">
      <label for="example">Add Commment
      </label>
      <form action="comment.php" method="post">
      <input id="example" type="text" name="title">
      <input id="example" type="text" name="desc">
      <input id=sent type="submit" name="submit">
      </form> 
  </div>
</body>
</html>
