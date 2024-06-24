<?php 
session_start();
include 'config/db.php';
$id_login = @$_SESSION['users'];
$id = @$_SESSION['books'];
$sql10 = mysqli_query($con, "SELECT * FROM cart 
JOIN users ON users.id_user = cart.id_user
JOIN books ON books.ISBN = cart.ISBN
JOIN mitra ON mitra.id_mitra = cart.id_mitra
WHERE cart.id_user = '$id_login' AND cart.id_mitra = '$id'") or die(mysqli_error($con));
$sql1 = mysqli_query($con, "SELECT * FROM cart 
JOIN users ON users.id_user = cart.id_user
JOIN books ON books.ISBN = cart.ISBN
JOIN mitra ON mitra.id_mitra = cart.id_mitra
WHERE cart.id_user = '$id_login' AND cart.id_mitra = '$id'") or die(mysqli_error($con));
$sar = mysqli_fetch_array($sql1);
$sql2 = mysqli_query($con, "SELECT * FROM cart 
JOIN users ON users.id_user = cart.id_user
JOIN books ON books.ISBN = cart.ISBN
JOIN mitra ON mitra.id_mitra = cart.id_mitra
WHERE cart.id_user = '$id_login' AND cart.id_mitra = '$id'") or die(mysqli_error($con));
        $tanggal = date("Y-m-d");
$total = mysqli_num_rows($sql1);
$sat = mysqli_fetch_array($sql2);
  if (isset($_POST["simpan"])){
    $_SESSION['books'] = $_POST['simpan'];
    $_SESSION['users'] = $sar['id_user'];
    $save= mysqli_query($con,"INSERT INTO reservasi VALUES('','$_POST[simpan]','$_POST[tgl]','$_POST[catatan]') ");
    $save =  "DELETE FROM cart WHERE id_wishlist = $id";
    if ($save) {
        $sqpo = mysqli_query($con, "SELECT * FROM reservasi WHERE tanggal_peminjaman = '$_POST[tgl]'");
        $data0 = mysqli_fetch_array($sqpo);
         while ($data = mysqli_fetch_array($sql10)) { 
            $sav = mysqli_query($con,"INSERT INTO buku_reservasi_unconfir VALUES('','$data[ISBN]','$data0[id_reservasi]','$_POST[simpan]') ");
            
         }
         $sav =  mysqli_query($con,"DELETE FROM cart WHERE id_user = '$sar[id_user]' AND id_mitra = '$_POST[simpan]'");
         $_SESSION['reservasi'] = $data0['id_reservasi'];
        echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk $sar[id_user]');
        setTimeout(function () { 
        
        swal('($d[namaTampilan_user]) ', 'Akun Telah Siap', {
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
        window.location.href ='halaman-reservasi-berhasil.php';
        </script>";
    }
      }  ?>