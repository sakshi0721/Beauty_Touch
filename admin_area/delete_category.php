<?php

if(isset($_GET['delete_category']))
{
    $delete_id=$_GET['delete_category'];
    //echo $delete_id;
    //delete query
    $delete_query="Delete from categories where category_id=$delete_id";
    $result=mysqli_query($CONNECTION, $delete_query);
    if($result)
    {
        echo "<script> alert('Category deleted Successfully') </script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>