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
  FROM reservasi
  JOIN mitra ON mitra.id_mitra = reservasi.id_mitra
  JOIN users ON users.id_user = reservasi.id_user
  WHERE reservasi.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$sql2 = mysqli_query(
  $con,
  "SELECT *
  FROM reservasi
  JOIN mitra ON mitra.id_mitra = reservasi.id_mitra
  JOIN users ON users.id_user = reservasi.id_user
  WHERE reservasi.id_mitra = '$data[id_mitra]' "
) or die(mysqli_error($con));
$data1 = mysqli_fetch_array($sql2);
$data2 = mysqli_fetch_array($sql_pengajuan);
$sql1 = mysqli_query($con, "SELECT * FROM buku_reservasi_unconfir
JOIN books ON books.ISBN = buku_reservasi_unconfir.ISBN
WHERE id_reservasi = '$data1[id_reservasi]'") ;
$sql12 = mysqli_query($con, "SELECT * FROM buku_reservasi_unconfir
JOIN books ON books.ISBN = buku_reservasi_unconfir.ISBN
WHERE id_reservasi = '$data1[id_reservasi]'") ;
$sql10 = mysqli_query($con, "SELECT * FROM buku_reservasi_unconfir
JOIN books ON books.ISBN = buku_reservasi_unconfir.ISBN
WHERE id_reservasi = '$data1[id_reservasi]'") ;
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
  <title>Konfirmasi Reservasi</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600" />
  <link rel="stylesheet" href="./styles/konfirmasi-reservasi-1TB.css" />
</head>

<body>
  <div class="konfirmasi-reservasi-Lzh">
    <div class="logo-Ub7">
      <span class="logo-Ub7-sub-0">Perpus</span>
      <span class="logo-Ub7-sub-1">A</span>
      <span class="logo-Ub7-sub-2">pp</span>
    </div>
    <div class="content-9am">
      <div class="content-HBB">
        <div class="menu-2uT">
          <div class="frame-743-MB3">
            <div class="elements-menu-avatar-edit-UmT">
              <div class="avatar-o33">
                <img class="border-radius-light-solid-pill-Lof" src="./assets/staff/<?= $data['foto_staff'] ?>" />
              </div>
            </div>
            <p class="tobi-anson-mty">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-WLm">
            <a href="halaman-profil-staff.php" class="menu-item-rvR">Profil Staff</a>
            <a href="halaman-profil-perpustakaan.php" class="elements-PfT">Profil Perpustakaan</a>
            <a href="halaman-kelola-buku-daftar-buku.php" class="elements-ts7">Kelola Buku</a>
            <div class="auto-group-pfvv-oz5">
              <!-- <a href="konfirmasi-peminjaman.php" class="menu-item-AJq">Konfirmasi Peminjaman</a> -->
              <a href="halaman-peminjaman-berlangsung.php" class="menu-item-JA9">Peminjaman Berlangsung</a>
            </div>
            <a href="#" class="elements-SGM">Konfirmasi Reservasi</a>
            <a href="#" class="menu-item-LMj">Keluar</a>
          </div>

        </div>
        <div class="auto-group-6yss-FzV">
          <a class="kembali-cKF" href="javascript:history.back()">&lt;&lt; Kembali</a>
      <form action="" method="post">
          <div class="content-M1w">
            <div class="frame-746-4h3">
              <p class="tanggal-pengajuan-PUR">Tanggal Pengajuan</p>
              <p class="item--VnM">:</p>
              <p class="item-2023-09-17-Cwf"><?=$data2['tanggal_pengajuan']?></p>
            </div>
            <div class="auto-group-q5dp-iQD">
              <div class="frame-756-4U5">
                <p class="tanggal-reservasi-nus">Tanggal Reservasi</p>
                <p class="item--K97">:</p>
                <p class="item-2023-09-17-357"><?=$data2['tanggal_peminjaman']?></p>
              </div>
              <div class="frame-758-xxm">
                <p class="nama-peminjam-WUV">Nama Peminjam</p>
                <p class="item--EQV">:</p>
                <p class="aeryn-ZSm"><?=$data2['namaLengkap_user']?></p>
              </div>
              <div class="frame-758-xxm">
                <p class="nama-peminjam-WUV">Jumlah Buku</p>
                <p class="item--EQV">:</p>
                <p class="aeryn-ZSm"><?=$total?></p>
              </div>
              <div class="frame-758-xxm">
                <button class="nama-peminjam-WUV" type="submit" name="konfir">Konfirmasi Buku</button>
              </div>
            </div>
          </div>
          </form> 
          <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['konfir'])){
    $tanggal_kembali = date('Y-m-d', strtotime($data1['tanggal_peminjaman'] . ' + 7 days'));
    $sql_nambah = mysqli_query($con, "INSERT INTO peminjaman VALUES('','$data1[tanggal_peminjaman]','$tanggal_kembali','$data5[id_mitra]','$data1[id_user]')");
    $sql111 = mysqli_query($con , "SELECT * FROM peminjaman WHERE id_mitra = '$data5[id_mitra]' AND id_user = '$data1[id_user]'");
    $data10 = mysqli_fetch_array($sql111);
    while ($tes = mysqli_fetch_assoc($sql10)){
      $sql90 = mysqli_query($con, "INSERT INTO buku_pinjam VALUES('','$data10[id_peminjaman]','$tes[ISBN]','$tes[id_mitra]')");
    }
    $sql_hapus1 = mysqli_query($con, "DELETE FROM buku_reservasi_unconfir WHERE id_reservasi = '$data5[id_reservasi]'");
    $sql_hapus = mysqli_query($con, "DELETE FROM reservasi WHERE id_reservasi = '$data5[id_reservasi]'");
    if ($sql_hapus){
      $_SESSION['staff'] = $data['id_staff'];
      echo "<script type='text/javascript'>
      alert('Konfirmasi Reservasi Berhasil');
      window.location.href ='konfirmasi-reservasi.php';
      </script>";
    }
    else {
      $_SESSION['staff'] = $data['id_staff'];
      echo "<script type='text/javascript'>
      alert('Konfirmasi Reservasi Gagal');
      window.location.href ='konfirmasi-reservasi.php';
      </script>";
    }
  }
}
?>
          <table class="table-smf">
            <thead>
              <tr>
                <th>Foto</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($sql1)): ?>
                <tr>
                  <td>
                    <img src="./assets/buku/<?= $row['Cover'] ?>" alt="" style="width : 90px; height : 90px;">
                  </td>
                  <td>
                    <?= $row['ISBN'] ?>
                  </td>
                  <td>
                    <?= $row['Judul'] ?>
                  </td>
                  <td>
                    <?= $row['Penulis'] ?>
                  </td>
                </tr>

              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="footer-AvH">
      <div class="logo-and-links-VBs">
        <div class="logo-and-slogan-cnH">
          <p class="perpusapp-m9P">
            <span class="perpusapp-m9P-sub-0">Perpus</span>
            <span class="perpusapp-m9P-sub-1">A</span>
            <span class="perpusapp-m9P-sub-2">pp</span>
            <span class="perpusapp-m9P-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-oEV">
          </div>
          <p class="gift-decoration-store-KCq">Pinjam dan Reservasi Buku Online!</p>
        </div>
      </div>
      <div class="bottom-bar-qS5">
        <div class="copyright-ADT">
          <p class="copyright-2023-3legant-all-rights-reserved-5bK">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-PM7">Privacy Policy</p>
          <p class="terms-of-use-jA5">Terms of Use</p>
        </div>
        <div class="social-icon-TLy">
          <img class="social-outline-instagram-aRb" src="./assets/social-outline-instagram-SJh.png" />
          <img class="social-outline-facebook-vEZ" src="./assets/social-outline-facebook-psP.png" />
          <img class="social-outline-youtube-rP7" src="./assets/social-outline-youtube-icM.png" />
        </div>
      </div>
    </div>
  </div>
</body>