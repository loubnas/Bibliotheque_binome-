<?php 
session_start();
include ("connexion.php"); 
$ErreurFullname = $ErreurAdresse = $ErreurNumber =$ErreurEmail= $ErreurPassword="";

if(isset($_POST['Fullname'])){
    $FULLname=$_POST['Fullname'];
    $Adresse=$_POST['Adresse']; 
    $Number=$_POST['Number'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
 }

 if(isset($_POST['btn'])){
    if(empty($FULLname)){
        $ErreurFullname="Name is required !";
    }
    
    if(empty($Adresse)){ 
        $ErreurAdresse="Adresse is required !";
    }
    if(empty($Number)){
       $ErreurNumber="Number is required !";
    }
    if(empty($Email)){
        $ErreurEmail="Email is required !";
     }
     if(empty($Password)){
        $ErreurPassword="Password is required !";
     }

     //INSERT :
     if($FULLname!="" &&  $Adresse!="" && $Number!="" && $Email!="" &&$Password!=""){
        $query="INSERT INTO users(`fullName`, `adresse`, `number`, `email`, `pwd`) VALUES ('$FULLname','$Adresse',$Number,'$Email','$Password')";
        $result=mysqli_query($connect,$query);
        if($result){
            $_SESSION['email']=$Email;
            header('location:index.php');
        }
        else{
            header('location:signUp.php');
        }
    }


       
}