<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Petugas
			</div>
			<div class="isi-konten">
				<a href="tambah_petugas.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode Petugas</th>
						<th>Nama Lengkap</th>
						<th>Username</th>
						<th>Password</th>
						<th>Alamat</th>
						<th>Status Keaktifan</th>
						<th width="150px;">Opsi</th>
					</tr>
					<?php
						$i=1;
						$sql_petugas = mysql_query("SELECT * FROM tb_petugas order by kode_petugas desc");
						while ($data = mysql_fetch_array($sql_petugas)) {
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_petugas']; ?></td>
						<td><?php echo $data['nama_lengkap']; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['password']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td><?php echo $data['status_keaktifan']; ?></td>
						<td>
							<a href="edit_petugas.php?kode=<?php echo $data['kode_petugas']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_petugas.php?kode=<?php echo $data['kode_petugas']; ?>" title="Hapus">
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