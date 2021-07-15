<?php 

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;
session_start();
require "vendor/autoload.php";
$auth = new Auth(Session::get("tenant_id"), Session::get("client_id"), Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
$tokens = $auth->getToken($_REQUEST['code'], $_REQUEST['state']);
$accessToken = $tokens->access_token;
$auth->setAccessToken($accessToken);
/*print_r($tokens->access_token);
$user = new User;
echo "Name: "  . $user->data->getDisplayName() . "
";
echo "Email: " . $user->data->getUserPrincipalName() . "
";
echo "<pre>";
$myJSON = json_encode($user->data);

*/	  
$claims = explode('.', $accessToken)[1];
$claims = json_decode(base64_decode($claims));
echo '<h3>Parsed ID Token</h3>';
echo '<pre>';
print_r($claims);
echo '</pre>';
echo "redirect successfulluy";
?>