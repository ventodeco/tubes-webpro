<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <br><br><div class='container'>
    <img src="<?php echo base_url('assets/images/mipicts.png'); ?>" height="48" width="48" class="center">
    <br><br>
    <h2 align="center">Buat Akun Mi</h2>
    <br><br>

  <form class="row col-lg-4 col-lg-offset-4">
    <div class ="form-group" >
      <input type = "password" class='form-control InLinetext1'placeholder="masukan sandi" required>
        <span class ="fa fa-user form-control-icon"> </span>
      </div>
      <div class="form-group">
        <input type="password" class="form-control InLinetext1" placeholder="Masukan ulang sandi" required>
      </div>
      <div>
    	 <button class="btn btn-primary buttonMI"><a href="Login.html"> Kirim </a></button> <br> <br>
   	    <button class="btn btn-primary buttonNoTelp"><a href="register.html"> kembali </a></button>
      </div>
      <div class='row text-center'>
        <br><br>
        <a href="https://account.xiaomi.com/about/protocol/agreement" class="AhrefBlack">Saya telah membaca dan menyetujui <strong>Perjanjian Pengguna</strong> dan <strong>Kebijakan Privasi</strong> Xiaomi</a>
      </div>
    </form>
  </div>
 </div>
</body>


</html>