<?php
  include('../includes/connect.php');
  include('../functions/common_functions.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin reg</title>
     <!-- bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body
        {
            overflow-x:hidden;
            background-color:#e3b6c5;
        }
        
    </style>
</head>
<body>
    <h2 class="text-center m-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5 m-4">
            <img src="../photos/preview.png" alt="admin registration" class="img-fluid" style="margin-right:40px">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username feild -->
                <div class="form-outline mb-4">
                    <label for="admin_username" class="form-label"> Username</label>
                    <input type="text" id="admin_username" class=form-control placeholder="Enter your user name " autocomplete="off" required="required" name="admin_username">
                </div>
                <!-- email feild -->
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label"> Email</label>
                    <input type="email" id="admin_email" class=form-control placeholder="Enter your email " autocomplete="off" required="required" name="admin_email">
                </div>
                <!-- password feild -->
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label"> Password</label>
                    <input type="passwpord" id="admin_password" class=form-control placeholder="Enter password " autocomplete="off" required="required" name="admin_password">
                </div>
                <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="py-2 px-3 border-0 text-white" name="admin_register" style="background-color:#990033">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin_login.php"> Login</a> </p>
                    </div>
            </form>
        </div>
    </div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</script>
</body>
</html>


<?php
if(isset($_POST['admin_register']))
{
    $name=$_POST['admin_username'];
    $email=$_POST['admin_email'];
    $password=$_POST['admin_password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);

    //select query
    $select_query="select admin_name and admin_email from admin_table where admin_name='$name' or admin_email='$email'";
    $result_query=mysqli_query($CONNECTION,$select_query);
   $rows_count=mysqli_num_rows($result_query);
    if($rows_count>0)
    {
       echo "<script>alert('username or email already exist')</script>";
    }
    else
    {
        //insert query
       $insert_query="insert into admin_table (admin_name,admin_email, admin_password) values ('$name','$email','$hash_password')";
       $result_insert_query=mysqli_query($CONNECTION,$insert_query);
       echo "<script>alert('Register successfully')</script>";
    }

}

?>