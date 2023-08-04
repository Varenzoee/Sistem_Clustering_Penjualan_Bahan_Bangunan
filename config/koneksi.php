<?php

$myhost = "localhost";
$myuser = "root";
$mypass = "";
$myDbs = "sistem_clustering_penjualan";

$koneksi = mysqli_connect($myhost, $myuser, $mypass, $myDbs);
    
// Check connection
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
