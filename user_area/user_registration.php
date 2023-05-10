 <?php
  include('../includes/connect.php');
  include('../functions/common_functions.php');
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user_registration</title>
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="p-0 m-0">
    <div class="container-fluid" style="background-color:#e3b6c5">
        <h2 class="text-center"> New User Registration</h2>
        <div class="row d-flex align-items:center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username feild -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label"> Username</label>
                        <input type="text" id="user_username" class=form-control placeholder="Enter your user name " autocomplete="off" required="required" name="user_username">
                    </div>

                     <!-- email feild -->
                    <div class="form-outline  mb-4">
                        <label for="user_email" class="form-label"> E-mail</label>
                        <input type="email" id="user_email" class=form-control placeholder="Enter your email " autocomplete="off" required="required" name="user_email">
                    </div>

                     <!-- image feild -->
                     <div class="form-outline  mb-4">
                        <label for="user_image" class="form-label"> User Image </label>
                        <input type="file" id="user_image" class=form-control placeholder="Enter your email "  required="required" name="user_image">
                    </div>

                    <!-- password feild -->
                    <div class="form-outline  mb-4">
                        <label for="user_password" class="form-label"> Password </label>
                        <input type="password" id="user_password" class=form-control placeholder="Enter your password " autocomplete="off" required="required" name="user_password">
                    </div>

                    <!-- addresss feild -->
                    <div class="form-outline mb-4">
                        <label for="user_addresss" class="form-label"> Address</label>
                        <input type="text" id="user_address" class=form-control placeholder="Enter your address " autocomplete="off" required="required" name="user_address">
                    </div>

                    <!-- contact feild -->
                    <div class="form-outline mb-4">
                        <label for="user_mobile" class="form-label"> Contact</label>
                        <input type="text" id="user_Mobile" class=form-control placeholder="Enter your contact " autocomplete="off" required="required" name="user_mobile">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="py-2 px-3 border-0 text-white" name="user_register" style="background-color:#990033">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php"> Login</a> </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_register']))
{
    $name=$_POST['user_username'];
    $email=$_POST['user_email'];
    $photo=$_FILES['user_image']['name'];
    $photo_tmp=$_FILES['user_image']['tmp_name'];
    $password=$_POST['user_password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $address=$_POST['user_address'];
    $contact=$_POST['user_mobile'];
    $ip_add=getIPAddress();

    //select query
    $select_query="select user_name and user_email from user_table where user_name='$name' or user_email='$email'";
    $result_query=mysqli_query($CONNECTION,$select_query);
   $rows_count=mysqli_num_rows($result_query);
    if($rows_count>0)
    {
       echo "<script>alert('username or email already exist')</script>";
    }
    // elseif($contact<10)
    // {
    //    echo "<script>alert('invalid phone number')</script>";
    // }
    else
    {
        //insert query
       move_uploaded_file($photo_tmp,"./user_images/ $photo");

       $insert_query="insert into user_table (user_name,user_email, user_password,user_image,user_ip,user_address,user_mobile) values ('$name','$email','$hash_password','$photo','$ip_add',' $address',' $contact')";
       $result_insert_query=mysqli_query($CONNECTION,$insert_query);
       echo "<script> alert('Register successfully')</script>";
    }

   //selecting cart items //(sometime user is not logged in still have products in cart so this will redirect the user to checkout.php and in checkout.php we apply the logic that if the user is not logged in include login.php file  otherwise include payment.php)
   $select_cart_items="select * from cart_details where ip_address='$ip_add'";
   $result_cart=mysqli_query($CONNECTION,$select_cart_items);
   $cart_rows_count=mysqli_num_rows($result_cart);
   if($cart_rows_count>0)
   {
    $_SESSION['username']=$name;
    echo "<script> alert('You have items in your cart')</script>";
    echo "<script> window.open('checkout.php','_self') </script>";
   }
   //(if the user is logged in and do not have any item in the cart then it will redirect to home.php)
   else
   {
    echo "<script> window.open('../home.php','_self') </script>;";
   }
}

?>