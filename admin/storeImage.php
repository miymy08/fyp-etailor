<?php

session_start();

	
if(isset($_POST['submit'])) {
    
    for($i=0;$i<=$_SESSION['formnumber'];$i++) {

    $img = $_POST['image'];//datang dari form
    $folderPath = "snap/";//ke destinasi
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = 'Cloth '.uniqid() . '.png';//nama file
  
    $file = $folderPath . $fileName;//arah tuju file dan nama file
    file_put_contents($file, $image_base64);//kandungan gambaq
        
    header('location:snap.php');
	
        
    }
  
}
   #print_r($fileName);
   $_SESSION['filename'] = $fileName;
	
	header('location:add_order.php');
	



	
?>