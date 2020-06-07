### v3.5 Weather report using curl API with Search Box Navigation System covering 600+ top cities in the world    
[Click here to see demo](https://weather-report12.herokuapp.com/)
### Install Xampp to run this web application

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
  
`flow`  
`index->user||index->failure`      
`failure->user`      
`user->index||user->weathersearch`         
#### Data provided in part by OpenWeatherMap.org
  
### Default login credentials

```
Username: rohit
Password: shakya
```
  
  


  
  
  

