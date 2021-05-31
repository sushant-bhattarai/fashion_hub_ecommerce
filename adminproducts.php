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
  
  include ("connection.php");
  $query = "SELECT * FROM product";

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
    <div class="container">
    <?php if (isset($_SESSION['delete_product'])) : ?>
        <label style="color: green; font-weight: bold">
            <?php 
            echo $_SESSION['delete_product']; 
            unset($_SESSION['delete_product']);
            ?> <br>
        </label>
    <?php endif ?>
    <?php if (isset($_SESSION['delete_product_fail'])) : ?>
        <label style="color: red; font-weight: bold">
            <?php 
            echo $_SESSION['delete_product_fail']; 
            unset($_SESSION['delete_product_fail']);
            ?> <br>
        </label>
    <?php endif ?>
        <div class="categories">
            <a href="#caps">
                <!-- <img src="images/103.jpg" class="item-image"/> -->
            <div class="image-title">Caps</div></a>
        </div>
    
        <div class="categories">
            <a href="#chains">
                <!-- <img src="images/chain1.jpg" class="item-image"/> -->
            <div class="image-title">Chains</div>
        </div>    
    
        <div class="categories">
            <a href="#shirts">
                <!-- <img src="images/101.jpg" class="item-image"/> -->
            <div class="image-title">Shirts</div>
        </div>
    
        <div class="categories">
            <a href="#watches">
                <!-- <img src="images/watch1.jpg" class="item-image"/> -->
            <div class="image-title">Watches</div>
        </div>
    
        <div class="categories">
            <a href="#pants">
                <!-- <img src="images/105.jpg" class="item-image"/> -->
            <div class="image-title">Pants</div>
        </div>
    
        <div class="categories">
            <a href="#socks">
                <!-- <img src="images/socks1.png" class="item-image"/> -->
            <div class="image-title">Socks</div>
        </div>    
    
        <div class="categories">
            <a href="#shoes">
                <!-- <img src="images/102.jpg" class="item-image"/> -->
            <div class="image-title">Shoes</div>
        </div>
</div>

<!---caps--->
<div class="container" id="caps">
    <h3 class="title">Caps</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Cap') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>
<!---chains--->
<div class="container" id="chains">
    <h3 class="title">Chains</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Chain') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>
<!---Shirts--->
<div class="container" id="shirts">
    <h3 class="title">Shirts</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Shirt') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>

<!---watches--->
<div class="container" id="watches">
    <h3 class="title">Watches</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Watch') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>
<!---Pants--->
<div class="container" id="pants">
    <h3 class="title">Pants</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Pant') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>

<!---Socks--->
<div class="container" id="socks">
    <h3 class="title">Socks</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Socks') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>

<!---Shoes--->
<div class="container" id="shoes">
    <h3 class="title">Shoes</h3>
    <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ 
            if($data['category'] == 'Shoes') { ?>
                <div class ="categories">
                    <img src="images/products/<?=$data['image']?>" class="item-image">
                    <h4><?= $data['name']?></h4>
                    <div class="rating">
                        <?php for($i=1; $i<=$data['rating']; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                        <?php for($i=1; $i<=5-$data['rating']; $i++){?>
                            <i class="fa fa-star-o"></i>
                        <?php } ?>
                    </div>
                    <p>$ <?= $data['price']?></p>
                    <form action="server.php" method="post">
                        <input type="hidden" name="product_id" value="<?=$data['id']?>">
                        <input type="hidden" name="image_name" value="<?=$data['image']?>">
                        <input onclick="return confirm('Are you sure you want to delete this product?');" type="submit" name="delete_product" value="Delete Product">
                    </form>
                </div>
            <?php } 
        }?>    
</div>