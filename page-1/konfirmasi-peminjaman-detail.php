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
$sql_pengajuan = mysqli_query(
  $con,
  "SELECT *
  FROM peminjaman
  JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
  JOIN users ON users.id_user = peminjaman.id_user
  WHERE peminjaman.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$sql2 = mysqli_query(
  $con,
  "SELECT *
  FROM peminjaman
  JOIN mitra ON mitra.id_mitra = peminjaman.id_mitra
  JOIN users ON users.id_user = peminjaman.id_user
  WHERE peminjaman.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$data1 = mysqli_fetch_array($sql2);
$data2 = mysqli_fetch_array($sql_pengajuan);
$sql1 = mysqli_query($con, "SELECT * FROM buku_pinjam
JOIN books ON books.ISBN = buku_pinjam.ISBN
WHERE id_peminjaman = '$data1[id_peminjaman]'") ;
$sql12 = mysqli_query($con, "SELECT * FROM buku_pinjam
JOIN books ON books.ISBN = buku_pinjam.ISBN
WHERE id_peminjaman = '$data1[id_peminjaman]'") ;
$sql10 = mysqli_query($con, "SELECT * FROM buku_pinjam
JOIN books ON books.ISBN = buku_pinjam.ISBN
WHERE id_peminjaman = '$data1[id_peminjaman]'") ;
$data5 = mysqli_fetch_array($sql12);
$total = mysqli_num_rows($sql1);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Konfirmasi Peminjaman (Detail)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600"/>
  <link rel="stylesheet" href="./styles/konfirmasi-peminjaman-detail.css"/>
</head>
<body>
<div class="konfirmasi-peminjaman-detail-Qqj">
  <div class="logo-Kho">
    <span class="logo-Kho-sub-0">Perpus</span>
    <span class="logo-Kho-sub-1">A</span>
    <span class="logo-Kho-sub-2">pp</span>
  </div>
  <div class="content-NpV">
    <div class="content-WQu">
      <div class="menu-4BX">
        <div class="frame-743-BG9">
          <div class="elements-menu-avatar-edit-hkH">
            <div class="avatar-Did">
              <img class="border-radius-light-solid-pill-xRK" src="./assets/staff/<?=$data['foto_staff']?>"/>
            </div>
          </div>
          <p class="tobi-anson-bDP"><?=$data['nama_staff']?></p>
        </div>
        <div class="frame-742-WbF">
  <a href="halaman-profil-staff.php" class="menu-item-G4d">Profil Staff</a>
  <a href="halaman-profil-perpustakaan.php" class="elements-ar1">Profil Perpustakaan</a>
  <div class="auto-group-1vem-JGD">
    <a href="halaman-kelola-buku-daftar-buku.php" class="kelola-buku-3jb">Kelola Buku</a>
    <a href="halaman-peminjaman-berlangsung.php" class="elements-KSD">Peminjaman</a>
  </div>
  <div class="auto-group-pdrf-qQZ">
    <a href="#" class="menu-item-ymf">Konfirmasi Reservasi</a>
    <a href="../halaman-masuk.php" class="menu-item-X2V">Keluar</a>
  </div>
</div>

      </div>
      <div class="auto-group-pgg5-drD">
        <a href="javascript:history.back()" class="kembali-nDK">&lt;&lt; Kembali</a>
        <div class="content-vaR">
          <div class="frame-759-hd7">
            <p class="tanggal-peminjaman-Sah">Tanggal Peminjaman</p>
            <p class="item--ZvD"> :</p>
            <p class="item-2023-09-17-W4m"><?= $data2['tanggal_pinjam'] ?></p>
          </div>
          <div class="auto-group-zqhb-8VT">
            <div class="frame-756-HdF">
              <p class="nama-peminjam-dBK">Nama Peminjam</p>
              <p class="item--kFw">:</p>
              <p class="aeryn-UBw"><?= $data2['namaLengkap_user'] ?></p>
            </div>
            <div class="frame-760-oED">
              <p class="jumlah-buku-Ljw">Jumlah Buku</p>
              <p class="item--4fw">:</p>
              <p class="item-4-bfs"><?= $total ?></p>
            </div>
          </div>
        </div>
        <table class="table-smf">
          <thead>
            <tr>
              <th>ISBN</th>
              <th>Judul Buku</th>
              <th>Penulis</th>
              <th>Penerbit</th>
            </tr>
          </thead>
          <tbody>
              <?php while ($row = mysqli_fetch_assoc($sql10)): ?>
                <tr>
                  <td>
                    <?= $row['ISBN'] ?>
                  </td>
                  <td>
                    <?= $row['Judul'] ?>
                  </td>
                  <td>
                    <?= $row['Penulis'] ?>
                  </td>
                  <td>
                    <?= $row['Penerbit'] ?>
                  </td>
                </tr>

              <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="footer-861">
    <div class="logo-and-links-RL1">
      <div class="logo-and-slogan-jLh">
        <p class="perpusapp-sho">
          <span class="perpusapp-sho-sub-0">Perpus</span>
          <span class="perpusapp-sho-sub-1">A</span>
          <span class="perpusapp-sho-sub-2">pp</span>
          <span class="perpusapp-sho-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-JRj">
        </div>
        <p class="gift-decoration-store-cxD">Pinjam dan Reservasi Buku Online!</p>
      </div>
    </div>
    <div class="bottom-bar-kYd">
      <div class="copyright-t93">
        <p class="copyright-2023-3legant-all-rights-reserved-DBK">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-KEM">Privacy Policy</p>
        <p class="terms-of-use-f3K">Terms of Use</p>
      </div>
      <div class="social-icon-bBs">
        <img class="social-outline-instagram-uiM" src="./assets/social-outline-instagram-e8M.png"/>
        <img class="social-outline-facebook-qc1" src="./assets/social-outline-facebook-d9F.png"/>
        <img class="social-outline-youtube-yiD" src="./assets/social-outline-youtube-yn5.png"/>
      </div>
    </div>
  </div>
</div>
</body>