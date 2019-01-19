<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <?php 
  // echo in_array('alat', $this->acl->get_menu());
  // echo "<pre>";
  // print_r($this->acl->get_menu());
  // echo "</pre>"; 
  $menu=$this->acl->get_menu();
  ?>
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets') ?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('login')->role ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php if (in_array('kegiatan', $menu)|| in_array('rkegiatan', $menu)): ?>
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pencil"></i> <span>Data Kegiatan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if (in_array('kegiatan', $menu)): ?>
            <li><a href="<?php echo base_url('kegiatan'); ?>"><i class="fa fa-circle-o"></i> Kegiatan</a></li>
          <?php endif ?>
          <?php if (in_array('rkegiatan', $menu)): ?>
            <li><a href="<?php echo base_url('jenis_kegiatan'); ?>"><i class="fa fa-circle-o"></i> Jenis Kegiatan</a></li>
          <?php endif ?>
        </ul>
      </li>
    <?php endif ?>

    <?php if (in_array('masalah', $menu)): ?>
      <li><a href="<?php echo base_url('permasalahan'); ?>"><i class="fa fa-warning"></i> <span>Permasalahan</span></a></li>
    <?php endif ?>
    <?php if (in_array('bahan', $menu)): ?>
      <li><a href="<?php echo base_url('bahan'); ?>"><i class="fa fa-inbox"></i> <span>Bahan</span></a></li>
    <?php endif ?>
    <?php if (in_array('kondisi', $menu)): ?>
      <li><a href="<?php echo base_url('kondisi'); ?>"><i class="fa fa-houzz"></i> <span>Kondisi</span></a></li>
    <?php endif ?>
    <?php if (in_array('lab', $menu)): ?>
      <li><a href="<?php echo base_url('lab'); ?>"><i class="fa fa-code-fork"></i> <span>Lab</span></a></li>
    <?php endif ?>
    <?php if (in_array('pengelola', $menu)): ?>
      <li><a href="<?php echo base_url('pengelola'); ?>"><i class="fa fa-users"></i> <span>Pengelola</span></a></li>
    <?php endif ?>
    <?php if (in_array('praktikum', $menu)): ?>
      <li><a href="<?php echo base_url('praktikum'); ?>"><i class="fa fa-cogs"></i> <span>Praktikum</span></a></li>
    <?php endif ?>
    <?php if (in_array('saran', $menu)): ?>
      <li><a href="<?php echo base_url('saran'); ?>"><i class="fa fa-envelope"></i> <span>Saran</span></a></li>
    <?php endif ?>
    <?php if (in_array('satuan', $menu)): ?>
      <li><a href="<?php echo base_url('satuan'); ?>"><i class="fa fa-code"></i> <span>Satuan</span></a></li>
    <?php endif ?>
    <?php if (in_array('semester', $menu)): ?>
      <li><a href="<?php echo base_url('semester'); ?>"><i class="fa fa-magic"></i> <span>Semester</span></a></li>
    <?php endif ?>
    <?php if (in_array('status', $menu)): ?>
      <li><a href="<?php echo base_url('status'); ?>"><i class="fa fa-line-chart"></i> <span>Status</span></a></li>
    <?php endif ?>
    <?php if (in_array('ualat', $menu)): ?>
      <li><a href="<?php echo base_url('usulan_alat'); ?>"><i class="fa fa-tag"></i> <span>Usulan Alat</span></a></li>
    <?php endif ?>
    <?php if (in_array('ubahan', $menu)): ?>
      <li><a href="<?php echo base_url('usulan_bahan'); ?>"><i class="fa fa-archive"></i> <span>Usulan Bahan</span></a></li>
    <?php endif ?>

    <?php if (in_array('hak_akses', $menu) || in_array('user', $menu)): ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Authorize User</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <?php if (in_array('hak_akses', $menu)): ?>
          <li><a href="<?php echo base_url('hak_akses'); ?>"><i class="fa fa-circle-o"></i> Hak Akses</a></li>
        <?php endif ?>
        <?php if (in_array('user', $menu)): ?>
          <li><a href="<?php echo base_url('user'); ?>"><i class="fa fa-circle-o"></i> Users</a></li>
        <?php endif ?>
         <?php if (in_array('modul', $menu)): ?>
          <li><a href="<?php echo base_url('modul'); ?>"><i class="fa fa-circle-o"></i> Modul</a></li>
        <?php endif ?>
      </ul>
    </li>
  <?php endif ?>

</ul>
</section>
<!-- /.sidebar -->
</aside>