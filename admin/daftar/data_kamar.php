<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class="row">
	<b><h1>List Kamar</h1></b>
	<div class="col-md-offset-9 col-md-3">
    <form method="post">
	    <div class="input-group">
			<input name="inputan" type="text" class="form-control" placeholder="Cari Kamar">
	      	<span class="input-group-btn">
	        <input name="cari" class="btn btn-default" value="cari" type="submit">
	      	</span>
	    </div>
	<form><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
	<br><br>
	<div class="col-md-4 col-md-offset-10">
	<a class="btn btn-sm btn-primary" href="?daftar=tambah_kamar">Tambah Kamar</a>
	</div>
	</div>
	<br>
	<table class="table table-striped">
		<thead>
		<tr>
			<th>No.</th>
			<!-- <th>Id Kos</th> -->
			<th>Nama Kos</th>
			<th>Nama Kamar</th>
			<th>Fasilitas</th>
			<th>Harga / Bulan</th>
			<th>Foto</th>
		</tr>
		</thead>
	 	<tbody>
	 	 	<?php
			$inputan = $_POST['inputan'];
			// $koneksi = mysqli_connect("localhost","root","","tugas_besar");	
			if($_POST['cari']){
				if($inputan==""){
					$q = mysqli_query($koneksi,"SELECT * FROM kamar");
				}
				else if($inputan!=""){
					$q = mysqli_query($koneksi,"SELECT * FROM kamar WHERE nama_kamar LIKE '%$inputan%'");
				}
			}else{
			$q = mysqli_query($koneksi,"SELECT * FROM kamar");
			}
			
			$cek = mysqli_num_rows($q);
				
			if($cek < 1){
				?>
				<tr>
					<td colspan="7">
					<center>
					Data yang Anda Cari Tidak Tersedia
						<a href="" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
					</center>
					</td>
				<tr>
				<?php
			}else{
				$no = 1;
				while($data = mysqli_fetch_array($q)){
				?>
					<tr>
						<td><?php echo $no++; ?></td>
		 	 			
		 	 			<td><?php echo $data['nama_kos']; ?></td>
		 	 		    <td><?php echo $data['nama_kamar']; ?></td>
		 	 		    <td><?php echo $data['fasilitas']; ?></td>
		 	 			<td><?php echo $data['harga']; ?></td>
		 	 			<?php echo "<td><img src='../../img/".$data['gambar']."'width='100',height='100'></td>"
                    	?>
		 	 			<td>
		 	 			<a class="btn btn-sm btn-danger" href="?daftar=hapus_kamar&id_kamar=<?php echo $data['id_kamar'] ?>">Hapus</a>
		 	 			<a class="btn btn-sm btn-success" href="?daftar=update_kamar&id_kamar=<?php echo $data['id_kamar']?>">Update</a>
		 	 			</td>
		 	 		</tr>
				<?php
				} 
			}
				?>
 	 	</tbody>
	</table>
</body>		
</html>