<?php
  include('../includes/connect.php');
  include('../functions/common_functions.php');
  @session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_login</title>
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="p-0 m-0"  style="background-color:#e3b6c5">
    <div class="container-fluid">
        <h2 class="text-center m-5"> Admin Login</h2>
        <div class="row d-flex align-items:center justify-content-center">
            <div class="col-lg-6 col-xl-5 m-4">
                <img src="../photos/preview.png" alt="admin registration" class="img-fluid" style="margin-right:40px">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <!-- username feild -->
                    <div class="form-outline mb-4">
                        <label for="admin_username" class="form-label"> Username</label>
                        <input type="text" id="admin_username" class=form-control placeholder="Enter your user name " autocomplete="off" required="required" name="admin_username">
                    </div>

                    <!-- password feild -->
                    <div class="form-outline  mb-4">
                        <label for="admin_password" class="form-label"> Password </label>
                        <input type="password" id="admin_password" class=form-control placeholder="Enter your password " autocomplete="off" required="required" name="admin_password">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="login" class="py-2 px-3 border-0 text-white" name="admin_login" style="background-color:#990033">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="admin_register.php"> Register</a> </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_login']))
{
    $name=$_POST['admin_username'];
    $password=$_POST['admin_password'];


    $select_query="select * from admin_table where admin_name='$name'";
    $result=mysqli_query($CONNECTION, $select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    //$user_ip=getIPAddress();

    if($row_count>0)
    {
        $_SESSION['admin']= $name;
        if(password_verify($password,$row_data['admin_password']))
        {
            echo "<script> alert ('Login Successfully') </script>";
            echo "<script> window.open('index.php','_self') </script>";
        }
        else
        {
            echo "<script> alert ('Invalid Credentials') </script>";
        }
    }
    else
    {
        echo "<script> alert ('Invalid credentials') </script>";
    }
}




?>