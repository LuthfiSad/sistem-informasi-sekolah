<?php
if ($_GET['view'] == 'laporansiswa') { ?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="center">
          <h3>
            <center>Semua Data Siswa</center>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>nis</th>
              <th>Nama Siswa</th>
              <th>Agama</th>
              <th>Jenis Kelamin</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Alamat</th>

              <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM tb_siswa order by id_siswa desc");
              while ($data = mysqli_fetch_array($tampil)) :
              ?>


            <tr>
              <td><?= $data['nis'] ?></td>
              <td><?= $data['nama_siswa'] ?></td>
              <td><?= $data['agama'] ?></td>
              <td><?= $data['jk'] ?></td>
              <td><?= $data['tmpt_lahir'] ?>, <?= $data['tgl_lahir'] ?></td>
              <td><?= $data['alamat_siswa'] ?>,&nbsp<?= $data['kels'] ?>,&nbsp<?= $data['kecs'] ?>,&nbsp<?= $data['kota_kabs'] ?>,&nbsp<?= $data['provs'] ?></td>
            </tr>

          <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </form>
  <script>
    window.print()
  </script>
<?php
} elseif ($_GET['view'] == 'laporanguru') { ?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3>
            <center>Semua Data Guru</center>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>nip</th>
              <th>Nama Guru</th>
              <th>Jenis Kelamin</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Jabatan</th>
              <th>Gol</th>
              <th>Alamat</th>
            </tr>

            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_guru order by id_guru desc");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>


              <tr>
                <td><?= $data['nip'] ?></td>
                <td><?= $data['nama_guru'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['tmpt_l'] ?>, <?= $data['tgl_l'] ?></td>
                <td><?= $data['jabatan'] ?></td>
                <td><?= $data['gol'] ?></td>
                <td><?= $data['alamat'] ?>,&nbsp<?= $data['kel'] ?>,&nbsp<?= $data['kec'] ?>,&nbsp<?= $data['kota_kab'] ?>,&nbsp<?= $data['prov'] ?></td>
              </tr>

            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </form>
  <script>
    window.print()
  </script>
<?php
} elseif ($_GET['view'] == 'laporankelas') { ?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3>
            <center>Semua Data Kelas</center>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>Kelas</th>
              <th>Kode Kelas</th>
              <th>Jumlah Siswa</th>
            </tr>

            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_kelas order by id_kelas desc");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>


              <tr>
                <td><?= $data['kelas'] ?></td>
                <td><?= $data['kd_kelas'] ?></td>
                <td><?= $data['jml_murid'] ?></td>
              </tr>

            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </form>
  <script>
    window.print()
  </script>
<?php
} elseif ($_GET['view'] == 'laporandatapembayaran') { ?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3>
            <center>Semua Data Pembayaran</center>
          </h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>Kode Pembayaran</th>
              <th>NIS</th>
              <th>Jumlah Bayar</th>
              <th>Tanggal Bayar</th>
              <th>Perihal</th>
              <th>Keterangan</th>
            </tr>

            <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran order by id_pembayaran desc");
            while ($data = mysqli_fetch_array($tampil)) :
            ?>


              <tr>
                <td><?= $data['kd_bayar'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= rupiah($data['jml_bayar']) ?></td>
                <td><?= $data['tgl_bayar'] ?></td>
                <td><?= $data['perihal'] ?></td>
                <td><?= $data['ket'] ?></td>
              </tr>

            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </form>
  <script>
    window.print()
  </script>
<?php }  ?>