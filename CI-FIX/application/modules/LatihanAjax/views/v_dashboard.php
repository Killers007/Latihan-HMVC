
<link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap-sweetalert/sweetalert.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
              <form method="post" class="form-insert">
                <div class="box-body">
                  <div class="form-group input-data">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary save" data-dismiss="modal">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data</h4>
              </div>
              <div class="modal-body">
                <form method="post" class="form-update">
                  <div class="box-body">
                    <div class="form-group update-data">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update" >Update changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="row">
          <div class="col-md-12 ">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">AJAX CRUD</h3>
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
                  Tambah Data
                </button>
              </div>
              <div class="box-body show-data table-responsive">
                <div class="overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
              </div>
              
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </section>

    </div>
    <script src="<?php echo base_url('assets') ?>/bower_components/bootstrap-sweetalert/sweetalert.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var input='';
        var respon;
        function buat_input(response){
          for(i=0;i<response[0].length;i++){
            if (response[0][i].type=='int') {
              input+='<div class="form-group"><label>'+pretty(response[0][i].name)+'</label>'
              input+='<input type="number" class="form-control" required maxlength="'+response[0][i].max_length+'" name="'+response[0][i].name+'" placeholder="MASUKKAN '+pretty(response[0][i].name)+'"></div><br><span class="help-block '+response[0][i].name+'"></span>'
            }else if (response[0][i].type=='varchar') {
              input+='<div class="form-group"><label>'+pretty(response[0][i].name)+'</label>'
              input+='<input type="text" class="form-control" required maxlength="'+response[0][i].max_length+'" name="'+response[0][i].name+'" placeholder="MASUKKAN '+pretty(response[0][i].name)+'"></div><br><span class="help-block '+response[0][i].name+'"></span>'
            }else if (response[0][i].type=='blob') {
             input+='<div class="form-group"><label>'+pretty(response[0][i].name)+'</label>'
             input+='<input type="text" class="form-control" required maxlength="'+response[0][i].max_length+'" name="'+response[0][i].name+'" placeholder="MASUKKAN '+pretty(response[0][i].name)+'"></div><br><span class="help-block '+response[0][i].name+'"></span>'
           }

         }
         $('.input-data').html(input);
         $('.update-data').html(input);
         input='';
         respon=response;
       }

       load_data();

       function pretty(str){
        result=str.replace('_', ' ');
        return result.replace(/\w\S*/g,function(result){
          return result.substr(0).toUpperCase();
        })
      }
      load=0;
      function load_data(){
        $('.show-data').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        $.ajax({
          url: '<?php echo current_url().'/load_data' ?>',
          type: 'POST',
        })
        .done(function(response) {
          //console.log(JSON.parse(response));
          buat_tabel(JSON.parse(response));
          if (load==0) {
            buat_input(JSON.parse(response));
            load=1;
          }
        })
        .fail(function(response) {
          alert("error");
        })
      };

      var table=''
      function buat_tabel(response){
        table+='<table id="example1" class="table table-bordered table-striped">'
        table+='<thead>'
        table+='  <tr>'
        for(i=0;i<response[0].length;i++){
          table+='      <th>'+pretty(response[0][i].name)+'</th>'
        }
        table+='    <th>Action</th>'
        table+='  </tr>'
        table+='</thead>'

        table+='<tbody>'
        for(i=0;i<response[1].length;i++){
          table+=' <tr>'
          for(var k in response[1][i]){
            table+='   <td>'+response[1][i][k]+'</td>'
          }
          table+=' <td>'
          table+='   <button class="btn btn-danger delete" value="'+response[1][i].<?php echo $primary_key; ?>+'"><i class="fa fa-trash"></i></button>'
          table+='   <button class="btn btn-primary detail" data-toggle="modal" data-target="#modal-update"><i class="fa fa-pencil"></i></button>'
          table+='  </td>'
          table+=' </tr>'

        }
        table+='</tbody>'
        table+='</table>'
        $('.show-data').html(table);
        table='';
        $('#example1').DataTable({
          'processing' : true,
          'language' : {
            'loadingRecords' : '&nbsp',
            'processing' : '<div class="spinner">Anjay</div>'
          }
        });
      }

      $('.save').click(function(event) {
        var data = $('.form-insert').serialize();

        $.ajax({
          url: '<?php echo current_url().'/tambah_data' ?>',
          type: 'POST',
          data:data,
        })
        .done(function(response) {
         if (response=='') {
          swal("Sukses!", "Data berhasil ditambahkan", "success");
          load_data();
        }else{
          swal("Error!", response, "error");
        }
        console.log(response)
      })
        .fail(function(response) {
          swal("Error!", "Kesalahan Menambahkan Data", "error");
          console.log(response)
        })
      });

      $('.update').click(function(event) {
        var data = $('.form-update').serialize();

        $.ajax({
          url: '<?php echo current_url().'/update_data' ?>',
          type: 'POST',
          data:data,
        })
        .done(function(response) {
         if (response=='') {
           swal("Sukses!", "Data berhasil diupdate", "success");
           load_data();
         }else{
          swal("Error!", response, "error");
          console.log(respon[0]);
          for(var i=0;i<respon[0].length;i++){
             // alert(JSON.parse(response)[i]);
             // $('.'+respon[i].name+'+').html(JSON.parse(response)[i]);
           }
           $('.kode_fakultas').html(JSON.parse(response)[0]);
           $('.fakultas').html(JSON.parse(response)[1]);
           $('.nama').html(JSON.parse(response)[2]);
         }

       })
        .fail(function(response) {
          swal("Error!", "Data gagal diupdate", "error");
        })
      });

      $(document).on('click', '.detail', function(){
        for(i=0;i<respon[0].length;i++){
          // alert($(this).closest('tr').find('td:eq(0)').text())
          $("#modal-update").find('input[name="'+respon[0][i].name+'"]').val($(this).closest('tr').find('td:eq('+i+')').text());
        }
        console.log(respon[0]);
        // $('.kode_fakultas').html(JSON.parse(response)[0]);
        // $('.fakultas').html(JSON.parse(response)[1]);
        // $('.nama').html(JSON.parse(response)[2]);
      });

      $(document).on('click', '.delete', function(){
       var data = $(this).val();
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
          load_data();
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