<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout page</title>
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    

    <style>
      body{
        overflow-x:hidden;
      }
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
      

      .logo{
    width: 5%;
    height: 5%;
}


      h6{
    text-align: justify;
}
.footAbout{
    text-align: justify;

}
.footImg{
    height:200px;
    width:200px;
}


    </style>

</head>
<body>
<!-- navbar-->
<div class="container-fluid p-0 m-0">
  <!-- first child-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-#210212 " style="background-color:#990033;">
    <div class="container-fluid">
      <img src="../photos/logo.png" alt="hello" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
           <li class="nav-item">
             <a class="nav-link" aria-current="page" href="../home.php">Home</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="../collections.php">Collections</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="user_registration.php">Register</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="../about.html">About Us</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="../contact.php">Contact Us</a>
           </li>
       </ul>
       <form class="d-flex" action="search_product.php" method="get">
         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
       </form>
     </div>
   </div>
 </nav>  

 <!--second child-->
  <nav class="navbar navbar-expand-lg navbar-light">
     <ul class="navbar-nav me-auto">
       <!-- <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
       </li> -->
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
                  <a class='nav-link' href='user_login.php'>Login</a>
                  </li>";
              }
              else
              {
                  echo"<li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Logout</a>
                  </li>";
              }
         ?> 
       <!-- <li class="nav-item">
         <a class="nav-link" href="user_login.php">Login</a>
       </li>  -->
     </ul>
   </nav>

<!--third child-->
<div class="p-4">
    <h3 class="text-center">Stoles & Shawls For Women</h3>
    <p class="text-center">Traditional fashion has evolved drastically in the past few years. We have a magnificent array of shawls for women.</p>
 </div>
 
  <!--fourth child-->
 <div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php
            if(!isset($_SESSION['username']))
            {
                include('user_login.php');
            }
            else
            {
                include('payment.php');
            }
            ?>
        </div>
    </div>
 </div>
 

  <!--last child-->
   <div class="row p-0 m-0 text-center text-white"  style="background-color:#990033;">
     <div class="col-md-3 p-4 ">
      <h5>BeautyTouch</h5><br>
      <img src="../photos/logo.png" alt="hello" class="footImg">
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