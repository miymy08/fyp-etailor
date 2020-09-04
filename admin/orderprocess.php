<?php  
 //insert.php  
 include ('../db.php');
 session_start();
 if(isset($_POST["pickup_date"]))  
 {  

      $pickup_date = mysqli_real_escape_string($conn, $_POST["pickup_date"]);  
      $receive_date = mysqli_real_escape_string($conn, $_POST["receive_date"]);  
      $status = mysqli_real_escape_string($conn, $_POST["status"]);
      $catatan = mysqli_real_escape_string($conn, $_POST["catatan"]);
      $img = mysqli_real_escape_string($conn, $_POST["image"]);
      
      $order_code = $_POST["ord_code"];
      
      
      
      
      
      
      
      
      $sql = "INSERT INTO orders(, message) VALUES ('$name', '$message')";

      if(mysqli_query($connect, $sql))  
      {  
           echo "Message Saved";  
      }  
 }  
 ?> 
      $order_code = $_POST["ord_code"];;
      $pickup_date = $_POST["pickup_date"];  
      $receive_date = $_POST["receive_date"];  
      $status = $_POST['status'];
      $catatan = $_POST['catatan'];
      
     $img = $_POST['image'];//datang dari form
     $folderPath = "upload/";//ke destinasi
     $id_users = $_SESSION['id_users'];
     $id_fashion = $_SESSION['id_fashion'];
     $image_parts = explode(";base64,", $img);
     $image_type_aux = explode("image/", $image_parts[0]);
     $image_type = $image_type_aux[1];
  
     $image_base64 = base64_decode($image_parts[1]);
     $fileName = 'Cloth '.uniqid() . '.jpeg';//nama file
  
     $file = $folderPath . $fileName;//arah tuju file dan nama file
     file_put_contents($file, $image_base64);//kandungan gambaq
      
     $pic = $fileName;
      
      
      $sql = mysqli_query($conn, "INSERT INTO orders 
      (order_code, pickup_date, receive_date, sttus, 
      catatan, id_users, id_fashion, pic ) VALUES 
      ('$order_code', '$pickup_date', '$receive_date', '$status',
      '$catatan', '$id_users', '$id_fashion', '$pic')");

      if($sql)
      {  
           echo "Message Saved";
            
      }  else {
           echo "tak jadi gilerr";
      }
 }  
 ?>  