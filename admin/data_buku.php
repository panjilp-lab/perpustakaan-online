<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Buku
			</div>
			<div class="isi-konten">
				<form method="post" action="cari_buku.php">
					<input type="text" name="search" placeholder="Apa yang anda cari...">
					<input type="submit" name="cari" value="Cari">
				</form>
				<a href="tambah_buku.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode Buku</th>
						<th>Judul Buku</th>
						<th>DDC</th>
						<th>Kategori</th>
						<th>Pengerangan</th>
						<th>No ISBN</th>
						<th width="150px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_buku = mysql_query("SELECT * FROM tb_buku order by kode_buku desc");
						while ($data = mysql_fetch_array($sql_buku)) {
							
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_buku']; ?></td>
						<td><?php echo $data['judul_buku']; ?></td>
						<td><?php echo $data['ddc']; ?></td>
						<td><?php echo $data['kategori']; ?></td>
						<td><?php echo $data['pengarang']; ?></td>
						<td><?php echo $data['isbn']; ?></td>
						<td width="200px;">
							<a href="detail_buku.php?kode=<?php echo $data['kode_buku']; ?>" title="detail">
								<div class="btn-yellow">
									Detail
								</div>
							</a>
							<a href="edit_buku.php?kode=<?php echo $data['kode_buku']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_buku.php?kode=<?php echo $data['kode_buku']; ?>" title="Hapus">
								<div class="btn-blue">
									Hapus
								</div>
							</a>
						</td>
					</tr>
						<?php
						$i++;
						}
					?>
				</table>
			</div>
		</div>
	</div>
<?php
	include 'footer.php';
?>