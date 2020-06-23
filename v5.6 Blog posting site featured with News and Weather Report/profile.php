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
$msg = '';
echo $msg;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','mydb') or die('Unable To connect');
    $sql= "UPDATE user set profile=? WHERE user_id=$_SESSION[id] ";
    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly Uploaded';
        header('Location:user.php');
    }else{
        $msg = 'Error uploading image';
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UploadPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" >
  <meta name="author" content="Rohit Shakya">
  </head>
<body style="background: white;">
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>
<br><a href="user.php">Back</a>
</body>
</html>
