
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-2">
        <thead class="text-white text-center" style="background-color:#990033">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total sold</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody style="background-color:#e3b6c5">
        <?php
        $get_products="Select * from products";
        $result=mysqli_query($CONNECTION,$get_products);
        $number=0;
        while($row=mysqli_fetch_array($result))
        {
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
        ?>
            <tr class='text-center'>
            <td> <?php echo $number; ?></td>
            <td> <?php echo $product_title; ?></td>
            <td> <img src='./product_images/<?php echo $product_image ?>' class=' product_image'>;</td>
            <td> <?php echo $product_price; ?></td>
            <td> 
                <?php 
                 $get_count="select * from pending_order where product_id=$product_id"; 
                 $result_count=mysqli_query($CONNECTION,$get_count);
                 $rows_count=mysqli_num_rows($result_count);
                 echo  $rows_count;
                 ?>
            </td>
            <td> <?php echo $status; ?></td>
            <td><a href="index.php?delete_products=<?php echo $product_id ?>" class="text-black"><i class="fa-solid fa-trash"</i></a></td>
        </tr>
        <?php
        }
   ?>
        </tbody>
    </table>
