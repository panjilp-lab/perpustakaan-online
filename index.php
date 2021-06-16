<?php
	include 'admin/inc/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="selamat_datang">
		<h1>Selamat Datang</h1>
	</div>
	<div class="berita_acara">
		<marquee>Silahkan isi berita acara !</marquee>
	</div>
	<div class="berita_acara">
		<?php
			if (isset($_POST['simpan'])) {
				$tanggal = date("Y-m-d");
				$nama = $_POST['nama'];
				$tujuan = $_POST['tujuan'];

				if ($nama == "" || $tujuan == "") {
					echo "Lengkapi Formulir Berita Acara !";
				}else {
					mysql_query("INSERT INTO tb_berita_acara values('','$tanggal','$nama','$tujuan')");
					?>
						<script type="text/javascript">
							alert("Data Berhasil dimasukkan, Terimakasih sudah berkenan berkunjung ke Perpustakaan");
						</script>
					<?php
				}
			}
		?>
		<form method="POST">
			<input type="text" name="nama" placeholder="Masukkan nama anda"><br>
			<input type="text" name="tujuan" placeholder="Apa tujuan anda ke perpustakaan ?"><br>
			<input type="submit" name="simpan" value="Simpan"><br>
			<input type="reset" name="" value="Batal">
		</form>
	</div>
</body>
</html>