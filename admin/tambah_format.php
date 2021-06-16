<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Format
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_format = $_POST['kode_format'];
								$nama_format = $_POST['nama_format'];
								if ($nama_format == "") {
									?>
									<script type="text/javascript">
										alert("Nama Rak Harap Di Isi !");
									</script>
									<?php
								}else {
									mysql_query("INSERT into tb_format values('$kd_format','$nama_format')");
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
									Kode Format :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_format) as max_format from tb_format");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_format'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "F";
									$kode_format = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_format" placeholder="Kode Rak" value="<?php echo $kode_format ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Format :
								</div>
								<div class="text-box">
									<input type="text" name="nama_format" placeholder="Nama Format">
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