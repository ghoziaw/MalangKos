<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
		$id = $_GET['id_kos'];
		$query = mysqli_query($koneksi, "SELECT * FROM kos WHERE id_kos='$id'");
		$data = mysqli_fetch_array($query);
	 ?>
	<h3>Update Data Kos</h3>
		<div class="col-md-8">

			<form role="form" method="post">

			  <div class="form-group">
			    <label>Nomor Id</label>
			    <input name="id" type="number" class="form-control" value="<?php echo $data['id_kos']; ?>">
			  </div>

			  <div class="form-group">
			    <label>Nama</label>
			    <input name="nama" type="text" class="form-control" value="<?php echo $data['nama_kos']; ?>">
			  </div>

			  <div class="form-group">
			    <label>alamat</label>
			    <textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
			  </div>

			  <div class="control-group">
				<label class="control-label" for="basicinput">Foto</label>
				<div class="controls">
					<input name="gambar" id="gambar" class=" form-control" type="file" />
				</div>
	   		  </div>
			  	<br>
			  <input name="simpan" type="submit" class="btn btn-sm btn-primary" value="Simpan">
			  <a class="btn btn-sm btn-danger" href="?daftar=data_kos">Cancel</a>
			</form>
		
			<?php 
				$koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");
				if(isset($_POST['simpan']))
				 {
				 	$id = $_POST['id'];
				 	$nama = $_POST['nama'];
				 	$alamat = $_POST['alamat'];

				 	$foto1 = $_FILES['gambar']['name'];
                	$tmp = $_FILES['gambar']['tmp_name'];
                	$path = "../../img/";
                	$move = move_uploaded_file($tmp,$path.$foto1);

				 	$query = "UPDATE kos SET id_kos='$id', nama_kos='$nama', alamat='$alamat', gambar='$foto1' WHERE id_kos = '$id'";
				 	
				 	mysqli_query($koneksi, $query);
				 	?>
				 	<script type="text/javascript">
				 		alert('Kos Berhasil di Input');
						document.location.href="?daftar=data_kos";
				 	</script>
				 	<?php
				 }
			 ?>
		</div>
</body>
</html>