<?php 

?>
<div class="col-md-6 mt-4 mb-5">
	<div class="row">
		<div class="col">
			<h4>Ubah Username</h4>
			<hr>
		</div>
	</div>
	<form action="" method="POST">
		<!-- username -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="unamex">Username</label>
				<input name="unamex" type="text" class="form-control" id="unamex" value="<?php echo $user; ?>">
			</div>
		</div>
		<!-- password -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="passwords">Password</label>
				<input name="passwords" type="password" class="form-control" id="passwords">
			</div>
		</div>
		<!-- proses 1 -->
		<div class="row">
			<div class="col-md-8">
				<div class="alert <?php echo $w_err1 ?>" role="alert" style="display: <?php echo $d_err1; ?>;">
					<strong><?php echo $s_err1; ?></strong> <?php echo $m_err1; ?>
				</div>
			</div>
			<div class="col-md-4">
				<button class="btn btn-primary card-link btn-block" style="height: 50px;" type="submit" name="upuser"><strong>Ubah Username</strong></button>
			</div>
		</div>
	</form>
	<div class="row mt-5">
		<div class="col">
			<h4>Ubah Password</h4>
			<hr>
		</div>
	</div>
	<form action="" method="POST">
		<!-- password lama -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="passwordx">Password Lama</label>
				<input name="passwordx" type="password" class="form-control" id="passwordx">
			</div>
		</div>
		<!-- password baru -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="passwordy">Password Baru</label>
				<input name="passwordy" type="password" class="form-control" id="passwordy">
			</div>
		</div>
		<!-- password konfirmasi -->
		<div class="row">
			<div class="form-group col-md-12">
				<label for="passwordz">Konfirmasi Password</label>
				<input name="passwordz" type="password" class="form-control" id="passwordz">
			</div>
		</div>
		<!-- proses -->
		<div class="row">
			<div class="col-md-8">
				<div class="alert <?php echo $w_err2 ?>" role="alert" style="display: <?php echo $d_err2; ?>;">
					<strong><?php echo $s_err2; ?></strong> <?php echo $m_err2; ?>
				</div>
			</div>
			<div class="col-md-4">
				<button class="btn btn-primary card-link btn-block" style="height: 50px;" type="submit" name="uppass"><strong>Ubah Password</strong></button>
			</div>
		</div>
	</form>
</div>