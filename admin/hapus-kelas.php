<?php 
include('../server/config.php');
$kd = $_REQUEST['kls'];

$sql = "SELECT * FROM folder";
$hsl = mysqli_query($conn, $sql);
if(mysqli_num_rows($hsl) > 0){
	$brs = mysqli_fetch_array($hsl);
	//$id  = $brs['id'];
	$kls = $brs['kelasf'];
	$root= $brs['rootf'];
	$kls = explode(",", $kls);
	
	$path= $root . '/' . $kls[$kd];
	$cls = $kls[$kd];
	$drec = "DELETE FROM file WHERE kelas = '$cls'";
	mysqli_query($conn, $drec);

	function deleteDirectory($dir) {
		if (!file_exists($dir)) {
			return true;
		}
		
		if (!is_dir($dir)) {
			return unlink($dir);
		}
		
		foreach (scandir($dir) as $item) {
			if ($item == '.' || $item == '..') {
				continue;
			}
			
			if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
				return false;
			}
			
		}
		
		return rmdir($dir);
	}
	deleteDirectory($path);
	
	unset($kls[$kd]);
	if(isset($kls) && is_array($kls)){
		$klss = implode(",", $kls); 
	}
	
	
	$up	 = "UPDATE folder SET kelasf = '$klss' WHERE rootf = '$root'";
	if (mysqli_query($conn, $up)) {
		header('Location: folder.php');
		exit;
	}
	mysqli_close($conn);
}


?>