
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

    <div class="row">
      <div class="col-md-12 ">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Grocery CRUD</h3>
          </div>
          <div class="box-body table-responsive">
            <?php echo $output; ?>
          </div>
        </div>
      </div>
    </div>

  </section>

</div>