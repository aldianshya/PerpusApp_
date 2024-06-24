<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users WHERE id_user = '$id_login'") or die(mysqli_error($con));
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-akun-alamat.css"/>
</head>
<body>
<div class="halaman-akun-alamat-7EH">
  <div class="navigation-bar-qRB">
    <div class="logo-jmT">
      <span class="logo-jmT-sub-0">Perpus</span>
      <span class="logo-jmT-sub-1">A</span>
      <span class="logo-jmT-sub-2">pp</span>
    </div>
    <div class="elements-navigation-link-group--PzR">
      <div class="elements-navigation-link--79j">
        <div class="button-rd7">
          <a href="halaman-utaman-setelah-masuk.php" class="content-pZw">Beranda</a>
        </div>
      </div>
      <div class="elements-navigation-link--jB7">
        <div class="button-so7">
          <a href="halaman-perpustakaan-mitra-setelah-masuk.php" class="content-SLR">Perpustakaan Mitra</a>
        </div>
      </div>
      <div class="auto-group-bzk9-YeM">
        <div class="elements-navigation-link--tiD">
          <div class="button-q7f">
            <a href="#" class="content-b6q">Playlist</a>
          </div>
        </div>
        <div class="elements-navigation-link--5nh">
          <a href="#" class="button-pkH">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <div class="icons-Xeh">
      <div class="auto-group-5fwb-6C1">
        <a href="halaman-akun.php"><img class="interface-outline-user-circle-Mdj" src="./assets/interface-outline-user-circle-Kr1.png"/></a>
      </div>
      <div class="elements-navigation-cart-button-gR7">
        <img class="outline-shopping-bag-c3s" src="./assets/outline-shopping-bag-gm7.png"/>
        <div class="frame-3-juB">4</div>
      </div>
    </div>
  </div>
  <div class="content-Cnm">
    <p class="akun-saya-M9s">Akun Saya</p>
    <div class="content-44H">
      <div class="menu-CAV">
        <div class="frame-743-iuX">
          <div class="elements-menu-avatar-edit-F8m">
            <div class="avatar-m77">
              <div class="border-radius-light-solid-pill-iHF">
                <img class="image-ruF" src="./assets/user/<?=$data['foto_user']?>"/>
              </div>
            </div>
          </div>
          <p class="sofia-havertz-GTB"><?=$data['namaTampilan_user']?></p>
        </div>
        <div class="frame-742-Cbj">
          <a href="halaman-akun.php" class="elements-YQh">Akun</a>
          <a href="halaman-akun-alamat.php" class="elements-GLh">Alamat</a>
          <a href="halaman-akun-riwayat-peminjaman.php" class="elements-n49">Riwayat Peminjaman</a>
          <a href="halaman-akun-wishlist.php" class="elements-hS1">Wishlist</a>
          <a href="../halaman-masuk.php" class="elements-EB3">Keluar</a>
        </div>
      </div>
      <div class="address-KCV">
        <p class="alamat-4vm">Alamat</p>
        <div class="content-QDw">
          <div class="content-Z6q">
            <div class="title-Gmw">
              <p class="alamat-di-tanda-pengenal-2FK">Alamat Di Tanda Pengenal</p>
              <div class="butoon-MYV">
                <a href="edit_alamat1.php"><img class="outline-edit-ua1" src="./assets/outline-edit-iXb.png"/></a>
                <p class="edit-2uX">Edit</p>
              </div>
            </div>
            <div class="frame-746-yZs">
              <p class="sofia-havertz-inM"><?=$data['namaLengkap_user']?></p>
              <p class="item-1-234-567-890-Tjw"><?=$data['no_hp']?></p>
              <p class="long-island-newyork-united-states-AuF"><?=$data['alamat_ktp']?></p>
            </div>
          </div>
          <div class="content-s2y">
            <div class="title-aTB">
              <p class="alamat-sekarang-Vq3">Alamat Sekarang</p>
              <div class="button-dgM">
                <a href="edit_alamat.php"><img class="outline-edit-P9j" src="./assets/outline-edit.png"/></a>
                <p class="edit-vQZ">Edit</p>
              </div>
            </div>
            <div class="frame-746-yZs">
              <p class="sofia-havertz-inM"><?=$data['namaLengkap_user']?></p>
              <p class="item-1-234-567-890-Tjw"><?=$data['no_hp']?></p>
              <p class="long-island-newyork-united-states-AuF"><?=$data['alamat_sekarang']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-n5P">
    <div class="logo-and-links-vBb">
      <div class="logo-and-slogan-42u">
        <p class="legant-PL5">
          <span class="legant-PL5-sub-0">Perpus</span>
          <span class="legant-PL5-sub-1">A</span>
          <span class="legant-PL5-sub-2">pp</span>
          <span class="legant-PL5-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-fB7">
        </div>
        <p class="gift-decoration-store-CRw">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-8qP">
        <p class="home-HCV">Beranda</p>
        <p class="shop-Dbw">Perpustakaan Mitra</p>
        <div class="auto-group-uupv-kbs">Playlist</div>
        <p class="contact-us-4Mf">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-CTs">
      <div class="copyright-WUZ">
        <p class="copyright-2023-3legant-all-rights-reserved-SND">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-MVB">Privacy Policy</p>
        <p class="terms-of-use-VbP">Terms of Use</p>
      </div>
      <div class="social-icon-dhb">
        <img class="social-outline-instagram-Mdb" src="./assets/social-outline-instagram-jzy.png"/>
        <img class="social-outline-facebook-Vzh" src="./assets/social-outline-facebook-FWq.png"/>
        <img class="social-outline-youtube-EhP" src="./assets/social-outline-youtube-5Z3.png"/>
      </div>
    </div>
  </div>
</div>
</body>