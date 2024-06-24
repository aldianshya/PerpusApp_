<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$sqli = mysqli_query($con, "SELECT * FROM playlists
JOIN users ON users.id_user = playlists.id_user") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Playlist Setelah Masuk</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="./styles/halaman-playlist-setelah-masuk.css" />
</head>

<body>
  <div class="halaman-playlist-setelah-masuk-BTF">
    <div class="navigation-bar-6KK">
      <div class="logo-zvV">
        <span class="logo-zvV-sub-0">Perpus</span>
        <span class="logo-zvV-sub-1">A</span>
        <span class="logo-zvV-sub-2">pp</span>
      </div>
      <div class="elements-navigation-link-group--rbK">
        <div class="elements-navigation-link--AM7">
          <div class="button-iNd">
            <div class="content-HRj">Beranda</div>
          </div>
        </div>
        <div class="elements-navigation-link--avd">
          <div class="button-Xqs">
            <div class="content-W3b">Perpusatakaan Mitra</div>
          </div>
        </div>
        <div class="auto-group-shgx-ooP">
          <div class="button-9cM">
            <div class="content-tpq">Playlist</div>
          </div>
          <div class="elements-navigation-link--aSm">
            <div class="button-iYy">Kontak Kami</div>
          </div>
        </div>
      </div>
      <div class="icons-dA9">
        <div class="auto-group-fb5d-BhT">
          <img class="interface-outline-search-02-udT" src="./assets/interface-outline-search-02-i1X.png" />
          <img class="interface-outline-user-circle-3Ds" src="./assets/interface-outline-user-circle-Xs7.png" />
        </div>
        <div class="elements-navigation-cart-button-mff">
          <img class="outline-shopping-bag-gnd" src="./assets/outline-shopping-bag-wW1.png" />
          <div class="frame-3-pP3">4</div>
        </div>
      </div>
    </div>
    <div class="auto-group-egew-VEH">
      <div class="image-placeholder-header-cph">
        <div class="title-jPX">
          <div class="breadcrumbs-link-group-HA9">
            <div class="breadcrumbs-button-af3">
              <p class="link-8Am">Beranda</p>
              <img class="icon-chevron-right-TD3" src="./assets/icon-chevron-right-AgH.png" />
            </div>
            <div class="auto-group-jljv-PcV">Playlist</div>
          </div>
          <p class="playlist-hdB">Playlist</p>
          <p class="kreasikan-playlist-mu-sesuka-hatimu-oRK">Kreasikan playlist-mu sesuka hatimu</p>
        </div>
      </div>
      <div class="grids-W4q">
        <div class="toolbar-GJu">
          <div class="dropdown1-opd">
            <p class="buat-playlist-xxR">Buat Playlist</p>
            <img class="icon-plus-circle-VxM" src="./assets/icon-plus-circle-K5T.png" />
          </div>
          <div class="button-1vh">
            <div class="content-ZSR">Sort by</div>
            <img class="icon-chevron-down-Gbj" src="./assets/icon-chevron-down-xzD.png" />
          </div>
        </div>
        <form action="" method="post">

        <div class="product-QT3">
          <div class="list-9fX">
            <?php while ($data = mysqli_fetch_array($sqli)) { ?>
              <div class="row-01-hBF">
                <div class="elements-card-41o">
                  <div class="content-NYH">
                    <div class="textprice-WPb">
                      <p class="angel-book-4R7"><?= $data['nama_playlist'] ?></p>
                      <p class="by-farhan-nc1">by <?=$data['namaTampilan_user']?></p>
                    </div>
                  </div>
                  <div class="elements-card-uAq">
                    <div class="image-placeholder-TCM">
                      <button type="submit" value="<?=$data['id_playlist']?>" name="id"><img class="paste-image-o1K" src="./assets/paste-image-zKb.png" /></button>
                    </div>
                  </div>
                </div>
          </div>
          <?php } ?>
          </form>
          <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $pass = $_POST['id'] ;
              $sqlCek = mysqli_query($con, "SELECT * FROM playlists WHERE id_playlist='$_POST[id]'");
              $jml = mysqli_num_rows($sqlCek);
              $d = mysqli_fetch_array($sqlCek);
              if ($jml > 0) {
                  $_SESSION['playlists'] = $_POST['id'];
                  echo "<script type='text/javascript'>
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
                  window.location.href ='halaman-detail-playlist-5qb.php';
                  </script>";
              } 
          }
          ?>
        <div class="button-ZLV">Lebih banyak</div>
            </div>
      </div>
      </div>
    </div>
    <div class="footer-zRo">
      <div class="logo-and-links-8H7">
        <div class="logo-and-slogan-U65">
          <p class="legant-1bo">
            <span class="legant-1bo-sub-0">Perpus</span>
            <span class="legant-1bo-sub-1">A</span>
            <span class="legant-1bo-sub-2">pp</span>
            <span class="legant-1bo-sub-3">
              <br />
            </span>
          </p>
          <div class="rectangle-319-4yP">
          </div>
          <p class="gift-decoration-store-QGZ">Pinjam dan Reservasi Buku Online!</p>
        </div>
        <div class="nav-8yF">
          <p class="home-GpZ">Beranda</p>
          <p class="shop-Qfs">Perpustakaan Mitra</p>
          <div class="auto-group-5bwh-YXB">Playlist</div>
          <p class="contact-us-DtD">Hubungi Kami</p>
        </div>
      </div>
      <div class="bottom-bar-YvV">
        <div class="copyright-4P3">
          <p class="copyright-2023-3legant-all-rights-reserved-nK3">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-VjF">Privacy Policy</p>
          <p class="terms-of-use-2z5">Terms of Use</p>
        </div>
        <div class="social-icon-mgm">
          <img class="social-outline-instagram-u2H" src="./assets/social-outline-instagram-nt9.png" />
          <img class="social-outline-facebook-RmK" src="./assets/social-outline-facebook-6js.png" />
          <img class="social-outline-youtube-xmF" src="./assets/social-outline-youtube-JoB.png" />
        </div>
      </div>
    </div>
  </div>
</body>