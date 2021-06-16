<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Rak
			</div>
			<div class="isi-konten">
				<a href="tambah_rak.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Rak</th>
						<th width="200px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_rak = mysql_query("SELECT * FROM tb_rak order by kode_rak desc");
						while ($data = mysql_fetch_array($sql_rak)) {
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_rak']; ?></td>
						<td><?php echo $data['nama_rak']; ?></td>
						<td>
							<a href="edit_rak.php?kode=<?php echo $data['kode_rak']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_rak.php?kode=<?php echo $data['kode_rak']; ?>" title="Hapus">
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