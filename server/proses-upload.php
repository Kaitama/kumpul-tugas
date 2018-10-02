<?php  
if(isset($_POST['submit'])){
	include('server/config.php');

	$kelas = $_REQUEST['i-kelas'];
	$sesi  = $_REQUEST['i-sesi'];
	$nirm  = $_REQUEST['i-nirm'];
	$nama  = $_REQUEST['i-nama'];
	$nama  = mysqli_real_escape_string($conn, $nama);
	$nama  = strtolower($nama);
	$nama  = ucwords($nama);
	$fname = $_FILES['i-file']['name'];
	$fsize = $_FILES['i-file']['size'];
	$ftype = $_FILES['i-file']['type'];
	$ftmp  = $_FILES['i-file']['tmp_name'];
	$fext  = substr($fname, strpos($fname, '.') + 1);
	$fext  = strtolower($fext);
	$maxsz = 9999999; //10MB
	date_default_timezone_set("Asia/Jakarta");
	$tgl   = date('d-m-Y');
	$jam   = date('H:i');

	// BACA DATA TABEL
	$sql = "SELECT * FROM folder";
	$proses = mysqli_query($conn, $sql);
	if(mysqli_num_rows($proses) > 0){
		$baris = mysqli_fetch_array($proses);
		$root = $baris['rootf'];
		$ekst = $baris['extf'];
	}
	$ekst = explode(',', $ekst);
	if($fname == ''){
		$w_err = 'alert-danger';
		$d_err = 'block';
		$s_err = 'Gagal!';
		$m_err = 'File tugas tidak boleh kosong!';
	} else if($fsize == 0){
		$w_err = 'alert-warning';
		$d_err = 'block';
		$s_err = 'Peringatan!';
		$m_err = 'Ukuran file 0kb, cek kembali file yang anda upload!';
	} else if($fsize > $maxsz){
		$w_err = 'alert-danger';
		$d_err = 'block';
		$s_err = 'Gagal!';
		$m_err = 'Ukuran file terlalu besar, melebihi 10MB.';
	} else if(!in_array($fext, $ekst)){
		$w_err = 'alert-danger';
		$d_err = 'block';
		$s_err = 'Gagal!';
		$m_err = 'Ekstensi file yang anda upload tidak diizinkan! (.' . $fext . ')';
	} else {
		$sqlf = "SELECT * FROM file WHERE nirm = '$nirm' AND sesi = '$sesi'";
		$prosesf = mysqli_query($conn, $sqlf);
		// CEK JIKA ADA DATA SEBELUMNYA
		if (mysqli_num_rows($prosesf) > 0){
			$brs = mysqli_fetch_array($prosesf);
			$fid = $brs['id'];
			$fnirm = $brs['nirm'];
			$fnama = $brs['nama'];
			$fsesi = $brs['sesi'];
			$ftgl  = $brs['tanggal'];
			$fjam  = $brs['jam'];
			// JIKA NIRM PADA SESI TUGAS SUDAH ADA
			if($fnirm == $nirm && $fsesi == $sesi){
				$w_err = 'alert-danger';
				$d_err = 'block';
				$s_err = 'Gagal!';
				$m_err = 'NIRM ' . $nirm . ' sudah mengumpulkan TUGAS ' . $fsesi . ' pada tanggal ' . $ftgl . ' jam ' . $fjam . '. Silahkan hubungi dosen terkait jika ingin upload ulang.';
			} 
		} else { 
			// JIKA DATA SEBELUMNYA TIDAK ADA
			// UPLOAD FILE DAN SIMPAN KE DATABASE
			$nn = $nirm . "_" . $nama . "." .$fext;
			$fdir = 'admin/' . $root . '/' . $kelas . '/tugas' . $sesi . '/';
			$fupl = $fdir . $nn;
			$fup  = $root . '/' . $kelas . '/tugas' . $sesi . '/' . $nn;
			if(move_uploaded_file($ftmp, $fupl)){
			//SAVE DATA UPLOAD
				$sav = "INSERT INTO file (
				kelas, sesi, nirm, nama, tanggal, jam, file) 
				VALUES (
				'$kelas', '$sesi', '$nirm', '$nama', '$tgl', '$jam', '$fup')";
				$pros = mysqli_query($conn, $sav);
				if($pros){
					header('Location: hasil.php?nirm=' . $nirm . '&&sesi=' . $sesi);
					exit;
				}
				mysqli_close($conn);
			}
		}
	}
}

?>