<?php
include "header.php";
?>

<!-- Header - set the background image for the header in the line below-->
<header class="py-5 bg-image-full" style="background-image: url('img/pengiriman.jpg')">
    <div class="text-center my-5">
        <img class="img-fluid rounded-circle mb-4" src="img/delivery.jpg" alt="Aulia Ilmi Maghfira" width="200" />
    </div>
</header>

<!-- Content section-->
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center text-center">
            <!-- <div class="col-lg-6"> -->
            <h2>Sistem Pendukung Keputusan Pengiriman Barang</h2>
            <p>Sistem pengiriman barang menggunakan metode TOPSIS (Technique for Order of Preference by Similarity to Ideal Solution) melibatkan identifikasi kriteria-kriteria kritis seperti biaya, waktu, keamanan, dan keandalan penyedia logistik. Data terkait kriteria dikumpulkan dan dinormalisasi untuk matriks keputusan. Dengan matriks ideal positif dan negatif, jarak Euclidean dihitung untuk menilai sejauh mana setiap opsi mendekati solusi ideal. Skor TOPSIS dihasilkan untuk setiap opsi, yang kemudian digunakan untuk merangking opsi tersebut. Dengan pendekatan ini, perusahaan dapat mengambil keputusan yang terinformasi dan optimal dalam memilih rute pengiriman atau penyedia logistik, mengoptimalkan efisiensi, dan meningkatkan kinerja rantai pasokan mereka.</p>
            <p class="lead">UAS Praktikum Sistem Informasi</p>
            <p class="mb-0">Menggunakan Metode Multimoora.</p>
            <!-- </div> -->
        </div>
    </div>
</section>

