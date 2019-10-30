<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <h4 class="text-uppercase page-title"><?= $menu ?></h4>
      <span class="page-subtitle">Kelola <?= $menu ?></span>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- End Small Stats Blocks -->
  <div class="row">
    <!-- Users Stats -->
    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom d-flex">
          <h6 class="m-0">List <?= $menu ?></h6>
            <div class="ml-auto">
              <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal_supplier"> Tambah <?= $menu ?></button>
            </div>
        </div>
        <div class="card-body p-0 pb-3 text-center">
          <table class="table table-striped table-hover" id="datatable">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0 text-center">No</th>
                <th scope="col" class="border-0">Nama</th>
                <th scope="col" class="border-0">Telepon</th>
                <th scope="col" class="border-0">Alamat</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- End Users Stats -->
  </div>
</div>
<div id="modal_supplier" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah <?= $menu ?></h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form" data-menu='<?= $menu ?>'>
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4">
              Nama
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama_supplier">
            </div>
            <div class="col-lg-4">
              Telepon
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="telp">
            </div>
            <div class="col-lg-4">
              Alamat
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="alamat">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary button-confirm-save col-xl-5">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript">
  $(function () {
    dt_url = "<?php echo base_url('supplier/get_json') ?>";
    dt_columns = [
      {"data" : "id_supplier"},
      {"data" : "nama_supplier"},
      {"data" : "telp"},
      {"data" : "alamat"},
      {"data" : "aksi"}
    ];
  })
</script>