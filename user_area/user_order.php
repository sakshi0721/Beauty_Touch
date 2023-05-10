<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $name=$_SESSION['username'];
    $get_user="Select * from user_table where user_name='$name' ";
    $result=mysqli_query($CONNECTION,$get_user);
    $fetch=mysqli_fetch_assoc($result);
    $id=$fetch['user_id'];
    //echo $id;
    ?>

    <h2 class="text-success text-center">All my orders</h2>
      <h3 class="text-success"></h3>
      <table class="table table-bordered mt-5 text-center">
        <thead style="background-color:#990033">
             <tr class="text-light">
                <th>Sr. No.</th>
                <th>Amount_Due</th>
                <th>Total Proucts</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
           </tr>
        </thead>
        <tbody style="background-color:#e3c6b5">
            <?php

            $get_order_detail="Select * from user_orders where user_id=$id";
            $result_detail=mysqli_query($CONNECTION, $get_order_detail);
            //because one user can have multiple orders
            $number=1;
            while($row_orders=mysqli_fetch_assoc( $result_detail))
            {
                $order_id=$row_orders['order_id'];
                $amount_due=$row_orders['amount_due'];
                $total_products=$row_orders['total_products'];
                $invoive_number=$row_orders['invoice_number'];
                $order_date=$row_orders['order_date'];
                $order_status=$row_orders['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }
                else{
                    $order_status='Complete';
                }
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoive_number</td>
                <td>$order_date</td>
                <td>$order_status</td>"
                ?>
                <?php
                if($order_status=='Complete')
                {
                    echo "<td>Paid</td>";
                }
                else
                {
                  echo "<td> <a href='confirm_payment.php?order_id=$order_id'> Confirm </a> </td>
                  </tr>";
                }
               $number++;
            }

               ?> 
            
        </tbody>
      </table>
</body>
</html>