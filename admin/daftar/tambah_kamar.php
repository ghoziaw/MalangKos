<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h3>Tambah Data Kamar</h3>
		<div class="col-md-8">

			<form role="form" method="post" enctype="multipart/form-data">
			<div>
			 <label>Nama Kos</label>
				<select name="nama_kos" class="form-control">
				<?php
				// $koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");
					$query = mysqli_query($koneksi, "select * from kos");
					while($dataquery=mysqli_fetch_array($query)){
					    echo "<option value=$dataquery[nama_kos]>$dataquery[nama_kos]</option>";
					}
				?>
				</select>
			  </div>
			  <br>
			  <div class="form-group">
			    <label>Nama Kamar</label>
			    <input name="nama" type="text" class="form-control" placeholder="Nama Kamar">
			  </div>

			  <div class="form-group">
			    <label>Fasilitas</label>
			    <input name="fasilitas" type="text" class="form-control" placeholder="Fasilitas Kamar">
			  </div>
				
			  <div class="form-group">
			    <label>Harga / Bulan</label>
			    <input name="harga" type="number" class="form-control" placeholder="Harga / Bulan">
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
				
				if(isset($_POST['simpan']))
				 {
				 	$nama_kos = $_POST['nama_kos'];
				 	$nama_kamar = $_POST['nama'];
				 	$fasilitas = $_POST['fasilitas'];
				 	$harga = $_POST['harga'];

				 	$foto1 = $_FILES['gambar']['name'];
                	$tmp = $_FILES['gambar']['tmp_name'];
                	$path = "../../img/";
                	$move = move_uploaded_file($tmp,$path.$foto1);

				 	$q = mysqli_query($koneksi, "SELECT id_kos FROM kos WHERE nama_kos = '$nama_kos'");
				 	$q = mysqli_fetch_row($q);
					$id_kos = $q[0];

				 	$query = "INSERT INTO kamar(id_kos, nama_kos, fasilitas, nama_kamar, harga, gambar)VALUES('$id_kos', '$nama_kos', '$fasilitas', '$nama_kamar', '$harga', '$foto1')";
				 	
				 	mysqli_query($koneksi, $query);
				 	?>
				 	<script type="text/javascript">
				 		alert 
						alert('Kamar Berhasil di Input');
						document.location.href="?daftar=data_kamar";
					</script>
				 	<?php
				 }
			 ?>
		</div>
</body>
</html>