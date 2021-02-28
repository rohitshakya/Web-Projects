<?php
// including the database connection file
    session_start();
    include("../config/dbconn.php");
    $_SESSION['email'];
    $_SESSION['hospital'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $pass1=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass1=$salt.$pass1;

    /* Testing Outputs
    echo $email;
    echo $password;
    */

    if(isset($_POST['submit']))
    {
   // checking empty fields
    if(empty($email) || empty($password)) {    
            
        if(empty($email)) {
            echo "<font color='red'>Email field is empty!</font><br/>";
        }

        if(empty($password)) {
            echo "<font color='red'>Password field is empty!</font><br/>";
        }   
       }
        else
        {
            $query = "SELECT email,password from hospital";
            $result = mysqli_query($dbconn,$query);
            while($res = mysqli_fetch_array($result))
            {
            /* Testing outputs
            echo $res[0];
            echo $res[1];
            */
            if($res[0]==$email&&$res[1]==$pass1)
            {
                $_SESSION['email']=$email;
                $_SESSION['hospital']=true;
                echo "<font color='green'>Succesfully logged in!</font><br/>"; 
                header("Location: ./hhome.php");              //redirection to homepage
            }
        }
                header("Location: ./hospital_login.php"); //redirection to login page if login failed
            
        }   
}
else echo "<font color='red'>Failed submit button not set!</font><br/>";
?>
