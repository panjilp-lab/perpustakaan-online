<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Detail Buku
			</div>
			<?php
				$kode = $_GET['kode'];
				$sql_buku = mysql_query("select * from tb_buku where kode_buku = '$kode'");
				$v_buku = mysql_fetch_array($sql_buku) or die(mysql_error());
				$dilihat = $v_buku['view']+1;
				mysql_query("UPDATE tb_buku set view = '$dilihat' where kode_buku='$kode'");
			?>
			<div class="isi-konten">
				<center>
					<div class="cover">
						<img src="img/cover_buku/<?php echo $v_buku['cover'] ?>" width="100%">
					</div>
				</center>
				<br>
				<table>
					<tr>
						<td width="300px;">Kode Buku</td>
						<td>:</td>
						<td><?php echo $v_buku['kode_buku']; ?></td>
					</tr>
					<tr>
						<td>ISBN</td>
						<td>:</td>
						<td><?php echo $v_buku['isbn']; ?></td>
					</tr>
					<tr>
						<td>Judul Buku</td>
						<td>:</td>
						<td><?php echo $v_buku['judul_buku']; ?></td>
					</tr>
					<tr>
						<td>DDC</td>
						<td>:</td>
						<td><?php echo $v_buku['ddc']; ?></td>
					</tr>
					<tr>
						<td>Kategori</td>
						<td>:</td>
						<td><?php echo $v_buku['kategori']; ?></td>
					</tr>
					<tr>
						<td>Format</td>
						<td>:</td>
						<td><?php echo $v_buku['format']; ?></td>
					</tr>
					<tr>
						<td>Pengarang</td>
						<td>:</td>
						<td><?php echo $v_buku['pengarang']; ?></td>
					</tr>
					<tr>
						<td>Penerbit</td>
						<td>:</td>
						<td><?php echo $v_buku['penerbit']; ?></td>
					</tr>
					<tr>
						<td>Tahun Terbit</td>
						<td>:</td>
						<td><?php echo $v_buku['tahun_terbit']; ?></td>
					</tr>
					<tr>
						<td>Edisi</td>
						<td>:</td>
						<td><?php echo $v_buku['edisi']; ?></td>
					</tr>
					<tr>
						<td>Stok</td>
						<td>:</td>
						<td><?php echo $v_buku['stok']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<?php
	include 'footer.php';
?>