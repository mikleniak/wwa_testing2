<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Kota</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Kota</div>
      <div class="card-body">
        <?php
        $connection = mysqli_connect("localhost", "root", "", "wwa");
        if(isset($_POST['edit_kota_btn']))
        {
          $id_kota = $_POST['edit_kota'];
          $query = "SELECT * FROM kota WHERE id_kota='$id_kota' ";
          $query_run = mysqli_query($connection, $query);

          foreach ($query_run as $rowedit) {
            ?>
            <form method="post" action="code.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>Id Kota</label>
                <input type="text" name="edit_id_kota" value="<?php echo $rowedit['id_kota'] ?>" class="form-control" required readonly>
              </div>
              <div class="form-group">
                <label>Nama Kota</label>
                <input type="text" name="edit_nama_kota" class="form-control" value="<?php echo $rowedit['nama_kota'] ?>" required>
              </div>
              <button type="submit" name="update_kota_btn" class="btn btn-primary btn-block">Simpan</button>
            </form><br>
            <div class="text-center">
              <a class="btn-block" href="CRUDKota3.php" style="border: solid 1px; border-color: blue; padding: 5px; background-color: white; color: blue;">Batal</a>
            </div>
            <?php
          }
        }

        if(isset($_POST['delete_kota_btn']))
        {
          $id_kota = $_POST['delete_kota'];

          $query = "DELETE FROM kota WHERE id_kota='$id_kota' ";
          $query_run = mysqli_query($connection, $query);

          if($query_run)
          {
            echo "<script>alert('Berhasil menghapus data'); window.location='CRUDKota3.php';</script>";
          }
          else
          {
            echo "<script>alert('Data gagal dihapus'); window.location='CRUDKota3.php';</script>";
          }
        }
        ?>
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

  </html>s