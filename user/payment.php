<?php 
include('../src/connect.php');
include('../function/common_function.php');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$user_ip = getIPAddress();
$get_user = "SELECT * FROM `user` WHERE user_ip='$user_ip'";
$result = mysqli_query($con, $get_user);

if (!$result) {
    // Handle query error
    echo "Error: " . mysqli_error($con);
    exit();
}

$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>
<a href="order.php?user_id=<?php echo $user_id?>">offline</a>