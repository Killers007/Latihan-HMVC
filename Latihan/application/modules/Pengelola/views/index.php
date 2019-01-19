
<link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap-sweetalert/sweetalert.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title ?> 
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?php echo $title ?></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-12 ">
        <div class="box">
          <div class="box-header">

            <h3 class="box-title">Data <?php echo $title ?></h3>
            <a class="btn btn-success pull-right" href="<?php echo base_url('pengelola/tambah') ?>">
             Tambah Data
           </a>
         </div>
         <div class="box-body table-responsive">
          <div class="col-sm-4 pull-right">
            <div class="input-group input-group-sm" >
              <input  type="text" id="field-cari" class="form-control" name="field-cari" placeholderr="Pencarian">
              <span class="input-group-btn" >
                <a class="btn btn-primary" id="btn-cari" href="#" value="Cari"><i class="fa fa-search"></i></a>
              </span>
            </div>
          </div>
          <table id="tabel" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 15%">ID Pengelola</th>
                <th style="width: 30%">NIP</th>
                <th style="width: 5%">Nama</th>
                <th style="width: 25%">No Hp</th>                                
                <th style="width: 15%">Email</th>
                <th style="width: 10%">Opsi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>

</div>
<script src="<?php echo base_url('assets') ?>/bower_components/bootstrap-sweetalert/sweetalert.js"></script>
<script>
  var oTable;

  $(document).ready(function () {

    oTable = $('#tabel').dataTable({
      processing: true,
      serverSide: true,
      scrollX: false,
      'searching'   : true,
      pagingType: 'numbers',
      ajax: "<?php echo base_url('pengelola/index');?>",
      lengthMenu: [20, 50],
      dom: '<"top">lrt<"bottom"ip>',
      language : {
       'loadingRecords' : '&nbsp;',
       'processing' : '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
     },
     columnDefs: [{"className": "dt-tengah", "targets": [2, 5]}],
     columns: [
     {data: 'idpengelola'},
     {data: 'jabatan'},
     {data: 'nama'},
     {data: 'no_hp'},
     {data: 'email'},
     {data: 'idpengelola', searchable: true, orderable: true,
     render: function (data) {
      var update = '<a class="btn btn-info btn-sm" href="<?php echo base_url('pengelola/edit') ?>/'+data+'"><i><span class="fa fa-pencil" ></i></a>'
      var hapus = '<a class="btn btn-danger btn-sm" data-value="'+data+'"><i><span class="fa fa-trash"></i></a>';
      return '<div class="btn-group">'+update + hapus+'</div>';
    }
  }
  ]
});

    $("#field-cari").on('keyup', function(e) {
      var code = e.which;
      if(code==13)e.preventDefault();
      if(code==32||code==13||code==188||code==186){
        oTable.fnFilter($("#field-cari").val());
      }
    });

    $(document).on('click', '.delete', function(){
     var data = $(this).data('value');
     swal({
      title: "Apakah anda yakin?",
      text: "Data yang dihapus tidak dapat dikembalikan",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-warning",
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function (isConfirm) {
      if (isConfirm) {
       $.ajax({
        url: '<?php echo current_url().'/hapus_data' ?>',
        type: 'POST',
        data:{
         'id' : data,
       },
     })
       .done(function(response) {
        swal("Deleted!", "Data Berhasil Dihapus!", "success");
        oTable.fnDraw();
      })
       .fail(function(response) {
        swal("Failed", "Data Gagal Dihapus", "error");
      })

     } else {
       swal("Cancelled", "Data Tidak Jadi Dihapus", "error");
     }
   });
   });

  });

</script>
