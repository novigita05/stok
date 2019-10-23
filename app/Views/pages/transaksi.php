<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <!-- End Page Header -->
  <!-- End Small Stats Blocks -->
  <div class="row">
    <!-- Users Stats -->
    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom d-flex">
            <div class="ml-auto">
              <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal_transaksi"> Selesai </button>
            </div>
        </div>

        <form id="form">
        <div class="modal-body">
          <div class="col-lg-8 d-flex">
            <div class="col-lg-9">
            <input type="text" class="form-control" name="">
            </div>
            <div class="col-lg-3">
            <button type="submit" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal_transaksi">Tambah</button>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-6">
              <div class="row ml-2 mt-2">
              <div class="col-lg-4">
                No. Transaksi
              </div>
              <div class="col-lg-8">
                <input type="text" class="form-control" name="no_transaksi">
              </div>
            </div>
              <div class="row  ml-2 mt-2">
              <div class="col-lg-4">
                Tanggal
              </div>
              <div class="col-lg-8">
                <input type="date" class="form-control" name="tanggal">
              </div>
            </div>
            </div>
            <div class="col-lg-6">
              <div class="row  ml-2 mt-2">
              <div class="col-lg-4">
                Nama
              </div>
              <div class="col-lg-8">
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
              <div class="row  ml-2 mt-2">
              <div class="col-lg-4">
                No.Telepon
              </div>
              <div class="col-lg-8">
                <input type="text" class="form-control" name="telp">
              </div>
            </div>
            </div>            
          </div>
        </div>
        </form>

        <div class="card-body p-0 pb-3 text-center">
          <table class="table table-striped table-hover" id="datatable">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0 text-center">No</th>
                 <th scope="col" class="border-0">Kode Transaksi</th>
                 <th scope="col" class="border-0">No Transaksi</th>
                <th scope="col" class="border-0">Nama Item</th>
                <th scope="col" class="border-0">Harga</th>
                <th scope="col" class="border-0">Jumlah</th>
                <th scope="col" class="border-0">Total</th>
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
<script type="text/javascript">
  $(function () {

    dt_url = "<?php echo base_url('transaksi/get_json') ?>";
    console.log(dt_url)
    dt_columns = [
      {"data" : "id_transaksi"},
      {"data" : "kode"},
      {"data" : "no_transaksi"},
      {"data" : "nama"},
      {"data" : "harga_pasang"},
      {"data" : "qty"},
      {"data" : "sub_total"}
      //{"data" : "aksi"}
    ];
  })
</script>