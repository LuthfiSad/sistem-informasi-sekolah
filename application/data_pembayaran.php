<?php if ($_GET['act'] == '') {
  if (isset($_GET['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tb_pembayaran WHERE id_pembayaran = '$_GET[hapus]' ");
    if ($hapus) {
      echo "<script>
              alert('Hapus data Suksess!');
              document.location='index.php?pembayaran=guru';
            </script>";
    }
  }
?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Pembayaran </h3>
          <a class='pull-right btn btn-danger btn-sm' href='index.php?view=pembayaran&act=tambah'>Tambahkan Data</a>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Pembayaran</th>
                <th>NIS</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal Bayar</th>
                <th>Perihal</th>
                <th>Keterangan</th>
                <th style='width:70px'>Action</th>
              </tr>
            </thead>
            <tbody>
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
                  <td>
                    <?php
                    echo
                    "<center><a class='btn btn-success btn-xs bg-black' title='Edit Data' href='?view=pembayaran&act=edit&id=$data[id_pembayaran]'><span class='glyphicon glyphicon-edit'></span></a>
                  <a class='btn btn-danger btn-xs bg-black' title='Delete Data' href='?view=pembayaran&hapus=$data[id_pembayaran]'><span class='glyphicon glyphicon-remove'></span></a></center> ";
                    ?>
                  </td>
                </tr>

              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>


<?php
} elseif ($_GET['act'] == 'edit') {
  if (isset($_POST['bsimpan'])) {
    $edit = mysqli_query($koneksi, "UPDATE tb_pembayaran set
                                                kd_bayar = '$_POST[kdbayar]',
                                                nis = '$_POST[nis]',
                                                jml_bayar = '$_POST[jml]',
                                                tgl_bayar = '$_POST[tgl]',
                                                perihal = '$_POST[perihal]',
                                                ket = '$_POST[ket]'
                                              WHERE id_pembayaran = '$_GET[id]'
                                              ");
    if ($edit) //jika edit sukses
    {
      echo "<script>
                                    alert('Edit data suksess!');
                                     </script>";
    } else {
      echo "<script>
                                    alert('Edit data GAGAL!!');
                                     </script>";
    }

    echo "<script>document.location='index.php?view=pembayaran';</script>";
  }
  $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$_GET[id]' ");
  $data = mysqli_fetch_array($tampil);
  if ($data) {
    $vkdbayar = $data['kd_bayar'];
    $vnis = $data['nis'];
    $vjml = $data['jml_bayar'];
    $vtgl = $data['tgl_bayar'];
    $vperihal = $data['perihal'];
    $vket = $data['ket'];
  }
  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Edit Data Pembayaran</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th scope='row'>Kode Pembayaran</th>
                          <td><input type='text' class='form-control' value='$vkdbayar' name='kdbayar' required> </td>
                        </tr>
                        <tr>
                          <th width='120px' scope='row'>NIS</th>
                          <td>
                            <select class='form-control' name='nis' required> 
                              <option value='$vnis' selected >$vnis</option>";
  $kode = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[nis]'>$a[nis]</option>";
  }
  echo "
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Jumlah Bayar</th>
                          <td><input type='text' class='form-control' value='$vjml' name='jml' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Tanggal Bayar</th>
                          <td><input type='date' name='tgl' value='$vtgl' required></td>
                        </tr>
                        <tr>
                          <th scope='row'>Perihal</th>
                          <td><input type='text' class='form-control' value='$vperihal' name='perihal' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Keterangan</th>
                          <td><input type='text' class='form-control' value='$vket' name='ket' required> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class='box-footer'>
                    <button type='submit' name='bsimpan' class='btn btn-danger'>Edit</button>
                    <a href='index.php?view=pembayaran'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
} elseif ($_GET['act'] == 'tambah') {
  if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_pembayaran (kd_bayar, nis, jml_bayar, tgl_bayar, perihal, ket)
                                          VALUES ('$_POST[kdbayar]', 
                                                  '$_POST[nis]',
                                                  '$_POST[jml]',
                                                  '$_POST[tgl]',
                                                  '$_POST[perihal]',
                                                  '$_POST[ket]')
                                             ");
    if ($simpan) //jika simpan sukses
    {
      echo "<script>
                                                  alert('Simpan data suksess!');
                                                   </script>";
    } else {
      echo "<script>
                                                  alert('Simpan data GAGAL!!');
                                                   </script>";
    }
    echo "<script>document.location='index.php?view=pembayaran';</script>";
  }

  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Tambah Data Pembayaran</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th scope='row'>Kode Pembayaran</th>
                          <td><input type='text' class='form-control' name='kdbayar' required> </td>
                        </tr>
                        <tr>
                          <th width='120px' scope='row'>NIS</th>
                          <td>
                            <select class='form-control' name='nis' required> 
                              <option value='' selected >- NIS -</option>";
  $kode = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[nis]'>$a[nis]</option>";
  }
  echo "
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Jumlah Bayar</th>
                          <td><input type='text' class='form-control' name='jml' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Tanggal Bayar</th>
                          <td><input type='date' name='tgl' required></td>
                        </tr>
                        <tr>
                          <th scope='row'>Perihal</th>
                          <td><input type='text' class='form-control' name='perihal' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Keterangan</th>
                          <td><input type='text' class='form-control' name='ket' required> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class='box-footer'>
                    <button type='submit' name='bsimpan' class='btn btn-danger'>Tambahkan</button>
                    <a href='index.php?view=pembayaran'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
}
?>