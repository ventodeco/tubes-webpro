<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/produk.css'); ?>" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/footer.css'); ?>" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title><?php echo $product->name; ?></title>
</head>
<body>
<div id="root">
    <header class="mini-header">
        <div class="mini-header__site site-header">
            <div class="site-header__container">
                <div class="site-header__mi-logo">
                    <a href="<?php echo base_url('home'); ?>">
                        <img src="<?php echo base_url('assets/images/mihome.png') ?>" alt="Xiaomi">
                    </a>
                </div>
                <div class="site-header__spacer"></div>   
            </div>
        </div>
    </header>
    <main class="product__main">
        <div class="product__main">
            <div class="product__container">
            <aside class="product__aside">
                <section class="product__image-wrapper">
                    <div class="product__image">
                        <img alt="Gambar produk" src="<?php echo base_url('assets/images/' . $product->image); ?>" class="product__image-content">
                    </div>
                </section>
            </aside>
            <article class="product__article">
                <section class="product__section product__section-spacer information-section" style="margin-top: 0px;">
                    <h1 class="information-section__product-title">
                        <span><?php echo $product->name; ?></span>
                    </h1>
                    <div class="information-section__product-info">
                        <div class="information-section__product-sku-info"><?php echo $product->description; ?></div>
                        <div class="information-section__product-price">
                            <strong><small>Rp </small><?php echo $product->price; ?></strong>
                        </div>
                    </div>
                </section>
                <section class="product__section quantity-section">
                    <h3 class="product__section-title">Jumlah</h3>
                    <div class="quantity-section__content">
                        <button class="quantity-section__button" disabled="" aria-label="Kurangi jumlah">
                            <i class="kurang icon-plus">-</i>
                        </button>
                        <input readonly="" class="quantity-section__value" value="1">
                        <button class="quantity-section__button" disabled="" aria-label="Tambah jumlah">
                            <i class="tambah icon-plus">+</i>
                        </button>
                    </div>
                </section>
                <section class="product__section order-list-section">
                    <ul class="order-list-section__list">
                        <li class="order-list-section__item"><span><?php echo $product->name . ' ' . $product->description; ?></span>
                            <div class="order-list-section__item-spacer"></div>
                            <strong><small>Rp </small><?php echo $product->price ?></strong>
                        </li>
                        <li class="order-list-section__item order-list-section__item--total"><span>Total: </span>
                            <div class="order-list-section__item-spacer"></div>
                            <strong><small>Rp </small><?php echo $product->price ?></strong>
                        </li>
                    </ul>
                </section>
                <section class="product__section add-cart-section custome-link">
                    <div class="add-cart-section__wrap">
                        <div class="add-cart-section__submit-group">
                            <form method="post" action="<?php echo base_url('keranjang'); ?>">
                            <input type="text" name="barang_id" value="<?php echo $product->id; ?>" hidden>
                            <button class="add-cart-section__btn add-cart-section__submit add-cart-section__submit--main" style="width: 200px;" aria-label="Beli Sekarang"><input type="submit" style="color: white; background-color: #ff6700; border: none;" value="Beli Sekarang"></button>
                            </form>
                        </div>

            </article>
            </div>
        </div>
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
            <h6> </h6>
            </div>
    
    </footer>
</div>
</body>
</html>
