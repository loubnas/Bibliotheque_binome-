<?php
    session_start();
    include ("connexion.php"); 

    $ErreurEmail = $ErreurPwd ="";

    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
    }
    if(isset($_POST['login'])){
        if(empty($email)){
            $ErreurEmail="Email is required !";
        }
        if(empty($pwd)){ 
            $ErreurPwd="Password is required !";
        }
        if(!empty($email) && !empty($pwd)){
            $query="SELECT * FROM users WHERE email='$email' AND pwd='$pwd'";
            $result=mysqli_query($connect,$query);
            if($result->num_rows==1){
                $_SESSION['email']=$email;
                header('location:index.php');
            }
            else{
                header('location:signin.php');
            }
        }        
    }
?>