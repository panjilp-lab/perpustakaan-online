<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Transaksi Peminjaman Buku</h1>
	<?php
		include 'inc/connect.php';
		error_reporting(0);
		if (isset($_POST['transaksi_baru'])){
			$peminjaman = 1;
		}
	?>
	<form method="POST">
		<table>
		<tr>
			<td>No Peminjaman</td>
			<td>:</td>
			<td><input type="text" name="no_peminjaman" value="<?php echo $peminjaman; ?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="transaksi_baru" value="Transaksi Baru"></td>
		</tr>
	</table>
	</form>
</body>
</html>