<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Sunting Penerbit
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
									mysql_query("UPDATE tb_penerbit set nama_penerbit = '$nama_penerbit' where kode_penerbit = '$kd_penerbit'");
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
									Kode Penerbit :
								</div>
								<?php
									$kode_penerbit = $_GET['kode'];
									$sql_penerbit = mysql_query("select * from tb_penerbit where kode_penerbit='$kode_penerbit'");
									$data = mysql_fetch_array($sql_penerbit);
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
									<input type="text" name="nama_penerbit" placeholder="Nama Penerbit" value="<?php echo $data['nama_penerbit']; ?>">
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