<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php include 'inc/connect.php'; ?>
	<div class="induk3">
		<div class="content1">
			<div class="isi-konten">
				<div class="header-keranjang" style="margin-bottom: 5px; background: #154e65">
					Peraturan Peminjaman Buku :<br>
					1. Batas waktu peminjaman buku tidak boleh melebihi Tanggal Pengembalian Buku<br>
					2. Apabila anggota melanggar poin satu maka akan dikenakan denda Rp.1000 / Hari
				</div>
				<div class="header-keranjang">
					<?php
						$q_k = mysql_query('SELECT *  FROM tb_keranjang');
						$dk = mysql_fetch_array($q_k);
						$qa = mysql_query("SELECT * FROM tb_anggota where kode_anggota = '$dk[kode_anggota]'");
						$da = mysql_fetch_array($qa);
						$today = date('Y-m-d');
					?>
					<div class="left">
						<div class="hd">
							No Peminjaman :<br>
							Tanggal Peminjaman :<br>
							Tanggal Pengembalian :<br>
						</div>
						<div class="is">
							<?php echo $dk['no_peminjaman']; ?><br>
							<?php echo $today; ?><br>
							<?php echo $dk['tanggal_pengembalian']; ?>
						</div>
					</div>
					<div class="left">
						<div class="hd">
							Kode Anggota :<br>
							Nama Anggota :<br>
						</div>
						<div class="is">
							<?php echo $dk['kode_anggota']; ?><br>
							<?php echo $da['nama_anggota']; ?><br>
						</div>
					</div>	
					<div class="clear">
						
					</div>
				</div>
				<div class="isi-keranjang">
					<table>
						<tr>
							<th>Kode Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
						</tr>
						<?php
							$i = 1;
							$q_k = mysql_query('SELECT *  FROM tb_keranjang');
							while ($data_b = mysql_fetch_array($q_k)) {
								$db = mysql_fetch_array(mysql_query("SELECT * FROM tb_buku where kode_buku = '$data_b[kode_buku]'"));
							?>
						<tr>
							<td><?php echo $data_b['kode_buku']; ?></td>
							<td><?php echo $db['judul_buku']; ?></td><td><?php echo $db['pengarang']; ?></td><td><?php echo $db['penerbit']; ?></td>
						</tr>
							<?php
							$i++;
							}

						?>
					</table>
				</div>
			</div>
	</div>
	
<script type="text/javascript">
	window.print(); history.go(-1);
</script>