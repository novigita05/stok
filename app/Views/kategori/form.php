<form action="<?php echo site_url('/kategori/store'); ?>" method="post">
	<div class="form-group">
		<label class="col-md-9" for="kategori">Kategori : </label>
			<select class="form-control" name="kategori" autocomplete="off" required>
				<option value="">--Pilih--</option>
				<option value="Handphone">Handphone</option>
				<option value="RAM">RAM</option>
				<option value="Service">Service</option>
			</select>
	</div>
	<div>
		<input type="submit" value="Simpan" class="btn btn-primary">
	</div>
</form>