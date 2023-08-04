<?php
  session_start();	
  error_reporting(0);
  include "../config/koneksi.php";
  include "../config/session_manager.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistem Penentuan Prioritas Pelayanan Kesehatan Peserta Posyandu Lansia</title>
<link href="../layout/style.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<!-- <script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_gugun.js" type="text/javascript"></script> -->
</head>
<body>

<div id="container_wrapper">
	<div id="container">
	  <div id="header">
      <div id="inner_header">
    </div>
</div>
  
  	<div id="top"> 
		<span class="cpojer-links"> <center>
					<a href='home'>Panduan Penggunaan</a>
					<a href='transformasi-data.html'>Tabel Transformasi Data</a>
					<a href='semua-data.html'>Input Data</a>
					<a href='hasil.html'>Hasil Clustering</a>
					<a style="cursor:pointer;" onclick="if(confirm('Apakah anda yakin ingin Logout?')){ location.href='../logout.php ?>' }">Log Out</a>
					<!-- <a href='../logout.php'>Logout</a>	 -->
				</center>
		</span>
	</div>
  
		<div id="left_column">
			<div class="text_area" align="justify">	
				<?php include "content.php"; ?>
					<br/>
			</div>
			<div style='clear:both;'></div>
		</div>
		<div id="footer">
		</div>

        
</div>
</div>
</body>
</html>