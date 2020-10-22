<?php 
include('includes/header.php');
session_start();
if (!isset($_SESSION['username'])){
  header("Location:login.php");
}

include('includes/navbar.php');

function textShorten($text, $limit){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text."...";
  return $text;
}
?>

<div id="wrapper">
  <!-- Sidebar -->
  <?php
  include('includes/sidebar.php');
  ?>
  <div id="content-wrapper">
    <div class="container">
      <div class="row" >
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl mb-4">
            <a href="CRUDRekomen.php">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-info text-uppercase mb-2">Rekomendasi</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800">
                       <?php 
                       $connection = mysqli_connect("localhost","root","","wwa");

                       $query = "SELECT id_rekomen FROM rekomendasi ORDER BY id_rekomen";
                       $query_run = mysqli_query($connection, $query);

                       $row = mysqli_num_rows($query_run);
                       echo '<h3> Total : '.$row.'</h3>';
                       ?>
                     </div>
                   </div>
                   <div class="col-auto">
                    <i class="far fa-lightbulb fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div></a>
          </div>
        </div>

        <div id="content-wrapper">
          <div class="container">
            <div class="row" >
              <div class="col-xl mb-12">
                <div class="modal fade" id="add_artikel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Artikel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                          <div class="form-group">
                            <label>Judul Artikel</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Judul Artikel" required>
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                          </div>
                          <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required></textarea>
                          </div>
                          <div class='alert-warning'>
                            <p style="padding-top, padding-left, padding-right: 15px; padding-bottom: 5px;">Copy alamat ke <a href="https://www.google.com/maps/@-7.0661462,110.4381255,15z" target="_blank">Google Maps</a>, copy link untuk i-frame Google Maps dan paste di bawah</p>
                          </div>
                          <div class="form-group">
                            <label>Link Maps</label>
                            <textarea name="link" class="form-control" placeholder="Masukkan Link untuk i-frame Google Maps" required></textarea>
                          </div>
                          <?php 
                          $kota = "SELECT * FROM kota";
                          $kota_run = mysqli_query($connection, $kota); 

                          if(mysqli_num_rows($kota_run) > 0)
                          {
                            ?>
                            <div class="form-group">
                              <label>Nama Kota</label>
                              <select name="id_kota" class="form-control" required>
                                <option value="none">--Pilih Kota--</option>
                                <?php 
                                foreach ($kota_run as $row) 
                                {
                                  ?> 
                                  <option value="<?php echo $row['id_kota']; ?> "><?php echo $row['nama_kota']; ?></option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                            <?php
                          }
                          else{
                            echo "No Data Available";
                          }             
                          ?>
                          <div class="form-group">
                            <label>Uploaded by</label>
                            <input type="text" name="admin" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Gambar (Harus 4 Gambar)</label>
                            <input type="file" name="gambar[]" multiple required>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="artikel_btn" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- DataTables Example -->
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-table"></i>
                  Data Artikel</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <div class='alert-warning'>
                        <p style="padding-top, padding-left, padding-right: 15px; padding-bottom: 5px;">Sebelum menambahkan artikel baru, pastikan artikel tersebut belum pernah dibuat sebelumnya</p>
                      </div>
                      <button data-toggle="modal" data-target="#add_artikel" class="btn btn-info">Tambah Artikel</button><br><br>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                         <tr>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Deskripsi</th>
                          <th class="text-center">Kota</th>
                          <th class="text-center">Uploaded by</th>
                          <th class="text-center">Action</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <?php
    // Load file koneksi.php
                        include "koneksi.php"; 
                        $query = "SELECT a.id_artikel as id_artikel, a.nama as nama, a.alamat as alamat, a.deskripsi as deskripsi, a.gambar1 as gambar1, a.gambar2 as gambar2, a.gambar3 as gambar3, a.gambar4 as gambar4, b.nama_kota as nama_kota,d.nama_lengkap as admin FROM artikel a JOIN kota b ON (a.id_kota=b.id_kota)  JOIN admin d ON (a.id_admin=d.id_admin)";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query 
    while($data = mysqli_fetch_array($sql)){ 
      ?>
      <tr>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo textShorten($data['deskripsi'], 30);?></td>
        <td><?php echo $data['nama_kota'];?></td>
        <td><?php echo $data['admin'];?></td>
        <td> 
          <div class="text-center">         
            <form action="CRUDArtikelEdit.php" method="POST"> 
              <a href="artikel.php?id_artikel=<?php echo $data['id_artikel']; ?>" class="btn btn-success"><i class="fas fa-arrow-right"></i></a>
              <input type="hidden" name="edit_artikel" value="<?php echo $data['id_artikel']?>">
              <button type="submit" name="edit_artikel_btn" class="btn btn-warning"><i class="fas fa-edit"></i></button>
              <input type="hidden" name="delete_artikel" value="<?php echo $data['id_artikel']?>">
              <button type="submit" name="delete_artikel_btn" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
