<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart details</title>
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <!--css file link-->
    <link rel="stylesheet" href="home.css">

    <style>
     /*hover style for navbar*/
      .navbar .navbar-nav .nav-link:hover 
      {
          color: #ffffff;
      }
      .navbar .navbar-nav .nav-item
       {
          position: relative;
       }
      .navbar .navbar-nav .nav-item::after
       {
         position: absolute;
         bottom: 0;
         left: 0;
         right: 0;
         margin: auto;
         background-color: #e3b6c5;
         width: 0%;
         content: "";
         height: 4px;
       }
      .navbar .navbar-nav .nav-item:hover::after 
      {
        width: 100%;
      }
      .navbar .navbar-nav .nav-item::after 
      {
          transition: all 0.5s;
      }

      
      /*cart styling*/
      .cart_img
      {
        width:80px;
        height:80px;
        object-fit: contain;
      }
    </style>

</head>
<body>
<!-- navbar-->
<div class="container-fluid p-0 m-0">
  <!-- first child-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-#210212 " style="background-color:#990033;">
    <div class="container-fluid">
      <img src="photos/logo.png" alt="hello" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
           <li class="nav-item">
             <a class="nav-link" aria-current="page" href="home.php">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="collections.php">Collections</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="user_area/user_registration.php">Register</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="about.html">About Us</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="contact.php">Contact Us</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="cart.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
           </li>
       </ul>
     </div>
   </div>
 </nav>  

 <!--second child-->
   <nav class="navbar navbar-expand-lg navbar-light">
     <ul class="navbar-nav me-auto">
     <?php
            if(!isset($_SESSION['username']))
            {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'> Welcome Guest</a>
                </li>";
            }
            else
            {
              echo"<li class='nav-item'>
              <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
              </li>";
            }

              if(!isset($_SESSION['username']))
              {
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                  </li>";
              }
              else
              {
                  echo"<li class='nav-item'>
                  <a class='nav-link' href='./user_area/logout.php'>Logout</a>
                  </li>";
              }
         ?> 
     </ul>
   </nav>

  <?php
    cart();
  ?>
  <!--third child-->

 <!--fourth child-->
 <div class="p-4">
    <h3 class="text-center">Stoles & Shawls For Women</h3>
    <p class="text-center">Traditional fashion has evolved drastically in the past few years. We have a magnificent array of shawls for women.</p>
 </div>

  <!--fifth child-->
  <div class="container">
     <div class="row">
        <form action="" method="post">
          <table class="table table-bordered text-center">
             <!--php code to display dynamic data-->
             <?php
               $get_ip_add=getIPAddress();
               $total_price=0;
               $cart_query="select * from cart_details where ip_address='$get_ip_add'";
               $cart_result=mysqli_query($CONNECTION,$cart_query);
               $cart_result_count=mysqli_num_rows($cart_result);
               if($cart_result_count>0)
               {
                 echo "<thead>
                         <tr>
                           <th>Product title</th>
                           <th>Product image</th>
                           <th>Quantity</th>
                           <th>Total price</th>
                           <th>Remove</th>
                           <th colspan='2'>Operations</th>
                         </tr>
                       </thead>
                     <tbody>";
                 while($row=mysqli_fetch_array($cart_result))
                 {
                    $product_id=$row['product_id'];
                    $select_products="select * from products where product_id='$product_id'";
                    $result_query=mysqli_query($CONNECTION,$select_products);
                    while($row_product_price=mysqli_fetch_array($result_query))
                     {
                       $product_price=array($row_product_price['product_price']);

                       $price_table=$row_product_price['product_price'];
                       $product_title=$row_product_price['product_title'];
                       $product_image=$row_product_price['product_image'];

                       $product_values=array_sum($product_price);
                       $total_price+=$product_values;
           
              ?>
              <tr>
                <td> <?php  echo  $product_title ?></td>
                <td> <img src="./admin_area/product_images/<?php  echo  $product_image ?>" alt="" class="cart_img"></td>
                <td> <input type="text" name="quantity_in_textfield" id="" class="form-input w-50"></td>
                   <?php
                     $get_ip_add=getIPAddress();
                     if(isset($_POST['update_quantity_btn'])) 
                     {
                         $quantities=$_POST['quantity_in_textfield'];
                         $update_query="update cart_details set quantity=$quantities  where ip_address='$get_ip_add'";
                         $result_update_query=mysqli_query($CONNECTION,$update_query);
                         $total_price= $total_price * $quantities;
                     }

                    ?>
                <td> <?php echo  $price_table; ?>/- </td>
                <td> <input type="checkbox" name="chkbox_to_removeproduct[]" value="<?php  echo $product_id ?>"></td>
                <td>
                   <!--<button class="px-3 py-2 border-0 mx-3 text-light" style="background-color:#990033">Update</button> -->
                   <input type="submit" value="update cart" name="update_quantity_btn" class="px-3 py-2 border-0 mx-3 text-light" style="background-color:#990033">
                   <input type="submit" value="Remove" name="remove_prdfromcart_btn" class="px-3 py-2 border-0 mx-3 text-light" style="background-color:#990033">
                 </td>
              </tr>
             <?php
                 }
                }
              }
              else
               {
                echo "<h2 class='text-danger text-center'> Cart is empty </h2>";
               }
             ?>

           </tbody>
         </table>
         <!--subtotal-->
         <div class="d-flex mb-5">
         <?php
               $get_ip_add=getIPAddress();
               $cart_query="select * from cart_details where ip_address='$get_ip_add'";
               $cart_result=mysqli_query($CONNECTION,$cart_query);
               $cart_result_count=mysqli_num_rows($cart_result);
               if($cart_result_count>0)
               {
                 echo "<h4 class='px-3'> Subtotal:<strong> $total_price /-</strong></h4>
                 <input type='submit' value='Continue Shopping' name='Continue_shopping' class='px-3 py-2 border-0 mx-3 text-light' style='background-color:#990033'>
                 <button class='p-3 py-2 border-0' style='background-color:#990033;'> <a href='./user_area/checkout.php' class='text-white text-decoration-none'> Checkout </a> </button>";
               }
               else
               {
                echo "<input type='submit' value='Continue Shopping' name='Continue_shopping' class='px-3 py-2 border-0 mx-3 text-light' style='background-color:#990033'>";
               }

               if(isset($_POST['Continue_shopping']))
               {
                echo "<script> window.open('home.php','_self') </script>";
               }
           ?>
         </div>
   </div>
  </div>
  </form>

