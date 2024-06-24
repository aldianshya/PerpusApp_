<?php
session_start();
include 'config/db.php';
$tanggal = date("d-m-Y");
$id_login = @$_SESSION['mitra'];
    if (isset($_POST['komen'])) {
    $save= mysqli_query($con,"INSERT INTO ulasan_mitra  values ('id_ulasan', '$id_login', 'id_user', '$_POST[rat]', '$_POST[komen]', '$tanggal')  ");
    if ($save) {
        echo "<script type='text/javascript'>
        alert('Komentar Berhasil Di Ajukan');
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
        window.location.href ='halaman-deskripsi-perpustakaan-setelah-masuk.php';
        </script>";
    }
} else {
    echo "<script>alert('Tidak ada Data yang perlu di Input');
    window.location.href ='halaman-deskripsi-perpustakaan-setelah-masuk.php';
    </script>";
}
?>