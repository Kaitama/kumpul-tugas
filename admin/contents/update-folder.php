<?php 
$stts = '';
$msg  = '';
$dsp  ='none';
if (isset($_POST['submit'])) {
	include('../server/config.php');
	//root folder
	$rootf	= $_REQUEST['rootf'];
	$rootf	= mysqli_real_escape_string($conn, $rootf);
	$rootf  = strtolower($rootf);
	//daftar kelas
	$kelasf	= $_REQUEST['kelasf'];
	$kelasf = strtoupper($kelasf);
	$kelasf = preg_replace('/\s+/', '', $kelasf);
	$kelasf	= explode(",", $kelasf);
	//hitung jumlah kelas
	$jkelas	= count($kelasf);
	//jumlah sesi tugas
	$sesif	= $_REQUEST['sesif'];
	//ekstensi file
	$extf	= implode (',', $_REQUEST['exten']);
	//konversi array menjadi string
	$kelass = '';
	if(isset($kelasf) && is_array($kelasf)){
		$kelass = implode(",", $kelasf); 
	}

	//check record tabel 
	$sqc = "SELECT * FROM folder";
	$ada = mysqli_query($conn, $sqc);
	//jika tidak ada record
	if(mysqli_num_rows($ada) == 0){
		$sql = "INSERT INTO folder (
		rootf, kelasf, sesif, extf
		) VALUES (
		'$rootf', '$kelass', '$sesif', '$extf')";
	} else {
		$sql	= "UPDATE folder SET 
		kelasf= '$kelass',
		sesif = '$sesif',
		extf  = '$extf'
		WHERE rootf = '$rootf'";
	}
	if (mysqli_query($conn, $sql)) {
		$dsp = 'block';
		$stts= 'Sukses!';
		$msg = 'Pengaturan Folder Telah Disimpan.';
		// buat root folder
		
		if(!file_exists($rootf)){
			mkdir($rootf, 0777, true);
		}
		for ($i = 0; $i < $jkelas; $i++){
			$path = $rootf . '/' . $kelasf[$i];	
			if(!file_exists($path)){
				mkdir($path, 0777, true);
			}
			for($x=1; $x<=$sesif; $x++){
				$ftgs = $path . '/tugas' . $x;
				if(!file_exists($ftgs)){
					mkdir($ftgs, 0777, true);
				}
			}
		}

	} else {
		$dsp = 'block';
		$stts= 'Gagal!';
		$msg = 'Terjadi Kesalahan, Coba Ulangi lagi.';
	}
} 

?>