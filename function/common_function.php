<html>    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    /* Bootstrap-like card styles */
    body {
      display: flex;
      justify-content: center; /* Center cards horizontally */
      align-items: flex-start; /* Align cards to the top of the page */
      flex-wrap: wrap; /* Allow cards to wrap to the next line */
      margin:0;
      padding:0;
    }
    .but{background-color: #04AA6D;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;}
    .card {
    
    width: 165px; /* Set the width of each card */
    margin: 5px; /* Add margin around each card */
    display: inline-block; /* Display cards in a horizontal line */
    vertical-align: top; /* Align cards to the top of the line */
    border: 1px solid #ddd; /* Add a border to each card */
    border-radius: 5px; /* Add border radius to round the corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow to each card */
    margin-top:100px;
    
    
    
  }

  /* CSS styles for card image */
  .card img {
    width: 100%; /* Make the image fill the entire width of the card */
    height: auto; /* Maintain the aspect ratio of the image */
    border-top-left-radius: 5px; /* Add border radius to round the top-left corner */
    border-top-right-radius: 5px; /* Add border radius to round the top-right corner */
  }

  /* CSS styles for card body */
  .card .card-body {
    padding: 10px; /* Add padding to the card body */
  }

  /* CSS styles for card title */
  .card .card-body h3 {
    margin-top: 0; /* Remove margin from the top of the title */
  }

  /* CSS styles for card description */
  .card .card-body p {
    margin-bottom: 10px; /* Add margin to the bottom of the description */
  }

  /* CSS styles for card button */
  .card .card-body button {
    background-color: #007bff; /* Set the background color of the button */
    color: #fff; /* Set the text color of the button */
    border: none; /* Remove the border of the button */
    padding: 8px 16px; /* Add padding to the button */
    cursor: pointer; /* Change cursor to pointer on hover */
    border-radius: 3px; /* Add border radius to round the corners */
  }

  .card .card-body button a {
    text-decoration: none; /* Remove underline from the anchor tag */
    color: #fff; /* Set the text color of the anchor tag */
  }

  .card .card-body button:hover {
    background-color: #0056b3; /* Change background color on hover */
  }

  </style>
</head>
<body>

<?php

function getproducts(){
  global $con;
  if(!isset($_GET['category'])){
    if (!isset($_GET['brands'])) {
      $select_query = "SELECT * FROM `product` ORDER BY RAND() LIMIT 0,9";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $description = $row['description'];
        $product_image1 = $row['product_image1'];
        $category_title = $row['category_title'];
        $brands_title = $row['brands_title'];
        $price = $row['price'];
        echo " <div class='card'>
                <div class='circle'>%</div>
                <img src='./admin/product_images/$product_image1' >
                <hr>
                <div class='card-body' >
                  <h3>$product_title...</h3>
                  <p>$description </p>
                  <img src='./admin/upload image/' style='float:let; height:40px; width:70px; '>
                  <center>
                  <p><h3>₹$price</h3></p>
                 <a href='index.php?add-to-cart=$product_id' class=\"btn btn-primary\">Add to cart</a>
                 <a href='../qwer/user/checkout.php' class=\"btn btn-primary\">Add to cart</a>

                </div>   
              </div>";
      }
    }
  }
}

// search Products
function search(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_da_value = $_GET['search_data'];
    $search_query = "SELECT * FROM `product` WHERE keywords LIKE '%$search_da_value%'";
    $result_query = mysqli_query($con, $search_query);

    while($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $description = $row['description'];
      $product_image1 = $row['product_image1'];
      $category_title = $row['category_title'];
      $brands_title = $row['brands_title'];
      $price = $row['price'];
      echo "
      <div class='card'>
      <div class='circle'>%</div>
      <img src='./admin/product_images/$product_image1' >
      <hr>
      <div class='card-body' >
        <h3>$product_title...</h3>
        <p>$description </p>
        <img src='./admin/upload image/' style='float:let; height:40px; width:70px; '>
        <center>
        <p><h3>₹$price</h3></p>
       <a href='index.php?add-to-cart=$product_id' class=\"btn btn-primary\">Add to cart</a>
      </div>   
    </div>";
    }
  }
}
//getting all product

function getallproducts()
{
  global $con;
  // condition to check isset or not
  if(!isset($_GET['category'])){
    if (!isset($_GET['brands'])) {
  $select_query="SELECT * from `product` order by rand() LIMIT 0,4";
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query))
  {
    $product_id=$row['product_id'];
    $product_title = $row['product_title'];
    $description = $row['description'];
    $product_image1 = $row['product_image1'];
    $category_title = $row['category_title'];
    $brands_title = $row['brands_title'];
    $price = $row['price'];
    echo "<div class='card'>
    <div class='circle'>%</div>
    <img src='./admin/product_images/$product_image1' >
    <hr>
    <div class='card-body' >
      <h3>$product_title...</h3>
      <p>$description </p>
      <img src='./admin/upload image/' style='float:let; height:40px; width:70px; '>
      <center>
      <p><h3>₹$price</h3></p>
     <a href='index.php?add-to-cart=$product_id' class=\"btn btn-primary\">Add to cart</a>
    </div>   
  </div>";
  }
}}
}

