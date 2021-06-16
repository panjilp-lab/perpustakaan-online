<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Pengembalian Buku
			</div>
			<div class="isi-konten">
				<?php
					if (isset($_POST['simpan'])) {
						error_reporting(0);
						$no_pengembalian = $_POST['no_pengembalian'];
						$cek = $_POST['cek'];
						$jumlah_pilih = count($cek);
						for ($i=0; $i < $jumlah_pilih ; $i++) {
							$bc = mysql_query("SELECT * FROM tb_pengembalian where no_pengembalian = '$no_pengembalian'");
							$rw = mysql_num_rows($bc);
							if ($rw < 1) {
								$np = mysql_fetch_array(mysql_query("SELECT no_peminjaman,kode_anggota from tb_det_peminjaman where id_peminjaman = '$cek[$i]'")) or die(mysql_error());
								$dp = mysql_fetch_array(mysql_query("SELECT * FROM tb_peminjaman where no_peminjaman = '$np[no_peminjaman]'")) or die(mysql_error());
								$sk = date("Y-m-d");
								$skr = strtotime($sk);
								$bsk = strtotime($dp['tanggal_pengembalian']);
								$diff = ($skr-$bsk);
								$telat = $diff/86400;
								if ($telat > 0) {
									$jml_keterlambatan = $telat * 1000 * $jumlah_pilih;
								}else {
									$jml_keterlambatan = 0;
								}

								mysql_query("INSERT INTO tb_pengembalian values ('$no_pengembalian','$np[no_peminjaman]','$np[kode_anggota]','$sk','$jumlah_pilih','$telat','$jml_keterlambatan')") or die(mysql_error());
							}
							$np = mysql_fetch_array(mysql_query("SELECT no_peminjaman,kode_anggota,kode_buku from tb_det_peminjaman where id_peminjaman = '$cek[$i]'")) or die(mysql_error());
							$dp = mysql_fetch_array(mysql_query("SELECT * FROM tb_peminjaman where no_peminjaman = '$np[no_peminjaman]'")) or die(mysql_error());

							mysql_query("INSERT INTO tb_det_pengembalian values('','$no_pengembalian','$np[kode_anggota]','$np[kode_buku]')");
							mysql_query("UPDATE tb_buku set stok = stok+1 where kode_buku = '$np[kode_buku]'");
							mysql_query("UPDATE tb_det_peminjaman set status = 'Dikembalikan' where id_peminjaman = '$cek[$i]'") or die(mysql_error());
							?>
							<script type="text/javascript">
								alert("Data berhasil di masukkan");
							</script>
							<?php
						}
					}
				?>
				<form method="POST">
					<div class="isi-konten-kiri">
						<div class="anggota">
							<div class="judul-sub-container">
								Transaksi Pengembalian
							</div>
							<div class="isi-sub-container" id="data">
								<div class="kiri">
									No. Pengembalian :
								</div>
								<?php
									$sql_kode = mysql_query("select max(no_pengembalian) as max_anggota from tb_pengembalian");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_anggota'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "PNG";
									$kode_pengembalian = $char . sprintf("%03s", $no_urut);
									@$no_peminjaman_url = $_GET['no_peminjaman'];
									@$tanggal_peminjaman_url = $_GET['tanggal_peminjaman'];
									@$tanggal_pengembalian_url = $_GET['tanggal_pengembalian'];
								?>
								<div class="kanan">
									<input type="text" name="no_pengembalian" readonly="readonly" value="<?php echo $kode_pengembalian; ?>">
								</div>
								<div class="kiri">
									<input type="submit" name="simpan" value="Kembalikan" style="background: orange; cursor: pointer;">
								</div>
							</div>
						</div>	
					</div>
					<div class="isi-konten-kiri2">
						<div class="judul-sub-container">
							Buku Yang Dipinjam : 
						</div>
						<div class="buku">
								Cari Transaksi Peminjaman Buku :<br>
								<input type="text" name="transaksi_peminjaman_buku" class="search" placeholder="Cari Transaksi Peminjaman..." style="width: 80%">
								<input type="submit" name="cari" value="Cari">
						</div>
					</div>
					<div class="isi-konten-kiri2">
						<div class="judul-sub-container">
							Daftar peminjaman buku
						</div>
						<div class="buku" id="peminjaman">
							<table>
								<tr>
									<th>No</th>
									<th>No Peminjaman</th>
									<th>Nama Anggota</th>
									<th>Buku</th>
									<th>Tanggal Peminjaman</th>
									<th>Tanggal Pengembalian</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>

						<?php
							$i=1;
							@$transaksi_peminjaman_buku = $_POST['transaksi_peminjaman_buku'];
							$sql_peminjaman = mysql_query("SELECT * FROM tb_det_peminjaman where no_peminjaman like '%$transaksi_peminjaman_buku%' and status = 'Dipinjam'") or die(mysql_error());
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
									<td><?php echo $data_peminjaman['status'] ?></td>
									<td><input type="checkbox" name="cek[]" value="<?php echo $data_peminjaman['id_peminjaman'] ?>"></td>
								</tr>
						<?php
							$i++;
							}
						?>
							</table>
						</div>
					</div>
					<div class="clear">
						
					</div>
				</form>
			</div>
		</div>
<?php
	include 'footer.php';
?>