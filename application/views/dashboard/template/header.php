<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="<?php echo base_url('assets/css/datepicker3.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><span>Xiaomi</span>Dashboard</a>
                
            </div>
        </div>
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Halo, <?php echo $this->session->name; ?></div>
            </div>
            <div class="clear"></div>
        </div>
        <ul class="nav menu">
            <li><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('dashboard/barang'); ?>">Barang</a></li>
            <li><a href="<?php echo base_url('dashboard/kategori'); ?>">Kategori</a></li>
            <li><a href="<?php echo base_url('dashboard/kota'); ?>">Kota</a></li>
            <li><a href="<?php echo base_url('dashboard/banner'); ?>">Banner</a></li>
            <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
        </ul>
    </div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <h1><?php echo $title; ?></h1>