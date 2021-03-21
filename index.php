<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>B O O K S    L I B R A R Y </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"> 
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="BOOKS LIBRARY" content="LIBRARY OF BOOKS" >
	<meta name="keywords" content="LIBRARY, BOOKS, GALLERY,AUTHORS">
	<meta name="description" content="THIS IS A LIBRARY OF BOOKS ">
</head>
<body>	
	<script src="js/nav.js"></script>
    <!-- header -->
    <header>	
        <svg class="iconenav" viewBox="0 0 100 80" width="40" height="40" fill="#2DA07A" onclick="nav()">
            <rect width="100" height="20"></rect>
            <rect y="30" width="100" height="20"></rect>
            <rect y="60" width="100" height="20"></rect>
        </svg> 
        <img src="images/LOGO.png" alt="this is a logo">
        <ul id="navcontenu" class=" " vue="" >
            <li > <a href="index.php" class="active">Home</a> </li>
            <li> <a href="gallery.php"> <span class="titlegallery">Gallery</span></a> </li>
            <li><a href="book.php"><span class="titlebooks">Books </span></a></li>
            <li > <a href="authors.php"><span class="titleauthors">Authors</span></a></li>
            <?php 
                if(empty($_SESSION['email'])){
                    echo"<li><a href='signUp.php'><input type='submit' value='Sign up' name='Sign up' ></a></li>";
                    echo"<li><a href='signIn.php'><input type='submit' value='Sign in' name='Sign in'></a></li>"; 
                }else{
                    echo"<li><a href='deconnexion.php'><input type='submit' value='Log Out' name='Log Out'></a></li>";  
                }
            ?>
        </ul>                            	 	
    </header>
    <!-- end header -->
    <div class="generalDiv">
        <div class="div1">
            <h2>BOOKS<span class="MYLIB">LIBRARY</span></h2>
            <p> 
                BOOKS LIBRARY  is a soft of vast coffee shop yet one can stay all day and feel
                good even if one buys nothing at all. That's the difference. It is a place of
                welcome for everyone rather than for "customers."
            </p> 
        </div>
        <div class="div2">
            <img src="images/pic.png" alt="background">
        </div>
    </div>
</body>
</html>