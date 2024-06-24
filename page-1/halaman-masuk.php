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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="./styles/halaman-masuk.css" />
</head>

<body>
  <div class="halaman-masuk-Dyw">
    <div class="auto-group-z9em-kiy">
      <div class="left-sHo">
        <span class="left-sHo-sub-0">Perpus</span>
        <span class="left-sHo-sub-1">A</span>
        <span class="left-sHo-sub-2">pp</span>
        <span class="left-sHo-sub-3">

          <br />

        </span>
      </div>
      <form action="" class="sign-in-qGZ" method="post">
        <p class="masuk-sebagai-staff-YAy">Masuk sebagai Staff</p>
        <div class="form-3tR">
          <div class="form-input-osb">
            <input class="content-ACM" type="text" id="idStaff" name="id_staff" placeholder="ID Staff" required>
          </div>
          <div class="form-input-e7X">
            <div class="content-zx5">
              <div class="content-a1B">
                <input class="kata-sandi-v53" type="password" id="kataSandi" name="password" placeholder="Kata Sandi"
                  required>
                <img class="huge-icon-interface-outline-eye-2ds" src="./assets/huge-icon-interface-outline-eye.png" />
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="button-WJ9">Masuk</button>
      </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pass = $_POST['password'];
        $sqlCek = mysqli_query($con, "SELECT * FROM staff WHERE id_staff='$_POST[id_staff]' AND password='$pass'");
        $jml = mysqli_num_rows($sqlCek);
        $d = mysqli_fetch_array($sqlCek);
        if ($jml > 0) {
          $_SESSION['staff'] = $d['id_staff'];
          echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk');
        setTimeout(function () { 
        
        swal('($d[nama_staff]) ', 'Login berhasil', {
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
        window.location.href ='halaman-profil-staff.php';
        </script>";
        } else {
          echo '<script>alert("Anda Gagal Masuk");</script>';
        }
      }
      ?>
    </div>
    <div class="footer-yhX">
      <div class="logo-and-links-7Yq">
        <div class="logo-and-slogan-3xH">
          <p class="perpusapp-zsX">
            <span class="perpusapp-zsX-sub-0">Perpus</span>
            <span class="perpusapp-zsX-sub-1">A</span>
            <span class="perpusapp-zsX-sub-2">pp</span>
            <span class="perpusapp-zsX-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-trR">
          </div>
          <p class="gift-decoration-store-E9b">Pinjam dan Reservasi Buku Online!</p>
        </div>
        <div class="nav-ktd">
          <p class="home-uFj">Beranda</p>
          <p class="shop-dSd">Perpustakaan Mitra</p>
          <div class="auto-group-qocr-a6y">Playlist</div>
          <p class="contact-us-t7f">Hubungi Kami</p>
        </div>
      </div>
      <div class="bottom-bar-Dfj">
        <div class="copyright-821">
          <p class="copyright-2023-perpusapp-all-rights-reserved-FcR">Copyright © 2023 PerpusApp All rights reserved</p>
          <p class="privacy-policy-NS9">Privacy Policy</p>
          <p class="terms-of-use-iF7">Terms of Use</p>
        </div>
        <div class="social-icon-qqX">
          <img class="social-outline-instagram-NKf" src="./assets/social-outline-instagram-tWh.png" />
          <img class="social-outline-facebook-Wgm" src="./assets/social-outline-facebook-iFX.png" />
          <img class="social-outline-youtube-rkd" src="./assets/social-outline-youtube-oCq.png" />
        </div>
      </div>
    </div>
  </div>
</body>