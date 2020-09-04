<?php
  ob_start();
  session_start();
  if(isset($_POST['submit'])){ 
    include("db.php");

if(!empty($_POST['username'])){
$query_1 = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error($con)); 
$row_1 = mysqli_fetch_array($query_1);
		
      if($row_1){
        $_SESSION['id_admin'] =   $row_1['id_admin'];
        $_SESSION['username'] =   $row_1['username'];
		$_SESSION['phone_no'] =   $row_1['phone_no'];
?>

<script>
  alert('Berjaya Log Masuk Sebagai Admin');
  window.location.href='admin/index.php';
</script>

<?php
      }
      $query_2 = mysqli_query($conn,"SELECT * FROM tailor WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error($con)); 
      $row_2 = mysqli_fetch_array($query_2);
      if($row_2){ 
        $_SESSION['id'] =  $row_2['id_tailor'];
        $_SESSION['username'] =  $row_2['username'];
        $_SESSION['f_tailor'] =  $row_2['f_tailor'];
        $_SESSION['phone_no'] =   $row_2['phone_no'];
        $_SESSION['tailor_type'] = $row_2['tailor_type'];
	
?>

<script>
  alert('Berjaya Log Masuk Sebagai Tukang Jahit');
  window.location.href='tailor/index.php';
</script>

<?php		
	}
        
        $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error($con)); 
      $row = mysqli_fetch_array($query);
      if($row){ 
        $_SESSION['id'] =  $row['id_users'];
        $_SESSION['username'] =  $row['username'];
        $_SESSION['f_name'] =  $row['f_name'];
		$_SESSION['phone'] =  $row['phone_no'];
		$_SESSION['alamat'] =  $row['alamat'];
		$_SESSION['ic'] =  $row['ic_no'];
?>

<script>
  alert('Berjaya Log Masuk');
  window.location.href='users/index.php';
</script>

<?php		
	} else { 
?>

<script>
  alert('Nama Pengguna atau Kata Laluan yang telah dimasukkan adalah salah!');
  window.location.href='index.php';
</script>

<?php
	} 
  }
  
  echo "error" ;
} 
?>