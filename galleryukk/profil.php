<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<title>Galeri Foto</title>
	<style>
		@charset "utf-8";

		/* CSS Document */
		* {
			padding: 0;
			margin: 0;
			font-family: 'Quicksand', sans-serif;
		}

		body {
			background-color: #f8f8f8;
		}

		a {
			color: inherit;
			text-decoration: none;
		}

		#bg-login {
			display: flex;
			height: 100vh;
			justify-content: center;
			align-items: center;
		}

		.box-login {
			width: 300px;
			min-height: 200px;
			border: 1px solid #ccc;
			background-color: #fff;
			padding: 15px;
			box-sizing: border-box;
		}

		.box-login h2 {
			text-align: center;
			margin-bottom: 15px;
		}

		.input-control {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			box-sizing: border-box;
		}

		.btn {
			padding: 8px 15px;
			background-color: #2C3E50;
			color: #fff;
			border: none;
			cursor: pointer;
		}

		header {
			background-color: #2C3E50;
			color: #fff;
		}

		header h1 {
			float: left;
			padding: 10px 0;
		}

		header ul {
			float: right;
		}

		header ul li {
			display: inline-block;
		}

		header ul li a {
			padding: 20px 0 20px 15px;
			display: inline-block;
		}

		footer {
			padding: 25px 0;
		}

		.container {
			width: 80%;
			margin: 0 auto;
		}

		.container:after {
			content: '';
			display: block;
			clear: both;
		}

		.section {
			padding: 25px 0;
		}

		.box {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 15px;
			box-sizing: border-box;
			margin: 10px 0 25px 0;
		}

		.box:after {
			content: '';
			display: block;
			clear: both;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
		}

		.table tr {
			height: 30px;
		}

		.table tr td {
			padding: 5px 10px;
		}

		.search {
			padding: 15px 0;
			background-color: #fff;
			border: 1px solid #ccc;
			text-align: center;
		}

		.search input[type=text] {
			width: 60%;
			padding: 10px;
		}

		.search input[type=submit] {
			padding: 12px 15px;
			background-color: #C70039;
			color: #fff;
			border: none;
			cursor: pointer;
		}

		.col-5 {
			width: 20%;
			height: 100px;
			text-align: center;
			float: left;
			padding: 10px;
			box-sizing: border-box;
		}

		.col-4 {
			width: 25%;
			height: 230px;
			border: 1px solid #ccc;
			float: left;
			padding: 10px;
			box-sizing: border-box;
			margin-bottom: 10px;
		}

		.col-4:hover {
			box-shadow: 0 0 3px #999;
		}

		.col-4 img {
			width: 100%;
		}

		.col-4 .nama {
			font-weight: bold;
			color: #666;
			margin-bottom: 5px;
		}

		.col-4 .admin {
			font-weight: bold;
			color: #FC3F81;
		}

		.footer p {
			margin-bottom: 10px;
		}

		.footer small {
			margin-top: 25px;
			display: inline-block;
		}

		.col-2 {
			width: 50%;
			min-height: 200px;
			padding: 10px;
			box-sizing: border-box;
			float: left;
		}

		.col-2 img {
			border: 1px solid #f9f9f9;
			padding: 5px;
			box-sizing: border-box;
		}

		.col-2 h3 {
			margin-bottom: 10px;
		}

		.col-2 h4 {
			color: #C70039;
		}

		.col-2 p {
			margin: 15px 0;
			text-align: justify;
			line-height: 25px;
			font-size: 14px;
		}

		/* Default Styles */
		.hamburger-menu {
			display: none;
			/* Hide the hamburger menu by default */
		}

		.popup-menu {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.9);
			z-index: 1000;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}

		.popup-nav-links {
			list-style: none;
			padding: 0;
			margin: 0;
			text-align: center;
		}

		.popup-nav-links li {
			margin: 15px 0;
		}

		.popup-nav-links li a {
			color: #fff;
			font-size: 24px;
			text-decoration: none;
		}

		footer {
			padding: 25px 0;
			background-color: #2C3E50;
			color: #fff;
			text-align: center;
		}

		footer small {
			display: block;
			font-weight: 300;
			letter-spacing: 1px;
		}

		footer a {
			color: #ECF0F1;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		footer a:hover {
			color: #3498DB;
		}

		/* Mobile Styles */
		@media screen and (max-width: 768px) {

			/* Navbar becomes hamburger menu */
			.popup-menu {
				display: none;
			}

			header ul {
				display: none;
				/* Hide the navbar links */
			}

			.hamburger-menu {
				display: inline-block;
				/* Show the hamburger menu on mobile */
				float: right;
				padding: 15px 20px;
				cursor: pointer;
			}

			/* Adjust categories to display icons and text */
			.col-5 p {
				display: block;
				/* Show the text below the icons on mobile */
				text-align: center;
				/* Center-align the text */
				font-size: 14px;
				/* Adjust the font size for readability */
				margin-top: 5px;
				/* Add some space above the text */
			}

			.col-5 {
				width: 25%;
				/* Adjust the size of the icons */
				text-align: center;
				/* Center-align the icons */
			}

			/* Professional layout for the 'Foto Terbaru' section */
			.col-4 {
				width: 100%;
				/* Make each photo take full width */
				height: auto;
				/* Adjust height to fit the image */
				margin-bottom: 15px;
				/* Space between photos */
			}

			.col-4 img {
				height: auto;
			}

			.box {
				padding: 10px;
				/* Add padding to the box */
			}

			/* Show the hamburger menu on mobile */
			.hamburger-menu i {
				font-size: 24px;
				color: #fff;
			}

			/* Show the hamburger menu on mobile */
			.hamburger-menu i {
				font-size: 24px;
				color: #fff;
			}
		}
	</style>
