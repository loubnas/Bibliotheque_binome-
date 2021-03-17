<?php
session_start();
if($_SESSION['email']){
    session_unset($_SESSION['email']);
    session_destroy();
    header('location:index.php');
}
?>