<?php 
  session_start(); 
  include ('connection.php');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['login_msg'] = "You must log in first!";
  	header('location: account.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: account.php");
  }
  $query ='SELECT * FROM orders';
  $result = mysqli_query($db, $query);
  
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/main.css">
<title>Fashion Hub Admin</title>
<script src="https://kit.fontawesome.com/9269e9eed4.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<style>
td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
</style>
</head>
<body>
    <?php include ("adminmenu.html") ?>
<!--Home Page Begins-->

<div class="container">
    <?php if (isset($_SESSION['msg'])) : ?>
        <label style="color: yellow; font-weight: bold">
            <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?> <br><br>
        </label>
    <?php endif ?>

    <div class="content">
        <h1>Shopping Insights</h1>
        <table style="border-collapse: collapse;
                width:80%; margin-left:10%; margin-right:10%;">
            <tr>
                <th>Customer Name</th>
                <th>Purchases</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Card CVC</th>
                <th>Bank name</th>
                <th>Total Amount</th>
            </tr>
            <?php
                while($data = mysqli_fetch_assoc($result)){
                    $delimeter = ',';
                    $each_item_desc = explode($delimeter , $data['purchases']);
                    // print_r($each_item_desc); die();
            ?>
                    <tr>
                        <td><?= $data['cust_name'] ?></td>
                        <td>
                            <table>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Total Price</th>
                                </tr>
                                <?php foreach($each_item_desc as $data2){ ?>
                                <tr>
                                    <?php 
                                        $product_cat = str_replace('*', ':', $data2);
                                        $individual = explode (':', $product_cat);
                                    ?>
                                    <td><?= $individual[0] ?></td>
                                    <td><?= $individual[1] ?></td>
                                    <td><?= $individual[2] ?></td>
                                </tr>
                                <?php } ?>
                            </table>

                        </td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['phone'] ?></td>
                        <td><?= $data['card_cvc'] ?></td>
                        <td><?= $data['bank_name'] ?></td>
                        <td>$<?= $data['total_bill'] ?></td>
                    </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>