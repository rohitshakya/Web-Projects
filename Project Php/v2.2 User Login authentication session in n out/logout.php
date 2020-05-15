 <?php
 	unset($_SESSION['username']);
   session_destroy();
   header('Location: home1.html');
?>
