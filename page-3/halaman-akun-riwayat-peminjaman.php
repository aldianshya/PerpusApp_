<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users WHERE id_user = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$data0 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user = '$id_login'")) or die(mysqli_error($con));
$sql_pinjam = mysqli_query(
  $con,
  "SELECT *
  FROM peminjaman
  JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
  JOIN users ON users.id_user = peminjaman.id_user
  WHERE peminjaman.id_user = '$data0[id_user]' "
) or die(mysqli_error($con));
$sql_p = mysqli_query(
  $con,
  "SELECT *
  FROM peminjaman
  JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
  JOIN users ON users.id_user = peminjaman.id_user
  WHERE peminjaman.id_user = '$data[id_user]' "
) or die(mysqli_error($con));
$data2 = mysqli_fetch_array($sql);
$data1 = mysqli_fetch_array($sql_p);
$sql2 = mysqli_query(
  $con,
  "SELECT *
  FROM reservasi
  JOIN mitra ON mitra.id_mitra = reservasi.id_mitra
  JOIN users ON users.id_user = reservasi.id_user
  WHERE reservasi.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$sql1 = mysqli_query($con, "SELECT * FROM buku_pinjam
JOIN books ON books.ISBN = buku_pinjam.ISBN
WHERE buku_pinjam.id_user = '$data[id_user]'") ;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Akun/Riwayat Peminjaman</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-akun-riwayat-peminjaman.css"/>
</head>
<body>
<div class="halaman-akun-riwayat-peminjaman-XzZ">
  <div class="navigation-bar-rX3">
    <div class="logo-Yuf">
      <span class="logo-Yuf-sub-0">Perpus</span>
      <span class="logo-Yuf-sub-1">A</span>
      <span class="logo-Yuf-sub-2">pp</span>
    </div>
    <div class="elements-navigation-link-group--zv5">
      <div class="elements-navigation-link--un9">
        <div class="button-4f3">
          <div class="content-REh">Beranda</div>
        </div>
      </div>
      <div class="elements-navigation-link--jFP">
        <div class="button-54M">
          <div class="content-drZ">Perpustakaan Mitra</div>
        </div>
      </div>
      <div class="auto-group-cwd9-94D">
        <div class="elements-navigation-link--h5j">
          <div class="button-RnR">
            <div class="content-PDT">Playlist</div>
          </div>
        </div>
        <div class="elements-navigation-link--H3w">
          <div class="button-DTP">Hubungi Kami</div>
        </div>
      </div>
    </div>
    <div class="icons-L2D">
      <div class="auto-group-f13r-6GH">
        <img class="interface-outline-search-02-R3f" src="./assets/interface-outline-search-02-CTK.png"/>
        <img class="interface-outline-user-circle-8im" src="./assets/interface-outline-user-circle-dPP.png"/>
      </div>
      <div class="elements-navigation-cart-button-UGq">
        <img class="outline-shopping-bag-o4D" src="./assets/outline-shopping-bag-zjs.png"/>
        <div class="frame-3-LK3">4</div>
      </div>
    </div>
  </div>
  <div class="content-ZxV">
    <div class="content-JQH">
      <div class="menu-4PT">
        <div class="frame-743-Nuw">
          <div class="elements-menu-avatar-edit-hxD">
            <div class="avatar-pmw">
              <div class="border-radius-light-solid-pill-mSH">
                <img class="image-isK" src="./assets/user/<?=$data['foto_user']?>"/>
              </div>
            </div>
          </div>
          <p class="sofia-havertz-k3K"><?=$data['namaLengkap_user']?></p>
        </div>
        <div class="frame-742-std">
          <a href="halaman-akun.php" class="elements-pYy">Akun</a>
          <a href="halaman-akun-alamat.php" class="elements-95T">Alamat</a>
          <a href="halaman-akun-riwayat-peminjaman.php" class="elements-U7j">Riwayat Peminjaman</a>
          <a href="halaman-akun-wishlist.php" class="elements-Nyo">Wishlist</a>
          <a href="../halaman-masuk.php" class="elements-VYd">Keluar</a>
        </div>
      </div>
      <div class="orders-Pe1">
        <p class="riwayat-peminjaman-wvR">Riwayat Peminjaman</p>
        <div class="content-sp5">
          <div class="auto-group-o1lf-2gy">
            <div class="caption-z81">
              <p class="id-peminjaman-j5b">Id Peminjaman</p>
              <p class="nama-buku-rAD">Nama Bu</p>
              <p class="tanggal-peminjaman-N8Z">Tanggal Peminjaman</p>
              <p class="tanggal-pengembalian-sr1">Tanggal Pengembalian</p>
            </div>
            <?php while ($row = mysqli_fetch_assoc($sql1)): ?>
            <div class="item-PJZ">
              <p class="u012210310001-ird"><?=$row['id_peminjaman']?></p>
              <p class="tere-lia-bulan-49o"><?=$row['Judul']?></p>
              <p class="item-31-10-2022-Phs"><?= $data1['tanggal_pinjam'] ?></p>
              <p class="item-07-11-2022-W1o"><?= $data1['tanggal_kembali'] ?></p>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-497">
    <div class="logo-and-links-z2m">
      <div class="logo-and-slogan-8Ps">
        <p class="legant-fub">
          <span class="legant-fub-sub-0">Perpus</span>
          <span class="legant-fub-sub-1">A</span>
          <span class="legant-fub-sub-2">pp</span>
          <span class="legant-fub-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-LuF">
        </div>
        <p class="gift-decoration-store-gTK">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-pJd">
        <p class="home-MpM">Beranda</p>
        <p class="shop-Hi1">Perpustakaan Mitra</p>
        <div class="auto-group-6jhv-2fb">Playlist</div>
        <p class="contact-us-8Tj">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-fCm">
      <div class="copyright-mWh">
        <p class="copyright-2023-3legant-all-rights-reserved-hv9">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-Rr9">Privacy Policy</p>
        <p class="terms-of-use-ZxM">Terms of Use</p>
      </div>
      <div class="social-icon-Jf3">
        <img class="social-outline-instagram-2b3" src="./assets/social-outline-instagram-mg5.png"/>
        <img class="social-outline-facebook-NQ1" src="./assets/social-outline-facebook-JVf.png"/>
        <img class="social-outline-youtube-ueq" src="./assets/social-outline-youtube-yER.png"/>
      </div>
    </div>
  </div>
</div>
</body>