<?php
	include '../inc/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/ajax_anggota.css">
</head>
<body>
	<?php
		$keyword = $_GET['keyword'];
		$query = mysql_query("SELECT * FROM tb_anggota where kode_anggota like '%$keyword%'");
		$data = mysql_fetch_array($query);

		if ($data['kode_anggota'] != $keyword) {
		?>
		<div class="empty">
		<?php
			echo "Data anggota tidak ditemukan";
		}else {
		
	?>
		</div>
	<div class="photo">
		<img src="img/foto_anggota/<?php echo $data['foto']; ?>">
	</div>
	<div class="data">
		<?php echo $data['nama_anggota']; ?><br>
		<?php
			if ($data['jurusan'] == "Teknik Kendaraan Ringan (TKR)") {
				$jrsn = "TKR";
			}elseif ($data['jurusan'] == "Teknik Sepeda Motor (TSM)") {
				$jrsn = "TSM";
			}elseif ($data['jurusan'] == "Rekayasa Perangkat Lunak (RPL)") {
				$jrsn = "TSM";
			}
		echo $data['tingkat']." ".$jrsn." ".$data['no_kelas']."<br>";
		echo $data['jurusan'];
		?>
	</div>
	<div class="clear">
		
	</div>
	<?php
}
	?>
</body>
</html>