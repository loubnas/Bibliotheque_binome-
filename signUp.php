<?php 
    include ("signUpPHP.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/signUp.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css"> 
    <title>Document</title>
</head>
<!-- header -->
<header>	
    <svg class="iconenav" viewBox="0 0 100 80" width="40" height="40" fill="#2DA07A" onclick="nav()">
        <rect width="100" height="20"></rect>
        <rect y="30" width="100" height="20"></rect>
        <rect y="60" width="100" height="20"></rect>
      </svg> 
 	<img src="images/LOGO.png">
	<ul id="navcontenu" class=" " vue="" >
            <li > <a href="index.php" class="active">Home</a> </li>
            <li> <a href="gallery.php"> <span class="titlegallery">Gallery</span></a> </li>
            <li><a href="book.php"><span class="titlebooks">Books </span></a></li>
            <li > <a href="authors.php"><span class="titleauthors">Authors</span></a></li>
            <li><a href="signUp.php"><input type="submit" value="Sign up" name="Sign up" ></a> </li> 
            <li><a href="signin.php"><input type="submit" value="Sign in" name="Sign in"></a> </li>
        
         </ul>                            	 	
 </header>
<body>

<img class="wave" src="images/wave.png">
<div class="image">
  <img src="images/form.svg">
</div>
<div class="nm">
  <img src="images/undraw_educator_oxfm.svg">
</div>
 

<form  id="formulaire" method="POST" action="signUP.php">
        <label class="mylabel"> Fullname </label>
        <input type="text" id="Fullname" name="Fullname" placeholder="Put your fullname.."> <br>
        <div>
          <span id ="erreur"><?= $ErreurFullname ?> </span>
        </div>
        <label> Adresse </label>
        <input type="text" id="Adresse" name="Adresse" placeholder="Put your adresse.."><br>
        <div>
          <span id ="erreur"><?= $ErreurAdresse ?> </span>
        </div>
        <label> Number </label>
        <input type="number" id="Number" name="Number" placeholder="Put your number.."><br>
        <div>
          <span id ="erreur"><?= $ErreurNumber ?> </span>
        </div>
        <label> Login </label>
        <input type="email" id="Login" name="Email" placeholder="Put your login.."><br>
        <div>
          <span id ="erreur"><?= $ErreurEmail ?> </span>
        </div>
        <label> Password </label>
        <input type="password" id="Password" name="Password" placeholder="Put your password..">
        <div>
          <span id ="erreur"><?= $ErreurPassword ?> </span>
        </div>
        <input type="submit" class="btn" name="btn" value="Sign up">
 
</form>  
    
    </body>
</html>