<?php  
include "header.php";
include "includes/config.php";
//code edit data
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$query = mysqli_query($koneksi,"SELECT * FROM skala WHERE id_skala=".$id);
$getRow = mysqli_fetch_array($query);

//code update data
if ($_POST) {
	$v = $_POST['v'];
	$nm = $_POST['nm'];

	$update = mysqli_query($koneksi,"UPDATE skala 
						SET value = '$v', nm_skala ='$nm'
						WHERE id_skala ='$id'");
	if ($update) {
		echo "<script>location.href='skala.php'</script>";
	}else {
		echo "Gagal";
	}
}
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Form Ubah Nilai Skala</h4>
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<br><br>
	<form method="POST" action="">
	  <div class="form-group row">
	    <label for="id" class="col-sm-2 col-form-label">Id Skala</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="id" name="id" value="<?php echo $getRow['id_skala'] ?>" disabled>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="jum" class="col-sm-2 col-form-label">Value</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="v" name="v" value="<?php echo $getRow['value'] ?>">
	    </div>
	  </div>
      <div class="form-group row">
	    <label for="kt" class="col-sm-2 col-form-label">Keterangan</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nm" name="nm" value="<?php echo $getRow['nm_skala'] ?>">
	    </div>
	  </div>
	  <div class="form-group row">
	    <div class="col-sm-10">
	      <button type="submit" class="btn btn-primary">Ubah</button>
	      <button type="button" onclick="location.href='skala.php'" class="btn btn-success">Kembali</button>
	    </div>
	  </div>
	</form>
</div>
