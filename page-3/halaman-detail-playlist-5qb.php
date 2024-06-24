<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$id = @$_SESSION['playlists'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sqli = mysqli_query($con, "SELECT * FROM playlists
JOIN users ON users.id_user = playlists.id_user
WHERE playlists.id_playlist = '$id'") or die(mysqli_error($con));
$data1 = mysqli_fetch_array($sqli);
$sql = mysqli_query($con,  "SELECT * FROM playlist_books 
JOIN playlists ON playlists.id_playlist = playlist_books.id_playlist
JOIN books ON books.ISBN = playlist_books.ISBN
WHERE playlists.id_playlist = '$id'") or die(mysqli_error($con)); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Detail Playlist</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="./styles/halaman-detail-playlist-5qb.css"/>
</head>
<body>
<div class="halaman-detail-playlist-xuF">
  <div class="navigation-bar-rjj">
    <div class="logo-Ze9">
      <span class="logo-Ze9-sub-0">Perpus</span>
      <span class="logo-Ze9-sub-1">A</span>
      <span class="logo-Ze9-sub-2">pp</span>
    </div>
    <div class="elements-navigation-link-group--R45">
      <div class="elements-navigation-link--uV3">
        <div class="button-Szm">
          <div class="content-Qgh">Beranda</div>
        </div>
      </div>
      <div class="elements-navigation-link--utM">
        <div class="button-StH">
          <div class="content-DPF">Perpusatakaan Mitra</div>
        </div>
      </div>
      <div class="auto-group-laxj-Kx5">
        <div class="button-5RT">
          <div class="content-E3T">Playlist</div>
        </div>
        <div class="elements-navigation-link--iUR">
          <div class="button-FUM">Kontak Kami</div>
        </div>
      </div>
    </div>
    <div class="icons-ZE9">
      <div class="auto-group-o6jo-v4h">
        <img class="interface-outline-search-02-eWV" src="./assets/interface-outline-search-02-sMT.png"/>
        <img class="interface-outline-user-circle-Ajj" src="./assets/interface-outline-user-circle-LbB.png"/>
      </div>
      <div class="elements-navigation-cart-button-uSR">
        <img class="outline-shopping-bag-pZP" src="./assets/outline-shopping-bag-UPj.png"/>
        <div class="frame-3-kxq">4</div>
      </div>
    </div>
  </div>
  <div class="content-Ed7">
    <div class="frame-749-md3">
      <div class="auto-group-nk3u-Vow">
        <div class="frame-751-11b">
          <img class="beautiful-kitten-with-flowers-outdoors-1-kE5" src="./assets/paste-image-zKb.png" alt="">
        </div>
      </div>
      <p class="angel-book-4Em"><?=$data1['nama_playlist']?></p>
      <p class="by-farhan-ycd">by <?=$data1['namaTampilan_user']?></p>
      <div class="lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-integer-nec-odio-praesent-libero-sed-cursus-ante-dapibus-diam-hoX">
      <?=$data1['deskripsi_playlist']?> 
      <br/>
      </div>
    </div>
    <form action="" method="post">
    <div class="content-acR">
      <div class="content-WW5">
        <div class="caption-FiZ">
          <p class="nama-buku-NoB">Nama Buku</p>
          <p class="provinsi-iMF">Stok</p>
        </div>
        <?php while ($data = mysqli_fetch_array($sql)) { 
          $id_1 = $data['ISBN']?>
        <div class="item-dz1">
          <div class="content-Mf7">
            <div class="image-placeholder-6Mo">
              <img class="paste-image-pYh" src="./assets/paste-image-Tnq.png"/>
            </div>
            <div class="product-83b">
              <p class="hujan-qih"><?=$data['Judul']?></p>
              <p class="tere-liye-kKs"><?=$data['Penulis']?></p>
            </div>
          </div>
          <?php $sql2 = mysqli_query($con,  "SELECT * FROM stok_buku 
JOIN books ON books.ISBN = stok_buku.ISBN
JOIN mitra ON mitra.id_mitra = stok_buku.id_mitra
WHERE stok_buku.ISBN = '$id_1'") or die(mysqli_error($con));
$data2 = mysqli_fetch_array($sql2);
?>
          <p class="perpustakaan-universitas-jambi-Tzy"><?=$data2['stok']?></p>
          <button type="submit" value="<?=$data['ISBN']?>" name="detail" class="button-h8d">Detail Buku</button>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  </form>
  <?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST["detail"])) {
      $_SESSION['books'] = $_POST['detail'];
      $_SESSION['users'] = $d['id_user'];
        echo "<script>
      window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
      </script>";
      }
  }
  ?>
  <div class="footer-amP">
    <div class="logo-and-links-Wuw">
      <div class="logo-and-slogan-3Q5">
        <div class="logo-ncZ">
          <span class="logo-ncZ-sub-0">Perpus</span>
          <span class="logo-ncZ-sub-1">A</span>
          <span class="logo-ncZ-sub-2">pp</span>
          <span class="logo-ncZ-sub-3">
          
          <br/>
          
          </span>
        </div>
        <div class="rectangle-319-CJu">
        </div>
        <p class="gift-decoration-store-Y7s">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-5Nh">
        <p class="home-ctR">Beranda</p>
        <p class="shop-MLD">Perpustakaan Mitra</p>
        <div class="auto-group-fgrf-tqw">Playlist</div>
        <p class="contact-us-cG9">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-YQh">
      <div class="copyright-Fa1">
        <p class="copyright-2023-3legant-all-rights-reserved-nK3">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-hgu">Privacy Policy</p>
        <p class="terms-of-use-eMF">Terms of Use</p>
      </div>
      <div class="social-icon-nTT">
        <img class="social-outline-instagram-Jgh" src="./assets/social-outline-instagram-RwP.png"/>
        <img class="social-outline-facebook-FM3" src="./assets/social-outline-facebook-7Dj.png"/>
        <img class="social-outline-youtube-PTF" src="./assets/social-outline-youtube-E2M.png"/>
      </div>
    </div>
  </div>
</div>
</body>