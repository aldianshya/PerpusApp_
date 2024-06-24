<?php
session_start();
include 'config/db.php';
$id_staff = @$_SESSION['books'];
$sql = mysqli_query(
  $con,
  "SELECT * FROM books 
JOIN stok_buku ON stok_buku.ISBN = books.ISBN
JOIN kategori ON kategori.id_kategori = books.id_kategori 
WHERE books.ISBN = '$id_staff'"
) or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$kategori = mysqli_query($con, "SELECT * FROM kategori") or die(mysqli_error($con))
  // Periksa apakah parameter isbn telah diberikan
// if (isset($_GET['isbn'])) {
//   $isbn = mysqli_real_escape_string($con, $_GET['isbn']);

  //   // Query untuk mendapatkan data buku berdasarkan ISBN
//   $query = "SELECT * FROM staff 
//             JOIN mitra ON mitra.id_mitra = staff.id_mitra
//             JOIN stok_buku ON stok_buku.id_mitra = mitra.id_mitra
//             JOIN books ON books.isbn = stok_buku.isbn
//             JOIN kategori ON kategori.id_kategori = books.id_kategori
//             WHERE books.isbn = '$isbn'";

  //   $result = mysqli_query($con, $query) or die(mysqli_error($con));
//   $data = mysqli_fetch_array($result);

  //   // Ambil data kategori untuk dropdown
//   $kategori = mysqli_query($con, "SELECT * FROM kategori") or die(mysqli_error($con));
// }
  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Kelola Buku (Edit Daftar Buku)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="./styles/halaman-kelola-buku-edit-daftar-buku.css" />
</head>