</head>

<body>
	<header>
		<div class="container">
			<h1><a href="dashboard.php">G A L E R I</a></h1>
			<div class="hamburger-menu">
				<i class="fas fa-bars"></i>
			</div>
			<ul class="nav-links">
				<li><a href="dashboard.php">Beranda</a></li>
				<li><a href="galeri1.php">Galeri</a></li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="data-image.php">Data Foto</a></li>
				<li><a href="Keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- Popup Menu -->
	<div class="popup-menu">
		<ul class="popup-nav-links">
			<li><a href="dashboard.php">Beranda</a></li>
			<li><a href="galeri1.php">Galeri</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="data-image.php">Data Foto</a></li>
			<li><a href="Keluar.php">Keluar</a></li>
		</ul>
	</div>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Profil</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
					<input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
					<input type="submit" name="submit" value="Ubah Profil" class="btn">
				</form>
				<?php
				if (isset($_POST['submit'])) {

					$nama   = $_POST['nama'];
					$user   = $_POST['user'];
					$hp     = $_POST['hp'];
					$email  = $_POST['email'];
					$alamat = $_POST['alamat'];

					$update = mysqli_query($conn, "UPDATE tb_admin SET 
					                  admin_name = '" . $nama . "',
									  username = '" . $user . "',
									  admin_telp = '" . $hp . "',
									  admin_email = '" . $email . "',
									  admin_address = '" . $alamat . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
					if ($update) {
						echo '<script>alert("Ubah data berhasil")</script>';
						echo '<script>window.location="profil.php"</script>';
					} else {
						echo 'gagal ' . mysqli_error($conn);
					}
				}
				?>
			</div>

			<h3>Ubah password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password" class="btn">
				</form>
				<?php
				if (isset($_POST['ubah_password'])) {

					$pass1   = $_POST['pass1'];
					$pass2   = $_POST['pass2'];

					if ($pass2 != $pass1) {
						echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
					} else {
						$u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
									  password = '" . $pass1 . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
						if ($u_pass) {
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="profil.php"</script>';
						} else {
							echo 'gagal ' . mysqli_error($conn);
						}
					}
				}
				?>
			</div>
		</div>
	</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2024 - Web Galeri Foto.</small>
		</div>
	</footer>
</body>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const hamburger = document.querySelector('.hamburger-menu');
		const popupMenu = document.querySelector('.popup-menu');

		hamburger.addEventListener('click', function() {
			popupMenu.style.display = 'flex'; // Show the popup menu
		});

		popupMenu.addEventListener('click', function() {
			popupMenu.style.display = 'none'; // Hide the popup menu when clicked
		});
	});
</script>

</html>