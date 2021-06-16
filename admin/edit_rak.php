<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Sunting Rak
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
									mysql_query("UPDATE tb_rak set nama_rak = '$nama_rak' where kode_rak = '$kd_rak'");
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
									$kode_rak = $_GET['kode'];
									$sql_rak = mysql_query("select * from tb_rak where kode_rak='$kode_rak'");
									$data = mysql_fetch_array($sql_rak);
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
									<input type="text" name="nama_rak" placeholder="Nama Rak" value="<?php echo $data['nama_rak']; ?>">
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