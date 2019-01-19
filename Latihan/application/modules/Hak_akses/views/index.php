
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
      <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <?php foreach ($role->result() as $keys=> $value): ?>
              <li <?php if ($keys==0): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="#tab_<?php echo $value->id ?>" data-toggle="tab" aria-expanded="true"><?php echo $value->role ?></a></li>
            <?php endforeach ?>
          </ul>
          <div class="tab-content">
            <?php foreach ($data as $keys=>$value): ?>
             <div class="tab-pane <?php if ($keys==1): ?>
             <?php echo "active" ?>
             <?php endif ?>" id="tab_<?php echo $keys ?>">

             <form action="<?php echo base_url('hak_akses/simpan') ?>"  method="post">
               <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th  style="width: 40px">Modul</th>
                    <th  style="width: 40px">Action</th>
                  </tr>
                  <?php foreach ($modul->result() as $keyss=>$values): ?>
                    <tr>
                      <input type="text" hidden name='id' value="<?php echo $keys ?>">
                      <td>
                        <?php echo $values->modul ?>
                      </td>
                      <td>
                        <?php $arr=array(); if (isset($data[$keys][$values->modul])): ?>
                        <?php foreach ($data[$keys][$values->modul] as $value): ?>

                          <?php $arr[]=$value ?>

                        <?php endforeach ?>
                      <?php endif ?>

                      <label>
                        <input type="checkbox" name="<?php echo $values->modul ?>[]" <?php if(in_array('BACA', $arr)) echo "checked"; ?> value="BACA">
                        Baca
                      </label>&nbsp;&nbsp;
                      
  
                      <label>
                        <input type="checkbox" name="<?php echo $values->modul ?>[]" <?php if(in_array('TULIS', $arr)) echo "checked"; ?> value="TULIS"> Tulis
                      </label>&nbsp;&nbsp;


                      <label>
                       <input type="checkbox" name="<?php echo $values->modul ?>[]" <?php if(in_array('HAPUS', $arr)) echo "checked"; ?> value="HAPUS"> Hapus
                     </label>&nbsp;&nbsp;


                     <label>
                       <input type="checkbox" name="<?php echo $values->modul ?>[]" <?php if(in_array('EDIT', $arr)) echo "checked"; ?> value="EDIT"> Edit
                     </label>&nbsp;&nbsp;

                     <?php $arr=[] ?>
                   </td>
                 </tr>
               <?php endforeach ?>
             </tbody>
           </table>
           <button type="submit" class="btn btn-success" name="" value=""><i class="fa fa-send"> Simpan</i></button>
         </form>

       </div>
     <?php endforeach ?>

     <!-- /.tab-pane -->
   </div>
   <!-- /.tab-content -->
 </div>
 <!-- nav-tabs-custom -->
</div>
</div>

</section>

</div>