<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $nama; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <ul class="sidebar-menu">
    <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #8B0000'>MENU <?php echo $level; ?></li>
    <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

    <li class="treeview">
      <a href="#"><i class="fa fa-th"></i> <span>Data Master</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=siswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
        <li><a href="index.php?view=guru"><i class="fa fa-circle-o"></i> Data Guru</a></li>
        <li><a href="index.php?view=kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
        <li><a href="index.php?view=pembayaran"><i class="fa fa-circle-o"></i> Data Pembayaran</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#"><i class="fa fa-th"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="index.php?view=laporansiswa"><i class="fa fa-circle-o"></i> Laporan Siswa</a></li>
        <li><a href="index.php?view=laporanguru"><i class="fa fa-circle-o"></i> Laporan Guru</a></li>
        <li><a href="index.php?view=laporankelas"><i class="fa fa-circle-o"></i> Laporan Kelas</a></li>
      </ul>
    </li>
  </ul>
</section>