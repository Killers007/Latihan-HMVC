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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo ucfirst($this->uri->segment(2)); ?> Pengelola</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" class="form-horizontal" action="<?php echo base_url(uri_string()) ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pengelola</label>
              <div class="col-sm-10">
               <input type="text" name="idpengelola" required class="form-control" value="<?php if(isset($model->idpengelola)) echo $model->idpengelola ?>" placeholder="Enter ID Pengelola">
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-2 control-label">NIP</label>
             <div class="col-sm-10">
               <input type="text" name="nip" required class="form-control" value="<?php if(isset($model->nip)) echo $model->nip ?>" placeholder="Enter NIP">
             </div>
           </div>
           <div class="form-group <?php echo (form_error('nama') != "" ? "has-error":"");?>">
            <label class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
             <input type="text" name="nama" required class="form-control" value="<?php if(isset($model->nama)) echo $model->nama ?>" placeholder="Enter Nama">
             <span class="help-block"><?php echo form_error('nama'); ?></span>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">No Hp</label>
           <div class="col-sm-10">
             <input type="text" name="no_hp" required class="form-control" value="<?php if(isset($model->no_hp)) echo $model->no_hp ?>" placeholder="Enter No Hp">
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Email</label>
           <div class="col-sm-10">
             <input type="email" name="email" required class="form-control" value="<?php if(isset($model->email)) echo $model->email ?>" placeholder="Enter Email">
           </div>
         </div>

         <div class="form-group">
          <label class="col-sm-2 control-label">Jabatan</label>
          <div class="col-sm-10">
           <input type="text" name="jabatan" required class="form-control" value="<?php if(isset($model->jabatan)) echo $model->jabatan ?>" placeholder="Enter Jabatan">
         </div>
       </div>

       <div class="form-group <?php echo (form_error('status_kepegawaian') != "" ? "has-error":"");?>">
        <label class="col-sm-2 control-label">Status Kepegawaian</label>
        <div class="col-sm-10">
          <?php $batch=isset($model->status_kepegawaian)?$model->status_kepegawaian:'default'; 
          $pilih = array(''=> '-- Pilih Data --')+$model->getKepegawaian()
          ?>
          <?php echo form_dropdown('status_kepegawaian', $pilih,$batch, array('class' => 'form-control select2','style' => 'width: 100%' )); ?>
          <span class="help-block"><?php echo form_error('status_kepegawaian'); ?></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Lab</label>
        <div class="col-sm-10">
          <?php $batch=isset($model->kode_lab)?$model->kode_lab:'default'; ?>
          <?php echo form_dropdown('kode_lab', $model->getLab(),$batch, array('class' => 'form-control select2','style' => 'width: 100%' )); ?>
        </div>
      </div>
     <!--  <pre>
        <?php print_r($model->getLab()); ?>
      </pre> -->

    </div>

    <div class="box-footer">
      <button type="submit" name="submit" class="btn btn-primary pull-right"> <?php echo ucfirst($this->uri->segment(2)); ?></button>
    </div>
  </form>
</div>

</div>
</div>

</section>

</div>
