 <?php



$conn = mysqli_connect("localhost", "miymy", "Mnvxz1997", "miymy_etailor");  

 session_start();

 

    $id_orders = $_GET['id_orders'];

     

     echo $id_orders;

    

     $o = "SELECT * FROM orders WHERE id_orders=$id_orders";

     $query_o = mysqli_query($conn,$o);

     $row_o = mysqli_fetch_array($query_o);

     $id_users = $row_o['id_users'];

     $order_code = $row_o['order_code'];

     $id_fashion = $row_o['id_fashion'];

     $catatan = $row_o['catatan'];

     $receive_date = $row_o['receive_date'];

     $pickup_date = $row_o['pickup_date'];

     

     

     $f = "SELECT * FROM fashion WHERE id_fashion='$id_fashion'";

     $query_f = mysqli_query($conn,$f);

     $row_f = mysqli_fetch_array($query_f);

     $fashion_name = $row_f['fashion_name'];

     

     $c = "SELECT * FROM users WHERE id_users='$id_users'";

     $query_c = mysqli_query($conn,$c);

     $row_c = mysqli_fetch_array($query_c);

     $f_name = $row_c['f_name'];

     $ic = $row_c['ic_no'];

     $phone = $row_c['phone_no'];

     

     $p = "SELECT * FROM payment WHERE order_code='$order_code'";

     $query_p = mysqli_query($conn,$p);

     $row_p = mysqli_fetch_array($query_p);

     $baki = $row_p['baki'];

     

      echo $phone;

     

header("location: https://api.whatsapp.com/send?phone=6$phone&text=Kepada:%0a$f_name%0a $ic %0a%0aTempahan Pakaian%0aKod Tempahan:  $order_code ,%0aCatatan:  $catatan ,%0aBaki yang perlu dibayar: RM $baki ,%0aTempahan anda telah di terima pada %0a$receive_date  telah pun siap.%0aAnda boleh mengambil tempahan anda pada %0a $pickup_date %0a%0aWaktu Bekerja: 8.00 pagi - 5.00 petang%0a%0aNaim Butik ");



?>

<!-- 

<a href="https://api.whatsapp.com/send?phone=6<?php /*echo $phone ?>

         

         &text=Kepada:%0a<?php echo $f_name ?>%0a<?php echo $ic ?>%0a%0aTempahan Pakaian%0aKod Tempahan: <?php echo $order_code ?>,%0aCatatan: <?php echo $catatan ?>,%0aBaki yang perlu dibayar: RM<?php echo $baki ?>,%0aTempahan anda telah di terima pada %0a<?php echo $receive_date ?> telah pun siap.%0aAnda boleh mengambil tempahan anda pada %0a<?php echo $pickup_date */?>%0a%0aWaktu Bekerja: 8.00 pagi - 5.00 petang%0a%0aNaim Butik" target="_blank">	Click to WhatsApp Chat</a>

         -->