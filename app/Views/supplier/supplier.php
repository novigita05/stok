<h2>Data Supplier</h2>
<a href="<?php echo base_url('/supplier/create'); ?>">Tambah</a>
<table class="table">
		<tr>
			<th>ID Supplier</th>
			<th>Nama</th>
			<th>No. Telepon</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
	<?php foreach ($supplier as $sp) : ?>
		<tr>
			<td><?php echo $sp['id_supplier'];?></td>
			<td><?php echo $sp['nama'];?></td>
			<td><?php echo $sp['telp'];?></td>
			<td><?php echo $sp['alamat'];?></td>
			<td>
				<a href="<?php echo site_url('supplier/edit/' .$sp['id_supplier']); ?>">Edit | </a>
				<a href="<?php echo site_url('supplier/delete/' .$sp['id_supplier']); ?>">Hapus</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>