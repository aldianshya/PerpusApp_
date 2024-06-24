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
$dat = mysqli_fetch_array($sqle);
$total = mysqli_num_rows($sqlz);
$sqll = mysqli_query($con, "SELECT * FROM ulasan_buku 
JOIN books ON books.ISBN = ulasan_buku.ISBN
JOIN users ON users.id_user = ulasan_buku.id_user
WHERE ulasan_buku.ISBN='$buku'") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Ketersediaan Buku (Berdasarkan Daerah)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="./styles/halaman-ketersediaan-buku-berdasarkan-daerah.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="./styles/halaman-deskripsi-buku-setelah-masuk.css"/>
</head>

<body>
  <div class="halaman-ketersediaan-buku-berdasarkan-daerah-ufP">
  <div class="navigation-bar-CPb">
      <p class="legant-VNh">
        <span class="legant-VNh-sub-0">Perpus</span>
        <span class="legant-VNh-sub-1">A</span>
        <span class="legant-VNh-sub-2">pp</span>
      </p>
      <div class="elements-navigation-link-group--kxq">
        <div class="elements-navigation-link--TMT">
          <div class="button-oAR">
            <div class="content-AFs">Beranda</div>
          </div>
        </div>
        <div class="elements-navigation-link--egq">
          <div class="button-aaV">
            <div class="content-wA9">Perpustakaan Mitra</div>
          </div>
        </div>
        <div class="auto-group-d4f5-dof">
          <div class="elements-navigation-link--PH3">
            <div class="button-iq7">
              <div class="content-U3b">Playlist</div>
            </div>
          </div>
          <div class="elements-navigation-link--Zqj">
            <div class="button-hh3">Hubungi Kami</div>
          </div>
        </div>
      </div>
      <div class="icons-QrM">
        <div class="auto-group-tzkf-mwo">
          <img class="interface-outline-search-02-Vcu" src="./assets/interface-outline-search-02-81P.png" />
          <img class="interface-outline-user-circle-pfB" src="./assets/interface-outline-user-circle.png" />
        </div>
        <div class="elements-navigation-cart-button-kYq">
          <img class="outline-shopping-bag-sNZ" src="./assets/outline-shopping-bag.png" />
          <div class="frame-3-c5F">4</div>
        </div>
      </div>
    </div>
    <div class="product-loop-end">
      <div class="product-loop-BGm">
        <div class="product-page-slider-featured-image-XrR">
            <img class="image-placeholder-qM0" src="./assets/buku/<?= $data1['Cover'] ?>" />
          <div class="elements-product-loop-meta-h29">
            <p class="detail--dAh">Detail :</p>
            <div class="category-jzR">
              <p class="judul-USD">Judul</p>
              <p class="bintang-c2d"><?= $data1['Judul'] ?></p>
            </div>
            <div class="category-9YM">
              <p class="pengarang-tVw">Pengarang</p>
              <p class="tere-liye-2c9"><?= $data1['Penulis'] ?></p>
            </div>
            <div class="category-ZMB">
              <p class="isbn-VVj">ISBN</p>
              <p class="item-9786239726294-qJh"><?= $data1['ISBN'] ?></p>
            </div>
            <div class="category-mCM">
              <p class="penerbit-uJZ">Penerbit</p>
              <p class="penerbit-sabak-grip-2ty"><?= $data1['Penerbit'] ?></p>
            </div>
            <div class="category-MgM">
              <p class="kategori-uC5">Kategori</p>
              <p class="fiksi-qbX"><?= $data1['nama_kategori'] ?></p>
            </div>
            <div class="category-P7F">
              <p class="bahasa-KWh">Bahasa</p>
              <p class="indonesia-s2R"><?= $data1['Bahasa'] ?></p>
            </div>
          </div>
        </div>
        <div class="content-MCV">
          <div class="info-VJh">
            <p class="tere-liye-bintang-RCM"><?= $data1['Penerbit'] ?> - <?= $data1['Judul'] ?></p>
            <div class="frame-10-veu">
              <div class="rating-rating-group-roT">
                <img class="star-icon-YwB" src="./assets/star-icon-wYd.png" />
                <img class="star-icon-u13" src="./assets/star-icon-iKK.png" />
                <img class="star-icon-2rM" src="./assets/star-icon-ZGd.png" />
                <img class="star-icon-yFo" src="./assets/star-icon-fWy.png" />
                <img class="star-icon-XHK" src="./assets/star-icon-fB7.png" />
              </div>
              <p class="ulasan-GEu"><?php echo $total; ?> Ulasan</p>
            </div>
            <p class="deskripsi--zwb">Deskripsi :</p>
            <p class="bintang-adalah-buku-keempat-dari-serial-bumi-yang-ditulis-oleh-tere-liye-tere-liye-ialah-nama-pena-dari-seorang-penulis-novel-tersohor-di-indonesia-novel-bintang-menceritakan-tentang-raib-seli-dan-ali-mereka-adalah-murid-sma-kelas-11-dan-berteman-baik-penampilan-mereka-sama-seperti-para-murid-sma-lainnya-tetapi-siapa-sangka-bahwa-mereka-memiliki-dan-menyimpan-banyak-rahasia-besar-raib-seorang-remaja-pada-umumnya-tetapi-tanpa-disangka-merupakan-seorang-putri-keturunan-dari-klan-bulan-memiliki-kekuatan-menghilang-dalam-sekejap-kemudian-seli-adalah-seorang-remaja-berasal-dari-klan-matahari-yang-berada-di-bumi-sebab-mamanya-yang-berasal-dari-matahari-turun-dan-menetap-di-bumi-ia-mempunyai-kemampuan-dapat-mengeluarkan-petir-kami-bertiga-teman-baik-remaja-murid-kelas-sebelas-penampilan-kami-sama-seperti-murid-sma-lainnya-tapi-kami-menyimpan-rahasia-besar-namaku-raib-aku-bisa-menghilang-seli-teman-semejaku-bisa-mengeluarkan-petir-dari-telapak-tangannya-dan-ali-si-biang-kerok-sekaligus-si-genius-bisa-berubah-menjadi-beruang-raksasa-kami-bertiga-kemudian-bertualang-ke-dunia-paralel-yang-tidak-diketahui-banyak-orang-yang-disebut-klan-bumi-klan-bulan-klan-matahari-dan-klan-bintang-kami-bertemu-tokoh-tokoh-hebat-penduduk-klan-lain-ini-petualangan-keempat-kami-setelah-tiga-kali-berhasil-menyelamatkan-dunia-paralel-dari-kehancuran-besar-kami-harus-menyaksikan-bahwa-kamilah-yang-melepaskan-musuh-besar-nya-ini-ternyata-bukan-akhir-petualangan-ini-justru-awal-dari-semuanya-buku-keempat-dari-serial-bumi-XwX">
              <?= $data1['Deskripsi'] ?>
            </p>
          </div>
          <div class="product-loop-cart-pbB">
            <div class="button-N6u">
              <div class="button-K29">
                <img class="icons-heart-line-SsT" src="./assets/icons-heart-line-xFj.png" />
                <p class="wishlist-w3X">Wishlist</p>
              </div>
            </div>
            <div class="button-ABB">Pinjam</div>
          </div>
        </div>
        <div class="rectangle-1084-zR7">
        </div>
        <form action="" method="post">
        <div class="form-ic1">
          <a href="halaman-deskripsi-buku-setelah-masuk.php"><img class="icons-close-line-zpR" src="./assets/icons-close-line.png" /></a>
          <p class="ketersediaan-buku-78M">Ketersediaan Buku</p>
          <div class="country-1Ff">
            <p class="kota-ZHB">ISBN Buku</p>
            <Input class="input-5WR" value="<?=$data1['ISBN']?>" name="id" disabled>
          </div>
          <div class="country-1Ff">
            <p class="kota-ZHB">Kota</p>
            <select class="input-5WR" name="kota">
              <option value="" disabled selected>- Pilih Kota -</option>
              <?php
              $mapel = mysqli_query($con, "SELECT * FROM kabupaten");

              while ($datr = mysqli_fetch_array($mapel)) { ?>
                <option value="<?= $datr['id_kabupaten'] ?>"><?= $datr['nama_kabupaten'] ?></option>
              <?php }
              ?>
            </select>
          </div>
          <div class="street-CzM">
            <p class="perpustakaan-xid">Perpustakaan</p>
            <select class="input-HW1" name="perpus">
              <option value="" disabled selected>- Pilih Perpustakaan -</option>
              <?php
              $mapel = mysqli_query($con, "SELECT * FROM mitra");

              while ($datr = mysqli_fetch_array($mapel)) { ?>
                <option value="<?= $datr['id_mitra'] ?>"><?= $datr['nama_mitra'] ?></option>
              <?php }
              ?>
            </select>
          </div>
          <button type="submit" name="tombol" value="<?=$id_login?>" class="button-REq">Masukkan Keranjang</button>
        </div>
        </form>
        <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $jl=0;
  $tes = mysqli_query($con, "SELECT * FROM cart 
WHERE id_user = '$id_login' AND id_mitra = $_POST[perpus]") or die(mysqli_error($con));
  if (isset($_POST["tombol"])){
  $_SESSION['books'] = $buku;
    $pass = $_POST['tombol'];
    while ($date = mysqli_fetch_array($tes)) {
      if ($data1['ISBN'] = $date['ISBN']) {
        $jl=1;
      }
     }
     if ($jl = 0){
    $save = mysqli_query($con, "INSERT INTO cart VALUES('','$id_login','$data1[ISBN]','$_POST[perpus]') ");
     }
    if ($save) {
      echo "<script type='text/javascript'>
      alert('Berhasil menambahkan buku dalam keranjang');
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
  else {
    echo "<script type='text/javascript'>
      alert('Maaf buku yang anda pilih dan perpustakaanya telah ada di keranjang!!!');
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
  } } ?>
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
        <input type="text" name="komen" class="feedbackform--Z9s" placeholder="Bagikan Pendapatmu" disabled>
        <input type="number" min="0.0" max="100.0" name="rat" class="feedbackform--Z9s" placeholder="Beri Ratingmu" disabled>
            <div type="submit" class="button-WzD">Ajukan Pendapat</div>
        </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tanggal = date("Y-m-d");
    
        if (isset($_POST['komen'])) {
            $ISBN = $data2['ISBN'];
            $id_user = $data2['id_user'];
            $id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users WHERE id_user = '$id_login'") or die(mysqli_error($con));
$da = mysqli_fetch_array($sql);
            // Perhatikan bahwa id_user yang diambil dari $data harus ada di tabel users
            $save = mysqli_query($con, "INSERT INTO ulasan_buku VALUES ('', '$ISBN', '$id_login', '$_POST[rat]', '$_POST[komen]', '$tanggal')");
            if ($save) {
                echo "<script type='text/javascript'>
                    alert('Komentar Berhasil Di Ajukan');
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
                    window.setTimeout(function(){ }, 3000);   
                    window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
                </script>";
            }
        } else {
            echo "<script>alert('Tidak ada Data yang perlu di Input');
                window.location.href ='halaman-deskripsi-perpustakaan-setelah-masuk.php';
            </script>";
        }
    }    
?>
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
        </div>
            </div>
          </div>
          <?php }?>
      </div>
    </div>
  </div>
  <div class="footer-ZmB">
    <div class="logo-and-links-tYZ">
      <div class="logo-and-slogan-2em">
        <p class="legant-B1s">
          <span class="legant-B1s-sub-0">Perpus</span>
          <span class="legant-B1s-sub-1">A</span>
          <span class="legant-B1s-sub-2">pp</span>
        </p>
        <div class="rectangle-319-jhb">
        </div>
        <p class="gift-decoration-store-sYu">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-z7j">
        <p class="home-ipR">Beranda</p>
        <p class="shop-rfj">Perpustakaan Mitra</p>
        <div class="auto-group-1gwu-mXo">Playlist</div>
        <p class="contact-us-Sdw">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-B5j">
      <div class="copyright-5gu">
        <p class="copyright-2023-3legant-all-rights-reserved-oso">Copyright © 2023 PerpusApp All rights reserved</p>
        <p class="privacy-policy-vBj">Privacy Policy</p>
        <p class="terms-of-use-TSZ">Terms of Use</p>
      </div>
      <div class="social-icon-Pr1">
        <img class="social-outline-instagram-7X7" src="./assets/social-outline-instagram-33o.png" />
        <img class="social-outline-facebook-Ebj" src="./assets/social-outline-facebook-7ff.png" />
        <img class="social-outline-youtube-n7T" src="./assets/social-outline-youtube-J9P.png" />
      </div>
    </div>
  </div>
  </div>
</body>