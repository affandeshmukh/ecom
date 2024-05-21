
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!--font awesome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style media="screen">
.admin_image{
  width: 100px;
  object-fit: contain;
}

</style>
  </head>
  <body>
<div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img <img src="../img/logo.jpg" class="logo" href="#">
      <nav class="navbar navbar-expand-lg ">
        <ul class="navbar-nav">
          <li class="nav-item">
<a href="#" class="nav-link">welcome guest</a>
          </li>
      </ul>
</nav>
</div>
</nav>
<!--sceond-->
<div class="bg-light">

    <h3 class="text-center p-2">Mangae detail</h3></div>

    <!--third-->
    <div class="row">
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
          <a href="#"><image src="../img/apple.jpg" class="admin_image"></a>
            <p class="text-light text-center">admin name</p>
              </div>

                <div class="button text-center">
                  <button class="my-3"> <a href="index.php" class="nav-link text-light bg-info my-1">Home</a></button>

                  <button class="my-3"> <a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button class="my-3"> <a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button class="my-3"> <a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                  <button class="my-3"> <a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                  <button class="my-3"> <a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button class="my-3"> <a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button class="my-3"> <a href="button" class="nav-link text-light bg-info my-1">all order</a></button>
                    <button class="my-3"> <a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button class="my-3"> <a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button class="my-3"> <a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
          </div>
      </div>
    </div>
</div>
          <!--fourth-->

    <div class="container my-3">
      <?php
      if(isset($_GET['insert_category'])){

         include ('insert_category.php');
      }
       ?>

      <?php
      if(isset($_GET['insert_brands'])){

         include ('insert_brands.php');
      }
       ?>

    </div>



    <!--bootstap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
