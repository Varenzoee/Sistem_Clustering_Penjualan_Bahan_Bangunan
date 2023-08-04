<html>

<head>
	<style>
		table {
			border: 1px solid #000;
			text-align: center;
			font-family: tahoma;
			font-size: 12px;
		}

		table tr th {
			border: 1px solid #000;
			background: #cecece;
			color: #000;
			padding: 3px;
		}

		table tr td {
			border: 1px solid #000;
		}
	</style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

	<?php
	include "objek.php";
	include "ClusteringKMean.php";
	for ($i = 0; $i < count($_POST['objek']); $i++) {
		$obj = $_POST['objek'];
		$data = explode(",", $obj[$i]);
		for ($j = 0; $j < count($data); $j++) {
			$objek[$i][$j] = $data[$j];
		}
	}
	for ($i = 0; $i < count($_POST['cluster']); $i++) {
		$cls = $_POST['cluster'];
		$data = explode(",", $cls[$i]);
		for ($j = 0; $j < count($data); $j++) {
			$centroid[$i][$j] = $data[$j];
		}
	}

	//K-MEAN	   
	echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px;  margin-bottom:20px;'>Hasil Proses Clustering Algoritma K-Means++ Terhadap Data Penjualan Bahan Bangunan</div>";
	if (isset($_POST['tekan'])) {
		echo "<div style='width:100%; float:left;'>";
		$nama = $_POST['nama'];
		// var_dump($nama);
		$clustering = new ClusteringKMean($objek, $centroid, $nama);
		$clustering->setClusterObjek();
		echo "</div>";
	} else {
		echo "<center style='padding:50px; padding-bottom:20px; border: none; '>Maaf, Anda Belum Melakukan Proses Clustering Data.<br> Lakukan Proses Clustering Dengan Tombol DiBawah Ini</center>";
		// target="_BLANK"
		?>
		<form action="hasil.html" method="POST">
			<?php
			$querye = $koneksi->query("SELECT * FROM objek ORDER BY id_objek ASC");
			while ($r = mysqli_fetch_array($querye)) {
				echo "<INPUT type='hidden' size='40' name='objek[]' value='$r[data]'/>";
				echo "<INPUT type='hidden' size='40' name='nama[]' value='$r[nama_objek]'/>";
			}
			?>

			<?php
			$queryye = $koneksi->query("SELECT * FROM centroid ORDER BY id_centroid ASC");
			while ($r = mysqli_fetch_array($queryye)) {
				echo "<INPUT type='hidden' size='38' name='cluster[]' value='$r[data_centroid]'/>";
			}
			?>
			<?php
			error_reporting(0);
			include "../config/koneksi.php"; {
				$query = $koneksi->query("SELECT * FROM objek");
				$cocok = mysqli_num_rows($query);
				$r = mysqli_fetch_array($query);
			}
			?>
			<div class="d-grid gap-2 col-6 mx-auto">
				<center><button class="button-lakukan-clustering-sekarang btn btn-primary" name='tekan' type="submit" <?php if ($cocok < 1) { ?> style="pointer-events: none; background-color: #cccccc;" " disabled <?php } ?>>Lakukan Clustering</button></center>
					</div>
				</form>
			<?php
	}
	?>

</body>

</html>