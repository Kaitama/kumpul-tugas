<div class="col-md-6 mt-4">
	<div class="row">
		<div class="col">
			<h4>Pengaturan Folder</h4>
			<hr>
		</div>
	</div>
	<form action="" method="POST">
		<!-- hidden id -->
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="row mt-4">
			<div class="col">
				<div class="form-group">
					<label for="rootf">Root Folder</label>
					<input name="rootf" type="text" class="form-control" id="rootf" aria-describedby="rootfhelp" value="<?php echo $rootf; ?>" <?php echo $dsbl; ?>>
					<small id="rootfhelp" class="form-text text-muted"><i>Nama folder untuk menyimpan semua file tugas yang diupload. Contoh: <u>foldertugas</u></i></small>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label for="kelasf">Daftar Kelas</label>
					<textarea name="kelasf" class="form-control" id="kelasf" rows="3" aria-describedby="kelasfhelp"><?php dk(); ?></textarea>
					<small id="kelasfhelp" class="form-text text-muted"><i>Tentukan atau tambahkan nama kode kelas yang dipisahkan dengan tanda koma. Contoh: 1sia1, 1sia2, 1sia3, dst.
						<span class="text-danger">Jangan hapus daftar kelas yang sudah ada pada kolom ini!!!</span></i></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="sesif">Sesi Tugas</label>
						<select name="sesif" class="form-control" id="sesif" aria-describedby="sesifhelp">
							<?php if($sesif == '1'){ ?>
							<option value="1" selected>1 Kali</option>
							<option value="2">2 Kali</option>
							<option value="3">3 Kali</option>
							<?php } elseif ($sesif == '2') { ?>
							<option value="1">1 Kali</option>
							<option value="2" selected>2 Kali</option>
							<option value="3">3 Kali</option>
							<?php } else { ?>
							<option value="1">1 Kali</option>
							<option value="2">2 Kali</option>
							<option value="3" selected>3 Kali</option>
							<?php } ?>
						</select>
						<small id="sesifhelp" class="form-text text-muted"><i>Banyaknya jumlah tugas yang akan diberikan dalam satu semester.</i></small>
					</div>
				</div>
			</div>
			<!-- select extensi -->
			<div class="row">
				<div class="col">
						<label>Ekstensi File</label>
					<div class="card" aria-describedby="checkhelp">
						<div class="card-body">
						<?php 
						//$stat = '';
						$exten = array('doc','docx','ppt','pptx','xls','xlsx','pdf','zip','rar','swf','exe','mdb','accdb','psd','cdr','jpg','c','cpp','txt');
						$jex = count($exten);
						$beda = array_diff($exten, $aext);
						//print_r($beda);
						for ($i=0; $i<$jex; $i++){
							if(array_key_exists($i, $beda)){
								$stat = '';
							} else {
								$stat = 'checked';
							}
						?>
							<div class="form-check form-check-inline" style="width: 60px;">
								<input class="form-check-input" type="checkbox" value="<?php echo $exten[$i]; ?>" id="ext<?php echo $i; ?>" name="exten[]" <?php echo $stat; ?>>
								<label class="form-check-label" for="ext<?php echo $i; ?>">
									.<?php echo $exten[$i]; ?>
								</label>
							</div>
							<?php } ?>
						</div>
					</div>
					<small id="checkhelp" class="form-text text-muted"><i>Pilih ekstensi file tugas yang diizinkan untuk di upload. Untuk project atau banyak file disarankan mengubah kedalam bentuk arsip (zip/rar).</i></small>
				</div>
			</div>
			<!-- error message -->
			<div class="row mt-4">
				<div class="col-md-9">
					<div class="alert alert-success" role="alert" style="display: <?php echo $dsp; ?>;">
						<strong><?php echo $stts; ?></strong> <?php echo $msg; ?>
					</div>
				</div>
				<!-- tombol submit -->
				<div class="col-md-3 mb-4">
					<button class="btn btn-info btn-block card-link" type="submit" name="submit" style="height: 50px;"><strong>Simpan</strong></button>
				</div>
			</div>
		</form>
	</div>