<?php $this->load->view('dashboard/template/header'); ?>
<div style="margin-top: 15px;">
<?php 
  echo form_open($url); 
?>
  <div class="form-group">
    <label for="rates">Update Status Pembayaran</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'status',
                  'class' => 'form-control',
                  'value' => set_value('status', $row->rates ?? ''),
                  'placeholder' => 'Status Pesanan'
          );
          echo form_input($atribut);

          echo form_error('status', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <button type="submit" class="btn btn-primary"><?php echo $tombol; ?></button>
</form>
</div>
<?php $this->load->view('dashboard/template/footer'); ?>