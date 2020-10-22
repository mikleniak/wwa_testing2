<?php 

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$sql = "SELECT * FROM admin WHERE (username='$username' and password='$password')";
$login = mysqli_query($connect,$sql);
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	$_SESSION['username'] = $data['nama_lengkap'];
	header("location:index.php");

}else{

		// alihkan ke halaman login kembali
	header("location:login.php?pesan=gagal");
	set_message('<div class="alert alert-warning" role="alert"><p>username dan password tidak sesuai! </p></div>');
}

?>