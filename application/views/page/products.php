<?php $this->load->view('page/partial/header_product'); ?>
<section class="body-card1 mb-5">
      <center>
            <div class="container">
                  <div class="row">
                        <?php foreach ($products as $product): ?>
                              <div class="card col-md-4 m-auto" style="width: 18rem;">
                                <h5 class="card-title"><?php echo $product->name; ?></h5>
                                <img class="card-img-top" src="<?php echo base_url('assets/images/' . $product->image) ?>" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text"><?php echo $product->price ?></p>
                                </div>
                              </div>
                        <?php endforeach ?>
                  </div>
            </div>
      </center>
</section>

<?php $this->load->view('page/partial/footer_product'); ?>