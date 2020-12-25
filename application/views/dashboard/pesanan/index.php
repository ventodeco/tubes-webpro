<?php $this->load->view('dashboard/template/header'); ?>

    <?php if($this->session->flashdata('pesan')): ?>
      <div class="alert <?php echo $this->session->flashdata('alert'); ?>"><?php echo $this->session->flashdata('pesan'); ?></div>
    <?php endif ?>
    <div>
        <table class="table table-bordered" style="margin-top: 25px;">
          <thead>
            <tr>
              <th scope="col">Nama Penerima</th>
              <th scope="col">Alamat</th>
              <th scope="col">Tanggal Transfer</th>
              <th scope="col">Nomor HP</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Quantity</th>
              <th scope="col">Harga</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pesanan as $pesan): ?>
                <tr>
                  <td><?php echo $pesan->nama_penerima ?></td>
                  <td><?php echo $pesan->alamat ?></td>
                  <td><?php echo $pesan->tanggal_transfer ?></td>
                  <td><?php echo $pesan->nomor_hp ?></td>
                  <td><?php echo $pesan->name ?></td>
                  <td><?php echo $pesan->quantity ?></td>
                  <td>Rp.<?php echo $pesan->harga ?></td>
                  <td><?php echo $pesan->status ?></td>
                  <td>

                    <?php if ($pesan->status == 'menunggu pembayaran'): ?>
                      <a type="button" class="btn btn-primary" href="<?php echo base_url('keranjang/detailPesanan/' . $pesan->id); ?>">Konfirmasi Pembayaran</a>
                    <?php endif ?>
                      

                      <?php if ($this->session->is_admin): ?>
                        <a type="button" class="btn btn-warning" href="<?php echo base_url('dashboard/pesanan/editStatus/') . $pesan->id; ?>">Ubah Status</a>
                        
                      <?php endif ?>
                  </td>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>

<?php $this->load->view('dashboard/template/footer'); ?>