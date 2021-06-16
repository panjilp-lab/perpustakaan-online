<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Format
			</div>
			<div class="isi-konten">
				<a href="tambah_format.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Format</th>
						<th width="200px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_format = mysql_query("SELECT * FROM tb_format order by kode_format desc");
						while ($data = mysql_fetch_array($sql_format)) {
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_format']; ?></td>
						<td><?php echo $data['nama_format']; ?></td>
						<td>
							<a href="edit_format.php?kode=<?php echo $data['kode_format']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_format.php?kode=<?php echo $data['kode_format']; ?>" title="Hapus">
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