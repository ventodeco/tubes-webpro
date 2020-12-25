<?php $this->load->view('dashboard/template/header'); ?>
<div style="margin-top: 15px;">

  <form action="<?php echo base_url('pesanan/update') ?>" method="post">
    <div class="form-group">
      <label for="rates">Update Status Pembayaran</label><br>
      <select name="status" class="w-100">
        <option value="dikirim">Dikirim</option>
        <option value="ditolak">Ditolak</option>
      </select>
    </div>
    <input type="text" name="pesanan_id" value="<?php echo $pesanan->id; ?>" hidden>
    <input type="submit" value="Update Status Pesanan">
  </form>
</div>
<?php $this->load->view('dashboard/template/footer'); ?>