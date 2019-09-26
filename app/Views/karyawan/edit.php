<form action="<?php echo site_url('/karyawan/store'); ?>" method="post">
	<div class="form-group">
		<label for="nama">Nama :</label>
			<input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}">
	</div>
	<div class="form-group">
		<label for="telp">No. telepon :</label>
			<input type="text" name="telp" class="form-control" value="{{ $karyawan->telp }}">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat :</label>
			<input type="text" name="alamat" class="form-control" value="{{ $karyawan->alamat }}">
	</div>
	<div class="form-group">
			<input type="submit" value="Simpan" class="btn btn-primary">
	</div>
</form>