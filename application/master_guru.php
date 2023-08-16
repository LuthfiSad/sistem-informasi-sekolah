<?php if ($_GET['act'] == '') {
  if (isset($_GET['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tb_guru WHERE id_guru = '$_GET[hapus]' ");
    if ($hapus) {
      echo "<script>
              alert('Hapus data Suksess!');
              document.location='index.php?view=guru';
            </script>";
    }
  }
?>
  <form method="post" action="">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Guru </h3>
          <a class='pull-right btn btn-danger btn-sm' href='index.php?view=guru&act=tambah'>Tambahkan Data</a>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>nip</th>
                <th>Nama Guru</th>
                <th style="width: 100px;">Jenis kelamin</th>
                <th style="width: 150px;">Tempat, Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th style='width: 230px'>Alamat</th>
                <th style='width:70px'>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tampil2 = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas order by id_detail desc");
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
                  <td>
                    <?php
                    echo
                    "<center><a class='btn btn-success btn-xs bg-black' title='Edit Data' href='?view=guru&act=edit&id=$data[id_guru]&class=$data[id_detail]'><span class='glyphicon glyphicon-edit'></span></a>
                  <a class='btn btn-danger btn-xs bg-black' title='Delete Data' href='?view=guru&hapus=$data[id_guru]'><span class='glyphicon glyphicon-remove'></span></a></center> ";

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
    $edit = mysqli_query($koneksi, "UPDATE tb_guru set
                                                nip = '$_POST[nip]',
                                                nama_guru = '$_POST[nama]',
                                                jk = '$_POST[jk]',
                                                tmpt_l = '$_POST[tmpl]',
                                                tgl_l = '$_POST[tgll]',
                                                jabatan = '$_POST[jabatan]',
                                                gol = '$_POST[gol]',
                                                alamat = '$_POST[alamat]',
                                                kel = '$_POST[kel]',
                                                kec = '$_POST[kec]',
                                                kota_kab = '$_POST[kotkab]',
                                                prov = '$_POST[prov]'
                                              WHERE id_guru = '$_GET[id]'
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
    mysqli_query($koneksi, "UPDATE tb_detail_kelas set
                               nip = '$_POST[nip]', kd_kelas = '$_POST[kdkelas]' WHERE id_detail='$_GET[id]'");
    echo "<script>document.location='index.php?view=guru';</script>";
  }
  $tampil2 = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas where kd_kelas");
  $data2 = mysqli_fetch_array($tampil2);
  if ($data2) {
    $vkdkelas = $data2['kd_kelas'];
  }
  $tampil = mysqli_query($koneksi, "SELECT * FROM tb_guru WHERE id_guru = '$_GET[id]' ");
  $data = mysqli_fetch_array($tampil);
  if ($data) {
    $vnip = $data['nip'];
    $vnama = $data['nama_guru'];
    $vjk = $data['jk'];
    $vtmpl = $data['tmpt_l'];
    $vtgll = $data['tgl_l'];
    $vjabatan = $data['jabatan'];
    $vgol = $data['gol'];
    $valamat = $data['alamat'];
    $vkel = $data['kel'];
    $vkec = $data['kec'];
    $vkotkab = $data['kota_kab'];
    $vprov = $data['prov'];
  }
  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Edit Data Guru</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th scope='row'>NIP</th>
                          <td><input type='text' class='form-control' value='$vnip' name='nip' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kode Kelas</th>
                          <td>
                            <select class='form-control' name='kdkelas' required> 
                              <option value='$vkdkelas' selected >$vkdkelas</option>";
  $kode = mysqli_query($koneksi, "SELECT distinct(kd_kelas) FROM tb_detail_kelas");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[kd_kelas]'>$a[kd_kelas]</option>";
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
                          <th scope='row'>Jabatan</th>
                          <td><input type='text' class='form-control' value='$vjabatan' name='jabatan' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Golongan</th>
                          <td>
                            <input type='hidden'name='gol'value='$vgol'>
                            <input type='radio'name='gol'value='PNS'>PNS<br>
                            <input type='radio'name='gol'value='Honorer'> Honorer
                          </td>
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
                    <a href='index.php?view=guru'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
} elseif ($_GET['act'] == 'tambah') {
  if (isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_guru (nip, nama_guru, jk, tmpt_l, tgl_l, jabatan, gol, 
                                                      alamat, kel, kec, kota_kab, prov)
                                          VALUES ('$_POST[nip]', 
                                                  '$_POST[nama]',
                                                  '$_POST[jk]',
                                                  '$_POST[tmpl]',
                                                  '$_POST[tgll]',
                                                  '$_POST[jabatan]',
                                                  '$_POST[gol]',
                                                  '$_POST[alamat]',
                                                  '$_POST[kel]',
                                                  '$_POST[kec]',
                                                  '$_POST[kotkab]',
                                                  '$_POST[prov]')
                                             ");
    $siswa = mysqli_query($koneksi, "SELECT * FROM tb_detail_kelas where nip");
    $hitung = mysqli_num_rows($siswa);
    if ($hitung >= 1) {
      mysqli_query($koneksi, "INSERT INTO tb_detail_kelas(id_detail) select id_guru from tb_guru");
      mysqli_query($koneksi, "INSERT INTO tb_detail_kelas(nip, kd_kelas) select '$_POST[nip]', '$_POST[kdkelas]'");
    } else {
      mysqli_query($koneksi, "UPDATE tb_detail_kelas set
                                 nip = '$_POST[nip]'");
    }
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

    echo "<script>document.location='index.php?view=guru';</script>";
  }

  echo "<div class='col-md-12'>
            <div class='box box-danger'>
              <div class='box-header with-border'>
                <h3 class='box-title'>Tambah Data Guru</h3>
              </div>
              <div class='box-body'>
                <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <div class='col-md-12'>
                    <table class='table table-condensed table-bordered'>
                      <tbody>
                        <tr>
                          <th scope='row'>NIP</th>
                          <td><input type='text' class='form-control' name='nip' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Kode Kelas</th>
                          <td>
                            <select class='form-control' name='kdkelas' required> 
                              <option value='' selected >- Pilih Kode Kelas -</option>";
  $kode = mysqli_query($koneksi, "SELECT distinct(kd_kelas) FROM tb_detail_kelas");
  while ($a = mysqli_fetch_array($kode)) {
    echo "<option value='$a[kd_kelas]'>$a[kd_kelas]</option>";
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
                          <td><input type='date' name='tgll' required></td>
                        </tr>
                        <tr>
                          <th scope='row'>Jabatan</th>
                          <td><input type='text' class='form-control' name='jabatan' required> </td>
                        </tr>
                        <tr>
                          <th scope='row'>Golongan</th>
                          <td>
                            <input type='radio'name='gol'value='PNS' required>PNS<br>
                            <input type='radio'name='gol'value='Honorer' required> Honorer
                          </td>
                        </tr>
                        <tr>
                          <th scope='row'>Alamat</th>
                          <td><input type='text' class='form-control' name='alamat' required> </td>
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
                    <a href='index.php?view=guru'><button type='button' class='btn btn-danger pull-right'>Cancel</button></a>       
                  </div>
                </form>
              </div>
            </div>
          </div>";
}
?>