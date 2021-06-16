<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah DDC/Klasifikasi
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_ddc = $_POST['kode_ddc'];
								$nama_ddc = $_POST['nama_ddc'];
								if ($nama_ddc == "") {
									?>
									<script type="text/javascript">
										alert("Nama DDC/Klasifikasi Harap Di Isi !");
									</script>
									<?php
								}else {
									mysql_query("INSERT into tb_ddc values('$kd_ddc','$nama_ddc')");
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
									Kode DDC/Klasifikasi :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_ddc) as max_ddc from tb_ddc");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_ddc'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "DDC";
									$kode_ddc = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_ddc" placeholder="Kode ddc/klasifikasi" value="<?php echo $kode_ddc ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama DDC/Klasifikasi :
								</div>
								<div class="text-box">
									<input type="text" name="nama_ddc" placeholder="Nama ddc/klasifikasi">
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