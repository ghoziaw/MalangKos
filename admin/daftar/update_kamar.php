<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
		$id = $_GET['id_kamar'];
		$query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar='$id'");
		$data = mysqli_fetch_array($query);
	 ?>
	<h3>Update Data Kamar</h3>
		<div class="col-md-8">

			<form role="form" method="post">

`			  <div class="form-group">
			    <label>Id Kos</label>
			    <input name="id_kos" type="number" class="form-control" value="<?php echo $data['id_kos']; ?>">
			  </div>
			
			  <div class="form-group">
			    <label>Nama</label>
			    <input name="nama" type="text" class="form-control" value="<?php echo $data['nama_kamar']; ?>">
			  </div>
			  
			  <div class="form-group">
			    <label>Fasilitas</label>
			    <input name="fasilitas" type="text" class="form-control" value="<?php echo $data['fasilitas']; ?>">
			  </div>

			  <div class="form-group">
			    <label>Harga / Hari</label>
			    <input name="harga" type="number" class="form-control" value="<?php echo $data['harga']; ?>">
			  </div>
			  
			  <div class="control-group">
				<label class="control-label" for="basicinput">Foto</label>
				<div class="controls">
					<input name="gambar" id="gambar" class=" form-control" type="file" />
				</div>
	   		  </div>
	   		  <br>
			  <input name="simpan" type="submit" class="btn btn-sm btn-primary" value="Simpan">
			  <a class="btn btn-sm btn-danger" href="?daftar=data_kamar">Cancel</a>
			</form>
		
			<?php 
				$koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");
				if(isset($_POST['simpan']))
				 {
				 	$id_kos = $_POST['id_kos'];
				 	$nama = $_POST['nama'];
				 	$fasilitas = $_['fasilitas'];
				 	$harga = $_POST['harga'];

				 	$query = "UPDATE kamar SET id_kamar='$id', nama_kamar='$nama', harga='$harga' WHERE id_kamar='$id'";
				 	
				 	mysqli_query($koneksi, $query);
				 	?>
				 	<script type="text/javascript">
				 		alert('Kamar Berhasil di Input');
						document.location.href="?daftar=data_kamar";
				 	</script>
				 	<?php
				 }
			 ?>
		</div>
</body>
</html>