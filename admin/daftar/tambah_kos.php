<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h3>Tambah Informasi Kos</h3>
		<div class="col-md-8">

			<form role="form" method="post" enctype="multipart/form-data">

			  <!-- <div class="form-group">
			    <label>Nomor Id</label>
			    <input name="id" type="number" class="form-control" placeholder="Id Karyawan">
			  </div> -->

			  <div class="form-group">
			    <label>Nama</label>
			    <input name="nama" type="text" class="form-control" placeholder="Nama Kos">
			  </div>

			  <div class="form-group">
			    <label>alamat</label>
			    <textarea name="alamat" class="form-control" placeholder="alamat Kos"></textarea>
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
				// $koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");
				if(isset($_POST['simpan']))
				 {
				 	//$id = $_POST['id'];
				 	$nama = $_POST['nama'];
				 	$alamat = $_POST['alamat'];

				 	$foto1 = $_FILES['gambar']['name'];
                	$tmp = $_FILES['gambar']['tmp_name'];
                	$path = "../../img/";
                	$move = move_uploaded_file($tmp,$path.$foto1);

				 	$query = "INSERT INTO kos(nama_kos, alamat, gambar)VALUES('$nama', '$alamat', '$foto1')";
				 	
				 	mysqli_query($koneksi, $query);
				 	?>
				 	<script type="text/javascript">
						alert('Pemesanan Berhasil di Proses');
						document.location.href="?daftar=data_kos";
					</script>
					<?php 
				 }
			 ?>
		</div>
	</body>
</html>