<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar DDC/Klasifikasi
			</div>
			<div class="isi-konten">
				<a href="tambah_ddc.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama DDC/Klasifikasi</th>
						<th width="200px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_ddc = mysql_query("SELECT * FROM tb_ddc order by kode_ddc desc");
						while ($data = mysql_fetch_array($sql_ddc)) {
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_ddc']; ?></td>
						<td><?php echo $data['nama_ddc']; ?></td>
						<td>
							<a href="edit_ddc.php?kode=<?php echo $data['kode_ddc']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_ddc.php?kode=<?php echo $data['kode_ddc']; ?>" title="Hapus">
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