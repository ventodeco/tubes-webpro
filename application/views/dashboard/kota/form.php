<?php $this->load->view('dashboard/template/header'); ?>
<div style="margin-top: 15px;">
<?php 
  echo form_open($url); 
?>
  <div class="form-group">
    <label for="name">Nama Kota</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'name',
                  'class' => 'form-control',
                  'value' => set_value('name', $row->name ?? ''),
                  'placeholder' => 'Nama Kota'
          );
          echo form_input($atribut);

          echo form_error('name', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <div class="form-group">
    <label for="rates">Tarif Harga</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'rates',
                  'class' => 'form-control',
                  'value' => set_value('rates', $row->rates ?? ''),
                  'placeholder' => 'Tarif Harga'
          );
          echo form_input($atribut);

          echo form_error('rates', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <button type="submit" class="btn btn-primary"><?php echo $tombol; ?></button>
</form>
</div>
<?php $this->load->view('dashboard/template/footer'); ?>