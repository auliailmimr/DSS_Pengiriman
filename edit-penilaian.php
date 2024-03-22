<?php  
include "header.php";
include "includes/config.php";

// Code edit data
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$query = mysqli_query($koneksi, "SELECT * FROM matrixkeputusan WHERE id_matrix=" . $id);
$getRow = mysqli_fetch_array($query);

// Code update data
if ($_POST) {
    $selectedAlternatif = $_POST['a'];
    $selectedBobot = $_POST['b'];
    $selectedSkala = $_POST['s'];

    $update = mysqli_query($koneksi, "UPDATE matrixkeputusan 
                    SET id_alternatif = '$selectedAlternatif', id_bobot ='$selectedBobot', id_skala = '$selectedSkala'
                    WHERE id_matrix ='$id'");
    if ($update) {
        echo "<script>location.href='penilaian.php'</script>";
    } else {
        echo "Gagal";
    }
}
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Form Ubah Nilai Kriteria</h4>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    <br><br>
    <form method="POST" action="">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Id Bobot</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $getRow['id_matrix'] ?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="a" class="col-sm-2 col-form-label">Id Alternatif</label>
            <div class="col-sm-10">
                <select class="form-control" id="a" name="a">
                    <?php
                    $queryAlternatif = mysqli_query($koneksi, "SELECT * FROM alternatif");
                    while ($row = mysqli_fetch_assoc($queryAlternatif)) {
                        $selected = ($row['id_alternatif'] == $getRow['id_alternatif']) ? 'selected' : '';
                        echo "<option value='" . $row['id_alternatif'] . "' $selected>" . $row['id_alternatif'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="b" class="col-sm-2 col-form-label">Id Bobot</label>
            <div class="col-sm-10">
                <select class="form-control" id="b" name="b">
                    <?php
                    $queryBobot = mysqli_query($koneksi, "SELECT * FROM bobot");
                    while ($row = mysqli_fetch_assoc($queryBobot)) {
                        $selected = ($row['id_bobot'] == $getRow['id_bobot']) ? 'selected' : '';
                        echo "<option value='" . $row['id_bobot'] . "' $selected>" . $row['id_bobot'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="s" class="col-sm-2 col-form-label">Id Skala</label>
            <div class="col-sm-10">
                <select class="form-control" id="s" name="s">
                    <?php
                    $querySkala = mysqli_query($koneksi, "SELECT * FROM skala");
                    while ($row = mysqli_fetch_assoc($querySkala)) {
                        $selected = ($row['id_skala'] == $getRow['id_skala']) ? 'selected' : '';
                        echo "<option value='" . $row['id_skala'] . "' $selected>" . $row['id_skala'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <button type="button" onclick="location.href='penilaian.php'" class="btn btn-success">Kembali</button>
            </div>
        </div>
    </form>
</div>