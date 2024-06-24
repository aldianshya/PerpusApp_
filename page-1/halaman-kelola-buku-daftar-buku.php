<?php
session_start();
include 'config/db.php';
$id_staff = @$_SESSION['staff'];
$sql = mysqli_query(
  $con,
  "SELECT * FROM staff 
  JOIN mitra ON mitra.id_mitra = staff.id_mitra
  JOIN stok_buku ON stok_buku.id_mitra = mitra.id_mitra
  JOIN books ON books.isbn = stok_buku.isbn
  WHERE id_staff = '$id_staff'"
) or die(mysqli_error($con));

// Simpan hasil query dalam array
$daftar_buku = [];
while ($buku = mysqli_fetch_assoc($sql)) {
  $daftar_buku[] = $buku;
}

$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM staff WHERE id_staff = '$id_staff'")) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Kelola Buku (Daftar Buku)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600" />
  <link rel="stylesheet" href="./styles/halaman-kelola-buku-daftar-buku.css" />
</head>

<body>
  <div class="halaman-kelola-buku-daftar-buku-AxV">
    <div class="logo-hSd">
      <span class="logo-hSd-sub-0">Perpus</span>
      <span class="logo-hSd-sub-1">A</span>
      <span class="logo-hSd-sub-2">pp</span>
    </div>
    <div class="content-1Lq">
      <div class="content-vTo">
        <div class="menu-stq">
          <div class="frame-743-oXb">
            <div class="elements-menu-avatar-edit-w81">
              <div class="avatar-Eso">
                <img class="border-radius-light-solid-pill-yqP" src="./assets/staff/<?=$data['foto_staff']?>" />
              </div>
            </div>
            <p class="tobi-anson-EFX">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-Mb3">
            <a class="menu-item-usT" href="halaman-profil-staff.php">Profil Staff</a>
            <a class="elements-qWD" href="halaman-profil-perpustakaan.php">Profil Perpustakaan</a>
            <a class="elements-9Wu" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
            <!-- <a class="elements-qWD" href="konfirmasi-peminjaman.php">Konfirmasi Peminjaman</a> -->
            <a class="elements-qWD" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
            <a class="elements-qWD" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
            <a class="elements-qWD" href="../halaman-masuk.php">Keluar</a>

          </div>
        </div>
        <div class="auto-group-hp3f-933">
          <div class="navigation-bar-gof">
            <div class="elements-navigation-link-group--RFT">
              <div class="button-NAh">
                <a class="content-89s" href="halaman-kelola-buku-daftar-buku.php">Daftar Buku</a>
              </div>
              <div class="button-d6d">
                <a class="content-a1s" href="halaman-kelola-buku-tambah-buku.php">Tambah Buku</a>
              </div>
            </div>
          </div>
          <!-- Table to display books -->
            <table class="table-smf">
              <thead>
                <tr>
                  <th>ISBN</th>
                  <th>Judul Buku</th>
                  <th>Penulis</th>
                  <th>Stok Buku</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php foreach ($daftar_buku as $buku): ?>
                    <tr>
                      <td>
                        <?= $buku['ISBN'] ?>
                      </td>
                      <td>
                        <?= $buku['Judul'] ?>
                      </td>
                      <td>
                        <?= $buku['Penulis'] ?>
                      </td>
                      <td>
                        <?= $buku['stok'] ?>
                      </td>
                      <td>
                        <button value="<?= $buku['ISBN'] ?>" name="edit">
                          <img class="outline-edit-9NM" src="./assets/outline-edit-5Ks.png" />
                          <p class="edit-5mo">Edit</p>
                        </button>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $pass = $_POST['edit'];
                  $sqlCek = mysqli_query($con, "SELECT * FROM books WHERE ISBN='$_POST[edit]'");
                  $jml = mysqli_num_rows($sqlCek);
                  $d = mysqli_fetch_array($sqlCek);
                  if ($jml > 0) {
                    $_SESSION['books'] = $d['ISBN'];
                    echo "<script type='text/javascript'>
        setTimeout(function () { 
        
        swal('($d[nama_staff]) ', 'Login berhasil', {
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
        window.location.href ='halaman-kelola-buku-edit-daftar-buku.php';
        </script>";
                  } else {
                    echo '<script>alert("Anda Gagal Masuk");</script>';
                  }
                }
                ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <div class="footer-zr9">
      <div class="logo-and-links-7vm">
        <div class="logo-and-slogan-Sy3">
          <p class="perpusapp-b5F">
            <span class="perpusapp-b5F-sub-0">Perpus</span>
            <span class="perpusapp-b5F-sub-1">A</span>
            <span class="perpusapp-b5F-sub-2">pp</span>
            <span class="perpusapp-b5F-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-eBw">
          </div>
          <p class="gift-decoration-store-kkm">Pinjam dan Reservasi Buku Online!</p>
        </div>
      </div>
      <div class="bottom-bar-t6H">
        <div class="copyright-QaR">
          <p class="copyright-2023-3legant-all-rights-reserved-Xuw">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-qfj">Privacy Policy</p>
          <p class="terms-of-use-mpH">Terms of Use</p>
        </div>
        <div class="social-icon-iDj">
          <img class="social-outline-instagram-3G1" src="./assets/social-outline-instagram-qSd.png" />
          <img class="social-outline-facebook-zBF" src="./assets/social-outline-facebook-m1w.png" />
          <img class="social-outline-youtube-8HT" src="./assets/social-outline-youtube-Zeu.png" />
        </div>
      </div>
    </div>
  </div>
</body>