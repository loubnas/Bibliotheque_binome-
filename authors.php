<?php 
session_start();
if($_SESSION['email']){
    echo"<style>#sign{visibility:hidden;}#log{visibility:visible;}</style>";    
}else{
    header('location:signIn.php');
}
    include ("authorPHP.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceuil </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css"> 
	<link rel="stylesheet" type="text/css" href="css/authors.css">
</head>
<body>	
    <script>
        function nav(){
            var nav = document.getElementById("navcontenu");
            if(nav.getAttribute("vue")=="active")
            {
                document.getElementById("navcontenu").classList.remove("menu");
                nav.setAttribute("vue","");
            }else
            {
                nav.setAttribute("vue","active");
                document.getElementById("navcontenu").classList.add("menu");

            }
			 }
    </script>
<!-- header -->
 <header>
    <svg class="iconenav" viewBox="0 0 100 80" width="40" height="40" fill="#2DA07A" onclick="nav()">
        <rect width="100" height="20"></rect>
        <rect y="30" width="100" height="20"></rect>
        <rect y="60" width="100" height="20"></rect>
      </svg> 	 
 	<img src="images/LOGO.png">
	<ul id="navcontenu" class=" " vue="" >
            <li > <a href="index.php" >Home</a> </li>
            <li> <a href="gallery.php"> <span class="titlegallery">Gallery</span></a> </li>
            <li><a href="book.php"><span class="titlebooks">Books </span></a></li>
            <li > <a href="authors.php" class="active"><span class="titleauthors">Authors</span></a></li>
            <li id="sign"><a href="signUp.php"><input type="submit" value="Sign up" name="Sign up" ></a></li> 
            <li id="sign"><a href="signIn.php"><input type="submit" value="Sign in" name="Sign in"></a></li>
            <li id="log"><a href="deconnexion.php"><input type="submit" value="Log Out" name="Log Out"></a></li>
         </ul>                            	 	
 </header>

 <!-- end header -->
    <main>
        <div class="tform">   
            <h3> Add an Author </h3>
        </div>
        <form id="formulaire" method="POST" action="authors.php">
            <div class="frm">
                <div>
                    <label for="fullName" class="plus"> Ful-Name : </label> 
                    <input type="text" id="fullName" name= "FULLname" placeholder=" Full name .."> 
                    <div>
                        <span id ="erreur"><?= $ErreurFullname ?> </span>
                    </div>
                </div>
                <div>
                    <label for="CIN" class="plus"> CIN : </label> 
                    <input type="text" id="CIN" name="Cin" placeholder="Put your CIN.." > <br>
                    <div>   
                        <span id ="erreur"> <?= $ErreurCIN ?> </span> 
                    </div>
                </div>
            </div>
            <label for="Date_birth"> Date of Birth : </label> <br>
            <input type="date" id="Date_birth" name="dateofBirth" placeholder="Enter your date of birth..">
            <div> 
                <span id ="erreur"> <?= $ErreurDate_birth?> </span> 
            </div>
            <div class="btn">
                <input type="submit"  name="btn" value="Add">
            </div>
        </form>  


        <div class="ttable">   
            <h3> Manage an Author </h3>
        </div>

        <table>
            <tr bgcolor="#9ED2C1">
                <td > Full-Name </td>
                <td> CIN </td>
                <td> Date of birth</td>
                <td colspan="2"> Manage a Author </td>
            </tr>
            
            <?php
                $query="SELECT * FROM author";
                $result=mysqli_query($connect,$query);
               
                while($row=$result->fetch_assoc()){
                echo '<tr><td>'.$row["FullName"].'</td><td>'.$row["cin"].'</td><td>'.$row["date_birth"].'</td><td ><a href="manageAuthor.php?id='.$row["id"].'"><img src="images/edit-button.png" alt="Edit" class="icon"></a></td><td><a href="authors.php?id='.$row["id"].'"><img src="images/delete-button.png" alt="Delete" class="icon" name="delete" ></a></td></tr>';
                }
                
            ?>
          
            

        </table>

    </main>


</body>

</html>