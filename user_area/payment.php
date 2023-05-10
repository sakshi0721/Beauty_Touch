<?php
  include('../includes/connect.php');
  include('../functions/common_functions.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .payment_img {
        width: 90%;
        margin:auto;
        display:block; 
    }  
</style>
<body>
    <!-- php code to access user id -->
    <?php
    $ip_add=getIPAddress();
    $get_user="Select * from user_table where user_ip='$ip_add'";
    $result=mysqli_query($CONNECTION,$get_user);
    $run_query=mysqli_fetch_array($result);
    $id=$run_query['user_id'];
    
    
    ?>
    <div class="container">
       <h2 class="text-center text-info">Payment options</h2> 
       <div class='row d-flex justify-content-center align-items-center my-5'>
          <div class="col-md-6"> 
             <a href="https://www.paypal.com" target="_blank" ><img src="../photos/upi.jpg" alt="" class="payment_img"></a>  
          </div>
          <div class="col-md-6">
             <a href="order.php?user_id=<?php echo $id ?>" target="_blank" ><h2 class="text-center">Pay Offline</h2></a>  
          </div>
       </div>
        
    </div>
</body>
</html>