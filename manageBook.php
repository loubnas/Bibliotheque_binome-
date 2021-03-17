<?php 
    include ("connexion.php");
    if(isset($_GET['idB'])){
        $idB=$_GET['idB'];
        $query="SELECT * FROM `bookauthor` where id=$idB";
        $result=mysqli_query($connect,$query);
        while($row=$result->fetch_assoc()){
            $idA=$row['idAuthor'];
        }
        $requette="SELECT bookauthor.id as idBA,book.id as idB,author.id as idA,author.FullName,book.nameBook,book.price,book.date,book.image FROM author,book,bookauthor WHERE author.id=bookauthor.idAuthor AND book.id=bookauthor.idBook";
        $result=mysqli_query($connect,$requette);
        while($row=$result->fetch_assoc()){
            $idAuthor=$row['idA'];
            $idBook=$row['idB'];
            $idBookAuthor=$row['idBA'];;
            $fullName=$row['FullName'];
            $bookName=$row['nameBook'];
            $price=$row['price'];
            $dateBook=$row['date'];
            $cover=$row['image'];
        }
    }
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
               <li><a href="signUp.php"><input type="submit" value="Sign up" name="Sign up" ></a> </li> 
               <li><a href="signin.php"><input type="submit" value="Sign in" name="Sign in"></a> </li>
            </ul>                            	 	
    </header>
    <form action="bookPHP.php" method="POST">
        <content>
            <div>
                <h2>Manage A Book</h2>
            </div>
            <div class="generalContentDiv">
                <div class="contentDiv">
                    <div class="miniContentDiv">
                        <label>Name :</label><br><br>
                        <input type="hidden" name="idB" value="<?= $_GET["idB"]?>">
                        <input type="text" value="<?=$bookName?>" id="NameBook" class="inptSelect" name="nameBook"  placeholder="Enter a Name...">
                        <div> <span id ="ErreurNomBook"> </span> </div>
                    </div>
                    <div class="miniContentDiv">
                        <label>Date :</label><br><br>
                        <input type="date" id="date" value="<?=$dateBook?>" name="date_birth" class="inptSelect">
                        <div> <span id ="ErreurDate"> </span> </div>
                    </div>
                </div>

                <div class="contentDiv">
                    <div class="miniContentDiv">
                        <label>Price :</label><br><br>
                        <input type="text" id="price" value="<?=$price?>" class="inptSelect" name="price" placeholder="Enter a Price...">
                        <div> <span id ="ErreurPrice"></span> </div>
                    </div>
                    <div class="miniContentDiv">
                        <label>Cover :</label><br><br>
                        <input type="file" id="cover" value="<?=$cover?>" name="cover" class="files" accept=".png, .jpg, .jpeg" >
                        <div>
                            <span id ="erreur"></span> 
                        </div>
                    </div>
                </div>

                <div class="contentDiv">
                    <input type="submit" name="update" value="Submit" id="bntAddBook" class="inptSelect btn" ><br>
                </div>
                <div class="MyContentDiv">
                    <label>Authors :</label><br><br>
                    <select class="inptSelect" id="select" name="selectAuthor">
                        <option value="<?=$idAuthor?>"><?=$fullName?></option>
                    <?php
                        $query="SELECT * FROM author";
                        $result=mysqli_query($connect,$query);
                        while($row=$result->fetch_assoc()){
                        echo"<option value='".$row["id"]."'>".$row["FullName"]."</option>";
                            }
                    ?>
                    </select>
                    <div> 
                        <span id ="ErreurSelect"></span> 
                    </div>
                    
                    <div class="bouton">
                        <input type="submit" value="Add" name="addauthor" id="btn1">
                  </div>

                </div> 
            </div>

            <table>
            <tr bgcolor="#9ED2C1">
                <td> id</td>
                <td > idBook </td>
                <td> idAuthor</td>
                <td> Delete </td>
            </tr>
            <?php
                $id=$_GET["idB"];
                 $query="SELECT * FROM `bookauthor` WHERE idBook=$id";
                $result=mysqli_query($connect,$query);
                while($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["idBook"] ?></td>
                    <td><?php echo $row["idAuthor"] ?></td>
                    <td><a href="<?php echo "bookPHP.php?idba=".$row["id"] ?>"><img src="images/delete-button.png" alt="Delete" class="icon" name="delete" ></a></td>
                </tr>
            <?php    }?> 
           
        </table>
        </content>
    </form>
    
</body>
<script src="manageBook.js"></script>
</html>