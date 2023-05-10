<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    //echo "$order_id";
    $select_data="Select * from user_orders where order_id=$order_id";
    $result=mysqli_query($CONNECTION,$select_data);
    $fetch=mysqli_fetch_assoc($result);
    $invoice= $fetch['invoice_number'];
    $amount_due= $fetch['amount_due'];
    
}
// reading values from the confirm_payment form and inserting into user_payment table
if(isset($_POST['confirm_payment']))
{
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    //insert auery
    $insert_query="insert into user_payment (order_id, invoice_number, amount, payment_mode) values ( $order_id,  $invoice,  $amount, '$payment_mode')";
    $result_insert_query=mysqli_query($CONNECTION,$insert_query);
    if($result_insert_query)
    {
        echo "<h3 class='text-center text-light'> Successfully completed the payment</h3>";
        echo "<script> window.open('profile.php?my_orders','_self') </script>";
    }
    // after payment is done user id redirected to his profile. Now in the profile to update the table query 
    $update_order="Update user_orders set order_status='Complete' where order_id=$order_id";
    $result_update_query=mysqli_query($CONNECTION, $update_order);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light"> Confirm Payment </h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <label for="" class="text-light "> Amount </label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash on delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center">
                <input type="submit" class="bg-info  py-2 px-3 border-0" name="confirm_payment" value="confirm">
            </div>
        </form>
    </div>
    
</body>
</html>
