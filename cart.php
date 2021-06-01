<?php 
    session_start();
    include ("connection.php");
    $cart = $_SESSION['items'];
    $grand_total = 0;
    $sn_count = 1;
    $cap_count = 0;
    $chain_count = 0;
    $shirt_count = 0;
    $pant_count = 0;
    $watch_count = 0;
    $shoes_count = 0;
    $socks_count = 0;
    $db_total_category = 7;
    echo $_SESSION['success_cart'];
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

<style>
td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
</style>

</head>
<body>
    <div class="parallax">
        <div class="page-title">  <img src="images/logo.jpg"> Fashion Hub </div>
    </div>
    <?php include('usermenu.php') ?><br>
    <?php 
        if($_SESSION['success_cart_ok']){
    ?>
    <table style="border-collapse: collapse;
                width:74%; margin-left:13%; margin-right:13%;">
        <tr>
            <th>S.N.</th>
            <th>Product</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
        <?php foreach($cart as $key=>$value){ ?>
            <tr>
                <td><?= $sn_count?></td>
                <td><?= $value['name'] ?></td>
                <td>
                    <img style="border: 1px solid #ddd; border-radius: 4px;
                            padding: 5px; width: 75px;" 
                            src="images/products/<?=$value['image_name']?>" 
                            alt="<?=$value['image_name']?>">
                </td>
                <td><?= $value['quantity'] ?></td>
                <td>$ <?= $value['price'] ?></td>
                <td>$ <?= $value['price'] *  $value['quantity']?></td>
                <td>
                    <form action="server.php" method="post"><br>
                        <input type="hidden" name="p_id" value="<?= $key ?>">
                        <input type="submit" onclick="return confirm('Are you sure you want to remove product from cart?')" value="Delete from Cart" name="delete_from_cart">
                    </form>
                </td>
                <?php
                    $grand_total +=  $value['price'] *  $value['quantity'];
                    if($value['category'] == "Cap")
                        $cap_count = 1;
                    if($value['category'] == "Chain")
                        $chain_count = 1;
                    if($value['category'] == "Shirt")
                        $shirt_count = 1;
                    if($value['category'] == "Shoes")
                        $shoes_count = 1;
                    if($value['category'] == "Socks")
                        $socks_count = 1;
                    if($value['category'] == "Watch")
                        $watch_count = 1;
                    if($value['category'] == "Pant")
                        $pant_count = 1;
                ?>
            </tr>
            <?php
            $sn_count++;
        }
            ?>
        <tr>
            <td colspan=5 style="text-align: right">Grand Total</td>
            <td>$ <?=$grand_total ?></td>
        </tr>
    </table><br>

    <?php
        $category_total = $cap_count + $chain_count + $shirt_count + $shoes_count + $socks_count
                        + $watch_count + $pant_count;

        if($category_total >=$db_total_category){
    ?>
        <form action="server.php" method="post">
            <input type="hidden" name="grand_total" value="<?= $grand_total ?>">
            <input type="submit" onclick="return confirm('Are you sure you want to checkout?')" value="Checkout" style="float: right; margin-right:168px" name="checkout">
        </form><br>
    <?php
    }else {            
    ?>
    <form action="server.php" method="post">
            <input type="submit" value="Checkout" style="float: right; margin-right:168px" disabled>
    </form><br>
    <div style="float: right; color: #8B8000; margin-right: 168px">
        <label style=" color: red">You cannot checkout! </label><br>
        <label>At least one product from each category required.</label><br>
        <label style=" color: black">Missing product category: </label>
        <div style="color:black">
            <?php
            if($cap_count == 0){?>
                Cap |<?php } ?>
            <?php 
            if($chain_count == 0){?>
                Chain |<?php } ?>
            <?php 
            if($shirt_count == 0){?>
                Shirt |<?php } ?>
            <?php
            if($pant_count == 0){?>
                Pants |<?php } ?>
            <?php
            if($watch_count == 0){?>
                Watch |<?php } ?>
            <?php 
            if($socks_count == 0){?>
                Socks |<?php } ?>
            <?php 
            if($shoes_count == 0){?>
                Shoes <?php } ?>
            <br><br><a href="home.php">Shop more</a>
        </div>
        <br><br>
    </div>
    <br><br><br><br>
    <?php } }else{?>

    <h3 style="text-align: center">Cart Empty! Shop some products by clicking <a href="home.php">here.</a></h3>
    <?php } ?>
    <br><br><br>
       
<!--Home Page Ends-->

<!--footer starts-->
    <div class="parallax">
        <div class="footer">
            <div class="quick-links">
                <div>Locations</div>
                <ul>
                    <li><a href="https://www.google.com/maps/place/Rice+Spice+Dice+Kogarah/@-33.962108,151.13193,15z/data=!4m2!3m1!1s0x0:0x80864818236bf192?sa=X&ved=2ahUKEwjl4pCll__uAhW7IbcAHQxHBXYQ_BIwEnoECCwQBQ" class="a-links">Lakemba Fashion House</a></li>
                    <li><a href="https://www.google.com/maps/place/Rice+Spice+Dice+Auburn/@-33.8489052,151.033478,15z/data=!4m5!3m4!1s0x0:0x6add41c5525eefe9!8m2!3d-33.8489052!4d151.033478" class="a-links">Merrylands Fashion House</a></li>
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