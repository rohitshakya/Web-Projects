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


<script type="text/javascript">
var val = "<?php echo $country ?>";


	  function getKeyValueFromCityJSON(val) 
{
    var jsonObj = {Pakistan:10,India:20,Nepal:30,Bangladesh:50,Iran:60};
   document.getElementById("placename").innerHTML = jsonObj[val];
    
} getKeyValueFromCityJSON(val);
</script>
</body>
</html>