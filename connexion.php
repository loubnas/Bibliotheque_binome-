<?php
$localhost="localhost";
$user="root";
$password="";
$database="bibliotheque";

$connect= mysqli_connect($localhost,$user,$password,$database);
 if($connect){
     echo "connect";
 }
 else{
     echo "non connect";
 }


?>