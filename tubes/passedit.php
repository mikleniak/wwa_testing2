<?php 
include('includes/header.php');
session_start();
if (!isset($_SESSION['username'])){
  header("Location:login.php");
}

include('includes/navbar.php');
?>

<div id="wrapper">
  <!-- Sidebar -->
  <?php
  include('includes/sidebar.php');
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Edit Profile</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <?php
          $connection = mysqli_connect("localhost","root","","wwa");
          $nama_lengkap = $_SESSION['username'];
          $query = "SELECT * FROM admin WHERE nama_lengkap='$nama_lengkap' ";
          $querypass = "SELECT password FROM admin WHERE nama_lengkap='$nama_lengkap' ";
          $query_run = mysqli_query($connection, $query);
          $pass_run = mysqli_query($connection, $querypass);
          $pass = mysqli_fetch_assoc($pass_run);
          $ini_pass = $pass['password'];

          foreach ($query_run as $row) {
            ?>
            <div class="card-body">
              <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Password Lama</label>
                  <input type="password" name="password_lama" class="form-control" required id="password_lama">
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" name="password_baru" class="form-control" required id="newpass">
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" id="re_newpass" name="confirmpass" required>
                </div>

                <button type="submit" name="update_pass_btn" class="btn btn-primary btn-block">Simpan</button> 
              </form><br>
              <div class="text-center">
                <a class="btn-block" href="index.php" style="border: solid 1px; border-color: blue; padding: 5px; background-color: white; color: blue;">Batal</a>
              </div>
            </div>
            <?php
          }

          if(isset($_POST['update_pass_btn'])){
            $password_lama = $_POST['password_lama'];
            $password_baru = $_POST['password_baru'];
            $Konfirmasi = $_POST['confirmpass'];
            $username = $_SESSION['username'];
            if ($password_baru==$Konfirmasi) {
              if ($password_lama==$ini_pass) {
                $query = "UPDATE admin SET password = '$password_baru' WHERE username='$username'";
                $query_run = mysqli_query($connection, $query);
                if($query_run){
                  echo "<script>alert('Berhasil menyimpan data'); window.location='index.php';</script>";
                }
              }
              else{
                echo "<script>alert('Password lama tidak sesuai');window.location='passedit.php';</script>";
              }
            }
            else{
              echo "
              <div class='alert-danger'>Konfirmasi password tidak sama
              </div>";
            }

          }
          ?>
        </div>
      </div>



    </div>
  </div>
  <?php
  include('includes/footer.php');
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
