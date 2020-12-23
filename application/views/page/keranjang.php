<?php $this->load->view('page/partial/header_keranjang'); ?>
<header class="mini-header">
        <div class="mini-header mihi-header-site">
            <div class="tittle-header-container">
                <div class="home-logo-container">
                    <a href="<?php echo base_url('home'); ?>">
                        <img src="<?php echo base_url('assets/images/mihome.png') ?>" alt="Xiaomi">
                    </a>
                </div>
                <h1 class="tittle-header">Keranjang belanja saya</h1>
                <div class="spacer"></div>
            </div>
        </div>
        <div class="mini-header mini-header-step">
            <ul class="mini-header-step Step">
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang-active">1. Keranjang</span>
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
   
      <?php if (isset($product)): ?>
        <div class="cart">
           <header class="cart__header">
                <div class="cart__header-select-all">Semua</div>
                <div class="cart__header-title cart__header-title--info">Nama produk</div>
                <div class="cart__header-title cart__header-title--price">Harga satuan</div>
                <div class="cart__header-title cart__header-title--quantity">Jumlah</div>
                <div class="cart__header-title cart__header-title--total">Total</div>
            </header>
        </div>
        <div class="cart_body">
            <section class="cart_body-info-box">
                <div class="cart_body-image">
                    <img src="<?php echo base_url('assets/images/' . $product->image) ?>" class="car_body-image">
                </div>
                <div class="cart_body-info">
                    <h4 class="cart-body-product-title"><?php echo $product->name; ?></h4>
                </div>
                <div class="cart-body-price">
                    <strong><small>Rp </small><?php echo $product->price; ?></strong>
                </div>
                <p class="cart-quantity__limit">Beli maksimal 1 produk</p>
                <div class="cart-body-price-total">
                    <strong><small>Rp </small><?php echo $product->price; ?></strong>
                </div>
                <form method="post" action="<?php echo base_url('keranjang/hapusBarang'); ?>">
                  <input type="text" name="data" value="true" hidden>
                  <button class="cart-item__delete">
                      <input type="submit" value="X" style="text-decoration: none; color: black; background-color: white; border: none;">
                  </button>
                </form>
            </section>
        </div>
        <div class="cart__footer">
           <div class="cart__footer-content container">
               <div class="cart__footer-selected">Anda telah memilih <strong>1</strong> produk produk dari total <strong>1</strong> produk</div>
               <div class="cart__footer-spacer"></div>
               <div class="cart__footer-total">
                   <strong>Total: Rp <?php echo $product->price; ?></strong><i>Tidak termasuk ongkos kirim</i>
                </div>
               <button class="cart__footer-checkout" aria-label="Bayar"><span>Bayar</span><span>(1)</span></button></div>
        </div>
      <?php else: ?>
        <main class="cart">
            <center>
                <img src="<?php echo base_url('assets/images/cart-empty.png'); ?>" class="gambar_keranjang">
                <p class="aduhkosong">keranjang anda kosong.</p>
                <button class="klikdong"><a style="text-decoration: none; color: white" href="<?php echo base_url('home'); ?>">klik disini ></a></button><br><br>
            </center>
        </main>
      <?php endif ?>

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
           </div>
   
    </footer>
    </div>
</body>
</html>
