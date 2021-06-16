<?php include '../inc/connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Anggota Perpustakaan SMK MANANGGGA PRATAMA</title>
	<link rel="stylesheet" type="text/css" href="../css/laporan.css">
</head>
<body>
	<div class="header">
		<div class="kiri">
			<img src="../img/logo_sekolah.jpg" width="100px;">
		</div>
		<div class="center">
			<h1>LAPORAN DATA ANGGOTA</h1>
			<h1>PERPUSTAKAAN SMK MANANGGA PRATAMA</h1>
		</div>
		<div class="kanan">
			<img src="../img/Logo_Kota_Tasikmalaya.png" width="100px;">
		</div>
		<div class="clear">
			
		</div>
	</div>
	<div class="isi">
		<table border="1px;">
			<tr>
				<th>No</th>
				<th>Kode Anggota</th>
				<th>Nama Anggota</th>
				<th>Kelas</th>
				<th>No Handphone</th>
				<th>Alamat</th>
			</tr>
			<?php
				$i=1;
				$sql = mysql_query("SELECT * FROM tb_anggota");
				while ($data = mysql_fetch_array($sql)) {
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['kode_anggota'];?></td>
				<td><?php echo $data['nama_anggota'];?></td>
				<td><?php echo $data['tingkat']." ".$data['jurusan']." ".$data['no_kelas'];?></td>
				<td><?php echo $data['no_hp'];?></td>
				<td><?php echo $data['alamat'];?></td>
			</tr>
			<?php
				$i++;
				}
			?>
		</table>
	</div>
	<div class="footer">
		<table border="0">
			<td>

			Kepala Perpustakaan<br><br><br><br><br><br><br>



			<u>Ari Sandria</u>
			</td>
			<td>
			Kepala Sekolah<br>
			SMK MANANGGA PRATAMA<br><br><br><br><br><br>



			Ari Sandria
			</td>
		</table>
	</div>
</body>
</html>