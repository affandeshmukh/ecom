
<?php 
include('../src/connect.php');
include('../function/common_function.php');?>
<?php 
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
  }
///getting total items and total items price
  $getip=getIPAddress();
  $total_price=0;
  $cart_query="Select * from  `cart_detail` where ip_address='$getip'";
  $result_cart_price=mysqli_query($con,$cart_query);
  $bill_num=mt_rand();
  echo $bill_num;
  $status='pending';
  $count_products=mysqli_num_rows($result_cart_price);
  while($row_price=mysqli_fetch_array($result_cart_price)){
  $product_id=$row_price['product_id'];
  $selecr_products="Select * from `product` where product_id='$product_id'";
  $run_price=mysqli_query($con,$selecr_products);
  while ($row_product_price=mysqli_fetch_array($run_price)) {
      $product_price=array($row_product_price['price']);
      $product_value=array_sum($product_price);
      $total_price+=$product_value;
      # code...
  }
  }
  //getting items from cart
  $get_cart="select * from `cart_detail`";
  $run_cart=mysqli_query($con,$get_cart);
  $get_quantity=mysqli_fetch_array($run_cart);
  $quantity=$get_quantity['quantity'];
  if($quantity==0){
      $quantity=1;
      $subtotal=$total_price;
  }else{
      $quantity=$quantity;
      $subtotal=$total_price*$quantity;
  }
  $insert_query="insert into `user_order` (user_id,	amount_due,	bill_num,total_product,order_date,order_status ) values 
  ($user_id,$subtotal,$bill_num,$count_products,NOW(),'$status')";
  $result_query=mysqli_query($con,$insert_query);
  if($result_query){
      echo "<script>alert('Order are submitted successfully')</script>";
      echo "<script>window.open('profile.php','_self')</script>";

  }
  //order pending 
  $insert_pending="insert into `pending_order` (user_id,bill_num,product_id,quantity,order_status ) values 
  ($user_id,$bill_num,$product_id,$quantity,'$status')";
  $result_pending=mysqli_query($con,$insert_pending);

  //emty cart
  $emty_cart="Delete from `cart_detail` where ip_address='$getip'";
  $result_delete=mysqli_query($con,$emty_cart);

?>