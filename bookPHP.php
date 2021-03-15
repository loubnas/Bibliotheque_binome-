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
//DELETE :
if(isset($_GET['idB'])){
    $requete="DELETE FROM book WHERE id=".$_GET['idB'];
    $result=mysqli_query($connect,$requete);
}
// UPDATE :
if(isset($_POST['update'])){
   $query="UPDATE book set nameBook='".$_POST["nameBook"]."', price=".$_POST["price"].", date='".$_POST["date_birth"]."', image='".$_POST["cover"]."' where id=".$_POST['idBA']."";
   $result=mysqli_query($connect,$query);
   $requeste="UPDATE bookauthor set idAuthor=".$_POST["selectAuthor"]." where id=".$_POST['idBA']."";
   $result=mysqli_query($connect,$requeste);
   header('location:book.php');
 }
?>
