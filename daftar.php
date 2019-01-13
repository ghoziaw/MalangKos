<?php 
include 'connect/koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistem Informasi Persewaan Kamar</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style> 
    body {
      background-color: red;
      opacity: 0.75;
      filter: Alpha(opacity=50); /* IE8 and earlier */
    }
  </style>
  </head>

  <body background="b.jpg">

    <div class="container">
      <center>
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h2><span class="glyphicon glyphicon-home"></span> &nbsp E-KOS</h2>
              </div>

              <!-- <div class="panel-heading">
                <h2><span class="glyphicon glyphicon-home"></span> &nbsp Sig In Customer</h2>
              </div> -->

              <div class="panel-body">
                <!--<div class="alert alert-success">
                  Masukkan username dan password dengan benar <span class="glyphicon glyphicon-pushpin"></span> 
                </div>-->
                <div class="col-md-10 col-md-offset-1">
                  <form method="post">
                    <!-- <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="number" name="id" class="form-control" placeholder="Id">
                    </div>
                    <br> -->
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" name="nama" class="form-control" placeholder="nama" required="required">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-road"></span></span>
                      <textarea name="alamat" class="form-control" placeholder="alamat"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
                      <input type="number" name="telp" class="form-control" placeholder="Nomor Telepon">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                      <input type="password" name="pass" class="form-control" placeholder="password" required="required">
                    </div>
                    <br>
                    <input name="daftar" type="submit" class="btn btn-block btn-primary" value="Daftar">
                    <a class="btn btn-block btn-danger" href="index.php">Cancel</a>
                  </form>
                  <?php 
                    $koneksi = mysqli_connect("localhost", "root", "", "tugas_besar");
                    if(isset($_POST['daftar']))
                     {
                      //$id = $_POST['id'];
                      $nama = $_POST['nama'];
                      $alamat = $_POST['alamat'];
                      $telp = $_POST['telp'];
                      $username = $_POST['username'];
                      $pass = $_POST['pass'];
                      $akses = "customer";

                      $query = "INSERT INTO user(nama_user, alamat, no_telp, username, password, akses)VALUES('$nama', '$alamat', '$telp', '$username', '$pass', '$akses')";
                      
                      mysqli_query($koneksi, $query);
                      ?>
                      <script type="text/javascript">
                        alert('Data Berhasil di Upload');
                        document.location.href="index.php";
                      </script>
                      <?php
                     }
                  ?>
               </div>
              </div>
            </div>
        </div>
      </center>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
