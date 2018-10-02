<?php 
$w_err = ''; $d_err = 'none'; $s_err = ''; $m_err = '';
include('server/proses-upload.php');
include('server/config.php');
$sql = "SELECT * FROM folder";
$proses = mysqli_query($conn, $sql);
if(mysqli_num_rows($proses) > 0){
	$baris = mysqli_fetch_array($proses);
	$root = $baris['rootf'];
	$sesi = $baris['sesif'];
	$kelas = $baris['kelasf'];
	$kelas = explode(',', $kelas);
	$jlh = count($kelas);
}
?>

<div class="card col-sm-12">
	<div class="card-body">
		<h4 class="card-title">Form Kumpul Tugas</h4>
		<hr>
		<div class="row">
			<div class="col-md-12 mt-2">
				<div class="alert <?php echo $w_err ?>" role="alert" style="display: <?php echo $d_err; ?>;">
					<strong><?php echo $s_err; ?></strong> <?php echo $m_err; ?>
				</div>
			</div>
		</div>
		<form action="" method="POST" enctype="multipart/form-data">
			<!-- KELAS -->
			<div class="row">
				<div class="form-group col-md-6">
					<label for="i-kelas">Pilih Kelas</label>
					<select name="i-kelas" class="form-control text-uppercase" id="i-kelas">
						<?php for($i = 0; $i < $jlh; $i++){ ?>
						<option value="<?php echo $kelas[$i]; ?>" class="text-uppercase"><?php echo $kelas[$i]; ?></option>
						<?php } ?>
					</select>
				</div>
				<!-- SESI TUGAS -->
				<div class="form-group col-md-6">
					<label for="i-sesi">Pilih Tugas</label>
					<select name="i-sesi" class="form-control text-uppercase" id="i-sesi">
						<?php for($i = 1; $i <= $sesi; $i++){ ?>
						<option value="<?php echo $i; ?>" class="text-uppercase">TUGAS <?php echo $i; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<!-- NIRM -->
			<div class="row">
				<div class="form-group col-md-12">
					<label for="i-nirm">NIRM</label>
					<input name="i-nirm" type="number" class="form-control" id="i-nirm" placeholder="<?php echo date('Y') . '010001'; ?>">
				</div>
			</div>
			<!-- NAMA -->
			<div class="row">
				<div class="form-group col-md-12">
					<label for="i-nama">Nama Lengkap</label>
					<input name="i-nama" type="text" autocapitalize="word" class="form-control" id="i-nama" placeholder="John Doe">
				</div>
			</div>
			<!-- FILE -->
			<div class="row">
				<div class="form-group col-md-12">
					<label for="i-file">File Tugas</label>
					<div class="input-group custom-file">
						<input name="i-file" type="file" class="custom-file-input" id="i-file" aria-describedby="i-file" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
						<label class="custom-file-label" for="i-file">Pilih File Tugas (maks 10MB)</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col sm-12">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button type="submit" name="submit" class="btn btn-info card-link btn-block"><i class="material-icons align-middle">cloud_upload</i>&nbsp;&nbsp;&nbsp; <span class="align-middle">KIRIM TUGAS</span></button>
				</div>
			</div>
		</form>
	</div>
</div>