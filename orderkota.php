<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>WWA - Web Wisata Alam</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
   <!-- <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div> -->
    <!-- PHP -->

    <?php

    // Koneksi ke database
    require_once 'db_login.php'; 
    $db = new mysqli($db_host, $db_username, $db_password, $db_database) or die ("Could not connect to the database: <br />". $db->connect_error);

    // Query
    $qKategori = "SELECT * FROM kota ORDER BY id_kota";
    $rKategori = $db->query($qKategori) or die ("Could not query the database: <br />". $db->error);


    ?>


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav" style="padding-top: 15px">
                                <div class="text-center">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-5">
                                                <a href="index.php" class="original-logo"><img src="img/core-img/2019.png" alt=""></a>
                                            </div>
                                            <div style="padding-right: 50px"><a href="support.php">Support Us</a></div>
                                            <div><a href="#contact">Contact Us</a></div>
                                        </div>
                                    </div>
                                    <div class="container" style="padding-left: 100px; padding-top: 5px;">
                                        <div class="row align-items-center">
                                            <?php
                                            $qKota = "SELECT * FROM kota ORDER BY id_kota";
                                            $rKota = $db->query($qKota) or die ("Could not query the database: <br />". $db->error);
                                            while($tampilGrid = $rKota->fetch_object()){
                                            echo '
                                            <ul>
                                                <li><a href="orderkota.php?id_kota='.$tampilGrid->id_kota.'" >'.$tampilGrid->nama_kota.'</a></li>
                                            </ul>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Form  -->
                            <div id="search-wrapper" align="right">
                                <form class="form-inline" method="GET" action="p_grid.php">
                                    <input type="text" id="search" name="search" placeholder="Search something...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->

<br><br>
<?php
//tampil grid dari kategori
$id_kota = $_GET['id_kota'];
$qGrid = "SELECT * FROM artikel WHERE id_kota='$id_kota' ORDER BY id_artikel";
$rGrid = $db->query($qGrid) or die ("Could not query the database: <br />". $db->error);
echo '<div class="row mt-7" id="grid" style="padding-left: 250px; padding-top: 20px;">';
    while($tampilGrid = $rGrid->fetch_object()){
    echo '<div ><a href="single-post.php?id_artikel='.$tampilGrid->id_artikel.'"><ul style="padding-right: 25px;">
      <li><img src="tubes/images/'.$tampilGrid->gambar1.'"  width="300" height="250"></li>
      <li class="text-center" style="padding-top:5px; padding-bottom:15px;">'.$tampilGrid->nama.'</li></div>';
  }
echo '</div>';
?>

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area text-center" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Footer Nav Area -->
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; WWA 2019</span>
              </div>
              <hr>
              <div class="copyright text-center my-auto">
                  email : pplwwa2019@gmail.com
              </div>
              <!-- Footer Social Area -->

          </div>
      </div>
  </div>


</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

</body>

</html>