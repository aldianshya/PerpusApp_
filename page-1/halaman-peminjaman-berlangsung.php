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

$data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM staff WHERE id_staff = '$id_staff'")) or die(mysqli_error($con));
$sql_pinjam = mysqli_query(
  $con,
  "SELECT *
  FROM peminjaman
  JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
  JOIN users ON users.id_user = peminjaman.id_user
  WHERE peminjaman.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$sql_p = mysqli_query(
  $con,
  "SELECT *
  FROM peminjaman
  JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
  JOIN users ON users.id_user = peminjaman.id_user
  WHERE peminjaman.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$data1 = mysqli_fetch_array($sql_p);
$sql2 = mysqli_query(
  $con,
  "SELECT *
  FROM reservasi
  JOIN mitra ON mitra.id_mitra = reservasi.id_mitra
  JOIN users ON users.id_user = reservasi.id_user
  WHERE reservasi.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$sql1 = mysqli_query($con, "SELECT * FROM buku_pinjam
WHERE id_peminjaman = '$data1[id_peminjaman]'") ;
$total = mysqli_num_rows($sql1);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Peminjaman Berlangsung</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat%3A600" />
  <link rel="stylesheet" href="./styles/halaman-peminjaman-berlangsung.css" />
</head>

<body>
  <div class="halaman-peminjaman-berlangsung-62H">
    <div class="logo-oxH">
      <span class="logo-oxH-sub-0">Perpus</span>
      <span class="logo-oxH-sub-1">A</span>
      <span class="logo-oxH-sub-2">pp</span>
    </div>
    <div class="content-5YR">
      <div class="content-cHT">
        <div class="menu-ZyP">
          <div class="frame-743-gYD">
            <div class="elements-menu-avatar-edit-cAy">
              <div class="avatar-iE1">
                <img class="border-radius-light-solid-pill-f9F" src="./assets/staff/<?= $data['foto_staff'] ?>" />
              </div>
            </div>
            <p class="tobi-anson-HgR">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-RGq">
            <a href="halaman-profil-staff.php" class="menu-item-a9j">Profil Staff</a>
            <a href="halaman-profil-perpustakaan.php" class="elements-tgD">Profil Perpustakaan</a>
            <div class="auto-group-rrxp-ooB">
              <a href="halaman-kelola-buku-daftar-buku.php" class="kelola-buku-Z1f">Kelola Buku</a>
              <!-- <a href="konfirmasi-peminjaman.php" class="menu-item-tJq">Konfirmasi Peminjaman</a> -->
              <a href="halaman-peminjaman-berlangsung.php" class="elements-d1X">Peminjaman Berlangsung</a>
            </div>
            <div class="auto-group-dznh-wH7">
              <a href="konfirmasi-reservasi.php" class="menu-item-5u7">Konfirmasi Reservasi</a>
              <a href="../halaman-masuk.php" class="menu-item-q7b">Keluar</a>
            </div>
          </div>

        </div>
        <table class="table-smf">
          <thead>
            <tr>
              <th>ID Peminjaman</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Nama Peminjam</th>
              <th>Jumlah Buku</th>
              <th></th>

            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($sql_pinjam)): ?>
              <tr>
                <td>
                  <?= $row['id_peminjaman'] ?>
                </td>
                <td>
                  <?= $row['tanggal_pinjam'] ?>
                </td>
                <td>
                  <?= $row['tanggal_kembali'] ?>
                </td>
                <td>
                  <?= $row['namaLengkap_user'] ?>
                </td>
                <td>
                  <?= $total ?>
                </td>
                <td>
                <a href="konfirmasi-peminjaman-detail.php" style="text-decoration: none; color:black;">Selengkapnya</a>
                </td>
              </tr>

            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  <div class="footer-9mf">
    <div class="logo-and-links-4Nq">
      <div class="logo-and-slogan-z1b">
        <p class="perpusapp-LLM">
          <span class="perpusapp-LLM-sub-0">Perpus</span>
          <span class="perpusapp-LLM-sub-1">A</span>
          <span class="perpusapp-LLM-sub-2">pp</span>
          <span class="perpusapp-LLM-sub-3">

            <br />

          </span>
        </p>
        <div class="rectangle-319-9h7">
        </div>
        <p class="gift-decoration-store-HYR">Pinjam dan Reservasi Buku Online!</p>
      </div>
    </div>
    <div class="bottom-bar-DS5">
      <div class="copyright-jvD">
        <p class="copyright-2023-3legant-all-rights-reserved-U77">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-ndb">Privacy Policy</p>
        <p class="terms-of-use-vUu">Terms of Use</p>
      </div>
      <div class="social-icon-rtM">
        <img class="social-outline-instagram-nX7" src="./assets/social-outline-instagram-GoX.png" />
        <img class="social-outline-facebook-7JV" src="./assets/social-outline-facebook-d1X.png" />
        <img class="social-outline-youtube-FQh" src="./assets/social-outline-youtube-x5K.png" />
      </div>
    </div>
  </div>
  </div>
</body>