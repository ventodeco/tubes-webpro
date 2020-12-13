<?php $this->load->view('dashboard/template/header'); ?>
    <div class="w-100 text-right">
      <a href="<?php echo base_url('dashboard/kota/add'); ?>" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px;">Tambah kota</a>
    </div>
    <?php if($this->session->flashdata('pesan')): ?>
      <div class="alert <?php echo $this->session->flashdata('alert'); ?>"><?php echo $this->session->flashdata('pesan'); ?></div>
    <?php endif ?>
    <div>
        <table class="table table-bordered" style="margin-top: 25px;">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Tarif</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allKota as $kota): ?>
                <tr>
                  <td><?php echo $kota->name ?></td>
                  <td><?php echo $kota->rates ?></td>
                  <td>
                      <a type="button" class="btn btn-warning" href="<?php echo base_url('dashboard/kota/edit/') . $kota->id; ?>">Edit</a>
                      <a type="button" class="btn btn-danger" href="<?php echo base_url('dashboard/kota/delete/') . $kota->id; ?>">Hapus</a>
                  </td>
                </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>

<?php $this->load->view('dashboard/template/footer'); ?>