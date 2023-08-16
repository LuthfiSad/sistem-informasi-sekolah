<?php if ($_SESSION['level'] == 'Administrator') {  ?>
  <div class="row">
    <a style='color:#000' href='index.php?view=siswa'>
      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-black"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <?php $siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM tb_siswa")); ?>
            <span class="info-box-text">Siswa</span>
            <span class="info-box-number"><?php echo $siswa['total']; ?></span>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="row">
    <a style='color:#000' href='index.php?view=guru'>
      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <?php $guru = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM tb_guru")); ?>
            <span class="info-box-text">Guru</span>
            <span class="info-box-number"><?php echo $guru['total']; ?></span>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="row">
    <a style='color:#000' href='index.php?view=kelas'>
      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-black"><i class="fa fa-graduation-cap"></i></span>
          <div class="info-box-content">
            <?php $forum = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM tb_kelas")); ?>
            <span class="info-box-text">Kelas</span>
            <span class="info-box-number"><?php echo $forum['total']; ?></span>
          </div>
        </div>
      </div>
    </a>
  </div>

<?php } ?>
<div class="row">
  <a style='color:#000' href='index.php?view=pembayaran'>
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <?php $upload = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*) as total FROM tb_pembayaran")); ?>
          <span class="info-box-text">Data Pembayaran</span>
          <span class="info-box-number"><?php echo $upload['total']; ?></span>
        </div>
      </div>
    </div>
  </a>
</div>