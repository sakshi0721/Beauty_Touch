<?php
include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $keywords=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $rupees=$_POST['product_price'];
    $pruduct_status='true';

   //accessing images
    $product_image=$_FILES['product_image']['name'];
    //accessing temporaray image name
    $temp_image=$_FILES['product_image']['tmp_name'];


    // checking empty condition
    if($product_title=='' or $product_description=='' or $product_category=='' or $rupees=='' or  $product_image=='' )
    {
        echo "<script> alert('Please fill all the available fields') </script>";
        exit();
    }
    else
    {
        move_uploaded_file($temp_image,"./product_images/$product_image");
        //insert query
        $inserts_products="insert into products(product_title,product_description,product_keyword,category_id,product_image,
        product_price,date,status) values ('$product_title','$product_description',' $keywords','$product_category',
        '$product_image','$rupees',NOW(),'$pruduct_status')";

        $result_query=mysqli_query($CONNECTION,$inserts_products);
        if($result_query)
        {
            echo "<script> alert('Successfully inserted the product') </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products-Admin dashboard</title>

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

     <!--css file link-->
    <link rel="stylesheet" href="home.css">
</head>
<body style="background-color:#e3b6c5">
  <div class="container mt-3">
     <h1 class="text-center">Insert Product</h1>
     <!-- Form -->
     <form action="" method="post" enctype="multipart/form-data">
          <!-- title -->
          <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_title" class="form-label">Product title</label>
              <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
          </div>
          <!-- description -->
          <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_description" class="form-label">Product description</label>
              <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
          </div>
          <!-- keyword-->
          <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_keyword" class="form-label">Product keywords</label>
              <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
          </div>
          <!-- categories-->
          <div class="form-outline mb-4 w-50 m-auto">
              <select name="product_category" id="" class="form-select">
                 <option value="">Select a category</option>
                 <?php
                 $select_query="select * from categories";
                 $result_query=mysqli_query($CONNECTION,$select_query);
                 while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'> $category_title </option>";
                 }
                 ?>
              </select>
          </div>
          <!-- image -->
          <div class="form-outline mb-4 w-50 m-auto">
              <label for="Product_image " class="form-label">Product image </label>
              <input type="file" name="product_image" id="product_image" class="form-control" required="required">
          </div>
          <!--price -->
          <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_price " class="form-label">Product price </label>
              <input type="text" name="product_price" id="product_price " class="form-control" placeholder="Enter product price " autocomplete="off" required="required">
          </div>
           <!--button-->
          <div class="form-outline mb-4 w-50 m-auto">
             <input type="submit" name="insert_product" value="Insert Products" class="btn text-light mb-3 px-3" style="background-color:#990033">
          </div>
      </form>
  </div>

</body>
</html>