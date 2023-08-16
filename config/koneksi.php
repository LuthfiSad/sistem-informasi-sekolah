<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "pwpb";

$koneksi = mysqli_connect($server,$username,$password,$database); 
mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_errno()){
	echo "<h1>Koneksi database gagal : " . mysqli_connect_error() . "</h1>";
	exit();
}

function anti_injection($data){
  global $koneksi;
  $filter = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;  
}

function rupiah($angka){
    $hasil_rupiah = "<b>Rp. </b>" . number_format($angka, 2, ",", ".");
    return $hasil_rupiah;
  	}

function cek_session_admin(){
	$level = $_SESSION['level'];
	if ($level != 'Administrator'){
		echo "<script>document.location='index.php';</script>";
	}
}

function cek_session_bndhr(){
	$level = $_SESSION['level'];
	if ($level != 'Bendahara' AND $level != 'Administrator'){
		echo "<script>document.location='index.php';</script>";
	}
}
