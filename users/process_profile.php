<?php
  include("../db.php");
  
  if(isset($_POST['submit'])){
    $id_users = $_POST['id_users'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    
    
    
    $profile = mysqli_query($conn,"UPDATE users SET alamat='$alamat', phone_no ='$phone' WHERE id_users='$id_users'");
    
   if ($profile){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Berjaya Dikemaskini')
		window.location.href='view_profile.php?id_users=$id_users'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>
