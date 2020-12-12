<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/yow.css'); ?>"  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <br><br><div class='container'>
    <img src="<?php echo base_url('assets/images/mipicts.png'); ?>" height="48" width="48" class="center">
    <h2 align="center">Buat Akun Mi</h2>
    <?php 
      $atribut = array('class' => 'row col-lg-4 col-lg-offset-4');
      echo form_open(base_url('register/proses'), $atribut); 
    ?>
      <div class="form-group" >
        <label for="name">Nama</label>
        <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'name',
                  'class' => 'form-control InLinetext1',
                  'value' => set_value('name'),
                  'placeholder' => 'Masukan nama'
          );
          echo form_input($atribut);

          echo form_error('name', '<div class="text-danger">', '</div>');
        ?>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <?php 
          $atribut = array(
                  'type'  => 'text',
                  'name'  => 'email',
                  'class' => 'form-control InLinetext1',
                  'value' => set_value('email'),
                  'placeholder' => 'Masukan alamat email'
          );
          echo form_input($atribut);

          echo form_error('email', '<div class="text-danger">', '</div>');
        ?>
      </div>
      <div class ="form-group">
        <label for="password">Password</label>
        <?php 
          $atribut = array(
                  'type'  => 'password',
                  'name'  => 'password',
                  'class' => 'form-control InLinetext1',
                  'placeholder' => 'Masukan sandi'
          );
          echo form_input($atribut);

          echo form_error('password', '<div class="text-danger">', '</div>');
        ?>
      </div>
      <div class ="form-group">
        <label for="con_password">Konfirmasi Password</label>
        <?php 
          $atribut = array(
                  'type'  => 'password',
                  'name'  => 'con_password',
                  'class' => 'form-control InLinetext1',
                  'placeholder' => 'Masukan ulang sandi'
          );
          echo form_input($atribut);

          echo form_error('con_password', '<div class="text-danger">', '</div>');
        ?>
      </div>
        <div>
      	 <button type="submit" class="btn btn-primary buttonMI"> Buat Akun Mi</button> <br> <br>
          <?php 
            echo anchor('login', 'Saya sudah punya akun', ['class' => 'btn btn-primary buttonNoTelp']); 
           ?>
        </div>
      <div class='row text-center'>
        <br><br>
        <a target="_blank" href="https://account.xiaomi.com/about/protocol/agreement" class="AhrefBlack">Saya telah membaca dan menyetujui <strong>Perjanjian Pengguna</strong> dan <strong>Kebijakan Privasi</strong> Xiaomi</a>
      </div>
      </form>
  </div>
 </div>
</body>


</html>
