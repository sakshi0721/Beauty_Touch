<?php

if(isset($_GET['delete_products']))
{
    $delete_id=$_GET['delete_products'];
    //echo $delete_id;
    //delete query
    $delete_query="Delete from products where product_id=$delete_id";
    $result=mysqli_query($CONNECTION, $delete_query);
    if($result)
    {
        echo "<script> alert('Product deleted Successfully') </script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>