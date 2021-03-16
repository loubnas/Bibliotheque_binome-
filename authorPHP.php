<?php 
include ("connexion.php"); 
$ErreurFullname = $ErreurCIN = $ErreurDate_birth="";

if(isset($_POST['FULLname'])){
    $FULLname=$_POST['FULLname'];
    $CIN=$_POST['Cin']; 
    $Date_birth=$_POST['dateofBirth'];
 }


if(isset($_POST['btn'])){
       if(empty($FULLname)){
           $ErreurFullname="Name is required !";
       }
       
       if(empty($CIN)){ 
           $ErreurCIN="CIN is required !";
       }
       if(empty($Date_birth)){
          $ErreurDate_birth="Date of birth is required !";
       }

       // Insert :
       if($FULLname!="" && $CIN!="" && $Date_birth!=""){
         $query="INSERT INTO `author`(`cin`, `FullName`, `date_birth`) VALUES ('$CIN','$FULLname','$Date_birth')";
         $result=mysqli_query($connect,$query);
         
        
       }
       header('location:authors.php');
}

      //Delete :
       if(isset($_GET['id'])){
         $requeste="DELETE FROM book WHERE id IN (SELECT idBook from bookauthor where idAuthor='".$_GET['id']."')";
         $result=mysqli_query($connect,$requeste);
         $query="DELETE FROM author WHERE  id= '".$_GET['id']."'";
         $result=mysqli_query($connect,$query);
       }

    
      //UPDATE:
      if(isset($_POST['update'])){
         $query="UPDATE author set FullName='".$_POST["FULLname"]."', cin='".$_POST["Cin"]."', date_birth='".$_POST["dateofBirth"]."' where id=".$_POST['id']."";
        $result=mysqli_query($connect,$query);
        header('location:authors.php');
      }
     
     









?>