<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

// Create connection
$conn = new mysqli($servername, $dbusername, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  // Create database

$sql = "CREATE DATABASE IF NOT EXISTS myDB"; //date base creation if not exist, otherwise it does nothing
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}
$database="myDB";
$conn = new mysqli($servername, $dbusername, $password,$database); //select database
if ($conn->query($sql) === TRUE) {
  echo "Database selected successfully<br>";
} else {
  echo "Error selecting database: " . $conn->error;
}

// sql to create table
$query="SELECT TABLE user";
if ($conn->query($query) === TRUE) {
  echo "Table user successfully<br>";
} else {
  
$sql = "CREATE TABLE user (
user_id INT(30) NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
password VARCHAR(50)
)";
echo "Table selected  successfully <br>";
}

$query="SELECT TABLE story";
if ($conn->query($query) === TRUE) {
  echo "Table story successfully<br>";
} else {
  
$sql = "CREATE TABLE story (
id INT(30) NOT NULL,
title VARCHAR(50) NOT NULL,
description VARCHAR(255)
)";
echo "Table selected  successfully <br>";
header('Location:home1.html');
}  

$conn->close();
?>  
