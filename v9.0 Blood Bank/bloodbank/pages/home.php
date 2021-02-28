
 <?php
session_start();
if(!isset($_SESSION['email']))
{
  header('Location: ../index.html'); //if session doesn't exist then redirection to index.html
}
else if($_SESSION['receiver']==true)
{
	header('Location: ./rhome.php'); //if session exist for receiver then redirection to receiver's home page
}
else
{
	header('Location: ./hhome.php'); //if session exist for hospital's staff then redirection to hospital's home page
}
?>
