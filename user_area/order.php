<?php
  include('../includes/connect.php');
  include('../functions/common_functions.php');

  if(isset($_GET['user_id']))
  {
    $id=$_GET['user_id'];
  }

  // getting total items and total price of all items 
  $ip_add=getIPAddress();
  $total_price=0;
  $cart_query_price="select * from cart_details where ip_address='$ip_add'";
  $result_cart_price=mysqli_query($CONNECTION, $cart_query_price);
  $invoice_number=mt_rand();
  //echo $invoice_number;
  $status='pending';
  $count_products=mysqli_num_rows($result_cart_price);
  while($row_price=mysqli_fetch_array($result_cart_price))
  {
    $prod_id=$row_price['product_id'];
    $select_product="select * from products where product_id=$prod_id";
    $result_product=mysqli_query($CONNECTION,  $select_product);
    while($row_product_price=mysqli_fetch_array($result_product))
    {
        $price=array($row_product_price['product_price']);
        $product_values=array_sum( $price);
        $total_price+=$product_values;
    }
  }


  //getting quantity from cart
  $get_cart="select * from cart_details";
  $run=mysqli_query($CONNECTION,  $get_cart);
  $get_quantity=mysqli_fetch_array($run);
  $item_quantity=$get_quantity['quantity'];
  if( $item_quantity==0)
  {
    $item_quantity=1;
    $subtotal=$total_price;
  }
  else
  {
    $item_quantity= $item_quantity;
    $subtotal=$total_price*$item_quantity;
  }



//insert orders 
$insert_order="Insert into user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status) values ( $id, $subtotal,$invoice_number, $count_products,NOW(),'$status')";
$result_query=mysqli_query($CONNECTION,  $insert_order);
if($result_query)
{
    echo "<script> alert('Orders are submitted successfully') </script>";
    echo "<script> window.open('profile.php','_self') </script>";
}



//order pending
$insert_pending_order="Insert into pending_order (user_id,invoice_number,product_id,quantity,order_status) values ( $id,$invoice_number,$prod_id, $count_products,'$status')";
$run_query=mysqli_query($CONNECTION,  $insert_pending_order);

//delete items from cart
$empty_cart="Delete from cart_details where ip_address='$ip_add'";
$run_delete=mysqli_query($CONNECTION, $empty_cart);

 ?>

