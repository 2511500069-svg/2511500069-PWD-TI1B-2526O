<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/*
|--------------------------------------------------------------------------
| PROSES BIODATA MAHASISWA
|--------------------------------------------------------------------------
*/
if (isset($_POST['txtNim'])) {

  // Ambil & sanitasi data
  $nim            = bersihkan($_POST['txtNim'] ?? '');
  $nama_lengkap   = bersihkan($_POST['txtNamaLengkap'] ?? '');
  $tempat_lahir   = bersihkan($_POST['txtTempatLahir'] ?? '');
  $tanggal_lahir  = bersihkan($_POST['txtTanggalLahir'] ?? '');
  $hobi           = bersihkan($_POST['txtHobi'] ?? '');
  $pasangan       = bersihkan($_POST['txtPasangan'] ?? '');
  $pekerjaan      = bersihkan($_POST['txtPekerjaan'] ?? '');
  $nama_orang_tua = bersihkan($_POST['txtNamaOrangTUA'] ?? '');
  $nama_kakak     = bersihkan($_POST['txtNamaKakak'] ?? '');
  $nama_adik      = bersihkan($_POST['txtNamaAdik'] ?? '');

  // Validasi
  $errors = [];

  if ($nim === '')            $errors[] = 'NIM wajib diisi.';
  if ($nama_lengkap === '')   $errors[] = 'Nama lengkap wajib diisi.';
  if ($tempat_lahir === '')   $errors[] = 'Tempat lahir wajib diisi.';
  if ($tanggal_lahir === '')  $errors[] = 'Tanggal lahir wajib diisi.';
  if ($hobi === '')           $errors[] = 'Hobi wajib diisi.';
  if ($pasangan === '')       $errors[] = 'Pasangan wajib diisi.';
  if ($pekerjaan === '')      $errors[] = 'Pekerjaan wajib diisi.';
  if ($nama_orang_tua === '') $errors[] = 'Nama orang tua wajib diisi.';
  if ($nama_kakak === '')     $errors[] = 'Nama kakak wajib diisi.';
  if ($nama_adik === '')      $errors[] = 'Nama adik wajib diisi.';

  if (!empty($errors)) {
    $_SESSION['flash_error_bio'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
  }

  // INSERT biodata
  $sql = "INSERT INTO tbl_putri
          (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adik)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $nim,
    $nama_lengkap,
    $tempat_lahir,
    $tanggal_lahir,
    $hobi,
    $pasangan,
    $pekerjaan,
    $nama_orang_tua,
    $nama_kakak,
    $nama_adik
  );

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses_bio'] = 'Biodata berhasil disimpan.';
  } else {
    $_SESSION['flash_error_bio'] = 'Biodata gagal disimpan.';
  }

  // Simpan ke session untuk ditampilkan
  $_SESSION['biodata'] = [
    "nim" => $nim,
    "nama" => $nama_lengkap,
    "tempat" => $tempat_lahir,
    "tanggal" => $tanggal_lahir,
    "hobi" => $hobi,
    "pasangan" => $pasangan,
    "pekerjaan" => $pekerjaan,
    "ortu" => $nama_orang_tua,
    "kakak" => $nama_kakak,
    "adik" => $nama_adik,
  ];

  redirect_ke('index.php#about');
}


/*
|--------------------------------------------------------------------------
| PROSES CONTACT FORM
|--------------------------------------------------------------------------
*/
if (isset($_POST['txtNama'])) {

  $nama    = bersihkan($_POST['txtNama'] ?? '');
  $email   = bersihkan($_POST['txtEmail'] ?? '');
  $pesan   = bersihkan($_POST['txtPesan'] ?? '');
  $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

  $errors = [];

  if ($nama === '') $errors[] = 'Nama wajib diisi.';
  if ($email === '') $errors[] = 'Email wajib diisi.';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email tidak valid.';
  if ($pesan === '') $errors[] = 'Pesan wajib diisi.';
  if ($captcha !== "5") $errors[] = 'Captcha salah.';

  if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#contact');
  }

  $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Pesan berhasil dikirim.';
  } else {
    $_SESSION['flash_error'] = 'Pesan gagal dikirim.';
  }

  redirect_ke('index.php#contact');
} 