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
        <a class='btn btn-success pull-right mb-3' href="<?php echo base_url('latihan/tambah_data'); ?>">Tambah Data</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Hak Akses</h3>
          </div>
          <!-- /.box-header -->
  
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <?php foreach ($fakultas->field_data() as $value): ?>
                    <th><?php echo str_replace('_', ' ', strtoupper($value->name)); ?></th>
                  <?php endforeach ?>
                  <th>Action</th>
                </tr>
               
              </thead>
              <tbody>
                <?php foreach ($fakultas->result() as $value): ?>
                 <tr>
                  <td><?php echo $value->kode_fakultas ?></td>
                  <td><?php echo $value->fakultas ?></td>
                  <td>
                    <a class="btn btn-danger" href="<?php echo base_url('latihan/hapus_fakultas/'.$value->kode_fakultas); ?>"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-primary" href="<?php echo base_url('latihan/update_fakultas/'.$value->kode_fakultas); ?>"><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>

            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>

</section>

</div>