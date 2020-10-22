<?php 
include('includes/header.php');
session_start();
if (!isset($_SESSION['username'])){
  header("Location:login.php");
}
$koneksi = mysqli_connect("localhost","root","","wwa");
?>
<style type="text/css">
  .grid_1_of_4{
    display: block;
    float:left;
    margin: 1% 0 1% 1.6%;
    box-shadow: 0px 0px 3px rgb(150, 150, 150);
    height: 500px;
  }
  .images_1_of_4 {
    width: 40%;
    padding:1.5%;
    text-align:center;
    position:relative; 
  }
  .images_1_of_4  img{
    height: 200px;
    max-width:100%;
  }
</style>
<?php
include('includes/navbar.php');
?>

<div id="wrapper">
  <!-- Sidebar -->
  <?php
  include('includes/sidebar.php');
  ?>


  <div id="content-wrapper">
    <div id="container">
      <div class="container-fluid">
        <?php
        $id_rekomen = $_GET['id_rekomen'];
        $qDetail = "SELECT * FROM rekomendasi WHERE id_rekomen=".$id_rekomen;
        $rDetail = $koneksi->query($qDetail) or die ("Could not query the database: <br />". $koneksi->error);
        while($tampilDetail = $rDetail->fetch_object()){
          if (($tampilDetail->gambar1 != "") OR ($tampilDetail->gambar2 != "") OR ($tampilDetail->gambar3 != "") OR ($tampilDetail->gambar4 != "")){
           echo '
           <div class="container" style="padding-left: 50px; padding-right: 50px;">
           <div class="hero-area">
           <!-- Hero Slides Area -->
           <div class="row mt-4>
           <div class="hero-slides owl-carousel">
           <!-- Single Slide -->
           <div class="row mt-5" style="padding-right: 50px;">
           <img src="../img/'.$tampilDetail->gambar1.'"  width="400" height="400">
           </div>
           <div class="row mt-5">
           <img src="../img/'.$tampilDetail->gambar2.'"  width="400" height="400">
           </div>
           <div class="row mt-4" id="grid" style="padding-right: 50px;">
           <img src="../img/'.$tampilDetail->gambar3.'"  width="400" height="400" >
           </div>
           <div class="row mt-4">
           <img src="../img/'.$tampilDetail->gambar4.'"  width="400" height="400">
           </div>
           </div>
           </div>
           <div class="row mt-4" id="grid">
           <div class="col-">
           <p>Direkomendasi oleh <strong>'.$tampilDetail->pengirim.'</strong></p>
           </div>
           </div>
           <div class="row mr-1" id="grid">
           <div class="col-">
           <p>Wisata : '.$tampilDetail->nama_wisata.'</p>
           </div>
           </div>
           <div class="row mr-1" id="grid">
           <div class="col-">
           <p>Alamat : '.$tampilDetail->alamat.'</p>
           </div>
           </div>
           <div class="row mr-1" id="grid">
           <div class="col-">
           <p  style="text-align:justify">'.$tampilDetail->deskripsi.'</p>
           </div>
           </div>
           

           </div>'; 
         }
         
       }
       ?>
     </div>
   </div>
 </div><br><br>
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
