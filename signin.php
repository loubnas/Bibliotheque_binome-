<?php
include ("signInPHP.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="SIGNIN" content="LIBRARY OF BOOKS" >
	<meta name="keywords" content="LIBRARY, BOOKS, GALLERY,AUTHORS">
	<meta name="description" content="THIS IS A LIBRARY OF BOOKS ">
</head>
<body>
	<header>	
		<svg class="iconenav" viewBox="0 0 100 80" width="40" height="40" fill="#2DA07A" onclick="nav()">
			<rect width="100" height="20"></rect>
			<rect y="30" width="100" height="20"></rect>
			<rect y="60" width="100" height="20"></rect>
		</svg> 
		<img src="images/LOGO.png" alt="this is a logo">
		<ul id="navcontenu" class=" " vue="" >
			<li > <a href="index.php">Home</a> </li>
			<li> <a href="gallery.php"> <span class="titlegallery">Gallery</span></a> </li>
			<li><a href="book.php"><span class="titlebooks">Books </span></a></li>
			<li > <a href="authors.php"><span class="titleauthors">Authors</span></a></li>
			<li><a href="signUp.php"><input type="submit" value="Sign up" name="Sign up" ></a> </li> 
			<li><a href="signIn.php"><input type="submit" value="Sign in" name="Sign in"></a> </li>
		</ul>                            	 	
	</header>
	<img class="wave" src="images/wave.png" alt="ware image">
	<div class="container">
		<div class="img">
			<img src="images/bg.svg" alt="bg images">
		</div>
		<div class="login-content">
			<form action="signIn.php" method="post">
			<form action="">
				<img src="images/avatar.svg" alt="this is an avatar">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="email" class="input">
						<div>
                        	<span id ="erreur"><?= $ErreurEmail ?> </span>
                    	</div>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="pwd" class="input">
						<div>
                        	<span id ="erreur"><?= $ErreurPwd ?> </span>
                    	</div>
            	   </div>
            	</div>
            	<input type="submit" name="login" class="btn" value="Login">
            </form>
            <a href="signUp.php"><input type="submit" class="btn1" value="Sign up"></a>
        </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
