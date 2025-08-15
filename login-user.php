<?php include 'assets/php/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FIFADVENTURE | Online</title>

  <!-- Font Awesome Icons -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Alertify -->
  <link href="assets/css/alertify.min.css" rel="stylesheet" type='text/css' />
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="assets/css/creative.css" rel="stylesheet">
  <style type="text/css">
    .ket-pass{
      font-size: 10pt;
    }
  </style>
</head>

<body id="page-top">

  <!-- About Section -->
  <section class="bg-primary p-5" id="about">
    <div class="container">
    <form action="proses-login.php" method="POST">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mt-5">
        <h4 class="h1">CA<span class="text-light">MPP</span></h4>
        <hr class="divider-light">
          <h2 class="text-white h5">Login</h2>
          <div class="card p-2 bg-light">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="pass" id="pass" class="form-control" onkeyup="cekPass(this.value)" required>
            </div>
          </div>
          <hr class="divider-light my-3">
          <button class="btn btn-dark btn-l js-scroll-trigger" name="login">Login</button><br>
          <a href="home.php" class="btn btn-light btn-l ml-2 mt-3" >Kembali ke Home</a>
        </div>
      </div>
    </form>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="assets/js/creative.min.js"></script>
  <script src="assets/js/alertify.min.js"></script>
</body>

</html>
