<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
include "../config/session_manager.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Static Navigation - SB Admin</title>
	<link href="../css/styles.css" rel="stylesheet" />
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<h3 class="navbar-brand ps-3">UD SUMBER BANGUNAN</h3>
		<!-- Navbar-->
		<ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

					<li><a class="dropdown-item" onclick="if(confirm('Apakah anda yakin ingin Logout?')){ location.href='../logout.php ?>' }">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<br>
						<a class="nav-link" href="home">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<a class="nav-link" href="semua-data.html">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Data
						</a>
						<a class="nav-link collapsed" href="hasil.html">
							<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
							Olah Data
						</a>
						<a class="nav-link collapsed" onclick="if(confirm('Apakah anda yakin ingin Logout?')){ location.href='../logout.php ?>' }">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Logout
						</a>
					</div>
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<center>
						<h3 class="my-4">SISTEM CLUSTERING PENJUALAN BAHAN BANGUNAN</h3>
					</center>

					<div class="card mb-4">
						<div class="card-body">
							<?php include "content.php"; ?>
						</div>
					</div>
				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2023</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="../js/scripts.js"></script>
</body>

</html>