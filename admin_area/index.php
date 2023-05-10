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
    <title>Admin Dashboard</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file link-->
    <link rel="stylesheet" href="../home.css">

    <style>
        .admin-image{
          width: 100px;
          object-fit: contain;
         }
body{
    overflow-x:hidden;
}
        
.product_image{
    width:100px;
    object-fit:contain;
}
    </style>
</head>
<body>
    
 <!-- navbar-->
 <div class="container-fluid p-0">
    <!-- first child-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#990033">
        <div class="container-fluid">
            <img src="../photos/logo.png" alt="hello" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                <?php
            if(!isset($_SESSION['admin']))
            {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'> Welcome Guest</a>
                </li>";
            }
            else
            {
              echo"<li class='nav-item'>
              <a class='nav-link' href='#'> Welcome ".$_SESSION['admin']."</a>
              </li>";
            }
         ?> 
                </ul>
            </nav>
        </div>
    </nav>
     <!-- second child -->
     <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
     </div>
      <!-- third child-->
      <div class="row">
        <div class="col-md-12 p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../photos/slider1.jpg" alt="hello" class="admin-image"></a>
                <p class="text-dark text-center">   
                    <?php
                    if(!isset($_SESSION['admin']))
                    {
                      echo "Admin name";
                    }
                    else
                    {
                     echo $_SESSION['admin'];
                    }
                    ?> 
                </p>
            </div>
            <div class="button text-center m-auto" >
                <button><a href="insert_product.php" class="nav-link text-light my-1 p-2" style="background-color:#990033">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light my-1 p-2" style="background-color:#990033">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light my-1 p-2" style="background-color:#990033">Insert categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light my-1 p-2" style="background-color:#990033">View Categories</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light my-1 p-2" style="background-color:#990033">All Orders</a></button>
                <button><a href="index.php?list_user" class="nav-link text-light my-1 p-2" style="background-color:#990033">List Users</a></button>
                <button>
                    <?php
                     if(!isset($_SESSION['admin']))
                    {
                     echo "<a class='nav-link text-light my-1 p-2' style='background-color:#990033' href='admin_login.php'>Login</a>";
                    }
                    else
                    {
                     echo"<a class='nav-link text-light my-1 p-2'  style='background-color:#990033' href='admin_logout.php'>Logout</a>";
                    }
                    ?>
                </button>
            </div>
        </div>
      </div>
      <!--fourth child-->
      <div class="container my-3">
        <?php
           if(isset($_GET['insert_category']))
           {
            include('insert_categories.php');
           }
           if(isset($_GET['view_products']))
           {
            include('view_products.php');
           }
           if(isset($_GET['delete_products']))
           {
            include('delete_products.php');
           }
           if(isset($_GET['view_categories']))
           {
            include('view_categories.php');
           }
           if(isset($_GET['delete_category']))
           {
            include('delete_category.php');
           }
           if(isset($_GET['list_orders']))
           {
            include('list_orders.php');
           }
           if(isset($_GET['list_user']))
           {
            include('list_user.php');
           }
        ?>
      </div>
 <!--last child-->
 <div class="row p-3 text-center text-white footer"  style="background-color:#990033;">
     <div class="col-md-3 p-4 ">
     <h5>BeautyTouch</h5><br>
     <img src="../photos/logo.png" alt="hello" class="footImg">
     <br>
     Estd. 1995
     goyalsakshi0744@gmail.com
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
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</script>

</body>
</html>

