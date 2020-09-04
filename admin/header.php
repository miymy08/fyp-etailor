
<?php

include "../db.php";
session_start();

?>
<div class="w3-top">
  <div class="w3-bar w3-special-blue w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hide-medium" ><img src="images/etailor2.png" style="height:18px;"></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LAMAN UTAMA</a>
	<div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="Customer">PELANGGAN</button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="add_customer.php" class="w3-bar-item w3-button">TAMBAH PELANGGAN</a>
        <a href="view_customer.php" class="w3-bar-item w3-button">PAPAR SENARAI PELANGGAN</a>
       </div>
    </div>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="Tailor">TUKANG JAHIT</button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="add_tailor.php" class="w3-bar-item w3-button">TAMBAH TUKANG JAHIT</a>
        <a href="view_tailor.php" class="w3-bar-item w3-button">PAPAR SENARAI TUKANG JAHIT</a>
       </div>
    </div>
      <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="Tailor">TEMPAHAN</button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="view_order.php" class="w3-bar-item w3-button">PAPAR SENARAI TEMPAHAN</a>
        <!--<a href="view_dorder.php" class="w3-bar-item w3-button">PAPARAN TEMPAHAN SIAP</a>-->
        <a href="view_payment.php" class="w3-bar-item w3-button">PAPAR SENARAI PEMBAYARAN</a>
       </div>
    </div>
      <div class="w3-dropdown-hover w3-hide-small">
      <!--  <button class="w3-padding-large w3-button" title="More">ADD ON</button>     
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="#" class="w3-bar-item w3-button">NEW TAILOR</a>
        <a href="#" class="w3-bar-item w3-button">VIEW TAILOR</a>
       </div>-->
    </div>
    <a onclick="return confirm('Adakah anda pasti untuk log keluar?');" href="../logout.php" class="w3-button w3-padding-large w3-hover-red w3-hide-small w3-right">LOG KELUAR</a>
  </div>
</div>