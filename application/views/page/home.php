 <?php $this->load->view('page/partial/header'); ?>
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
	    <?php if ($this->session->logged_in) { ?>
	    	<li class="nav-item"> <a href="#">Selamat Datang <?php echo $this->session->name ?> </a></li>
		<li class="nav-item"><a href="#">|</a></li>
		<li class="nav-item"> <a href="<?php echo base_url('logout'); ?>">Logout</a></li>
	    <?php } else { ?>
		<li class="nav-item"> <a href="<?php echo base_url('login'); ?>">Masuk </a></li>
		<li class="nav-item"><a href="#">|</a></li>
		<li class="nav-item"> <a href="<?php echo base_url('register'); ?>">Daftar</a></li>
		<?php } ?>
		<?php if ($this->session->is_admin) { ?>
			<li class="nav-item"><a href="#">|</a></li>
			<li class="nav-item"> <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<?php } ?>
		<li class="nav-item"> <a href="#">|</a></li>
		<li class="nav-item"> <a href="#"><span class="	glyphicon glyphicon-shopping-cart"></span>  Keranjang (0)</a></li> 
	    </ul>
	    </div>
	  </div>
	</nav>
	<nav class="navbar navbar-default">
	<div class="container-fluid">
	   <div class="navbar-header">
		<img src="<?php echo base_url('assets/images/mipicts.png'); ?>">
	   </div>
	   <ul class="nav navbar-nav navbar-right">
		<li class="nav-item"> <a href="<?php echo base_url('products'); ?>">All Products </a></li>
		<?php foreach ($categories as $category): ?>
			<li class="nav-item"> <a href="<?php echo base_url('product/' . $category->id); ?>"><?php echo $category->name ?> </a></li>
		<?php endforeach ?>
		
	   </ul> 
	</div>
	</nav>
	<section>
		<div id ="carouselIndicators" class="carousel slide" data-ride="carousel" >
			<ol class="carousel-indicators">	
			<?php for ($i = 0; $i < $count; $i++): ?>
			 	<li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>"></li>
			<?php endfor ?>
			</ol>
			<div class="carousel-inner CarouselImages"> 
				<?php $i = true; ?>
				<?php foreach ($banners as $banner): ?>
					<?php if ($i): ?>
						<div class="item active">
						<?php $i = false; ?>
					<?php else: ?>
						<div class="item">
					<?php endif ?>
						<img src ="<?php echo base_url('assets/images/' . $banner->image ); ?>" class="d-block w-100">
					</div>
				<?php endforeach ?>
				
			</div>
			<a class="left carousel-control" href="#carouselIndicators" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carouselIndicators" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next </span>
			</a>
	  	</div>
	</section>
</body>
</html>
