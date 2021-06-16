<?php
	include '../inc/connect.php';
?>
							<table>
								<tr>
									<th>No</th>
									<th>No Peminjaman</th>
									<th>Nama Anggota</th>
									<th>Buku</th>
									<th>Tanggal Peminjaman</th>
									<th>Tanggal Pengembalian</th>
									<th>Aksi</th>
								</tr>

						<?php
							$keyword = $_GET['keyword'];
							$i=1;
							$sql_peminjaman = mysql_query("SELECT * FROM tb_det_peminjaman where no_peminjaman like '%$keyword%'");
							while ($data_peminjaman = mysql_fetch_array($sql_peminjaman)) {
								$sql_anggota = mysql_query("SELECT * FROM tb_anggota where kode_anggota = '$data_peminjaman[kode_anggota]'");
								$data_anggota = mysql_fetch_array($sql_anggota);
								$sql_buku = mysql_query("SELECT * FROM tb_buku where kode_buku = '$data_peminjaman[kode_buku]'");
								$data_buku = mysql_fetch_array($sql_buku);
								$data_peminjaman_det = mysql_fetch_array(mysql_query("SELECT * FROM tb_peminjaman where no_peminjaman = '$data_peminjaman[no_peminjaman]'"));
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $data_peminjaman['no_peminjaman']; ?></td>
									<td><?php echo $data_anggota['nama_anggota']; ?></td>
									<td><?php echo $data_buku['judul_buku']; ?></td>
									<td><?php echo $data_peminjaman_det['tanggal_peminjaman']; ?></td>
									<td><?php echo $data_peminjaman_det['tanggal_pengembalian']; ?></td>
									<td><input type="checkbox" name="cek[]" value="<?php echo $data_peminjaman['kode_buku'] ?>"></td>
								</tr>
						<?php
							$i++;
							}
						?>
							</table>