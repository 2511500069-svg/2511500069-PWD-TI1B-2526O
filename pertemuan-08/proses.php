<?php
session_start();

$sesnim = $_POST["txtNIM"];
$sesnama = $_POST["txtNamaLengkap"];
$sestempatlahir = $_POST["txtTempatLahir"];
$sestanggallahir = $_POST["txtTanggalLahir"];
$seshobi = $_POST["txtHobi"];
$sespasangan = $_POST["txtPasangan"];
$sespekerjaan = $_POST["txtPekerjaan"];
$sesnamaorangtua = $_POST["txtNamaOrangTua"];
$sesnamakakak = $_POST["txtNamaKakak"];
$sesnamaadik = $_POST["txtNamaAdik"];

$_SESSION["sesnim"] = $sesnim;
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sestempat"] = $sestempatlahir;
$_SESSION["sestanggal"] = $sestanggallahir;
$_SESSION["seshobi"] = $seshobi;
$_SESSION["sespasangan"] = $sespasangan;
$_SESSION["sespekerjaan"] = $sespekerjaan;
$_SESSION["sesortu"] = $sesnamaorangtua;
$_SESSION["seskakak"] = $sesnamakakak;
$_SESSION["sesadik"] = $sesnamaadik;

echo $_SESSION["sesnim"] . $_SESSION["sesnama"] . $_SESSION["sestempat"] . $_SESSION["sestanggal"] .  
$_SESSION["seshobi"] . $_SESSION["sespasangan"] . $_SESSION["sespekerjaan"] . $_SESSION["sesortu"] . $_SESSION["seskakak"] . $_SESSION["sesadik"];
header("location: index.php");
?>
