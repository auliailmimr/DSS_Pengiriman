<?php  
include "includes/config.php";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : MISSING ID. ');
$delete = mysqli_query($koneksi,"DELETE FROM bobot
								WHERE id_bobot='$id'");
if ($delete) {
	echo "<script>location.href='bobot.php';</script>";
}else {
	echo "<script>alert('Gagal Hapus Data');location.href='bobot.php';</script>";
}
?>