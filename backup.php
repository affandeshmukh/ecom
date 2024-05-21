<?php
include ('../connect.php');
include ('../function/common_function.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_ip = getIPAddress();
    
    // Prepare and execute the query for selecting user
    $select_query_user = "SELECT * FROM `user` WHERE username=?";
    $stmt_user = mysqli_prepare($con, $select_query_user);
    mysqli_stmt_bind_param($stmt_user, "s", $username);
    mysqli_stmt_execute($stmt_user);
    $result_query_user = mysqli_stmt_get_result($stmt_user);
    
    // Check if a user was found
    if(mysqli_num_rows($result_query_user) > 0) {
        $row_data = mysqli_fetch_assoc($result_query_user);
        if(password_verify($user_password, $row_data['user_password'])) {
            // Prepare and execute the query for selecting cart details
            $select_query_cart = "SELECT * FROM `cart_detail` WHERE ip_address=?";
            $stmt_cart = mysqli_prepare($con, $select_query_cart);
            mysqli_stmt_bind_param($stmt_cart, "s", $user_ip);
            mysqli_stmt_execute($stmt_cart);
            $cart_query = mysqli_stmt_get_result($stmt_cart);
            $row_count_cart = mysqli_num_rows($cart_query);

            // Check cart details and redirect accordingly
            if($row_count_cart == 0){
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            } else {
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid password')</script>";
        }
    } else {
        echo "<script>alert('Invalid username')</script>";
    }
}
?>