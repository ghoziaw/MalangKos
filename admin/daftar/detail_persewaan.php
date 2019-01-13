<?php 
	// $koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");

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
	<div class="row">
	<b><h1>Detail Persewaan</h1></b>
	<br>
	</div>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>No.</th>
			<!-- <th>Id Customer</th> -->
			<th>Nama Customer</th>
			<!-- <th>Id Kos</th> -->
			<th>Nama Kos</th>
			<!-- <th>Id Kamar</th> -->
			<th>Nama Kamar</th>
			<th>Harga</th>
			<th>Lama Sewa</th>
			<th>Tanggal Sewa</th>
			<th>total</th>
		</tr>
		</thead>
	 	<tbody>
	 	 	<?php
	 	 		$no = 1;
				$q = mysqli_query($koneksi, "SELECT * FROM sewa");
				while($data = mysqli_fetch_array($q)){
				?>
					<tr>
					 	<td><?php echo $no++; ?></td>
					 	<td><?php echo $data['nama_user']; ?></td>
					 	<td><?php echo $data['nama_kos']; ?></td>
					 	<td><?php echo $data['nama_kamar']; ?></td>
						<td><?php echo $data['harga']; ?></td>
						<td><?php echo $data['lama_sewa']; ?></td>
						<td><?php echo $data['tgl_sewa']; ?></td>
						<td><?php echo $data['total']; ?></td>
					 	<td>
					 	<a class="btn btn-sm btn-danger" href="?daftar=hapus_detail_persewaan&id_kamar=<?php echo $data['id_kamar'] ?>">Hapus</a>
					 	<a class="btn btn-sm btn-success" onclick="window.print();" href="">Cetak</a>
					 	</td>
					</tr>
				<?php
				} 
				?>
 	 	</tbody>
	</table>
</body>
</html>