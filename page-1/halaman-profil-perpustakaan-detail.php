<?php
session_start();
include 'config/db.php';
$id_staff = @$_SESSION['staff'];
$sql = mysqli_query(
  $con,
  "SELECT * FROM staff 
JOIN mitra ON mitra.id_mitra = staff.id_mitra
JOIN kabupaten ON kabupaten.id_kabupaten = mitra.id_kabupaten
JOIN provinsi ON provinsi.id_provinsi = kabupaten.id_provinsi
WHERE id_staff = '$id_staff'"
) or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
$sqli = mysqli_query(
  $con,
  "SELECT * FROM Provinsi"
)or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Profil Perpustakaan (Detail)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700" />
  <link rel="stylesheet" href="./styles/halaman-profil-perpustakaan-detail.css" />
</head>

<body>
  <div class="halaman-profil-perpustakaan-detail-Uqj">
    <div class="navigation-bar-nbX">
      <span class="navigation-bar-nbX-sub-0">Perpus</span>
      <span class="navigation-bar-nbX-sub-1">A</span>
      <span class="navigation-bar-nbX-sub-2">pp</span>
    </div>
    <div class="content-QmK">
      <div class="content-jHo">
        <div class="menu-VXs">
          <div class="menu-ymX">
            <div class="frame-743-hhX">
              <div class="elements-menu-avatar-edit-ESZ">
                <div class="avatar-ju7">
                  <img class="border-radius-light-solid-pill-skR" src="./assets/staff/ikhsan.JPEG" />
                </div>
              </div>
              <p class="tobi-anson-7em">
                <?= $data['nama_staff'] ?>
              </p>
            </div>
            <div class="frame-742-eYM">
              <a class="elements-6v9" href="halaman-profil-staff.php">Profil Staff</a>
              <a class="elements-QnR" href="halaman-profil-perpustakaan.php">Profile Perpustakaan</a>
              <a class="elements-6v9" href="halaman-kelola-buku-daftar-buku.php">Kelola Buku</a>
              <!-- <a class="elements-6v9" href="konfirmasi-peminjaman.php">Konfirmai Peminjaman</a> -->
              <a class="elements-6v9" href="halaman-peminjaman-berlangsung.php">Peminjaman Berlangsung</a>
              <a class="elements-6v9" href="konfirmasi-reservasi.php">Konfirmasi Reservasi</a>
              <a class="elements-6v9" href="#">Keluar</a>
            </div>
          </div>
          <form class="form-hbK" method="post" action="">
            <div class="auto-group-rkuo-eFf">
              <p class="profil-perpustakaan-af7">Profil Perpustakaan</p>
              <a class="kembali-Wof" href="javascript:history.back()">&lt;&lt; Kembali</a>
            </div>
            <div class="name-rMj">
              <p class="nama-CAh">Nama</p>
                <input type="text" name="nama_mitra" value="<?= $data['nama_mitra'] ?>" class="input-84M">
            </div>
            <div class="name-BHX">
              <p class="provinsi-KPj">Provinsi</p>
              <div class="input-3qX">
                <p class="your-email-o41">
                  <?= $data['nama_provinsi'] ?>
                </p>
              </div>
            </div>
            <div class="name-QJh">
              <p class="kabupaten-kota-xb7">Kabupaten/kota</p>
              <div class="input-GLu">
                <p class="your-email-D1F">
                  <?= $data['nama_kabupaten'] ?>
                </p>
              </div>
            </div>
            <div class="name-SPo">
              <p class="telepon-CNy">Telepon</p>
              <input type="text" name="telepon_mitra" class="input-XAM" value="<?= $data['telepon_mitra'] ?>">
            </div>
            <div class="name-aeR">
              <p class="email-YLM">Email</p>
              <input type="email" class="input-Ty7" name="email_mitra" value="<?= $data['email_mitra'] ?>">
            </div>
            <div class="name-ZWM">
              <p class="jam-buka-KkR">Jam Buka</p>
              <input type="time" class="input-f3b" name="jam_buka" value="<?= $data['jam_buka'] ?>">
            </div>
            <div class="name-LvR">
              <p class="jam-tutup-hFB">Jam tutup</p>
              <input type="time" class="input-dPj" name="jam_tutup" value="<?= $data['jam_tutup'] ?>">
            </div>
            <div class="name-7Ju">
              <p class="deskripsi-rXP">Deskripsi</p>
              <div class="input-mPT">
                <input type="text" name="deskripsi_mitra" class="your-email-VqF" value="<?= $data['deskripsi_mitra'] ?>">
              </div>
              <div class="name-zGD">
                <p class="link-google-maps-kFP">Link google maps</p>
                <input type="text" name="gmaps" class="input-52m" value="<?= $data['gmaps'] ?>">
              </div>
            </div>
            <button type="submit" class="button-9YR">Simpan</button>
          </form>
          <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $jml = 0;
        if (isset($_POST['nama_mitra'])) {
          $jml = 1;
          $edit1 = mysqli_query($con, "UPDATE mitra SET nama_mitra='$_POST[nama_mitra]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if (isset($_POST['telepon_mitra'])) {
          $jml = 1;
          $edit2 = mysqli_query($con, "UPDATE mitra SET telepon_mitra='$_POST[telepon_mitra]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if (isset($_POST['email_mitra'])) {
          $jml = 1;
          $edit3 = mysqli_query($con, "UPDATE mitra SET email_mitra='$_POST[email_mitra]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if (isset($_POST['jam_buka'])) {
          $jml = 1;
          $edit4 = mysqli_query($con, "UPDATE mitra SET jam_buka='$_POST[jam_buka]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if (isset($_POST['jam_tutup'])) {
          $jml = 1;
          $edit5 = mysqli_query($con, "UPDATE mitra SET jam_tutup='$_POST[jam_tutup]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if (isset($_POST['deskripsi_mitra'])) {
          $jml = 1;
          $edit6 = mysqli_query($con, "UPDATE mitra SET deskripsi_mitra='$_POST[deskripsi_mitra]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if (isset($_POST['gmaps'])) {
          $jml = 1;
          $edit7 = mysqli_query($con, "UPDATE mitra SET gmaps='$_POST[gmaps]' WHERE id_mitra='$data[id_mitra]' ");
        }
        if ($jml > 0) {
          echo "<script type='text/javascript'>
				setTimeout(function () { 
          alert('Anda Berhasil Mengedit Profil Perpustakaan');
				swal('($_POST[nama_mitra]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('halaman-profil-perpustakaan.php');
				} ,3000);   
				</script>";
        } else {
          echo "<script type='text/javascript'>
      setTimeout(function () { 
        alert('Anda GAGAL Mengedit Profil Perpustakaan');
      swal('($_POST[nama_mitra]) ', 'Berhasil diubah', {
      icon : 'success',
      buttons: {        			
      confirm: {
      className : 'btn btn-success'
      }
      },
      });    
      },10);  
      window.setTimeout(function(){ 
      window.location.replace('halaman-profil-perpustakaan.php');
      } ,3000);   
      </script>";
        }
      }
      ?>
        </div>
      </div>
    </div>
    <div class="footer-rr9">
      <div class="logo-and-links-miD">
        <div class="logo-and-slogan-VPK">
          <p class="perpusapp-39w">
            <span class="perpusapp-39w-sub-0">Perpus</span>
            <span class="perpusapp-39w-sub-1">A</span>
            <span class="perpusapp-39w-sub-2">pp</span>
            <span class="perpusapp-39w-sub-3">
              <br />
            </span>
          </p>
          <div class="rectangle-319-n9T"></div>
          <p class="gift-decoration-store-uUy">
            Pinjam dan Reservasi Buku Online!
          </p>
        </div>
      </div>
      <div class="bottom-bar-q7j">
        <div class="copyright-m1P">
          <p class="copyright-2023-3legant-all-rights-reserved-HkR">
            Copyright © 2023 PerpusApp. All rights reserved
          </p>
          <p class="privacy-policy-CcV">Privacy Policy</p>
          <p class="terms-of-use-jsK">Terms of Use</p>
        </div>
        <div class="social-icon-gGm">
          <img class="social-outline-instagram-149" src="./assets/social-outline-instagram-NG5.png" />
          <img class="social-outline-facebook-8eZ" src="./assets/social-outline-facebook-hMX.png" />
          <img class="social-outline-youtube-rqT" src="./assets/social-outline-youtube-NZK.png" />
        </div>
      </div>
    </div>
  </div>
</body>

</html>