
<link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap-sweetalert/sweetalert.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1><i class="Custom Crud">  </i> 
      Custom<small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Ajax Crud Generator By Ahmad Juhdi</a></li>
      <li class="active">Data Table</li>
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
        </div>
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
                  <input type="hidden" name="primary" >
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
          </div>
        </div>

        <div class="row">
         <div class="col-md-12 ">
          <div class="box">
           <div class="box-header">
            <h3 class="box-title">AJAX CRUD</h3>
            <?php if ($access['insert']): ?>
              <button onclick="clear()" class="btn btn-success pull-right tambah" data-toggle="modal" data-target="#modal-default" >
               Tambah Data
             </button>
           <?php endif ?>
         </div>
         <div class="box-body show-data table-responsive">
          <table id="tabel" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width: 15%">ID User</th>
                <th style="width: 30%">Password</th>
                <th style="width: 5%">Email</th>
                <th style="width: 25%">Role</th>                                
                <th style="width: 15%">Prodi</th>
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
<script type="text/javascript">
 $(document).ready(function() {

  <?php if (!empty($relasi->relasi)): ?>
   var relasi=<?php echo ($relasi->relasi=='null')?'[[]]':json_encode($relasi->relasi) ?>;

 <?php endif ?>

 var input='';
 var respon;

 function buat_input(){
  $.ajax({
    url: '<?php echo current_url() ?>/buat_input',
    type: 'POST',
    dataType: 'json',
  })
  .done(function(response) {
    var hasil='';
    var status=false;
    for(i=0;i<response.length;i++){
      <?php if (!empty($relasi->relasi)): ?>
       var status=false;
       for(var a=0;a<relasi.length;a++){
        if (response[i].name==relasi[a][0]) {
         data={
          'tabel' : relasi[a][1],
          'id' : relasi[a][2],
          'nama' : relasi[a][3],
        }
        $.ajax({
          async : false,
          url: '<?php echo current_url() ?>/get_relasi',
          type: 'POST',
          data: data,
          success: function(response){
           datanya=JSON.parse(response);

           status=true;
           hasil='<option value="">-- Pilih Terlebih Dahulu --</option>';
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
        if (hasil!='') {
         // if (response[i].name=='prodi') {
         //   input+='<div class="form-group" id="Fakultas"><label>Fakultas</label>'
         //   input+='<textarea class="form-control" name="Fakultas" rows="3" placeholder="MASUKKAN FAkultas"></textarea><span class="help-block peodu"></span></div>'
         // }
         input+='<div class="form-group" id="'+response[i].name+'"><label>'+pretty(response[i].name)+'</label>'
         input+='<select class="form-control" name="'+response[i].name+'">'+hasil+'</select><span class="help-block '+response[i].name+'"></span></div>'
       }else{
         console.log('Ada kesalahan dalam penulisan relasi, coba cek lagi');
         console.log(data);
       }

     }
   }

 <?php endif ?>

 if (status==false) {
   if (response[i].type=='int') {
    input+='<div class="form-group" id="'+response[i].name+'"><label>'+pretty(response[i].name)+'</label>'
    input+='<input type="number" class="form-control" required name="'+response[i].name+'" placeholder="MASUKKAN '+pretty(response[i].name)+'"><span class="help-block '+response[i].name+'"></span></div>'
  }else if (response[i].type=='varchar') {
    input+='<div class="form-group" id="'+response[i].name+'"><label>'+pretty(response[i].name)+'</label>'
    input+='<input type="text" class="form-control" required name="'+response[i].name+'" placeholder="MASUKKAN '+pretty(response[i].name)+'"><span class="help-block '+response[i].name+'"></span></div>'
  }else {

    input+='<div class="form-group" id="'+response[i].name+'"><label>'+pretty(response[i].name)+'</label>'
    input+='<textarea class="form-control" name="'+response[i].name+'" rows="3" placeholder="MASUKKAN '+pretty(response[i].name)+'"></textarea><span class="help-block '+response[i].name+'"></span></div>'
  }
}

}
$('.input-data').html(input);
$('.update-data').html(input);
input='';
respon=response;
})


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
 // $('.show-data').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
 $.ajax({
  url: '<?php echo current_url().'/load_data' ?>',
  type: 'POST',
})
 .done(function(response) {
          //console.log(JSON.parse(response));
          // buat_tabel(JSON.parse(response));
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
var oTable;

oTable = $('#tabel').dataTable({
  processing: true,
  serverSide: true,
  scrollX: false,
  'searching'   : true,
  pagingType: 'numbers',
  ajax: "<?php echo base_url('user/index');?>",
  lengthMenu: [20, 50],
  dom: '<"top">lrt<"bottom"ip>',
  language : {
   'loadingRecords' : '&nbsp;',
   'processing' : '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>'
 },
 columnDefs: [{"className": "dt-tengah", "targets": [2, 5]}],
 columns: [
 {data: 'id_user'},
 {data: 'password'},
 {data: 'email'},
 {data: 'role'},
 {data: 'prodi'},
 {data: 'id_user', searchable: false, orderable: false,
 render: function (data) {
  var update = '<button class="btn btn-info btn-sm detail" data-toggle="modal" value="'+data+'" data-target="#modal-update"><i class="fa fa-pencil"></i></button>'
   
    
  var hapus = '<div class="btn-group"><button class="btn btn-danger btn-sm delete" value="'+data+'"><i class="fa fa-trash"></i></button>';

  return '<div class="btn-group">'<?php if ($access['update']): ?> +update  <?php endif ?> + <?php if ($access['delete']): ?>hapus+ <?php endif ?>'</div>';
}
}
]
});



function ajax(aksi,data,status,modal){
 $.ajax({
  url: '<?php echo current_url(); ?>/'+aksi,
  type: 'POST',
  data:data,
})
 .done(function(response) {
  if (response=='') {
   swal("Sukses!", 'Data berhasil '+status, "success");
   oTable.fnDraw();
   $('#modal-'+modal).modal('toggle');
 }else{
   valdiasi_error(response);
 }
}).fail(function(response) {
  swal("Error!", "Kesalahan "+status+" Data", "error");
})
}

$('.save').click(function(event) {
 var data = $('.form-insert').serialize();
 ajax('tambah_data',data,'Menambahkan','default');

});

$('.update').click(function(event) {
 var data = $('.form-update').serialize();
 ajax('update_data',data,'Mengupdate','update');
});

$('.tambah').click(function(event) {
 clear();
});

function valdiasi_error(response){
 <?php for($i=0;$i<count($field);$i++){ ?>
  $('.<?php echo $field[$i]->name ?>').html(JSON.parse(response)[<?php echo $i; ?>]);
  if (JSON.parse(response)[<?php echo $i; ?>]!='') {
   $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group has-error');
 }else{
   $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group');
 }
<?php } ?>
}

$(document).on('click', '.detail', function(){
 $.ajax({
  url: '<?php echo current_url() ?>/detail',
  type: 'POST',
  dataType: 'json',
  data: {
   'id' : $(this).val()
 },
})
 .done(function(response) {

  $.each(response, function(index, val) {
   if (index=='<?php echo $primary_key ?>') {
    $("#modal-update").find('input[name="primary"]').val(val);
    // $("#modal-update").find('select[name="'+index+'"]').attr('readonly','true');
    // $("#modal-update").find('textarea[name="'+index+'"]').attr('readonly','true');
  }
  $("#modal-update").find('input[name="'+index+'"]').val(val);
  $("#modal-update").find('select[name="'+index+'"]').val(val);
  $("#modal-update").find('textarea[name="'+index+'"]').val(val);
});
  clear();
})
});

function clear(){
 <?php for($i=0;$i<count($field);$i++){ ?>
  $('.<?php echo $field[$i]->name ?>').html('');
  $("div[id='<?php echo $field[$i]->name ?>']").attr('class', 'form-group');
<?php } ?>
}

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
    oTable.fnDraw();
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