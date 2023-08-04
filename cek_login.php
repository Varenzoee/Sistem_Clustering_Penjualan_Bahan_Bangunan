<?php
error_reporting(0);
include "config/koneksi.php";
$username = $_POST['id_user'];
$pass=md5($_POST['password']);
// $level=$_POST['level'];
// if ($level=='admin')
{
$login=$koneksi -> query("SELECT * FROM petugas
			WHERE username='$username' AND password ='$pass'");
$cocok=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

if ($cocok > 0){
	session_start();
	$_SESSION['namauser']     = $r['username'];
  	$_SESSION['namalengkap']  = $r['nama_lengkap'];
  	$_SESSION['passuser']     = $r['password'];

	header('location:admin/home');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
        window.location=('index.php')</script>";
}
}
?>