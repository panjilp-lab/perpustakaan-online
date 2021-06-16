<?php
	include '../inc/connect.php';
?>
<header>
	<link rel="stylesheet" type="text/css" href="css/iframe.css">
</header>
<div>

	<?php
		$keyword = $_GET['keyword'];
		$sql_key = mysql_query("SELECT * FROM tb_buku where kode_buku like '%$keyword%' or judul_buku like '%$keyword%'");
		$data = mysql_fetch_array($sql_key);
	?>
	Buku Yang Dipinjam :<br><br>
	<div class="cover">
		<img src="img/cover_buku/<?php echo $data['cover'] ?>">
	</div>
	<div class="buku-data">
		<table>
			<tr>
				<td>Judul Buku</td>
				<td>:</td>
				<td><?php echo $data['judul_buku']; ?></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td><?php echo $data['kategori']; ?></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td>:</td>
				<td><?php echo $data['pengarang']; ?></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>:</td>
				<td><?php echo $data['penerbit']; ?></td>
			</tr>
		</table>
	</div>
	<div class="clear">
		 
	</div>
</div>