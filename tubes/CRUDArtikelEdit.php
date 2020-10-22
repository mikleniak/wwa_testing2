<?php 
include('includes/header.php');
session_start();
if (!isset($_SESSION['username'])){
  header("Location:login.php");
}

include('includes/navbar.php');
?>

<!-- Main Content -->
<div id="wrapper">
  <?php include('includes/sidebar.php');?>
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-dark">Edit Artikel</h6>
        </div>
        <div class="card-body">
          <?php
          $connection = mysqli_connect("localhost", "root", "", "wwa");
          if(isset($_POST['edit_artikel_btn']))
          {
            $id_artikel = $_POST['edit_artikel'];
            $query = "SELECT * FROM artikel WHERE id_artikel='$id_artikel' ";
            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $rowedit) {
              ?>
              <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label>Id Artikel</label>
                  <input type="text" name="edit_id_artikel" value="<?php echo $rowedit['id_artikel'] ?>" class="form-control" required readonly>
                </div>

                <div class="form-group">
                  <label>Judul Artikel</label>
                  <input type="text" name="edit_nama" value="<?php echo $rowedit['nama'] ?>"class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="edit_alamat" value="<?php echo $rowedit['alamat'] ?>"class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" name="edit_deskripsi" value="<?php echo $rowedit['deskripsi'] ?>"class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Link Maps</label>
                  <input type="text" name="edit_link" value="<?php echo $rowedit['link'] ?>"class="form-control" readonly>
                </div>

                <?php 
                $kota = "SELECT * FROM kota";
                $kota_run = mysqli_query($connection, $kota); 

                if(mysqli_num_rows($kota_run) > 0)
                {
                  ?>
                  <div class="form-group">
                    <label>Kota</label>
                    <select name="edit_id_kota" class="form-control" required>
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
                  <input type="text" name="edit_admin" class="form-control" value="<?php echo $_SESSION['username']; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="edit_gambar[]" class="form-control-file" multiple required> <br/>
                </div>
                <button type="submit" name="update_artikel_btn" class="btn btn-primary btn-block">Simpan</button> 
              </form><br>
              <div class="text-center">
                <a class="btn-block" href="index.php" style="border: solid 1px; border-color: blue; padding: 5px; background-color: white; color: blue;">Batal</a>
              </div>
              <?php
            }
          }

          if(isset($_POST['delete_artikel_btn']))
          {
            $id_artikel = $_POST['delete_artikel'];

            $query = "DELETE FROM artikel WHERE id_artikel='$id_artikel' ";
            $query_run = mysqli_query($connection, $query);

            if($query_run)
            {
              echo "<script>alert('Berhasil menghapus data'); window.location='index.php';</script>";
            }
            else
            {
              echo "<script>alert('Data gagal dihapus'); window.location='index.php';</script>";
            }
          }
          ?>

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
