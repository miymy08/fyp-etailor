<?php
  include("../db.php");
  
  if(isset($_POST['submit'])){
    $id_tailor = $_POST['id_tailor'];
    $phone = $_POST['phone'];
    
    
    
    $profile = mysqli_query($conn,"UPDATE tailor SET  phone_no ='$phone' WHERE id_tailor='$id_tailor'");
    
   if ($profile){
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Berjaya Dikemaskini')
		window.location.href='view_profile.php?id_tailor=$id_tailor'
		</SCRIPT>";
    }else{
      echo "FELLLL";
    }
  }else{
    echo "fail";
  }
?>
