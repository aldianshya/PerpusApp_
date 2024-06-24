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
JOIN kategori ON kategori.id_kategori = books.id_kategori
WHERE id_staff = '$id_staff'"
) or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$kategori = mysqli_query(
  $con,
  "SELECT * FROM kategori"
)or die(mysqli_error($con));
$books = mysqli_query(
  $con,
  "SELECT * FROM books"
)or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Kelola Buku (Tambah Buku)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-kelola-buku-tambah-buku.css"/>
</head>
<body>
<div class="halaman-kelola-buku-tambah-buku-xLD">
  <div class="navigation-bar-sxy">
    <span class="navigation-bar-sxy-sub-0">Perpus</span>
    <span class="navigation-bar-sxy-sub-1">A</span>
    <span class="navigation-bar-sxy-sub-2">pp</span>
  </div>
  <div class="content-zAR">
    <div class="content-7kq">
      <div class="menu-5Bs">
        <div class="frame-743-mqP">
          <div class="elements-menu-avatar-edit-uAu">
            <div class="avatar-1zd">
              <img class="border-radius-light-solid-pill-AMj" src="./assets/staff/ikhsan.JPEG"/>
            </div>
          </div>
          <p class="tobi-anson-CZK"><?=$data['nama_staff']?></p>
        </div>
        <div class="frame-742-XrV">
          <a class="menu-item-VHX" href="halaman-profil-staff.php">Profil Staff</a>
          <a class="elements-DUR" href="halaman-profil-perpustakaan.php">Profil Perpustakaan</a>
          <a class="elements-KnM" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
          <!-- <a class="elements-DUR" href="konfirmasi-peminjaman.php">Konfirmasi Peminjaman</a> -->
          <a class="menu-item-VHX" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
          <a class="menu-item-VHX" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
          <a class="menu-item-VHX" href="../halaman-masuk.php">Keluar</a>
        </div>
      </div>
      <div class="auto-group-2fx9-Jnh">
        <div class="navigation-bar-4G5">
          <div class="elements-navigation-link-group--mwB">
            <div class="button-KSu">
              <div class="content-Gsw">Daftar Buku</div>
            </div>
            <div class="button-BV7">
              <div class="content-L77">Tambah Buku</div>
            </div>
          </div>
        </div>
        <form class="form-31X" method="post">
          <div class="name-N3o">
            <p class="isbn-itM">ISBN</p>
            <input type="text" name="isbn" class="input-FtH" placeholder="Masukkan ISBN" required> 
          </div>
          <div class="name-KdF">
            <p class="judul-5MX">Judul</p>
            <input type="text" name="Judul" class="input-1FB" placeholder="Masukkan Judul Buku" required>
          </div>
          <div class="name-UPf">
            <p class="penulis-qV7">Penulis</p>
            <input type="text" name="Penulis" class="input-xpd" placeholder="Masukkan Penulis Buku" required>
          </div>
          <div class="name-Foj">
            <p class="penerbit-E1T">Penerbit</p>
            <input type="text" name="Penerbit" class="input-AQu" placeholder="Masukkan Penerbit Buku" required>
          </div>
          <div class="name-roX">
            <p class="deskripsi-1Ad">Deskripsi</p>
            <input type="text" name="Deskripsi" class="input-wpy" placeholder="Masukkan Deskripsi Buku" required>
            <div class="name-EJH">
              <p class="kategori-BzD">Kategori</p>
              <select name="id_kategori" class="input-77B" required>
              <?php while ($list_kate = mysqli_fetch_assoc($kategori)): ?>
                <option><?=$list_kate['id_kategori']?>. <?=$list_kate['nama_kategori']?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="name-W9K">
              <p class="bahasa-GeH">Bahasa</p>
              <input type="text" name="Bahasa" class="input-bwT" placeholder="Masukkan Bahasa yang terdapat pada buku" required>
            </div>
            <div class="name-W9K">
              <p class="bahasa-GeH">Stok</p>
              <input type="number" name="stok" class="input-bwT" value="0" required>
            </div>
            <div class="name-WHj">
              <p class="cover-Fm7">cover</p>
              <input type="file" name="Cover" class="input-b4H" placeholder="Upload gambar buku" > 
            </div>
          </div>
          <button type="submit" class="button-sXb">Simpan</button>
        </form>
        <?php
// Include your database connection file here

// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $isbn = $_POST['isbn'];
    $judul = $_POST['Judul'];
    $penulis = $_POST['Penulis'];
    $penerbit = $_POST['Penerbit'];
    $deskripsi = $_POST['Deskripsi'];
    $id_kategori = $_POST['id_kategori'];
    $bahasa = $_POST['Bahasa'];
    $stok = mysqli_real_escape_string($con, $_POST['stok']);

    // // File upload handling
    // $cover = ''; // Default value
    // if (isset($_FILES['Cover']) && $_FILES['Cover']['error'] == 0) {
    //     $target_dir = "assets/booksCover"; // Change this to your desired upload directory
    //     $target_file = $target_dir . basename($_FILES["Cover"]["name"]);
    //     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //     // Check if the file is an image
    //     $check = getimagesize($_FILES["Cover"]["tmp_name"]);
    //     if ($check !== false) {
    //         // Move the uploaded file to the target directory
    //         move_uploaded_file($_FILES["Cover"]["tmp_name"], $target_file);
    //         $cover = $target_file;
    //     } else {
    //         echo "File is not an image.";
    //         exit();
    //     }
    // }

    // Query untuk menambahkan data buku
    $insert_books = "INSERT INTO books (ISBN, Judul, Penulis, Penerbit, Deskripsi, id_kategori, Bahasa, Cover)
                     VALUES ('$isbn', '$judul', '$penulis', '$penerbit', '$deskripsi', '$id_kategori', '$bahasa', '$cover')";

    $insert_stock = "INSERT INTO stok_buku (ISBN, stok, id_mitra) VALUES ('$isbn', '$stok', '$data[id_mitra]')";

    // Execute the queries
    $result_books = mysqli_query($con, $insert_books);
    $result_stock = mysqli_query($con, $insert_stock);

    if ($result_books && $result_stock) {
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
  <div class="footer-vkm">
    <div class="logo-and-links-Sj7">
      <div class="logo-and-slogan-A9K">
        <p class="perpusapp-WU5">
          <span class="perpusapp-WU5-sub-0">Perpus</span>
          <span class="perpusapp-WU5-sub-1">A</span>
          <span class="perpusapp-WU5-sub-2">pp</span>
          <span class="perpusapp-WU5-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-Neh">
        </div>
        <p class="gift-decoration-store-vAR">Pinjam dan Reservasi Buku Online!</p>
      </div>
    </div>
    <div class="bottom-bar-TAM">
      <div class="copyright-yeV">
        <p class="copyright-2023-3legant-all-rights-reserved-iMB">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-dj3">Privacy Policy</p>
        <p class="terms-of-use-BEm">Terms of Use</p>
      </div>
      <div class="social-icon-ikV">
        <img class="social-outline-instagram-3nm" src="./assets/social-outline-instagram-xsw.png"/>
        <img class="social-outline-facebook-ywK" src="./assets/social-outline-facebook-miu.png"/>
        <img class="social-outline-youtube-vbf" src="./assets/social-outline-youtube-MGq.png"/>
      </div>
    </div>
  </div>
</div>
</body>