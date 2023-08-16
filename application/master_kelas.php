<?php if ($_GET['act'] == '') {
  if (isset($_GET['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id_kelas = '$_GET[hapus]' ");
    if ($hapus) {
      echo "<script>
              alert('Hapus data Suksess!');
              document.location='index.php?view=kelas';
            </script>";
    }
  }


?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kelas </h3>
          <a class='pull-right btn btn-danger btn-sm' href='index.php?view=kelas&act=tambah'>Tambahkan Data</a>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kelas</th>
                <th>Kode Kelas</th>
                <th>Jumlah Siswa</th>
                <th style='width:70px'>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM tb_kelas order by id_kelas desc");
              while ($data = mysqli_fetch_array($tampil)) :
              ?>


                <tr>
                  <td><?= $data['kelas'] ?></td>
                  <td><?= $data['kd_kelas'] ?></td>
                  <td><?= $data['jml_murid'] ?></td>
                  <td>
                    <?php
                    echo
                    "<center><a class='btn btn-success btn-xs bg-black' title='Edit Data' href='?view=kelas&act=edit&id=$data[id_kelas]'><span class='glyphicon glyphicon-edit'></span></a>
                  <a class='btn btn-danger btn-xs bg-black' title='Delete Data' href='?view=kelas&hapus=$data[id_kelas]'><span class='glyphicon glyphicon-remove'></span></a></center>";
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
    $edit = mysqli_query($koneksi, "UPDATE tb_kelas set
                                                kelas = '$_POST[ekelas]',
                                                kd_kelas = '$_POST[kdkelas]',
                                                jml_murid = '$_POST[jmlmurid]'
                                              WHERE id_kelas = '$_GET[id]'
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

    echo "<script>document.location='index.php?view=kelas';</script>";
  }
  $tampil = mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id_kelas = '$_GET[id]' ");
  $data = mysqli_fetch_array($tampil);
  if ($data) {
    $vkel = $data['kelas'];
    $vkdkel = $data['kd_kelas'];
    $vjmlmur = $data['jml_murid'];
  }
  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Edit Data Kelas</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th width='120px' scope='row'>Kelas</th>
                          <td><input type='text' class='form-control' name='ekelas' value='$vkel' required></td>
                        </tr>
                        <tr>
                          <th scope='row'>Kode Kelas</th>
                          <td>
                            <select class='form-control' name='kdkelas' required> 
                              <option value='$vkdkel' selected>$vkdkel</option>";
  $kode = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[kd_kelas]'>$a[kd_kelas]</option>";
  }
  echo "
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Jumlah Murid</th>
                          <td><input type='text' class='form-control' name='jmlmurid' value='$vjmlmur' required> </td>
                        </tr>           
                      </tbody>
                    </table>
                  </div>
                  <div class='box-footer'>
                    <button type='submit' name='bsimpan' class='btn btn-danger'>Edit</button>
                    <a href='index.php?view=kelas'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
} elseif ($_GET['act'] == 'tambah') {
  if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_kelas (kelas, kd_kelas, jml_murid)
                                          VALUES ('$_POST[ekelas]', 
                                                  '$_POST[kdkelas]', 
                                                  '$_POST[jmlmurid]')
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
    echo "<script>document.location='index.php?view=kelas';</script>";
  }

  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Tambah Data Kelas</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th width='120px' scope='row'>Kelas</th>
                          <td><input type='text' class='form-control' name='ekelas' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kode Kelas</th>
                          <td>
                            <select class='form-control' name='kdkelas' required> 
                              <option value='' selected >- Pilih Kode Kelas -</option>";
  $kode = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[kd_kelas]'>$a[kd_kelas]</option>";
  }
  echo "
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Jumlah Murid</th>
                          <td><input type='text' class='form-control' name='jmlmurid' required> </td>
                        </tr>           
                      </tbody>
                    </table>
                  </div>
                  <div class='box-footer'>
                    <button type='submit' name='bsimpan' class='btn btn-danger'>Tambahkan</button>
                    <a href='index.php?view=kelas'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
}
?>