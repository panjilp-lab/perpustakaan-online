<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Penerbit
			</div>
			<div class="isi-konten">
				<a href="tambah_penerbit.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama Penerbit</th>
						<th width="200px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_penerbit = mysql_query("SELECT * FROM tb_penerbit order by kode_penerbit desc");
						while ($data = mysql_fetch_array($sql_penerbit)) {
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_penerbit']; ?></td>
						<td><?php echo $data['nama_penerbit']; ?></td>
						<td>
							<a href="edit_penerbit.php?kode=<?php echo $data['kode_penerbit']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_penerbit.php?kode=<?php echo $data['kode_penerbit']; ?>" title="Hapus">
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