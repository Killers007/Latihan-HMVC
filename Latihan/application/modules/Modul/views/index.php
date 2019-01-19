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
             <a href="#" data-toggle="modal" data-target="#modal-form" data-backdrop="static" class="pull-right btn btn-primary btn_add"><i class="fa fa-plus icon_padding" style="margin-right:5px"></i><span class="hidden-lg hidden-md hidden-sm">Tambah</span><span class="hidden-xs">Tambah Data</span></a>
       </div>
       <div class="box-body table-responsive">
          <div class="col-sm-4 pull-right">
            <div class="input-group" >
              <input  type="text" id="field-cari" class="form-control" name="field-cari" placeholderr="Pencarian">
              <span class="input-group-btn" >
                <a class="btn btn-primary" id="btn-cari" href="#" value="Cari"><i class="fa fa-search"></i></a>
            </span>
        </div>
    </div>
    <table id="table-modul" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th width="20%">No</th>
            <th>Modul</th>
            <th width="10%">Opsi</th>
        </tr>
    </thead>
</table>
</div>
</div>
</div>
</div>

</section>

</div>

<!--Modal Hapus-->
<div id="modal-hapus" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">Hapus Modul</div>
            <div class="modal-body">
                Anda yakin menghapus modul "<span id="modul-delete"></span>" dari SILAB ULM?
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button id="btn-hapus" class="btn btn-danger" onclick="hapus();">
                    <span class="fa fa-spinner fa-spin"></span> Hapus
                </button>
                <button id="btn-batal" data-dismiss="modal" class="btn btn-default">Batal</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Form--> 
<div id="modal-form" class="modal fade" tabindex="-1" role="dialog">    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4 id="modal-title">Tambah Modul</h4></div>
            <div class="modal-body">
                <div class="alert alert-danger" id="pesan-error"></div>
                <?php  $this->view('_form'); ?>
            </div>
            <div class="modal-footer">
                <button id="btn-simpan" class="btn btn-primary modalbtn" onclick="simpan();">
                    <span class="fa fa-spinner fa-spin"></span> Simpan
                </button>
                <button id="btn-batal-simpan" data-dismiss="modal" class="btn btn-default modalbtn">Batal</button>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    function simpan(){
        var data = $("#form-modul").serialize();
        var id = $("#modul-lama").val();
        $.ajax({
            url:"<?php echo base_url("modul/simpan");?>/"+id,
            data:data,
            type:"POST",
            dataType:'JSON',
            beforeSend: function(){
                $(".fa-spinner").show();
                $("#btn-simpan").attr("disabled",true);
                $("#btn-batal-simpan").attr("disabled",true);
            },
            success: function(data){
                $(".fa-spinner").hide();
                $("#btn-simpan").removeAttr("disabled");
                $("#btn-batal-simpan").removeAttr("disabled");
                if(data.simpan){
                 oTable.fnDraw();
                 $("#btn-simpan").hide();
                 $("#btn-batal-simpan").html("Tutup");
                 $("#modal-form .modal-body").html(data.pesan);
             }else{
                 $("#pesan-error").show();
                 $("#pesan-error").html(data.pesan);
             }
         }
     });
    }
    function edit(obj){
        var id=obj.data('modul');
        $.ajax({
            url:"<?php echo base_url('modul/simpan');?>/"+id,
            data:id,
            type:"GET",
            dataType:'JSON',
            beforeSend: function(){
                $("#modal-form").modal('show');
                $("#modal-form #modal-title").html("Perbaharui Modul");
                $(".fa-spinner").show();
                $("#btn-simpan").attr("disabled",true);
            },
            success:function(data){
                if(data.simpan){
                    $("#modul-lama").val(data.model.modul);
                    $("#modul").val(data.model.modul);
                    $(".fa-spinner").hide();
                    $("#btn-simpan").removeAttr("disabled");
                }else{
                    $("#modal-form .form-body").html(data.pesan);
                }
            }
        });
    }
    function setModalHapus(dom){
        var modul = dom.data('modul');
        $(".fa-spinner").hide();
        $("#btn-hapus").show();
        $("#btn-batal").html("Batal");
        $("#modal-hapus .modal-body").html("Anda yakin menghapus modul \"<span id='modul-delete'></span>\" dari SIMDAKAR ULM?");
        $("#modul-delete").html(modul);
    }
    function hapus() {
        var modul = $("#modul-delete").html();
        $.ajax({
            url: "<?php echo base_url('modul/hapus'); ?>",
            data: {'id': modul},
            dataType: 'JSON',
            beforeSend: function(){
                $(".fa-spinner").show();
                $("#btn-hapus").attr("disabled",true);
                $("#btn-batal").attr("disabled",true);
            },
            success: function (data) {
                $(".fa-spinner").hide();
                $("#btn-hapus").removeAttr("disabled");
                $("#btn-batal").removeAttr("disabled");
                if(data.hapus){
                    $("#btn-hapus").hide();
                    $("#btn-batal").html("Tutup");
                    oTable.fnDraw();
                }
                $("#modal-hapus .modal-body").html(data.pesan);
            },
        });
    } 
    $("#field-cari").on('keyup', function(e) {
        var code = e.which;
        if(code==13)e.preventDefault();
        if(code==32||code==13||code==188||code==186){
            oTable.fnFilter($("#field-cari").val());
        }
    });    
    $("#btn-cari").click(function(){
        oTable.fnFilter($("#field-cari").val());
    });
    $(document).ready(function () {
       var formTitle = $("#modal-form #modal-title").html();
       var formBody = $("#modal-form .modal-body").html();
       var formFooter = $("#modal-form .modal-footer").html();
       $("#modal-form").modal({backdrop:"static",show:false});
       $("#modal-form").on("show.bs.modal",function(){
        $("#modal-form #modal-title").html(formTitle);
        $("#modal-form .modal-body").html(formBody);
        $("#modal-form .modal-footer").html(formFooter);
        $(".fa-spinner").hide();
        $("#pesan-error").hide(); 
    });
       oTable = $('#table-modul').dataTable({
        processing: true,
        serverSide: true,
        scrollX : false, 
        ajax:"<?php echo base_url('modul');?>",
        lengthMenu:[15, 30],
        dom : '<"top">lrt<"bottom"ip>',
        columnDefs: [{"className": "dt-tengah", "targets": [2]}],
        paging: false,
        columns:[
        {render : function(data,type,row,meta){
            return meta.row+1;
        },searchable:false,orderable:false,width:"17px"},
        {data : 'modul'},
        {data : 'modul',searchable:false,orderable:false,
        render: function(data,type,row){
         var hapus = "<a data-modul='" + data + "' data-backdrop='static' data-toggle='modal' data-target='#modal-hapus' onclick='return setModalHapus($(this));' href='#' title='Hapus'><span style='color : #e33244' class='fa fa-trash'></span></a> ";
         var edit = "<a data-modul='" + data + "' onclick='edit($(this));return false;' title='Ubah'><span class='fa fa-pencil' style='color :  #1aabbb'></span></a> ";
         return edit+hapus;
     }
 }
 ]
});
   });
</script>

