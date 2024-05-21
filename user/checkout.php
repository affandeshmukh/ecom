<?php
include ('../src/connect.php');

session_start();

 ?>
<!--products-->

  <!--ftech producr--><?php
if(!isset($_SESSION['username'])){
    include('login.php');
 }else{
    include('payment.php');

        }
?>
     

</html>