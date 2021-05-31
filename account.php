<?php 
  session_start(); 

  if (isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log out first!";
  	header('location: adminpanel.php');
  }

?>


<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/form.css" type="text/css"> 
    <script src="https://kit.fontawesome.com/9269e9eed4.js" crossorigin="anonymous"></script>
    <title>Log In</title>
</head>
<body>
    <div class="bg-img">
        <div class="content">
        <?php if (isset($_SESSION['login_msg'])) : ?>
            <label style="color: red; font-weight: bold"> 
                <?php 
                echo $_SESSION['login_msg']; 
                unset($_SESSION['login_msg']);
                ?> <br>
            </label>
        <?php endif ?>
        <?php if (isset($_SESSION['fail'])) : ?>
            <label style="color: red; font-weight: bold">
                <?php 
                echo $_SESSION['fail']; 
                unset($_SESSION['fail']);
                ?>
            </label>
        <?php endif ?>
            <header>Log In</header>
            <form method="post" action="server.php">
                
                <div class="field">
                    <i class="fa fa-user"></i>
                    <input type="text" required placeholder="email or phone" name="username">
                </div>
                <div class ="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class= "password" required placeholder="password" name="password">
                </div>
                <br>
                <div class ="field">
                    <input type="submit" placeholder="LOGIN" name="login_user">
                </div>
            </form>
      
</body>
</html>