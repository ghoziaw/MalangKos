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
	<div class="row">
	<b><h1>Daftar Kos</h1></b>
	</div>
	<br>
	<div class="container">
      <div class="row">
    <?php 
    $no = 0;
	$query = mysqli_query($koneksi, "SELECT * FROM kos");
	while($data = mysqli_fetch_array($query)){
    $no++;
     ?>
     
    <div class="col-md-4 col-md-offset-0">
	    <div class="panel panel-default">
	    <div class="panel-body"> 
	  	<center>
	        <?php echo "<td><img src='../../img/".$data['gambar']."'width='330',height='300'></td>"
	        ?>
	    </center><br>
	        <p class="price">Nama : <?php echo $data['nama_kos']; ?></p>    
	        <p class="price">Alamat : <?php echo $data['alamat']; ?></p>
	       	<a class="btn btn-block btn-success" href="?daftar=pilih_kamar&id_kos=<?php echo $data['id_kos']; ?>">Pilih</a>
	    </div>
	    </div>
	</div>
	<?php 
	 }
	?>
	</div>
	</div>
</body>
</html>