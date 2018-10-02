<?php include('update-folder.php'); ?>
<?php
include('../server/config.php');
$sql	= "SELECT * FROM folder";
$hsl	= mysqli_query($conn, $sql);
if(mysqli_num_rows($hsl) > 0){
	$brs	= mysqli_fetch_array($hsl);
	$rootf	= $brs['rootf'];
	$kelasf	= $brs['kelasf'];
	$sesif	= $brs['sesif'];
	$extf	= $brs['extf'];
	$akelas = explode(",", $kelasf);
	$jkelas	= count($akelas);
	$aext	= explode(",", $extf);
	function dk(){
		global $jkelas, $akelas;
		for($i=0; $i<$jkelas-1; $i++){ echo $akelas[$i] . ', '; }	echo $akelas[$jkelas-1];
	}
	$dsbl	= 'readonly';
} else {
	$rootf	= '';
	$kelasf	= '';
	$sesif	= 2;
	$aext	= array('');
	function dk(){
		echo '';
	}
	$dsbl 	= '';
}
?>
<div class="row">
	<!-- SISI KIRI -->
	<?php include('tugas-sisi-kiri.php'); ?>


	<!-- SISI KANAN -->
	<?php include('tugas-sisi-kanan.php'); ?>


</div>
