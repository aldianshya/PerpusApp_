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
  "SELECT pengajuan_peminjaman.tanggal_pengajuan, users.namaLengkap_user, COUNT(pengajuan_peminjaman.id_stok_buku) as jumlah_buku
  FROM pengajuan_peminjaman
  JOIN stok_buku ON pengajuan_peminjaman.id_stok_buku = stok_buku.id_stok_buku
  JOIN users ON users.id_user = pengajuan_peminjaman.id_user
  WHERE stok_buku.id_mitra = '{$data['id_mitra']}'
  GROUP BY pengajuan_peminjaman.id_user, pengajuan_peminjaman.tanggal_pengajuan"
) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Konfirmasi Peminjaman</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat%3A600" />
  <link rel="stylesheet" href="./styles/konfirmasi-peminjaman.css" />
</head>

<body>
  <div class="konfirmasi-peminjaman-hMF">
    <div class="logo-D4h">
      <span class="logo-D4h-sub-0">Perpus</span>
      <span class="logo-D4h-sub-1">A</span>
      <span class="logo-D4h-sub-2">pp</span>
    </div>
    <div class="content-5WD">
      <div class="content-oSD">
        <div class="menu-Lww">
          <div class="frame-743-4sw">
            <div class="elements-menu-avatar-edit-CDT">
              <div class="avatar-WE9">
                <img class="border-radius-light-solid-pill-T9P" src="./assets/staff/<?= $data['foto_staff'] ?>" />
              </div>
            </div>
            <p class="tobi-anson-VLy">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-cgV">
            <a class="menu-item-NQm" href="halaman-profil-staff.php">Profil Staff</a>
            <a class="elements-u9o" href="halaman-profil-perpustakaan.php">Profil Perpustakaan</a>
            <a class="kelola-buku-oW5" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
            <a class="elements-949" href="#">Konfirmasi Peminjaman</a>
            <div class="auto-group-r4mk-rjF">
              <a class="menu-item-CYD" href="#">Peminjaman Berlangsung</a>
              <a class="menu-item-jo3" href="#">Konfirmasi Reservasi</a>
              <a class="menu-item-MZX" href="../halaman-masuk.php">Keluar</a>
            </div>
          </div>
        </div>
        <table class="table-smf">
          <thead>
            <tr>
              <th>Tanggal Pengajuan</th>
              <th>Nama Peminjam</th>
              <th>Jumlah Buku</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <form action="" method="post">
              <?php while ($row = mysqli_fetch_assoc($sql_pengajuan)): ?>
                <tr>
                  <td>
                    <?= $row['tanggal_pengajuan'] ?>
                  </td>
                  <td>
                    <?= $row['namaLengkap_user'] ?>
                  </td>
                  <td>
                    <?= $row['jumlah_buku'] ?>
                  </td>
                  <td>
                    <button type="submit" value="<?= $row['id_pengajuan'] ?>" name="confirm">
                      <img class="tabler-icon-arrow-back-Tr5" src="./assets/tabler-icon-arrow-back-Wmb.png" />
                    </button>
                    <p class="edit-5mo">Lihat Detail</p>
                  </td>
                </tr>

              <?php endwhile; ?>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $pass = $_POST['confirm'];
              $sqlCek = mysqli_query($con, "SELECT * FROM pengajuan_peminjaman WHERE id_pengajuan ='$_POST[confirm]'");
              $jml = mysqli_num_rows($sqlCek);
              $d = mysqli_fetch_array($sqlCek);
              $_SESSION['users'] = $d['id_user'];
              $_SESSION['pengajuan_peminjaman'] = $d['id_pengajuan'];
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
        window.location.href ='konfirmasi-peminjaman-detail.php';
        </script>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="footer-u9f">
      <div class="logo-and-links-2VB">
        <div class="logo-and-slogan-ws3">
          <p class="perpusapp-Vdf">
            <span class="perpusapp-Vdf-sub-0">Perpus</span>
            <span class="perpusapp-Vdf-sub-1">A</span>
            <span class="perpusapp-Vdf-sub-2">pp</span>
            <span class="perpusapp-Vdf-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-8KF">
          </div>
          <p class="gift-decoration-store-4To">Pinjam dan Reservasi Buku Online!</p>
        </div>
      </div>
      <div class="bottom-bar-Pky">
        <div class="copyright-ioF">
          <p class="copyright-2023-3legant-all-rights-reserved-qN5">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-9tZ">Privacy Policy</p>
          <p class="terms-of-use-VhX">Terms of Use</p>
        </div>
        <div class="social-icon-Ef7">
          <img class="social-outline-instagram-ZSV" src="./assets/social-outline-instagram-biu.png" />
          <img class="social-outline-facebook-6hK" src="./assets/social-outline-facebook-eVB.png" />
          <img class="social-outline-youtube-EoX" src="./assets/social-outline-youtube-XW5.png" />
        </div>
      </div>
    </div>
  </div>
</body>