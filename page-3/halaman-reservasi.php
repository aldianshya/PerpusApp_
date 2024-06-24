<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$id = @$_SESSION['books'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sql1 = mysqli_query($con, "SELECT * FROM cart 
JOIN users ON users.id_user = cart.id_user
JOIN books ON books.ISBN = cart.ISBN
JOIN mitra ON mitra.id_mitra = cart.id_mitra
WHERE cart.id_user = '$id_login' AND cart.id_mitra = '$id'") or die(mysqli_error($con));
$sql2 = mysqli_query($con, "SELECT * FROM cart 
JOIN users ON users.id_user = cart.id_user
JOIN books ON books.ISBN = cart.ISBN
JOIN mitra ON mitra.id_mitra = cart.id_mitra
WHERE cart.id_user = '$id_login' AND cart.id_mitra = '$id'") or die(mysqli_error($con));
        $tanggal = date("Y-m-d");
$total = mysqli_num_rows($sql1);
$sat = mysqli_fetch_array($sql2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Reservasi</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-reservasi.css"/>
</head>
<body>
<div class="halaman-reservasi-z6D">
  <div class="navigation-bar-7gd">
    <p class="legant-pb3">
      <span class="legant-pb3-sub-0">Perpus</span>
      <span class="legant-pb3-sub-1">A</span>
      <span class="legant-pb3-sub-2">pp</span>
    </p>
    <div class="elements-navigation-link-group--1Z3">
      <div class="elements-navigation-link--7MB">
        <div class="button-fNh">
          <div class="content-q2H">Beranda</div>
        </div>
      </div>
      <div class="elements-navigation-link--Xfo">
        <div class="button-fn1">
          <div class="content-EKK">Perpustakaan Mitra</div>
        </div>
      </div>
      <div class="auto-group-yty7-k2m">
        <div class="elements-navigation-link--5qj">
          <div class="button-poK">
            <div class="content-nVF">Playlist</div>
          </div>
        </div>
        <div class="elements-navigation-link--Uss">
          <div class="button-RHK">Hubungi Kami</div>
        </div>
      </div>
    </div>
    <div class="icons-KtV">
      <div class="auto-group-6aqq-V2H">
        <img class="interface-outline-search-02-p4Z" src="./assets/interface-outline-search-02-zNM.png"/>
        <img class="interface-outline-user-circle-Lob" src="./assets/interface-outline-user-circle-GvD.png"/>
      </div>
      <div class="elements-navigation-cart-button-Ueu">
        <img class="outline-shopping-bag-Q2m" src="./assets/outline-shopping-bag-2ws.png"/>
        <div class="frame-3-w2h">4</div>
      </div>
    </div>
  </div>
  <form action="reservasi.php" method="post">
  <div class="cart-BBw">
    <p class="reservasi-iSm">Reservasi</p>
    <div class="cart-cHF">
      <div class="form-MEq">
        <div class="form-reservasi-6TK">
          <p class="tanggal-peminjaman-265">Tanggal Peminjaman</p>
          <div class="card-Z61">
            <div class="frame-741-uQm">
              <input type="date" name="tgl" class="elements-rau">
              </input>
            </div>
            <div class="street-Zdj">
              <p class="catatan-XKf">Catatan</p>
              <textarea class="input-TUD" name="catatan" placeholder="Beri catatan peminjaman"></textarea>
            </div>
          </div>
        </div>
        <button type="submit" name="simpan" value="<?=$id?>" class="button-tZX">Reservasi</button>
      </div>
      <div class="elements-checkout-order-summary-n97">
        <p class="ringkasan-peminjaman-tC9">Ringkasan Reservasi</p>
        <div class="productscoupon-yDb">
          <div class="perpustakaan-pertama-8MP">
            <p class="perpustakaan-universitas-jambi-fcD"><?=$sat['nama_mitra']?></p>
          <?php while ($data = mysqli_fetch_array($sql1)) { ?>
            <div class="elements-cart-product-cell-BaZ">
              <div class="content-W73">
                <div class="image-placeholder-fVj">
                  <img class="paste-image-cfs" src="./assets/buku/<?=$data['Cover']?>"/>
                </div>
                <div class="info-9Qu">
                  <div class="product-VzZ">
                    <p class="tray-table-FD3"><?=$data['Penerbit']?> - <?=$data['Judul']?></p>
                    <p class="color-black-b21"><?=$data['Penulis']?></p>
                  </div>
                  <div class="price-uoP">
                    <img class="icons-close-line-FsF" src="./assets/icons-close-line-MPw.png"/>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <div class="auto-group-rksf-4bj">
              <p class="total-buku-3-Gjj">Total Buku : <?=$total?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <div class="footer-apH">
    <div class="logo-and-links-KWy">
      <div class="logo-and-slogan-Tt5">
        <p class="legant-DMT">
          <span class="legant-DMT-sub-0">Perpus</span>
          <span class="legant-DMT-sub-1">A</span>
          <span class="legant-DMT-sub-2">pp</span>
          <span class="legant-DMT-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-4WV">
        </div>
        <p class="gift-decoration-store-xLy">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-HGm">
        <p class="home-bYM">Beranda</p>
        <p class="shop-uow">Perpustakaan Mitra</p>
        <div class="auto-group-roqf-djw">Playlist</div>
        <p class="contact-us-j2H">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-TU5">
      <div class="copyright-N5F">
        <p class="copyright-2023-3legant-all-rights-reserved-HT7">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-Ca5">Privacy Policy</p>
        <p class="terms-of-use-LAV">Terms of Use</p>
      </div>
      <div class="social-icon-fTf">
        <img class="social-outline-instagram-P8m" src="./assets/social-outline-instagram-o7P.png"/>
        <img class="social-outline-facebook-iwj" src="./assets/social-outline-facebook-Mg5.png"/>
        <img class="social-outline-youtube-3DK" src="./assets/social-outline-youtube-4sK.png"/>
      </div>
    </div>
  </div>
</div>
</body>