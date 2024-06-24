<?php 
session_start();
include 'config/db.php';
$sql = mysqli_query($con, "SELECT *
FROM mitra
JOIN kabupaten ON kabupaten.id_kabupaten = mitra.id_kabupaten
JOIN provinsi ON kabupaten.id_provinsi = provinsi.id_provinsi
-- JOIN mitra ON mitra.id_kabupaten = kabupaten.id_kabupaten
-- JOIN provinsi ON provinsi.id_provinsi = kabupaten.id_provinsi;
") or die(mysqli_error($con));
        ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Perpustakaan Mitra Setelah Masuk</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-perpustakaan-mitra-setelah-masuk.css"/>
</head>
<body>
<div class="halaman-perpustakaan-mitra-setelah-masuk-14u">
  <div class="navigation-bar-7Nq">
    <div class="logo-po3">
      <span class="logo-po3-sub-0">Perpus</span>
      <span class="logo-po3-sub-1">A</span>
      <span class="logo-po3-sub-2">pp</span>
    </div>
    <div class="elements-navigation-link-group--rt9">
      <div class="button-NLh">
        <a href="halaman-utaman-setelah-masuk.php" class="content-vt1">Beranda</a>
      </div>
      <div class="button-S5f">
        <a href="halaman-perpustakaan-mitra-setelah-masuk.php" class="content-bUM">Perpustakaan Mitra</a>
      </div>
      <div class="auto-group-1jnf-W5X">
        <div class="elements-navigation-link--FJ1">
          <div class="button-n33">
            <a href="halaman-playlist-setelah-masuk.php" class="content-YY1">Playlist</a>
          </div>
        </div>
        <div class="elements-navigation-link--qn1">
          <a href="halaman-kontak-kami-setelah-masuk.php" class="button-NG9">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <div class="icons-5gM">
      <div class="auto-group-5pvr-Smo">
        <a href="halaman-akun.php"><img class="interface-outline-user-circle-Vzy" src="./assets/interface-outline-user-circle-Xw7.png"/></a>
      </div>
      <div class="elements-navigation-cart-button-SQR">
        <img class="outline-shopping-bag-ALR" src="./assets/outline-shopping-bag-Akh.png"/>
        <div class="frame-3-VtV">4</div>
      </div>
    </div>
  </div>
  <div class="content-yYm">
    <p class="perpustakaan-mitra-WHo">Perpustakaan Mitra</p>
    <div class="content-1VT">
      
   
      <form action="" method="post">
      <table class="elements-cart-product-cell-3fX">
          <tr>
            <th class="buku-FVT"></th>
            <th class="perpustakaan-ywF">Perpustakaan</th>
            <th class="perpustakaan-ywF">Provinsi</th>
            <th class="perpustakaan-ywF">Kabupaten</th>
            <th class="perpustakaan-ywF"></th>
          </tr>
          <?php while ($data = mysqli_fetch_array($sql)) {?>
          <tr>
            <td><img class="paste-image-3ys" src="./assets/mitra/<?=$data['foto_mitra']?>"></td>
            <td><p class="tere-liye-bumi-Xj7"><?=$data['nama_mitra']?> </p></td>
            <td><p class="tere-liye-bumi-Xj7"><?=$data['nama_provinsi']?> </p></td>
            <td><p class="tere-liye-bumi-Xj7"><?=$data['nama_kabupaten']?> </p></td>
              <td><button type="submit" class="get-started-rQ0"  name="id" value="<?=$data['id_mitra']?>">Selengkapnya...</button></td>
          </tr>
      <?php } ?>
          </table>
          </form>
          <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['id']  ;
    $sqlCek = mysqli_query($con, "SELECT * FROM mitra WHERE id_mitra='$_POST[id]'");
    $jml = mysqli_num_rows($sqlCek);
    $d = mysqli_fetch_array($sqlCek);
    if ($jml > 0) {
        $_SESSION['mitra'] = $d['id_mitra'];
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
        window.location.href ='halaman-deskripsi-perpustakaan-setelah-masuk.php';
        </script>";
    } 
}
?>
      <!-- <table class="item-EFj">
     
    
        <tr class="content-kjs">
          <td class="image-placeholder-WU9">
            <img class="paste-image-3ys" src="./assets/mitra/<?=$data['foto_mitra']?>"/>
          </td>
          <td class="perpustakaan-universitas-jambi-Li5">
          <?=$data['nama_mitra']?>
          </td>
        
        <td class="jambi-ym3"><?=$data['nama_provinsi']?></td>
        <td class="muaro-jambi-hBF"><?=$data['nama_kabupaten']?></td>
        <td class="button-c3K">Selengkapnya</td>
        </tr>
      </table> -->

      <!-- <div class="item-eEu">
        <div class="content-xmP">
          <div class="image-placeholder-7eH">
            <img class="paste-image-TTF" src="./assets/paste-image-snR.png"/>
          </div>
          <div class="product-zi5">
            <p class="perpustakaan-umum-kota-jambi-jvZ">Perpustakaan Umum Kota Jambi</p>
            <p class="tere-liye-G9o">Tere Liye</p>
          </div>
        </div>
        <p class="jambi-zLh">Jambi</p>
        <p class="kota-jambi-6uX">Kota Jambi</p>
        <div class="button-pad">Selengkapnya</div>
      </div>
      <div class="item-g73">
        <div class="content-bjo">
          <div class="image-placeholder-x4Z">
            <img class="paste-image-JPK" src="./assets/paste-image-6kR.png"/>
          </div>
          <div class="product-RTw">
            <p class="perpustakaan-adinegoro-a5w">Perpustakaan Adinegoro</p>
            <p class="tere-liye-tsK">Tere Liye</p>
          </div>
        </div>
        <p class="sumatra-barat-2Tj">Sumatra Barat</p>
        <p class="sawahlunto-w4u">Sawahlunto</p>
        <div class="button-3td">Selengkapnya</div>
      </div>
      <div class="item-ufw">
        <div class="content-ECR">
          <div class="image-placeholder-nDw">
            <img class="paste-image-7n1" src="./assets/paste-image-gY1.png"/>
          </div>
          <div class="product-FtD">
            <p class="perpustakaan-universitas-sriwijaya-palembang-R21">
            Perpustakaan Universitas Sriwijaya
            <br/>
            Palembang
            </p>
            <p class="tere-liye-XKw">Tere Liye</p>
          </div>
        </div>
        <p class="sumatra-selatan-rt1">Sumatra Selatan</p>
        <p class="palembang-NbT">Palembang</p>
        <div class="button-HyK">Selengkapnya</div>
      </div> -->
    </div>
  </div>
  <div class="footer-8U9">
    <div class="logo-and-links-fiy">
      <div class="logo-and-slogan-1Xw">
        <p class="legant-xi5">
          <span class="legant-xi5-sub-0">Perpus</span>
          <span class="legant-xi5-sub-1">A</span>
          <span class="legant-xi5-sub-2">pp</span>
          <span class="legant-xi5-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-WWd">
        </div>
        <p class="gift-decoration-store-FDK">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-Bcm">
        <p class="home-isb">Beranda</p>
        <p class="shop-FsX">Perpustakaan Mitra</p>
        <div class="auto-group-r4cj-zq7">Playlist</div>
        <p class="contact-us-iFK">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-rMX">
      <div class="copyright-xfT">
        <p class="copyright-2023-3legant-all-rights-reserved-6Fs">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-ovy">Privacy Policy</p>
        <p class="terms-of-use-x3B">Terms of Use</p>
      </div>
      <div class="social-icon-H5T">
        <img class="social-outline-instagram-oZb" src="./assets/social-outline-instagram-sDb.png"/>
        <img class="social-outline-facebook-wvh" src="./assets/social-outline-facebook-cmF.png"/>
        <img class="social-outline-youtube-tb3" src="./assets/social-outline-youtube-Sth.png"/>
      </div>
    </div>
  </div>
</div>
</body>