<?php session_start(); 
include('../function/common_function.php'); 
include('../src/connect.php');

?>
<!DOCTYPE html>
<html>
<head>
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
  float: right;
  margin-top:15px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <a class='nav-link active' aria-current='page' href='../user/login.php'>Login</a>

    </li>";
    }else{echo
      "<li class='nav-item'>
      <a class='nav-link active' aria-current='page' href='../user/logout.php'>Logout</a>

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

<?php
   $username= $_SESSION['username'];
   $user_image="Select * from `user` where username='$username'";
   $user_image=mysqli_query($con,$user_image);
   $row_image=mysqli_fetch_array($user_image);
   $user_image=$row_image['user_image'];
   echo "<img src='user_img/$user_image'>"
?>
<a href="Profile.php">Pending Order</a>
<a href="Profile.php?edit_account">e</a>
<a href="Profile.php?my_order">my order</a>
<a href="Profile.php?delete_order">delete order</a>
<a href="logout.php">Logout</a>
<?php user_order_detail(); ?>

<?php
if(isset($_GET['my_order'])){
  include('myorder.php');
}
?>


</body>
</html>
