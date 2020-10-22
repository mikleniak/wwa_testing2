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
									<div class="container h-100">
										<div class="row h-100 align-items-center">
											<div class="col-5">
												<a href="index.php" class="original-logo"><img src="img/core-img/2019.png" alt=""></a>
											</div>
											<div style="padding-right: 50px"><a href="#">Support Us</a></div>
											<div><a href="#contact">Contact Us</a></div>
										</div>
									</div>
									<div class="container h-100" style="padding-left: 100px; padding-top: 5px;">
                                        <div class="row h-100 align-items-center">
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
	</header><br>
	<!-- ##### Header Area End ##### -->

	<!-- ##### Single Blog Area Start ##### -->



	<!-- Single Blog Area  -->
	<div class="container-fluid" style="padding-right: 150px; padding-left: 200px;">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="form-group">
					<label style="font-weight: bold;">Haloo.. Kamu pengen tempat wisata di daerahmu dimuat di artikel ini juga ?<br>Yuk, beri tahu kami tempat wisata daerah mu :)</label>
				</div>
				<div class="form-group">
					<label>Rekomendasi Oleh *</label>
					<input type="text" name="perekomendasi" class="form-control" placeholder="Masukkan Nama Anda" required>
				</div>
				<div class="form-group">
					<label>Nama Wisata *</label>
					<input type="text" name="nama_wisata" class="form-control" placeholder="Masukkan Nama Wisata" required>
				</div>
				<div class="form-group">
					<label>Alamat *</label>
					<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Wisata" required>
				</div>
				<div class="form-group">
					<label>Deskripsi *</label>
					<textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Tempat Wisata" required></textarea> 
				</div>
				<div class="form-group">
					<label> Tambahkan Gambar (Optional, Maksimal 4 gambar)</label><br>
					<input type="file" name="gambar[]" multiple>
				</div>
				<button type="submit" name="rekomendasi_btn" class="btn btn-primary">Kirim</button>

			</div>

		</form>
		<!-- /.container -->
		<?php
		if(isset($_POST['rekomendasi_btn']))
		{
			$perekomendasi = $_POST['perekomendasi'];
			$nama_wisata = $_POST['nama_wisata'];
			$alamat = $_POST['alamat'];
			$deskripsi = $_POST['deskripsi'];
			$jumlah = count($_FILES['gambar']['name']);
			if ($jumlah > 0) {
				$gambar = array();
				for ($i=0; $i < $jumlah; $i++) { 
					$file_name = $_FILES['gambar']['name'][$i];
					$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
					move_uploaded_file($tmp_name, "img/".$file_name);
					$gambar[$i] = $file_name; 								
				}
			}
	// $gambar1 = $_FILES['gambar1']['name'];

			$query = "INSERT INTO rekomendasi VALUES ('', '$perekomendasi', '$nama_wisata', '$alamat', '$deskripsi', '$gambar[0]', '$gambar[1]', '$gambar[2]', '$gambar[3]')";
			$query_run = mysqli_query($db, $query);

	// if($query_run)
	// {
	// 	$_SESSION['success'] = "Berhasil menambahkan data.";
	// }
	// else
	// {
	// 	$_SESSION['status'] = "Gagal menambahkan data.";
	// }
			if($query_run)
			{
				echo "<script>alert('Berhasil menyimpan data. Terima kasih atas rekomendasinya :)')</script>";
			}
			else
			{
				echo "<script>alert('Maaf, data gagal disimpan. Ulangi lagi ya :('</script>";
			}
		}
		?>
	</div>
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