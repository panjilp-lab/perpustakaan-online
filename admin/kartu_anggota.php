<?php
	include 'inc/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan SMK Manangga Pratama</title>
	<link rel="stylesheet" type="text/css" href="css/kartu_anggota.css">
</head>
<body>
	<div class="kartu">
		<img src="img/kta.png">
	</div>
			<?php
				$kode = $_GET['kode'];
				$sql_anggota = mysql_query("select * from tb_anggota where kode_anggota = '$kode'");
				$v_anggota = mysql_fetch_array($sql_anggota) or die(mysql_error());

				if ($v_anggota['jurusan'] == "Teknik Kendaraan Ringan (TKR)") {
					$jrsn = "TKR";
				}elseif ($v_anggota['jurusan'] == "Teknik Sepeda Motor (TSM)") {
					$jrsn = "TSM";
				}elseif ($v_anggota['jurusan'] == "Rekayasa Perangkat Lunak (RPL)") {
					$jrsn = "TSM";
				}
			?>
			<div class="foto">
				<img src="img/foto_anggota/<?php echo $v_anggota['foto']; ?>">
			</div>
	<div class="data">
		<center>
			<table width="100%">
				<tr>
					<td valign="top" width="80px;">No Anggota</td>
					<td valign="top">:</td>
					<td valign="top"><?php echo $v_anggota['kode_anggota']; ?></td>
				</tr>
				<tr>
					<td valign="top">Nama</td>
					<td valign="top">:</td>
					<td valign="top"><?php echo $v_anggota['nama_anggota']; ?></td>
				</tr>
				<tr>
					<td valign="top">Kelas</td>
					<td valign="top">:</td>
					<td valign="top"><?php echo $v_anggota['tingkat']." ".$jrsn." ".$v_anggota['no_kelas']; ?></td>
				</tr>
				<tr>
					<td valign="top">Jurusan</td>
					<td valign="top">:</td>
					<td valign="top"><?php echo $v_anggota['jurusan']; ?></td>
				</tr>
				<tr>
					<td valign="top">Alamat</td>
					<td valign="top">:</td>
					<td valign="top"><?php echo $v_anggota['alamat']; ?></td>
				</tr>
			</table>
		</center>

	</div>
</body>
</html>
<script type="text/javascript">
	window.print(); history.go(-1);
</script>