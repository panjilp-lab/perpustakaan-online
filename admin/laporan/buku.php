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
			<h1>LAPORAN DATA BUKU</h1>
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
				<th>Kode Buku</th>
				<th>Judul Buku</th>
				<th>DDC</th>
				<th>Kategori</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun Terbit</th>
				<th>Edisi</th>
				<th>Stok</th>
			</tr>
			<?php
				$i=1;
				$sql = mysql_query("SELECT * FROM tb_buku");
				while ($data = mysql_fetch_array($sql)) {
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['kode_buku'];?></td>
				<td><?php echo $data['judul_buku'];?></td>
				<td><?php echo $data['ddc']?></td>
				<td><?php echo $data['kategori'];?></td>
				<td><?php echo $data['pengarang'];?></td>
				<td><?php echo $data['penerbit'];?></td>
				<td><?php echo $data['tahun_terbit'];?></td>
				<td><?php echo $data['edisi'];?></td>
				<td><?php echo $data['stok'];?></td>
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