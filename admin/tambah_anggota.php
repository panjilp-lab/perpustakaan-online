<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Anggota
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_anggota = $_POST['kode_anggota'];
								$nama_anggota = $_POST['nama_anggota'];
								$username = $_POST['username'];
								$password = md5($_POST['password']);
								$alamat = $_POST['alamat'];
								$tingkat = $_POST['tingkat'];
								$jurusan = $_POST['jurusan'];
								$no_kelas = $_POST['no_kelas'];
								$no_hp = $_POST ['no_hp'];
								//ambil data file
								$nama_file = $_FILES['foto']['name'];
								$nama_sementara = $_FILES['foto']['tmp_name'];
								//lokasi upload
								$dir = 'img/foto_anggota/';
								if ($nama_anggota == "" || $username == "" || $password == "" || $alamat == "" || $tingkat == "" || $jurusan == "" || $no_hp == "" || $no_kelas == "") {
									?>
									<script type="text/javascript">
										alert("Lengkapi data Anggota !");
									</script>
									<?php
								}else {
									move_uploaded_file($nama_sementara, $dir.$nama_file) or die(mysql_error());
									mysql_query("INSERT into tb_anggota (kode_anggota,nama_anggota,tingkat,jurusan,no_kelas,no_hp,alamat,username,password,foto) values('$kd_anggota','$nama_anggota','$tingkat','$jurusan','$no_kelas','$no_hp','$alamat','$username','$password','$nama_file')") or die(mysql_error());
									?>
									<script type="text/javascript">
										alert("Data Berhasil Dimasukkan !")
									</script>
									<?php
								}
							}
						?>
						<form method="post" enctype="multipart/form-data">
							<div class="baris">
								<div class="label">
									Kode Anggota :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_anggota) as max_anggota from tb_anggota");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_anggota'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "ANG";
									$kode_anggota = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_anggota" placeholder="Kode Petufas" value="<?php echo $kode_anggota ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Nama Anggota :
								</div>
								<div class="text-box">
									<input type="text" name="nama_anggota" placeholder="Nama Anggota">
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Kelas :
								</div>
								<div class="text-box">
									<select name="tingkat">
										<option></option>
										<option>X</option>
										<option>XI</option>
										<option>XII</option>
									</select>
									<select name="jurusan">
										<option></option>
										<option>Teknik Kendaraan Ringan (TKR)</option>
										<option>Teknik Sepeda Motor (TSM)</option>
										<option>Rekayasa Perangkat Lunak (RPL)</option>
									</select>
									<select name="no_kelas">
										<option></option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									No HP :
								</div>
								<div class="text-box">
									<input type="text" name="no_hp" placeholder="No HP">
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
									Foto :
								</div>
								<div class="text-box">
									<input type="file" name="foto" placeholder="FOTO">
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
</div>
</div>
<?php
	include 'footer.php';
?>