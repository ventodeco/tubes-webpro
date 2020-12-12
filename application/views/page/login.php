<html>
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css'); ?>" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</script>
<body>
<center>
  <br><div class='container'>
    <?php if($this->session->flashdata('pesan')): ?>
      <div class="alert <?php echo $this->session->flashdata('alert'); ?>"><?php echo $this->session->flashdata('pesan'); ?></div>
    <?php endif ?>
    <br><img src="<?php echo base_url('assets/images/mipicts.png'); ?>" widht="48" height="48">
    <br><h2>Masuk ke akun mi</h2>
    <?php echo form_open(base_url('login/proses')); ?>
      <div class ="form-group" >
        <?php 
          $data = array(
                  'type'  => 'text',
                  'name'  => 'email',
                  'class' => 'form-control InLinetext1',
                  'value' => set_value('email'),
                  'placeholder' => 'email'
          );
          echo form_input($data);

          echo form_error('email', '<div class="text-danger">', '</div>');
        ?>
      </div>
      <div class="form-group">
        <?php 
          $data = array(
                  'type'  => 'password',
                  'name'  => 'password',
                  'class' => 'form-control InLinetext1',
                  'placeholder' => 'sandi'
          );
          echo form_input($data);
          echo form_error('password', '<div class="text-danger">', '</div>');
        ?>
      </div>
       <?php 
          echo form_submit(['name' => 'submit', 'class' => 'btn btn-primary buttonMasuk'], 'Masuk');

          echo form_close();
       ?>
    <br>
        <a href="<?php echo base_url('register'); ?>">Buat akun</a>
        <a> | </a>
        <a href="lupasandi.html">Lupa sandi?</a>
  </div>
 </div>
</center>
</body>

</html>


