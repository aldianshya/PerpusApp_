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
  <title>Halaman Lupa Kata Sandi (Input email)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500"/>
  <link rel="stylesheet" href="./styles/halaman-lupa-kata-sandi-input-email.css"/>
</head>
<body>
<div class="halaman-lupa-kata-sandi-input-email-WKB">
  <div class="auto-group-zswv-3K7">
    <div class="left-a49">
      <div class="logo-HjF">
        <span class="logo-HjF-sub-0">Perpus</span>
        <span class="logo-HjF-sub-1">A</span>
        <span class="logo-HjF-sub-2">pp</span>
        <span class="logo-HjF-sub-3">
        
        <br/>
        
        </span>
      </div>
    </div>
    <form action="" method="post" class="sign-in-JXs">
      <p class="lupa-kata-sandi-bWy">Lupa kata sandi</p>
      <div class="form-input-irV">
        <input type="email" name="email" class="content-5h3" id="email" placeholder="Alamat email" required>
      </div>
      <button class="button-mZs">Berikutnya</button>
    </form>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['email']  ;
    $sqlCek = mysqli_query($con, "SELECT * FROM users WHERE email='$pass'");
    $jml = mysqli_num_rows($sqlCek);
    $d = mysqli_fetch_array($sqlCek);
    if ($jml > 0) {
        $_SESSION['email'] = $d['email'];

        echo "<script type='text/javascript'>
        alert('Password Telah dikirimkan ke Alamat Email anda!!!');
        setTimeout(function () { 
        swal('($d[email]) ', 'Login berhasil', {
        icon : 'success',
        buttons: {        			
        confirm: {
        className : 'btn btn-success'
        }
        },
        });    
        },10);  
        window.setTimeout(function(){ 
        } ,3000);   
        window.location.href ='halaman-lupa-kata-sandi-konfirmasi-email-dikirim.php';
        </script>";
    } else {
      echo '<script>alert("Tidak ada email yang terdaftar!!!");</script>';
    }
}
?>
  </div>
  <div class="footer-EiM">
    <div class="logo-and-links-yR3">
      <div class="logo-and-slogan-WQy">
        <p class="perpusapp-4Bb">
          <span class="perpusapp-4Bb-sub-0">Perpus</span>
          <span class="perpusapp-4Bb-sub-1">A</span>
          <span class="perpusapp-4Bb-sub-2">pp</span>
          <span class="perpusapp-4Bb-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-mVK">
        </div>
        <p class="gift-decoration-store-Jk9">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-qVB">
        <p class="home-BJ9">Beranda</p>
        <p class="shop-iJ5">Perpustakaan Mitra</p>
        <div class="auto-group-bwps-r9P">Playlist</div>
        <p class="contact-us-wwX">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-HVb">
      <div class="copyright-PYd">
        <p class="copyright-2023-perpusapp-all-rights-reserved-iqo">Copyright © 2023 PerpusApp All rights reserved</p>
        <p class="privacy-policy-F53">Privacy Policy</p>
        <p class="terms-of-use-at1">Terms of Use</p>
      </div>
      <div class="social-icon-Kah">
        <img class="social-outline-instagram-ESm" src="./assets/social-outline-instagram-mA1.png"/>
        <img class="social-outline-facebook-N3B" src="./assets/social-outline-facebook.png"/>
        <img class="social-outline-youtube-JSd" src="./assets/social-outline-youtube-FWH.png"/>
      </div>
    </div>
  </div>
</div>
</body>