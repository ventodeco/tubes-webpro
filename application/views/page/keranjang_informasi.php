<?php $this->load->view('page/partial/header_keranjang'); ?>

<div class="mini-header mini-header-step">
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
            <ul class="mini-header-step Step">
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">1. Keranjang</span>
                </li>
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang-active">2. Order information</span>
                </li>
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">3. Menyelesaikan pembayaran</span>
                </li>
            </ul>
        </div>
    </header>
   
    <main id="root">
     <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <table style="width: 550px;" align="left">
                       <tr>
                        <th bgcolor="#ff6700" class="tableheader"><center>Alamat pengiriman Barang</center></th>
                       </tr>
                       <tr>
                            <td>
                                <form method="post" action="<?php echo base_url('keranjang/informationSend'); ?>">
                                    Nama penerima
                                    <input type="text" name="name" class="sizebox">
                                    Nomor telepon
                                    <input type="text" name="no_hp" class="sizebox">
                                    alamat
                                    <input type="text" name="alamat" class="sizealamat">
                                    kota
                                    <select class="sizebox" name="kota">
                                        <?php foreach ($cities as $city): ?>
                                            <option value="<?php echo $city->id; ?>"><?php echo $city->name . ' ( Rp.' . $city->rates . ' ) '; ?></option>
                                        <?php endforeach ?>
                                    </select>
                            </td>
                       </tr>
                   </table>
                   <input type="text" name="barang" value="<?php echo $product->id; ?>" hidden>
                </div>
               <div class="col-md-6">
                   <table style="width: 550px;" align="right">
                        <tr>
                            <th bgcolor="#ff6700" class="tableheader" colspan="3"><center>Detail orderan</center></th>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td width="40px">Qty</td>
                            <td>harga</td>
                        </tr>
                        <tr>
                            <td><?php echo $product->name; ?></td>
                            <td>1 </td>
                            <td>Rp.<?php echo $product->price; ?></td>
                        </tr>
                        <tr class="pembayarantotal">
                            <th colspan="2"><center>Sub total: </center></th>
                            <th>Rp.<?php echo $product->price; ?></th>
                        </tr>
                       </table>
                           </div>
                       </div>
         
         <div class="button-confirm" id="wrapperbutton">
                <input type="submit" class="btn" style="background-color: #ff6700; color: white; margin: 10px 0 10px 0;" value="Konfirmasi pembayaran">
                
            </form>
         </div>
         </div>
    </main>

<?php $this->load->view('page/partial/footer_keranjang') ?>