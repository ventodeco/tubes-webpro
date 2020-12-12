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
 <form>
  <br><div class='container'>
    <br><img src="<?php echo base_url('assets/images/mipicts.png'); ?>" widht="48" height="48">
    <br><h2>Masuk ke akun mi</h2>
    <form name="myname">
      <div class ="form-group" >
        <input type = "text" name="Name" placeholder = "email/telepon/akun mi" class='form-control InLinetext1' required>
      </div>
    </form>
    <form name="mypw">
      <div class="form-group">
        <input type="password" name="pw" class="form-control InLinetext1" placeholder="sandi" required>
      </div>
    </form>
    </form>
      <div>
    	 <button class="btn btn-primary buttonMasuk"> Masuk </button> <br> <br>
      </div>
        <a href="register.html">Buat akun</a>
        <a> | </a>
        <a href="lupasandi.html">Lupa sandi?</a>
  </div>
 </div>
</center>
</body>

</html>


