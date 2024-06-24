<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$id = @$_SESSION['books'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sql1 = mysqli_query($con, "SELECT * FROM buku_reservasi_unconfir
JOIN books ON books.ISBN = buku_reservasi_unconfir.ISBN
JOIN reservasi ON reservasi.id_reservasi = buku_reservasi_unconfir.id_reservasi
JOIN mitra ON mitra.id_mitra = buku_reservasi_unconfir.id_mitra
WHERE buku_reservasi_unconfir.id_reservasi = '$id'") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Cart</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/cart.css"/>
</head>
<body>
<div class="cart-oaH">
  <div class="navigation-bar-wRb">
    <div class="logo-3Ud">
      <span class="logo-3Ud-sub-0">Perpus</span>
      <span class="logo-3Ud-sub-1">A</span>
      <span class="logo-3Ud-sub-2">pp</span>
    </div>
    <div class="elements-navigation-link-group--6rD">
      <div class="elements-navigation-link--d5T">
        <div class="button-Zjo">
          <a href="halaman-utaman-setelah-masuk.php" class="content-Kys" style="text-decoration: none;">Beranda</a>
        </div>
      </div>
      <div class="elements-navigation-link--cxy">
        <div class="button-wkM">
          <a href="halaman-perpustakaan-mitra-setelah-masuk.php" class="content-6dF" style="text-decoration: none;">Perpustakaan Mitra</a>
        </div>
      </div>
      <div class="auto-group-aedy-mDb">
        <div class="elements-navigation-link--72Z">
          <div class="button-Ess">
            <a href="halaman-playlist-setelah-masuk.php" class="content-Q1f" style="text-decoration: none;">Playlist</a>
          </div>
        </div>
        <div class="elements-navigation-link--VYu">
          <a href="halaman-kontak-kami-setelah-masuk.php" class="button-2oj" style="text-decoration: none;">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <div class="icons-wfo">
      <div class="auto-group-dar9-VxD">
        <a href="halaman-akun.php"><img class="interface-outline-user-circle-A2m" src="./assets/interface-outline-user-circle-R6Z.png"/></a>
      </div>
      <div class="elements-navigation-cart-button-VKw">
        <a href="cart.php"><img class="outline-shopping-bag-Qho" src="./assets/outline-shopping-bag-hZ3.png"/></a>
        <div class="frame-3-Yp1">4</div>
      </div>
    </div>
  </div>
  <div class="cart-c3B">
    <p class="cart-jtV">Reservasi</p>
    <div class="cart-3eH">
      <div class="cart-bQu">
        <div class="table-header-XpM">
         
        </div>
        <form action="" method="post">
        <table  class="elements-cart-product-cell-3fX">
          <tr>
            <th class="buku-FVT">Buku</th>
            <th></th>
            <th class="perpustakaan-ywF">Perpustakaan</th>
          </tr>
          <?php while ($data = mysqli_fetch_array($sql1)) { ?>
          <tr>
            <td><img class="paste-image-CN5" src="./assets/buku/<?=$data['Cover']?>"/></td>
            <td><p class="tere-liye-bumi-Xj7"><?=$data['Penulis']?> - <?=$data['Judul']?></p></td>
            <td><p class="perpustakaan-universitas-jambi-mCD">
              <?=$data['nama_mitra']?>
              </p></td>
              <td><button style="background-image: none;" class="get-started-rQ0" type="submit" value="<?=$data['ISBN']?>" name="detail" >Selengkapnya...</button></td>
          </tr>
          <?php } ?>
          </table>
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
    if (isset($_POST["pinjam"])) {
      $_SESSION['books'] = $id;
      $_SESSION['users'] = $id_login;
        echo "<script>
        alert('Peminjaman dilakukan');
      window.location.href ='peminjaman-berhasil.php';
      </script>";
      }
    if (isset($_POST["reservasi"])) {
      $_SESSION['books'] = $id;
      $_SESSION['users'] = $id_login;
        echo "<script>
      window.location.href ='halaman-reservasi.php';
      </script>";
      }
  }
  ?>
      </div>
    </div>
  </div>
  <div class="footer-WRw">
    <div class="logo-and-links-2fB">
      <div class="logo-and-slogan-AWV">
        <p class="legant-i2D">
          <span class="legant-i2D-sub-0">Perpus</span>
          <span class="legant-i2D-sub-1">A</span>
          <span class="legant-i2D-sub-2">pp</span>
          <span class="legant-i2D-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-B4D">
        </div>
        <p class="gift-decoration-store-KAR">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-T1j">
        <p class="home-CED">Beranda</p>
        <p class="shop-vvu">Perpustakaan Mitra</p>
        <div class="auto-group-nffz-5J1">Playlist</div>
        <p class="contact-us-nTK">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-Ki9">
      <div class="copyright-diq">
        <p class="copyright-2023-3legant-all-rights-reserved-ACy">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-t8y">Privacy Policy</p>
        <p class="terms-of-use-cKs">Terms of Use</p>
      </div>
      <div class="social-icon-YzD">
        <img class="social-outline-instagram-GfK" src="./assets/social-outline-instagram-Svm.png"/>
        <img class="social-outline-facebook-177" src="./assets/social-outline-facebook-17o.png"/>
        <img class="social-outline-youtube-k4h" src="./assets/social-outline-youtube-UhX.png"/>
      </div>
    </div>
  </div>
</div>
</body>