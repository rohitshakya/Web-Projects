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

  <!-- Page Content -->
  <div class="col-lg-3">
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
<a href='user.php?clearAll=true'>Delete All</a></div></div>

      <div class="col-lg-9">
        <div class="card mt-4">
          <div class="card-body">
            <h3 class="card-title">Comments and Posts</h3>
            <?php
            showComment(); // call the function
            if (isset($_GET['clearAll'])) {
            deleteFunction();
            }
            ?>
          </div>
        </div>
        </div>

<hr>
    <div class="info">
      <label for="example">Add Comment
      </label>
      <form action="user.php" method="post">
      <input id="example" type="text" name="title" style="border: 1px solid #F2F2F2;"><br>
      <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="desc"></textarea>
      <input id=sent type="submit" name="submit">
      </form> 
    </div>
<hr>


<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Rohit Shakya 2020</p>
    </div>
  </footer>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
