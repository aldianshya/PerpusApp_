<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['mitra'];
$sql = mysqli_query($con, "SELECT *
FROM mitra 
JOIN kabupaten ON kabupaten.id_kabupaten = mitra.id_kabupaten
JOIN provinsi ON kabupaten.id_provinsi = provinsi.id_provinsi
-- JOIN mitra ON mitra.id_kabupaten = kabupaten.id_kabupaten
-- JOIN provinsi ON provinsi.id_provinsi = kabupaten.id_provinsi;
WHERE id_mitra = '$id_login'") or die(mysqli_error($con));
$sqli = mysqli_query($con, "SELECT komentar
FROM ulasan_mitra 
JOIN mitra ON mitra.id_mitra = ulasan_mitra.id_mitra
WHERE ulasan_mitra.id_mitra = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$total = mysqli_num_rows($sqli);
        ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Deskripsi Perpustakaan Setelah Masuk</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-deskripsi-perpustakaan-setelah-masuk.css"/>
</head>
<body>
<div class="halaman-deskripsi-perpustakaan-setelah-masuk-5zH">
  <div class="navigation-bar-bxd">
    <div class="logo-7RB">
      <span class="logo-7RB-sub-0">Perpus</span>
      <span class="logo-7RB-sub-1">A</span>
      <span class="logo-7RB-sub-2">pp</span>
    </div>
    <div class="elements-navigation-link-group--ZwP">
      <div class="elements-navigation-link--gFK">
        <div class="button-dRT">
          <a href="halaman-utaman-setelah-masuk.php" class="content-PvR">Beranda</a>
        </div>
      </div>
      <div class="elements-navigation-link--JXb">
        <div class="button-Ew3">
          <a href="halaman-perpustakaan-mitra-setelah-masuk.php" class="content-cHP">Perpustakaan Mitra</a>
        </div>
      </div>
      <div class="auto-group-gzkd-Khb">
        <div class="elements-navigation-link--g2M">
          <div class="button-DHB">
            <a href="halaman-playlist-setelah-masuk.php" class="content-a7j">Playlist</a>
          </div>
        </div>
        <div class="elements-navigation-link--fQ5">
          <a href="halaman-kontak-kami-setelah-masuk.php" class="button-QMf">Hubungi Kami</a>
        </div>
      </div>
    </div>
    <div class="icons-idF">
      <div class="auto-group-z5eb-ga5">
        <a href="halaman-perpustakaan-mitra-setelah-masuk.php"><img class="interface-outline-search-02-Da1" src="./assets/kembali.png"/></a>
        <a href="halaman-akun.php"><img class="interface-outline-user-circle-9iZ" src="./assets/interface-outline-user-circle-hQV.png"/></a>
      </div>
      <div class="elements-navigation-cart-button-5cD">
        <img class="outline-shopping-bag-Cgq" src="./assets/outline-shopping-bag-s7F.png"/>
        <div class="frame-3-w8d">4</div>
      </div>
    </div>
  </div>
  <div class="product-loop-owX">
    <div class="product-loop-8iu">
      <img src="./assets/mitra/<?=$data['foto_mitra']?>" class="elements-slider-HLu">
      <div class="content-8Xs">
        <div class="info-HvZ">
          <div class="frame-10-qhB">
            <div class="rating-rating-group-m53">
              <img class="star-icon-TiZ" src="./assets/star-icon-2aV.png"/>
              <img class="star-icon-cLZ" src="./assets/star-icon-MLD.png"/>
              <img class="star-icon-xfK" src="./assets/star-icon-3sX.png"/>
              <img class="star-icon-6mX" src="./assets/star-icon-5yj.png"/>
              <img class="star-icon-FeR" src="./assets/star-icon-M2H.png"/>
            </div>
            <p class="ulasan-ofw"><?php echo $total; ?> Ulasan</p>
          </div>
          <p class="perpustakaan-universitas-jambi-wXF">
          <?=$data['nama_mitra']?>
          </p>
        </div>
        <div class="elements-product-loop-meta-FH3">
          <p class="detail--CTB">Deskripsi :</p>
          <p class="lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-integer-nec-odio-praesent-libero-sed-cursus-ante-dapibus-diam-sed-nisi-nulla-quis-sem-at-nibh-elementum-imperdiet-duis-sagittis-ipsum-praesent-mauris-fusce-nec-tellus-sed-augue-semper-porta-mauris-massa-vestibulum-lacinia-arcu-eget-nulla-class-aptent-taciti-sociosqu-ad-litora-torquent-per-conubia-nostra-per-inceptos-himenaeos-curabitur-sodales-ligula-in-libero-sed-dignissim-lacinia-nunc-vty">
            <?=$data['deskripsi_mitra']?>
          </p>
          <div class="detail-UZ7">
            <div class="auto-group-x99v-Dmb">
              <p class="detail--N8h">Detail :</p>
              <div class="category-WEu">
                <p class="nama-perpustakaan-Egh">Nama Perpustakaan</p>
                <p class="perpustakaan-universitas-jambi-A4Z"><?=$data['nama_mitra']?></p>
              </div>
            </div>
            <div class="category-V6q">
              <p class="alamat-3e9">Alamat</p>
              <p class="provinsi-jambi-kabupaten-muaro-jambi-n5w">Provinsi <?=$data['nama_provinsi']?>, Kabupaten <?=$data['nama_kabupaten']?></p>
            </div>
            <div class="auto-group-zdqm-tuf">
              <div class="category-qa1">
                <p class="telepon-aGh">Telepon</p>
                <p class="xxxxxxxxxx-KVB"><?=$data['telepon_mitra']?></p>
              </div>
              <div class="category-fJ9">
                <p class="email-QFj">Email</p>
                <p class="uptperpusunjaunjaacid-wmT"><?=$data['email_mitra']?></p>
              </div>
              <div class="category-UmP">
                <p class="jam-operasional-DU5">Jam Operasional</p>
                <p class="wib-MaH"><?=$data['jam_buka']?> - <?=$data['jam_tutup']?> WIB</p>
              </div>
              <div class="category-gsT">
                <p class="layanan-dan-fasilitas-2RX">Layanan dan Fasilitas</p>
                <p class="komputer-publik-ruang-baca-internet-wifi-ksK">
                Komputer Publik
                <br/>
                Ruang baca
                <br/>
                Internet (WiFi)
                </p>
              </div>
              <div class="category-sww">
              <p class="operasional-DU5">Google Maps</p>
                <p class="wib-MaH"><?=$data['gmaps']?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
session_start();

$id_login = @$_SESSION['mitra'];
$sql = mysqli_query($con, "SELECT *
FROM ulasan_mitra
JOIN mitra ON mitra.id_mitra = ulasan_mitra.id_mitra
JOIN users ON users.id_user = ulasan_mitra.id_user
-- JOIN mitra ON mitra.id_kabupaten = kabupaten.id_kabupaten
-- JOIN provinsi ON provinsi.id_provinsi = kabupaten.id_provinsi;
WHERE ulasan_mitra.id_mitra = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
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
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tanggal = date("Y-m-d");
    
        if (isset($_POST['komen'])) {
            $id_mitra = $d['id_mitra'];
            $id_user = $d['id_user'];
            $id = $d['id_ulasan'] + 1;
            $id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users WHERE id_user = '$id_login'") or die(mysqli_error($con));
$da = mysqli_fetch_array($sql);
            // Perhatikan bahwa id_user yang diambil dari $data harus ada di tabel users
            $save = mysqli_query($con, "INSERT INTO ulasan_mitra VALUES ('', '$id_mitra', '$da[id_user]', '$_POST[rat]', '$_POST[komen]', '$tanggal')");
            
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
                    window.location.href ='halaman-deskripsi-perpustakaan-setelah-masuk.php';
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
        <?php while ($data = mysqli_fetch_array($sql)) {?>
        <div class="comments-je1">
          <div class="user-U5o">
           <img class="avatarplaceholder-nsB" src="./assets/user/<?=$data['foto_user']?>" alt="">
            <div class="name-and-position-VFo">
              <div class="name-and-feedback-dso">
                <div class="name-stars-NaV">
                  <div class="name-XCV">
                    <p class="sofia-sXF"><?=$data['namaLengkap_user']?></p>
                  </div>
                </div>
                <p class="i-bought-it-3-weeks-ago-and-now-come-back-just-to-say-awesome-product-i-really-enjoy-it-at-vero-eos-et-accusamus-et-iusto-odio-dignissimos-ducimus-qui-blanditiis-praesentium-voluptatum-deleniti-atque-corrupt-et-quas-molestias-excepturi-sint-non-provident-ZS1">
                  <span class="i-bought-it-3-weeks-ago-and-now-come-back-just-to-say-awesome-product-i-really-enjoy-it-at-vero-eos-et-accusamus-et-iusto-odio-dignissimos-ducimus-qui-blanditiis-praesentium-voluptatum-deleniti-atque-corrupt-et-quas-molestias-excepturi-sint-non-provident-ZS1-sub-0">
                    <?=$data['komentar']?>    
                </span>
                </p>
              </div>
              
              <div class="frame-724-uXo">
                <p class="jam-yang-lalu-dyb"><?=$data['tanggal_ulasan']?></p>
                <p class="suka-mpu">Rating : <?=$data['rating']?></p>
              </div>
        </div>
            </div>
          </div>
          <?php }?>
      </div>
    </div>
  </div>
  <div class="footer-gg9">
    <div class="logo-and-links-pXT">
      <div class="logo-and-slogan-ZV3">
        <p class="legant-uYu">
          <span class="legant-uYu-sub-0">Perpus</span>
          <span class="legant-uYu-sub-1">A</span>
          <span class="legant-uYu-sub-2">pp</span>
          <span class="legant-uYu-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-zim">
        </div>
        <p class="gift-decoration-store-LXj">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-UP3">
        <p class="home-pC1">Beranda</p>
        <p class="shop-ZQV">Perpustakaan Mitra</p>
        <div class="auto-group-z3yw-VZ3">Playlist</div>
        <p class="contact-us-o3w">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-8M7">
      <div class="copyright-dof">
        <p class="copyright-2023-3legant-all-rights-reserved-AHo">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-SWD">Privacy Policy</p>
        <p class="terms-of-use-nKB">Terms of Use</p>
      </div>
      <div class="social-icon-iTj">
        <img class="social-outline-instagram-2jK" src="./assets/social-outline-instagram-Fi1.png"/>
        <img class="social-outline-facebook-NHP" src="./assets/social-outline-facebook-dqb.png"/>
        <img class="social-outline-youtube-6z5" src="./assets/social-outline-youtube-th7.png"/>
      </div>
    </div>
  </div>
</div>
</body>