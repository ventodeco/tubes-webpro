<?php $this->load->view('dashboard/template/header'); ?>
<div style="margin-top: 15px;">
<?php 
  echo form_open($url); 
?>
  <div class="form-group">
    <label for="name">Nama Barang</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'name',
                  'class' => 'form-control',
                  'value' => set_value('name', $row->name ?? ''),
                  'placeholder' => 'Nama Barang'
          );
          echo form_input($atribut);

          echo form_error('name', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <div class="form-group">
    <label for="description">Deskripsi Barang</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'description',
                  'class' => 'form-control',
                  'value' => set_value('description', $row->description ?? ''),
                  'placeholder' => 'Deskripsi Barang'
          );
          echo form_textarea($atribut);

          echo form_error('description', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <div class="form-group">
    <label for="price">Harga Barang</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'price',
                  'class' => 'form-control',
                  'value' => set_value('price', $row->price ?? ''),
                  'placeholder' => 'Harga Barang'
          );
          echo form_input($atribut);

          echo form_error('price', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <div class="form-group">
    <label for="stock">Stok Barang</label>
    <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'stock',
                  'class' => 'form-control',
                  'value' => set_value('stock', $row->stock ?? ''),
                  'placeholder' => 'Stok Barang'
          );
          echo form_input($atribut);

          echo form_error('stock', '<div class="text-danger">', '</div>');
        ?>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Gambar</label>
    <input type="file" id="exampleInputFile">
  </div>
  <button type="submit" class="btn btn-primary"><?php echo $tombol; ?></button>
</form>
</div>
<?php $this->load->view('dashboard/template/footer'); ?>