<?php
// including the database connection file
    session_start();
    include("../config/dbconn.php");
    $email=$_POST['email'];
    $password=$_POST['password'];
    $pass1=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass1=$salt.$pass1;
    /*Testing output
    echo $email;
    echo $password;*/
    
    if(isset($_POST['submit']))
    {
            $query = "SELECT * from receiver";
            $result = mysqli_query($dbconn,$query);
            while($res = mysqli_fetch_array($result))
            {

            /*
            Testing outputs
            echo $res[0]; //id
            echo $res[1]; //first name
            echo $res[2]; //last name  
            echo $res[3]; //email
            echo $res[4]; //bloodtype
            echo $res[5]; //password
            */
            if($res[3]==$email&&$res[5]==$pass1)
            {
                $_SESSION['email']=$res[3];
                $_SESSION['bloodtype']=$res[4];
                $_SESSION['receiver']=true;
                echo "<font color='green'>Succesfully logged in!</font><br/>"; 
                header("Location: ./rhome.php");              
            }
        }
            echo "<font color='red'>Failed!</font><br/>";
           
    }
else echo "<font color='red'>Failed submit button not set!</font><br/>";
?>
