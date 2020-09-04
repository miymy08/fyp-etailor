
<?php

include "../db.php";
session_start();

?>
<div class="w3-top">
  <div class="w3-bar w3-special-blue w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hide-medium" ><img src="images/etailor2.png" style="height:18px;"></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LAMAN UTAMA</a>
	 <a href="view_profile.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PROFIL</a>
	<div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="Customer">UKURAN</button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="view_measurement.php" class="w3-bar-item w3-button">PAPAR UKURAN</a>
        
       </div>
    </div>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">TEMPAHAN</button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="view_order.php" class="w3-bar-item w3-button">PAPAR TEMPAHAN</a>
       </div>
    </div>
    <a onclick="return confirm('Adakah anda pasti untuk log keluar?');" href="../logout.php" class="w3-button w3-padding-large w3-hover-red w3-hide-small w3-right">LOG KELUAR</a>
  </div>
</div>