<!-- Content section-->
<section class="py-5">
    <div class="container my-5">
        <div class="row justify-content-center">
            <!-- <div class="col-lg-6"> -->

            <!-- Tabel Multimoora_1-->
            <?php
            include "includes/config.php";
            $koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
            $query = mysqli_query($koneksi, "SELECT * FROM multimoora_1");
            ?>

            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Tabel Matrix Multimoora</h4>
                    </div>
                    <!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
                </div>
                <br>

                <table id="tabeldata" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Matrix</th>
                            <th>ID Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>ID Bobot</th>
                            <th>Nilai Bobot</th>
                            <th>ID Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>ID Skala</th>
                            <th>Nama Skala</th>
                            <th>Value</th>
                            <th>Pra</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_matrix'] ?></td>
                                <td><?php echo $row['id_kriteria'] ?></td>
                                <td><?php echo $row['nm_kriteria'] ?></td>
                                <td><?php echo $row['id_bobot'] ?></td>
                                <td><?php echo $row['nilaibobot'] ?></td>
                                <td><?php echo $row['id_alternatif'] ?></td>
                                <td><?php echo $row['nm_alternatif'] ?></td>
                                <td><?php echo $row['id_skala'] ?></td>
                                <td><?php echo $row['nm_skala'] ?></td>
                                <td><?php echo $row['value'] ?></td>
                                <td><?php echo $row['pra'] ?></td>
                                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
                <br>
            </div>

            <!-- Tabel Multimoora_2 -->
            <?php
            include "includes/config.php";
            $koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
            $query = mysqli_query($koneksi, "SELECT * FROM multimoora_2");
            ?>

            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Tabel Normalisasi Multimoora</h4>
                    </div>
                    <!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
                </div>
                <br>

                <table id="tabeldata" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Matrix</th>
                            <th>ID Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Tipe</th>
                            <th>ID Bobot</th>
                            <th>Nilai Bobot</th>
                            <th>ID Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>ID Skala</th>
                            <th>Nama Skala</th>
                            <th>Value</th>
                            <th>Pra</th>
                            <th>Normalisasi</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_matrix'] ?></td>
                                <td><?php echo $row['id_kriteria'] ?></td>
                                <td><?php echo $row['nm_kriteria'] ?></td>
                                <td><?php echo $row['tipe'] ?></td>
                                <td><?php echo $row['id_bobot'] ?></td>
                                <td><?php echo $row['nilaibobot'] ?></td>
                                <td><?php echo $row['id_alternatif'] ?></td>
                                <td><?php echo $row['nm_alternatif'] ?></td>
                                <td><?php echo $row['id_skala'] ?></td>
                                <td><?php echo $row['nm_skala'] ?></td>
                                <td><?php echo $row['value'] ?></td>
                                <td><?php echo $row['pra'] ?></td>
                                <td><?php echo $row['normalisasi'] ?></td>
                                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_matrix'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_matrix'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
                <br>
            </div>

            <!-- Tabel multimoora_3 -->
            <?php
            include "includes/config.php";
            $koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
            $query = mysqli_query($koneksi, "SELECT * FROM multimoora_3");
            ?>

            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Tabel Min Max Ratio System Multimoora</h4>
                    </div>
                    <!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
                </div>
                <br>

                <table id="tabeldata" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Matrix</th>
                            <th>ID Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>ID Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>ID Bobot</th>
                            <th>Value</th>
                            <th>Nama Skala</th>
                            <th>Normalisasi</th>
                            <th>Terbobot</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_matrix'] ?></td>
                                <td><?php echo $row['id_alternatif'] ?></td>
                                <td><?php echo $row['nm_alternatif'] ?></td>
                                <td><?php echo $row['id_kriteria'] ?></td>
                                <td><?php echo $row['nm_kriteria'] ?></td>
                                <td><?php echo $row['id_bobot'] ?></td>
                                <td><?php echo $row['value'] ?></td>
                                <td><?php echo $row['nm_skala'] ?></td>
                                <td><?php echo $row['normalisasi'] ?></td>
                                <td><?php echo $row['terbobot'] ?></td>
                                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_matrix'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_matrix'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- topsis_maxmin -->
            <?php
            include "includes/config.php";
            $query = mysqli_query($koneksi, "SELECT * FROM topsis_maxmin");
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Tabel Nilai Max dan Min</h4>
                    </div>
                </div>
                <table id="tabeldata" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Matrix</th>
                            <th>ID Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Maximum</th>
                            <th>Minimum</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_matrix'] ?></td>
                                <td><?php echo $row['id_kriteria'] ?></td>
                                <td><?php echo $row['nm_kriteria'] ?></td>
                                <td><?php echo $row['maximum'] ?></td>
                                <td><?php echo $row['minimum'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- topsis_sipsin -->
            <?php
            include "includes/config.php";
            $query = mysqli_query($koneksi, "SELECT topsis_sipsin.*, alternatif.nm_alternatif
             FROM topsis_sipsin
                                  INNER JOIN alternatif ON topsis_sipsin.id_alternatif = alternatif.id_alternatif");
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Tabel Nilai Pemisah</h4>
                    </div>
                </div>
                <table id="tabeldata" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>DPlus</th>
                            <th>DMin</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_alternatif'] ?></td>
                                <td><?php echo $row['nm_alternatif'] ?></td>
                                <td><?php echo $row['dplus'] ?></td>
                                <td><?php echo $row['dmin'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Tabel Nilai V Topsis -->
            <?php
            include "includes/config.php";
            $koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
            $query = mysqli_query($koneksi, "SELECT topsis_nilaiv.*, alternatif.nm_alternatif
                                  FROM topsis_nilaiv
                                  INNER JOIN alternatif ON topsis_nilaiv.id_alternatif = alternatif.id_alternatif
                                  ORDER BY nilaiv DESC");

            // Initialize rank
            $rank = 1;
            ?>

            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h4>Tabel Nilai V</h4>
                    </div>
                </div>
                <br>

                <table id="tabeldata" width="100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>DPlus</th>
                            <th>DMin</th>
                            <th>Nilai V</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $prevValue = null; // To handle ties
                        // 
                        while ($row = mysqli_fetch_array($query)) {
                            $nilaiV = $row['nilaiv'];

                            // Check for ties
                            if ($nilaiV !== $prevValue) {
                                $rank = $no;
                            }

                            $prevValue = $nilaiV;
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['id_alternatif'] ?></td>
                                <td><?php echo $row['nm_alternatif'] ?></td>
                                <td><?php echo $row['dplus'] ?></td>
                                <td><?php echo $row['dmin'] ?></td>
                                <td><?php echo $nilaiV ?></td>
                                <td><?php echo $rank ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>

            <!-- </div> -->
        </div>
    </div>
</section>

<?php
include "footer.php";
?>