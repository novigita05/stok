<form action="<?php echo site_url('/supplier/store'); ?>" method="post">
	<div class="form-group">
		<label for="nama">Nama :</label>
			<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label for="telp">No. Telepon :</label>
			<input type="text" name="telp" class="form-control">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat :</label>
			<input type="text" name="alamat" class="form-control">
	</div>
	<br/>
	<div class="form-group">
			<input type="submit" value="Save" class="btn btn-primary">
	</div>
</form>