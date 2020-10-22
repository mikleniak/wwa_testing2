<?php
$koneksi = mysqli_connect("localhost","root","","wwa");


// -------- ARTIKEL ------
if(isset($_POST['artikel_btn']))
{
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$deskripsi = $_POST['deskripsi'];
	$link = $_POST['link'];
	$jumlah = count($_FILES['gambar']['name']);
	if ($jumlah > 0) {
		$gambar = array();
		for ($i=0; $i < $jumlah; $i++) { 
			$file_name = $_FILES['gambar']['name'][$i];
			$cek_gambar=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM artikel WHERE gambar1='$file_name' OR gambar2='$file_name' OR gambar3='$file_name' OR gambar4='$file_name'"));
			if ($cek_gambar > 0) {
				echo "<script>alert('Gambar sudah ada'); window.location='index.php';</script>";
			}
			$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
			move_uploaded_file($tmp_name, "images/".$file_name);
			$gambar[$i] = $file_name; 	
		}
	}
	$kota = $_POST['id_kota'];
	$admin = $_POST['admin'];
	$query_admin = "SELECT id_admin FROM admin WHERE nama_lengkap = '$admin'";
	$admin_run = mysqli_query($koneksi, $query_admin);
	$id_admin = mysqli_fetch_assoc($admin_run);
	$ini_admin = $id_admin['id_admin'];
	// $gambar1 = $_FILES['gambar1']['name'];

	$cek_judul=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM artikel WHERE nama='$nama'"));
	if ($cek_judul > 0) {
		echo "<script>alert('Artikel sudah tersedia'); window.location='index.php';</script>";
	}
	else {
		$query = "INSERT INTO artikel VALUES ('', '$nama', '$alamat', '$deskripsi', '$link', '$kota', '$ini_admin', '$gambar[0]', '$gambar[1]', '$gambar[2]', '$gambar[3]')";
		$query_run = mysqli_query($koneksi, $query);

		if($query_run)
		{
			echo "<script>alert('Berhasil menyimpan data'); window.location='index.php';</script>";
		}
		else
		{
			echo "<script>alert('Data gagal disimpan'); window.location='index.php';</script>";
		}
	}
}

if(isset($_POST['update_artikel_btn']))
{
	$id_artikel = $_POST['edit_id_artikel'];
	$nama = $_POST['edit_nama'];
	$alamat = $_POST['edit_alamat'];
	$deskripsi = $_POST['edit_deskripsi'];
	$link = $_POST['edit_link'];
	$jumlah = count($_FILES['edit_gambar']['name']);
	if ($jumlah > 0) {
		$edit_gambar = array();
		for ($i=0; $i < $jumlah; $i++) { 
			$file_name = $_FILES['edit_gambar']['name'][$i];
			$cek_gambar=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM artikel WHERE gambar1='$file_name' OR gambar2='$file_name' OR gambar3='$file_name' OR gambar4='$file_name'"));
			if ($cek_gambar > 0) {
				echo "<script>alert('Gambar sudah ada'); window.location='index.php';</script>";
			}
			$tmp_name = $_FILES['edit_gambar']['tmp_name'][$i];				
			move_uploaded_file($tmp_name, "images/".$file_name);
			$edit_gambar[$i] = $file_name; 	
		}
	}
	$kota = $_POST['edit_id_kota'];
	$admin = $_POST['edit_admin'];
	$query_admin = "SELECT id_admin FROM admin WHERE username = '$admin'";
	$admin_run = mysqli_query($koneksi, $query_admin);
	$id_admin = mysqli_fetch_assoc($admin_run);
	$ini_admin = $id_admin['id_admin'];
	// $gambar1 = $_FILES['gambar1']['name'];

	$cek_judul=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM artikel WHERE nama='$edit_nama'"));
	if ($cek_judul > 0) {
		echo "<script>alert('Artikel sudah tersedia'); window.location='index.php';</script>";
	}
	else{
		$query = "UPDATE artikel SET id_artikel='$id_artikel', nama='$nama', alamat='$alamat', deskripsi='$deskripsi', link='$link', id_kota='$kota', id_admin='$ini_admin', gambar1='$edit_gambar[0]', gambar2='$edit_gambar[1]', gambar3='$edit_gambar[2]', gambar4='$edit_gambar[3]' WHERE id_artikel='$id_artikel' ";
		$query_run = mysqli_query($koneksi, $query);

		if($query_run)
		{
			echo "<script>alert('Berhasil menyimpan data'); window.location='index.php';</script>";
		}
		else
		{
			echo "<script>alert('Data gagal disimpan'); window.location='index.php';</script>";
		}
	}
}


