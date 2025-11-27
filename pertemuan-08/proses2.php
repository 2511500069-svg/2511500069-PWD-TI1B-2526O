<?php
session_start();

$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$sesnama  = $_POST["txtNama"];

$_SESSION["email"] = $sesemail;
$_SESSION["pesan"] = $sespesan;
$_SESSION["nama"]  = $sesnama;

echo $_SESSION["email"] . $_SESSION["pesan"] . $_SESSION["nama"];

header("location: index.php");
?>
