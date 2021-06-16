<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Kategori
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_kategori = $_POST['kode_kategori'];
								$nama_kategori = $_POST['nama_kategori'];
								if ($nama_kategori == "") {
									?>
									<script type="text/javascript">
										alert("Nama Kategori Harap Di Isi !");
									</script>
									<?php
								}else {
									mysql_query("INSERT into tb_kategori values('$kd_kategori','$nama_kategori')");
									?>
									<script type="text/javascript">
										alert("Data Berhasil Dimasukkan !")
									</script>
									<?php
								}
							}
						?>
						<form method="post">
							<div class="baris">
								<div class="label">
									Kode Kategori :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_kategori) as max_kategori from tb_kategori");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_kategori'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "K";
									$kode_kategori = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_kategori" placeholder="Kode Kategori" value="<?php echo $kode_kategori ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Kategori :
								</div>
								<div class="text-box">
									<input type="text" name="nama_kategori" placeholder="Nama Kategori">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									
								</div>
								<div class="text-box">
									<input type="submit" name="simpan" value="Simpan">&nbsp;
								</div>
								<div class="text-box">
									<input type="reset" name="" value="Reset">
								</div>
							</div><br>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include 'footer.php';
?>