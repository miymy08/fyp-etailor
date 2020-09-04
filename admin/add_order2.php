<?php
include "db.php";
error_reporting(0);
session_start();
ob_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password']))
{
 header('location:../index.php');

}
else
{
  
?>
<?php 
$id_users2 = $_SESSION['id_users'];
$id_fashion2 = $_SESSION['id_fashion'];

$c = mysqli_query($conn,"SELECT * FROM users WHERE id_users = '$id_users2'");
$f = mysqli_query($conn,"SELECT * FROM fashion WHERE id_fashion = '$id_fashion2'");

$row_c2 = mysqli_fetch_row($c);
$row_f2 = mysqli_fetch_row($f);

?>

<fieldset id="f">
<legend> Add Measurement</legend>
<br>
<form method="post" action="order_process.php" >
<table align="center">
	<tr>
        <td>Nama:</td><td><input size="30" type="text"  name="username[]" value="<?php echo $row_c2['f_name']; ?>"></td>
    </tr>
	<tr>
     <td>Jenis Pakaian:</td>
<td><input size="30" type="text" value="" name="fashion[]"><?php echo $row_f2['fashion_name']; ?></input>
		</td>
    </tr>
<tr><td><br></td>	
    <tr>
        <td>Tarikh Terima:</td> 
    <td><input size="30" type="date" name="receive_date[]" id="shoulder"></td>
    
    </tr>
    <tr>
        <td>Tarikh Hantar:</td>
     <td><input size="30" type="date" name="pickup_date[]" id="chest"></td>
        
    </tr>
    <tr>
        <td>Status:</td>
        <td><select name="status[]">
		<option value="" disabled selected>Pilih Status</option>
		<option value="" >Dalam progress</option>
		<option value="" >Dah siap</option>
		</td>
    </tr>
	<tr>
        <td>Catatan:</td>
        <td><textarea  rows="5" cols="30" name="catatan[]" id="shirtlgth"></textarea></td>
    </tr>
    </table>
 

</fieldset>
    <?php
	if(isset($_POST['addform'])){
		
		$addform = $_POST['addform'];
		$_SESSION['addform'] = $addform;
		
        $number = $_POST['formnumber'];
        for ($i = 1; $i < $number; $i++){
    ?>
<br><br>

<fieldset id="f">
<legend> Add Measurement</legend>
<br>
<table align="center">
	<tr>
        <td>Nama:</td><td><input size="30" type="text" value="<?php  echo $row_c2['f_name'] ?>" name="username[]"></td>
    </tr>
	<tr>
        <td>Jenis Pakaian:</td>
		<td><input size="30" type="text"  value="<?php echo $row_f2['fashion_name']; ?>" name="fashion[]">
		</td>
    </tr>
<tr><td><br></td>	
    <tr>
        <td>Tarikh Terima:</td> 
    <td><input size="30" type="date" name="receive_date[]"></td>
    
    </tr>
    <tr>
        <td>Tarikh Hantar:</td>
     <td><input size="30" type="date" name="pickup_date[]"></td>
        
    </tr>
    <tr>
        <td>Status:</td>
        <td><select name="status[]">
		<option value="" disabled selected>Pilih Status</option>
		<option value="" >Dalam progress</option>
		<option value="" >Dah siap</option>
		</td>
    </tr>
	<tr>
        <td>Catatan:</td>
        <td><textarea  rows="5" cols="30" name="catatan[]" id="shirtlgth"></textarea></td>
    </tr>
    </table>

 
</fieldset>
    <?php
            }
        }
    ?>

	<br>
	  <input type="submit" name="addorder" value="Hantar">
</form>

</div>
<!-- End Page Content -->
</div>

<?php 
}
?>