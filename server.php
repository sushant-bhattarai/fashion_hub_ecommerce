<?php
session_start();

// initializing variables
$username = "";
$password = "";
$errors = array(); 

// connect to the database
include ("connection.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if ($password != $cpassword) {
    $_SESSION['mismatch'] = "Passwords didn't match!";
    header('location: addadmin.php');
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin_db WHERE email='$email' OR phone='$phone' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['phone'] === $phone) {
        $_SESSION['already_exist_phone'] = "Phone number already exists!";
        header('location: addadmin.php');
    }

    if ($user['email'] === $email) {
        $_SESSION['already_exist_email'] = "Email address already exists!";
        header('location: addadmin.php');
    }
  }
    //  Finally, register user if there are no errors in the form
    //  if (count($errors) == 0) {
  else
    {
        $password = md5($password);//encrypt the password before saving in the database

        $query = "INSERT INTO admin_db (first_name, last_name, dob, email, phone, gender, password) 
                VALUES('$fname', '$lname','$dob', '$email', '$phone','$gender', '$password')";
        mysqli_query($db, $query);
        
        $_SESSION['reg_admin'] = "New Admin : ".$email. " registered!";
        header('location: addadmin.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    // if (count($errors) == 0) {
        $query = "SELECT * FROM admin_db WHERE (email='$username' AND password='$password') OR (phone='$username' AND password='$password')";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in!";
          header('location: adminpanel.php');
        }else {
          $_SESSION['fail'] = "Incorrect Credentials!";
            header('location: account.php');
        }
    // }
}
  

//ADD PRODUCT
if (isset($_POST['product_submit'])) {

  // receive all input values from the form
  $pname = mysqli_real_escape_string($db, $_POST['name']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $rating = mysqli_real_escape_string($db, $_POST['rating']);


  // Check if image file is a actual image or fake image
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_name = $_FILES['image']['name'];
  $new_file_name = 'product_'.uniqid().'_'.$file_name;
  $folder = "./images/products/".$new_file_name;
  $check = getimagesize($file_tmp);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }


  if($uploadOk==1){
    // echo $file_tmp; die();
    $value = move_uploaded_file($file_tmp, $folder);
    $query = "INSERT INTO product (name, price, rating, image, category) 
                VALUES('$pname','$price', '$rating', '$new_file_name', '$category')";
    mysqli_query($db, $query);
    
    $_SESSION['add_product'] = "New Product : ".$category. " added!";
    header('location: adminpanel.php');
  }else{
    $_SESSION['add_product_fail'] = "Incorrect image-type uploaded!";
    header('location: adminpanel.php');
  }
}

if (isset($_POST['delete_product'])){
  $query = "DELETE FROM product WHERE id=" . $_POST["product_id"];
  // echo $query; die();
  if (mysqli_query($db, $query)) {
    $image_name = $_POST["image_name"];
    // echo $image_name; die();
    $dir = "images/products";
    unlink($dir.'/'.$image_name);
    $_SESSION['delete_product'] = "Product deleted successfully!";
    header('location: adminproducts.php');
  }else {
    $_SESSION['delete_product_fail'] = "Error: Product cannot be deleted!";
    header('location: adminproducts.php');
  }
}

?>
  