// -------- KOTA ------------
if(isset($_POST['update_kota_btn']))
{
	$id_kota = $_POST['edit_id_kota'];
	$nama = $_POST['edit_nama_kota'];

	$cek_kota=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kota WHERE nama_kota='$nama'"));
	if ($cek_kota > 0) {
		echo "<script>alert('Kota sudah ada'); window.location='CRUDKota3.php';</script>";
	}
	else{
		$query = "UPDATE kota SET id_kota='$id_kota', nama_kota='$nama'WHERE id_kota='$id_kota' ";
		$query_run = mysqli_query($koneksi, $query);

		if($query_run)
		{
			echo "<script>alert('Berhasil menyimpan data'); window.location='CRUDKota3.php';</script>";
		}
		else
		{
			echo "<script>alert('Data gagal disimpan'); window.location='CRUDKota3.php';</script>";
		}
	}
	
}


if(isset($_POST['kota_btn']))
{
	$nama = $_POST['nama'];

	$cek_kota=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kota WHERE nama_kota='$nama'"));
	if ($cek_kota > 0) {
		echo "<script>alert('Kota sudah ada'); window.location='CRUDKotaTambah.php';</script>";
	}
	else{
		$query = "INSERT INTO kota VALUES ('', '$nama')";
		$query_run = mysqli_query($koneksi, $query);

		if($query_run)
		{
			echo "<script>alert('Berhasil menyimpan data'); window.location='CRUDKota3.php';</script>";
		}
		else
		{
			echo "<script>alert('Data gagal disimpan'); window.location='CRUDKota3';</script>";
		}
	}

}

// ----------- KOMENTAR -------
if(isset($_POST['delete_komentar_btn']))
{
	$id_komentar = $_POST['delete_komentar'];

	$query = "DELETE FROM komentar WHERE id_komentar='$id_komentar' ";
	$query_run = mysqli_query($koneksi, $query);

	if($query_run)
	{
		echo "<script>alert('Berhasil menghapus komentar'); window.location='CRUDKomentar.php';</script>";
	}
	else
	{
		echo "<script>alert('Komentar gagal dihapus'); window.location='CRUDKomentar.php';</script>";
	}
}

//-------------- REKOMENDASI -------------
if(isset($_POST['delete_rekomen_btn']))
{
	$id_rekomen = $_POST['delete_rekomen'];

	$query = "DELETE FROM rekomendasi WHERE id_rekomen='$id_rekomen' ";
	$query_run = mysqli_query($koneksi, $query);

	if($query_run)
	{
		echo "<script>alert('Berhasil menghapus data'); window.location='CRUDRekomen.php';</script>";
	}
	else
	{
		echo "<script>alert('Data gagal dihapus'); window.location='CRUDRekomen.php';</script>";
	}
}

//---------------- ADMIN -----------------
if(isset($_POST['delete_admin_btn']))
{
	$id_admin = $_POST['delete_admin'];

	$query = "DELETE FROM admin WHERE id_admin='$id_admin' ";
	$query_run = mysqli_query($koneksi, $query);

	if($query_run)
	{
		echo "<script>alert('Berhasil menghapus data'); window.location='CRUDAdmin.php';</script>";
	}
	else
	{
		echo "<script>alert('Data gagal dihapus'); window.location='CRUDAdmin.php';</script>";
	}
}

if(isset($_POST['admin_btn']))
{
	$nama = $_POST['nama'];
	$email = $_POST['email'];

	function acakangkahuruf($panjang)
	{
		$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}
	$username = acakangkahuruf(5);
	$password = acakangkahuruf(7);

	$query = "INSERT INTO admin VALUES ('', '$username', '$nama', '$email','$password')";
	$query_run = mysqli_query($koneksi, $query);

	if($query_run)
	{
		echo "<script>alert('Berhasil menyimpan data. Username=$username, Password=$password'); window.location='CRUDAdmin.php';</script>";
	}
	else
	{
		echo "<script>alert('Data gagal disimpan'); window.location='CRUDAdmin.php';</script>";
	}
}

if(isset($_POST['update_admin_btn']))
{
	$id_admin = $_POST['edit_id_admin'];
	$username = $_POST['username'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];

	$cek_admin=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'"));
	if ($cek_admin > 0) {
		echo "<script>alert('Username sudah terpakai'); window.location='SettingProfil.php';</script>";
	}
	else{
		$query = "UPDATE admin SET id_admin='$id_admin', username='$username', nama_lengkap='$nama_lengkap', email='$email' WHERE id_admin='$id_admin' ";
		$query_run = mysqli_query($koneksi, $query);

		if($query_run)
		{
			echo "<script>alert('Berhasil mengubah profil'); window.location='index.php';</script>";
		}
		else
		{
			echo "<script>alert('Data gagal disimpan'); window.location='SettingProfil.php';</script>";
		}
	}
	
}
?>