<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Daftar Anggota
			</div>
			<div class="isi-konten">
				<form method="post" action="cari_anggota.php">
					<input type="text" name="search" placeholder="Apa yang anda cari...">
					<input type="submit" name="cari" value="Cari">
				</form>
				<a href="tambah_anggota.php">
					<div class="btn">
						+Tambah Data
					</div>
				</a>
				<table>
					<tr>
						<th>No</th>
						<th>Kode Anggota</th>
						<th>Nama Anggota</th>
						<th>Kelas</th>
						<th>Jurusan</th>
						<th>No HP</th>
						<th>Alamat</th>
						<th width="150px;">Opsi</th>
					</tr>
					<?php
						$search = $_POST['search'];
						$i=1;
						$sql_anggota = mysql_query("SELECT * FROM tb_anggota where kode_anggota like '%$search%' or nama_anggota like '%$search%' or jurusan like '$search' order by kode_anggota desc");
						while ($data = mysql_fetch_array($sql_anggota)) {
							if ($data['jurusan'] == "Teknik Kendaraan Ringan (TKR)") {
								$jrsn = "TKR";
							}elseif ($data['jurusan'] == "Teknik Sepeda Motor (TSM)") {
								$jrsn = "TSM";
							}elseif ($data['jurusan'] == "Rekayasa Perangkat Lunak (RPL)") {
								$jrsn = "TSM";
							}
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_anggota']; ?></td>
						<td><?php echo $data['nama_anggota']; ?></td>
						<td><?php echo $data['tingkat']." ".$jrsn." ".$data['no_kelas']; ?></td>
						<td><?php echo $data['jurusan']; ?></td>
						<td><?php echo $data['no_hp']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td width="200px;">
							<a href="detail.php?kode=<?php echo $data['kode_anggota']; ?>" title="detail">
								<div class="btn-yellow">
									Detail
								</div>
							</a>
							<a href="edit_anggota.php?kode=<?php echo $data['kode_anggota']; ?>" title="Edit">
								<div class="btn-red">
									Edit
								</div>
							</a>
							<a href="hapus_anggota.php?kode=<?php echo $data['kode_anggota']; ?>" title="Hapus">
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