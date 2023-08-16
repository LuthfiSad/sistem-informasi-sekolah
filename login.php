<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/AdminLTE.css">
</head>

<body style="background-color: #222d32; color: white;" class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Perogram Web</b>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan Login Pada Form dibawah ini</p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name='a' placeholder="Username" autocomplete="off" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name='b' placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>
          <div class="col-xs-4">
            <button name='login' type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>

<?php

if (isset($_POST['login'])) {
  $passlain = anti_injection($_POST['b']);
  $data = md5(anti_injection($_POST['b']));
  $pass = hash("sha512", $data);
  $admin = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . anti_injection($_POST['a']) . "' AND password='$pass'");
  $bndhr = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . anti_injection($_POST['a']) . "' AND password='$passlain'");

  $hitungadmin = mysqli_num_rows($admin);
  $hitungbndhr = mysqli_num_rows($bndhr);
  if ($hitungadmin >= 1) {
    $r = mysqli_fetch_array($admin);
    $_SESSION['id']     = $r['id_users'];
    $_SESSION['namalengkap']  = $r['nama'];
    $_SESSION['level']    = $r['hak_akses'];
    echo "<script>document.location='index.php';</script>";
  } elseif ($hitungbndhr >= 1) {
    $r = mysqli_fetch_array($bndhr);
    $_SESSION['id']     = $r['id_users'];
    $_SESSION['namalengkap']  = $r['nama'];
    $_SESSION['level']    = $r['hak_akses'];
    echo "<script>document.location='index.php';</script>";
  } else {
    echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
                                  window.location=('index.php?view=login')</script>";
  }
}
?>