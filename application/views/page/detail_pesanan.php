<?php $this->load->view('page/partial/header_keranjang_pembayaran'); ?>
<div class="mini-header mini-header-step">
            <ul class="mini-header-step Step">
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">1. Keranjang</span>
                </li>
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang">2. Order information</span>
                </li>
                <li class="Step step_by_step">
                    <span class="step_by_step keranjang-active">3. Menyelesaikan pembayaran</span>
                </li>
            </ul>
        </div>
    </header>
   
    <main class="information">
        <div class="bodyinformation_pembayaran">
            <h3>Detail pesanan</h3>
            <pre>
                Nama penerima       : <?php echo $pesanan->nama_penerima; ?> 
                <br>
                Alamat              : <?php echo $pesanan->alamat; ?>
                <br>
                Nomor pengirim      : <?php echo $pesanan->nomor_hp ?>
                <br>
                tanggal pemesanan   : <?php echo $pesanan->tanggal_pemesanan; ?>
                <br>
            </pre>
            <table class="detail_pembayaran" align="center">
                <tr>
                    <th widht="60px"> No </th>
                    <th widht="300px"> Nama barang </th>
                    <th widht="60px"> qty </th>
                    <th widht="300px"> Harga satuan </th>
                    <th widht="400px"> Total </th>
                </tr>
                <tr>
                    <td> 1 </td>
                    <td> <?php echo $product->name; ?> </td>
                    <td> <?php echo $pesanan_detail->quantity; ?> </td>
                    <td>Rp.  <?php echo $product->price; ?></td>
                    <td> Rp. <?php echo $product->price; ?></td>
                </tr>
                <tr>
                    <td> 2 </td>
                    <td> Ongkos Kirim </td>
                    <td> </td>
                    <td> </td>
                    <td>Rp.  <?php echo $kota->rates; ?> </td>
                </tr>
                <tr class="subtotal">
                    <td colspan="3"> </td>
                    <td> sub-total </td>
                    <td> Rp. <?php echo $pesanan_detail->harga; ?> </td>
                </tr>
            </table><br>
            <pre>
                silahkan melakukan pembayaran melalui bank <b>BCA</b>
                Nomor rekening : 123-456-789 (XIAOMI INDONESIA)
                silahkan lakukan konfirmasi pembayaran <a href="<?php echo base_url('keranjang/konfirmasi'); ?>"><u><b>disini</b></u></a>
            </pre>
        </div>
    </main>
