<title>Stok</title>
<h2>Kategori</h2>
<a href="<?php echo base_url('/kategori/create'); ?>">Tambah</a>
<table class="table">
    <tr>
      <th>ID</th>
      <th>Kategori</th>
      <th>Action</th>
    </tr>
  <?php foreach ($kategori as $kt) : ?>
    <tr>
      <td><?php echo $kt['id_kategori'];?></td>
      <td><?php echo $kt['kategori'];?></td>
      <td>
        <a href="<?php echo site_url('kategori/edit/' .$kt['id_kategori']); ?>"> Edit | </a>
        <a href="<?php echo site_url('kategori/delete/' .$kt
        ['id_kategori']); ?>"  onClick="return confirm(' Are You Sure Want to delete?')"> Delete </a>
      </td>
    </tr>
  <?php endforeach; ?>  
</table>