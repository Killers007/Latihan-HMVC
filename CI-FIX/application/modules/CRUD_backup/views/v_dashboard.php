
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
              <button type="button" class="btn btn-primary save" >Save changes</button>
            </div>
          </div>
          <!-- data-dismiss="modal" -->
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
                <button onclick="clear()" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default" >
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

        <?php if (!empty($relasi->relasi)): ?>
          var relasi=<?php print_r($relasi->relasi); ?>;
        // console.log(relasi);
      <?php endif ?>

      var input='';
      var respon;

      function buat_input(response){
        for(i=0;i<response[0].length;i++){
          <?php if (!empty($relasi->relasi)): ?>
            if (response[0][i].name==relasi[0]) {
              var hasil='';
              $.ajax({
                async : false,
                url: '<?php echo base_url('crud/get_relasi') ?>',
                type: 'POST',
                data: {
                  'tabel' : relasi[1],
                  'id' : relasi[2],
                  'nama' : relasi[3],
                },success: function(response){
                  datanya=JSON.parse(response);

                  for(var i=0;i<datanya.length;i++){
                    var s=0;
                    for(var k in datanya[i]){
                      if(s==0){
                        hasil+='<option value="'+datanya[i][k]+'">'
                        s++;
                      }else{
                        hasil+=datanya[i][k]+'</option>'
                      }
                    }
                  }
                }
              });
                  // alert(hasil);
              input+='<div class="form-group" id="'+response[0][i].name+'"><label>'+pretty(response[0][i].name)+'</label>'
              input+='<select class="form-control" name="'+response[0][i].name+'">'+hasil+'</select><span class="help-block '+response[0][i].name+'"></span></div>'
            }
            else 
          <?php endif ?>
        if (response[0][i].type=='int') {
          input+='<div class="form-group" id="'+response[0][i].name+'"><label>'+pretty(response[0][i].name)+'</label>'
          input+='<input type="number" class="form-control" required name="'+response[0][i].name+'" placeholder="MASUKKAN '+pretty(response[0][i].name)+'"><span class="help-block '+response[0][i].name+'"></span></div>'
        }else if (response[0][i].type=='varchar') {
          input+='<div class="form-group" id="'+response[0][i].name+'"><label>'+pretty(response[0][i].name)+'</label>'
          input+='<input type="text" class="form-control" required name="'+response[0][i].name+'" placeholder="MASUKKAN '+pretty(response[0][i].name)+'"><span class="help-block '+response[0][i].name+'"></span></div>'
        }else {
         input+='<div class="form-group" id="'+response[0][i].name+'"><label>'+pretty(response[0][i].name)+'</label>'
         input+='<input type="text" class="form-control" required name="'+response[0][i].name+'" placeholder="MASUKKAN '+pretty(response[0][i].name)+'"><span class="help-block '+response[0][i].name+'"></span></div>'
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
      url: '<?php echo base_url('crud').'/load_data' ?>',
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
      table+='   <button class="btn btn-danger btn-sm delete" value="'+response[1][i].<?php echo $primary_key; ?>+'"><i class="fa fa-trash"></i></button>'
      table+='   <button class="btn btn-primary btn-sm detail" data-toggle="modal" data-target="#modal-update"><i class="fa fa-pencil"></i></button>'
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
      url: '<?php echo base_url('crud').'/tambah_data' ?>',
      type: 'POST',
      data:data,
    })
    .done(function(response) {
     if (response=='') {
      swal("Sukses!", "Data berhasil ditambahkan", "success");
      load_data();
      $('#modal-default').modal('toggle');
    }else{
          // swal("Error!", 'Gagal', "error");
          // console.log(response)
          <?php for($i=0;$i<count($field);$i++){ ?>
            $('.<?php echo $field[$i]->name ?>').html(JSON.parse(response)[<?php echo $i; ?>]);
            if (JSON.parse(response)[<?php echo $i; ?>]!='') {
              $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group has-error');
            }else{
             $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group');
           }
         <?php } ?>

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
      url: '<?php echo base_url('crud').'/update_data' ?>',
      type: 'POST',
      data:data,
    })
    .done(function(response) {
     if (response=='') {
      $('#modal-update').modal('toggle');
      swal("Sukses!", "Data berhasil diupdate", "success");
      load_data();

    }else{
          // swal("Error!", response, "error");
          // console.log(respon[0]);
          <?php for($i=0;$i<count($field);$i++){ ?>
            $('.<?php echo $field[$i]->name ?>').html(JSON.parse(response)[<?php echo $i; ?>]);
            if (JSON.parse(response)[<?php echo $i; ?>]!='') {
              $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group has-error');
            }else{
             $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group');
           }
         <?php } ?>

           // 
         }

       })
    .fail(function(response) {
      console.log(response)
      swal("Error!", "Data gagal diupdate", "error");
    })
  });

  $(document).on('click', '.detail', function(){
    for(i=0;i<respon[0].length;i++){
          // alert($(this).closest('tr').find('td:eq(0)').text())
          $("#modal-update").find('input[name="'+respon[0][i].name+'"]').val($(this).closest('tr').find('td:eq('+i+')').text());
          $("#modal-update").find('select[name="'+respon[0][i].name+'"]').val($(this).closest('tr').find('td:eq('+i+')').text());
        }
        console.log(respon[0]);
        clear();

      });

  function clear(){
        // alert('message?: DOMString')
        <?php for($i=0;$i<count($field);$i++){ ?>
          $('.<?php echo $field[$i]->name ?>').html('');
          $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group');
        <?php } ?>
      }

      $(document).on('click', '.delete', function(){
       var data = $(this).val();
       // alert(data)
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
          url: '<?php echo base_url('crud').'/hapus_data' ?>',
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
          console.log(response)
          swal("Failed", "Data Gagal Dihapus", "error");
        })

       } else {
        swal("Cancelled", "Data Tidak Jadi Dihapus", "error");
      }
    });
     });
    });

  </script>