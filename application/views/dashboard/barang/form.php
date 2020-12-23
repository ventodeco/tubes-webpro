<?php $this->load->view('dashboard/template/header'); ?>
<div style="margin-top: 15px;">
<?php 
  echo form_open_multipart($url); 
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
    <label for="category_id">Kategori</label>
    <?php 
          $cat = [];
          foreach ($categories as $category) {
            $cat[$category->id] = $category->name;
          }
  
          echo form_dropdown('category_id', $cat, $row->category_id ?? null);

          echo form_error('category_id', '<div class="text-danger">', '</div>');
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