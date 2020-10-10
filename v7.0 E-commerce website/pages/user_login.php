<?php
    session_start();
    include('../config/dbconn.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            
        $user_unsafe=$_POST['username'];
        $pass_unsafe=$_POST['password'];

        $user = mysqli_real_escape_string($dbconn,$user_unsafe);
        $pass1 = mysqli_real_escape_string($dbconn,$pass_unsafe);

        $pass=md5($pass1);
        $salt="a1Bz20ydqelm8m1wql";
        $pass=$salt.$pass;


        date_default_timezone_set('Asia/Manila');
        $date = date("Y-m-d H:i:s");            


        $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE username='$user' AND password='$pass'");
        $res=mysqli_fetch_array($query);
        $id=$res['user_id'];

        if (mysqli_num_rows($query)<1){
            $_SESSION['msg']="Login Failed, User not found!";
            header('Location:user_login_page.php');
        }

        else{
            $res=mysqli_fetch_array($query);
            $_SESSION['id']=$res['user_id'];
            header('Location: user_index.php');
            
            $_SESSION['id']=$id;
            $remarks="has logged in the system at ";  
            mysqli_query($dbconn,"INSERT INTO logs(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($dbconn));
            }
        }
?>
