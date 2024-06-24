<?php
session_start();
include 'config/db.php';
$id_staff = @$_SESSION['staff'];
$sql = mysqli_query(
  $con,
  "SELECT * FROM staff 
JOIN mitra ON mitra.id_mitra = staff.id_mitra
WHERE id_staff = '$id_staff'"
) or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Akun/Alamat</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600%2C700" />
  <link rel="stylesheet" href="./styles/halaman-akun-alamat.css" />
</head>

<body>
  <div class="halaman-akun-alamat-VCH">
    <div class="navigation-bar-1wK">
      <span class="navigation-bar-1wK-sub-0">Perpus</span>
      <span class="navigation-bar-1wK-sub-1">A</span>
      <span class="navigation-bar-1wK-sub-2">pp</span>
    </div>
    <div class="content-5ph">
      <div class="content-1yF">
        <div class="menu-Zzm">
          <div class="frame-743-V7j">
            <div class="elements-menu-avatar-edit-27f">
              <div class="avatar-j25">
                <img class="border-radius-light-solid-pill-s8H" src="./assets/staff/ikhsan.JPEG" />
              </div>
            </div>
            <p class="tobi-anson-iPo">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-eYM">
            <a class="elements-QnR" href="halaman-profil-staff.php">Profil Staff</a>
            <a class="elements-6v9" href="halaman-profil-perpustakaan.php">Profile Perpustakaan</a>
            <a class="elements-6v9" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
            <!-- <a class="elements-6v9" href="konfirmasi-peminjaman.php">Konfirmai Peminjaman</a> -->
            <a class="elements-6v9" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
            <a class="elements-6v9" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
            <a class="elements-6v9" href="#">Keluar</a>
          </div>
        </div>
        <form class="form-rAZ" method="post" action="">
          <p class="detail-akun-PgH">Detail Akun</p>
          <a class="kembali-Wof" href="javascript:history.back()">&lt;&lt; Kembali</a>
          <div class="name-8tm">
            <p class="nama-lengkap--6qb">
              <span class="nama-lengkap--6qb-sub-0">Nama lengkap </span>
              <span class="nama-lengkap--6qb-sub-1">*</span>
            </p>
            <input type="text" class="input-U5T" name="nama_staff" value="<?= $data['nama_staff'] ?>">
          </div>
          <div class="name-9Bb">
            <p class="no-heandphone--hD7">
              <span class="no-heandphone--hD7-sub-0">NO handphone </span>
              <span class="no-heandphone--hD7-sub-1">*</span>
            </p>
            <input type="text" class="input-tYV" name="no_hp" value="<?= $data['no_hp'] ?>">
          </div>
          <div class="name-AW1">
            <p class="email--wFs">
              <span class="email--wFs-sub-0">Email </span>
              <span class="email--wFs-sub-1">*</span>
            </p>
            <input type="email" class="input-jxR" name="email" value="<?= $data['email'] ?>">
          </div>
          <div class="name-RqF">
            <p class="tanggal-lahir--Q2y">
              <span class="tanggal-lahir--Q2y-sub-0">Tanggal lahir </span>
              <span class="tanggal-lahir--Q2y-sub-1">*</span>
            </p>
            <input type="date" class="input-pMb" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">

          </div>
          <div class="name-VyX">
            <p class="asal-instansi-UBF">Asal instansi</p>
            <input type="text" class="input-oDX" name="nama_mitra" value="<?= $data['nama_mitra'] ?>" disabled>
          </div>
          <button type="submit" class="button-9YR">Simpan
      </div>
      </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $jml = 0;
        if (isset($_POST['nama_staff'])) {
          $jml = 1;
          $edit1 = mysqli_query($con, "UPDATE staff SET nama_staff='$_POST[nama_staff]' WHERE id_staff='$id_staff' ");
        }
        if (isset($_POST['no_hp'])) {
          $jml = 1;
          $edit2 = mysqli_query($con, "UPDATE staff SET no_hp='$_POST[no_hp]' WHERE id_staff='$id_staff' ");
        }
        if (isset($_POST['email'])) {
          $jml = 1;
          $edit3 = mysqli_query($con, "UPDATE staff SET email='$_POST[email]' WHERE id_staff='$id_staff' ");
        }
        if (isset($_POST['tanggal_lahir'])) {
          $jml = 1;
          $edit4 = mysqli_query($con, "UPDATE staff SET tanggal_lahir='$_POST[tanggal_lahir]' WHERE id_staff='$id_staff' ");
        }
        if ($jml > 0) {
          echo "<script type='text/javascript'>
				setTimeout(function () { 
          alert('Anda Berhasil Mengedit Profil');
				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('halaman-profil-staff.php');
				} ,3000);   
				</script>";
        } else {
          echo "<script type='text/javascript'>
      setTimeout(function () { 
        alert('Anda Berhasil Mengedit Profil');
      swal('($_POST[nama]) ', 'Berhasil diubah', {
      icon : 'success',
      buttons: {        			
      confirm: {
      className : 'btn btn-success'
      }
      },
      });    
      },10);  
      window.setTimeout(function(){ 
      window.location.replace('halaman-profil-staff.php');
      } ,3000);   
      </script>";
        }
      }
      ?>
    </div>
  </div>
  <div class="footer-rr9">
    <div class="logo-and-links-miD">
      <div class="logo-and-slogan-VPK">
        <p class="perpusapp-39w">
          <span class="perpusapp-39w-sub-0">Perpus</span>
          <span class="perpusapp-39w-sub-1">A</span>
          <span class="perpusapp-39w-sub-2">pp</span>
          <span class="perpusapp-39w-sub-3">

            <br />

          </span>
        </p>
        <div class="rectangle-319-n9T">
        </div>
        <p class="gift-decoration-store-uUy">Pinjam dan Reservasi Buku Online!</p>
      </div>
    </div>
    <div class="bottom-bar-q7j">
      <div class="copyright-m1P">
        <p class="copyright-2023-3legant-all-rights-reserved-HkR">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-CcV">Privacy Policy</p>
        <p class="terms-of-use-jsK">Terms of Use</p>
      </div>
      <div class="social-icon-gGm">
        <img class="social-outline-instagram-149" src="./assets/social-outline-instagram-NG5.png" />
        <img class="social-outline-facebook-8eZ" src="./assets/social-outline-facebook-hMX.png" />
        <img class="social-outline-youtube-rqT" src="./assets/social-outline-youtube-NZK.png" />
      </div>
    </div>
  </div>
  </div>
</body>