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
	<b><h1>Daftar Kamar</h1></b>
	</div>
	<br>
	<div class="container">
      <div class="row">
    <?php 
    $q = mysqli_query($koneksi, "SELECT * FROM sewa");
	$dataq = mysqli_fetch_array($q);

	$no = 0;
	$id_kos = $_GET['id_kos'];
	$query = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kos = '$id_kos'");
	while($data = mysqli_fetch_array($query)){
    $no++;
     ?>
     
    <div class="col-md-4 col-md-offset-0">
	    <div class="panel panel-default">
	    <div class="panel-body"> 
	  	<center>
	        <?php echo "<td><img src='../../img/".$data['gambar']."'width='330',height='250'></td>"
	        ?>
	    </center><br>
	        <p class="price">Nama : <?php echo $data['nama_kamar']; ?></p>
	        <p class="price">fasilitas : <?php echo $data['fasilitas']; ?></p>
	        <p class="price">sewa/bulan :<?php echo $data['harga']; ?></p>
	        <p class="price">Status : <?php echo $data['status']; ?></p>

	        <?php if($data['status']=="kosong"){ ?><a class="btn btn-block btn-success" href="?daftar=sewa&id_kamar=<?php echo $data['id_kamar']; ?>">Pilih</a>
			<?php }else{ ?>	
			<a class="btn btn-block btn-success" disabled href="?daftar=sewa&id_kamar=<?php echo $data['id_kamar']; ?>">Pilih</a>
			<?php } ?>
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