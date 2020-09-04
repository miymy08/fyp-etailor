<?php
	include "../db.php";
	if (isset($_POST['submit'])){
		$payment_code = $_POST['payment_code'];
		$order_code = $_POST['order_code'];
		$id_fashion = $_POST['id_fashion'];
		$kuantiti = $_POST['kuantiti'];
		$jumlah = $_POST['jumlah'];
		$deposit = $_POST['deposit'];
        $baki = $_POST['baki'];
		
    if($baki == "0"){
            $status = "Dah";
            $now = date("Y/m/d");
        }else {
            $status = "Belum";
            $now = "Tiada";
        }
		
		$query = mysqli_query($conn,"INSERT INTO payment (payment_code, order_code, id_fashion, kuantiti, jumlah, deposit, baki, status_p) VALUES ('$payment_code','$order_code', '$id_fashion','$kuantiti','$jumlah',
		'$deposit','$baki','$status')");
		
	

		
		if ($query) {
			
			echo "<SCRIPT LANGUAGE='Javascript'>
		      window.alert('Berjaya Menyimpan Pembayaran dan Tempahan')
		      window.location.href='view_payment.php'
		      </SCRIPT>";	
		
		}else{
			echo "FAIL";
		}
	} else{
		echo "fail";
	}		
?>

<!--if (confirm('Are you sure you want to save this thing into the database?')) {
    // Save it!
} else {
    // Do nothing!
}-->