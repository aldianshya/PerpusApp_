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
  <title>Halaman Akun</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-akun.css"/>
</head>
<body>
<div class="halaman-akun-VBF">
  <div class="navigation-bar-2BB">
    <p class="legant-vnM">
      <span class="legant-vnM-sub-0">Perpus</span>
      <span class="legant-vnM-sub-1">A</span>
      <span class="legant-vnM-sub-2">pp</span>
    </p>
    <div class="elements-navigation-link-group--sLD">
      <div class="elements-navigation-link--NGy">
        <div class="button-X9s">
          <a href="halaman-utaman-setelah-masuk.php" class="content-Heq">Beranda</a>
        </div>
      </div>
      <div class="elements-navigation-link--PC5">
        <div class="button-XZB">
          <a class="content-gws" href="halaman-perpustakaan-mitra-setelah-masuk.php" >Perpustakaan Mitra</a>
        </div>
      </div>
      <div class="auto-group-w7ky-bow">
        <div class="elements-navigation-link--kRw">
          <div class="button-5j7">
            <a href="#" class="content-SZf">Playlist</a>
          </div>
        </div>
        <div class="elements-navigation-link--jHs">
          <a href="#" class="button-s9B">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <div class="icons-Mq3">
      <div class="auto-group-zd1d-Wxq">
        <a href="halaman-akun.php"><img class="interface-outline-user-circle-AnV" src="./assets/interface-outline-user-circle-4Vw.png"/></a>
      </div>
      <div class="elements-navigation-cart-button-WLZ">
        <img class="outline-shopping-bag-241" src="./assets/outline-shopping-bag-ZC5.png"/>
        <div class="frame-3-LqP">4</div>
      </div>
    </div>
  </div>
  <div class="content-xEV">
    <p class="akun-saya-TS9">Akun Saya</p>
    <div class="account-section-7Wh">
      <div class="menu-pvu">
        <div class="frame-743-X4d">
          <div class="elements-menu-avatar-edit-Q8R">
            <div class="avatar-tJV">
              <div class="border-radius-light-solid-pill-D5s">
                <img class="image-LgH" src="./assets/user/<?=$data['foto_user'] ?>"/>
              </div>
            </div>
          </div>
          <p class="sofia-havertz-iRw"><?=$data['namaTampilan_user'] ?></p>
        </div>
        <div class="frame-742-FRs">
          <a href="halaman-akun.php" class="elements-iKT">Akun</a>
          <a href="halaman-akun-alamat.php" class="elements-p7b">Alamat</a>
          <a href="halaman-akun-riwayat-peminjaman.php" class="elements-vgR">Riwayat Peminjaman</a>
          <a href="halaman-akun-wishlist.php" class="elements-ra5">Wishlist</a>
          <a href="../halaman-masuk.php" class="elements-NYR">Keluar</a>
        </div>
      </div>
      <div class="detail-sEH">
        <div class="form-RFo">
          <p class="detail-akun-M9T">Detail Akun</p>
          <div class="name-673">
            <p class="nama-lengkap--qqK">Id Pengguna</p>
            <div class="input-xuw"><?=$data['id_user'] ?></div>
          </div>
          <div class="name-673">
            <p class="nama-lengkap--qqK">Nama lengkap </p>
            <div class="input-xuw"><?=$data['namaLengkap_user'] ?></div>
          </div>
          <div class="name-EsT">
            <p class="tampilan-nama--oQm">tampilan nama </p>
            <div class="input-Xbf"><?=$data['namaTampilan_user'] ?></div>
          </div>
          <div class="name-1Wq">
            <p class="email--NMP">Email </p>
            <div class="input-u6R"><?=$data['email'] ?></div>
          </div>
          <div class="name-YfB">
            <p class="tanggal-lahir--J8Z">Tanggal lahir </p>
            <div class="input-pch"><?=$data['tanggal_lahir'] ?></div>
          </div>
          <div class="name-JXs">
            <p class="asal-instansi-Tff">Asal instansi</p>
            <div class="input-BrZ"><?=$data['asal_instansi'] ?></div>
          </div>
          <div class="name-JXs">
            <p class="asal-instansi-Tff">Pekerjaan</p>
            <div class="input-BrZ"><?=$data['pekerjaan'] ?></div>
          </div>
          <div class="name-JXs">
            <p class="asal-instansi-Tff">Nomor Handphone</p>
            <div class="input-BrZ"><?=$data['no_hp'] ?></div>
          </div>
          <!-- <a href="edit_akun.php" class="button-n9X">Edit Profil</a>
          <a href="halaman-atur-ulang-kata-sandi.php" class="button-473">Edit Password</a>
          <a href="halaman-atur-ulang-kata-sandi.php" class="button-473">Edit Foto Profil</a> -->
          <div class="form-4fT">
          <div class="auto-group-uxcf-3xd">
            <a href="edit_akun.php" class="button-n9X">Edit Profil</a>
            <a href="halaman-atur-ulang-kata-sandi.php" class="button-473">Edit Password</a>
            <a href="edit_profil.php" class="button-473">Edit Foto Profil</a>
          </div>
        </div>
        </div>
        <!-- <div class="form-4fT">
          <p class="kata-sandi-CWm">Kata Sandi</p>
          <div class="input-9B7">
            <p class="kata-sandi-sebelumnya-W1f">Kata sandi sebelumnya</p>
            <div class="input-dc5">**********</div>
          </div>
          <div class="input-Wfs">
            <p class="kata-sandi-baru-smK">Kata sandi baru</p>
            <div class="input-QWM">Kata sandi baru</div>
          </div>
          <div class="input-J5w">
            <p class="konfirmasi-kata-sandi-baru-4L1">Konfirmasi kata sandi baru</p>
            <div class="input-Atq">Konfirmasi kata sandi baru</div>
          </div>
          <div class="auto-group-uxcf-3xd">
            <div class="button-n9X">Jangan Simpan</div>
            <div class="button-473">Simpan</div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="footer-vQ9">
    <div class="logo-and-links-3Um">
      <div class="logo-and-slogan-ajb">
        <p class="legant-8FK">
          <span class="legant-8FK-sub-0">Perpus</span>
          <span class="legant-8FK-sub-1">A</span>
          <span class="legant-8FK-sub-2">pp</span>
          <span class="legant-8FK-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-9Zj">
        </div>
        <p class="gift-decoration-store-HR3">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-DZb">
        <p class="home-MQu">Beranda</p>
        <p class="shop-67b">Perpustakaan Mitra</p>
        <div class="auto-group-yjxw-R9s">Playlist</div>
        <p class="contact-us-KFF">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-Et1">
      <div class="copyright-Ydo">
        <p class="copyright-2023-3legant-all-rights-reserved-UGZ">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-no3">Privacy Policy</p>
        <p class="terms-of-use-veM">Terms of Use</p>
      </div>
      <div class="social-icon-TuB">
        <img class="social-outline-instagram-ayo" src="./assets/social-outline-instagram-AyP.png"/>
        <img class="social-outline-facebook-j61" src="./assets/social-outline-facebook-QVo.png"/>
        <img class="social-outline-youtube-sCD" src="./assets/social-outline-youtube-HW1.png"/>
      </div>
    </div>
  </div>
</div>
</body>