<!-- function to remove items from cart-->
<?php
       function remove_cart_items()
       {
        global $CONNECTION;
        if(isset($_POST['remove_prdfromcart_btn']))
        {
          foreach($_POST['chkbox_to_removeproduct'] as $remove_id)
          {
            echo $remove_id;
            $delete_query="Delete from cart_details where product_id=$remove_id";
            $run_query=mysqli_query($CONNECTION,$delete_query);
            if($run_query)
            {
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }
       }

       echo $item=remove_cart_items();
       ?>

  <!--last child-->
   <div class="row p-0 m-0 text-center text-white"  style="background-color:#990033;">
     <div class="col-md-3 p-4 ">
        <h5>BeautyTouch</h5><br>
        <img src="photos/logo.png" alt="hello" class="footImg">
        <br>
        Estd. 1995 goyalsakshi0744@gmail.com
     </div>

     <div class="col-md-3 p-4 ">
        <h5>About</h5><br>
        <p  class="footAbout">All types of fancy and kadai stoles,shawls and mufflers in pure wool and imported articles.<br>
        Kadai stoles,mufflers and lohis mix and pure wool for men.</p>
       
     </div>

     <div class="col-md-6 p-4 ">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3423.0091607437776!2d75.8541621143648!3d30.91436808390851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a8374d669ed9f%3A0xb882e1da7a711896!2sShri%20Haridev%20Mandir!5e0!3m2!1sen!2sin!4v1679800913501!5m2!1sen!2sin" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
     <p>All rights reserved &nbsp;&nbsp; Designed by Sakshi-2023</p>
   </div>
</div>
<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</body>
</html>