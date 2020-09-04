<?php
	include "../db.php";
    session_start();

    $id_users = $_SESSION['id_users'];
    $id_fashion = $_SESSION['id_fashion'];
    
    $bahu = $_SESSION['bahu'];
	$dada = $_SESSION['dada'];
    $l_tangan = $_SESSION['l_tangan'];
    $lengan = $_SESSION['lengan'];
    
    $pinggang = $_SESSION['pinggang'];
	$punggung = $_SESSION['punggung'];
    $l_kain = $_SESSION['l_kain'];
    
    $l_baju = $_SESSION['l_baju'];

    $kekek = $_SESSION['kekek'];

    $l_depan = $_SESSION['l_depan'];
	$l_belakang = $_SESSION['l_belakang'];

    $pesak_atas = ($dada/16)+0.5;
	$pesak_bwh = $punggung/8;

$query = mysqli_query($conn,"SELECT * FROM measurement WHERE id_users = '$id_users' AND id_fashion = '$id_fashion'");
$count = mysqli_num_rows($query);
if($count > 0){
    
    $update =mysqli_query($conn,"UPDATE measurement SET bahu = '$bahu', dada = '$dada', l_tangan = '$l_tangan', lengan='$lengan', pinggang='$pinggang', punggung='$punggung', l_kain='$l_kain', l_baju='$l_baju', kekek='$kekek', l_depan='$l_depan', l_belakang='$l_belakang', pesak_atas='$pesak_atas', pesak_bwh='$pesak_bwh' WHERE id_users='$id_users' AND id_fashion='$id_fashion'");
    
    if($update){
        echo "Berjaya Dikemaskini";
        header("location:m2.php?id_users=$id_users&id_fashion=$id_fashion");
        
    }else {
        echo "Gagal Dikemaskini";
        header("location:view_measurement.php?id_users=$id_users");
    }
    
} else {
    
    $insert = mysqli_query($conn,"INSERT INTO measurement (bahu, dada, l_tangan, lengan, pinggang , punggung, l_kain, l_baju, kekek, l_depan, l_belakang, pesak_atas,pesak_bwh, id_users, id_fashion) VALUES ('$bahu','$dada','$l_tangan','$lengan','$pinggang','$punggung','$l_kain','$l_baju','$kekek', '$l_depan','$l_belakang', '$pesak_atas','$pesak_bwh','$id_users','$id_fashion')");

    if($insert) {
        
        echo "Berjaya Masuk";
        header("location:m2.php?id_users=$id_users&id_fashion=$id_fashion");
    
    }else {
        
        echo "Gagal Masuk";
        header("location:view_measurement.php?id_users=$id_users");
    }
}
	

			
		
		
?>

<!--if (confirm('Are you sure you want to save this thing into the database?')) {
    // Save it!
} else {
    // Do nothing!
}-->