
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
          </div>
          <div class="box-body table-responsive">
            <?php echo $output; ?>
          </div>
        </div>
      </div>
    </div>

  </section>

</div>