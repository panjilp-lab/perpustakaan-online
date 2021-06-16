<?php
	include 'inc/connect.php';
	$kode = $_GET['kode'];
	$sql_ddc = mysql_query("SELECT nama_ddc from tb_ddc where kode_ddc = '$kode'");
	$data = mysql_fetch_array($sql_ddc);
?>
<script type="text/javascript">
	if (confirm("Apakah anda yakin ingin menghapus rak <?php echo $data['nama_ddc'] ?> ?")) {
		<?php
		header("location:data_ddc.php");
		?>
	}else {
		<?php
			mysql_query("DELETE from tb_ddc where kode_ddc = '$kode'");
			header("location:data_ddc.php");
		?>
	}
</script>	