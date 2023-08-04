<?php 
include './config/koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$nama_lengkap=$_POST['nama_lengkap'];
// $email=$_POST['email'];
// $no_telp=$_POST['no_telp'];

$cek_data = $koneksi -> query("select * from petugas where username='$username'");
$cek = mysqli_num_rows($cek_data);

if($cek <= 0)
	{
		$qry="INSERT into petugas values('$username', md5('$password'), '$nama_lengkap')";
		// $qry="INSERT into admin values('$username', md5('$password'), '$nama_lengkap', '$email', '$no_telp')";
		$insert=$koneksi->query($qry) or die ($koneksi -> error);
		if ($insert) {
			echo "<script>alert('Data Berhasil Di Tambahkan')
			location.replace('index.php')</script>";
		} else {
			echo "<script>alert('Data Gagal Di Tambahkan')
			location.replace('registrasi.php')</script>";
		}
	}
else
	{
	echo "<script>alert('Username sudah digunakan, silahkan gunakan username lain')
		location.replace('registrasi.php')</script>";
	}

// $qry="INSERT into admin values('$username', md5('$password'), '$nama_lengkap', '$email', '$no_telp')";
// $insert=$koneksi->query($qry) or die ($koneksi -> error);
// if ($insert) {
// 			echo "<script>alert('Data Berhasil Di Tambahkan')
// 			location.replace('index.php')</script>";
// 		} else {
// 			echo "<script>alert('Data Gagal Di Tambahkan')
// 			location.replace('registrasi.php')</script>";
// 		}

 ?>