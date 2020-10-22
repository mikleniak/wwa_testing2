<?php
include('../includes/header.php');
?>

<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">
		<?php include('../includes/navbar.php');?>

		<!-- Begin Page Content -->
		<div class="container-fluid" style="padding-right: 150px; padding-left: 75px;">
			
			<form action="kirimemail.php" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label style="font-weight: bold;">Masukkan email calon Admin baru</label>
						<input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
					</div>
					
					<button type="submit" name="email_btn" class="btn btn-primary">Kirim</button>

				</div>

			</form>
			<!-- /.container -->
		</div>
	</div>
</div>
</div>
<?php
include('../includes/footer.php');
?>