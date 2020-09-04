<?php
  include("../db.php");
  
  if(isset($_POST['submit'])){
    $id_p = $_POST['id_payment'];
    $baki = $_POST['baki'];
    
    if($baki == "0"){
            $status = "Dah";
            $now = date("Y/m/d");
           
        }else {
            $status = "Belum";
            $now = "Tiada";
        }
    
    
    $payment = mysqli_query($conn,"UPDATE payment SET baki ='$baki', status_p='$status', time_done='$now'  WHERE id_payment='$id_p'");
    
   if ($payment){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Berjaya Dikemaskini')
		window.location.href='view_payment.php'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>

