<?php
include ('src/connect.php');
include ('function/common_function.php');
session_start();

 ?>
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
<!--nav bar-->
<div class="container-fluid p-0">

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="img/logo.jpg" class="logo" href="#">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" style="font-size:36px"></i>
          <sup><?php cart_item(); ?></sup></a>
        </li><li class="nav-item">
          <a class="nav-link" href="#"><?php total_cart_price();?></a>
        </li>


      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
  <ul class="navbar-nav me-auto">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">welcome guest</a>
    </li>
       
<?php
    
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link active' aria-current='page' href='user/login.php'>Login</a>

    </li>";
    }else{echo
      "<li class='nav-item'>
      <a class='nav-link active' aria-current='page' href='user/logout.php'>Logout</a>

    </li>";}

    
    ?>
  </ul>
</nav>
<div class="bg-light">
  <h3 class="text-center">h-store</h3>
  <p class="text-center">communication</p>
</div>

<!--fourth--->
<div class="row px-3">
  <div class="col-md-10">
<!--products-->
<div class="row" >
  <!--ftech producr-->
  <?php
getallproducts();
getunique();
uniquebrand();

?>




  </div>
  </div>

  <div class="col-md-2 p-0" style="background-color: grey">


    <!--brands for display-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Delivery brands</h4></a>
      </li>



      <?php

    getbrands();

       ?>
       <ul class="navbar-nav text-center">
         <li class="nav-item bg-info">
             <a href="#" class="nav-link text-light"><h4>Category</h4></a>
         </li>


                    <?php

                    getcategory();

                     ?>


         <!--catego to be display-->


  </div>


  </div>
</div>

    <!--bootstap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include ('../footer.php'); ?>
  </body>
</html>
