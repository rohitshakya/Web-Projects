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
    $file_size=$_FILES['image']['size'];

  
    if (($file_size > 1097152)){      
        $message = 'File too large. File must be less than 1 megabytes.'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
    }
    else if (($file_size <=0)){      
        $message = 'Please select an image'; 
        echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
    }
    
    else
    {

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
  <div class="container" style="
  margin: auto;
  width: 50%;
  border: 3px;
  padding: 10px;
">
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
    <label>Size must be less than 1mb</label>
</form>
<?php
    echo $msg;
?>
<br><a href="user.php">Back</a></div>
</body>
</html>
