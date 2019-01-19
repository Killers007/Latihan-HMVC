
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
      <div class="col-md-12">
       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Fakultas</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php //echo print_r($data->result()); ?>
        <?php echo form_open(base_url('latihan/update_fakultas')); ?>
          <div class="box-body">
            <div class="form-group">
              <label>Kode Fakultas</label>
              <?php echo form_error('kode') ?>
              <input type="text" class="form-control" readonly value="<?php echo $data->result()[0]->kode_fakultas ?>" name="kode" placeholder="Enter Kode Fakultas">
              <label>Fakultas</label>
              <?php echo form_error('fakultas') ?>
              <input type="text" class="form-control" value="<?php echo $data->result()[0]->fakultas ?>" name="fakultas" placeholder="Enter Fakultas">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>

</div>
