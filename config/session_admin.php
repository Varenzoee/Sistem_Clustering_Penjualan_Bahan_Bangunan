<?php
session_start();
if($_SESSION['namauser']==''){
		echo "<script>window.alert('Untuk mengakses, Anda harus Login Terlebih Dahulu');
        window.location=('../home')</script>";
}
?>