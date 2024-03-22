<?php  
require "includes/config.php";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : MISSING ID. ');
$delete = mysqli_query($koneksi,"DELETE FROM skala 
								WHERE id_skala='$id'");
if ($delete) {
	echo "<script>location.href='skala.php';</script>";
}else {
	echo "<script>alert('Gagal Hapus Data');location.href='skala.php';</script>";
}
?>