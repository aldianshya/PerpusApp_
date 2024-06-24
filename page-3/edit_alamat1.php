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
        <img class="interface-outline-search-02-2LZ" src="./assets/interface-outline-search-02-kJM.png"/>
        <img class="interface-outline-user-circle-Mdj" src="./assets/interface-outline-user-circle-Kr1.png"/>
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
          <div class="elements-YQh">Akun</div>
          <div class="elements-GLh">Alamat</div>
          <div class="elements-n49">Riwayat Peminjaman</div>
          <div class="elements-hS1">Wishlist</div>
          <div class="elements-EB3">Keluar</div>
        </div>
      </div>
      <div class="address-KCV">
        <p class="alamat-4vm">Edit Alamat Tanda Pengenal</p>
        <form method="post" action="" class="content-QDw">
          <textarea name="alamat" class="content-Z6q">
            </textarea>
            <button type="submit" class="button-n9X">Edit Alamat</button>
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $jml=0;
        if (isset($_POST['alamat'])) {
            $jml=1;
            $edit1= mysqli_query($con,"UPDATE users SET alamat_ktp='$_POST[alamat]' WHERE id_user='$id_login' ");
        }
        if ($jml >0) {
        echo "<script type='text/javascript'>
				setTimeout(function () { 
          alert('Anda Berhasil Mengedit Profil');
				swal('($_POST[nama]) ', 'Berhasil Merubah Alamat', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('halaman-akun-alamat.php');
				} ,3000);   
				</script>";
    }
}
        ?>
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