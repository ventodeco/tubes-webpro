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
                <form action="<?php echo base_url('keranjang/information'); ?>" method="post">
                  <input type="text" name="barang" value="<?php echo $product->id; ?>" hidden>
                  <input type="submit" value="Lanjutkan Pembayaran" style="width: 200px; font-size: 15px; height: 40px;  border: none; background-color: #ff6700; color: white; border-radius: 5px;">
                </form>
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

<?php $this->load->view('page/partial/footer_keranjang'); ?>