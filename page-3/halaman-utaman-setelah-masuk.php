<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sqli = mysqli_query($con, "SELECT * FROM books ") or die(mysqli_error($con));
$sqle = mysqli_query($con, "SELECT * FROM populer
JOIN books ON books.ISBN = populer.ISBN
JOIN kategori ON kategori.id_kategori = populer.id_kategori") or die(mysqli_error($con));
$dat= mysqli_fetch_array($sqle);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Utaman Setelah Masuk</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-utaman-setelah-masuk.css"/>
</head>
<body>
<div class="halaman-utaman-setelah-masuk-22d">
  <div class="navigation-bar-K1j">
    <div class="auto-group-vp8o-R4m">
      <p class="legant-Y9P">
        <span class="legant-Y9P-sub-0">Perpus</span>
        <span class="legant-Y9P-sub-1">A</span>
        <span class="legant-Y9P-sub-2">pp</span>
      </p>
      <div class="elements-navigation-link-group--3EZ">
        <a href="halaman-utaman-setelah-masuk.php" class="button-aVP">
          <div class="content-YBK">Beranda</div>
        </a>
        <div class="elements-navigation-link--eEM">
          <div class="button-PBw">
            <a href="halaman-perpustakaan-mitra-setelah-masuk.php" class="content-wz9">Perpustakaan Mitra</a>
          </div>
        </div>
        <div class="auto-group-g6z1-f9T">
          <div class="elements-navigation-link--1j7">
            <div class="button-wsf">
              <a href="halaman-playlist-setelah-masuk.php" class="content-hbw">Playlist</a>
            </div>
          </div>
          <div class="elements-navigation-link--z5F">
            <a href="halaman-kontak-kami-setelah-masuk.html" class="button-vUh">Hubungi Kami</a>
          </div>
        </div>
      </div>
    </div>
    <div class="icons-2Xj" style="margin-left: -50px;">
      <a href="tunggu-reservasi.php" style="text-decoration: none;">Reserssvasi<img class="interface-outline-user-circle-aZF" src="./assets/icon.png"/></a>
      <a href="halaman-akun.php"><img class="interface-outline-user-circle-aZF" src="./assets/interface-outline-user-circle-fBP.png"/></a>
      <div class="elements-navigation-cart-button-VgD">
        <a href="cart.php"><img class="outline-shopping-bag-ckq" src="./assets/outline-shopping-bag-sfo.png"/></a>
        <sup class="frame-3-kMF">4</sup>
      </div>
    </div> 
  </div>
  <div class="hero-pc1">
    <div class="auto-group-rj87-9PP">
      <form method="post" action="">
      <input type="text" name="cari" placeholder="Cari buku....." class="inputsearch-TQ5">
      <button  class="inputsearch-TQT">Cari</button>
      </form>
      <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['cari'];
    $sqlCek = mysqli_query($con, "SELECT * FROM books");
    $jml = mysqli_num_rows($sqlCek);
    $d = mysqli_fetch_array($sqlCek);
    if ($jml > 0) {
        $_SESSION['books'] = $pass;
        echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk $pass');
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
        window.location.href ='halaman-pencarian-setelah-masuk.php';
        </script>";
    } else {
      echo '<script>alert("Anda Gagal Masuk");</script>';
    }
}
?>
      </input>
      <div class="main-cta-NvM">
        <div class="perpustakaan-untuk-semua-WFs">Perpustakaan Untuk Semua</div>
        <div class="sumber-pengetahuan-terlengkap-anda-dan-temui-dunia-baru-dengan-koleksi-besar-kami-tersedia-buku-buku-terbaik-dari-berbagai-genre-siap-untuk-dibaca-kapan-saja-selamat-datang-di-perpustakaan-digital-impian-DRB">
        Sumber Pengetahuan Terlengkap Anda dan Temui Dunia Baru dengan Koleksi Besar Kami. Tersedia Buku-buku Terbaik dari Berbagai Genre, Siap untuk Dibaca Kapan Saja. Selamat datang di perpustakaan digital impian!
        <br/>
        </div>
      </div>
    </div>
  </div>
  <div class="product-carousel-ycd">
    <div class="title-uWH">
      <p class="rekomendasi-E2m">Rekomendasi</p>
      <div class="navigation-dots-jkD">
      </div>
    </div>
    <form action="detail.php" method="post">
    <div class="product-card-riM">
      <div class="auto-group-n3fq-1LM">
      <?php while ($data = mysqli_fetch_array($sqli)) { ?>
        <div class="product-card-8A5">
            <div class="auto-group-vspy-oX7">
              <div class="badges-Yjb">
                <div><img src="assets/buku/<?=$data['Cover']?>" class="image-placeholder-HHs" >
                <div class="textprice-P7w">
                  <div class="auto-group-ut7h-KnH">
                    <div class="rating-rating-group-GBj">
                      <img class="star-icon-Pn9" src="./assets/star-icon-12Z.png"/>
                      <img class="star-icon-3Lu" src="./assets/star-icon-eZX.png"/>
                      <img class="star-icon-P9s" src="./assets/star-icon-wKP.png"/>
                      <img class="star-icon-XG5" src="./assets/star-icon-CJd.png"/>
                      <img class="star-icon-sKw" src="./assets/star-icon-o2h.png"/>
                    </div>
                    <p class="bintang-1S9"><?=$data['Judul']?></p>
                  </div>
                  <div class="price-9HT"><?=$data['Penulis']?></div>
                </div>
              </div>
            </div>            
          </div>
        <button type="submit" name="detail" value="<?=$data['ISBN']?>" class="button-hover-mMT">Detail</button>
        </div>
        <?php }?>
        </div>
    </div>
  </div>
  <div class="banner-e4H">
    <img class="buku5-1-NW5" src="./assets/buku/<?=$dat['Cover']?>"/>
    <div class="content-JPj">
      <div class="title-RjF">
        <p class="sale-N8h">buku populer minggu ini!</p>
        <p class="title-WVo"><?=$dat['Judul']?></p>
        <p class="title-r3s"><?=$dat['Penulis']?></p>
        <p class="phosfluorescently-en-ny7"><?=$dat['Deskripsi']?></p>
      </div>
      <button type="submit" name="det" value="<?=$dat['ISBN']?>" class="timer-j7f">Lihat selengkapnya</button>
    </div>
  </div>
  <?php
  $sqlw = mysqli_query($con, "SELECT * FROM kategori") or die(mysqli_error($con));
  ?>
  <div class="categories-otD">
    <p class="kategori-jWy">Kategori</p>
    <div class="container-4ZF">
      <div class="auto-group-bqeb-1UV">
      <?php while ($dato = mysqli_fetch_array($sqlw)) { ?>
        <div class="shot-YUR">
          <div class="thumbnail-gqX">
            <button type="submit" name="kat" value="<?=$dato['id_kategori']?>"><img class="overlay-qiR" src="./assets/kategori/<?=$dato['foto']?>"/></button>
          </div>
          <div class="avatar-name-Akh">
            <div class="name-WJm">Buku <?=$dato['nama_kategori']?></div>
            <div class="badge-EkZ">Pro</div>
          </div>
        </div>
        <?php }?>
      </div>
    </form>
    </div>
  </div>
  <div class="footer-WFK">
    <div class="logo-and-links-Eh7">
      <div class="logo-and-slogan-aFB">
        <p class="legant-XAR">
          <span class="legant-XAR-sub-0">Perpus</span>
          <span class="legant-XAR-sub-1">A</span>
          <span class="legant-XAR-sub-2">pp</span>
          <span class="legant-XAR-sub-3">
          <br/>
          </span>
        </p>
        <div class="rectangle-319-Yjj">
        </div>
        <p class="gift-decoration-store-gb3">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-Day">
        <p class="home-m6h">Beranda</p>
        <p class="shop-th7">Perpustakaan Mitra</p>
        <div class="auto-group-efqw-2oK">Playlist</div>
        <p class="contact-us-LZ7">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-g7B">
      <div class="copyright-nR7">
        <p class="copyright-2023-3legant-all-rights-reserved-7iH">Copyright © 2023 PerpusApp All rights reserved</p>
        <p class="privacy-policy-QxH">Privacy Policy</p>
        <p class="terms-of-use-ZKP">Terms of Use</p>
      </div>
      <div class="social-icon-HmB">
        <a href="https://www.instagram.com/aldinsh__/"><img class="social-outline-instagram-cYZ" src="./assets/social-outline-instagram-No3.png"/></a>
        <img class="social-outline-facebook-9YV" src="./assets/social-outline-facebook-frH.png"/>
        <img class="social-outline-youtube-h4D" src="./assets/social-outline-youtube-6D7.png"/>
      </div>
    </div>
  </div>
</div>
</body>