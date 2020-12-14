<?php $this->load->view('dashboard/template/header'); ?>
<div style="margin-top: 15px;">
<?php 
  echo form_open_multipart($url); 
?>
  <div class="form-group">
    <label for="name">Deskripsi Banner</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'name',
                  'class' => 'form-control',
                  'value' => set_value('name', $row->name ?? ''),
                  'placeholder' => 'Deskripsi Banner'
          );
          echo form_input($atribut);

          echo form_error('name', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <div class="form-group">
    <label for="image">Gambar Banner</label>
    <input type="file" name="image">
    <div class="text-danger"><?php echo $error; ?></div>
    <?php if (isset($row)): ?>
      <div style="margin-top: 15px;">
        <label>Gambar Sebelumnya</label><br>
        <img src="<?php echo base_url('assets/images/') . $row->image; ?>" width="500px;">
      </div>
    <?php endif ?>
  </div>
  <button type="submit" class="btn btn-primary"><?php echo $tombol; ?></button>
</form>
</div>
<?php $this->load->view('dashboard/template/footer'); ?>