<?php 
  include '../connect/koneksi.php';
  session_start();
  if($_SESSION['userweb']=='')
   {
    header('location:../index.php');
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

    <title>Halaman Customer</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> -->
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"> Home</span></a>
          <a class="navbar-brand" href="?daftar=update_customer"><span class="glyphicon glyphicon-user"> <?php echo $_SESSION['nama'];?></span></a>
          
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="navbar-brand" href="../connect/logout.php"><span class="glyphicon glyphicon-share"> logout</span></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <?php 
          @$daftar = $_GET["daftar"];
         ?>
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if($daftar==""){echo "class='active'";} ?>><a href="index.php">Dashboard</a></li>
            <li <?php if($daftar=="input_persewaan" || $daftar=="pilih_kamar" || $daftar=="sewa"){echo "class='active'";} ?>><a href="?daftar=input_persewaan">Input Persewaan</a></li>
            <li <?php if($daftar=="detail_persewaan"){echo "class='active'";} ?>><a href="?daftar=detail_persewaan">Detail Persewaan</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 
          
            error_reporting(0);
            switch($_GET["daftar"])
             {
              case 'update_customer':
                include 'daftar/update_customer.php';
                break;

              case 'input_persewaan':
                include "daftar/input_persewaan.php";
                break;

              case 'pilih_kamar':
                include "daftar/pilih_kamar.php";
                break;

              case 'sewa':
                include 'daftar/sewa.php';
                break;

              case 'detail_persewaan':
                include "daftar/detail_persewaan.php";
                break;

              case 'hapus_detail_persewaan':
                $id = $_GET['id_customer'];
                mysqli_query($koneksi, "DELETE FROM sewa WHERE id_customer='$id'");
                include 'daftar/detail_persewaan.php';
                break;
                 
              default:
              include "daftar/dashboard.php";
              break;
             }
          ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>
  </body>
</html>
