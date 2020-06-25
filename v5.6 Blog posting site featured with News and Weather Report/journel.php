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
include_once 'nav.php';
include_once 'functions.php';
if (isset($_POST['submit'])) {
  insert();
}

if (isset($_GET['clearAll'])) {
deleteFunction();
}
if (isset($_GET['clearPost'])) {
deletePostFunction($_GET['num']);
}

?>
<section><br><br>
<div class="container">

    <div class="row">

      <div class="col-lg-3">
        <div class="list-group">
          <?php getImage();?>
          <div class="container">
  <h2><br><strong>Welcome!!
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
<p>You are successfully authenticated</p><?php echo $_SESSION['msg']."<br>";?></strong>
<br><a href='profile.php'>Update Profile</a>
<br><a href='p2.php'>Use Default pic</a>
<br><a href='user.php?clearAll=true'>Delete All</a>
<hr>
    <div class="autocomplete">
      <form action="user.php" method="post">
      <input id="example" type="text"  name="title" placeholder="Describe your title here!" style="border: 1px solid #A9A9A9;"><br>
      <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="desc" style=" margin-top: 1px; border: 1px solid #A9A9A9;"></textarea>
      <input id=sent type="submit" name="submit">
      </form> 
    </div>
<hr>

</div>
</div>
      
<!--right side part comment section-->
      <div class="col-lg-9">
        <div class="card mt-4">
        </div>
        
          <div class="card-header">
            <?php
            showCommentJournel();?>
          </div>
    
          </div>
        </div>
        <!-- /.card -->
</div></div></section>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
