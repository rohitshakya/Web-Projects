<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.4
 -->
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
  <link rel="stylesheet" href="css/mycss.css">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head><body style="background: white">
<!-- nav bar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="user.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="weather.php">Weather</a></li>
      <li><a href="news.php">News</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
  </div>
</nav>
