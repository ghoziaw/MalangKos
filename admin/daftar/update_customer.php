<?php
  session_start();
    if($_SESSION['userweb'=='']){
      header('location:../../index.php');
    }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
		$id = $_GET['id_user'];
		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
		$data = mysqli_fetch_array($query);
	 ?>
	<h3>Update Data Karyawan</h3>
		<div class="col-md-8">

			<form role="form" method="post">

			  <div class="form-group">
			    <label>Nomor Id</label>
			    <input name="id" type="number" class="form-control" value="<?php echo $data['id_user']; ?>">
			  </div>

			  <div class="form-group">
			    <label>Nama</label>
			    <input name="nama" type="text" class="form-control" value="<?php echo $data['nama_user']; ?>">
			  </div>

			  <div class="form-group">
			    <label>alamat</label>
			    <textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
			  </div>

			  <div class="form-group">
			    <label>Nomor Telepon</label>
			    <input name="telp" type="number" class="form-control" value="<?php echo $data['no_telp']; ?>">
			  </div>
				
			 <div class="form-group">
			    <label>Username</label>
			    <input name="username" type="text" class="form-control" value="<?php echo $data['username']; ?>">
			  </div>

			  <div class="form-group">
			    <label>Password</label>
			    <input name="pass" type="password" class="form-control" value="<?php echo $data['password']; ?>">
			  </div>
			  	
			  <input name="simpan" type="submit" class="btn btn-sm btn-primary" value="Simpan">
			  <a class="btn btn-sm btn-danger" href="?daftar=data_customer">Cancel</a>
			</form>
		
			<?php 
				// $koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");
				if(isset($_POST['simpan']))
				 {
				 	$id = $_POST['id'];
				 	$nama = $_POST['nama'];
				 	$alamat = $_POST['alamat'];
				 	$telp = $_POST['telp'];
				 	$username = $_POST['username'];
				 	$pass = $_POST['pass'];
				 	$akses = "karyawan";

				 	$query = "UPDATE user SET id_user='$id', nama_user='$nama', alamat='$alamat', no_telp='$telp', username='$username', password='$pass' WHERE id_user='$id'";
				 	
				 	mysqli_query($koneksi, $query);
				 	?>
				 	<script type="text/javascript">
				 		alert('Customer Berhasil di Input');
						document.location.href="?daftar=data_customer";
				 	</script>
				 	<?php
				 }
			 ?>
		</div>
</body>
</html>