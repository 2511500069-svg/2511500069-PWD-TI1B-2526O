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
$tempat = $_POST["txtTempat Lahir"];
$tanggal = $_POST["txtTanggal Lahir"];
$hobi = $_POST["txtHobi"];
$pasangan = $_POST["txtPasangan"];
$pekerjaan = $_POST["txtPekerjaan"];
$ortu = $_POST["txtNama Orang Tua"];
$kakak = $_POST["txtNama Kakak"];
$adik = $_POST["txtNama Adik"];

$_SESSION["sesnim"] = $nim;
$_SESSION["sesnama"] = $nama;
$_SESSION["sestempat"] = $tempat;
$_SESSION["sestanggal"] = $tanggal;
$_SESSION["seshobi"] = $hobi;
$_SESSION["sespasangan"] = $pasangan;
$_SESSION["sespekerjaan"] = $pekerjaan;
$_SESSION["sesortu"] = $ortu;
$_SESSION["seskakak"] = $kakak;
$_SESSION["sesadik"] = $adik;

header("location: index.php");();
?>
