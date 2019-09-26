<h2>Karyawan</h2>
<a href="<?php echo base_url('/karyawan/create'); ?>">Tambah Karyawan</a>

<table class="table">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>No.Telepon</th>
			<th>Alamat</th>
		</tr>
	<?php foreach ($karyawan as $karyawan) : ?>
		<tr>
			<td><?php echo $karyawan['id_karyawan'];?></td>
			<td><?php echo $karyawan['nama'];?></td>
			<td><?php echo $karyawan['telp'];?></td>
			<td><?php echo $karyawan['alamat'];?></td>
			<td>
				<a href="<?php echo site_url('karyawan/edit/' .$karyawan['id_karyawan']); ?>">Edit | </a>
				<a href="<?php echo site_url('karyawan/delete/' .$karyawan['id_karyawan']); ?>" onClick="return confirm('Are You SUre Want to delete?')">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>