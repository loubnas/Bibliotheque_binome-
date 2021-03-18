<?php 
session_start();
if(empty($_SESSION['email'])){
    header('location:signIn.php');   
}
include ("bookPHP.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/book.css" rel="stylesheet">
    <title>Document</title>
    
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
    <header>	
        <svg class="iconenav" viewBox="0 0 100 80" width="40" height="40" fill="#2DA07A" onclick="nav()">
            <rect width="100" height="20"></rect>
            <rect y="30" width="100" height="20"></rect>
            <rect y="60" width="100" height="20"></rect>
          </svg>  
        <img src="images/LOGO.png">
       <ul id="navcontenu" class=" " vue="" >
               <li > <a href="index.php">Home</a> </li>
               <li> <a href="gallery.php"> <span class="titlegallery">Gallery</span></a> </li>
               <li><a href="book.php" class="active"><span class="titlebooks">Books </span></a></li>
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
    <content>
        <form action="book.php" method="POST" enctype="multipart/form-data">
        <div>
            <h2>Add A Book</h2>
        </div>
        <div class="generalContentDiv">
            <div class="contentDiv">
                <div class="miniContentDiv">
                    <label>Name :</label><br><br>
                    <input type="text" id="NameBook" name="NameBook" class="inptSelect" placeholder="Enter a Name...">
                    <div> 
                        <span id ="erreur"> <?= $ErreurNameBook ?> </span> 
                    </div>
                    
                </div>
                <div>
                    <label>Authors :</label><br><br>
                    <select class="inptSelect"  id="select" name="Author">
                        <option></option>
                        <?php
                            $query="SELECT * FROM author";
                            $result=mysqli_query($connect,$query);
                            while($row=$result->fetch_assoc()){
                               echo"<option value='".$row["id"]."'>".$row["FullName"]."</option>";
                            }
                            ?>
                    </select>
                    <div> 
                        <span id ="erreur"> <?= $ErreurAuthor ?></span>
                     </div>
                </div>
            </div>
            <div class="contentDiv">
                <div class="miniContentDiv">
                    <label>Date :</label><br><br>
                    <input type="date" id="date" name="date" class="inptSelect" name="date">
                    <div> <span id ="erreur"> <?= $ErreurDate ?> </span> </div>
                </div>
                <div>
                    <label>Price :</label><br><br>
                    <input type="text" id="price" value="" name="price" class="inptSelect"  placeholder="Enter a Price...">
                    <div> 
                        <span id ="erreur"><?= $ErreurPrice ?></span> 
                    </div>
                </div>
            </div>
            <div class="contentDiv">
                <div class="contentDivPlus">
                    <label>Cover :</label><br>
                    <input type="file" id="cover" value="" name="cover" class="files" accept=".png, .jpg, .jpeg" >
                    <div>
                         <span id ="erreur"><?= $ErreurCover ?></span> 
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" value="Add" name="BTN" id="bntAddBook" class="inptSelect btn" >
            </div>
        </div>
        
        </form>

          <table>
            <tr bgcolor="#9ED2C1">
                <td> Cover </td>
                <td > Name </td>
                <td> Author</td>
                <td> Price</td>
                <td> Date </td>
                <td colspan="2"> Manage a Book </td>
            </tr>
            <?php
                $query="SELECT bookauthor.id as idBA,book.id as idB,author.id as idA,author.FullName,book.nameBook,book.price,book.date,book.image FROM author,book,bookauthor WHERE author.id=bookauthor.idAuthor AND book.id=bookauthor.idBook";
                $result=mysqli_query($connect,$query);
                while($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td><img src="images_upload/<?php echo $row["image"] ?>" alt="<?php echo $row["image"] ?>" class="icon"></td>
                    <td><?php echo $row["nameBook"] ?></td>
                    <td><?php echo $row["FullName"] ?></td>
                    <td><?php echo $row["price"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                    <td><a href="<?php echo "manageBook.php?idB=".$row["idB"] ?>"><img src="images/edit-button.png" alt="Edit" class="icon"></a></td>
                    <td><a href="<?php echo "book.php?idB=".$row["idB"] ?>"><img src="images/delete-button.png" alt="Delete" class="icon" name="delete" ></td>
                </tr>
            <?php    }?> 
           
        </table>
    </content>
</body>
</html>