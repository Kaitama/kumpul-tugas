<?php 
include('../server/config.php');
$s = "SELECT * FROM folder";
$h = mysqli_query($conn, $s);
if(mysqli_num_rows($h) > 0){
	$b = mysqli_fetch_array($h);
	$k = $b['kelasf'];
	$t = $b['sesif'];
	$k = explode(",", $k);
	$j = count($k);
}
?>
<div class="row mt-4">
	<div class="col-sm-12">
		<h4>Daftar Tugas Mahasiswa</h4>
	</div>
</div>
<hr>
<form action="" method="POST">
	<div class="row">
		<div class="col-sm-12 col-md-4">
			<!-- KELAS -->
			<div class="form-group">
				<label for="t-kelas">Pilih Kelas</label>
				<select name="t-kelas" class="form-control text-uppercase" id="t-kelas">
					<?php for($i=0; $i<$j; $i++){ ?>
					<option class="text-uppercase" value="<?php echo $k[$i]; ?>"><?php echo $k[$i]; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-sm-12 col-md-4">
			<!-- SESI -->
			<div class="form-group">
				<label for="t-sesi">Pilih Sesi Tugas</label>
				<select name="t-sesi" class="form-control text-uppercase" id="t-sesi">
					<?php for($x=1; $x<=$t; $x++){ ?>
					<option value="<?php echo $x; ?>">TUGAS <?php echo $x; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<!-- SUBMIT -->
		<div class="col-sm-12 col-md-4 mt-3 pt-3">
			<button type="submit" name="submit" class="btn btn-info align-bottom" id="btn-tmpl"><strong>Tampilkan</strong></button>
		</div>
	</div>
</form>
<hr>

<?php
if (isset($_POST['submit'])) {
	$kelas 	= $_REQUEST['t-kelas'];
	$sesi 	= $_REQUEST['t-sesi'];
	include('../server/config.php');
	$no 		= 1;
	$sql	= "SELECT * FROM file WHERE kelas = '$kelas' AND sesi = '$sesi'";
	$hasil	= mysqli_query($conn, $sql);
	if(mysqli_num_rows($hasil) > 0){
		?>
		<div class="row mb-2">
			<div class="col-sm-12">
				<h5>Daftar <span class="text-uppercase text-primary">TUGAS <?php echo $sesi; ?></span> - Kelas <span class="text-uppercase text-primary"><?php echo $kelas; ?></span></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<!-- TABLE CONTENT -->
				<table class="table table-hover table-responsive-md">
					<thead class="thead-dark">
						<tr>
							<th scope="col">No.</th>
							<th scope="col">NIRM</th>
							<th scope="col">Nama</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Jam</th>
							<th scope="col">File Tugas</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($baris = mysqli_fetch_array($hasil)) {
							$id 	= $baris['id'];
							$nirm 	= $baris['nirm'];
							$nama 	= $baris['nama'];
							$tanggal= $baris['tanggal'];
							$jam 	= $baris['jam'];
							$file 	= $baris['file'];
							?>
							<tr>
								<td class="align-middle"><?php echo $no; ?></td>
								<td class="align-middle"><?php echo $nirm; ?></td>
								<td class="align-middle"><?php echo $nama; ?></td>
								<td class="align-middle"><?php echo $tanggal; ?></td>
								<td class="align-middle"><?php echo $jam; ?></td>
								<td>
									<a href="<?php echo $file; ?>" target="_blank" class="btn btn-success" role="button">
										<i class="material-icons align-middle">save_alt</i>
									</a>
									<a href="hapus-file-tugas.php?id=<?php echo $id; ?>" class="btn btn-danger" role="button" onClick="javascript: return confirm('Yakin ingin menghapus data tugas <?php echo $nama; ?>?');">
										<i class="material-icons align-middle">delete_forever</i>
									</a>
								</td>
							</tr>
							<?php
							$no = $no + 1;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<?php
	} else {
		?>
		<div class="row mt-4">
			<div class="col-sm-12">
				<div class="alert alert-danger" role="alert">
					Tidak ada data tugas yang tersimpan.
				</div>
			</div>
			
		</div>
		<?php
	}
}

?>





