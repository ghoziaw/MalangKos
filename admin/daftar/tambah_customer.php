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
      $id = $_SESSION['id_user'];
      $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
      $data = mysqli_fetch_array($query);
    ?>
<body>
  <h2>Persewaan</h2>
  <div class="col-md-6">
    <form action="" class="form-horizontal" method="post">
      <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_user'] ?>">
      <br>
      <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?php echo $data['alamat'] ?></textarea>
      <br>
      <label>No Telp</label>
        <input type="number" name="telp" class="form-control" value="<?php echo $data['no_telp'] ?>">
      <br>
      <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>">
      <br>
      <label>Password</label>
        <input type="password" name="pass" class="form-control" placeholder="password" value="<?php echo $data['username'] ?>">
      <br>
      
      <input name="simpan" type="submit" class="btn btn-block btn-primary" value="Simpan">
      <a class="btn btn-block btn-danger" href="index.php">Cancel</a>
    </form>
    <?php 
      if(isset($_POST['simpan']))
      {
       //$id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $akses = "customer";

        $query = "UPDATE user SET id_user='$id', nama_user='$nama', alamat='$alamat', no_telp='$telp', username='$username', password='$pass', akses='$akses'";
                      
        mysqli_query($koneksi, $query);
        
       }
   ?>
  </div>
</body>
</html>