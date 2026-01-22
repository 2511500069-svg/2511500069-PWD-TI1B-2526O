<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_pengunjung.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
    $nama            = bersihkan($_POST['nama']            ?? '');
    $usia   = bersihkan($_POST['usia']   ?? '');
    $alamat   = bersihkan($_POST['alamat']   ?? '');
    $telepon  = bersihkan($_POST['telepon']  ?? '');
    

  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

    if ($nama === '')            $errors[] = 'Nama wajib diisi.';
    if ($usia === '')   $errors[] = 'Usia wajib diisi.';
    if ($alamat === '')   $errors[] = 'Alamat wajib diisi.';
    if ($telepon === '')  $errors[] = 'Telepon wajib diisi.';
   
  if (mb_strlen($nama_lengkap) < 3) {
    $errors[] = 'Nama Lengkap minimal 3 karakter.';
  }

  /*
  kondisi di bawah ini hanya dikerjakan jika ada error, 
  simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
  */
  if (!empty($errors)) {
    $_SESSION['old'] = [
    'Nama'            => $nama,
    'Usia'   => $usia,
    'Alamat'   => $ulamat,
    'Telepon'  => $telepon,
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_pengunjung
                                SET Nama = ?, Usia= ?, Alamat = ?, Telepon = ?
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssssssssi", $nama, $usia, $alamat, $telepon);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read_pengunjung.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
    'Nama'            => $nama,
    'Usia'   => $usia,
    'Alamat'   => $ulamat,
    'Telepon'  => $telepon,
    
  ];

    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_pengunjung.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit_pengunjung.php?cid='. (int)$cid);