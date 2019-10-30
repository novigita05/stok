        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <div id='ajaxloading'><img src="<?= base_url('assets/hourglass.gif') ?>" />
      Sedang memproses...
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../assets/js/shared/off-canvas.js"></script>
    <script src="../assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
<script type="text/javascript">
  
  var dt_settings = {
    "pagingType": "numbers",
    "pageLength": 10,
    "dom": '<"top"<"form-group"<"for-filter">if>>rt<"bottom"pl>',
    "oLanguage": {
        "sSearch": "",
        "sEmptyTable": "Data tidak tersedia",
        "sInfoEmpty":  "Menampilkan 0",
        "sLengthMenu": "Item per halaman _MENU_",
        "sInfoFiltered": " - dari total _MAX_ entri",
        "sInfo": "Menampilkan: _TOTAL_ entri",
        "sProcessing": "Memuat Data...",
        "sZeroRecords":    "Tidak ditemukan data yang cocok",
    },
    "processing": true,
    "bSortClasses": false,
    "aoColumnDefs" : [ 
      {"aTargets" : [0], "mData" : null, "sClass":  "text-center"}, 
    ],
    "columnDefs": [{
        "searchable": false,
        "orderable": false,
        "targets": 0
    }]
    ,
    "order": [
    [1, 'asc']
    ]
  }
  $(document).ready(function() {
    $(function() {
      jQuery.fn.exists = function(){return this.length>0;}
      if ($('#datatable').exists()) {
          $.getScript("https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js", function(){ 
            $.fn.dataTableExt.oStdClasses.sPageButton = "btn btn-secondary";
            $.fn.dataTableExt.oStdClasses.sPaging = "btn-group dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_numbers";
            if (typeof dt_url != 'undefined') {
                dt_settings.ajax = {url: dt_url,
                    dataSrc: ''
                }
                dt_settings.columns = dt_columns
            }
            dt = $('#datatable').DataTable(dt_settings);
            dt.on('order.dt search.dt', function() {
                dt.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $('.dataTables_filter input').addClass('form-control boxed').attr("placeholder", "Search").parent().addClass('form-control-label')
          });
      }
    });
  });
  $('#form').off().submit(function (e) {
      e.preventDefault();
      var menu = $(this).data('menu')
      var url = '<?= base_url() ?>'+menu+'/cu_'+menu
      var form_data = new FormData();
      var data = $(this).serializeArray();
      $.each(data, function(i, field){
        form_data.append(field.name,field.value);
      });

      $.ajax({
        url: url, 
        type: "POST",
        data: form_data ,
        beforeSend:loading(),
        contentType: false,
        processData: false,
        success: function(data)    
        {
          if (data == 'sukses') {
            $('#modal_'+menu).modal('hide')
            if(typeof dt !== 'undefined'){
              dt.ajax.reload();
            }
          }
          loading_done();
        }
      });
    });
  function loading() {
    $('#ajaxloading').show()
  }
  function loading_done() {
    $('#ajaxloading').show()
  }
</script>