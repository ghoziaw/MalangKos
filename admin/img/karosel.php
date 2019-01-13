<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>carouseel</title>

	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="dist/css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>.carousel-inner > .item > img,.carousel-inner > .item > a > img { width: 200%; margin: auto;}</style>

</head>
<body>
	<div class="container">
  <br>
  <div id="slider" class="carousel slide" data-ride="carousel">
    <!-- Indikator yang bulat bulat ituloh gan-->
    <ol class="carousel-indicators">
      <li data-target="#slider" data-slide-to="0" class="active"></li>
      <li data-target="#slider" data-slide-to="1"></li>
      <li data-target="#slider" data-slide-to="2"></li>
      <li data-target="#slider" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper untuk slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="1.jpg" alt="slide1" width="800" height="345">
        <div class="carousel-caption">
         <h3><b>My Villa Booking</b></h3>
         
        </div>
      </div>

      <div class="item">
        <img src="2.jpg" alt="slide2" width="600" height="345">
        <div class="carousel-caption">
          <h3><b>My Villa Booking</b></h3>
         
        </div>
      </div>
 
      <div class="item">
        <img src="img/3.jpg" alt="slide3" width="600" height="345">
        <div class="carousel-caption">
         <h3><b>My Villa Booking</b></h3>
         
        </div>
      </div>

      <div class="item">
        <img src="4.jpg" alt="slide4" width="600" height="345">
        <div class="carousel-caption">
         <h3><b>My Villa Booking</b></h3>
         
        </div>
      </div>

    </div>

    <!-- Kode untuk Navigasi -->
    <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Kembali</span>
    </a>
    <a class="right carousel-control" href="#slider" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Lanjut</span>
    </a>
  </div>
</div>
</body>
</html>