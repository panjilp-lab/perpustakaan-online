<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Detail Anggota
			</div>
			<?php
				$kode = $_GET['kode'];
				$sql_anggota = mysql_query("select * from tb_anggota where kode_anggota = '$kode'");
				$v_anggota = mysql_fetch_array($sql_anggota) or die(mysql_error());

				if ($v_anggota['jurusan'] == "Teknik Kendaraan Ringan (TKR)") {
					$jrsn = "TKR";
				}elseif ($v_anggota['jurusan'] == "Teknik Sepeda Motor (TSM)") {
					$jrsn = "TSM";
				}elseif ($v_anggota['jurusan'] == "Rekayasa Perangkat Lunak (RPL)") {
					$jrsn = "TSM";
				}
			?>
			<div class="isi-konten">
				<center>
					<div class="pict">
						<img src="img/foto_anggota/<?php echo $v_anggota['foto'] ?>" width="100%">
					</div>
				</center>
				<br>
				<table>
					<tr>
						<td width="300px;">No Anggota</td>
						<td>:</td>
						<td><?php echo $v_anggota['kode_anggota']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $v_anggota['nama_anggota']; ?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td><?php echo $v_anggota['tingkat']." ".$jrsn." ".$v_anggota['no_kelas']; ?></td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td><?php echo $v_anggota['jurusan']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $v_anggota['alamat']; ?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><?php echo $v_anggota['username']; ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td>********************************</td>
					</tr>
				</table>
				<table>
					<tr>
						<td style="text-align: center;">
							<a href="kartu_anggota.php?kode=<?php echo $kode; ?>" title="detail">
								<div class="btn-yellow">
									Cetak Kartu Anggota
								</div>
							</a>
							<a href="edit_anggota.php?kode=<?php echo $v_anggota['kode_anggota']; ?>" title="detail">
								<div class="btn-red">
									Sunting Profil
								</div>
							</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<?php
	include 'footer.php';
?>