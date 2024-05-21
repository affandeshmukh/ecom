<?php 

$username=$_SESSION['username'];
$get="select * from `user` where username='$username'";
$result=mysqli_query($con,$get);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
?>

<?php
$detail="select * from `user_order` where user_id=$user_id";
$result=mysqli_query($con,$detail);
while($row=mysqli_fetch_assoc($result)){
    $product_img=$row['image'];
    $order=$row['order_id'];
    $user_id=$row['user_id'];
    $amount_due=$row['amount_due'];
    $bill_num=$row['bill_num'];
    $total_product=$row['total_product'];
    $order_date=$row['order_date'];
    $order_status=$row['order_status'];
echo "$order,$user_id,$amount_due,$bill_num,$total_product,$order_date,$order_status

<img src='../admin/product_images/$product_img'>";
}?>

