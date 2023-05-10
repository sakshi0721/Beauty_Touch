<?php
// include connection file
//include('./includes/connect.php');

// getting  products functions
function getproducts()
{
    global $CONNECTION;
    // condition to check isset or not
    if(!isset($_GET['category']))
    {
      $select_query="select * from products order by rand() LIMIT 0,9";
      $result_query=mysqli_query($CONNECTION,$select_query);
      while($row=mysqli_fetch_assoc($result_query))
      {
       $product_id=$row['product_id'];
       $title=$row['product_title'];
       $description=$row['product_description'];
       $category_id=$row['category_id'];
       $image=$row['product_image'];
       $price=$row['product_price'];
       echo " <div class='col-md-4 mb-2'>
       
       <div class='card'>
               <img src='./admin_area/product_images/$image' class='card-img-top' alt='...'>
               <div class='card-body'>
                 <h5 class='card-title'>$title</h5>
                 <p class='card-text'>$description</p>
                 <p class='card-price'> Price: $price/-</p>
                 <a href='home.php?add_to_cart=$product_id' class='btn text-white' style='background-color:#990033'>Add to cart</a>
                 <a href='collections.php' class='btn text-black' style='background-color:#e3b6c5'>View more</a>
              </div>
        </div>
      </div>";
      }
    }
}


//getting all products for collections.php file
function getallproducts()
{
    global $CONNECTION;
    // condition to check isset or not
    if(!isset($_GET['category']))
    {
      $select_query="select * from products order by rand()";
      $result_query=mysqli_query($CONNECTION,$select_query);
      while($row=mysqli_fetch_assoc($result_query))
      {
       $product_id=$row['product_id'];
       $title=$row['product_title'];
       $description=$row['product_description'];
       $category_id=$row['category_id'];
       $image=$row['product_image'];
       $price=$row['product_price'];
       echo " <div class='col-md-4 mb-2'>
       <div class='card'>
               <img src='./admin_area/product_images/$image' class='card-img-top' alt='...'>
               <div class='card-body'>
                 <h5 class='card-title'>$title</h5>
                 <p class='card-text'>$description</p>
                 <p class='card-price'>Price: $price/-</p>
                 <a href='home.php?add_to_cart=$product_id' class='btn text-white' style='background-color:#990033'>Add to cart</a>
              </div>
        </div>
      </div>";
      }
    }
}

