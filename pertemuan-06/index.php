<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation"> &#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Ini contoh paragraf HTML.</p>
      <?php
       echo "<p>Halo Dunia!</p>";
       echo "<p>Nama Saya Putri S. N. Tampubolon</p>";
    ?>
    </section>

    <?php
     $nim               = "2511500069";
     $nama_lengkap      = "Putri S. N. Tampubolon &#128526";
     $tempat_lahir      = "Laguboti";
     $tanggal_lahir     = "18 Desember 2006";
     $hobi              = "Bernyanyi,menari,dan melukis &#128131";
     $pasangan          = "Belum ada &hearts";
     $pekerjaan         = "Mahasiswa di ISB Atma Luhur &copy";
     $nama_ayah         = "Henry Tampubolon";
     $nama_ibu          = "Nurcahaya Panjaitan";
     $nama_kakak        = "-";
     $nama_adik         = "Rafael Tampubolon dan Cindy Tampubolon";
     ?>
    </section> 
    <section id="about">
      <h2>Tentang Saya</h2>

      <p><strong>NIM:</strong> 2511500069</p>
      <p><strong>Nama Lengkap:</strong> Putri S. N. Tampubolon &#128526;</p>
      <p><strong>Tempat Lahir:</strong> Laguboti</p>
      <p><strong>Tanggal Lahir:</strong> 18 Desember 2006</p>
      <p><strong>Hobi:</strong> Bernyanyi, menari, dan melukis &#128131;</p>
      <p><strong>Pasangan:</strong> Belum ada &hearts;</p>
      <P><strong>Pekerjaan:</strong> Mahasiswa di ISB Atma Luhur &copy;</P>
      <p><strong>Nama Orang Tua:</strong>Bapak Henry Tampubolon dan Ibu Nurcahaya</p>
      <p><strong>Nama Kakak:</strong> - </p>
      <p><strong>Nama Adik:</strong>Rafael Tampubolon dan Cindy Tampubolon</p>
    </section>
    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="" method="GET">
        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukan nama" required autocomplete="name">
        </label>
        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukan email" required autocompleted="email">
        </label>
        <label for="txtPesan"><span>Pesan Anda:</span>
         <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
         <small id="charCount">0/200 karakter</small>
        </label>
        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>
  
    <section id="ipk">
      <?php
$namaMatkul1 = "Algoritma dan Struktur Data";
    $sksMatkul1 = 4;
    $nilaiHadir1 = 90;
    $nilaiTugas1 = 60;
    $nilaiUTS1 = 80;
    $nilaiUAS1 = 70;

    $namaMatkul2 = "Agama";
    $sksMatkul2 = 2;
    $nilaiHadir2 = 70;
    $nilaiTugas2 = 50;
    $nilaiUTS2 = 60;
    $nilaiUAS2 = 80;

    $namaMatkul3 = "Matematika Diskrit";
    $sksMatkul3 = 3;
    $nilaiHadir3 = 80;
    $nilaiTugas3 = 75;
    $nilaiUTS3 = 70;
    $nilaiUAS3 = 85;

    $namaMatkul4 = "Sistem Operasi";
    $sksMatkul4 = 3;
    $nilaiHadir4 = 90;
    $nilaiTugas4 = 80;
    $nilaiUTS4 = 85;
    $nilaiUAS4 = 88;

    $namaMatkul5 = "Pemrograman Web Dasar";
    $sksMatkul5 = 3;
    $nilaiHadir5 = 69;
    $nilaiTugas5 = 80;
    $nilaiUTS5 = 90;
    $nilaiUAS5 = 100;

    // ---------- Fungsi Penentuan Grade dan Mutu ----------
    function hitungGrade($nilaiAkhir, $hadir) {
      if ($hadir < 70) return ['E', 0];
      if ($nilaiAkhir >= 91) return ['A', 4];
      if ($nilaiAkhir >= 81) return ['A-', 3.7];
      if ($nilaiAkhir >= 76) return ['B+', 3.3];
      if ($nilaiAkhir >= 71) return ['B', 3];
      if ($nilaiAkhir >= 66) return ['B-', 2.7];
      if ($nilaiAkhir >= 61) return ['C+', 2.3];
      if ($nilaiAkhir >= 56) return ['C', 2];
      if ($nilaiAkhir >= 51) return ['C-', 1.7];
      if ($nilaiAkhir >= 36) return ['D', 1];
      return ['E', 0];
    }

    // ---------- Perhitungan Masing-masing Mata Kuliah ----------
    $totalBobot = 0;
    $totalSKS = 0;
?>

<h2>Nilai Saya</h2>
<?php
    for ($i = 1; $i <= 5; $i++) {
      $nilaiAkhir = (0.1 * ${"nilaiHadir$i"}) + (0.2 * ${"nilaiTugas$i"}) + (0.3 * ${"nilaiUTS$i"}) + (0.4 * ${"nilaiUAS$i"});
      list($grade, $mutu) = hitungGrade($nilaiAkhir, ${"nilaiHadir$i"});
      $bobot = $mutu * ${"sksMatkul$i"};
      $status = ($grade == "D" || $grade == "E") ? "Gagal" : "Lulus";

      echo "<p><strong>Nama Matakuliah ke-$i:</strong> ${"namaMatkul$i"}</p>";
      echo "<p><strong>SKS:</strong> ${"sksMatkul$i"}</p>";
      echo "<p><strong>Kehadiran:</strong> ${"nilaiHadir$i"}</p>";
      echo "<p><strong>Tugas:</strong> ${"nilaiTugas$i"}</p>";
      echo "<p><strong>UTS:</strong> ${"nilaiUTS$i"}</p>";
      echo "<p><strong>UAS:</strong> ${"nilaiUAS$i"}</p>";
      echo "<p><strong>Nilai Akhir:</strong> " . round($nilaiAkhir, 2) . "</p>";
      echo "<p><strong>Grade:</strong> $grade</p>";
      echo "<p><strong>Angka Mutu:</strong> $mutu</p>";
      echo "<p><strong>Bobot:</strong> $bobot</p>";
      echo "<p><strong>Status:</strong> $status</p>";
      echo "<hr>";

      $totalBobot += $bobot;
      $totalSKS += ${"sksMatkul$i"};
    }

    $IPK = $totalBobot / $totalSKS;

    echo "<p><strong>Total Bobot:</strong> $totalBobot</p>";
    echo "<p><strong>Total SKS:</strong> $totalSKS</p>";
    echo "<p><strong>IPK:</strong> " . round($IPK, 2) . "</p>";
    ?>
  </section>
</section>
  </main>
  <footer>
    <p>&copy; 2025 Putri S. N. Tampubolon [2511500069]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
