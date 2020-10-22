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
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Kota</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
        Data Kota</div>
        <div class="card-body">
          <div class="table-responsive">
            <a href="CRUDKotaTambah.php" class="btn btn-info">Tambah Kota</a><br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                <th class="text-center">Id Kota</th>
                <th class="text-center">Nama Kota</th>
                <th class="text-center">Action</th>   
              </tr>
            </thead>
            <tbody>
              <?php
    // Load file koneksi.php
              include "koneksi.php"; 
    $query = "SELECT * FROM kota"; // Query untuk menampilkan semua data siswa
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query 
    while($data = mysqli_fetch_array($sql)){ 
      ?>
      <tr>
        <td class="text-center"><?php echo $data['id_kota'];?></td>
        <td class="text-center"><?php echo $data['nama_kota'];?></td>
        <td>
          <div class="text-center">
            <form action="CRUDKotaEdit.php" method="POST"> 
              <input type="hidden" name="edit_kota" value="<?php echo $data['id_kota']?>">
              <button type="submit" name="edit_kota_btn" class="btn btn-warning"><i class="fas fa-edit"></i></button>
              <input type="hidden" name="delete_kota" value="<?php echo $data['id_kota']?>">
              <button type="submit" name="delete_kota_btn" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
