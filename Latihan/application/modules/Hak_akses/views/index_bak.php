
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
             <b>How to use: <?php echo $keys ?></b>

             <form action="<?php echo base_url('hak_akses/simpan') ?>"  method="post">
               <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th style="width: 40px">1</th>
                    <th>Modul</th>
                    <th>Action</th>
                  </tr>
                  <?php foreach ($data[$keys] as $keyss=>$values): ?>
                    <tr>
                      <td><?php echo $keys ?></td>
                      <td>
                        <?php echo $keyss ?>
                      </td>
                      <td>
                        <?php foreach ($data[$keys][$keyss] as $keysss => $valuess): ?>
                          <input type="checkbox" <?php if ($valuess=='BACA'): ?> checked <?php endif ?> name="" value="BACA"> Baca
                          <input type="checkbox" name="" value="TULIS"> Tulis
                          <input type="checkbox" name="" value="HAPUS"> Hapus
                          <input type="checkbox" name="" value="EDIT"> Edit
                        <?php endforeach ?>
                       
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
              <button type="submit" class="btn btn-success"><i class="fa fa-send"> Simpan</i></button>
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