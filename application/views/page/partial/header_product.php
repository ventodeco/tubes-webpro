<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo $title; ?></title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/home.css') ?>">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
</head>
<body>
      <section class="uppernav"> 
            <div class="external-entries-left py-md-2 mx-5">
                  <a class="batasi" href="#">mi indonesia</a>
                  <a class="batasi" href="#"> | </a>
                  <a class="batasi" href="#">ikuti kita di facebook</a>
                  <a class="batasi" href="#"> | </a>
                  <a class="batasi" href="#"> mi community </a>
            </div>
            <div class="external-entries-right py-md-2 mx-5">

            <?php if ($this->session->logged_in) { ?>
                  <a class="batasi" href="#">Selamat Datang <?php echo $this->session->name ?> </a>
                  <a class="batasi" href="#"> | </a>
                  <a class="batasi" href="<?php echo base_url('logout'); ?>">Logout</a>

            <?php } else { ?>
                  <a class="batasi" href="<?php echo base_url('login'); ?>">Masuk</a>
                  <a class="batasi" href="#"> | </a>
                  <a class="batasi" href="<?php echo base_url('register'); ?>">Daftar</a>
            <?php } ?>
            <?php if ($this->session->is_admin) { ?>
                  <a href="#" class="batasi">|</a>
                  <a href="<?php echo base_url('dashboard'); ?>" class="batasi">Dashboard</a>
            <?php } ?>
                  <a class="batasi" href="<?php echo base_url('keranjang'); ?>"> Keranjang </a>
            </div>
      </section>
      <section class="main-nav">
            <nav class="navbar navbar-expand-lg navbar-light"> 
                  <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url('home') ?>"> Home </a>
                  </div>
            </div>
            <div class="navbar-collapse">
                  <ul class="nav navbar-nav navbar-right ml-auto">
                        <li class="nav-item"> <a href="<?php echo base_url('products'); ?>">All Products </a></li>
                        <?php foreach ($categories as $category): ?>
                              <li class="nav-item"> <a href="<?php echo base_url('products/' . $category->id); ?>"><?php echo $category->name ?> </a></li>
                        <?php endforeach ?>
                        
                     </ul> 
            </nav>
      </section> 