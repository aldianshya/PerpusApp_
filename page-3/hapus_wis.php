<?php 
session_start();
include 'config/db.php';
if (isset($_post['id'])) {
    // Dapatkan nilai id dari parameter URL
    $id = $_GET['id'];

    // Persiapkan statement SQL untuk menghapus data
    $sql = "DELETE FROM wishlist WHERE id_wishlist = $id";

    // Eksekusi statement SQL
    echo " <script>
		alert('Data telah dihapus !');
		window.location.href='halaman-akun-wishlist.php';
		</script>";	
} else {

    echo " <script>
		alert('Data telah dihapus !');
		window.location.href='halaman-akun-wishlist.php';
		</script>";	
}
 ?>