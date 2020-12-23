<?php $this->load->view('dashboard/template/header'); ?>
    <div class="w-100 text-right">
      <a href="<?php echo base_url('dashboard/barang/add'); ?>" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;">Tambah Barang</a>
    </div>
    <?php if($this->session->flashdata('pesan')): ?>
      <div class="alert <?php echo $this->session->flashdata('alert'); ?>"><?php echo $this->session->flashdata('pesan'); ?></div>
    <?php endif ?>
    <div>
        <table class="table table-bordered" style="margin-top: 25px;">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Stock</th>
              <th scope="col">Gambar</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allBarang as $barang): ?>
                <tr>
                  <td><?php echo $barang->name ?></td>
                  <td><?php echo $barang->price ?></td>
                  <td><?php echo $barang->stock ?></td>
                  <td>
                    <img src="<?php echo base_url('assets/images/') . $barang->image; ?>"  width="100px;" alt="">
                  </td>
                  <td>
                      <a type="button" class="btn btn-warning" href="<?php echo base_url('dashboard/barang/edit/') . $barang->id; ?>">Edit</a>
                      <a type="button" class="btn btn-danger" href="<?php echo base_url('dashboard/barang/delete/') . $barang->id; ?>">Hapus</a>
                  </td>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>

<?php $this->load->view('dashboard/template/footer'); ?>