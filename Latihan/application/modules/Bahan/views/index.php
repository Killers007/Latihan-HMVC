
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
            <div class="btn-group pull-right">
              <a class="btn btn-success btn-sm" href="<?php echo base_url('bahan/to_excel') ?>" target="_blank"><i class="fa fa-file-excel-o"></i>  To Excel</a>&nbsp;
              <a class="btn btn-primary btn-sm" href="<?php echo base_url('bahan/to_word') ?>"><i class="fa  fa-file-word-o"></i>  To Word</a>
            </div>
          </div>
          <div class="box-body table-responsive">
            <?php echo $output; ?>
          </div>
        </div>
      </div>
    </div>

  </section>

</div>