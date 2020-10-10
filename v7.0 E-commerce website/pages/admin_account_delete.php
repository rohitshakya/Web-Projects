
    <!-- dynamic content will be here -->
<?php
//including the database connection file
include '../config/dbconn.php';
//getting id of the data from url
$id = $_GET['user_id'];
//deleting the row from table
$result = mysqli_query($dbconn, "DELETE FROM admin WHERE user_id=$id");
//redirecting to the display page (index.php in our case)
header("Location:admin_panel.php");
?>
    