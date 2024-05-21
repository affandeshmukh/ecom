<?php include('connect.php');
include('../function/common_function.php');
// Function to remove items from the cart
function removeItemFromCart($productId, $ipAddress, $con) {
    $delete_query = "DELETE FROM `cart_detail` WHERE product_id='$productId' AND ip_address='$ipAddress'";
    $run_delete = mysqli_query($con, $delete_query);
    return $run_delete;
}

// Check if the remove button is clicked
if(isset($_POST['remove'])) {
    if(isset($_POST['remove_item'])) {
        $removeItems = $_POST['remove_item'];
        foreach($removeItems as $remove_id) {
            // Remove item from the cart
            removeItemFromCart($remove_id, getIPAddress(), $con);
        }
    }
}

?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>E-commerce Website</title>
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
</style>  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
  <!-- Navbar -->
  
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
  <!-- Secondary Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
     aaaaaaaa
    </ul>
  </nav>

  <!-- Header -->
  <div class="bg-light">
    <h3 class="text-center">H-Store</h3>
    <p class="text-center">Communication</p>
  </div>
  <!-- Fourth child -->
  <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
          
          <tbody>
            <!-- PHP code for displaying data -->
            <?php
              global $con;
              $get_ip_add = getIPAddress();
              $total = 0;
              $select_query = "SELECT * FROM `cart_detail` WHERE ip_address='$get_ip_add'";
              $result_query = mysqli_query($con, $select_query);
              $result_count=mysqli_num_rows($result_query);
              if($result_count>0) {
                  echo "<thead>
                  <tr>
                    <th>Product title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operation</th>
                  </tr>
                </thead>";
              
                while($row = mysqli_fetch_array($result_query)){
                  $product_id = $row['product_id'];
                  $select_product = "SELECT * FROM `product` WHERE product_id='$product_id'";
                  $result_product = mysqli_query($con, $select_product);
                
                  while($row_price = mysqli_fetch_array($result_product)){
                    $price = array($row_price['price']);
                    $product_table = $row_price['price'];
                    $product_title = $row_price['product_title'];
                    $product_image1 = $row_price['product_image1'];
                    $product_values = array_sum($price);
                    $total += $product_values;
            ?>
            <tr>
              <td><?php echo $product_title?></td>
              <td><img src="../img/<?php echo $product_image1?>" style="width: 200px; height: 200px; object-fit: contain;"></td>
              <td><input type="text" name="qty" class="form-input w-50"></td>
              <?php
                        $get_ip_add = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantity = $_POST['qty'];
                            $update_cart = "UPDATE `cart_detail` SET quantity=$quantity WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
                            $result_quantity = mysqli_query($con, $update_cart);
                            $total = $total * $quantity;
                        } 
                    ?>     
              <td><?php echo $product_table?></td>
              <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id?>" id="" checked></td>
              <td>
                <input type="submit" value="update" name="update_cart" class="bg-info px-3 py-2 border-0 mx-3">
                <input type="submit" value="remove" name="remove" class="bg-info px-3 py-2 border-0 mx-3">
              </td>
            </tr>
            <?php
                  }
                }
              } else { 
                echo "<tr><td colspan='6'>Cart is empty.</td></tr>";
              }
            ?>
          </tbody>
        </table>
        <!-- Subtotal -->
        <div class="d-flex">
    <?php
    global $con;
    $get_ip_add = getIPAddress();
    $select_query = "SELECT * FROM `cart_detail` WHERE ip_address='$get_ip_add' ";
    $result_query = mysqli_query($con, $select_query);
    $result_count = mysqli_num_rows($result_query);
    
    if ($result_count > 0) {
        echo "<h4 class='px-4'>Subtotal: <strong>$total</strong></h4>";
        echo "<input type='submit' value='continue shopping' name='cont' class='bg-info px-3 py-2 border-0 mx-3'>";
        echo "<button class='bg-info px-3 py-2 border-0 mx-3'><a href='../user/checkout.php' class='bg-info px-3 py-2 border-0 mx-3 value='Checkout'>Checkout</button></a>";
        
    } else {  
      echo "<input type='submit' value='continue shopping' name='cont' class='bg-info px-3 py-2 border-0 mx-3'>";
    }
    if (isset($_POST['cont'])) {
      echo "<script>window.open('../index.php' ,'_self')</script>";
      # code...
    }
    ?>
</div>

        </div>
      </form>
    </div>
  </div>
  <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
