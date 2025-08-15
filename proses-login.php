<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Proses Login</title>
	<link href="assets/css/alertify.min.css" rel="stylesheet" type="text/css" />
	<script src="assets/js/alertify.min.js"></script>
	<style>
		.ajs-cancel {
			display: none;
		}
	</style>
</head>
<body>

<?php
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass  = $_POST['pass'];

	if ($email == 'admin' && $pass == 'admin123') {
		$_SESSION['idUser'] = 'admin';
		echo "<script>window.location.assign('admin/index.php');</script>";
	} else {
		echo "
		<script>
			alertify.alert('Login Gagal! Username atau Password salah.', function(){
				window.location.assign('login-user.php');
			}).setHeader(' ').set({closable:false,transition:'pulse'});
		</script>
		";
	}
}
?>

</body>
</html>
