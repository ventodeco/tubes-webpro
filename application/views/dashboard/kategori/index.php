<?php $this->load->view('dashboard/template/header'); ?>
    <div class="w-100 text-right">
      <a href="<?php echo base_url('dashboard/kategori/add'); ?>" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;">Tambah Kategori</a>
    </div>
    <?php if($this->session->flashdata('pesan')): ?>
      <div class="alert <?php echo $this->session->flashdata('alert'); ?>"><?php echo $this->session->flashdata('pesan'); ?></div>
    <?php endif ?>
    <div>
        <table class="table table-bordered" style="margin-top: 25px;">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allCategory as $category): ?>
                <tr>
                  <td><?php echo $category->name ?></td>
                  <td>
                      <a type="button" class="btn btn-warning" href="<?php echo base_url('dashboard/kategori/edit/') . $category->id; ?>">Edit</a>
                      <a type="button" class="btn btn-danger" href="<?php echo base_url('dashboard/kategori/delete/') . $category->id; ?>">Hapus</a>
                  </td>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>

<?php $this->load->view('dashboard/template/footer'); ?>