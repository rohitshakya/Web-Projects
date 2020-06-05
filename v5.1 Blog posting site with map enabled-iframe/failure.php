<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Username and password authentication system 
 -->
<!DOCTYPE html>
<html lang="en">
  <head>
	<title>HomePage</title>
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
<body style="background: orange;">
<div class="container">
	<p class="h3">Login Page</p>
	<form action="/home1.php" method="POST">
		<div class="form-group">
  		Name:<br>
  		<input type="text" name="name" ><br>
  		</div>
  		<div class="form-group">
  		Password:<br>
  		<input type="password" name="pass" ><br>
  		</div>
  		<button type="submit" class="btn btn-default">Submit</button>
	</form>  
</div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<?php
session_start();
$_SESSION["msg"] = "Invalid Username or Password!";
echo $_SESSION["msg"];
?>

</body>
</html>
