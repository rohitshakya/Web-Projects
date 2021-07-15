<?php session_start();
require "vendor/autoload.php";
use myPHPnotes\Microsoft\Auth;
$tenant = "common";
$client_id = "56f5349c-a6cf-4342-96aa-8d1295f323c4";
$client_secret = "5eSsVc_tfy..Jnr__T7.h.ComtOdR0y-6j";
$callback = "http://localhost/microsoft_login/callback.php";
$scopes = ["User.Read"];
$microsoft = new Auth($tenant, $client_id, $client_secret,$callback, $scopes);
header("location: " . $microsoft->getAuthUrl());
?>

   