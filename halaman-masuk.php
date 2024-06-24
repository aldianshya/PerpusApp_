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
  <title>Halaman Masuk</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600" />
  <link rel="stylesheet" href="./styles/halaman-masuk.css" />
</head>

<body>
  <div class="halaman-masuk-xSu">
    <div class="auto-group-ijmr-gdo">
      <div class="left-oTX">
        <div class="logo-j6H"> 
          <span class="logo-j6H-sub-0">Perpus</span>
          <span class="logo-j6H-sub-1">A</span>
          <span class="logo-j6H-sub-2">pp</span>
          <span class="logo-j6H-sub-3">

            <br />

          </span>
        </div>
      </div>
      <div class="sign-in-6zM">
        <form method="post" action="" class="masuk-D3P">
          <p>Masuk</p>
          <div class="form-8w3">
            <input class="content-qaZ" name="id" type="text" id="id" placeholder="ID pengguna atau alamat email"
              required />
            <input class="content-qaZ" name="pw" type="password" id="pw" placeholder="kata sandi" required />
            <button type="submit"  class="button-c9P">Masuk</button>
        </form>
		<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['pw']  ;
    $sqlCeq = mysqli_query($con, "SELECT * FROM staff WHERE id_staff='$_POST[id]' AND password='$pass'");
    $sqlCek = mysqli_query($con, "SELECT * FROM users WHERE id_user='$_POST[id]' AND password='$pass'");
    $jml = mysqli_num_rows($sqlCek);
    $jmk = mysqli_num_rows($sqlCeq);
    $d = mysqli_fetch_array($sqlCek);
    if ($jml > 0) {
        $_SESSION['users'] = $d['id_user'];
        echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk Sebagai Pengguna');
        setTimeout(function () { 
        
        swal('($d[namaTampilan_user]) ', 'Login berhasil', {
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
        window.location.href ='./page-3/halaman-utaman-setelah-masuk.php';
        </script>";
    } 
    if ($jmk > 0) {
        $_SESSION['staff'] = $_POST['id'];
        echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk Sebagai Staff');
        setTimeout(function () { 
        
        swal('($d[namaTampilan_user]) ', 'Login berhasil', {
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
        window.location.href ='./page-1/halaman-profil-staff.php';
        </script>";
    } else {
      echo '<script>alert("Anda Gagal Masuk");</script>';
    }
}
?>

           <!--===============================================================================================-->
    <script src="JS/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="JS/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="JS/vendor/bootstrap/js/popper.js"></script>
    <script src="JS/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="JS/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="JS/vendor/daterangepicker/moment.min.js"></script>
    <script src="JS/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="JS/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->

    <!-- Sweet Alert -->
    <script src="JS/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="JS/js/main.js"></script>
        <div class="option-apy">
          <p class="belum-punya-akun-buat-akun-8bb">
            <span class="belum-punya-akun-buat-akun-8bb-sub-0">Belum punya akun? </span>
            <a href="halaman-buat-akun.php" class="belum-punya-akun-buat-akun-8bb-sub-1">Buat Akun</a>
          </p>
          <a href="halaman-lupa-kata-sandi-input-email.php" class="lupa-kata-sandi-fzq">Lupa kata sandi?</a>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-g9F">
    <div class="logo-and-links-Qqw">
      <div class="logo-and-slogan-9Yd">
        <p class="perpusapp-tWD">
          <span class="perpusapp-tWD-sub-0">Perpus</span>
          <span class="perpusapp-tWD-sub-1">A</span>
          <span class="perpusapp-tWD-sub-2">pp</span>
          <span class="perpusapp-tWD-sub-3">

            <br />

          </span>
        </p>
        <div class="rectangle-319-nzu">
        </div>
        <p class="gift-decoration-store-8Yy">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-fJ1">
        <p class="home-QWV">Beranda</p>
        <p class="shop-8hP">Perpustakaan Mitra</p>
        <div class="auto-group-qhfy-UFT">Playlist</div>
        <p class="contact-us-aJV">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-JkH">
      <div class="copyright-DcM">
        <p class="copyright-2023-perpusapp-all-rights-reserved-kMP">Copyright © 2023 PerpusApp All rights reserved</p>
        <p class="privacy-policy-Fow">Privacy Policy</p>
        <p class="terms-of-use-zWd">Terms of Use</p>
      </div>
      <div class="social-icon-ixR">
        <img class="social-outline-instagram-3Uu" src="./assets/social-outline-instagram.png" />
        <img class="social-outline-facebook-Bb7" src="./assets/social-outline-facebook-Mv9.png" />
        <img class="social-outline-youtube-7zZ" src="./assets/social-outline-youtube-Fp5.png" />
      </div>
    </div>
  </div>
  </div>
  <script src="JS/script.js"></script>
</body>