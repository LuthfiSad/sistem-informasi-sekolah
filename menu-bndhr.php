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
    <li><a href="index.php?view=pembayaran"><i class="fa fa-book"></i> <span>Data Pembayaran</span></a></li>
    <li><a href="index.php?view=laporandatapembayaran"><i class="fa fa-book"></i> <span>Laporan</span></a></li>
  </ul>
</section>