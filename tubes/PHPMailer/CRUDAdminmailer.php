<?php 
include('../includes/header.php');
session_start();
if (!isset($_SESSION['username'])){
header("Location:../login.php");
}

include('../includes/navbar.php');
?>

<div id="wrapper">
  <!-- Sidebar -->
  <?php
  include('../includes/sidebar.php');
  ?>


  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
        Data Admin</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                <th class="text-center">Id Admin</th>
                <th class="text-center">Nama Lengkap</th>
                <th class="text-center">Username</th>
                <th class="text-center">Email</th>
                <th class="text-center">Action</th>   
              </tr>
            </thead>
            <tbody>
              <?php
    // Load file koneksi.php
              include "../koneksi.php"; 
    $query = "SELECT * FROM admin"; // Query untuk menampilkan semua data siswa
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query 
    while($data = mysqli_fetch_array($sql)){ 
      ?>
      <tr>
        <td><?php echo $data['id_admin'];?></td>
        <td><?php echo $data['nama_lengkap'];?></td>
        <td><?php echo $data['username'];?></td>
        <td><?php echo $data['email'];?></td>
        <td>
          <div class="text-center">
            <form action="code.php" method="POST"> 
              <input type="hidden" name="delete_admin" value="<?php echo $data['id_artikel']?>">
              <button type="submit" name="delete_admin_btn" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>
          </div>
        </td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>



</div>
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Tugas Besar Web Dinamis 2019</span>
    </div>
  </div>
</footer>
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

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
