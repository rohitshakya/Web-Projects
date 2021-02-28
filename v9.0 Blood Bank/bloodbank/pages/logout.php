
 <?php
 //page for destroying all the session variables and session itself
 session_start();
 session_destroy();
 header('Location: ../index.html'); //redirection to index.html
?>
