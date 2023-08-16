<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
if (isset($_SESSION['id'])) {
  if ($_SESSION['level'] == 'Administrator') {
    $iden = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users where id_users='$_SESSION[id]'"));
    $nama =  $iden['nama'];
    $level = 'Administrator';
    $foto = 'img/admin.jpg';
  } elseif ($_SESSION['level'] == 'Bendahara') {
    $iden = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users where id_users='$_SESSION[id]'"));
    $nama =  $iden['nama'];
    $level = 'Bendahara';
    $foto = 'img/bendahara.jpg';
  }

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Admin & Bendahara Sekolah</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="css/AdminLTE.css">
    <link rel="stylesheet" href="css/skin.css">
    <script type="text/javascript" src="jQuery/jquery-1.12.3.min.js"></script>
  </head>

  <body class="hold-transition skin sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
        <?php
        if ($_SESSION['level'] == 'Bendahara') {
          include "menu-bndhr.php";
        } else {
          include "menu-admin.php";
        }
        ?>
      </aside>

      <div class="content-wrapper">

        <section class="content">
          <?php
          if ($_GET['view'] == 'home' or $_GET['view'] == '') {
            echo "<div>";
            include "application/home.php";
            echo "</div>";
          } elseif ($_GET['view'] == 'siswa') {
            cek_session_admin();
            echo "<div class='row'>";
            include "application/master_siswa.php";
            echo "</div>";
          } elseif ($_GET['view'] == 'guru') {
            cek_session_admin();
            echo "<div class='row'>";
            include "application/master_guru.php";
            echo "</div>";
          } elseif ($_GET['view'] == 'kelas') {
            cek_session_admin();
            echo "<div class='row'>";
            include "application/master_kelas.php";
            echo "</div>";
          } elseif ($_GET['view'] == 'pembayaran') {
            cek_session_bndhr();
            echo "<div class='row'>";
            include "application/data_pembayaran.php";
            echo "</div>";
          } elseif ($_GET['view'] == 'laporansiswa' || 'laporanguru' || 'laporankelas' || 'laporandatapembayaran') {
            cek_session_bndhr();
            echo "<div class='row'>";
            include "application/laporan.php";
            echo "</div>";
          }
          ?>
        </section>
      </div>
      <footer class="main-footer">
        <?php include "footer.php"; ?>
      </footer>
    </div>
    <script src="jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script src="js/app.js"></script>
    <script>
      $(function() {
        $('#example1').DataTable();
      });
    </script>


  </body>

  </html>

<?php
} else {
  include "login.php";
}
?>