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
        <li class="breadcrumb-item active">Komentar</li>
      </ol>
      <!-- DataTables Example -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
        Data Komentar</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                <th class="text-center">Id Komentar</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Level</th>
                <th class="text-center">Komentar</th>
                <th class="text-center">Artikel</th>
                <th class="text-center">Action</th>       
              </tr>
            </thead>
            <tbody>
              <?php
    // Load file koneksi.php
              include "koneksi.php"; 
    $query = "SELECT k.id_komentar as id_komentar, k.nama as nama, k.level as level, k.isi as isi, a.nama as artikel FROM komentar k JOIN artikel a ON (k.id_artikel=a.id_artikel)"; // Query untuk menampilkan semua data siswa
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query 
    while($data = mysqli_fetch_array($sql)){ 
      ?>
      <tr>
        <td><?php echo $data['id_komentar'];?></td>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo $data['level'];?></td>
        <td><?php echo $data['isi'];?></td>
        <td><?php echo $data['artikel'];?></td>      
        <td>
          <div class="text-center">
            <form action="code.php" method="POST"> 
              <input type="hidden" name="balas_komentar" value="<?php echo $data['id_komentar']?>">
              <button type="submit" name="balas_komentar_btn" class="btn btn-warning"><i class="fas fa-reply"></i></button> <!-- ini yang pasti -->
              <input type="hidden" name="delete_komentar" value="<?php echo $data['id_komentar']?>">
              <button type="submit" name="delete_komentar_btn" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
