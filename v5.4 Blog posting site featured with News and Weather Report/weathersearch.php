<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.6
 -->
<?php
session_start(); 

if(!isset($_SESSION['username']))
{
  header('Location: home1.html');
}
include_once 'nav.php';
?>
<section><br><br>
<form autocomplete="off" action="/weathersearch.php">
  <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Enter a City Name">
  </div>
  <input type="submit">
</form>
<strong>
<h1><?php
$country=$_GET['myCountry'];
echo "$country";
?></h1>
<p id="placename"></p>

<?php 
//$str = file_get_contents('http://bulk.openweathermap.org/sample/city.list.json.gz'); //via link
 $str = file_get_contents('localcity.json');
 $json = json_decode($str, true); // decode the JSON into an associative array
// echo '<pre>' . print_r($json, true) . '</pre>'; //printing whole json file in form of json
 //echo $cityName = $json['Pakistan'];
 //echo $cityName = $json[$country];
$apiKey = "231a533e913c7e004f7ea56e36a67d83";
$cityId = $json[$country];
if(!isset($cityId))
{
  header('Location: weather.php');
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
 include_once'searchbox.php';?>

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


</section>
</body>
</html>