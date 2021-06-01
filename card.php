<?php
    session_start();
    include ("connection.php");
    $cart = $_SESSION['items'];
    $sn_count = 1;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .cc-img {
        margin: 0 auto;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h3 class="text-center">Payment Details</h3>
                            <img class="img-responsive cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="server.php" method="post">
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Customer Name</span></label>
                                        <input type="text" class="form-control" placeholder="John" name="cust_name" required />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>TotalBill</label>
                                        <input type="tel" class="form-control" value="$ <?= $_SESSION['bill_amt'] ?>" disabled/>
                                        <input type="hidden" name="total_bill" value="<?= $_SESSION['bill_amt'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Email</span></label>
                                        <input type="email" class="form-control" placeholder="john@gmail.com" name="email" required/>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Bank Name</span></label>
                                        <input type="text" class="form-control" placeholder="John" name="bank_name" required/>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>CV CODE</label>
                                        <input type="number" class="form-control" placeholder="CVC" name="card_cvc" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Purchase Bill</label><br>                                        
                                        <textarea rows="10" cols="100" disabled><?php 
                                                foreach($_SESSION['items'] as $key=>$value){
                                                    $purchases_info = $value['name']. " * ". $value['quantity']. " : $" . $value['price']*$value['quantity'].","."\n";
                                                    echo $purchases_info;
                                                }
                                            ?></textarea>

                                        <textarea rows="10" cols="100" hidden name="purchases"><?php 
                                                foreach($_SESSION['items'] as $key=>$value){
                                                    echo $value['name']. " * ". $value['quantity']. " : $" . $value['price']*$value['quantity'].","."\n";
                                                }
                                            echo $_SESSION['bill_amt']?></textarea>
                                    </div>
                                </div>
                            </div><br>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-warning btn-lg btn-block" type="submit" name="process_payment">Process Payment</button>
                            </div>
                        </div><br>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>