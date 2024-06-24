<?php
session_start();
include 'config/db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Buat Akun</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="./styles/halaman-buat-akun.css"/>
</head>
<body>
<div class="halaman-buat-akun-6Mo">
  <div class="auto-group-nfmu-vbj">
    <div class="left-QQR">
      <div class="logo-6HF">
        <span class="logo-6HF-sub-0">Perpus</span>
        <span class="logo-6HF-sub-1">A</span>
        <span class="logo-6HF-sub-2">pp</span>
        <span class="logo-6HF-sub-3">
        
        <br/>
        
        </span>
      </div>
    </div>
    <div class="sign-up-rSm">
      <div class="title-Zc5">
        <div class="header-XJ1">
          <p class="buat-akun-GWV">Buat Akun</p>
          <img class="content-6P3" src="./assets/content.png"/>
        </div>
        <div class="auto-group-yvhh-oYM">
          <p class="sudah-punya-akun-weZ">
            <span class="sudah-punya-akun-weZ-sub-0">Sudah punya akun?</span>
            <span class="sudah-punya-akun-weZ-sub-1"> </span>
          </p>
          <a href="halaman-masuk.html" class="masuk-VZb">Masuk</a>
        </div>
      </div>
      <div class="auto-group-kqvd-129">
        <form method="post" action="proses_akun.php" class="form-XFP" enctype="multipart/form-data">
          <label for="nama_lengkap">Nama Lengkap* :</label>
          <div class="form-input-hhi">
            <input name="nama_lengkap" id="nama_lengkap" type="text" class="content-raQ" placeholder="Nama lengkap" required/>
          </div>
          <label for="nama_lengkap">Nama Pengguna* :</label>
          <div class="form-input-hhi">
            <input name="nama" id="nama" type="text" class="content-raQ" placeholder="Nama Pengguna" required/>
          </div>
          <label for="id">ID Pengguna :</label>
          <div class="form-input-hhi">
            <input name="id" id="id" type="text" class="content-raQ" placeholder="ID pengguna" required/>
          </div>
          <label for="email">Alamat Email* :</label>
          <div class="form-input-hhi">
            <input name="email" id="email" type="email" class="content-raQ" placeholder="Alamat Email" required/>
          </div>
          <label for="pw">Kata Sandi :</label>
          <div class="form-input-hhi">
            <input name="pw" id="pw" type="password" class="content-raQ" placeholder="kata sandi" required/>
          </div>
          <label for="konfirpw">Konfirmasi Ulang Kata Sandi* :</label>
          <div class="form-input-hhi">
            <input name="konfirpw" id="konfirpw" type="password" class="content-raQ" placeholder="Konfirmasi Kata sandi" required/>
          </div>
          <label for="pekerjaan">Pekerjaan* :</label>
          <div class="form-input-hhi">
            <input name="pekerjaan" id="pekerjaan" type="pekerjaan" class="content-raQ" placeholder="Pekerjaan" required/>
          </div>
          <label for="instansi">Asal instansi :</label>
          <div class="form-input-hhi">
            <input name="instansi" id="instansi" type="text" class="content-raQ" placeholder="Asal instansi"/>
          </div>
          <label for="tgl">Tanggal Lahir* :</label>
          <div class="form-input-hhi">
            <input name="tgl" id="tgl" placeholder="ultah" type="date" class="content-raQ" required/>
          </div>
          <label for="alamat">Alamat KTP* :</label>
          <div class="form-input-hhi">
            <input name="alamatp" id="alamatp" placeholder="Alamat Rumah" type="text" class="content-raQ" required/>
          </div>
          <label for="alamat">Alamat Sekarang* :</label>
          <div class="form-input-hhi">
            <input name="alamats" id="alamats" placeholder="Alamat Rumah" type="text" class="content-raQ" required/>
          </div>
          <label for="hp">Nomor Handphone* :</label>
          <div class="form-input-hhi">
            <input name="hp" id="hp" placeholder="Nomor Handphone" type="number" class="content-raQ" required/>
          </div>
          <label for="alamat">Foto anda :</label>
          <div class="form-input-hhi">
            <input type="file" name="foto" id="foto" class="content-raQ" />
          </div>
          <div class="different-address-p7K">
            <input name="setuju" id="setuju" value="Y" type="checkbox" class="click" required/>
            <p class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR">
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-0">Saya setuju dengan</span>
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-1"> </span>
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-2">Kebijakan Pribadi</span>
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-3"> </span>
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-4">dan</span>
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-5"> </span>
              <span class="saya-setuju-dengan-kebijakan-pribadi-dan-syarat-penggunaan-gQR-sub-6">Syarat Penggunaan</span>
            </p>
          </div>
          <button type="submit" class="button-ooo">Buat Akun</button>
        </form>

      </div>
    </div>
  </div>
  <footer class="footer-FQu">
    <div class="logo-and-links-mu3">
      <div class="logo-and-slogan-6wK">
        <div class="logo-FJR">
          <span class="logo-FJR-sub-0">Perpus</span>
          <span class="logo-FJR-sub-1">A</span>
          <span class="logo-FJR-sub-2">pp</span>
          <span class="logo-FJR-sub-3">
          
          <br/>
          
          </span>
        </div>
        <div class="rectangle-319-Vc5">
        </div>
        <p class="gift-decoration-store-1KX">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-vxH">
        <p class="home-TSR">Beranda</p>
        <p class="shop-yvZ">Perpustakaan Mitra</p>
        <div class="auto-group-uy83-WvV">Playlist</div>
        <p class="contact-us-1sF">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-Kd3">
      <div class="copyright-DyK">
        <p class="copyright-2023-perpusapp-all-rights-reserved-YEu">Copyright © 2023 PerpusApp All rights reserved</p>
        <p class="privacy-policy-3xM">Privacy Policy</p>
        <p class="terms-of-use-axH">Terms of Use</p>
      </div>
      <div class="social-icon-KQ5">
        <img class="social-outline-instagram-qNR" src="./assets/social-outline-instagram-zhX.png"/>
        <img class="social-outline-facebook-NNM" src="./assets/social-outline-facebook-FLm.png"/>
        <img class="social-outline-youtube-iBK" src="./assets/social-outline-youtube-pdP.png"/>
      </div>
    </div>
  </footer>
</div>
</body>