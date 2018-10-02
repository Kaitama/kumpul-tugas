<?php include('session.php'); ?>
<?php 
$uname = $_SESSION['username'];
include('../server/config.php');
$w_err = ''; $d_err = 'none'; $s_err = ''; $m_err = ''; 
$w_err1 = ''; $d_err1 = 'none'; $s_err1 = ''; $m_err1 = ''; 
$w_err2 = ''; $d_err2 = 'none'; $s_err2 = ''; $m_err2 = ''; 
// UBAH DATA DIRI
if(isset($_POST['dtdr'])){
	$pw = $_REQUEST['pwd'];
	$nm = $_REQUEST['nama'];
	$em = $_REQUEST['email'];
	$tl = $_REQUEST['telp'];
	$in = $_REQUEST['inst'];
	$wb = $_REQUEST['webs'];

	// check pass
	$sql = "SELECT * FROM user WHERE username = '$uname'";
	$hsl = mysqli_query($conn, $sql);
	if(mysqli_num_rows($hsl) > 0){
		$brs = mysqli_fetch_array($hsl);
		$id  = $brs['id'];
		$pwd = $brs['password'];
	}
	if($pw == $pwd){
		$up = "UPDATE user SET
		namauser = '$nm',
		institusi = '$in',
		email = '$em',
		telp = '$tl',
		website = '$wb'
		WHERE id = '$id'";
		if(mysqli_query($conn, $up)){
			$w_err = 'alert-success'; $d_err = 'block'; $s_err = 'Sukses!'; $m_err = 'Pengaturan telah tersimpan.'; 
		} else {
			$w_err = 'alert-danger'; $d_err = 'block'; $s_err = 'Gagal!'; $m_err = 'Mohon coba kembali.'; 
		}
	} else {
		$w_err = 'alert-danger'; $d_err = 'block'; $s_err = 'Gagal!'; $m_err = 'Password anda salah.'; 
	}
}

// UBAH USERNAME
if(isset($_POST['upuser'])){
	$unamex = $_REQUEST['unamex'];
	$passwords = $_REQUEST['passwords'];
	$idl = $_SESSION['idl'];
	$sql = "SELECT * FROM user WHERE id = '$idl'";
	$hsl = mysqli_query($conn, $sql);
	if(mysqli_num_rows($hsl) > 0){
		$brs = mysqli_fetch_array($hsl);
		$id  = $brs['id'];
		$pwd = $brs['password'];
	}
	if($passwords == $pwd){
		$up = "UPDATE user SET
		username = '$unamex'
		WHERE id = '$id'";
		if(mysqli_query($conn, $up)){
			$w_err1 = 'alert-success'; $d_err1 = 'block'; $s_err1 = 'Sukses!'; $m_err1 = 'Username telah diganti.';
		}
	} else {
		$w_err1 = 'alert-danger'; $d_err1 = 'block'; $s_err1 = 'Gagal!'; $m_err1 = 'Password anda salah.'; 
	}
}

// UBAH PASSWORD
if(isset($_POST['uppass'])){
	$passwordx = $_REQUEST['passwordx'];
	$passwordy = $_REQUEST['passwordy'];
	$passwordz = $_REQUEST['passwordz'];
	$idl = $_SESSION['idl'];
	$sql = "SELECT * FROM user WHERE id = '$idl'";
	$hsl = mysqli_query($conn, $sql);
	if(mysqli_num_rows($hsl) > 0){
		$brs = mysqli_fetch_array($hsl);
		$id  = $brs['id'];
		$pwd = $brs['password'];
	}
	if($passwordx == '' || $passwordy == '' || $passwordz == ''){
		$w_err2 = 'alert-danger'; $d_err2 = 'block'; $s_err2 = 'Gagal!'; $m_err2 = 'Password tidak boleh kosong.';
	} else {
		if($passwordy == $passwordz){
			if($passwordx == $pwd){
				$up = "UPDATE user SET
				password = '$passwordy'
				WHERE id = '$id'";
				if(mysqli_query($conn, $up)){
					$w_err2 = 'alert-success'; $d_err2 = 'block'; $s_err2 = 'Sukses!'; $m_err2 = 'Password telah diganti.';
				}
			} else {
				$w_err2 = 'alert-danger'; $d_err2 = 'block'; $s_err2 = 'Gagal!'; $m_err2 = 'Password lama anda salah.';
			}
		} else {
			$w_err2 = 'alert-danger'; $d_err2 = 'block'; $s_err2 = 'Gagal!'; $m_err2 = 'Konfirmasi password salah.'; 
		}
	}
}

$idl = $_SESSION['idl'];
$sql = "SELECT * FROM user WHERE id = '$idl'";
$hsl = mysqli_query($conn, $sql);
if(mysqli_num_rows($hsl) > 0){
	$brs = mysqli_fetch_array($hsl);
	$id = $brs['id'];
	$user = $brs['username'];
	$passw = $brs['password'];
	$email = $brs['email'];
	$nama = $brs['namauser'];
	$telp = $brs['telp'];
	$inst = $brs['institusi'];
	$webs = $brs['website'];
}
?>



<!doctype html>
<html lang="en">
<head>
	<?php include('contents/content-header.php'); ?>
	<title>User Setting</title>
</head>
<body>
	<?php include('contents/admin-nav.php'); ?>
	<main role="main" class="container">
		<div class="row">
			<!-- USER SETTING FORM -->
			<?php include('contents/user-sisi-kiri.php'); ?>

			<!-- PASSWORD SETTING -->
			<?php include('contents/user-sisi-kanan.php'); ?>


		</div>
	</main>
	<?php include('contents/content-footer.php'); ?>
</body>
</html>