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
$data = mysqli_fetch_array($sql);
$sql_pengajuan = mysqli_query(
  $con,
  "SELECT *
  FROM reservasi
  JOIN mitra ON mitra.id_mitra = reservasi.id_mitra
  JOIN users ON users.id_user = reservasi.id_user
  WHERE reservasi.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$sql2 = mysqli_query(
  $con,
  "SELECT *
  FROM reservasi
  JOIN mitra ON mitra.id_mitra = reservasi.id_mitra
  JOIN users ON users.id_user = reservasi.id_user
  WHERE reservasi.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$data1 = mysqli_fetch_array($sql2);
$sql1 = mysqli_query($con, "SELECT * FROM buku_reservasi_unconfir
WHERE id_reservasi = '$data1[id_reservasi]'") ;
$total = mysqli_num_rows($sql1);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Konfirmasi Reservasi</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat%3A600" />
  <link rel="stylesheet" href="./styles/konfirmasi-reservasi.css" />
</head>

<body>
  <div class="konfirmasi-reservasi-Ymb">
    <div class="logo-sYy">
      <span class="logo-sYy-sub-0">Perpus</span>
      <span class="logo-sYy-sub-1">A</span>
      <span class="logo-sYy-sub-2">pp</span>
    </div>
    <div class="content-wSM">
      <div class="content-Tfb">
        <div class="menu-Ct5">
          <div class="frame-743-X9f">
            <div class="elements-menu-avatar-edit-qg9">
              <div class="avatar-kHK">
                <img class="border-radius-light-solid-pill-t8d" src="./assets/staff/<?= $data['foto_staff'] ?>" />
              </div>
            </div>
            <p class="tobi-anson-8Hs">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-f2u">
            <a href="halaman-profil-staff.php" class="menu-item-bx9">Profil Staff</a>
            <a href="halaman-profil-perpustakaan.php" class="elements-jHf">Profil Perpustakaan</a>
            <div class="auto-group-d8nz-qrV">
              <a href="halaman-kelola-buku-daftar-buku.php" class="kelola-buku-yho">Kelola Buku</a>
              <!-- <a href="konfirmasi-peminjaman.php" class="menu-item-Kmf">Konfirmasi Peminjaman</a> -->
              <a href="halaman-peminjaman-berlangsung.php" class="menu-item-fqX">Peminjaman Berlangsung</a>
            </div>
            <a href="#" class="elements-D6M">Konfirmasi Reservasi</a>
            <a href="../halaman-masuk.php" class="menu-item-6vq">Keluar</a>
          </div>
        </div>
        <table class="table-smf">
          <thead>
            <tr>
              <th>Tanggal Pengajuan</th>
              <th>Tanggal Reservasi</th>
              <th>Nama Peminjam</th>
              <th>Jumlah Buku</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($sql_pengajuan)): ?>
              <tr>
                <td>
                  <?= $row['tanggal_pengajuan'] ?>
                </td>
                <td>
                <?= $row['tanggal_peminjaman'] ?>
                </td>
                <td>
                  <?=$row['namaLengkap_user']?>
                </td>
                <td>
                <?= $total ?>
                </td>
                <td>
                  <a href="konfirmasi-reservasi-1TB.php" style="text-decoration: none; color:black;">Selengkapnya</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="footer-K9F">
      <div class="logo-and-links-dvd">
        <div class="logo-and-slogan-xi1">
          <p class="perpusapp-XuX">
            <span class="perpusapp-XuX-sub-0">Perpus</span>
            <span class="perpusapp-XuX-sub-1">A</span>
            <span class="perpusapp-XuX-sub-2">pp</span>
            <span class="perpusapp-XuX-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-amK">
          </div>
          <p class="gift-decoration-store-XRf">Pinjam dan Reservasi Buku Online!</p>
        </div>
      </div>
      <div class="bottom-bar-TaD">
        <div class="copyright-PTs">
          <p class="copyright-2023-3legant-all-rights-reserved-7uf">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-EUV">Privacy Policy</p>
          <p class="terms-of-use-yS5">Terms of Use</p>
        </div>
        <div class="social-icon-7HP">
          <img class="social-outline-instagram-oR7" src="./assets/social-outline-instagram-XaM.png" />
          <img class="social-outline-facebook-wGR" src="./assets/social-outline-facebook-fGH.png" />
          <img class="social-outline-youtube-fy7" src="./assets/social-outline-youtube-Q9T.png" />
        </div>
      </div>
    </div>
  </div>
</body>