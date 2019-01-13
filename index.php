<?php 
  include 'connect/koneksi.php';
  session_start();
  if(@$_SESSION['userweb'] != "")
  {
    if($_SESSION['level']="admin")
    {
      header('location:admin/index.php');
    }
    else if($_SESSION['level']="user")
    {
      header('location:customer/index.php');
    }
  }
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

              <div class="panel-body">
                <!--<div class="alert alert-success">
                  Masukkan username dan password dengan benar <span class="glyphicon glyphicon-pushpin"></span> 
                </div>-->
                <div class="col-md-10 col-md-offset-1">
                  <form method="post">
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                      <input type="text" name="username" class="form-control" placeholder="username" required="required">
                    </div>
                    <br>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                      <input type="password" name="password" class="form-control" placeholder="password" required="required">
                    </div>
                    <br>
                    <input type="submit" name="login" class="btn btn-block btn-success" name="login" value="Login">
                    <a class="btn btn-block btn-primary" href="daftar.php">Sign In</a>
                  </form>
                  <?php 
                  if(isset($_POST["login"]))
                   {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
                    $cek = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    if($cek < 1)
                     {
                      ?>
                      <br>
                        <div class="alert alert-danger">
                          username dan password yang di masukkan salah !!
                        </div>
                      <?php
                     }
                    else
                     {
                      $_SESSION['userweb']=$username;
                      if($data['akses']=="admin")
                       {
                        $_SESSION['level']="admin";
                        header('location:admin/index.php');
                        $_SESSION['id_user'] = $data['id_user'];
                        $_SESSION['nama'] = $data['nama_user'];
                       }
                       else if($data['akses']=="customer") 
                       {
                        $_SESSION['level']="customer";
                        header('location:customer/index.php');
                        $_SESSION['id_user'] = $data['id_user'];
                        $_SESSION['nama'] = $data['nama_user'];

                       }
                     }
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
