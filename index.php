<?php include('src/connect.php');
include('function/common_function.php');
session_start()?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ecommerce website</title>
    <!--bootstrap css link-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<!--top bar-->

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

<!--fourth--->
<div class="row px-3">
  <div class="col-md-10">
<!--products-->
<div class="row" >
  <!--ftech producr-->
 
  <?php
getproducts();
getunique();
uniquebrand();


?>


  </div>
  </div>

    <!--bootstap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include ('footer.php'); ?>
  </body>
</html>
