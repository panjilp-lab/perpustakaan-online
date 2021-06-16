<?php
	include 'inc/connect.php';
?>
<header>
	<link rel="stylesheet" type="text/css" href="css/iframe.css">
</header>
<div class="induk3">
		<div class="content1">
			<div class="isi-konten" id="table-buku">
				<table>
					<tr>
						<th>No</th>
						<th>Kode Buku</th>
						<th>Judul Buku</th>
						<th>DDC</th>
						<th>Kategori</th>
						<th>Pengerangan</th>
						<th>No ISBN</th>
					</tr>
					<?php
						$i=1;
						$sql_buku = mysql_query("SELECT * FROM tb_buku order by kode_buku desc");
						while ($data = mysql_fetch_array($sql_buku)) {
							
						?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['kode_buku']; ?></td>
						<td><?php echo $data['judul_buku']; ?></td>
						<td><?php echo $data['ddc']; ?></td>
						<td><?php echo $data['kategori']; ?></td>
						<td><?php echo $data['pengarang']; ?></td>
						<td><?php echo $data['isbn']; ?></td>
					</tr>
						<?php
						$i++;
						}
					?>
				</table>
			</div>
		</div>
	</div>