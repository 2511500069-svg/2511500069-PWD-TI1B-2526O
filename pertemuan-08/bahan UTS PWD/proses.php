<?php
session_start();
$sesNama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;
header("location: index.php");
?>
<?php
session_start();

$nim = $_POST["txtNIM"];
$nama = $_POST["txtNama Lengkap"];
$tempatlahir = $_POST["txtTempat Lahir"];
$tanggallahir = $_POST["txtTanggal Lahir"];
$hobi = $_POST["txtHobi"];
$pasangan = $_POST["txtPasangan"];
$pekerjaan = $_POST["txtPekerjaan"];
$namaorangtua = $_POST["txtNama Orang Tua"];
$namakakak = $_POST["txtNama Kakak"];
$namaadik = $_POST["txtNama Adik"];

$_SESSION["sesnim"] = $sesnim;
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sestempat"] = $sestempat;
$_SESSION["sestanggal"] = $sestanggal;
$_SESSION["seshobi"] = $seshobi;
$_SESSION["sespasangan"] = $sespasangan;
$_SESSION["sespekerjaan"] = $sespekerjaan;
$_SESSION["sesortu"] = $sesortu;
$_SESSION["seskakak"] = $seskakak;
$_SESSION["sesadik"] = $sesadik;

header("location: index.php");
?>
