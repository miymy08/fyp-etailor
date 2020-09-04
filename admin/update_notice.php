 <?php



$conn = mysqli_connect("localhost", "miymy", "Mnvxz1997", "miymy_etailor");  

 session_start();

 

    $id_orders = $_GET['id_orders'];

     

    $notis= 'Dah';



    $update = mysqli_query($conn,"UPDATE orders SET notice='$notis' WHERE id_orders='$id_orders'");

     

      

     

if ($update){

      echo "<SCRIPT LANGUAGE='Javascript'>

		window.alert('Notis WhatsApp Berjaya Dihantar!')

		window.location.href='view_order.php'</SCRIPT>";

    }else{

      echo "FELLLL";

    }

  

?>

<!-- 

