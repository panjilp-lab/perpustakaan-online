<?php
	include 'header.php';
?>
	<div class="induk3">
		<div class="content1">
			<div class="judul">
				Tambah Buku
			</div>
			<div class="isi-konten">
				<div class="box10">
					<div class="sub-box">
						<?php
							if (isset($_POST['simpan'])) {
								$kd_buku = $_POST['kode_buku'];
								$isbn = $_POST['isbn'];
								$judul_buku = $_POST['judul_buku'];
								$ddc = $_POST['ddc'];
								$kategori = $_POST['kategori'];
								$format = $_POST['format'];
								$pengarang = $_POST['pengarang'];
								$penerbit = $_POST['penerbit'];
								$tahun_terbit = $_POST['tahun_terbit'];
								$edisi = $_POST['edisi'];
								$stok = $_POST['stok'];
								$cover = $_FILES['cover_buku']['name'];
								$tmp = $_FILES['cover_buku']['tmp_name'];
								$dir = 'img/cover_buku/';
								if ($isbn == "" || $judul_buku == "") {
									?>
									<script type="text/javascript">
										alert("ISBN & Judul Buku tidak boleh kosong !");
									</script>
									<?php
								}else {
									move_uploaded_file($tmp, $dir.$cover) or die(mysql_error());
									mysql_query("INSERT into tb_buku (kode_buku,isbn,judul_buku,ddc,kategori,format,pengarang,penerbit,tahun_terbit,edisi,stok,cover) values('$kd_buku','$isbn','$judul_buku','$ddc','$kategori','$format','$pengarang','$penerbit','$tahun_terbit','$edisi','$stok','$cover')") or die(mysql_error());
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
									Kode Buku :
								</div>
								<?php
									$sql_kode = mysql_query("select max(kode_buku) as max_buku from tb_buku");
									$baca = mysql_fetch_array($sql_kode);
									$kode_sebelum = $baca['max_buku'];
									$no_urut = (int) substr($kode_sebelum, 3,3);
									$no_urut++;
									$char = "BK";
									$kode_buku = $char . sprintf("%03s", $no_urut);
								?>
								<div class="text-box">
									<input type="text" readonly="true" name="kode_buku" placeholder="Kode Petufas" value="<?php echo $kode_buku ?>">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									ISBN :
								</div>
								<div class="text-box">
									<input type="text" name="isbn" placeholder="ISBN">
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Judul Buku :
								</div>
								<div class="text-box">
									<input type="text" name="judul_buku" placeholder="Judul Buku">
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									DDC :
								</div>
								<div class="text-box">
									<select name="ddc" class="ddc">
										<option></option>
										<?php
										$sql_ddc = mysql_query("SELECT * FROM tb_ddc");
										while ($data_ddc = mysql_fetch_array($sql_ddc)) {
										?>
										<option><?php echo $data_ddc['nama_ddc']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Kategori :
								</div>
								<div class="text-box">
									<select name="kategori" class="ddc">
										<option></option>
										<?php
										$sql_kategori = mysql_query("SELECT * FROM tb_kategori");
										while ($data_kategori = mysql_fetch_array($sql_kategori)) {
										?>
										<option><?php echo $data_kategori['nama_kategori']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Format :
								</div>
								<div class="text-box">
									<select name="format" class="ddc">
										<option></option>
										<?php
										$sql_format = mysql_query("SELECT * FROM tb_format");
										while ($data_format = mysql_fetch_array($sql_format)) {
										?>
										<option><?php echo $data_format['nama_format']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Pengarang Buku :
								</div>
								<div class="text-box">
									<input type="text" name="pengarang" placeholder="Pengarang Buku">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Penerbit :
								</div>
								<div class="text-box">
									<select name="penerbit" class="ddc">
										<option></option>
										<?php
										$sql_penerbit = mysql_query("SELECT * FROM tb_penerbit");
										while ($data_penerbit = mysql_fetch_array($sql_penerbit)) {
										?>
										<option><?php echo $data_penerbit['nama_penerbit']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Tahun Terbit :
								</div>
								<div class="text-box">
									<input type="text" name="tahun_terbit" placeholder="Tahun Terbit">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Edisi :
								</div>
								<div class="text-box">
									<input type="text" name="edisi" placeholder="Edisi">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Stok Buku :
								</div>
								<div class="text-box">
									<input type="text" name="stok" placeholder="Stok">
								</div>
							</div><br><br><br>
							<div class="baris">
								<div class="label">
									Cover :
								</div>
								<div class="text-box">
									<input type="file" name="cover_buku" placeholder="Cover Buku">
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