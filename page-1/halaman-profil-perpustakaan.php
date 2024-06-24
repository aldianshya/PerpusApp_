<?php
session_start();
include 'config/db.php';
$id_staff = @$_SESSION['staff'];
$sql = mysqli_query(
  $con,
  "SELECT * FROM staff 
JOIN mitra ON mitra.id_mitra = staff.id_mitra
JOIN kabupaten ON kabupaten.id_kabupaten = mitra.id_kabupaten
JOIN provinsi ON provinsi.id_provinsi = kabupaten.id_provinsi
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
  <title>Halaman Profil Perpustakaan</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600" />
  <link rel="stylesheet" href="./styles/halaman-profil-perpustakaan.css" />
</head>

<body>
  <div class="halaman-profil-perpustakaan-5eD">
    <div class="navigation-bar-1nm">
      <span class="navigation-bar-1nm-sub-0">Perpus</span>
      <span class="navigation-bar-1nm-sub-1">A</span>
      <span class="navigation-bar-1nm-sub-2">pp</span>
    </div>
    <div class="content-VrM">
      <div class="content-EJ9">
        <div class="menu-ymX">
          <div class="frame-743-hhX">
            <div class="elements-menu-avatar-edit-ESZ">
              <div class="avatar-ju7">
                <img class="border-radius-light-solid-pill-skR" src="./assets/staff/<?=$data['foto_staff']?>" />
              </div>
            </div>
            <p class="tobi-anson-7em">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-eYM">
            <a class="elements-6v9" href="halaman-profil-staff.php">Profil Staff</a>
            <a class="elements-QnR" href="halaman-profil-perpustakaan.php">Profile Perpustakaan</a>
            <a class="elements-6v9" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
            <!-- <a class="elements-6v9" href="konfirmasi-peminjaman.php">Konfirmai Peminjaman</a> -->
            <a class="elements-6v9" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
            <a class="elements-6v9" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
            <a class="elements-6v9" href="../halaman-masuk.php">Keluar</a>
          </div>
        </div>
        <div class="address-qm7">
          <img class="mask-group-zP7" src="./assets/mitra/unja.jpg" />
          <div class="content-iK7">
            <div class="title-DFs">
              <p class="profil-perpustakaan-9fK">Profil Perpustakaan</p>
              <a class="butoon-5Yy" href="halaman-profil-perpustakaan-detail.php">
                <img class="outline-edit-DfB" src="./assets/outline-edit.png" />
                <p class="edit-MWV">Edit</p>
              </a>
            </div>
            <div class="frame-746-5SV">
              <p class="nama-perpustakaan-o7b">Nama Perpustakaan</p>
              <p class="item--78H">:</p>
              <p class="perpustakaan-universitas-jambi-R8y">
                <?= $data['nama_mitra'] ?>
              </p>
            </div>
            <div class="frame-756-j9f">
              <p class="provinsi-G9b">Provinsi</p>
              <p class="item--bBs">:</p>
              <p class="jambi-Vo3">
                <?= $data['nama_provinsi'] ?>
              </p>
            </div>
            <div class="frame-757-paR">
              <p class="kab-kota-kys">Kab/Kota</p>
              <p class="item--HU1">:</p>
              <p class="muaro-jambi-pTw">
                <?= $data['nama_kabupaten'] ?>
              </p>
            </div>
            <div class="frame-758-9FK">
              <p class="telepon-fzM">Telepon</p>
              <p class="item--Bxh">:</p>
              <p class="xxxxxxxxxxx-Wk5">
                <?= $data['telepon_mitra'] ?>
              </p>
            </div>
            <div class="frame-759-Evy">
              <p class="email-B5X">Email</p>
              <p class="item--JR3">:</p>
              <p class="uptunjaunjaacid-2M3">
                <?= $data['email_mitra'] ?>
              </p>
            </div>
            <div class="frame-760-wyo">
              <p class="jam-buka-HXs">Jam Buka</p>
              <p class="item--om7">:</p>
              <p class="item-0830-LW9">
                <?= $data['jam_buka'] ?>
              </p>
            </div>
            <div class="frame-761-SZB">
              <p class="jam-tutup-yJD">Jam Tutup</p>
              <p class="item--6dj">:</p>
              <p class="item-1530-ppd">
                <?= $data['jam_tutup'] ?>
              </p>
            </div>
            <div class="frame-763-Ykd">
              <p class="link-google-maps-grq">Link Google Maps</p>
              <p class="item--owT">:</p>
              <p class="https-mapsappgoogl-c8get14fdys3vs6p6-8iq">
                <?= $data['gmaps'] ?>
              </p>
            </div>
            <div class="frame-762-dQh">
              <p class="deskripsi-yDf">Deskripsi</p>
              <p class="item--hvM">:</p>
              <p
                class="lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-integer-nec-odio-praesent-libero-sed-cursus-ante-dapibus-diam-sed-nisi-nulla-quis-sem-at-nibh-elementum-imperdiet-duis-sagittis-ipsum-praesent-mauris-fusce-nec-tellus-sed-augue-semper-porta-mauris-massa-vestibulum-lacinia-arcu-eget-nulla-class-aptent-taciti-sociosqu-ad-litora-torquent-per-conubia-nostra-per-inceptos-himenaeos-curabitur-sodales-ligula-in-libero-sed-dignissim-lacinia-nunc-RrM">
                <?= $data['deskripsi_mitra'] ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-N2q">
      <div class="logo-and-links-t1B">
        <div class="logo-and-slogan-oP3">
          <p class="perpusapp-x13">
            <span class="perpusapp-x13-sub-0">Perpus</span>
            <span class="perpusapp-x13-sub-1">A</span>
            <span class="perpusapp-x13-sub-2">pp</span>
            <span class="perpusapp-x13-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-QGM">
          </div>
          <p class="gift-decoration-store-8y3">Pinjam dan Reservasi Buku Online!</p>
        </div>
      </div>
      <div class="bottom-bar-ru3">
        <div class="copyright-nnh">
          <p class="copyright-2023-3legant-all-rights-reserved-85s">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-qFB">Privacy Policy</p>
          <p class="terms-of-use-aCm">Terms of Use</p>
        </div>
        <div class="social-icon-ukq">
          <img class="social-outline-instagram-dwj" src="./assets/social-outline-instagram.png" />
          <img class="social-outline-facebook-n3w" src="./assets/social-outline-facebook-FyF.png" />
          <img class="social-outline-youtube-7ru" src="./assets/social-outline-youtube-J37.png" />
        </div>
      </div>
    </div>
  </div>
</body>