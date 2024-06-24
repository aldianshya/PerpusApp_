<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['email'];
$sql = mysqli_query($con, "SELECT * FROM users WHERE email = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Lupa Kata Sandi (Konfirmasi email dikirim)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="./styles/halaman-lupa-kata-sandi-konfirmasi-email-dikirim.css"/>
</head>
<body>
<div class="halaman-lupa-kata-sandi-konfirmasi-email-dikirim-XLd">
  <div class="auto-group-tmek-TVB">
    <div class="left-yyK">
      <div class="logo-huK">
        <span class="logo-huK-sub-0">Perpus</span>
        <span class="logo-huK-sub-1">A</span>
        <span class="logo-huK-sub-2">pp</span>
        <span class="logo-huK-sub-3">
        
        <br/>
        
        </span>
      </div>
    </div>
    <div class="sign-in-ihw">
      <div class="auto-group-xfpp-e5o">
        <p class="lupa-kata-sandi-BLd">Lupa kata sandi</p>
        <p class="email-verifikasi-telah-dikirimkan-ke-xxxxxxxxxdomaincom-VcD">Email verifikasi telah dikirimkan ke <?=$data['email']; ?></p>
        <p class="belum-menerima-email-kirim-ulang-bQM">
          <span class="belum-menerima-email-kirim-ulang-bQM-sub-0">Belum menerima email? </span>
          <a href="halaman-lupa-kata-sandi-konfirmasi-email-dikirim.php" class="belum-menerima-email-kirim-ulang-bQM-sub-1">Kirim ulang</a>
        </p>
      </div>
      <a href="halaman-masuk.html" class="button-XhK">OK</a>
    </div>
  </div>
  <div class="footer-16h">
    <div class="logo-and-links-Y6d">
      <div class="logo-and-slogan-GoK">
        <p class="perpusapp-DTf">
          <span class="perpusapp-DTf-sub-0">Perpus</span>
          <span class="perpusapp-DTf-sub-1">A</span>
          <span class="perpusapp-DTf-sub-2">pp</span>
          <span class="perpusapp-DTf-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-8DF">
        </div>
        <p class="gift-decoration-store-TmK">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-zWM">
        <p class="home-jiq">Beranda</p>
        <p class="shop-Tuj">Perpustakaan Mitra</p>
        <div class="auto-group-yirp-zem">Playlist</div>
        <p class="contact-us-gnV">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-p81">
      <div class="copyright-XHK">
        <p class="copyright-2023-perpusapp-all-rights-reserved-4HF">Copyright © 2023 PerpusApp All rights reserved</p>
        <p class="privacy-policy-nDF">Privacy Policy</p>
        <p class="terms-of-use-WQ9">Terms of Use</p>
      </div>
      <div class="social-icon-dzZ">
        <img class="social-outline-instagram-9xu" src="./assets/social-outline-instagram-Bw7.png"/>
        <img class="social-outline-facebook-UEV" src="./assets/social-outline-facebook-uGm.png"/>
        <img class="social-outline-youtube-1VK" src="./assets/social-outline-youtube.png"/>
      </div>
    </div>
  </div>
</div>
</body>