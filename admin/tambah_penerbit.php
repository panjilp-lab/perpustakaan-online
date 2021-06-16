<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Penerbit
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_penerbit = $_POST['kode_penerbit'];
								$nama_penerbit = $_POST['nama_penerbit'];
								if ($nama_penerbit == "") {
									?>
									<script type="text/javascript">
										alert("Nama Penerbit Harap Di Isi !");
									</script>
									<?php
								}else {
									mysql_query("INSERT into tb_penerbit values('$kd_penerbit','$nama_penerbit')");
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
									Kode Penerbit :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_penerbit) as max_penerbit from tb_penerbit");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_penerbit'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "P";
									$kode_penerbit = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_penerbit" placeholder="Kode Penerbit" value="<?php echo $kode_penerbit ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Penerbit :
								</div>
								<div class="text-box">
									<input type="text" name="nama_penerbit" placeholder="Nama Penerbit">
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