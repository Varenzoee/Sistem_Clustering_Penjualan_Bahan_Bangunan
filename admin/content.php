<?php
include "../config/session_admin.php";
if ($_GET['module'] == 'home') {
	include "panduan_penggunaan.php";
} elseif ($_GET['module'] == 'hasil') {
	include "hasil.php";
} elseif ($_GET['module'] == 'hapusdata') {
	$koneksi->query("TRUNCATE objek");
	echo "<script>window.alert('Sukses Menghapus Semua Data Objek');
			window.location=('semua-data.html')</script>";
} elseif ($_GET['module'] == 'semuadata') {
	include "data.php";
} elseif ($_GET['module'] == 'transformasidata') {
	include "transformasi_data.php";
} elseif ($_GET['module'] == 'kirimcentroid') {
	include "kirimcentroid.php";
} elseif ($_GET['module'] == 'profile') {
	echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;'></div>
		<p>Data mining adalah suatu metode pengolahan data untuk menemukan pola
		yang tersembunyi dari data tersebut. Hasil dari pengolahan data dengan metode data
		mining ini dapat digunakan untuk mengambil keputusan di masa depan. Data mining
		ini juga dikenal dengan istilah pattern recognition (Santosa, 2007).
		Data mining merupakan metode pengolahan data berskala besar oleh karena
		itu data mining ini memiliki peranan penting dalam bidang industri, keuangan, cuaca,
		ilmu dan teknologi. Secara umum kajian data mining membahas metode-metode
		seperti, clustering, klasifikasi, regresi, seleksi variable, dan market basket analisis
		(Santosa, 2007).</p>

		<p>Pada dasarnya clustering merupakan suatu metode untuk mencari dan
		mengelompokkan data yang memiliki kemiripan karakteriktik (similarity) antara satu
		data dengan data yang lain. Clustering merupakan salah satu metode data mining
		yang bersifat tanpa arahan (unsupervised), maksudnya metode ini diterapkan tanpa
		adanya latihan (taining) dan tanpa ada guru (teacher) serta tidak memerlukan target
		output. Dalam data mining ada dua jenis metode clustering yang digunakan dalam
		pengelompokan data, yaitu hierarchical clustering dan non-hierarchical clustering
		(Santosa, 2007).</p>

		<p>Hierarchical clustering adalah suatu metode pengelompokan data yang
		dimulai dengan mengelompokkan dua atau lebih objek yang memiliki kesamaan
		paling dekat. Kemudian proses diteruskan ke objek lain yang memiliki kedekatan
		kedua. Demikian seterusnya sehingga cluster akan membentuk semacam pohon
		dimana ada hierarki (tingkatan) yang jelas antar objek, dari yang paling mirip sampai
		yang paling tidak mirip. Secara logika semua objek pada akhirnya hanya akan
		membentuk sebuah cluster. Dendogram biasanya digunakan untuk membantu
		memperjelas proses hierarki tersebut (Santoso, 2010).</p>

		<p>Berbeda dengan metode hierarchical clustering, metode non-hierarchical
		clustering justru dimulai dengan menentukan terlebih dahulu jumlah cluster yang
		diinginkan (dua cluster, tiga cluster, atau lain sebagainya). Setelah jumlah cluster
		diketahui, baru proses cluster dilakukan tanpa mengikuti proses hierarki. Metode ini
		biasa disebut dengan K-Means Clustering (Santoso, 2010).</p>

		<p>K-means clustering merupakan salah satu metode data clustering non-hirarki
		yang mengelompokan data dalam bentuk satu atau lebih cluster/kelompok. Data-data
		yang memiliki karakteristik yang sama dikelompokan dalam satu cluster/kelompok
		dan data yang memiliki karakteristik yang berbeda dikelompokan dengan
		cluster/kelompok yang lain sehingga data yang berada dalam satu cluster/kelompok
		memiliki tingkat variasi yang kecil (Agusta, 2007).</p>";
} elseif ($_GET['module'] == 'prosesexcel') {
	include "proses_excel.php";
}
