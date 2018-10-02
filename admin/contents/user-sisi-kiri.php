<div class="col-md-6 mt-4 mb-5">
	<div class="row">
		<div class="col">
			<h4>Ubah Data Diri</h4>
			<hr>
		</div>
	</div>
	<form action="" method="POST">
		<!-- nama -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="nama">Nama Lengkap</label>
				<input name="nama" type="text" class="form-control" id="nama" value="<?php echo $nama; ?>">
			</div>
		</div>
		<!-- email -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="email">Email</label>
				<input name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>">
			</div>
		</div>
		<!-- telp -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="telp">Telepon</label>
				<input name="telp" type="number" class="form-control" id="telp" value="<?php echo $telp; ?>">
			</div>
		</div>
		<!-- instansi -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="inst">Institusi</label>
				<input name="inst" type="text" class="form-control" id="inst" value="<?php echo $inst; ?>">
			</div>
		</div>
		<!-- website -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="website">URL Website</label>
				<input name="webs" type="text" class="form-control" id="webs" value="<?php echo $webs; ?>">
			</div>
		</div>
		<!-- proses -->
		<div class="row">
			<div class="col-md-8">
				<div class="alert <?php echo $w_err ?>" role="alert" style="display: <?php echo $d_err; ?>;">
					<strong><?php echo $s_err; ?></strong> <?php echo $m_err; ?>
				</div>
			</div>
			<div class="col-md-4">
			<button type="button" class="btn btn-primary card-link btn-block" style="height: 50px;" data-toggle="modal" data-target="#frmpass"><strong>Ubah Data</strong></button>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="frmpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- PASSWORD -->
						<div class="row">
							<div class="form-group col-md-12">
								<label for="pwd">Masukkan Password</label>
								<input name="pwd" type="password" class="form-control" id="pwd" autofocus>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" name="dtdr" class="btn btn-primary">Konfirmasi</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>