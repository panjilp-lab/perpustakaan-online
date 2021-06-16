<?php
	include 'inc/connect.php';
	$kode = $_GET['kode'];
	$sql_penerbit = mysql_query("SELECT nama_penerbit from tb_penerbit where kode_penerbit = '$kode'");
	$data = mysql_fetch_array($sql_penerbit);
?>
<script type="text/javascript">
	if (confirm("Apakah anda yakin ingin menghapus rak <?php echo $data['nama_penerbit'] ?> ?")) {
		<?php
		header("location:data_penerbit.php");
		?>
	}else {
		<?php
			mysql_query("DELETE from tb_penerbit where kode_penerbit = '$kode'");
			header("location:data_penerbit.php");
		?>
	}
</script>	