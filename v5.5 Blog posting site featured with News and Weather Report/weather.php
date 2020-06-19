<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.4
 -->
<?php
session_start(); 

if(!isset($_SESSION['username']))
{
  header('Location: home1.html');
}
include 'nav.php';
?>


<!--Search Bar Form-->
<!--Make sure the form has the autocomplete function switched off:-->
<form autocomplete="off" action="/weathersearch.php">
  <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Enter a City Name">
  </div>
  <input type="submit">
</form>
<!--form over-->

<!--nav bar complete-->
<strong>
<?php
$apiKey = "231a533e913c7e004f7ea56e36a67d83";
$cityId = 1261481;
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
//search bar file added here to reduce code

include'searchbox.php';?>
<br><strong>
<button onclick="getLocation()">Get your coordinates</button><br>

<p id="demo"></p></strong>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>


<!--section over-->
</body>
</html>
