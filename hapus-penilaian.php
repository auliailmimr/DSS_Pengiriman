<?php  
require "includes/config.php";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : MISSING ID. ');
$delete = mysqli_query($koneksi,"DELETE FROM matrixkeputusan 
								WHERE id_matrix='$id'");
if ($delete) {
	echo "<script>location.href='penilaian.php';</script>";
}else {
	echo "<script>alert('Gagal Hapus Data');location.href='penilaian.php';</script>";
}
?>