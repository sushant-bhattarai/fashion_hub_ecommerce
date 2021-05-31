<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['login_msg'] = "You must log in first!";
  	header('location: account.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: account.php");
  }
  
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/main.css">
<title>Fashion Hub Admin</title>
<script src="https://kit.fontawesome.com/9269e9eed4.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body>
    <?php include ("adminmenu.html") ?>
<!--Home Page Begins-->

<div class="container">
    <?php if (isset($_SESSION['success'])) : ?>
        <label style="color: green; font-weight: bold">
            <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
            ?> <br>
        </label>
    <?php endif ?>
    <?php if (isset($_SESSION['msg'])) : ?>
        <label style="color: yellow; font-weight: bold">
            <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?> <br><br>
        </label>
    <?php endif ?>
    <?php if (isset($_SESSION['add_product'])) : ?>
        <label style="color: green; font-weight: bold">
            <?php 
            echo $_SESSION['add_product']; 
            unset($_SESSION['add_product']);
            ?> <br>
        </label>
    <?php endif ?>
    <?php if (isset($_SESSION['add_product_fail'])) : ?>
        <label style="color: red; font-weight: bold">
            <?php 
            echo $_SESSION['add_product_fail']; 
            unset($_SESSION['add_product_fail']);
            ?> <br>
        </label>
    <?php endif ?>
    <div class="content">
        <div class="register">
            <h2>Add Product</h2>
        
        <form method="post" action="server.php" enctype="multipart/form-data">
            <div>
                <label for="pname">Product Name :</label>
                <input type="text" name="name" id="pname" placeholder="Product Name" required>
            </div>
            <br>
            <div>
                <label for="category">Category :</label>
                <select name="category" id="category">
                    <option value="Cap">Cap</option>
                    <option value="Chain">Chain</option>
                    <option value="Shirt">Shirt</option>
                    <option value="Watch">Watch</option>
                    <option value="Pant">Pant</option>
                    <option value="Socks">Socks</option>
                    <option value="Shoes">Shoes</option>
                </select>
            </div>
            <br>
            <div>
                <label for="price">Price :</label>
                <input type="text" name="price" id="price" placeholder="$24" required>
            </div>
            <br>
            <div>
                <label for="rating">Rating :</label>
                <input type="number" name="rating" id="rating" placeholder="1-5" min="1" max="5" required>
            </div>
            <br>
            <div>
                <label for="image">Image :</label>
                <input type="file" name="image" id="image" required>
            </div>
            <br>
            <input type="submit" class="submit" id="submit" name="product_submit">
            <br>
 
        </form>
        </div>
    </div>
</body>
</html>