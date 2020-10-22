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
        

        <!-- Logo Area -->
        

        <!-- Nav Area -->
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
                            <div class="classynav">
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
                                    <div class="container " style="padding-left: 100px; padding-top: 5px;">
                                        <div class="row  align-items-center">
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

    <!-- ##### Single Blog Area Start ##### -->



    <!-- Single Blog Area  -->
    <?php
    $id_artikel = $_GET['id_artikel'];
    $qDetail = "SELECT * FROM artikel WHERE id_artikel=".$id_artikel;
    $rDetail = $db->query($qDetail) or die ("Could not query the database: <br />". $db->error);
    while($tampilDetail = $rDetail->fetch_object()){
        echo '
        <div class="container" style="padding-left: 50px; padding-right: 50px;">
        <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="row mt-4>
        <div class="hero-slides owl-carousel">
        <!-- Single Slide -->
        <div class="row mt-5" style="padding-right: 50px;">
        <img src="tubes/images/'.$tampilDetail->gambar1.'"  width="500" height="500">
        </div>
        <div class="row mt-5">
        <img src="tubes/images/'.$tampilDetail->gambar2.'"  width="500" height="500">
        </div>
        <div class="row mt-4" id="grid" style="padding-right: 50px;">
        <img src="tubes/images/'.$tampilDetail->gambar3.'"  width="500" height="500" >
        </div>
        <div class="row mt-4">
        <img src="tubes/images/'.$tampilDetail->gambar4.'"  width="500" height="500">
        </div>
        </div>
        </div>
        <div class="row mt-4" id="grid">
        <div class="col-">
        <h2>'.$tampilDetail->nama.'</h2>
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
        <div class="row mr-1" id="grid">
        <div class="col-">
        <iframe src="'.$tampilDetail->link.'"  width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        
        </div>
        </div>
        
        </div>';
    }
    ?>



    <!--  -->

    <!-- ##### Single Blog Area End ##### -->

    
    <!-- ##### Single Komentar Area End ##### -->



    <!-- ##### Instagram Feed Area End ##### -->

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