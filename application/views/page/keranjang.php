<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/footer.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/keranjang.css'); ?>" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
    <header class="mini-header">
        <div class="mini-header mihi-header-site">
            <div class="tittle-header-container">
                <div class="home-logo-container">
                    <a href="home.html">
                        <img src="<?php echo base_url('assets/images/mihome.png'); ?>" alt="Xiaomi">
                    </a>
                </div>
                <h1 class="tittle-header">Keranjang belanja saya</h1>
                <div class="spacer"></div>
                <div class="akun">
                    <ul class="login">
                        <li class="masuk">
                            <a href="Login.html">Sign in</a>
                        </li>
                        <li class="daftar">
                            <a href="register.html">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mini-header mini-header-step">
            <ul class="mini-header-step Step">
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">1. Keranjang</span>
                </li>
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">2. Order information</span>
                </li>
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">3. Menyelesaikan pembayaran</span>
                </li>
            </ul>
        </div>
    </header>
   
    <main class="cart">
        <center>
            <img src="<?php echo base_url('assets/images/cart-empty.png'); ?> "class="gambar_keranjang">
            <p class="aduhkosong">keranjang anda kosong.</p>
            <button class="klikdong">klik disini ></button><br><br>
            <h2 class="rec">Rekomendasi</h2>
        </center>
            <ul class="cart_recomendation">
                <li class="item">
                    <img src="<?php echo base_url('assets/images/PocoPoco.png'); ?>" class="cart_recomendation image"></img>
                </li>
                    <li class="item">
                        <img src="<?php echo base_url('assets/images/PocoPoco.png'); ?>" class="cart_recomendation image"></img>
                </li>
            </ul>
    </main>

    <footer class="row">
        <div class="col-md-2" >
            <h6>Produk</h6>
            <h6> Mi Smart Band 5</h6>
            <h6> Mi TV Stick </h6>
       </div>
   
       <div class="col-md-2">
            <h6> DUKUNGAN </h6>
            <h6> Panduan Pengguna </h6>
            <h6> Kewajiban pendaftaran IMEI </h6>
            <h6> ponsel anda </h6>
            <h6> Layanan Pelanggan </h6>
                <h6> Garansi </h6>
                <h6> Garansi Ekstensi(Produk Resmi) </h6>
       </div>
       <div class="col-md-2">
            <h6>MEDIA SOSIAL</h6>
            <h6>MIUI</h6>
            <h6>Facebook / Twitter </h6>
            <h6>Instagram</h6>
       </div>
       <div class="col-md-2">
           <h6>TENTANG</h6>	
           <h6>Xiaomi</h6>
           <h6>Kebijakan Privasi</h6>
           <h6>Hubungi Kami</h6>
           <h6>Integritas & Kepatuhan </h6>
           <h6>Gerai Terdekat</h6>
       </div>
       <div class="col-md-2 centered">
           <h4>0800-1-401558</h4>
           <h5>Jam Layanan: 09.00 - 18.00</h5>
           <div class="square">
           <h6> Kambing </h6>
           </div>
   
    </footer>
    </div>
</body>
</html>