
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ecommerce website</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
<body>
    <div class="container-fluid">
        <h2 class="text-center">Register</h2>
        <div class="row">
            <div class="lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="form-outline">
        <label for="username" class="form-label">username</label>
        <input type="text" id="username" name="username" class="form-control"/>
                </div>
                <div class="form-outline">
        <label for="user_email" class="form-label">email</label>
        <input type="text" id="user_email" name="user_email" class="form-control"/>
                </div>

                <div class="form-outline">
        <label for="user_password	" class="form-label">user_password	</label>
        <input type="text" id="user_password" name="user_password" class="form-control"/>
                </div>

                <div class="form-outline">
        <label for="re_password" class="form-label">re_password</label>
        <input type="text" id="re_password" name="re_password" class="form-control"/>
                </div>

                <div class="form-outline">
        <label for="user_image" class="form-label">user_image</label>
        <input type="file" id="user_image" name="user_image" class="form-control"/>
                </div>

                <div class="form-outline">
        <label for="user_address" class="form-label">user_address</label>
        <input type="text" id="user_address" name="user_address" class="form-control"/>
                </div>


                <div class="form-outline">
        <label for="user_num" class="form-label">user_num</label>
        <input type="text" id="user_num" name="user_num" class="form-control"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="register" name="register"class="bg-info py-2 px-3">
                    <p><a href="login.php">Login</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Include necessary files and start session
include('../src/connect.php');
include('../function/common_function.php');
session_start();

// Handle form submission
if(isset($_POST['register'])){
    // Retrieve form data
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $re_password = $_POST['re_password'];
    $user_address = $_POST['user_address'];
    $user_num = $_POST['user_num'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    move_uploaded_file($temp,"user_img/$user_image");
    // Check if email or phone number already exist
    $select_query = "SELECT * FROM `user` WHERE user_email='$user_email' OR user_num='$user_num'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0) {
        echo "<script>alert('Email or phone number already exists')</script>";
    } else {
        // Check if passwords match
        if($user_password != $re_password) {
            echo "<script>alert('Confirm Password does not match')</script>";
        } else {
            // Hash the password
            $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

            // Upload user image
            move_uploaded_file($user_image_tmp, './user_img/' . $user_image);

            // Insert user data into database
            $insert_query = "INSERT INTO `user` (username, user_email, user_password, user_image, user_ip, user_address, user_num) VALUES ('$username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_num')";
            $sql_execute = mysqli_query($con, $insert_query);

            // Redirect based on cart status
            $select_cart_items = "SELECT * FROM `cart_detail` WHERE ip_address='$user_ip'";
            $result_cart = mysqli_query($con, $select_cart_items);
            $rows_count = mysqli_num_rows($result_cart);

            if($rows_count > 0) {
                $_SESSION['username'] = $username;
                echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            } else {
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }
}
?>
