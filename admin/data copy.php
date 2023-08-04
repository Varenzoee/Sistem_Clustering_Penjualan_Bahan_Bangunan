<SCRIPT language="javascript">
	function shuffle(array) {
		let currentIndex = array.length,
			randomIndex;

		// While there remain elements to shuffle.
		while (currentIndex != 0) {

			// Pick a remaining element.
			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex--;

			// And swap it with the current element.
			[array[currentIndex], array[randomIndex]] = [
				array[randomIndex], array[currentIndex]
			];
		}

		return array;
	}

	function addRow(tableID) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var cell1 = row.insertCell(1);
		var element1 = document.createElement("input");
		element1.type = "text";
		cell1.appendChild(element1);
	}

	function Add(id) {
		var table = document.getElementById(id);
		var clone = table.getElementsByTagName('Tbody')[1].cloneNode(true);
		table.appendChild(clone);

		var rowCount = table.rows.length;
		var row = table.rows[rowCount];
		table.rows[rowCount - 1].cells[0].innerHTML = rowCount - 1;
	}


	function deleteRow(tableID) {
		try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			if (rowCount > 2) {
				table.deleteRow(rowCount - 1);
				rowCount--;
			}
		} catch (e) {
			alert(e);
		}
	}
</SCRIPT>
<link rel="stylesheet" href="../layout/style.css">
<div style="float:left;width:480px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:7px; background:#EDF1D6; margin-bottom:20px;">DATA OBJEK</div>
	<?php
	include "../config/koneksi.php";
	if (isset($_POST['submit'])) {
		$koneksi->query("insert into objek (nama_objek, data) VALUES ('$_POST[namaobjek]','$_POST[objek]')");
		echo "<script>window.alert('Sukses Memasukkan Data Baru. . .');
        window.location=('semua-data.html')</script>";
	}

	if ($_GET['idd'] != '') {
		$koneksi->query("DELETE FROM objek where id_objek=$_GET[idd]");
		echo "<script>window.alert('Sukses Menghapus Data Objek. . .');
        window.location=('semua-data.html')</script>";
	}
	?>
	<form method='post' enctype='multipart/form-data' action='proses-excel.html'>
		Data Excel: <input style='cursor:pointer;  border:1px solid #000;' name='userfile' type='file' required>
		<input class="button-import" name='upload' type='submit' value='Import'>
		<?php echo "<input class='button-hapusall' type=button value='Delete All' onclick=\"if(confirm('Apakah anda yakin ingin menghapus semua data?')){ location.href='hapus-data.html' };\">"; ?>
	</form>
	<br>
	<form action="semua-data.html" method="POST">
		Input Objek:
		<TABLE width="470px" border="2" cellpadding="5px" cellspacing="0">
			<tbody>
				<TR bgcolor="#609966" style="color:#fff;">
					<Th>
						<center>Data No</center>
					</Th>
					<Th>
						<center>Kriteria Yang Sudah Ditransformasikan</center>
					</Th>
					<Th>
						<center>Aksi</center>
					</Th>
				</TR>
				<TR>
					<form action="semua-data.html" method="POST">
						<TD>
							<center><INPUT placeholder="Ex : P001" type="text" size="10" name="namaobjek" required /></center>
						</TD>
						<TD><INPUT placeholder="Ex : 3,5,2,1,1" type="text" size="30" name="objek" required /> </TD>
						<TD><input class="button-tambahdata" type='submit' name='submit' value='Tambahkan'>
					</form>
					</TD>
				</TR>
			</tbody>
		</TABLE>
	</form>
	<br>
	<TABLE width="470px" border="2" cellpadding="5px" cellspacing="0" id="data">
		<tbody>
			<TR bgcolor="#609966" style="color:#fff;">
				<Th>
					<center>Data No</center>
				</Th>
				<Th>
					<center>Kriteria Yang Sudah Ditransformasikan</center>
				</Th>
				<Th>
					<center>Aksi</center>
				</Th>
			</TR>
		</tbody>
		<tbody>

			<?php
			$query = $koneksi->query("SELECT * FROM objek ORDER BY id_objek ASC");
			echo "<script>";
			echo "let data = " . json_encode(mysqli_fetch_all($query));
			echo "</script>";
			$data =  $koneksi->query("SELECT * FROM objek ORDER BY id_objek ASC");
			$no = $no + 1;
			while ($r = mysqli_fetch_array($data)) {
				echo "<TR>
							<TD><center>$r[nama_objek]</TD>
							<TD><center>$r[data]</TD>
							<TD><input class='button-hapus' type=button value='Hapus Data' onclick=\"if(confirm('Apakah anda yakin ingin menghapus data ini?')){ location.href='data.php?idd=$r[id_objek]' };\"></TD>
						  </TR>";
				$no++;
			}
			?>
		</tbody>
		<!-- DI SINI -->
		<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
		<script>
			shuffle(data)
			const raw = data.map(item => {
				return item[2].split(',').map(Number)
			})
			const centroid = []
			const selectedIndex = Math.floor(Math.random() * raw.length)
			// console.log({selectedIndex})
			// console.log({centroid})
			centroid.push(raw[selectedIndex])
			// console.log({'raw[selectedIndex]': raw[1]})
			// console.log({centroid})
			// console.log({raw});
			const loop = 2
			for (let i = 0; i < loop - 1; i++) {
				let countedDistance = []
				// console.log('asd',countedDistance.length)
				const semi = raw.forEach((item, j) => {
					// console.log({countedDistance})
					const distance = item.map((element, k) => {
						// console.log(raw[k])
						return Math.pow(element - centroid[i][k], 2)
					})
					const total = _.sum(distance)
					const object = {
						object: data[j][1],
						total
					}
					countedDistance.push(object)
					countedDistance = _.orderBy(countedDistance, ['total'], 'desc')

					countedDistance = countedDistance.filter((item) => item.total === _.maxBy(countedDistance, 'total').total)
					// return object
				})
				// console.log(data[0][1])
				const next = data.filter((item, index) => item[1] === countedDistance[Math.floor(Math.random() * countedDistance.length)].object)[0][2].split(',').map(Number)
				// data = data.filter((item, index) => item[1] === countedDistance[Math.floor(Math.random()*countedDistance.length)].object)
				// console.log(data)
				centroid.push(next)
				// console.log({lastCentroid: centroid[i],centroid, next})
				console.log({
					i
				})
				// console.log(_.maxBy(countedDistance, 'total').total)
				console.table(countedDistance)
			}
			// HASIL
			console.table(centroid)
			localStorage.setItem('centroid', JSON.stringify(centroid))
			// const data = JSON.parse(localStorage.getItem('item'))
			// console.log(data)
		</script>
	</TABLE>
