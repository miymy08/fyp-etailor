<?php  

 //insert.php  

 $conn = mysqli_connect("localhost", "miymy", "Mnvxz1997", "miymy_etailor");  

 session_start();

 if(isset($_POST["order_code"]))  

 {  

      $order_code = $_POST["order_code"];  

      $receive_date = $_POST["receive_date"];

      $pickup_date = $_POST["pickup_date"];

      $status = $_POST["status"];

      $catatan = $_POST["catatan"];

      $notice = 'Belum';    

      $id_users = $_SESSION['id_users'];

      $id_fashion = $_SESSION['id_fashion'];

      $id_measurement = $_SESSION['id_measurement'];

      $sourcePath = $_FILES['userImage']['tmp_name'];

      $targetPath = "upload/".$_FILES['userImage']['name'];

      $fileName = $_FILES['userImage']['name'];

      $move = move_uploaded_file($sourcePath,$targetPath);







      $sql = "INSERT INTO orders (order_code, receive_date, pickup_date, status, 

      catatan, notice, image, id_users, id_fashion, id_measurement) VALUES ('$order_code', '$receive_date'

      , '$pickup_date', '$status', '$catatan','$notice', '$fileName', '$id_users', '$id_fashion','$id_measurement')";  

      if(mysqli_query($conn, $sql))  

      {  

           echo "Tempahan telah Berjaya";

    



      }  else {

          

          echo "Tempahan Gagal";

      }

     

     

     if($move) {

         

         ?>

    

<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" />



        <?php

     } else {

         echo "fails";

     }

 }

     

 

 ?> 