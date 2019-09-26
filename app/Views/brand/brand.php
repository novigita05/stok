<title>Stok</title>
<h2>Brand</h2>
<a href="<?php echo base_url('/brand/create'); ?>">Tambah Brand</a>
<table class="table">
    <tr>
      <th>ID</th>
      <th>Brand</th>
      <th>Action</th>
    </tr>
  <?php foreach ($brand as $br) : ?>
    <tr>
      <td><?php echo $br['id_brand'];?></td>
      <td><?php echo $br['brand'];?></td>
      <td>
        <a href="<?php echo site_url('brand/edit/' .$br['id_brand']); ?>"> Edit | </a>
        <a href="<?php echo site_url('brand/delete/' .$br['id_brand']); ?>"  onClick="return confirm(' Are You Sure Want to Delete?')"> Delete </a>
      </td>
    </tr>
  <?php endforeach; ?>  
</table>