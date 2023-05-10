<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-2">
    <thead style="background-color:#990033" class="text-light text-center">
        <tr>
            <th>Sr.No.</th>
            <th>Category Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody style="background-color:#e3b6c5" class="text-center">
    <?php
    $fetch_cat="select * from categories";
    $result=mysqli_query($CONNECTION, $fetch_cat);
    $number=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $category_id=$row['category_id'];
        $category_title=$row['category_title'];
        $number++;
    ?>
        <tr>
            <td> <?php echo $number ?></td>
            <td> <?php echo $category_title ?></td>
            <td><a href="index.php?delete_category=<?php echo  $category_id ?>" type="button" class="text-black" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash" </i></a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this??</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_category" class="text-decoration-none text-light">No</a></button>
        <button type="button" class="btn btn-primary"> <a href="index.php?delete_category=<?php echo $category_id ?>" class="text-black text-decoration-none">Yes</a> </button>
      </div>
    </div>
  </div>
</div>
