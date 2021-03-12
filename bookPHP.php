<?php 
include ("connexion.php"); 

$ErreurNameBook = $ErreurAuthor = $ErreurDate = $ErreurPrice = $ErreurCover="";

if(isset($_POST['NameBook'])){
    $NameBook=$_POST['NameBook'];
    $Author=$_POST['Author']; 
    $date=$_POST['date'];
    $price=$_POST['price'];
    $cover=$_FILES['cover']['name'];
 }

if(isset($_POST['BTN'])){
    if(empty($NameBook)){
        $ErreurNameBook="Name of book  is required !";
    }
    if(empty($Author)){ 
        $ErreurAuthor="Author is required !";
    }
    if(empty($date)){
        $ErreurDate="Date of birth is required !";
    }
    if(empty($price)){
        $ErreurPrice="Price is required !";
    }
    if(empty($cover)){
        $ErreurCover="Cover is required !";
    }


    if($NameBook!=""  &&  $date!="" && $price !="" && $cover !="" && $Author!=""){
         move_uploaded_file($_FILES['cover']['tmp_name'],"images_upload/".$cover);
         $query="INSERT INTO `book`( nameBook, price, date, image) VALUES ('$NameBook',$price,'$date','$cover')";
         $result=mysqli_query($connect,$query);
         $requete="select Max(id) As id from book";
         $result=mysqli_query($connect,$requete);
         while($row=$result->fetch_assoc()){
             $idBook=$row["id"];
         }
         $requeste="INSERT into bookauthor (idBook,idAuthor) values($idBook,$Author)";
         $result=mysqli_query($connect,$requeste);
        header('location:book.php');
    }
}
if(isset($_GET['idB'])){
    $requete="DELETE FROM book WHERE id=".$_GET['idB'];
    $result=mysqli_query($connect,$requete);
}
if(isset($_POST['update'])){
    $query="UPDATE book set nameBook='".$_POST["FULLname"]."', price='".$_POST["Cin"]."', date='".$_POST["dateofBirth"]."' where id=".$_POST['idBA']."";
   $result=mysqli_query($connect,$query);
   header('location:authors.php');
 }
?>
