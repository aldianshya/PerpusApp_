<?php
session_start();
include 'config/db.php';
$id_staff = @$_SESSION['staff'];
$sql = mysqli_query($con, 
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
  <title>Halaman Profil Staff</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600" />
  <link rel="stylesheet" href="./styles/halaman-profil-staff.css" />
</head>

<body>
  <div class="halaman-profil-staff-nYu">
    <div class="navigation-bar-QKP">
      <span class="navigation-bar-QKP-sub-0">Perpus</span>
      <span class="navigation-bar-QKP-sub-1">A</span>
      <span class="navigation-bar-QKP-sub-2">pp</span>
    </div>
    <div class="auto-group-uvnv-qUZ">
      <div class="content-aBF">
        <div class="content-V3K">
          <div class="menu-PuP">
            <div class="frame-743-VxR">
              <div class="elements-menu-avatar-edit-Zau">
                <div class="avatar-4Xf">
                  <img class="border-radius-light-solid-pill-QbX"
                    src="./assets/staff/<?=$data['foto_staff']?>" />
                </div>
              </div>
              <p class="tobi-anson-T41"><?=$data['nama_staff']?></p>
            </div>
            <div class="frame-742-n6H">
              <a class="elements-7uF" href="#">Profil Staff</a>
              <a class="elements-DSV" href="halaman-profil-perpustakaan.php">Profile Perpustakaan</a>
              <a class="elements-DSV" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
              <!-- <a class="elements-DSV" href="konfirmasi-peminjaman.php">Konfirmai Peminjaman</a> -->
              <a class="elements-DSV" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
              <a class="elements-DSV" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
              <a class="elements-DSV" href="#">Keluar</a>
            </div>
          </div>
          <div class="address-kDT">
            <img class="mask-group-VB3" src="./assets/staff/<?=$data['foto_staff']?>" />
            <div class="content-cFf">
              <div class="title-KQy">
                <p class="profil-saya-59F">Profil Saya</p>
                <a class="butoon-nZT" href="halaman-profil-staff-edit.php">
                  <img class="outline-edit-jUh" src="./assets/outline-edit-nJH.png" />
                  <p class="edit-s57">Edit</p>
                </a>
              </div>
              <div class="frame-746-oDf">Nama           : <?=$data['nama_staff']?></div>
              <div class="frame-751-W85">No Hp          : <?=$data['no_hp']?></div>
              <div class="frame-747-cwo">Email          : <?=$data['email']?></div>
              <div class="frame-748-8fF">Tanggal Lahir  : <?=$data['tanggal_lahir']?></div>
              <div class="frame-749-qJm">Asal Instansi  : <?=$data['nama_mitra']?></div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-W3X">
        <div class="logo-and-links-bKs">
          <div class="logo-and-slogan-Wxd">
            <p class="perpusapp-fqX">
              <span class="perpusapp-fqX-sub-0">Perpus</span>
              <span class="perpusapp-fqX-sub-1">A</span>
              <span class="perpusapp-fqX-sub-2">pp</span>
              <span class="perpusapp-fqX-sub-3">

                <br />

              </span>
            </p>
            <div class="rectangle-319-8Mj">
            </div>
            <p class="gift-decoration-store-UAh">Pinjam dan Reservasi Buku Online!</p>
          </div>
        </div>
        <div class="bottom-bar-CMb">
          <div class="copyright-jMX">
            <p class="copyright-2023-3legant-all-rights-reserved-xzy">Copyright © 2023 PerpusApp. All rights reserved
            </p>
            <p class="privacy-policy-GEy">Privacy Policy</p>
            <p class="terms-of-use-MXK">Terms of Use</p>
          </div>
          <div class="social-icon-gJh">
            <img class="social-outline-instagram-165" src="./assets/social-outline-instagram-u57.png" />
            <img class="social-outline-facebook-wkR" src="./assets/social-outline-facebook.png" />
            <img class="social-outline-youtube-V1F" src="./assets/social-outline-youtube.png" />
          </div>
        </div>
      </div>
    </div>
  </div>
</body>