<body>
  <div class="halaman-kelola-buku-edit-daftar-buku-gHB">
    <div class="navigation-bar-QU5">
      <span class="navigation-bar-QU5-sub-0">Perpus</span>
      <span class="navigation-bar-QU5-sub-1">A</span>
      <span class="navigation-bar-QU5-sub-2">pp</span>
    </div>
    <div class="content-ELd">
      <div class="content-Zdo">
        <div class="menu-8B7">
          <div class="frame-743-3os">
            <div class="elements-menu-avatar-edit-aoo">
              <div class="avatar-Vvm">
                <img class="border-radius-light-solid-pill-dn5" src="./assets/staff/ikhsan.JPEG" />
              </div>
            </div>
            <p class="tobi-anson-Unh">
              <?= $data['nama_staff'] ?>
            </p>
          </div>
          <div class="frame-742-c8D">
            <a class="menu-item-mG1" href="halaman-profil-staff.php">Profil Staff</a>
            <a class="elements-h9f" href="halaman-profil-perpustakaan.php">Profil Perpustakaan</a>
            <a class="elements-bkq" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
            <div class="auto-group-71fk-hos">
              <!-- <a class="menu-item-F4h" href="konfirmasi-peminjaman.php">Konfirmasi Peminjaman</a> -->
              <a class="menu-item-naR" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
              <a class="menu-item-Lbw" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
              <a class="menu-item-tdT" href="../halaman-masuk.php">Keluar</a>
            </div>
          </div>

        </div>
        <div class="auto-group-czss-1i5">
          <div class="navigation-bar-mBT">
            <div class="elements-navigation-link-group--VdF">
              <div class="button-QkD">
                <div class="content-NBF">Daftar Buku</div>
              </div>
              <div class="button-445">
                <div class="content-oXT">Tambah Buku</div>
              </div>
            </div>
            <a class="kembali-7Y9" href="javascript:history.back()">&lt;&lt; Kembali</a>
          </div>
          <div class="form-qU9">
            <p class="judul-buku-1-mMo">
              <?= $data['Judul'] ?>
            </p>
            <form action="" method="post">
              <div class="name-7Rf">
                <p class="isbn-svd">ISBN</p>
                <input type="text" name="isbn" value="<?= $data['ISBN'] ?>" class="input-DDo" readonly>
              </div>
              <br>
              <div class="name-gt5">
                <p class="judul-epu">Judul</p>
                <input type="text" name="judul" value="<?= $data['Judul'] ?>" class="input-zNy">
              </div>
              <br>

              <div class="name-UZ3">
                <p class="penulis-SVs">Penulis</p>
                <input type="text" name="penulis" value="<?= $data['Penulis'] ?>" class="input-BCZ">
              </div>
              <br>

              <div class="name-GE1">
                <p class="penerbit-S8V">Penerbit</p>
                <input type="text" name="penerbit" value="<?= $data['Penerbit'] ?>" class="input-AKP">
              </div>
              <br>

              <div class="name-f1F">
                <p class="deskripsi-odF">Deskripsi</p>
                <textarea name="deskripsi" class="input-k2h"><?= $data['Deskripsi'] ?></textarea>
              </div>
              <br>

              <div class="name-yg9">
                <p class="kategori-9ad">Stok</p>
                <input type="number" name="stok" value="<?= $data['stok'] ?>" class="input-tHK">
              </div>
              <br>

              <div class="name-aR3">
                <p class="kategori-Xr5">Kategori</p>
                <select name="id_kategori" class="input-GYm">
                  <?php while ($row = mysqli_fetch_assoc($kategori)): ?>
                    <option value="<?= $row['id_kategori'] ?>" <?= ($row['id_kategori'] == $data['id_kategori']) ? 'selected' : '' ?>>
                      <?= $row['nama_kategori'] ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
              <br>

              <div class="name-YFP">
                <p class="bahasa-JkM">Bahasa</p>
                <input type="text" name="bahasa" value="<?= $data['Bahasa'] ?>" class="input-3T3">
              </div>
              <br>

              <div class="name-8UV">
                <p class="cover-JNy">Cover</p>
                <input type="text" name="cover" value="<?= $data['Cover'] ?>" class="input-SVB">
              </div>
              <br>
              <input type="submit" class="button-jDP" value="Simpan">
            </form>
            <?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $isbn = mysqli_real_escape_string($con, $_POST['isbn']);
    $judul = mysqli_real_escape_string($con, $_POST['judul']);
    $penulis = mysqli_real_escape_string($con, $_POST['penulis']);
    $penerbit = mysqli_real_escape_string($con, $_POST['penerbit']);
    $deskripsi = mysqli_real_escape_string($con, $_POST['deskripsi']);
    $stok = mysqli_real_escape_string($con, $_POST['stok']);
    $id_kategori = mysqli_real_escape_string($con, $_POST['id_kategori']);
    $bahasa = mysqli_real_escape_string($con, $_POST['bahasa']);
    $cover = mysqli_real_escape_string($con, $_POST['cover']);

    // Query untuk memperbarui data buku
    $update_books = "UPDATE books SET
                        Judul = '$judul',
                        Penulis = '$penulis',
                        Penerbit = '$penerbit',
                        Deskripsi = '$deskripsi',
                        id_kategori = '$id_kategori',
                        Bahasa = '$bahasa',
                        Cover = '$cover'
                    WHERE ISBN = '$isbn';
                    UPDATE stok_buku SET
                      stok = '$stok'
                      WHERE ISBN = '$isbn' AND id_mitra='$data[id_mitra]'";
    
    $result = mysqli_multi_query($con, $update_books);

    if ($result) {
        // Redirect kembali ke halaman kelola buku
        echo "<script type='text/javascript'>
				setTimeout(function () { 
          alert('Anda Berhasil Mengedit Buku');
				swal('($_POST[judul]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('halaman-kelola-buku-daftar-buku.php');
				} ,300);   
				</script>";
    } else {
        // Jika query gagal
        echo "<script type='text/javascript'>
      setTimeout(function () { 
        alert('Anda Gagal Mengedit Buku');
      swal('($_POST[judul]) ', 'Berhasil diubah', {
      icon : 'success',
      buttons: {        			
      confirm: {
      className : 'btn btn-success'
      }
      },
      });    
      },10);  
      window.setTimeout(function(){ 
      window.location.replace('halaman-kelola-buku-daftar-buku.php');
      } ,300);   
      </script>";
    }
} else {
    // Jika form tidak di-submit, redirect ke halaman yang sesuai
    header("Location: halaman-kelola-buku-daftar-buku.php");
    exit();
}
?>


          </div>
        </div>
      </div>
    </div>
    <div class="footer-zf7">
      <div class="logo-and-links-iLD">
        <div class="logo-and-slogan-EpM">
          <p class="perpusapp-zHj">
            <span class="perpusapp-zHj-sub-0">Perpus</span>
            <span class="perpusapp-zHj-sub-1">A</span>
            <span class="perpusapp-zHj-sub-2">pp</span>
            <span class="perpusapp-zHj-sub-3">

              <br />

            </span>
          </p>
          <div class="rectangle-319-eFo">
          </div>
          <p class="gift-decoration-store-yos">Pinjam dan Reservasi Buku Online!</p>
        </div>
      </div>
      <div class="bottom-bar-Jr9">
        <div class="copyright-Ejo">
          <p class="copyright-2023-3legant-all-rights-reserved-a2y">Copyright © 2023 PerpusApp. All rights reserved</p>
          <p class="privacy-policy-61K">Privacy Policy</p>
          <p class="terms-of-use-Drd">Terms of Use</p>
        </div>
        <div class="social-icon-Mhw">
          <img class="social-outline-instagram-Gpu" src="./assets/social-outline-instagram-HLy.png" />
          <img class="social-outline-facebook-p5j" src="./assets/social-outline-facebook-8Qu.png" />
          <img class="social-outline-youtube-MLZ" src="./assets/social-outline-youtube-TiD.png" />
        </div>
      </div>
    </div>
  </div>
</body>