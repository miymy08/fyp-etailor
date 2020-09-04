<?php
include "../db.php";

if(isset($_POST['submit'])){

	$users = $_POST['idname'];
	$id_fashion = 0;
	$bahu = $_POST['bahu'];
	$dada = $_POST['dada'];
	$l_bj = $_POST['l_baju'];
	$l_dpn = $_POST['l_bjdepan'];
	$l_blkg = $_POST['l_bjblkg'];
	$l_tgn = $_POST['l_tangan'];
	$lengan = $_POST['lengan'];
	$kekek = $_POST['kekek'];
	$pinggang = $_POST['pinggang'];
	$punggung = $_POST['punggung'];
	$l_kain = $_POST['l_kain'];
	
	$pesak_atas = ($dada/16)+0.5;
	$pesak_bwh = $punggung/8;
	

$info = mysqli_query($conn, 
	"INSERT INTO measurement 
	(id_users,id_fashion,bahu,dada,l_baju,lengan,l_tangan,l_depan,l_belakang,pinggang,punggung,	l_kain,pesak_atas,pesak_bwh,kekek) 
	values 
	('$users','$id_fashion','$bahu','$dada','$l_bj','$lengan','$l_tgn','$l_dpn','$l_blkg','$pinggang','$punggung','$l_kain','$pesak_atas','$pesak_bwh','$kekek')");

if  ($info) {
      echo "<SCRIPT LANGUAGE='Javascript'>
		window.alert('Ukuran berjaya Ditambah')
		window.location.href='view_measurement.php?id_users=$users'
		</SCRIPT>";
    }else{
	echo "Ukuran gagal ditambah";
}
} else {
    echo "gagal";
}
?>