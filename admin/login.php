<?php 
session_start();
$w_err = ''; $d_err = 'none'; $s_err = ''; $m_err = ''; 
if(isset($_POST['submit'])){
	include('../server/config.php');
	$uname = mysqli_real_escape_string($conn,$_REQUEST['username']);
	$upass = mysqli_real_escape_string($conn,$_REQUEST['password']);
	$sql	 = "SELECT * FROM user WHERE username = '$uname' AND password = '$upass'";
	$hasil = mysqli_query($conn, $sql);
	$baris = mysqli_fetch_array($hasil, MYSQLI_ASSOC);
	$idl   = $baris['id'];
	$user  = $baris['username'];
	$nama  = $baris['namauser'];
	$inst  = $baris['institusi'];
	$email = $baris['email'];
	$telp  = $baris['telp'];
	$webs  = $baris['website'];
	$count = mysqli_num_rows($hasil);
	if ($count == 1){
		$_SESSION['idl'] = $idl;
		$_SESSION['username'] = $user;
		$_SESSION['nama'] = $nama;
		$_SESSION['email'] = $email;
		$_SESSION['inst'] = $inst;
		$_SESSION['telp'] = $telp;
		$_SESSION['webs'] = $webs;
		header("location: index.php");
	} else{
		$w_err = 'alert-danger'; $d_err = 'block'; $s_err = 'Gagal!'; $m_err = 'Username atau Password salah.'; 
	}
}

?>

<?php 
if(!isset($_SESSION['username'])){
	?>
	
	<?php  ?><!doctype html>
	<html lang="en">
	<head>
		<?php include('contents/content-header.php'); ?>
		<title>Admin Login</title>
	</head>
	<body>
		<main role="main" class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-auto mt-3">
					<div class="card" style="width: 35rem;">
						<div class="card-body">
							<h4 class="card-title">Login Dosen</h4>
							<hr>
							<form action="" method="POST">
								<!-- USERNAME -->
								<div class="row">
									<div class="form-group col-md-12">
										<label for="username">Username</label>
										<input name="username" type="text" class="form-control" id="username" autofocus>
									</div>
								</div>
								<!-- PASSWORD -->
								<div class="row">
									<div class="form-group col-md-12">
										<label for="password">Password</label>
										<input name="password" type="password" class="form-control" id="password">
									</div>
								</div>
								<!-- BUTTON -->
								<div class="row">
									<div class="col-md-8">
										<div class="alert <?php echo $w_err ?>" role="alert" style="display: <?php echo $d_err; ?>;">
											<strong><?php echo $s_err; ?></strong> <?php echo $m_err; ?>
										</div>
									</div>
									<div class="col-md-4">
										<button type="submit" name="submit" class="btn btn-primary card-link btn-block" style="height: 50px;"><strong><span class="align-middle">LOGIN</span></strong></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	</body>
	</html>
	<?php include('contents/content-footer.php'); ?>
	<?php } else {
		header("Location: index.php");
	} ?>