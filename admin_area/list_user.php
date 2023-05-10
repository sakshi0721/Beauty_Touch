<h3 class="text-center text-success mt-2">All Users</h3>
<table class="table table-bordered mt-2 text-center">
    <thead style="background-color:#990033" class="text-light">

    <?php

    $get="select * from user_table";
    $result=mysqli_query($CONNECTION,$get);
    $count=mysqli_num_rows($result);
    echo"
        <tr>
            <th>Sr.No.</th>
            <th>User name</th>
            <th>user email</th>
            <th>User address</th>
            <th>User Mobie</th>
            <th>Delete</th>
        </tr>
       
    </thead>
    <tbody style='background-color:#e3b6c5'>";
    
    if($count==0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
    }
    else
    {
        $number=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $user_id=$row['user_id'];
            $user_name=$row['user_name'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_address=$row['user_address'];
            $user_mobile=$row['user_mobile'];
            $number++;
            echo " <tr>
            <td>$number</td>
            <td> $user_name</td>
            <td>$user_email</td>
            <td> $user_address</td>
            <td> $user_mobile</td>
            <td><a href='' class='text-black'><i class='fa-solid fa-trash' </i></a></td>
        </tr>";
        }
    }   
    ?>
    </tbody>
</table>