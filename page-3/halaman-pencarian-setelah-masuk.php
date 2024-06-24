<?php 
session_start();
include 'config/db.php';
$pencarian_kata = @$_SESSION['books'];
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
  <script>
        function showtableOptions() {
            // Menampilkan pilihan tabel setelah tombol ditekan
            document.getElementById('tableOptions').style.display = 'block';
        }
    </script>
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
        <a href="halaman-utama-sebelum-masuk.html" class="button-aVP">
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
    <div class="icons-2Xj">
      <a href="halaman-akun.php"><img class="interface-outline-user-circle-aZF" src="./assets/interface-outline-user-circle-fBP.png"/></a>
      <div class="elements-navigation-cart-button-VgD">
        <a href="cart.html"><img class="outline-shopping-bag-ckq" src="./assets/outline-shopping-bag-sfo.png"/></a>
        <sup class="frame-3-kMF">4</sup>
      </div>
    </div> 
  </div>
  <div class="hero-pc1">
    <div class="auto-group-rj87-9PP">
      <form method="post" action="">
      <input type="text" name="cari" value="<?=$pencarian_kata?>" class="inputsearch-TQ5">
      <button  class="inputsearch-TQT">Cari</button>
      </form>
      <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $pas = $_POST['cari'];
  $_SESSION['books'] = $pass;
  $jl=0;
  $tes = mysqli_query($con, "SELECT * FROM wishlist 
WHERE id_user = '$id_login' AND isbn = '$_POST[wis]'") or die(mysqli_error($con));
  if (isset($_POST["wis"])){
    $pass = $_POST['wis'];
    while ($date = mysqli_fetch_array($tes)) {
      if ($_POST['wis'] = $date['ISBN']) {
        $jl=1;
      }
     }
    if ($jl = 0){
    $save = mysqli_query($con, "INSERT INTO wishlist VALUES('','$data2[id_user]','$pass') ");
    if ($save) {
  $_SESSION['books'] = $pencarian_kata;
      echo "<script type='text/javascript'>
      alert('Berhasil menambahkan buku ke wishlist');
      window.setTimeout(function(){ 
      } ,3000);
      setTimeout(function () { 
      
      swal('($d[namaTampilan_user]) ', 'Akun Telah Siap', {
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
  }  
  }
  if($jl = 1) {
  $_SESSION['books'] = $pencarian_kata;
    echo "<script type='text/javascript'>
      alert('Maaf buku telah ada di wishlist!!!');
      window.setTimeout(function(){ 
      } ,3000);
      setTimeout(function () { 
      
      swal('($d[namaTampilan_user]) ', 'Akun Telah Siap', {
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
  }
  }
  if (isset($_POST["play"])) {
  $_SESSION['books'] = $pencarian_kata;
    $pas = $_POST['play'];
    $selectedTable = $_POST["selected_table"];
    $sav = mysqli_query($con, "INSERT INTO playlist_books VALUES('','$selectedTable','$pas','') ");
    echo "<script>alert('Berhasil menambahkan buku ke playlist $selectedTable');
  window.location.href ='halaman-pencarian-setelah-masuk.php';
  </script>";
  }
  if (isset($_POST["detail"])) {
  $_SESSION['books'] = $_POST['detail'];
    echo "<script>
  window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
  </script>";
  }
   else {
      $pass = $_POST['cari']  ;
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
    }
}
}
?>
      <div class="main-cta-NvM">
        <div class="perpustakaan-untuk-semua-WFs">Perpustakaan Untuk Semua</div>
        <div class="sumber-pengetahuan-terlengkap-anda-dan-temui-dunia-baru-dengan-koleksi-besar-kami-tersedia-buku-buku-terbaik-dari-berbagai-genre-siap-untuk-dibaca-kapan-saja-selamat-datang-di-perpustakaan-digital-impian-DRB">
        Sumber Pengetahuan Terlengkap Anda dan Temui Dunia Baru dengan Koleksi Besar Kami. Tersedia Buku-buku Terbaik dari Berbagai Genre, Siap untuk Dibaca Kapan Saja. Selamat datang di perpustakaan digital impian!
        <br/>
        </div>
      </div>
    </div>
  </div>
  <?php
  $sqlw = mysqli_query($con, "SELECT * FROM books") or die(mysqli_error($con));
?>
        <form action="detail.php" method="post">

  <div class="categories-otD">
    <p class="kategori-jWy">Pencarian Buku</p>
    <div class="container-4ZF">
      <div class="auto-group-bqeb-1UV">
      <?php while ($dato = mysqli_fetch_array($sqlw)) { 
          if (stristr($dato['Deskripsi'], $pencarian_kata)) {?>
        <div class="shot-YUP">
          <div class="thumbnail-gqX">
            <img class="overlay-qiP" src="./assets/buku/<?=$dato['Cover']?>"/>
          </div>
          <div class="avatar-name-Akh">
            <div class="name-WJm">Buku <?=$dato['Judul']?></div>
          </div>
          <button type="submit" value="<?=$dato['ISBN']?>" name="wis" class="badge-Ekt">Wishlist</button>
          <select name="selected_table" id="selected_table">
        <option value="" disabled selected>- pilih -</option>
        <?php 
  $mapel = mysqli_query($con,"SELECT * FROM playlists WHERE id_user = '$id_login'");

												while ($datr = mysqli_fetch_array($mapel)) { ?>
												<option value="<?=$datr['id_playlist']?>"><?=$datr['nama_playlist']?></option>
												<?php }
												 ?>
    </select>
          <button type="submit" value="<?=$dato['ISBN']?>" name="play"  class="badge-Ekr">Playlist</button>
          <button type="submit" value="<?=$dato['ISBN']?>" name="detail" class="badge-Ekr">Detail Buku</button>
        </div>
        <?php 
          }}
          ?>
      </form>
      <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST["wis"])){
    $pass = $_POST['wis'];
    $save = mysqli_query($con, "INSERT INTO wishlist VALUES('','$d[id_user]','$pass') ");
    if ($save) {
      echo "<script type='text/javascript'>
      alert('Berhasil menambahkan buku ke wishlist');
      setTimeout(function () { 
      
      swal('($d[namaTampilan_user]) ', 'Akun Telah Siap', {
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
  }
else {
  echo "<script>alert('Password anda tidak sama dengan konfirmasi password anda');
  window.location.href ='halaman-buat-akun.php';
  </script>";
}
  }
  else {
    echo "<script>alert('Password anda tidak sama dengan konfirmasi password anda');
  window.location.href ='halaman-utaman-setelah-masuk.php';
  </script>";
  }
    // $pass = $_POST['id'];
    // $sqlCek = mysqli_query($con, "SELECT * FROM mitra WHERE id_mitra='$_POST[id]'");
    // $jml = mysqli_num_rows($sqlCek);
    // $d = mysqli_fetch_array($sqlCek);
    // if ($jml > 0) {
    //     $_SESSION['mitra'] = $d['id_mitra'];
    //     echo "<script type='text/javascript'>
    //     setTimeout(function () { 
        
    //     swal('($d[namaTampilan_user]) ', 'Login berhasil', {
    //     icon : 'success',
    //     buttons: {        			
    //     confirm: {
    //     className : 'btn btn-success'
    //     }
    //     },
    //     });    
    //     },10);  
    //     window.setTimeout(function(){ 
    //     } ,3000);   
    //     window.location.href ='halaman-deskripsi-perpustakaan-setelah-masuk.php';
    //     </script>";
    // } 
}
?>
      </div>
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