<?php 
    include ("connexion.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/gallery.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Document</title>
    <script src="gallery.js"></script>
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
               <li> <a href="gallery.php" class="active"> <span class="titlegallery">Gallery</span></a> </li>
               <li><a href="book.php"><span class="titlebooks">Books </span></a></li>
               <li > <a href="authors.php"><span class="titleauthors">Authors</span></a></li>
               <li><a href="signUp.php"><input type="submit" value="Sign up" name="Sign up" ></a> </li> 
               <li><a href="signin.php"><input type="submit" value="Sign in" name="Sign in"></a> </li>
            </ul>                            	 	
    </header>
     <content>
        <div class="search">
            <div claas="choose_author">
                <label id="label">Choose An Author :</label><br>
                <select id="select" onchange="trieparauthor()">
                    <option></option>
                    <?php
                            $query="SELECT * FROM author";
                            $result=mysqli_query($connect,$query);
                            while($row=$result->fetch_assoc()){
                               echo"<option value='".$row["FullName"]."'>".$row["FullName"]."</option>";
                            }
                            ?>
                </select>
            </div>
            <div>
                <label id="price">Choose A Price :</label><br>
                <div class="test">
                    <div class="inputprice">
                        <input type="text" id="priceMin" placeholder="Min">
                        <input type="text" id="priceMax" placeholder="Max">
                    </div>
                    <input type="button" id="btn" value="Filtrage" onclick="trieparauthor()">
                </div>
            </div>
        </div>

        <div class="container">
                <?php
                    $query="SELECT author.FullName,book.nameBook,book.price,book.date, book.image FROM author,book,bookauthor WHERE author.id=bookauthor.idAuthor AND book.id=bookauthor.idBook";
                    $result=mysqli_query($connect,$query);
                    while($row=$result->fetch_assoc()){?>
                        <div class="divMiniGenerale" name="book">
                            <img src="images_upload/<?php echo $row["image"] ?>" alt="">
                            <div class="miniDiv">
                                <div><label>Name :</label><label><?php echo $row["nameBook"] ?></label></div>
                                <div><label>Author :</label><span name="author"><?php echo $row["FullName"] ?></span></div>
                                <div><label>Date :</label><label><?php echo $row["date"] ?></label></div>
                                <div><label>Price :</label><span name="price"><?php echo $row["price"] ?></span></div>
                            </div>
                        </div>
                <?php   }   ?>
        </div>

    </content> 
    <footer class="myFooter">
            <div>
                <img src="images/iconPhone.png" >
                <label>+21256874894</label>
            </div>
            <div>
                <img src="images/iconEmail.png" >
                <label>BOOK.LIBRARY@gmail.com</label>
            </div>
            <div>
                <img src="images/iconFacebook.png" >
                <label>BOOK.LIBRARY</label>
            </div>
            <div>
                <img src="images/iconInstagrame.png" >
                <label>BOOK.LIBRARY</label>
            </div>
    </footer>
</body>
</html>