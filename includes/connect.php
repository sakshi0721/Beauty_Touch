<?php
  $CONNECTION=mysqli_connect('localhost','root','','Mystore');
  if(!$CONNECTION)
  {
     die(mysqli_error($CONNECTION));
  }
  else
  {
    //echo "connected";
  }
    



?>