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
include 'functions.php';
if (isset($_POST['submit'])) {
  insert();
}
include 'nav.php';
?>
  <?php getImage();?>
	<div class="container">
  <h2><strong>Welcome!!
<?php
if(!isset($_SESSION['username']))
{
	header('Location: home1.html');
}
else
{
  echo ucfirst($_SESSION['username']);  
} 
?></strong></h2>
<p>"You are successfully authenticated!!"</p><?php echo $_SESSION['msg']."<br>";?></strong>
<a href='user.php?clearAll=true'>Delete All</a></div>

<!--alert box over-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
<hr>
    <div class="info">
      <label for="example">Add Commment
      </label>
      <!--<form action="comment.php" method="post" onsubmit="alert('Commment posted successfully!')"> for alert on submission-->
      <form action="user.php" method="post">
        <label>Title</label>
      <input id="example" type="text" name="title" style="border: 1px solid #F2F2F2;">
      <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="desc"></textarea>
      <input id=sent type="submit" name="submit">
      </form> 
    </div>
</div>
<div class="container-fluid" id="Commments">
<?php
showComment(); // call the function

if (isset($_GET['clearAll'])) {
    deleteFunction();
  }
?>
</div>
</body>
</html>
