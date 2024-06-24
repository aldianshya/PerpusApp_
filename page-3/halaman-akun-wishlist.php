<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sqli = mysqli_query($con, "SELECT * FROM wishlist
JOIN users ON users.id_user = wishlist.id_user
JOIN books ON books.isbn = wishlist.isbn
 WHERE wishlist.id_user = '$id_login'") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Akun/wishlist</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="./styles/halaman-akun-wishlist.css" />
</head>

<body>
  <div class="halaman-akun-wishlist-yLV">
    <div class="navigation-bar-Uo3">
      <div class="logo-zFb">
        <span class="logo-zFb-sub-0">Perpus</span>
        <span class="logo-zFb-sub-1">A</span>
        <span class="logo-zFb-sub-2">pp</span>
      </div>
      <div class="elements-navigation-link-group--dhs">
        <div class="elements-navigation-link--Y49">
          <div class="button-HGd">
            <a href="halaman-utaman-setelah-masuk.php" style="text-decoration: none;"  class="content-3Wh">Beranda</a>
          </div>
        </div>
        <div class="elements-navigation-link--wc5">
          <div class="button-tGR">
            <a href="halaman-perpustakaan-mitra-setelah-masuk.php"  style="text-decoration: none;" class="content-eWV">Perpustakaan Mitra</a>
          </div>
        </div>
        <div class="auto-group-oyfh-mLD">
          <div class="elements-navigation-link--uxD">
            <div class="button-FmB">
              <a href="#" style="text-decoration: none;" class="content-QPB">Playlist</a>
            </div>
          </div>
          <div class="elements-navigation-link--VfX">
            <a href="#" style="text-decoration: none;" class="button-pho">Hubungi Kami</a>
          </div>
        </div>
      </div>
      <div class="icons-LAM">
        <div class="auto-group-64g3-VZ3">
          <a href="halaman-akun.php" style="text-decoration:none;"><img class="interface-outline-user-circle-M5T" src="./assets/interface-outline-user-circle-Yid.png" /></a>
        </div>
        <div class="elements-navigation-cart-button-5GM">
          <img class="outline-shopping-bag-zu7" src="./assets/outline-shopping-bag-m5b.png" />
          <div class="frame-3-jLu">4</div>
        </div>
      </div>
    </div>
    <div class="content-bP7">
      <p class="akun-saya-L5o">Akun Saya</p>
      <div class="content-EBB">
        <div class="menu-mS1">
          <div class="frame-743-hKf">
            <div class="elements-menu-avatar-edit-pfB">
              <div class="avatar-wUu">
                <div class="border-radius-light-solid-pill-ghP">
                  <img class="image-329" src="./assets/user/<?= $d['foto_user'] ?>" />
                </div>
              </div>
            </div>
            <p class="sofia-havertz-TLm"><?= $d['namaTampilan_user'] ?></p>
          </div>
          <div class="frame-742-C3T">
            <a href="halaman-akun.php" style="text-decoration: none;" class="elements-jJH">Akun</a>
            <a href="halaman-akun-alamat.php" style="text-decoration: none;" class="elements-qMK">Alamat</a>
            <a href="halaman-akun-riwayat-peminjaman.php" style="text-decoration: none;" class="elements-wv9">Riwayat Peminjaman</a>
            <a href="halaman-akun-wishlist.php" style="text-decoration: none;" class="elements-g73">Wishlist</>
            <a href="halaman-masuk.php" style="text-decoration: none;"  class="elements-nfs">Keluar</a>
          </div>
        </div>
        <div class="wishlist-H6q">
          <p class="wishlist-dgV">Wishlist</p>
          <div class="content-mXo">
            <div class="item-vfb">
              <?php while ($data = mysqli_fetch_array($sqli)) { ?>
                <div class="cart-item-TfX">
                  <form action="" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    <button type="submit" value="<?= $data['id_wishlist'] ?>" name="hapus">
                      <img class="icons-close-line-QKs" src="./assets/icons-close-line-Xn9.png" />
                    </button>
                  </form>
                  <!-- Add this script in the head or before the closing body tag -->
                  <script>
                    document.addEventListener('DOMContentLoaded', function() {
                      // Select all forms with the name "hapus"
                      var deleteForms = document.querySelectorAll('form[name="hapus"]');

                      // Attach a submit event listener to each form
                      deleteForms.forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                          // Display a confirmation dialog and prevent form submission if canceled
                          var confirmed = confirm('Apakah Anda yakin ingin menghapus data ini?');
                          if (!confirmed) {
                            event.preventDefault();
                          }
                        });
                      });
                    });
                  </script>
                  <?php
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Dapatkan nilai id dari parameter URL
                    $id = $_POST['hapus'];
                    if ($_POST['hapus'] == $id) {
                      // Persiapkan statement SQL untuk menghapus data
                      $sql = mysqli_query($con, "DELETE FROM wishlist WHERE id_wishlist = $id");
                      // Eksekusi statement SQL
                      echo " <script>
          alert('Buku dengan id = $id Data telah dihapus !');
          window.location.href='halaman-akun-wishlist.php';
        </script>";
                    } else {
                      echo " <script>
          alert('Data tidak jadi !');
          window.location.href='halaman-akun-wishlist.php';
        </script>";
                    }
                  }
                  ?>
                  <div class="content-8Wm">
                    <div class="image-placeholder-h45">
                      <img class="paste-image-qvy" src="./assets/buku/<?= $data['Cover'] ?>" />
                    </div>
                    <div class="product-BV3">
                      <p class="nama-buku-jFf"><?= $data['Judul'] ?></p>
                      <p class="nama-pengarang-GFb"><?= $data['Penulis'] ?></p>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-58M">
      <div class="logo-and-links-oq3">
        <div class="logo-and-slogan-8sK">
          <p class="legant-HER">
            <span class="legant-HER-sub-0">Perpus</span>
            <span class="legant-HER-sub-1">A</span>
            <span class="legant-HER-sub-2">pp</span>
            <span class="legant-HER-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-KaR">
          </div>
          <p class="gift-decoration-store-Fys">Pinjam dan Reservasi Buku Online!</p>
        </div>
        <div class="nav-PqB">
          <p class="home-wLu">Beranda</p>
          <p class="shop-sVT">Perpustakaan Mitra</p>
          <div class="auto-group-8451-otu">Playlist</div>
          <p class="contact-us-7eh">Hubungi Kami</p>
        </div>
      </div>
      <div class="bottom-bar-3oF">
        <div class="copyright-ZWh">
          <p class="copyright-2023-3legant-all-rights-reserved-h77">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-CpZ">Privacy Policy</p>
          <p class="terms-of-use-9Uu">Terms of Use</p>
        </div>
        <div class="social-icon-tSV">
          <img class="social-outline-instagram-c7b" src="./assets/social-outline-instagram-Rbw.png" />
          <img class="social-outline-facebook-wff" src="./assets/social-outline-facebook-zad.png" />
          <img class="social-outline-youtube-t57" src="./assets/social-outline-youtube-wf7.png" />
        </div>
      </div>
    </div>
  </div>
</body>