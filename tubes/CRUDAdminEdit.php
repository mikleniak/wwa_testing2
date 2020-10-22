<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Admin Lama</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Admin Lama</div>
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Hati-hati!</strong> Data kunci id harus sama !
      </div>
      <div class="card-body">
        <form method="post" action="proses_edit4.php" enctype="multipart/form-data">
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="id_admin" class="form-control" required="required" >
              <label for="Id">Id Admin</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" class="form-control" required="required" >
              <label for="Nama">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="nama_lengkap" class="form-control" required="required" >
              <label for="Nama">Nama Lengkap</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" class="form-control" required="required" >
              <label for="Nama">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id = "password" name="password" class="form-control" required="required" >
              <label for="Nama">Password</label>
            </div>
          </div>
          <div class="form-group">
            <select name="level" class="custom-select">
              <option value="admin" selected>Admin</option>
              <option value="manager" selected>Manager</option>
              <option selected="selected">-Pilih Kategori-</option>
            </select>   
          </div>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Info!</strong> Perbedaan data kunci id tidak menyebabkan perubahan!
        </div>
        <input class="btn btn-primary btn-block" type="submit" value="Simpan">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="CRUDAdmin.php">Batal dan Kembali</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
  </script>
</body>

</html>