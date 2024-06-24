<?php
session_start();
include 'config/db.php';
    if ($_POST['pw']==$_POST['konfirpw']) {
    
    $file_name = $_FILES['foto']['name'];
    $file_size = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $file_type = $_FILES['foto']['type'];
    move_uploaded_file($file_tmp, "assets/user/" . $file_name);
    $save= mysqli_query($con,"INSERT INTO users VALUES('$_POST[id]','$_POST[pw]','$_POST[nama_lengkap]','$_POST[nama]','$_POST[email]','$_POST[alamatp]','$_POST[alamats]',
    '$_POST[hp]','$_POST[pekerjaan]','$_POST[tgl]','$_POST[instansi]','$file_name') ");
    if ($save) {
        echo "<script type='text/javascript'>
        alert('Anda Berhasil Masuk');
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
        window.location.href ='halaman-masuk.php';
        </script>";
    }
} else {
    echo "<script>alert('Password anda tidak sama dengan konfirmasi password anda');
    window.location.href ='halaman-buat-akun.php';
    </script>";
}
?>