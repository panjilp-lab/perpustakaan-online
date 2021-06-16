<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Peminjaman Buku
			</div>
			<div class="isi-konten">
				<div class="isi-konten-kiri">
					<?php
						if (isset($_POST['simpan'])) {
							$no_peminjaman = $_POST['no_peminjaman'];
							$kode_anggota = $_POST['kode_anggota'];
							$kode_buku = $_POST['cari-buku'];
							$tanggal_pengembalian = $_POST['tanggal_pengembalian'];

							if ($kode_buku == "" || $kode_anggota == "" || $tanggal_pengembalian == "") {
								?>
									<script type="text/javascript">
										alert("Mohon Lengkapi Data Peminjaman");
									</script>
								<?php 
							}else {
								mysql_query("INSERT INTO tb_keranjang values ('','$no_peminjaman','$tanggal_pengembalian','$kode_buku','$kode_anggota')") or die(mysql_error());
								?>
								<meta http-equiv="refresh" content="0">
								<?php
							}
						}
					?>
					<form method="post">
						<div class="anggota">
							<div class="judul-sub-container">
								Transaksi Peminjaman
							</div>
							<div class="isi-sub-container">
									<?php
									$sql_kode = mysql_query("select max(no_peminjaman) as max_peminjaman from tb_peminjaman");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_peminjaman'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "P.";
									$kode_peminjaman = $char . sprintf("%03s", $no_urut);
									?>
									<div class="kiri">
										No. Peminjaman :
									</div>
									<div class="kanan">
										<input type="text" name="no_peminjaman" readonly="readonly" value="<?php echo $kode_peminjaman; ?>">
									</div>
									<div class="kiri">
										Tanggal Pengembalian :
									</div>
									<div class="kanan">
										<input type="date" name="tanggal_pengembalian">
									</div>
							</div>
						</div><br>
						<div class="anggota">
							<div class="judul-sub-container">
								Data Anggota
							</div>
							<div class="isi-sub-container-anggota">
								<div class="kiri">
									Kode Anggota :
								</div>
								<div class="kanan">
									<input type="text" name="kode_anggota" placeholder="Masukkan keyword pencarian..." id="keyword-anggota" autocomplete="off">
								</div>
								<div class="table" id="table-anggota">
									<div class="empty">
										Data Belum Di Ketahui !
									</div>
								</div>
							</div>
						</div>
				</div>
				<div class="isi-konten-kiri2">
					<div class="judul-sub-container">
						Daftar Buku
					</div>
					<div class="buku">
						Cari Buku :<br>
						<input type="text" name="cari-buku" id="keyword-buku">
					</div>
					<div class="buku" id="table-buku">
						Buku Yang Dipinjam :
					</div>
				</div>
				<div class="btn-save">
					<input type="submit" name="simpan" value="Add to chart">
				</div>
			</form>
				<div class="isi-konten-kiri2">
					<div class="judul-sub-container">
						Daftar Peminjaman
					</div>
					<div class="buku">
						<table>
							<tr>
								<th>No</th>
								<th>No Peminjaman</th>
								<th>Nama Anggota</th>
								<th>Judul Buku</th>
								<th>Pengarang</th>
								<th>Penerbit</th>
								<th>Tanggal Pinjam</th>
								<th>Tanggal Pengembalian</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
							<?php
							$i=1;
							$sql_tampil = mysql_query("SELECT * FROM tb_det_peminjaman order by no_peminjaman desc");
							while ($data_tampil = mysql_fetch_array($sql_tampil)) {
								$sql_anggota = mysql_query("SELECT * from tb_anggota where kode_anggota = '$data_tampil[kode_anggota]'") or die(mysql_error());
								$data_anggota = mysql_fetch_array($sql_anggota);
								$sql_buku = mysql_query("SELECT * from tb_buku where kode_buku = '$data_tampil[kode_buku]'") or die(mysql_error());
								$data_buku = mysql_fetch_array($sql_buku);
								$data_peminjaman = mysql_fetch_array(mysql_query("SELECT * FROM tb_peminjaman where no_peminjaman = '$data_tampil[no_peminjaman]'"));
								$swr = date("Y-m-d");
								$qpn = mysql_query("SELECT * FROM tb_peminjaman where tanggal_pengembalian <= '$swr' and no_peminjaman = '$data_tampil[no_peminjaman]'") or die(mysql_error());
								$rws = mysql_num_rows($qpn);
								
							?>
							<tr class="<?php if ($rws > 0){ echo $nt = "notification"; } if($data_tampil['status'] == "Dikembalikan"){echo "Dikembalikan";} ?>">
								<td class=""><?php echo $i; ?></td>
								<td class=""><?php echo $data_tampil['no_peminjaman']; ?></td>
								<td class=">"><?php echo $data_anggota['nama_anggota']; ?></td>
								<td class=""><?php echo $data_buku['judul_buku']; ?></td>
								<td class=""><?php echo $data_buku['pengarang']; ?></td>
								<td class=""><?php echo $data_buku['penerbit']; ?></td>
								<td class=""><?php echo $data_peminjaman['tanggal_peminjaman']; ?></td>
								<td class=""><?php echo $data_peminjaman['tanggal_pengembalian']; ?></td>
								<td class=""><?php echo $data_tampil['status']; ?></td>
								<td class="">Hapus</td>
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
			</div>
		</div>
	</div>
	<script src="js/script_anggota.js"></script>
	<script src="js/script_buku.js"></script>
<?php
	include 'footer.php';
?>