<?php
    session_start();
    include ("connection.php");
    $query = "SELECT * FROM product";

?>



<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/main.css">
<title>Fashion Hub</title>
<script src="https://kit.fontawesome.com/9269e9eed4.js" crossorigin="anonymous"></script>
<script>
    function stickyMenu(){
        var sticky=document.getElementById('sticky');
        if(window.pageXOffset > 220){
            sticky.classList.add('sticky');
        }
        else{
            sticky.classList.remove('sticky');
        }
    }
    window.onscroll = function(){
        stickyMenu();
    }
</script>
</head>
<body>
    <div class="parallax">
        <div class="page-title">  <img src="images/logo.jpg"> Fashion Hub </div>
    </div>
    <?php include ('usermenu.php') ?>
    <h3 class="title-2">All Products</h3>
    <div class="container">
        <?php if (isset($_SESSION['success_cart'])) : ?>
            <h4 style="color: green; font-weight: bold">
                <?php 
                echo $_SESSION['success_cart']; 
                unset($_SESSION['success_cart']);
                ?></h4> <br>
        <?php endif ?>
        <?php if (isset($_SESSION['checkout_success'])) : ?>
            <h4 style="color: green; font-weight: bold">
                <?php 
                echo $_SESSION['checkout_success']; 
                unset($_SESSION['checkout_success']);
                ?></h4> <br>
        <?php endif ?>
        <?php 
        $result = mysqli_query($db, $query);
        while($data = mysqli_fetch_assoc($result)){ ?>
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
                        Quantity:
                        <select name="quantity" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br><br>
                        <input type="hidden" name="p_id" value="<?=$data['id']?>">
                        <input type="hidden" name="p_name" value="<?=$data['name']?>">
                        <input type="hidden" name="p_category" value="<?=$data['category']?>">
                        <input type="hidden" name="p_price" value="<?=$data['price']?>">
                        <input type="hidden" name="p_image" value="<?=$data['image']?>">
                        <input type="hidden" name="from_products" value="from_products">
                        <input type="submit" name="add_to_cart" value="Shop Now">
                    </form>
                </div>
            <?php 
        }?>    
    </div>


<!--Home Page Ends-->

<!--footer starts-->
    <div class="parallax">
        <div class="footer">
            <div class="quick-links">
                <div>Locations</div>
                <ul>
                    <li><a href="https://www.google.com.au/maps/place/130+The+Boulevarde,+Wiley+Park+NSW+2195/@-33.9249304,151.0627378,17z/data=!4m13!1m7!3m6!1s0x6b12bbc0c5646bbb:0x5017d681632bd70!2sLakemba+NSW+2195!3b1!8m2!3d-33.9200417!4d151.0771497!3m4!1s0x6b12bbe5e91138c7:0x5851fbe90cf0354c!8m2!3d-33.9246948!4d151.0636252" class="a-links">Lakemba Fashion House</a></li>
                    <li><a href="https://www.google.com.au/maps/place/276+Merrylands+Rd,+Merrylands+NSW+2160/@-33.8349513,150.9870957,17.74z/data=!4m13!1m7!3m6!1s0x6b12bd33b7456a37:0x5017d681632c0d0!2sMerrylands+NSW+2160!3b1!8m2!3d-33.835802!4d150.9865196!3m4!1s0x6b12bd3249da349b:0x4e16adf28d98a86d!8m2!3d-33.8360493!4d150.9865331" class="a-links">Merrylands Fashion House</a></li>
                </ul>
            </div>
            <div class="quick-links">
                <div>Careers</div>
                <ul>
                    <li><a href="" class="a-links">Packing staff</a></li>
                    <li><a href="" class="a-links">Delivery person</a></li>
                    <li><a href="" class="a-links">Shelf Fillers</a></li>
                </ul>
            </div>
            <div class="quick-links">
                <div>Quick Links</div>
                <ul>
                    <li><a href="FAQ.html" class="a-links">FAQ</a></li>
                    <li><a href="contactus.html" class="a-links">Help</a></li>
                    <li><a href="privacyPolicy.html" class="a-links">Privacy Policy</a></li>
                    <li><a href="T&A.html" class="a-links">Terms and Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyrights">
    <i class="fas fa-copyright"></i>2021 By Fashion Hub Group
    </div>
<!--footer ends-->        
</body>
</html>