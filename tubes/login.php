<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
  <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan']=="gagal"){
      echo "<div class='alert alert-danger'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              <strong>Maaf!</strong> Username dan Password tidak sesuai!
            </div>";
    }
  }
  ?>        
        <form method="post" action="ceklogin.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" class="form-control" required="required" >
              <label for="Username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" class="form-control" required="required" >
              <label for="password">Password</label>
            </div>
          </div>
        <input class="btn btn-primary btn-block" type="submit" value="Login">          
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
