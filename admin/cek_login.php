
<?php
	session_start();
	include 'inc/connect.php';
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if ($username == "" || $password == "") {
			?>
				<script type="text/javascript">
					alert("Username / Password tidak boleh kosong !");
					window.location.href = "http://localhost/perpus/admin/login.php";
				</script>
			<?php
		}else {
			$q_user = mysql_query("SELECT * FROM tb_admin where username = '$username'");
			$row = mysql_num_rows($q_user);

			if ($row < 1) {
				?>
				<script type="text/javascript">
					alert("Maaf anda belum terdaftar !");
					window.location.href = "http://localhost/perpus/admin/login.php";
				</script>
			<?php
			}else {
				$data = mysql_fetch_array($q_user);
				if ($password != $data['password']) {
					?>
				<script type="text/javascript">
					alert("Maaf password anda salah !");
					window.location.href = "http://localhost/perpus/admin/login.php";
				</script>
			<?php
				}else {
					$_SESSION['username'] = $data['username'];
					header("location:index.php");
				}
			}
		}
	}
?>