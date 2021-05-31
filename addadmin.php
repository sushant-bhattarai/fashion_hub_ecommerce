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
    <?php include ("adminmenu.html"); ?>
<!--Home Page Begins-->

<div class="container">
    
    <div class="content">
        <div class="register">
            <h2>Register</h2>
            <?php if (isset($_SESSION['reg_admin'])) : ?>
                <br><label style="color: red;"> 
                    <?php 
                    echo $_SESSION['reg_admin']; 
                    unset($_SESSION['reg_admin']);
                    ?><br><br>
                </label>
            <?php endif ?>
        <form method="post" action="server.php">
            <div>
                <label for="firstname">First Name :</label>
                <input type="text" name="fname" id="firstname" placeholder="Enter Your First Name" required>
            </div>
            <br>
            <div>
                <label for="lastname">Last Name :</label>
                <input type="text" name="lname" id="lastname" placeholder="Enter Your Last Name" required>
            </div>
            <br>
            <div>
                <label for="dob">Date of Birth :</label>
                <input type="date" name="dob" id="dob" placeholder="DD/MM/YYYY" required>
            </div>
            <br>
            <div>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" placeholder="123@abc.com" required>
            </div>
            <?php if (isset($_SESSION['already_exist_email'])) : ?>
                <br><label style="color: red;"> 
                    <?php 
                    echo $_SESSION['already_exist_email']; 
                    unset($_SESSION['already_exist_email']);
                    ?><br>
                </label>
            <?php endif ?>
            <br>
            <div>
                <label for="phone">Phone no. :</label>
                <input type="text" name="phone" id="phone" placeholder="123@abc.com" required>
            </div>
            <?php if (isset($_SESSION['already_exist_phone'])) : ?>
                <br><label style="color: red;"> 
                    <?php 
                    echo $_SESSION['already_exist_phone']; 
                    unset($_SESSION['already_exist_phone']);
                    ?><br>
                </label>
            <?php endif ?>
            <br>
            <div>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </div>
            <br>
            <div>
                <label for="cpassword">Confirm Password :</label>
                <input type="password" name="cpassword" id="cpassword" required>
            </div>
            <?php if (isset($_SESSION['mismatch'])) : ?>
                <br><label style="color: red;"> 
                    <?php 
                    echo $_SESSION['mismatch']; 
                    unset($_SESSION['mismatch']);
                    ?><br>
                </label>
            <?php endif ?>
            <br>
            <!-- <div>
                <label for="gender">Gender :</label> &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" id="male">
                &nbsp; 
                <span id="male">Male</span>
                &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" id="female">
                &nbsp;
                <span id="female">Female</span>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="gender" id="others">
                <span id="others">Others</span>
            </div> -->
            <div>
                <label for="gender">Gender :</label> 
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <br>
            <input type="submit" class="submit" id="submit" name="reg_user">
            <br>
 
        </form>
        </div>
    </div>
    </h4> 

</body>
</html>