//function getunique()
function getunique(){
  global $con;
  if(isset($_GET['category'])){
    $category_title = mysqli_real_escape_string($con, $_GET['category']); // Escaping the input to prevent SQL injection
    $select_query = "SELECT * FROM `product` WHERE category_title='$category_title'";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center'>no stock</h2>";
    }
    if (!$result_query) {
        // Query failed
        echo "Error: " . mysqli_error($con);
    } else {
        // Query succeeded, fetch data
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['description'];
            $product_image1 = $row['product_image1'];
            // Remove the line below since you're reusing the same variable name
            // $category_title = $row['category_title'];
            $brands_title = $row['brands_title'];
            $price = $row['price'];
            echo "<div class=\"col-md-4 mb-3\">
                     <div class=\"card\">
                       <img src='./admin/product_images/$product_image1' class=\"card-img-top\" alt=\"Product Image\" style=\"image-align: center;\">
                       <div class=\"card-body\">
                         <h5 class=\"card-title\">$product_title</h5>
                         <p class=\"card-text\">$description</p>
                 <p class=\"card-text\">$price</p>
                         <a href='index.php?add-to-cart=$product_id' class=\"btn btn-primary\">Add to cart</a>
                         <a href='product_details.php?product_title=$product_title' class=\"btn btn-info\">View details</a>
                       </div>
                     </div>
                 </div>";
        }
        // Free result set
        mysqli_free_result($result_query);
    }
  }
}

//brands getunique
function uniquebrand(){
  global $con;
  if(isset($_GET['brands'])){
    $brands_title = mysqli_real_escape_string($con, $_GET['brands']); // Escaping the input to prevent SQL injection
    $select_query = "SELECT * FROM `product` WHERE brands_title='$brands_title'";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center'>no stock</h2>";
    }
    if (!$result_query) {
        // Query failed
        echo "Error: " . mysqli_error($con);
    } else {
        // Query succeeded, fetch data
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['description'];
            $product_image1 = $row['product_image1'];
            // Remove the line below since you're reusing the same variable name
            // $category_title = $row['category_title'];
            $brands_title = $row['brands_title'];
            $price = $row['price'];
            echo "<div class=\"col-md-4 mb-3\">
                     <div class=\"card\">
                       <img src='./admin/product_images/$product_image1' class=\"card-img-top\" alt=\"Product Image\" style=\"image-align: center;\">
                       <div class=\"card-body\">
                         <h5 class=\"card-title\">$product_title</h5>
                         <p class=\"card-text\">$description</p>
                 <p class=\"card-text\">$price</p>
                         <a href='index.php?add-to-cart=$product_id' class=\"btn btn-primary\">Add to cart</a>
                         <a href='product_details.php?product_title=$product_title' class=\"btn btn-info\">View details</a>
                       </div>
                     </div>
                 </div>";
        }
        // Free result set
        mysqli_free_result($result_query);
    }
  }
}




//end

function getbrands(){
  global $con;
  $select_brands="Select * from `brands` ";
  $result_brands=mysqli_query($con,$select_brands);
  while ($row_date=mysqli_fetch_assoc($result_brands)) {
    $brands_title=$row_date['brands_title'];
    $brand_id=$row_date['brand_id'];
    echo " <li class='nav-item '>
          <a href='index.php?brands=$brands_title' class='nav-link text-light'>$brands_title</a>
      </li>";
  }
}

function getcategory(){
  global $con;
  $select_category="Select * from `categories` ";
  $result_category=mysqli_query($con,$select_category);
  while ($row_date=mysqli_fetch_assoc($result_category)) {
    $category_id=$row_date['category_id'];
    $category_title=$row_date['category_title'];
    echo " <li class='nav-item '>
          <a href='index.php?category=$category_title' class='nav-link text-light'>$category_title</a>
      </li>";
  }
}

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 


function cart() {
    global $con;
    if (isset($_GET['add-to-cart'])) {
        // Assuming getIPAddress() is defined somewhere else
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add-to-cart'];
        $select_query = "SELECT * FROM `cart_detail` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already in the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            // Assuming quantity should be set to 1 by default when adding a new item
            $insert_query = "INSERT INTO `cart_detail` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 1)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

function cart_item(){
  if (isset($_GET['add-to-cart'])) {
    global $con;
      // Assuming getIPAddress() is defined somewhere else
      $get_ip_add = getIPAddress();
      $get_product_id = $_GET['add-to-cart'];
      $select_query = "SELECT * FROM `cart_detail` WHERE ip_address='$get_ip_add' ";
      $result_query = mysqli_query($con, $select_query);
      $count_cart_item = mysqli_num_rows($result_query);
  }else {
        global $con;
        // Assuming getIPAddress() is defined somewhere else
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM `cart_detail` WHERE ip_address='$get_ip_add' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
      }
      echo $count_cart_item;
    }

    function total_cart_price()
    {
      global $con;
      $get_ip_add = getIPAddress();
      $total=0;
      $select_query = "SELECT * FROM `cart_detail` WHERE ip_address='$get_ip_add' ";
      $result_query = mysqli_query($con, $select_query);
      while($row=mysqli_fetch_array($result_query)){
        $product_id = $row[ 'product_id'];
        $select_product= "SELECT * FROM `product` WHERE product_id='$product_id'";
        $result_product = mysqli_query($con, $select_product);
        while($row_price=mysqli_fetch_array($result_product)){
          $price=array($row_price['price']);
          $product_values=array_sum($price);
          $total+=$product_values;
      }
    }
    echo $total;
  }
  function user_order_detail(){
    global $con;
    $username= $_SESSION['username'];
    $get_detail="Select * from `user` where username='$username' ";
    $result_query=mysqli_query($con,$get_detail);
    while($row_query=mysqli_fetch_array($result_query)) {
      $user_id=$row_query['user_id'];
      if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_order'])) {
      if (!isset($_GET['delete_order'])) {
        $get_order="select * from `user_order` where user_id='$user_id' and order_status='pending'";
         $result_order_query=mysqli_query($con,$get_order);
         $row_count=mysqli_num_rows($result_order_query);
         if ($row_count>0) {
          echo "<h1>$row_count</h1>";
        
        }
     
      }
      }
        # code...
      }
      # code...
    }
  }
?>

 
