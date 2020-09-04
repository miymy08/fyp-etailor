<?php
  include("../db.php");
  if(isset($_POST['submit'])){
    $id_o = $_POST['id_orders'];
    $id_fashion = $_POST['tailor_type'];
    $status = $_POST['status'];
    $pickup_date = $_POST['pickup_date'];
  
    
    
    $orders	= mysqli_query($conn,"UPDATE orders SET status='$status', pickup_date='$pickup_date' WHERE id_orders='$id_o' AND id_fashion='$id_fashion'");
    
   if ($orders){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Berjaya Dikemaskini')
		window.location.href='view_order.php'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>
