<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$buku = @$_SESSION['books'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sqli = mysqli_query($con, "SELECT * FROM books 
JOIN kategori ON kategori.id_kategori = books.id_kategori
WHERE ISBN='$buku'") or die(mysqli_error($con));
$data1 = mysqli_fetch_array($sqli);
$sqlz = mysqli_query($con, "SELECT * FROM ulasan_buku 
JOIN books ON books.ISBN = ulasan_buku.ISBN
JOIN users ON users.id_user = ulasan_buku.id_user
WHERE ulasan_buku.ISBN='$buku'") or die(mysqli_error($con));
$data2 = mysqli_fetch_array($sqlz);
$sqle = mysqli_query($con, "SELECT * FROM populer
JOIN books ON books.ISBN = populer.ISBN
JOIN kategori ON kategori.id_kategori = populer.id_kategori") or die(mysqli_error($con));
$dat= mysqli_fetch_array($sqle);
$total = mysqli_num_rows($sqlz);
$s = mysqli_query($con,"SELECT * FROM stok_buku
JOIN mitra ON mitra.id_mitra = stok_buku.id_mitra
JOIN books ON books.ISBN = stok_buku.ISBN
WHERE stok_buku.ISBN = '$buku'") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Deskripsi Buku Setelah Masuk</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="./styles/halaman-deskripsi-buku-setelah-masuk.css"/>
</head>
<body>
<div class="halaman-deskripsi-buku-setelah-masuk-vyP">
  <div class="navigation-bar-Swj">
    <p class="legant-ZFf">
      <span class="legant-ZFf-sub-0">Perpus</span>
      <span class="legant-ZFf-sub-1">A</span>
      <span class="legant-ZFf-sub-2">pp</span>
    </p>
    <div class="elements-navigation-link-group--V2q">
      <div class="elements-navigation-link--CC9">
        <div class="button-wfX">
          <a href="halaman-utaman-setelah-masuk.php" class="content-ucM" style="text-decoration: none;">Beranda</a>
        </div>
      </div>
      <div class="elements-navigation-link--1QV">
        <div class="button-kcy">
          <a href="halaman-perpustakaan-mitra-setelah-masuk.php" class="content-vGZ" style="text-decoration: none;">Perpustakaan Mitra</a>
        </div>
      </div>
      <div class="auto-group-3wm1-Rz1">
        <div class="elements-navigation-link--NPT">
          <div class="button-K3o">
            <a href="halaman-playlist-setelah-masuk.php" class="content-fNZ" style="text-decoration: none;">Playlist</a>
          </div>
        </div>
        <div class="elements-navigation-link--MWH">
          <a href="halaman-kontak-kami-setelah-masuk.php" class="button-HPw" style="text-decoration: none;">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <div class="icons-Pxm">
      <div class="auto-group-j1rb-xky">
        <a href="halaman-akun.php"><img class="interface-outline-user-circle-1jF" src="./assets/interface-outline-user-circle-P6R.png"/></a>
      </div>
      <div class="elements-navigation-cart-button-Yz5">
        <a href="cart.php"><img class="outline-shopping-bag-sWZ" src="./assets/outline-shopping-bag-5Bw.png"/></a>
        <div class="frame-3-Coj">4</div>
      </div>
    </div>
  </div>
  <div class="product-loop-sQ5">
    <div class="product-loop-1FP">
      <div class="product-page-slider-featured-image-mEZ">
        <!-- <div class="image-placeholder-HCu"> -->
          <img class="img1" src="./assets/buku/<?=$data1['Cover']?>" alt="">
        <!-- </div> -->
        <div class="elements-product-loop-meta-xCZ">
          <p class="detail--ViH">Detail :</p>
          <div class="category-oys">
            <p class="judul-kPK">Judul</p>
            <p class="bintang-gXs"><?=$data1['Judul']?></p>
          </div>
          <div class="category-cAd">
            <p class="pengarang-xEV">Pengarang</p>
            <p class="tere-liye-HnZ"><?=$data1['Penulis']?></p>
          </div>
          <div class="category-q3P">
            <p class="isbn-y9b">ISBN</p>
            <p class="item-9786239726294-iN5"><?=$data1['ISBN']?></p>
          </div>
          <div class="category-Sos">
            <p class="penerbit-ncq">Penerbit</p>
            <p class="penerbit-sabak-grip-XaR"><?=$data1['Penerbit']?></p>
          </div>
          <div class="category-FmK">
            <p class="kategori-baH">Kategori</p>
            <p class="fiksi-Xyj"><?=$data1['nama_kategori']?></p>
          </div>
          <div class="category-snh">
            <p class="bahasa-DLm">Bahasa</p>
            <p class="indonesia-xJM"><?=$data1['Bahasa']?></p>
          </div>
        </div>
      </div>
      <div class="content-H5j">
        <div class="info-dvH">
          <p class="tere-liye-bintang-BB7"><?=$data1['Penerbit']?> - <?=$data1['Judul']?></p>
          <div class="frame-10-tLR">
            <div class="rating-rating-group-cXK">
              <img class="star-icon-vH7" src="./assets/star-icon-vth.png"/>
              <img class="star-icon-U3j" src="./assets/star-icon-JeV.png"/>
              <img class="star-icon-cfj" src="./assets/star-icon-1oo.png"/>
              <img class="star-icon-xjb" src="./assets/star-icon-rg1.png"/>
              <img class="star-icon-X21" src="./assets/star-icon-VTo.png"/>
            </div>
            <p class="ulasan-TRT"><?php echo $total; ?> Ulasan</p>
          </div>
          <p class="deskripsi--bnZ">Buku ini terdapat di perpustakaan :</p>
        <?php while ($data9 = mysqli_fetch_array($s)) { ?>
          <p class="deskripsi--bnZ">Stok Di <?=$data9['nama_mitra']?> :
          <?=$data9['stok']?>
          </p>
          <?php } ?>
          <p class="deskripsi--bnZ">Deskripsi :</p>
          <p class="bintang-adalah-buku-keempat-dari-serial-bumi-yang-ditulis-oleh-tere-liye-tere-liye-ialah-nama-pena-dari-seorang-penulis-novel-tersohor-di-indonesia-novel-bintang-menceritakan-tentang-raib-seli-dan-ali-mereka-adalah-murid-sma-kelas-11-dan-berteman-baik-penampilan-mereka-sama-seperti-para-murid-sma-lainnya-tetapi-siapa-sangka-bahwa-mereka-memiliki-dan-menyimpan-banyak-rahasia-besar-raib-seorang-remaja-pada-umumnya-tetapi-tanpa-disangka-merupakan-seorang-putri-keturunan-dari-klan-bulan-memiliki-kekuatan-menghilang-dalam-sekejap-kemudian-seli-adalah-seorang-remaja-berasal-dari-klan-matahari-yang-berada-di-bumi-sebab-mamanya-yang-berasal-dari-matahari-turun-dan-menetap-di-bumi-ia-mempunyai-kemampuan-dapat-mengeluarkan-petir-kami-bertiga-teman-baik-remaja-murid-kelas-sebelas-penampilan-kami-sama-seperti-murid-sma-lainnya-tapi-kami-menyimpan-rahasia-besar-namaku-raib-aku-bisa-menghilang-seli-teman-semejaku-bisa-mengeluarkan-petir-dari-telapak-tangannya-dan-ali-si-biang-kerok-sekaligus-si-genius-bisa-berubah-menjadi-beruang-raksasa-kami-bertiga-kemudian-bertualang-ke-dunia-paralel-yang-tidak-diketahui-banyak-orang-yang-disebut-klan-bumi-klan-bulan-klan-matahari-dan-klan-bintang-kami-bertemu-tokoh-tokoh-hebat-penduduk-klan-lain-ini-petualangan-keempat-kami-setelah-tiga-kali-berhasil-menyelamatkan-dunia-paralel-dari-kehancuran-besar-kami-harus-menyaksikan-bahwa-kamilah-yang-melepaskan-musuh-besar-nya-ini-ternyata-bukan-akhir-petualangan-ini-justru-awal-dari-semuanya-buku-keempat-dari-serial-bumi-Lk9">
          <?=$data1['Deskripsi']?>
          </p>
        </div>
        <form action="" method="post">
        <div class="product-loop-cart-qMT">
          <div class="button-yyT">
            <button value="<?=$data2['ISBN']?>" name="wis" class="button-vth">
              <img class="icons-heart-line-fbP" src="./assets/icons-heart-line-ddB.png"/>
              <p class="wishlist-ayF">Wishlist</p>
            </button>
          </div>
          <button value="<?=$data2['ISBN']?>" name="pinjam" class="button-5f7">Masukkan buku keranjang</button>
        </div>
</form>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $jl=0;
  $tes = mysqli_query($con, "SELECT * FROM wishlist 
WHERE id_user = '$id_login' AND isbn = '$_POST[wis]'") or die(mysqli_error($con));
  if (isset($_POST["wis"])){
  $_SESSION['books'] = $buku;
    $pass = $_POST['wis'];
    while ($date = mysqli_fetch_array($tes)) {
      if ($data1['ISBN'] = $date['ISBN']) {
        $jl=1;
      }
     }
    if ($jl = 0){
    $save = mysqli_query($con, "INSERT INTO wishlist VALUES('','$data2[id_user]','$pass') ");
    if ($save) {
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
      window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
      </script>";
  }  
  }
  if($jl = 1) {
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
      window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
      </script>";
  }
  }
  if (isset($_POST["pinjam"])){
  $_SESSION['books'] = $buku;
    $pass = $_POST['pinjam'];
      echo "<script type='text/javascript'>
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
      window.location.href ='halaman-penambahan-pinjam.php';
      </script>";
  }
}
?>
      </div>
    </div>
  </div>
<?php 
$sqll = mysqli_query($con, "SELECT * FROM ulasan_buku 
JOIN books ON books.ISBN = ulasan_buku.ISBN
JOIN users ON users.id_user = ulasan_buku.id_user
WHERE ulasan_buku.ISBN='$buku'") or die(mysqli_error($con));
?>
  <div class="tabs-kuF">
    <div class="review-section-uGM">
      <div class="review-section-ezd">
        <div class="review-1KP">
          <p class="ulasan-pengunjung-Zrh">Ulasan Pengunjung</p>
          <div class="review-gAd">
            <div class="frame-738-pnd">
              <div class="rating-group-x89">
                <img class="star-icon-U6V" src="./assets/star-icon-2Zf.png"/>
                <img class="star-icon-cTb" src="./assets/star-icon-v65.png"/>
                <img class="star-icon-xnM" src="./assets/star-icon-B9s.png"/>
                <img class="star-icon-K77" src="./assets/star-icon-BfX.png"/>
                <img class="star-icon-4Kb" src="./assets/star-icon-tK3.png"/>
              </div>
              <p class="ulasan-Pcm"><?php echo $total; ?> Ulasan</p>
            </div>
            <div class="frame-59-jgd">
            </div>
          </div>
        </div>
        <form method="post" action="">
        <input type="text" name="komen" class="feedbackform--Z9s" placeholder="Bagikan Pendapatmu">
        <input type="number" min="0.0" max="100.0" name="rat" class="feedbackform--Z9s" placeholder="Beri Ratingmu">
            <button type="submit" class="button-WzD">Ajukan Pendapat</button>
        </form>
      </div>
      <div class="comments-title-Kwf">
          <p class="ulasan-FaR"><?php echo $total; ?> Ulasan</p>
        </div>
        
      <div class="comment-section-NWd">
        <?php while ($datx = mysqli_fetch_array($sqll)) {?>
        <div class="comments-je1">
          <div class="user-U5o">
           <img class="avatarplaceholder-nsB" src="./assets/user/<?=$datx['foto_user']?>" alt="">
            <div class="name-and-position-VFo">
              <div class="name-and-feedback-dso">
                <div class="name-stars-NaV">
                  <div class="name-XCV">
                    <p class="sofia-sXF"><?=$datx['namaLengkap_user']?></p>
                  </div>
                </div>
                <p class="i-bought-it-3-weeks-ago-and-now-come-back-just-to-say-awesome-product-i-really-enjoy-it-at-vero-eos-et-accusamus-et-iusto-odio-dignissimos-ducimus-qui-blanditiis-praesentium-voluptatum-deleniti-atque-corrupt-et-quas-molestias-excepturi-sint-non-provident-ZS1">
                  <span class="i-bought-it-3-weeks-ago-and-now-come-back-just-to-say-awesome-product-i-really-enjoy-it-at-vero-eos-et-accusamus-et-iusto-odio-dignissimos-ducimus-qui-blanditiis-praesentium-voluptatum-deleniti-atque-corrupt-et-quas-molestias-excepturi-sint-non-provident-ZS1-sub-0">
                    <?=$datx['komentar']?>    
                </span>
                </p>
              </div>
              
              <div class="frame-724-uXo">
                <p class="jam-yang-lalu-dyb"><?=$datx['tanggal_ulasan']?></p>
                <p class="suka-mpu">Rating : <?=$datx['rating']?></p>
              </div>
              <meter value="<?=$datx['rating']?>" min="0" max="10"></meter>

        </div>
            </div>
          </div>
          <?php }?>
      </div>
    </div>
  </div>
  <div class="footer-vx9">
    <div class="logo-and-links-FzR">
      <div class="logo-and-slogan-nzM">
        <p class="legant-Lky">
          <span class="legant-Lky-sub-0">Perpus</span>
          <span class="legant-Lky-sub-1">A</span>
          <span class="legant-Lky-sub-2">pp</span>
          <span class="legant-Lky-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-RR3">
        </div>
        <p class="gift-decoration-store-xQy">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-tpR">
        <p class="home-RpM">Beranda</p>
        <p class="shop-yL5">Perpustakaan Mitra</p>
        <div class="auto-group-ykvb-uzR">Playlist</div>
        <p class="contact-us-RC5">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-MLd">
      <div class="copyright-roB">
        <p class="copyright-2023-3legant-all-rights-reserved-az5">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-umT">Privacy Policy</p>
        <p class="terms-of-use-T2H">Terms of Use</p>
      </div>
      <div class="social-icon-b8V">
        <img class="social-outline-instagram-7Mj" src="./assets/social-outline-instagram-ubw.png"/>
        <img class="social-outline-facebook-Suo" src="./assets/social-outline-facebook-TfX.png"/>
        <img class="social-outline-youtube-aFK" src="./assets/social-outline-youtube-fM3.png"/>
      </div>
    </div>
  </div>
</div>
</body>