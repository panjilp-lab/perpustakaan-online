<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Kategori
			</div>
			<div class="isi-konten">
				<a href="tambah_kategori.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Kategori</th>
						<th width="200px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_kategori = mysql_query("SELECT * FROM tb_kategori order by kode_kategori desc");
						while ($data = mysql_fetch_array($sql_kategori)) {
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_kategori']; ?></td>
						<td><?php echo $data['nama_kategori']; ?></td>
						<td>
							<a href="edit_kategori.php?kode=<?php echo $data['kode_kategori']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_kategori.php?kode=<?php echo $data['kode_kategori']; ?>" title="Hapus">
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