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
        $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $row) {
              ?>
        <div class="card-body">
          <form method="post" action="code.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Id Admin</label>
                <input type="text" name="edit_id_admin" value="<?php echo $row['id_admin'] ?>" class="form-control" required readonly>
              </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" required="required" value="<?php echo $row['username']; ?>" >
            </div>
            <div class="form-group">
              <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required="required" value="<?php echo $row['nama_lengkap']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Email</label>
                <input type="email" name="email" class="form-control" required="required" value="<?php echo $row['email']; ?>" readonly>
            </div>
            
            <button type="submit" name="update_admin_btn" class="btn btn-primary btn-block">Simpan</button> 
              </form><br>
              <div class="text-center">
                <a class="btn-block" href="index.php" style="border: solid 1px; border-color: blue; padding: 5px; background-color: white; color: blue;">Batal</a>
              </div>
        </div>
        <?php
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
