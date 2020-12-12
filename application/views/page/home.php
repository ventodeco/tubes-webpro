<html>


<head>	
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/yow.css'); ?>" />
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <ul class="nav navbar-nav">
	       <li class="nav-item"> <a href="#">MI INDONESIA</a></li>
	       <li class="nav-item"> <a href="#">|</a></li>
	       <li class="nav-item"> <a href="#">IKUTI KITA DI FACEBOOK</a></li>
	       <li class="nav-item"> <a href="#">|</a></li>
	       <li class="nav-item"> <a href="#">MI COMMUNITTY</a></li>
	    </ul>
	     <ul class="nav navbar-nav  navbar-right">
		<li class="nav-item"> <a href="#">Masuk </a></li>
		<li class="nav-item"> <a href="#">|</a></li>
		<li class="nav-item"> <a href="#">Daftar</a></li>
		<li class="nav-item"> <a href="#">|</a></li>
		<li class="nav-item"> <a href="#"><span class="	glyphicon glyphicon-shopping-cart"></span>  Keranjang (0)</a></li> 
	    </ul>
	    </div>
	  </div>
	</nav>
	<nav class="navbar navbar-default">
	<div class="container-fluid">
	   <div class="navbar-header">
		<img src="<?php echo base_url('assets/images/mipicts.png'); ?>" alt="kambing">
	   </div>
	   <ul class="nav navbar-nav navbar-right">
		<li class="nav-item"> <a href="#">All Products </a></li>
		<li class="nav-item"> <a href="#">Powerbank</a></li>
		<li class="nav-item"> <a href="#">TV</a></li>
		<li class="nav-item"> <a href="#">POCOPHONE</a></li>
		<li class="nav-item"> <a href="#">MI PHONE</a></li>
		<li class="nav-item"> <a href="#">Redmi Phones</a></li>
	   </ul> 
	</div>
	</nav>
	<section>
		<div id ="carouselIndicators" class="carousel slide" data-ride="carousel" >
			<ol class="carousel-indicators">	
			  <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
			  <li data-target="#carouselIndicators" data-slide-to="1"></li>
			  <li data-target="#carouselIndicators" data-slide-to="2"></li>
			  <li data-target="#carouselIndicators" data-slide-to="3"></li>
			  <li data-target="#carouselIndicators" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner CarouselImages"> 
				<div class="item active">
					<img src ="<?php echo base_url('assets/images/Carousel1.jpg'); ?>" class="d-block w-100">
				</div>
				<div class="item">
					<img src ="<?php echo base_url('assets/images/Carousel2.jpg'); ?>" class="d-block w-100">
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/images/Carousel3.jpg'); ?>" class="d-block w-100">
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/images/Carousel4.jpg'); ?>" class="d-block w-100">
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/images/Carousel5.jpg'); ?>" class="d-block w-100">
				</div>
			</div>
	  	</div>
		<a class="left carousel-control" href="#carouselIndicators" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carouselIndicators" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next </span>
		</a>
	</section>
</body>










</html>
