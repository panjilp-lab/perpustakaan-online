<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Petugas
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_petugas = $_POST['kode_petugas'];
								$nama_petugas = $_POST['nama_petugas'];
								$username = $_POST['username'];
								$password = md5($_POST['password']);
								$alamat = $_POST['alamat'];
								$status = $_POST['status'];
								if ($nama_petugas == "") {
									?>
									<script type="text/javascript">
										alert("Lengkapi data petugas !");
									</script>
									<?php
								}else {
									mysql_query("INSERT into tb_petugas (kode_petugas,nama_lengkap,username,password,alamat,status_keaktifan) values('$kd_petugas','$nama_petugas','$username','$password','$alamat','$status')") or die(mysql_error());
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
									Kode Petugas :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_petugas) as max_petugas from tb_petugas");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_petugas'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "PT";
									$kode_petugas = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_petugas" placeholder="Kode Petufas" value="<?php echo $kode_petugas ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Petugas :
								</div>
								<div class="text-box">
									<input type="text" name="nama_petugas" placeholder="Nama Petugas">
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Username :
								</div>
								<div class="text-box">
									<input type="text" name="username" placeholder="Username">
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Password :
								</div>
								<div class="text-box">
									<input type="password" name="password" placeholder="Password">
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Alamat :
								</div>
								<div class="text-box">
									<textarea name="alamat" placeholder="Masukkan Alamat"></textarea>
								</div>
							</div><br><br><br><br><br><br>
							<div class="baris">
								<div class="label">
									Status :
								</div>
								<div class="text-box">
									<select name="status">
										<option>-- Pilih Status --</option>
										<option>Aktif</option>
										<option>Tidak Aktif</option>
									</select>
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
</div>
</div>
<?php
	include 'footer.php';
?>