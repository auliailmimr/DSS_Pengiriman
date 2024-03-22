<?php  
include "header.php";
include "includes/config.php";
//code edit data
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$query = mysqli_query($koneksi,"SELECT * FROM kriteria WHERE id_kriteria='$id'");
$getRow = mysqli_fetch_array($query);

//code update data
if ($_POST) {
	$nm = $_POST['nm'];

	$update = mysqli_query($koneksi,"UPDATE kriteria 
						SET nm_kriteria='$nm'
						WHERE id_kriteria ='$id'");
	if ($update) {
		echo "<script>location.href='kriteria.php'</script>";
	}else {
		echo "Gagal";
	}
}
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Form Ubah Kriteria</h4>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<br><br>
	<form method="POST" action="">
	  <div class="form-group row">
	    <label for="id" class="col-sm-2 col-form-label">Id Kriteria</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="id" name="id" value="<?php echo $getRow['id_kriteria'] ?>" disabled>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="nm" class="col-sm-2 col-form-label">Nama Kriteria</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nm" name="nm" value="<?php echo $getRow['nm_kriteria'] ?>">
	    </div>
	  </div>
	  <div class="form-group row">
	    <div class="col-sm-10">
	      <button type="submit" class="btn btn-primary">Ubah</button>
	      <button type="button" onclick="location.href='kriteria.php'" class="btn btn-success">Kembali</button>
	    </div>
	  </div>
	</form>
</div>