<?php include('../src/connect.php');
include('../function/common_function.php');
@session_start()?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ecommerce website</title>
    <!--bootstrap css link-->
    
<style>
body{
    padding:0;
    margin:0;
    border:solid;
  }
  .nav-container {
    text-align: left; /* Align navigation items to the left */
  }
  
  .nav-item {
    display: inline-block; /* Display items horizontally */
    margin-right: 10px; /* Add space between items */
  }
  
  .nav-link {
    text-decoration: none; /* Remove default underline */
    color: #333; /* Link color */
    padding: 5px 10px; /* Padding for better readability */
  }
  
  .nav-link.active {
    font-weight: bold; /* Make active link bold */
  }
  
  .nav-link:hover {
    color: #666; /* Link color on hover */
  }
  
  
  .topnav {
    overflow: hidden;
    background-color: #e9e9e9;
    width:3000px;
    height:100px;  
  }
  
  .topnav a {
    display: inline-block; /* Display links as inline-block to align center */
    color: black;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  .topnav a.active {
    background-color: #2196F3;
    color: white;
  }
  
  .topnav .search-container {
    display: inline-block; /* Ensure search container aligns properly */
    margin-top:15px;
  }
</style>
  </head>
  <body>

  <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>

  <?php cart(); ?>

  <?php
 if(!isset($_SESSION['username'])){
  echo " <li class='nav-item'>
  <a class='nav-link active' aria-current='page' href='#'>welcome Guest</a>";
}else{echo
  "<li class='nav-item'>
  <a class='nav-link active' aria-current='page' href='#'>welcome ".$_SESSION['username']."</a>";}

    
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link active' aria-current='page' href='user/login.php'>Login</a>

    </li>";
    }else{echo
      "<li class='nav-item'>
      <a class='nav-link active' aria-current='page' href='user/logout.php'>Logout</a>

    </li>";}

    
    ?>
          <a class="nav-link" href="src/cart.php"><i class="fa fa-shopping-cart" style="font-size:36px"></i>
          <sup><?php cart_item(); ?></sup></a><?php total_cart_price();?>
        </li>

  <div class="search-container">
    <form action="search.php" method="get">
      <input type="search" placeholder="Search.." name="search_data">
      <button type="submit" value="Search"  name="search_data_product"><i class="fa fa-search"></i></button>
    </form>

  </div>
</div>

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
        <label for="user_password	" class="form-label">user_password	</label>
        <input type="text" id="user_password" name="user_password" class="form-control"/>
                </div>

                <div class="mt-4 pt-2">
                    <input type="submit" value="login" name="login" class="bg-info py-2 px-3">
                    <p><a href="register.php">register</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Start session
@session_start();

// Include necessary files

// Check if the login form is submitted
if(isset($_POST['login'])) {
    // Retrieve input data
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_ip = getIPAddress();

    // Query to fetch user data
    $select_query = "SELECT * FROM `user` WHERE username='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    // Query to check cart details
    $select_query_cart = "SELECT * FROM `cart_detail` WHERE ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    // Check if user exists
    if($row_count > 0) {
        // Verify password
        if(password_verify($user_password, $row_data['user_password'])) {
            // Redirect based on cart status
            if($row_count == 1 && $row_count_cart == 0) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }
    } else {
        echo "<script>alert('User not found')</script>";
    }
}
?>
