<?php
	session_start();
	if ($_SESSION['username'] == "") {
		header("location:login.php");
	}
?>
<?php include 'inc/connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan SMK MANANGGA PRATAMA</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="induk1">
		<div class="content1">
			<div class="logo">
				<div class="si">
					Perpustakaan
				</div>
				<div class="perpus">
					SMK Manangga Pratama
				</div>
			</div>
			<div class="user">
				<?php
					$du = mysql_fetch_array(mysql_query("SELECT * FROM tb_admin where username = '$_SESSION[username]'"));
				?>
				Selamat Datang <?php echo $du['username']; ?>, <a href="logout.php" style="color: #07273c;">Logout</a>
			</div>
			<div class="clear">
				
			</div>
		</div>
	</div>
	<div class="induk2">
		<div class="menu">
			<ul>
				<a href="index.php"><li>Beranda</li></a>
				<a href="#"><li>Master Data <img src="img/dropdown.png" width="20px;">
					<ul>
						<a href="data_rak.php"><li>Data Rak</li></a>
						<a href="data_format.php"><li>Data Format</li></a>
						<a href="data_ddc.php"><li>Data DDC/Klasifikasi</li></a>
						<a href="data_penerbit.php"><li>Data Penerbit</li></a>
						<a href="petugas.php"><li>Petugas</li></a>
						<a href="kategori.php"><li>Kategori</li></a>
						<a href="anggota.php"><li>Anggota</li></a>
						<a href="data_buku.php"><li>Data Buku</li></a>
					</ul>
				</li></a>
				<a href="peminjaman.php"><li>
				Peminjaman</li></a>
				<a href="pengembalian.php"><li>Pengembalian</li></a>
				<a href="#"><li>Data Laporan <img src="img/dropdown.png" width="20px;">
					<ul>
						<a href="laporan/anggota.php"><li>Anggota</li></a>
						<a href="laporan/buku.php"><li>Buku</li></a>
						<a href="laporan/peminjaman.php"><li>Peminjaman</li></a>
						<a href="pengembalian.php"><li>Pengembalian</li></a>
					</ul></li></a>
			</ul>
			<div class="chart" style="float: right; padding: 10px;">
				<a href="keranjang.php" title="Chart"><img src="img/download.png" width="40px"></a>
				<div class="jumlah_peminjaman" style=" width : 15px; border-radius: 100px; ;padding: 2px; position: absolute; text-align: center; margin-top: -45px; margin-left: 20px; background: orange">
					<?php
						$sql_keranjang = mysql_query("SELECT * FROM tb_keranjang");
						$row = mysql_num_rows($sql_keranjang);
						echo $row;
					?>
				</div>
			</div>
			<div class="clear">
				
			</div>
		</div>
	</div>