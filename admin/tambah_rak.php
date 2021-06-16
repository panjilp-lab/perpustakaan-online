<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Rak
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_rak = $_POST['kode_rak'];
								$nama_rak = $_POST['nama_rak'];
								if ($nama_rak == "") {
									?>
									<script type="text/javascript">
										alert("Nama Rak Harap Di Isi !");
									</script>
									<?php
								}else {
									mysql_query("INSERT into tb_rak values('$kd_rak','$nama_rak')");
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
									Kode Rak :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_rak) as max_rak from tb_rak");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_rak'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "R";
									$kode_rak = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_rak" placeholder="Kode Rak" value="<?php echo $kode_rak ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Rak :
								</div>
								<div class="text-box">
									<input type="text" name="nama_rak" placeholder="Nama Rak">
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