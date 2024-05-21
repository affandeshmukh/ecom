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
    
  </head>
  <body>
<!--nav bar-->

<?php include('topnav.php');?>

</nav>


  <?php

search();

?>



    <!--bootstap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
