<?php
session_start();

$sesnamab = "";
if (isset($_SESSION["nama"])):
  $sesnamab = $_SESSION["nama"];
endif;

$sesemail = "";
if (isset($_SESSION["email"])):
  $sesemail = $_SESSION["email"];
endif;

$sespesan = "";
if (isset($_SESSION["pesan"])):
  $sespesan = $_SESSION["pesan"];
endif;

$sesnim = "";
if (isset($_SESSION["sesnim"])):
  $sesnim = $_SESSION["sesnim"];
endif;

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sestempatlahir = "";
if (isset($_SESSION["sestempat"])):
  $sestempatlahir = $_SESSION["sestempat"];
endif;

$sestanggallahir = "";
if (isset($_SESSION["sestanggal"])):
  $sestanggallahir = $_SESSION["sestanggal"];
endif;

$seshobi = "";
if (isset($_SESSION["seshobi"])):
  $seshobi = $_SESSION["seshobi"];
endif;

$sespasangan = "";
if (isset($_SESSION["sespasangan"])):
  $sespasangan = $_SESSION["sespasangan"];
endif;

$sespekerjaan = "";
if (isset($_SESSION["sespekerjaan"])):
  $sespekerjaan = $_SESSION["sespekerjaan"];
endif;

$sesnamaorangtua = "";
if (isset($_SESSION["sesortu"])):
  $sesnamaorangtua = $_SESSION["sesortu"];
endif;

$sesnamakakak= "";
if (isset($_SESSION["seskakak"])):
  $sesnamakakak = $_SESSION["seskakak"];
endif;

$sesnamaadik= "";
if (isset($_SESSION["sesadik"])):
  $sesnamaadik = $_SESSION["sesadik"];
endif;

?>


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
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
        <li><a href="#student-id">Entry Data Mahasiswa</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="student-id">
    <h2>Entry Data Mahasiswa</h2>
      <form action="proses.php" method="POST">

        <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="NIM">
        </label>

        <label for="txtNamaLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNamaLengkap" name="txtNamaLengkap" placeholder="Masukkan Nama Lengkap" required autocomplete="name">
        </label>

        <label for="txtTempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLahir" name="txtTempatLahir" placeholder="Masukkan Tempat Lahir" required autocomplete="city">
        </label>

        <label for="txtTanggalLahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTanggalLahir" name="txtTanggalLahir" placeholder="Masukkan Tanggal Lahir" required autocomplete="day">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi Kamu" required autocomplete="off">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Nama Pasangan (jika ada)" required autocomplete="off">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" required autocomplete="off">
        </label>

        <label for="txtNamaOrangTua"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNamaOrangTua" name="txtNamaOrangTua" placeholder="Masukkan Nama Orang Tua/Wali" required autocomplete="name">
        </label>

        <label for="txtNamaKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNamaKakak" name="txtNamaKakak" placeholder="Masukkan Nama Kakak" required autocomplete="off">
        </label>

        <label for="txtNamaAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNamaAdik" name="txtNamaAdik" placeholder="Masukkan Nama Adik" required autocomplete="off">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    </section>
    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
      $tempat = "Jebus";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        echo $sesnim;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        echo $sesnama;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> <?php echo $sestempatlahir; ?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $sestanggallahir; ?></p>
      <p><strong>Hobi:</strong> <?php echo $seshobi; ?></p>
      <p><strong>Pasangan:</strong> <?php echo $sespasangan; ?> &hearts;</p>
      <p><strong>Pekerjaan:</strong> <?php echo $sespekerjaan; ?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $sesnamaorangtua; ?></p>
      <p><strong>Nama Kakak:</strong> <?php echo $sesnamakakak; ?></p>
      <p><strong>Nama Adik:</strong> <?php echo $sesnamaadik; ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses2.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnamab ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>