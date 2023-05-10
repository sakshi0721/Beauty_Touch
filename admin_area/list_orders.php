<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-2 text-center">
    <thead style="background-color:#990033" class="text-light">

    <?php

    $get_order="select * from user_orders";
    $result_order=mysqli_query($CONNECTION,$get_order);
    $count=mysqli_num_rows($result_order);
    echo"
        <tr>
            <th>Sr.No.</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>Status</th>
        </tr>
       
    </thead>
    <tbody style='background-color:#e3b6c5'>";
    
    if($count==0)
    {
        echo "<h2 class='text-danger text-center mt-5>No Orders Yet </h2>";
    }
    else
    {
        $number=0;
        while($row_order=mysqli_fetch_assoc($result_order))
        {
            $order_id=$row_order['order_id'];
            $user_id=$row_order['user_id'];
            $amount_due=$row_order['amount_due'];
            $invoice_number=$row_order['invoice_number'];
            $total_products=$row_order['total_products'];
            $order_date=$row_order['order_date'];
            $order_status=$row_order['order_status'];
            $number++;
            echo " <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
        </tr>";
        }
    }   
    ?>
    </tbody>
</table>