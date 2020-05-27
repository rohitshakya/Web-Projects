#### User login authentication system which shows newsfeed after the successfull authentication based on document object model.  
### Install Xampp for project php

* For phpmyadmin, sql and apache.
* For database creation and manipulation
* For hosting website locally on your personal system
* Learn Sql queries for database manipulations

#### Default settings will be  
* Every file will be put into htdocs folder i.e.( C:\xampp\htdocs )
* Turn on apache and mysql from xammp control panel  
* There will be 2 files one for html and one for php named as home1.html and home1.php respectively    
`<?php`   
`$servername = "localhost";`    
`$dbusername = "root";`    
`$password = "";`    
`// Create connection`    
`$conn = new mysqli($servername, $dbusername, $password);`    
`?>`  
  
`flow  
home1->user1||home1->failure  
failure->user1  
user1->home1  
`  
  
  
  