</div>

<div style="float:right;width:480px;">
	<div style="width:500px; text-align:center;font-weight:bold;padding:7px; background:#EDF1D6; margin-bottom:20px;">PROSES UNTUK CLUSTERING</div>

	<TABLE width="510px" border="1" cellpadding="5px" cellspacing="0" id="cluster" hidden>
		<tbody>
			<TR bgcolor="#cecece">
				<!-- <Th style='width:72px;'>
						<center>Cluster</center>
					</Th> -->
				<Th>
					<center>Input Centroid Awal</center>
				</Th>
				<Th>
					<center>Aksi</center>
				</Th>
			</TR>
			<tr>
				<form action="semua-data.html" method="POST">
					<TD>
						<center><INPUT type="text" size="48" name="centroid" placeholder="Ex : 54,14,5" required />
					</TD>
					<td>
						<center><input type='submit' name='submit1' value='Tambahkan'>
					</td>
				</form>
			</tr>
		</tbody>
	</TABLE>

	<?php
	if (isset($_POST['submit1'])) {
		$koneksi->query("INSERT into centroid (data_centroid) VALUES ('$_POST[centroid]')");
		echo "<script>window.alert('Sukses Memasukkan Centroid Baru. . .');
        window.location=('semua-data.html')</script>";
	}

	if ($_GET['id'] != '') {
		$koneksi->query("DELETE FROM centroid where id_centroid=$_GET[id]");
		echo "<script>window.alert('Sukses Menghapus Data Centroid. . .');
        window.location=('semua-data.html')</script>";
	}
	?>
	<form action="../kirimcentroid.php" method="post">
		<TABLE width="510px" border="1" cellpadding="5px" cellspacing="0" id="cluster">
			<tbody>
				<TR bgcolor="#cecece">
					<Th>
						<center>Cluster</center>
					</Th>
					<Th>
						<center>Centroid Awal</center>
					</Th>
					<Th>
						<center>Aksi</center>
					</Th>
				</TR>
			</tbody>
			<tbody id='clusterini'>
				<!-- <TR>
						<TD>
							<center>Input</center>
						</TD>
						<TD>
							<form action="semua-data.html" method="POST">
								<INPUT style='background:lightblue' type="text" size="34" name="centroid" required />
								<input type='submit' name='submit1' value='Tambahkan'>
							</form>
						</TD>
					</TR> -->
			</tbody>
		</TABLE>
		<?php
		error_reporting(0);
		include "../config/koneksi.php"; {
			$query = $koneksi->query("SELECT * FROM objek");
			$cocok = mysqli_num_rows($query);
			$r = mysqli_fetch_array($query);
		}
		?>
		<center><button type="submit" class="button-proses" <?php if ($cocok < 1) { ?> style="pointer-events: none; background-color: #cccccc;" disabled <?php   } ?>>Proses Untuk Clustering Data</button></center>
	</form>

	<br>
	<br>
</div>
<form action="hasil.html" target="_BLANK" method="POST">
	<?php
	$querye = $koneksi->query("SELECT * FROM objek ORDER BY id_objek ASC");
	while ($r = mysqli_fetch_array($querye)) {
		echo "<INPUT type='hidden' size='40' name='objek[]' value='$r[data]'/>";
	}
	?>

	<?php
	$queryye = $koneksi->query("SELECT * FROM centroid ORDER BY id_centroid DESC");
	while ($r = mysqli_fetch_array($queryye)) {
		echo "<INPUT type='hidden' size='38' name='cluster[]' value='$r[data_centroid]'/>";
	}
	?>
	<div style="float:left;width:950px;margin-top:30px;text-align:center; margin-bottom:20px;"></div>
</form>

<script>
	document.querySelector('#clusterini').innerHTML = ''
	// const centroid = JSON.parse(localStorage.getItem('centroid'))
	// console.log(centroid)
	centroid.forEach((item, index) => {
		document.querySelector('#clusterini').innerHTML += `<TR>
					<TD><center>Cluster ${index}</center></TD>
					<TD><center>
						<input type='text' value='${item}' name="centroid_${index}" readonly style="text-align: center; background-color: #fff; border: none" />
					</center></TD>
					<TD><center><input style='color:red' type=button value='Hapus Data' onclick=\"window.location.href='data.php?id=$r[id_centroid]';\"></TD>
					</TR>`;
	})
</script>