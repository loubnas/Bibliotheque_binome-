<?php
    session_start();
    if(empty($_SESSION['email'])){
        header('location:signIn.php');   
    }
    include('connexion.php');

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query="SELECT * FROM `author` where id=$id";
        $result=mysqli_query($connect,$query);
        while($row=$result->fetch_assoc()){
            $cin=$row['cin'];
            $fullname=$row['FullName'];
            $date=$row['date_birth'];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Authors</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"> 
	<link rel="stylesheet" type="text/css" href="css/ManageAuthors.css"> 
    <meta name="MANAGE AUTHORS " content="LIBRARY OF BOOKS" >
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
        <img src="images/LOGO.png" alt="this is a logo ">
        <ul id="navcontenu" class=" " vue="" >
            <li > <a href="index.php" >Home</a> </li>
            <li> <a href="gallery.php"> <span class="titlegallery">Gallery</span></a> </li>
            <li><a href="book.php"><span class="titlebooks">Books </span></a></li>
            <li > <a href="authors.php" class="active" ><span class="titleauthors">Authors</span></a></li>
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
    <main>
        <div class="MAuthor">   
            <h3> Manage an Author </h3>
        </div>
        <form id="FORMULAIRE" method="POST" action="authorPHP.php" >
            <div class="FRM">
                <div>
                    <label for="fullName" class="plus"> Ful-Name : </label> 
                    <input type="hidden" name="id"  value="<?=$_GET['id']?>"/>
                    <input type="text" id="fullName" name= "FULLname" value="<?=$fullname?>" placeholder=" Full name ..">
                    <div> 
                        <span id ="ErreurFullname"> </span> 
                    </div>
                </div>
                <div>
                    <label for="CIN" class="plus"> CIN : </label> 
                    <input type="text" id="CIN" name="Cin" value="<?=$cin?>" placeholder="Put your CIN.."> <br>
                    <div> 
                        <span id ="ErreurCIN"> </span> 
                    </div>
                </div> 
            </div>
        <label for="Date_birth"> Date of Birth : </label> 
        <input type="date" id="Date_birth" name="dateofBirth" value="<?=$date?>" placeholder="Enter your date of birth..">
        <div> 
            <span id ="ErreurDate_birth"> </span> 
            </div>
            <div class="btn">
                <input type="submit" name="update"  id="bouton-add"  value="UPDATE" >
            </div>
        </form>
    </main>
</body>
</html>