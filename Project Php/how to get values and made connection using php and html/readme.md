# Install Xampp..

* For phpmyadmin, sql and apache.
* For database creation and manipulation
* Turn on apache and mysql from xammp

## Every file will be put into htdocs folder ie.( C:\xampp\htdocs )
## To create connection default setting will be:-

<?php
$servername = "localhost";
$dbusername = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $dbusername, $password);
?>

* There will be 2 files one for html and one for php named as home.html and home1.php respectiveley
