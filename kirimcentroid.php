<?php
require './config/koneksi.php';

if (isset($_POST)) {
    $centroid = $_POST;
    // print_r($centroid);
    // $hasil = array_map(function ($item) {
    //     // $val = explode($item, ',');
    //     // print_r($item);
    //     return $item[0];
    // }, $centroid);
    $centroid_0 = $centroid['centroid_0'];
    $centroid_1 = $centroid['centroid_1'];
    // $centroid_2 = $centroid['centroid_2'];
    // print_r(gettype($centroid_0));
    $hapus_data = $koneksi->query("TRUNCATE TABLE centroid");
    $simpan = $koneksi->query("INSERT INTO centroid (data_centroid) VALUES ('$centroid_0'),('$centroid_1')");
    header('Location: admin/hasil.html');
    die('');
}

die('no');
