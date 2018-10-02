<?php include('../server/config.php'); ?>
<div class="col-md-6 mt-4">
	<div class="row">
		<div class="col">
			<h4>Daftar Folder Tugas</h4>
			<hr>
		</div>
	</div>
	<div class="card mt-4">
		<div class="card-body">
			<table class="table table-hover table-sm">
				<thead>
					<tr>
						<th>No.</th>
						<th>Folder Kelas</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sql = "SELECT kelasf FROM folder";
					$hsl = mysqli_query($conn, $sql);
					$no = 1;
					if(mysqli_num_rows($hsl) > 0){
						while($brs = mysqli_fetch_array($hsl)){
							$kls = $brs['kelasf'];
							$kls = preg_replace('/\s+/', '', $kelasf);
							$kls = explode(",", $kls);
							$jlh = count($kls);
							if($kls[0] != ''){
								for($i=0; $i<$jlh; $i++){
									?>
									<tr>
										<td class="align-middle"><?php echo $no; ?></td>
										<td class="align-middle"><strong><?php echo strtoupper($kls[$i]); ?></strong></td>
										<td>
											<a href="hapus-kelas.php?kls=<?php echo $i; ?>" class="btn btn-danger" role="button" onClick="javascript: return confirm('Pastikan anda sudah mendownload semua file tugas kelas <?php echo strtoupper($kls[$i]); ?>!! Menghapus kelas berarti menghapus semua file tugas yang ada didalamnya. Apakah anda yakin?');"><i class="material-icons align-middle">delete</i></a>
										</td>
									</tr>
									<?php
									$no = $no + 1;
								}
							} else {
								?>
								<tr>
									<td colspan="3">Daftar kelas masih kosong.</td>
								</tr>
								<?php
							}
						}
					} 
					?>
				</tbody>
			</table>
		</div>
	</div>


</div>

