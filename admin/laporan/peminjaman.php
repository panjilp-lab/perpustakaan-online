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
			<h1>LAPORAN DATA PEMINJAMAN</h1>
			<h1>PERPUSTAKAAN SMK MANANGGA PRATAMA</h1>
		</div>
		<div class="kanan">
			<img src="../img/Logo_Kota_Tasikmalaya.png" width="100px;">
		</div>
		<div class="clear">
			
		</div>
	</div>
	<div class="isi">
		<table border="1px;" width="100%">
			<tr>
				<th>No</th>
				<th>No Peminjaman</th>
				<th>Kode Anggota</th>
				<th>Nama Anggota</th>
				<th>Kode Buku</th>
				<th>Nama Buku</th>
				<th>Penerbit</th>
				<th>Tahun Terbit</th>
				<th>Edisi</th>
				<th>Tanggal Peminjaman</th>
				<th>Tanggal Pengemblian</th>
				<th>Status</th>
			</tr>
			<?php
				$i=1;
				$sql = mysql_query("SELECT * FROM tb_det_peminjaman");
				while ($data = mysql_fetch_array($sql)) {
					$sa = "SELECT * FROM tb_anggota where kode_anggota = '$data[kode_anggota]'";
					$sb = "SELECT * FROM tb_buku where kode_buku = '$data[kode_buku]'";
					$sp = "SELECT * FROM tb_peminjaman where no_peminjaman = '$data[no_peminjaman]'";
					$da = mysql_fetch_array(mysql_query($sa));
					$db = mysql_fetch_array(mysql_query($sb));
					$dp = mysql_fetch_array(mysql_query($sp));
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data['no_peminjaman'];?></td>
				<td><?php echo $data['kode_anggota'];?></td>
				<td><?php echo $da['nama_anggota']?></td>
				<td><?php echo $data['kode_buku'];?></td>
				<td><?php echo $db['judul_buku'];?></td>
				<td><?php echo $db['penerbit'];?></td>
				<td><?php echo $db['tahun_terbit'];?></td>
				<td><?php echo $db['edisi'];?></td>
				<td><?php echo $dp['tanggal_peminjaman'];?></td>
				<td><?php echo $dp['tanggal_pengembalian'];?></td>
				<td><?php echo $data['status'];?></td>
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