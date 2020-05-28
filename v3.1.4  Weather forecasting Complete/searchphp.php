<!DOCTYPE html>
<html lang="en">
  <head>
  <title>HomePage</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>

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
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>
    <div class="report-container">
        <h3><?php echo $data->name; ?> Weather Status</h3>
        <div class="time">
          <?php date_default_timezone_set('Asia/Kolkata'); ?>
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>

        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
</body>
</html>