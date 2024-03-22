<?php
include "includes/config.php";
include "header.php";

if (isset($_POST['btn_tb_matrix'])) {
    $id_alternatif = $_POST['tbid_alternatif'];
    $query = "SELECT b.id_bobot, k.nm_kriteria FROM bobot b, kriteria k WHERE b.id_kriteria = k.id_kriteria";
    $result = mysqli_query($koneksi, $query);

    while ($rowOuter = mysqli_fetch_assoc($result)) {
        $id_bobot = $rowOuter['id_bobot'];
        $id_skala = $_POST[$id_bobot];
        $queryInsert = "INSERT INTO matrixkeputusan (id_alternatif, id_bobot, id_skala) VALUES ('$id_alternatif', '$id_bobot', '$id_skala')";
        mysqli_query($koneksi, $queryInsert);
    }

    if ($rowOuter) {
        echo "<script>alert('Data tidak berhasil disimpan!');window.location='penilaian.php';</script>";
    } else {
        echo "<script>alert('Data berhasil disimpan!');window.location='penilaian.php';</script>";
    }
}
?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Form Tambah Penilaian</h4>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <br><br>
    <form method="POST">
        <div class="form-group row">
            <label for="a" class="col-sm-2 col-form-label">ID Alternatif</label>
            <div class="col-sm-10">
                <select class="form-control" id="tbid_alternatif" name="tbid_alternatif">
                    <?php
                    $queryAlternatif = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif NOT IN (SELECT id_alternatif FROM matrixkeputusan);");
                    while ($row = mysqli_fetch_assoc($queryAlternatif)) {
                        echo "<option value='" . $row['id_alternatif'] . "'>" . $row['nm_alternatif'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php
        $query = "SELECT b.id_bobot, k.nm_kriteria FROM bobot b, kriteria k WHERE b.id_kriteria = k.id_kriteria";
        $result = mysqli_query($koneksi, $query);

        while ($rowOuter = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-group row">
                <!-- <div class="col mb-3"> -->
                <label for="a" class="col-sm-2 col-form-label">
                    <?= $rowOuter['nm_kriteria'] ?>
                </label>
                <div class="col-sm-10">

                    <select class="form-control" name="<?= $rowOuter['id_bobot'] ?>" aria-label="Default select example" required>
                        <?php
                        $queryInner = "SELECT * FROM skala";
                        $resultInner = mysqli_query($koneksi, $queryInner);

                        while ($rowInner = mysqli_fetch_assoc($resultInner)) {
                            echo '<option value="' . $rowInner['id_skala'] . '">' . $rowInner['value'] . ' (' . $rowInner['nm_skala'] . ')</option>';
                        }
                        ?>
                    </select>
                </div>
                <!-- </div> -->
            </div>
        <?php
        }
        ?>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="btn_tb_matrix" class="btn btn-primary">Tambah</button>
                <button type="button" onclick="location.href='penilaian.php'" class="btn btn-success">Kembali</button>
            </div>
        </div>
    </form>
</div>