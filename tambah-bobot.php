<?php
include "header.php";
include "includes/config.php";

//code insert data
if ($_POST) {
    $selectedKriteria = $_POST['kt'];
	$jm = $_POST['jm'];

    // Validasi apakah id_kriteria yang diinput ada dalam tabel kriteria
    $checkKriteria = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria = '$selectedKriteria'");

    if (mysqli_num_rows($checkKriteria) > 0) {
        // Jika id_kriteria valid, jalankan query INSERT
        $insert = mysqli_query($koneksi, "INSERT INTO bobot (id_kriteria, value) VALUES ('$selectedKriteria','$jm')");

        if ($insert) {
            echo "<script>location.href='bobot.php'</script>";
        } else {
            echo "Gagal";
        }
    } else {
        echo "Id Kriteria tidak valid.";
    }
}
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Form Tambah Bobot</h4>
		</div>
		<div class="col-md-6">

		</div>
	</div>
	<br><br>
	<form method="POST" action="">
	<div class="form-group row">
    <label for="kt" class="col-sm-2 col-form-label">ID Kriteria</label>
    <div class="col-sm-10">
        <select class="form-control" id="kt" name="kt">
            <?php
            $queryKriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");
            while ($row = mysqli_fetch_assoc($queryKriteria)) {
                echo "<option value='" . $row['id_kriteria'] . "'>" . $row['id_kriteria'] . "</option>";
            }
            ?>
        </select>
    </div>
</div>

		<div class="form-group row">
			<label for="jum" class="col-sm-2 col-form-label">Value</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="jum" name="jm">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Tambah</button>
				<button type="button" onclick="location.href='nilai.php'" class="btn btn-success">Kembali</button>
			</div>
		</div>
	</form>
</div>