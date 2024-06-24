<?php
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$sql = mysqli_query($con, "SELECT * FROM users WHERE id_user = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#000000" />
  <title>Halaman Akun</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400%2C500%2C600%2C700"/>
  <link rel="stylesheet" href="./styles/halaman-akun.css"/>
</head>
<body>
<div class="halaman-akun-VBF">
  <div class="navigation-bar-2BB">
    <p class="legant-vnM">
      <span class="legant-vnM-sub-0">Perpus</span>
      <span class="legant-vnM-sub-1">A</span>
      <span class="legant-vnM-sub-2">pp</span>
    </p>
    <div class="elements-navigation-link-group--sLD">
      <div class="elements-navigation-link--NGy">
        <div class="button-X9s">
          <a href="halaman-utaman-setelah-masuk.php" class="content-Heq">Beranda</a>
        </div>
      </div>
      <div class="elements-navigation-link--PC5">
        <div class="button-XZB">
          <div class="content-gws">Perpustakaan Mitra</div>
        </div>
      </div>
      <div class="auto-group-w7ky-bow">
        <div class="elements-navigation-link--kRw">
          <div class="button-5j7">
            <div class="content-SZf">Playlist</div>
          </div>
        </div>
        <div class="elements-navigation-link--jHs">
          <div class="button-s9B">Hubungi Kami</div>
        </div>
      </div>
    </div>
    <div class="icons-Mq3">
      <div class="auto-group-zd1d-Wxq">
        <img class="interface-outline-search-02-FQd" src="./assets/interface-outline-search-02-xeu.png"/>
        <img class="interface-outline-user-circle-AnV" src="./assets/interface-outline-user-circle-4Vw.png"/>
      </div>
      <div class="elements-navigation-cart-button-WLZ">
        <img class="outline-shopping-bag-241" src="./assets/outline-shopping-bag-ZC5.png"/>
        <div class="frame-3-LqP">4</div>
      </div>
    </div>
  </div>
  <div class="content-xEV">
    <p class="akun-saya-TS9">Akun Saya</p>
    <div class="account-section-7Wh">
      <div class="menu-pvu">
        <div class="frame-743-X4d">
          <div class="elements-menu-avatar-edit-Q8R">
            <div class="avatar-tJV">
              <div class="border-radius-light-solid-pill-D5s">
                <img class="image-LgH" src="./assets/user/<?=$data['foto_user'] ?>"/>
              </div>
            </div>
          </div>
          <p class="sofia-havertz-iRw"><?=$data['namaTampilan_user'] ?></p>
        </div>
        <div class="frame-742-FRs">
        <a href="halaman-akun.php" class="elements-iKT">Akun</a>
          <div class="elements-p7b">Alamat</div>
          <div class="elements-vgR">Riwayat Peminjaman</div>
          <div class="elements-ra5">Wishlist</div>
          <div class="elements-NYR">Keluar</div>
        </div>
      </div>
      <div class="detail-sEH">
        <form method="post" action="" class="form-RFo" enctype="multipart/form-data">
          <p class="detail-akun-M9T">Edit Akun</p>
          <div class="name-673">
            <p class="nama-lengkap--qqK">Id Pengguna</p>
            <div class="input-xuw"><?=$data['id_user'] ?></div>
          </div>
          <div class="name-673">
            <p class="nama-lengkap--qqK">Nama lengkap </p>
            <input type="text" name="nama_lengkap" class="input-xuw" value="<?=$data['namaLengkap_user']?>">
          </div>
          <div class="name-EsT">
            <p class="tampilan-nama--oQm">tampilan nama </p>
            <input type="text" name="nama" class="input-Xbf" value="<?=$data['namaTampilan_user']?>">
          </div>
          <div class="name-1Wq">
            <p class="email--NMP">Email </p>
            <div class="input-u6R"><?=$data['email'] ?></div>
          </div>
          <div class="name-YfB">
            <p class="tanggal-lahir--J8Z">Tanggal lahir </p>
            <div class="input-pch"><?=$data['tanggal_lahir'] ?></div>
          </div>
          <div class="name-JXs">
            <p class="asal-instansi-Tff">Asal instansi</p>
            <input type="text" name="instansi" class="input-BrZ" value="<?=$data['asal_instansi']?>">
          </div>
          <div class="name-JXs">
            <p class="asal-instansi-Tff">Pekerjaan</p>
            <input name="pekerjaan" type="text" class="input-BrZ" value="<?=$data['pekerjaan']?>">
          </div>
          <div class="name-JXs">
            <p class="asal-instansi-Tff">Nomor Handphone</p>
            <input name="hp" type="number" class="input-BrZ" value="<?=$data['no_hp']?>">
          </div>
          <!-- <div class="name-JXs">
            <p class="asal-instansi-Tff">Foto</p>
            <input name="foto" type="file" class="input-BrZ" value="<?=$data=['foto_user']?>">
          </div> -->
          <button type="submit" class="button-n9X">Edit Profil</button>
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $jml=0;
        if (isset($_POST['nama_lengkap'])) {
            $jml=1;
            $edit1= mysqli_query($con,"UPDATE users SET namaLengkap_user='$_POST[nama_lengkap]' WHERE id_user='$id_login' ");
        }
        if (isset($_POST['nama'])) {
            $jml=1;
            $edit2= mysqli_query($con,"UPDATE users SET namaTampilan_user='$_POST[nama]' WHERE id_user='$id_login' ");
        }
        if (isset($_POST['instansi'])) {
            $jml=1;
            $edit3= mysqli_query($con,"UPDATE users SET asal_instansi='$_POST[instansi]' WHERE id_user='$id_login' ");
        }
        if (isset($_POST['pekerjaan'])) {
            $jml=1;
            $edit4= mysqli_query($con,"UPDATE users SET pekerjaan='$_POST[pekerjaan]' WHERE id_user='$id_login' ");
        }
        if (isset($_POST['hp'])) {
            $jml=1;
            $edit5= mysqli_query($con,"UPDATE users SET no_hp='$_POST[hp]' WHERE id_user='$id_login' ");
    //         $file_name = $_FILES['foto']['name'];
    //             $file_size = $_FILES['foto']['size'];
    //             $file_tmp = $_FILES['foto']['tmp_name'];
    //             $file_type = $_FILES['foto']['type'];
    //             move_uploaded_file($file_tmp, "assets/user/" . $file_name);
    // $edit6= mysqli_query($con,"UPDATE users SET foto_user='$file_name' WHERE id_user='$id_login' ");
        }
    //     if(isset($_FILES['photo'])){
    //         $jml=1;
    //         $file_name = $_FILES['foto']['name'];
    //             $file_size = $_FILES['foto']['size'];
    //             $file_tmp = $_FILES['foto']['tmp_name'];
    //             $file_type = $_FILES['foto']['type'];
    //             move_uploaded_file($file_tmp, "assets/user/" . $file_name);
    // $edit6= mysqli_query($con,"UPDATE users SET foto_user='$file_name' WHERE id_user='$id_login' ");
    //     }
        if ($jml >0) {
        echo "<script type='text/javascript'>
				setTimeout(function () { 
          alert('Anda Berhasil Mengedit Profil');
				swal('($_POST[nama]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('halaman-akun.php');
				} ,3000);   
				</script>";
    }
}
        ?>
        <!--
        echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk');
        setTimeout(function () { 
        
        swal('($d[namaTampilan_user]) ', 'Login berhasil', {
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
        window.location.href ='halaman-akun.php';
        </script>";    
        

            <div class="form-4fT">
          <p class="kata-sandi-CWm">Kata Sandi</p>
          <div class="input-9B7">
            <p class="kata-sandi-sebelumnya-W1f">Kata sandi sebelumnya</p>
            <div class="input-dc5">**********</div>
          </div>
          <div class="input-Wfs">
            <p class="kata-sandi-baru-smK">Kata sandi baru</p>
            <div class="input-QWM">Kata sandi baru</div>
          </div>
          <div class="input-J5w">
            <p class="konfirmasi-kata-sandi-baru-4L1">Konfirmasi kata sandi baru</p>
            <div class="input-Atq">Konfirmasi kata sandi baru</div>
          </div>
          <div class="auto-group-uxcf-3xd">
            <div class="button-n9X">Jangan Simpan</div>
            <div class="button-473">Simpan</div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="footer-vQ9">
    <div class="logo-and-links-3Um">
      <div class="logo-and-slogan-ajb">
        <p class="legant-8FK">
          <span class="legant-8FK-sub-0">Perpus</span>
          <span class="legant-8FK-sub-1">A</span>
          <span class="legant-8FK-sub-2">pp</span>
          <span class="legant-8FK-sub-3">
          
          <br/>
          
          </span>
        </p>
        <div class="rectangle-319-9Zj">
        </div>
        <p class="gift-decoration-store-HR3">Pinjam dan Reservasi Buku Online!</p>
      </div>
      <div class="nav-DZb">
        <p class="home-MQu">Beranda</p>
        <p class="shop-67b">Perpustakaan Mitra</p>
        <div class="auto-group-yjxw-R9s">Playlist</div>
        <p class="contact-us-KFF">Hubungi Kami</p>
      </div>
    </div>
    <div class="bottom-bar-Et1">
      <div class="copyright-Ydo">
        <p class="copyright-2023-3legant-all-rights-reserved-UGZ">Copyright © 2023 PerpusApp. All rights reserved</p>
        <p class="privacy-policy-no3">Privacy Policy</p>
        <p class="terms-of-use-veM">Terms of Use</p>
      </div>
      <div class="social-icon-TuB">
        <img class="social-outline-instagram-ayo" src="./assets/social-outline-instagram-AyP.png"/>
        <img class="social-outline-facebook-j61" src="./assets/social-outline-facebook-QVo.png"/>
        <img class="social-outline-youtube-sCD" src="./assets/social-outline-youtube-HW1.png"/>
      </div>
    </div>
  </div>
</div>
</body>