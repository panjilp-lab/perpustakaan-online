<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Sunting Format
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
										alert("Nama Format Harap Di Isi !");
									</script>
									<?php
								}else {
									mysql_query("UPDATE tb_format set nama_format = '$nama_format' where kode_format = '$kd_format'");
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
									Kode Rak :
								</div>
								<?php
									$kode_format = $_GET['kode'];
									$sql_format = mysql_query("select * from tb_format where kode_format='$kode_format'");
									$data = mysql_fetch_array($sql_format);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_format" placeholder="Kode Rak" value="<?php echo $kode_format ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Rak :
								</div>
								<div class="text-box">
									<input type="text" name="nama_format" placeholder="Nama Rak" value="<?php echo $data['nama_format']; ?>">
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