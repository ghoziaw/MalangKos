<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class="row">
	<b><h1>List Customer</h1></b>
	<div class="col-md-offset-9 col-md-3">
    <form method="post">
	    <div class="input-group">
			<input name="inputan" type="text" class="form-control" placeholder="Cari Customer">
	      	<span class="input-group-btn">
	        <input name="cari" class="btn btn-default" value="cari" type="submit">
	      	</span>
	    </div>
	<form><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
	<br><br>
	<div class="col-md-4 col-md-offset-10">
	<a class="btn btn-sm btn-primary" href="?daftar=tambah_customer">Tambah customer</a>
	</div>
	</div>
	<br>
	
	<table class="table table-striped">
		<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Telp</th>
			<th>username</th>
		</tr>
		</thead>
	 	<tbody>
			<?php
			//$no =1;
			$inputan = $_POST['inputan'];
			if($_POST['cari']){
				if($inputan==""){
					$q = mysqli_query($koneksi,"SELECT * FROM user WHERE akses='customer'");
				}
				else if($inputan!=""){
					$q = mysqli_query($koneksi,"SELECT * FROM user WHERE nama_user LIKE '%$inputan%'");
				}
			}else{
			$q = mysqli_query($koneksi,"SELECT * FROM user WHERE akses='customer'");
			}
				$cek = mysqli_num_rows($q);
				$no = 1;
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
				
				while($data = mysqli_fetch_array($q)){
				?>
					<tr>
		 	 			<td><?php echo $no++; ?></td>
		 	 		    <td><?php echo $data['nama_user']; ?></td>
		 	 			<td><?php echo $data['alamat']; ?></td>
		 	 			<td><?php echo $data['no_telp']; ?></td>
		 	 			<td><?php echo $data['username']; ?></td>
		 	 			<td>
		 	 				<a class="btn btn-sm btn-danger" href="?daftar=hapus_customer&id_user=<?php echo $data['id_user'] ?>">Hapus</a>
		 	 				<a class="btn btn-sm btn-success" href="?daftar=update_customer&id_user=<?php echo $data['id_user'] ?>">Update</a>
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