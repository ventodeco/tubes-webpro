<?php $this->load->view('page/partial/header_product'); ?>
<section class="body-card1 mb-5">
      <center>
            <div class="container">
                  <div class="row">
                        <?php foreach ($products as $product): ?>
                              <div class="card col-md-4 m-auto p-4" style="width: 18rem;">
                                <h5 class="card-title"><?php echo $product->name; ?></h5>
                                <div class="text-center">
                                  <img class="card-img-top" style="width: 200px;" src="<?php echo base_url('assets/images/' . $product->image) ?>" alt="Card image cap">
                                  
                                </div>
                                <div class="card-body">
                                  <p class="card-text"><b> Rp. <?php echo $product->price ?> </b> </p>
                                </div>
                                <a href="<?php echo base_url('product/' . $product->id) ?>" class="btn btn-primary">Lihat Produk</a>
                              </div>
                        <?php endforeach ?>
                  </div>
            </div>
      </center>
</section>

<?php $this->load->view('page/partial/footer_product'); ?>