<?php 
include('../server/config.php');
$id  = $_REQUEST['id'];
$baca = "SELECT * FROM file WHERE id = '$id'";
$hasil= mysqli_query($conn, $baca);
if(mysqli_num_rows($hasil) > 0){
	$brs = mysqli_fetch_array($hasil);
	$file = $brs['file'];
}

$hps = "DELETE FROM file WHERE id = '$id'";
if (mysqli_query($conn, $hps)){
	unlink($file);
	header('Location: tugas.php');
}
mysqli_close($conn);

?>