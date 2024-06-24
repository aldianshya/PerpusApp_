<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$id = @$_SESSION['books'];
$sql = mysqli_query($con, "SELECT * FROM users
 WHERE id_user = '$id_login'") or die(mysqli_error($con));
$d = mysqli_fetch_array($sql);
$sql1 = mysqli_query($con, "SELECT * FROM peminjaman 
JOIN users ON users.id_user = peminjaman.id_user
JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
WHERE peminjaman.id_user = '$id_login' AND peminjaman.id_mitra = '$id'") or die(mysqli_error($con));
$sql2 = mysqli_query($con, "SELECT * FROM cart 
JOIN users ON users.id_user = cart.id_user
JOIN books ON books.ISBN = cart.ISBN
JOIN mitra ON mitra.id_mitra = cart.id_mitra
WHERE cart.id_user = '$id_login' AND cart.id_mitra = '$id'") or die(mysqli_error($con));
        $tanggal = date("Y-m-d");
$total = mysqli_num_rows($sql1);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Reservasi Berhasil</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-reservasi-berhasil.css"/>
</head>
<body>
<div class="halaman-reservasi-berhasil-NGq">
  <div class="navigation-bar-6Tj">
    <p class="legant-od3">
      <span class="legant-od3-sub-0">Perpus</span>
      <span class="legant-od3-sub-1">A</span>
      <span class="legant-od3-sub-2">pp</span>
    </p>
    <div class="elements-navigation-link-group--XBf">
      <div class="elements-navigation-link--pwT">
        <div class="button-n7b">
          <div class="content-wWH">Beranda</div>
        </div>
      </div>
      <div class="elements-navigation-link--dP7">
        <div class="button-n17">
          <div class="content-96Z">Perpustakaan Mitra</div>
        </div>
      </div>
      <div class="auto-group-ufn3-T7F">
        <div class="elements-navigation-link--bz9">
          <div class="button-9Ey">
            <div class="content-Hry">Playlist</div>
          </div>
        </div>
        <div class="elements-navigation-link--nHw">
          <div class="button-KHs">Hubungi Kami</div>
        </div>
      </div>
    </div>
    <div class="icons-E9w">
      <div class="auto-group-y9gx-azV">
        <img class="interface-outline-search-02-iqo" src="./assets/interface-outline-search-02-zDF.png"/>
        <img class="interface-outline-user-circle-3dB" src="./assets/interface-outline-user-circle-9bX.png"/>
      </div>
      <div class="elements-navigation-cart-button-yWq">
        <img class="outline-shopping-bag-tth" src="./assets/outline-shopping-bag-WsT.png"/>
        <div class="frame-3-Rtd">0</div>
      </div>
    </div>
  </div>
  <div class="complete-6Uy">
    <p class="reservasi-peminjaman-berhasil-cCR">
    Peminjaman 
    <br/>
    Berhasil!
    </p>
    <div class="order-complete-tfj">
      <div class="title-1EZ">
        <p class="terima-kasih--8a5">Terima kasih! 🎉</p>
        <p class="tunggu-konfirmasi-dari-kami-eHX">Cetak dan Ambil Buku Anda!</p>
      </div>
      <div id="kartuContent" class="orders-1-MSq">
        <div class="item-tSm">
          <?php while ($data = mysqli_fetch_array($sql1)) { ?>
          <div class="image-placeholder-2Yy">
            <img class="paste-image-yj7" src="./assets/buku/<?=$data['Cover']?>"/>
          </div>
          <?php } ?>
        </div>
        <div class="order-detail-XPF">
          <div class="title-3sP">
            <div class="auto-group-cxnp-o5s">
              <div class="tanggal--99j">Tanggal:</div>
              <div class="total--sLd">Total:</div>
            </div>
            <div class="perpustakaan--1Bw">Perpustakaan :</div>
          </div>
          <div class="info-LED">
            <div class="october-31-2023-tFj"><?=$tanggal?></div>
            <div class="buku-pfB"><?=$total?> Buku</div>
            <?php $sat = mysqli_fetch_array($sql2);
            ?>
            <div class="perpustakaan-universitas-jambi-Zcm"><?=$sat['nama_mitra']?></div>
          </div>
        </div>
      </div>
    </div>
    <button onclick="cetakKartu()" class="button-qPF">Cetak Kartu</button>
  </div>
  <script>
    function cetakKartu() {
        // Mendapatkan konten kartu
        var kontenKartu = document.getElementById('kartuContent').innerHTML;

        // Membuat jendela pop-up untuk mencetak
        var jendelaCetak = window.open('', '_blank');
        jendelaCetak.document.write('<html><head><title>Kartu Pribadi</title>');
        jendelaCetak.document.write('<style>');
        // Gaya CSS untuk mencetak hanya satu halaman
        jendelaCetak.document.write('@media print { body { width: 100%; } }');
        // Gaya CSS tambahan sesuai kebutuhan Anda
        jendelaCetak.document.write('.order-complete-tfj {');
        jendelaCetak.document.write('margin-bottom: 8rem;');
        jendelaCetak.document.write('box-sizing: border-box;');
        jendelaCetak.document.write('padding: 8rem 9.5rem 9rem 9.5rem;');
        jendelaCetak.document.write('width: 100%;');
        jendelaCetak.document.write('align-items: center;');
        jendelaCetak.document.write('display: flex;');
        jendelaCetak.document.write('flex-direction: column;');
        jendelaCetak.document.write('box-shadow: 0 3.2rem 4.8rem rgba(17, 17, 17, 0.1);');
        jendelaCetak.document.write('background-color: #ffffff;');
        jendelaCetak.document.write('border-radius: 0.8rem;');
        jendelaCetak.document.write('flex-shrink: 0;');
        jendelaCetak.document.write('text-align: center;');
        // Gaya CSS tambahan dari CSS yang Anda berikan
        jendelaCetak.document.write('.title-1EZ { margin: 0rem 3.7rem 3.2rem 3.7rem; width: calc(100% - 7.4rem); align-items: center; display: flex; flex-direction: column; flex-shrink: 0; }');
        jendelaCetak.document.write('.orders-1-MSq { margin: 0rem 9rem 4rem 9rem; width: calc(100% - 18rem); align-items: center; display: flex; flex-direction: column; flex-shrink: 0; }');
        jendelaCetak.document.write('.item-tSm { margin-bottom: 3.6rem; width: 100%; display: flex; column-gap: 6.4rem; align-items: flex-end; flex-shrink: 0; justify-content: center; }');
        jendelaCetak.document.write('.image-placeholder-2Yy { margin-bottom: 0.4rem; overflow: hidden; position: relative; flex-shrink: 0; }');
        jendelaCetak.document.write('.paste-image-yj7 { width: 8rem; height: 12rem; object-fit: cover; vertical-align: top; }');
        jendelaCetak.document.write('</style></head><body>');

        jendelaCetak.document.write('<div class="order-complete-tfj">' + "Terima Kasih 🎉<br/>" + "Gunakan Kartu Ini Saat Mengambil Buku <br/>" + kontenKartu + '</div>');
        jendelaCetak.document.write('</body></html>');

        // Menutup jendela pop-up setelah mencetak
        jendelaCetak.document.close();
        jendelaCetak.print();
        jendelaCetak.close();

        // Menampilkan tombol unduh setelah mencetak
        var unduhLink = document.getElementById('unduhLink');
        unduhLink.href = 'data:text/html;charset=utf-8,' + encodeURIComponent('<html><head><title>Kartu Pribadi</title></head><body><div class="kartu-container">' + kontenKartu + '</div></body></html>');
        unduhLink.download = 'kartu_pribadi.html';
        unduhLink.style.display = 'block';
    }
</script>



  <div class="footer-UBK">
    <div class="logo-and-links-c2d">
      <div class="logo-and-slogan-vp1">
        <p class="legant-U4q">
          <span class="legant-U4q-sub-0">Perpus</span>
          <span class="legant-U4q-sub-1">A</span>
          <span class="legant-U4q-sub-2">pp</span>
          <span class="legant-U4q-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-u3f">
        </div>
        <p class="gift-decoration-store-S3b">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-kpy">
        <p class="home-VnZ">Beranda</p>
        <p class="shop-SC1">Perpustakaan Mitra</p>
        <div class="auto-group-heww-ySq">Playlist</div>
        <p class="contact-us-tJu">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-d1b">
      <div class="copyright-8yw">
        <p class="copyright-2023-3legant-all-rights-reserved-UH7">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-zWM">Privacy Policy</p>
        <p class="terms-of-use-vuo">Terms of Use</p>
      </div>
      <div class="social-icon-Gim">
        <img class="social-outline-instagram-oCu" src="./assets/social-outline-instagram-BtV.png"/>
        <img class="social-outline-facebook-w4D" src="./assets/social-outline-facebook-BdT.png"/>
        <img class="social-outline-youtube-syT" src="./assets/social-outline-youtube-mih.png"/>
      </div>
    </div>
  </div>
</div>
</body>