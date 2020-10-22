<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Admin Baru</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Tambah Admin Baru</div>
      <div class="card-body">
        <div class='alert-warning'>
          <p style="padding-top, padding-left, padding-right: 15px; padding-bottom: 5px;">Pastikan nama lengkap dan email sudah benar karena nama lengkap dan email yang telah disimpan tidak dapat diubah lagi</p>
        </div>
        <form method="post" action="code.php" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="admin_btn">Simpan</button>
          </form><br>
          <div class="text-center">
            <a class="btn-block" href="CRUDAdmin.php" style="border: solid 1px; border-color: blue; padding: 5px; background-color: white; color: blue;">Batal</a>
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