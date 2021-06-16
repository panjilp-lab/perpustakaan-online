<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Sunting DDC/Klasifikasi
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
									mysql_query("UPDATE tb_ddc set nama_ddc = '$nama_ddc' where kode_ddc = '$kd_ddc'");
									?>
									<script type="text/javascript">
										alert("Data Berhasil Di Ubah !")
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
									$kode_ddc = $_GET['kode'];
									$sql_ddc = mysql_query("select * from tb_ddc where kode_ddc='$kode_ddc'");
									$data = mysql_fetch_array($sql_ddc);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_ddc" placeholder="Kode DDC/Klasifikasi" value="<?php echo $kode_ddc ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama DDC/Klasifikasi :
								</div>
								<div class="text-box">
									<input type="text" name="nama_ddc" placeholder="Nama DDC/Klasifikasi" value="<?php echo $data['nama_ddc']; ?>">
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