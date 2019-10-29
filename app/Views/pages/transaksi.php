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

          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="row ml-2 mt-2">
                  <div class="col-lg-4">
                    No. Transaksi
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="no_transaksi" name="no_transaksi" readonly="" value="<?= $no_transaksi ?>">
                  </div>
                </div>
                <div class="row  ml-2 mt-2">
                  <div class="col-lg-4">
                    Nama
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                </div>
                
              </div>
              <div class="col-lg-6">
                <div class="row  ml-2 mt-2">
                  <div class="col-lg-4">
                    Tanggal
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="tanggal" name="tanggal" readonly="" value="<?= date('Y-m-d') ?>">
                  </div>
                </div>
                <div class="row  ml-2 mt-2">
                  <div class="col-lg-4">
                    No.Telepon
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="telp" name="telp">
                  </div>
                </div>
              </div>  
              <div class="col-lg-12" style="margin-top: 20px;">
                <div class="row ml-2 mt-2">
                  <div class="col-lg-2">
                    Kode
                  </div>
                  <div class="col-lg-5">
                    <select class="form-control" id="select_item" name="select_item">
                      <option value="0"> Pilih item </option>
                      <?php foreach ($item as $key => $value): ?>
                        <option value="<?= $value->id_item ?>"><?= $value->kode.' - '.$value->nama ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary ml-2" id="btn_tambah">Tambah</button>
                  </div>
                </div>
              </div>          
            </div>
          </div>

        <div class="card-body p-0 pb-3 text-center">
          <table class="table table-striped table-hover">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">Kode Item</th>
                <th scope="col" class="border-0">Nama Item</th>
                <th scope="col" class="border-0">Harga</th>
                <th scope="col" class="border-0">Jumlah</th>
                <th scope="col" class="border-0">Total</th>
                <th scope="col" class="border-0">Aksi</th>
              </tr> 
            </thead>
            <tbody>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3"></td>
                <td>Total</td>
                <td><span id="text_total">0</span></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>Bayar</td>
                <td><input type="text" id="text_bayar" onchange="fun_selesai()" class="form-control" style="width: 50%"></td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>Kembalian</td>
                <td><span id="text_kembalian">0</span></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <!-- End Users Stats -->
  </div>
</div>
<div id="modal_selesai" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Transaksi selesai</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4">
              Total biaya
            </div>
            <div class="col-lg-8">
              <span id="txt_total"></span>
            </div>
            <div class="col-lg-4">
              Bayar
            </div>
            <div class="col-lg-8">
              <span id="txt_bayar"></span>
            </div>
            <div class="col-lg-4">
              Kembalian
            </div>
            <div class="col-lg-8">
              <span id="txt_kembalian"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary button-confirm-save col-xl-5" id="btn_simpan">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
    </div>

  </div>
</div>
<script type="text/javascript">
  var list_item = <?= json_encode($item) ?>;
  var arr_item = [];
  var arr_beli = {};
  var total = 0;
    
  $(document).ready(function() {
    dt_url = "<?php echo base_url('transaksi/get_json') ?>";
    dt_columns = [
      {"data" : "id_transaksi"},
      {"data" : "kode"},
      {"data" : "no_transaksi"},
      {"data" : "nama"},
      {"data" : "harga_pasang"},
      {"data" : "qty"},
      {"data" : "sub_total"}
    ];

    $.each(list_item,function (key,row) {
      arr_item[row.id_item] = row
    });
    $('#select_item').select2();
    $('#select_item').on('change',function () {
      var arr = [];
      $("#select_item option:selected").attr('disabled','disabled')
      var id_item = $('#select_item').select2('data')[0].id;
      var item = arr_item[id_item];
      var content = `
          <tr id="tr_`+id_item+`">
            <td>`+item.kode+`</td>
            <td>`+item.nama+`</td>
            <td>`+item.harga_pasang+`</td>
            <td><input type="number" class="form-control" onchange="count_jml(`+id_item+`,`+item.harga_pasang+`)" style="width:70px" id="jml_`+id_item+`" /></td>
            <td><span id="text_`+id_item+`"></span></td>
            <td><button class="btn btn-danger" onclick="func_hapus(`+id_item+`)"><i class="mdi mdi-delete"></i></button></td>
          </tr>
      `;
      $('tbody').append(content)
      arr_beli[id_item] = {
        'id_item' : id_item,
        'jumlah' : 0,
        'harga' : item.harga_pasang,
        'total' : 0
      };
      console.log(arr_beli)
    });
    $('#text_bayar').on('keyup',function () {
      var bayar = $(this).val();
      var kembalian = bayar - total
      $('#text_kembalian').text(kembalian)
      console.log()
    })
  });
  function func_hapus(id) {
    var jml = $('#text_'+id).text();
    total = total - jml;
    $('#text_total').text(total);
    $('#tr_'+id).remove();
    $("#select_item option[value=" + id + "]").removeAttr('disabled');
    delete arr_beli[id];
  }
  function count_jml(id,harga) {
    var jumlah = $('#jml_'+id).val();
    var jml = jumlah*harga;
    total = total+jml;
    $('#text_'+id).text(jml);
    $('#text_total').text(total);
    arr_beli[id]['jumlah'] = jumlah;
    arr_beli[id]['total'] = jml;
  }
  function fun_selesai() {
    var data = {
      nama : $('#nama').val(),
      no_transaksi : $('#no_transaksi').val(),
      tanggal : $('#tanggal').val(),
      telp : $('#telp').val(),
      total : $('#text_total').text(),
      bayar : $('#text_bayar').val(),
      kembalian : $('#text_kembalian').text(),
      detail : arr_beli,
    }
    $.ajax({
      url: "<?= base_url('transaksi/cu_transaksi/') ?>", 
      type: "POST", 
      data: data,
      success: function(data)    
      {
        if (data == 'sukses') {
          location.reload()
        }else{
          alert(data)
        }
      }
    });

    // console.log('wkwk')
    // $('#txt_total').text($('#text_total').text());
    // $('#txt_bayar').text($('#text_bayar').text());
    // $('#txt_kembalian').text($('#text_kembalian').text());
    // $('#modal_selesai').modal('show');
  }
  </script>