<?php 
session_start();
include 'config/db.php';
  if (isset($_POST["detail"])){
  $_SESSION['books'] = $_POST['detail'];
      echo "<script type='text/javascript'>
      window.setTimeout(function(){ 
      } ,3000);
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
      window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
      </script>";
  } 
  if (isset($_POST["det"])){
  $_SESSION['books'] = $_POST['det'];
      echo "<script type='text/javascript'>
      window.setTimeout(function(){ 
      } ,3000);
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
      window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
      </script>";
  }
  if (isset($_POST["kat"])){
  $_SESSION['books'] = $_POST['kat'];
      echo "<script type='text/javascript'>
      window.setTimeout(function(){ 
      } ,3000);
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
      window.location.href ='halaman-kategori.php';
      </script>";
  }  
  $jl=0;
  $tes = mysqli_query($con, "SELECT * FROM wishlist 
WHERE id_user = '$id_login' AND isbn = '$_POST[wis]'") or die(mysqli_error($con));
  if (isset($_POST["wis"])){
    $pass = $_POST['wis'];
    while ($date = mysqli_fetch_array($tes)) {
      if ($_POST['wis'] = $date['ISBN']) {
        $jl=1;
      }
     }
    if ($jl = 0){
    $save = mysqli_query($con, "INSERT INTO wishlist VALUES('','$data2[id_user]','$pass') ");
    if ($save) {
  $_SESSION['books'] = $_POST['ko'];
      echo "<script type='text/javascript'>
      alert('Berhasil menambahkan buku ke wishlist');
      window.setTimeout(function(){ 
      } ,3000);
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
      window.location.href ='halaman-pencarian-setelah-masuk.php';
      </script>";
  }  
  }
  if($jl = 1) {
  $_SESSION['books'] = $_POST['wis'];
    echo "<script type='text/javascript'>
      alert('Maaf buku telah ada di wishlist!!!');
      window.setTimeout(function(){ 
      } ,3000);
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
      window.location.href ='halaman-kategori.php';
      </script>";
  }
  }
  if (isset($_POST["play"])) {
    $pas = $_POST['play'];
    $selectedTable = $_POST["selected_table"];
    $sav = mysqli_query($con, "INSERT INTO playlist_books VALUES('','$selectedTable','$pas','') ");
    echo "<script>alert('Berhasil menambahkan buku ke playlist $selectedTable');
  window.location.href ='halaman-pencarian-setelah-masuk.php';
  </script>";
  }
  if (isset($_POST["deta"])) {

    echo "<script>
  window.location.href ='halaman-deskripsi-buku-setelah-masuk.php';
  </script>";
  }
  ?>