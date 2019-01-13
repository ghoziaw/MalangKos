<?php 
	
	session_start();
		if($_SESSION['userweb'=='']){
			header('location:../../index.php');
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php 
		$id = $_GET['id_kamar'];
		$query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar='$id'");
		$data = mysqli_fetch_array($query);
		
	 ?>
<body>
	<h2>Persewaan</h2>
	<div class="col-md-5">
		<form action="" class="form-horizontal" method="post">
			<label>Id Kos</label>
				<input class="form-control" type="text" name="id_kos" readonly value="<?php echo $data['id_kos'];?>">
			<label>Nama Kos</label>
				<input class="form-control" type="text" name="nama_kos" readonly value="<?php echo $data['nama_kos'];?>">
			<label>Id Customer</label>
				<input class="form-control" type="text" name="id_cus" readonly value="<?php echo $_SESSION['id_user']; ?>">
			<label>Nama Customer</label>
				<input class="form-control" type="text" name="nama_cus" readonly value="<?php echo $_SESSION['nama'];?>">
			<label>Id Kamar</label>
				<input class="form-control" type="text" name="id_kamar" readonly value="<?php echo $data['id_kamar'];?>">
			<label>Nama Kamar</label>
				<input class="form-control" type="text" name="nama_kamar" readonly value="<?php echo $data['nama_kamar']; ?>">
			<label>Harga Kamar</label>
				<input class="form-control" type="text" name="harga" readonly value="<?php echo $data['harga']; ?>">
			<label>Lama Sewa</label>
				<input class="form-control" type="text" name="lama" placeholder="dalam hitungan Bulan">
			<br>
			<input class="btn btn-sm btn-primary" type="submit" name="pesan" value="Pesan">
			<a href="?daftar=input_persewaan" class="btn btn-sm btn-danger">Cancel</a>
		</form>
		<?php 
		 	if(isset($_POST['pesan']))
		 	 {
		 	 	$id_kos = $_POST['id_kos'];
		 	 	$nama_kos = $_POST['nama_kos'];
		 	 	$id_cus = $_POST['id_cus'];
		 	 	$nama_cus = $_POST['nama_cus'];
		 	 	$id_kamar = $_POST['id_kamar'];
		 	 	$nama_kamar = $_POST['nama_kamar'];
		 	 	$harga = $_POST['harga'];
		 	 	$lama = $_POST['lama'];
		 	 	$tgl = date('Y-m-d');
		 	 	$total = $lama * $data['harga'];

		 	 	mysqli_query($koneksi, "INSERT INTO sewa(id_kos, nama_kos, id_user, nama_user, id_kamar, nama_kamar, harga, lama_sewa, tgl_sewa, total) VALUES('$id_kos', '$nama_kos', '$id_cus', '$nama_cus', '$id_kamar', '$nama_kamar', '$harga', '$lama', '$tgl', '$total')");
		 	 	$status = "UPDATE kamar SET status = 'terisi' WHERE id_kamar = '$id_kamar'";
		 	 	mysqli_query($koneksi, $status);
		 	 	
		 	 ?>
		 	 <script type="text/javascript">
				alert('Pemesanan Berhasil di Proses');
				document.location.href="?daftar=detail_persewaan";
			</script>
		 	 <?php
		 	 }
		 ?>

	</div>
</body>
</html>