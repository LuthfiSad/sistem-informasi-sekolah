<?php if ($_GET['act'] == '') {
  if (isset($_GET['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id_siswa = '$_GET[hapus]' ");
    if ($hapus) {
      echo "<script>
              alert('Hapus data Suksess!');
              document.location='index.php?view=siswa';
            </script>";
    }
  }
?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Siswa</h3>
          <a class='pull-right btn btn-danger btn-sm' href='index.php?view=siswa&act=tambah'>Tambahkan Data</a>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>nis</th>
                <th>Nama Siswa</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th style='width:300px'>Alamat</th>
                <th style='width:70px'>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM tb_siswa order by id_siswa desc");
              while ($data = mysqli_fetch_array($tampil)) :
              ?>


                <tr>
                  <td><?= $data['nis'] ?></td>
                  <td><?= $data['nama_siswa'] ?></td>
                  <td><?= $data['agama'] ?></td>
                  <td><?= $data['jk'] ?></td>
                  <td><?= $data['tmpt_lahir'] ?>,&nbsp<?= $data['tgl_lahir'] ?></td>
                  <td><?= $data['alamat_siswa'] ?>,&nbsp<?= $data['kels'] ?>,&nbsp<?= $data['kecs'] ?>,&nbsp<?= $data['kota_kabs'] ?>,&nbsp<?= $data['provs'] ?></td>
                  <td>
                    <?php
                    echo
                    "<center><a class='btn btn-success btn-xs bg-black' title='Edit Data' href='?view=siswa&act=edit&id=$data[id_siswa]'><span class='glyphicon glyphicon-edit'></span></a>
                  <a class='btn btn-danger btn-xs bg-black' title='Delete Data' href='?view=siswa&hapus=$data[id_siswa]'><span class='glyphicon glyphicon-remove'></span></a></center>";
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
    $edit = mysqli_query($koneksi, "UPDATE tb_siswa set
                                                nis = '$_POST[nis]',
                                                nama_siswa = '$_POST[nama]',
                                                agama = '$_POST[agama]',
                                                jk = '$_POST[jk]',
                                                tmpt_lahir = '$_POST[tmpl]',
                                                tgl_lahir = '$_POST[tgll]',
                                                alamat_siswa = '$_POST[alamat]',
                                                kels = '$_POST[kel]',
                                                kecs = '$_POST[kec]',
                                                kota_kabs = '$_POST[kotkab]',
                                                provs = '$_POST[prov]'
                                              WHERE id_siswa = '$_GET[id]'
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

    echo "<script>document.location='index.php?view=siswa';</script>";
  }
  $tampil = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa = '$_GET[id]' ");
  $data = mysqli_fetch_array($tampil);
  if ($data) {
    $vnis = $data['nis'];
    $vnama = $data['nama_siswa'];
    $vagama = $data['agama'];
    $vjk = $data['jk'];
    $vtmpl = $data['tmpt_lahir'];
    $vtgll = $data['tgl_lahir'];
    $valamat = $data['alamat_siswa'];
    $vkel = $data['kels'];
    $vkec = $data['kecs'];
    $vkotkab = $data['kota_kabs'];
    $vprov = $data['provs'];
  }
  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Edit Data Siswa</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th width='120px' scope='row'>NIS</th>
                          <td>
                            <select class='form-control' name='nis' required> 
                              <option value='$vnis' selected >$vnis</option>";
  $kode = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[nis]'>$a[nis]</option>";
  }
  echo "
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Nama</th>
                          <td><input type='text' class='form-control' value='$vnama' name='nama' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Agama</th>
                          <td><select class='form-control' name='agama' required>
                                <option value='$vagama''>$vagama</option>
                                <option value='Islam'>Islam</option>
                                <option value='Kristen'>Kristen</option>
                                <option value='Katolik'>Katolik</option>
                                <option value='Hindu'>Hindu</option>
                                <option value='Buddha'>Buddha</option>
                                <option value='Khonghucu'>Khonghucu</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Jenis Kelamin</th>
                          <td>
                            <input type='hidden'name='jk'value='$vjk'>
                            <input type='radio'name='jk'value='LAKI - LAKI'> LAKI - LAKI <br>
                            <input type='radio'name='jk'value='PEREMPUAN'> PEREMPUAN
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Tempat Lahir</th>
                          <td><input type='text' class='form-control' value='$vtmpl' name='tmpl' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Tanggal Lahir</th>
                          <td><input type='date' name='tgll' value='$vtgll' required></td>
                        </tr>
                        <tr>
                          <th scope='row'>Alamat</th>
                          <td><input type='text' class='form-control' value='$valamat' name='alamat' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kelurahan</th>
                          <td><input type='text' class='form-control' value='$vkel' name='kel' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kecamatan</th>
                          <td><input type='text' class='form-control' value='$vkec' name='kec' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kota / Kabupaten</th>
                          <td><input type='text' class='form-control' value='$vkotkab' name='kotkab' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Provinsi</th>
                          <td><input type='text' class='form-control' value='$vprov' name='prov' required> </td>
                        </tr>           
                      </tbody>
                    </table>
                  </div>
                  <div class='box-footer'>
                    <button type='submit' name='bsimpan' class='btn btn-danger'>Edit</button>
                    <a href='index.php?view=siswa'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
} elseif ($_GET['act'] == 'tambah') {
  if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_siswa (nis, nama_siswa, agama, jk, tmpt_lahir, tgl_lahir,
                                                      alamat_siswa, kels, kecs, kota_kabs, provs)
                                          VALUES ('$_POST[nis]', 
                                                  '$_POST[nama]', 
                                                  '$_POST[agama]',
                                                  '$_POST[jk]',
                                                  '$_POST[tmpl]',
                                                  '$_POST[tgll]',
                                                  '$_POST[alamat]',
                                                  '$_POST[kel]',
                                                  '$_POST[kec]',
                                                  '$_POST[kotkab]',
                                                  '$_POST[prov]')
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
    echo "<script>document.location='index.php?view=siswa';</script>";
  }

  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Tambah Data Siswa</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th width='120px' scope='row'>NIS</th>
                          <td>
                            <select class='form-control' name='nis' required> 
                              <option value='' selected >- NIS -</option>";
  $kode = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[nis]'>$a[nis]</option>";
  }
  echo "
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Nama</th>
                          <td><input type='text' class='form-control' name='nama' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Agama</th>
                          <td><select class='form-control' name='agama' required>
                                <option value=''>- Agama -</option>
                                <option value='Islam'>Islam</option>
                                <option value='Kristen'>Kristen</option>
                                <option value='Katolik'>Katolik</option>
                                <option value='Hindu'>Hindu</option>
                                <option value='Buddha'>Buddha</option>
                                <option value='Khonghucu'>Khonghucu</option>
                              </select></td>
                        </tr>
                        <tr>
                          <th scope='row'>Jenis Kelamin</th>
                          <td>
                            <input type='radio'name='jk'value='LAKI - LAKI' required> LAKI - LAKI <br>
                            <input type='radio'name='jk'value='PEREMPUAN' required> PEREMPUAN
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Tempat Lahir</th>
                          <td><input type='text' class='form-control' name='tmpl' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Tanggal Lahir</th>
                          <td><input type='date' name='tgll' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Alamat</th>
                          <td><input type='text' class='form-control' name='alamat'required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kelurahan</th>
                          <td><input type='text' class='form-control' name='kel' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kecamatan</th>
                          <td><input type='text' class='form-control' name='kec' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kota / Kabupaten</th>
                          <td><input type='text' class='form-control' name='kotkab' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Provinsi</th>
                          <td><input type='text' class='form-control' name='prov' required> </td>
                        </tr>           
                      </tbody>
                    </table>
                  </div>
                  <div class='box-footer'>
                    <button type='submit' name='bsimpan' class='btn btn-danger'>Tambahkan</button>
                    <a href='index.php?view=siswa'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
}
?>