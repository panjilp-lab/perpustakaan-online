<?php
	include 'inc/connect.php';
	$kode = $_GET['kode'];
	$sql_format = mysql_query("SELECT nama_format from tb_format where kode_format = '$kode'");
	$data = mysql_fetch_array($sql_format);
?>
<script type="text/javascript">
	if (confirm("Apakah anda yakin ingin menghapus rak <?php echo $data['nama_format'] ?> ?")) {
		<?php
		header("location:data_format.php");
		?>
	}else {
		<?php
			mysql_query("DELETE from tb_format where kode_format = '$kode'");
			header("location:data_format.php");
		?>
	}
</script>