<?php
	include 'inc/connect.php';
	$kode = $_GET['kode'];
	$sql_rak = mysql_query("SELECT nama_rak from tb_rak where kode_rak = '$kode'");
	$data = mysql_fetch_array($sql_rak);
?>
<script type="text/javascript">
	if (confirm("Apakah anda yakin ingin menghapus rak <?php echo $data['nama_rak'] ?> ?")) {
		<?php
		header("location:data_rak.php");
		?>
	}else {
		<?php
			mysql_query("DELETE from tb_rak where kode_rak = '$kode'");
			header("location:data_rak.php");
		?>
	}
</script>	