// getting unique  categories from the sidenav when clicked 
function getuniquecategory()
{
    global $CONNECTION;
    // condition to check isset or not
    if(isset($_GET['category']))
    {
      $category_id=$_GET['category'];
      $select_query="select * from products where category_id=$category_id";
      $result_query=mysqli_query($CONNECTION,$select_query);
      $number_of_rows=mysqli_num_rows($result_query);
      if($number_of_rows==0)
      {
        echo"<h2 class='text-center text-danger'>No stock for this category</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query))
      {
       $product_id=$row['product_id'];
       $title=$row['product_title'];
       $description=$row['product_description'];
       $category_id=$row['category_id'];
       $image=$row['product_image'];
       $price=$row['product_price'];
       echo " <div class='col-md-4 mb-2'>
       <div class='card'>
               <img src='./admin_area/product_images/$image' class='card-img-top' alt='...'>
               <div class='card-body'>
                 <h5 class='card-title'>$title</h5>
                 <p class='card-text'>$description</p>
                 <p class='card-price'>Price: $price/-</p>
                 <a href='home.php?add_to_cart=$product_id' class='btn text-white' style='background-color:#990033'>Add to cart</a>
                 <a href='collections.php' class='btn text-black' style='background-color:#e3b6c5'>View more</a>
              </div>
        </div>
      </div>";
      }
    }
}



// displaying categories in sidenav in home page 
function getcategories()
{
    global $CONNECTION;
    $select_category="select * from categories";
    $result_category=mysqli_query($CONNECTION, $select_category);
    while($row_data=mysqli_fetch_assoc($result_category))
        {
          $category_title=$row_data['category_title'];
          $category_id=$row_data['category_id'];
          echo "<li class='nav-item'>
          <a href='home.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
        }
}


// displaying categories in sidenav in collections page 
function getcategories2()
{
    global $CONNECTION;
    $select_category="select * from categories";
    $result_category=mysqli_query($CONNECTION, $select_category);
    while($row_data=mysqli_fetch_assoc($result_category))
        {
          $category_title=$row_data['category_title'];
          $category_id=$row_data['category_id'];
          echo "<li class='nav-item'>
          <a href='collections.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
        }
}


//searching products
function search_products()
{
  global $CONNECTION;
  if(isset($_GET['search_data_product']))
  {
    $search_value=$_GET['search_data'];
  // condition to check isset or not
    $search_query="select * from products where product_keyword like'%$search_value%'";
    $result_query=mysqli_query($CONNECTION,$search_query);
    $number_of_rows=mysqli_num_rows($result_query);
      if($number_of_rows==0)
      {
        echo"<h2 class='text-center text-danger'>No result match. No products found for this category</h2>";
      }
    while($row=mysqli_fetch_assoc($result_query))
    {
     $product_id=$row['product_id'];
     $title=$row['product_title'];
     $description=$row['product_description'];
     $category_id=$row['category_id'];
     $image=$row['product_image'];
     $price=$row['product_price'];
     echo " <div class='col-md-4 mb-2'>
     <div class='card'>
             <img src='./admin_area/product_images/$image' class='card-img-top' alt='...'>
             <div class='card-body'>
               <h5 class='card-title'>$title</h5>
               <p class='card-text'>$description</p>
               <p class='card-price'>Price: $price/-</p>
               <a href='home.php?add_to_cart=$product_id' class='btn text-white' style='background-color:#990033'>Add to cart</a>
               <a href='collections.php' class='btn text-black' style='background-color:#e3b6c5'>View more</a>
            </div>
      </div>
    </div>";
    }
  }
}

//get ip address function

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  


//cart function
function cart()
{
if(isset($_GET['add_to_cart']))
{
  global $CONNECTION;
  $get_ip_add=getIPAddress();  
  $get_product_id=$_GET['add_to_cart'];
  $select_query="select ip_address and product_id  from cart_details where ip_address='$get_ip_add' and product_id=$get_product_id";
  $result_query=mysqli_query($CONNECTION,$select_query);
  $number_of_rows=mysqli_num_rows($result_query);
      if($number_of_rows>0)
      {
        echo"<script> alert('This itam is already present in the cart') </script>";
        echo"<script> window.open('home.php','_self')</script>";
      }
      else
      {
        $insert_query="insert into cart_details(product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
        $result_query=mysqli_query($CONNECTION,$insert_query);
        echo "<script> alert('Itam is added to cart') </script>";
         echo"<script> window.open('home.php','_self')</script>";

      }
  }
}
//function to get the cart item number
function cart_item()
{
  if(isset($_GET['add_to_cart']))
{
  global $CONNECTION;
  $get_ip_add=getIPAddress();  

  $select_query="select * from cart_details where ip_address='$get_ip_add'";
  $result_query=mysqli_query($CONNECTION,$select_query);
  $count_cart_items=mysqli_num_rows($result_query);
}     
else
{
  global $CONNECTION;
  $get_ip_add=getIPAddress();  

  $select_query="select * from cart_details where ip_address='$get_ip_add'";
  $result_query=mysqli_query($CONNECTION,$select_query);
  $count_cart_items=mysqli_num_rows($result_query);
}
echo $count_cart_items;
}


//total price function
function total_cart_price()
{
  global $CONNECTION;
  $get_ip_add=getIPAddress();
  $total_price=0;
  $cart_query="select * from cart_details where ip_address='$get_ip_add'";
  $cart_result_query=mysqli_query($CONNECTION,$cart_query);
  while($row=mysqli_fetch_array($cart_result_query))
  {
    $product_id=$row['product_id'];
    $select_products="select product_price from products where product_id='$product_id'";
    $result_query=mysqli_query($CONNECTION,$select_products);
    while($row_product_price=mysqli_fetch_array($result_query))
    {
      $product_price=array($row_product_price['product_price']);
      $product_values=array_sum($product_price);
      $total_price+=$product_values;
    }
  }
  echo $total_price;
}

// get user order detail (in profile.php)
function get_user_order_details()
{
  global $CONNECTION;
  $name=$_SESSION['username'];
  $get_details="Select * from user_table where user_name='$name'";
  $get_details_result=mysqli_query($CONNECTION,$get_details);
  while($row_query=mysqli_fetch_array($get_details_result))
  {
    $id=$row_query['user_id'];
      if(!isset($_GET['my_orders']))
      {
        if(!isset($_GET['delete_account']))
        {
          $get_orders="Select * from user_orders where user_id=$id and order_status='pending' ";
          $get_orders_result=mysqli_query($CONNECTION,$get_orders);
          $count_orders=mysqli_num_rows($get_orders_result);
          if($count_orders>0)
          {
            echo "<h3 class='text-center text-success mt-5 mb-3'> You have <span class='text-danger'>$count_orders</span> pending orders</h3>
            <p class='text-center' ><a href='profile.php?my_orders' class='text-dark'> Order Details </a></p>";
          }
          else
          {
            echo "<h3 class='text-center text-success mt-5 mb-3'> You have zero pending orders</h3>
            <p class='text-center' ><a href='../collections.php' class='text-dark'> Explore Products </a></p>";
          }
        }
      }
  }

}


?>  