<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}
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
			<h3>Tambah Data Foto</h3>
			<div class="box">

				<form action="" method="POST" enctype="multipart/form-data">

					<?php $result = mysqli_query($conn, "select * from tb_category");
					$jsArray = "var prdName = new Array();\n";
					echo '<select class="input-control" name="kategori" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" required>  <option>-Pilih Kategori Foto-</option>';
					while ($row = mysqli_fetch_array($result)) {
						echo ' <option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
						$jsArray .= "prdName['" . $row['category_id'] . "'] = '" . addslashes($row['category_name']) . "';\n";
					}
					echo '</select>'; ?>
					</select>
					<input type="hidden" name="nama_kategori" id="prd_name">
					<input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>">
					<input type="text" name="namaadmin" class="input-control" value="<?php echo $_SESSION['a_global']->admin_name ?>" readonly="readonly">
					<input type="text" name="nama" class="input-control" placeholder="Nama Foto" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br />
					<input type="file" name="gambar" class="input-control" required>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1">Public</option>
						<option value="0">Private</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php
				if (isset($_POST['submit'])) {

					// print_r($_FILES[gambar']);
					// menampung inputan dari form
					$kategori  = $_POST['kategori'];
					$nama_ka   = $_POST['nama_kategori'];
					$ida  	   = $_POST['adminid'];
					$user	  = $_POST['namaadmin'];
					$nama      = $_POST['nama'];
					$deskripsi = $_POST['deskripsi'];
					$status    = $_POST['status'];

					// menampung data file yang diupload
					$filename = $_FILES['gambar']['name'];
					$tmp_name = $_FILES['gambar']['tmp_name'];

					$type1 = explode('.', $filename);
					$type2 = $type1[1];

					$newname = 'foto' . time() . '.' . $type2;

					// menampung data format file yang diizinkan
					$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif ');

					// validasi format file
					if (!in_array($type2, $tipe_diizinkan)) {
						// jika format file tidak ada di dalam tipe diizinkan
						echo '<script>alert("Format file tidak diizinkan")</script>';
					} else {
						// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
						// proses upload file sekaligus insert ke database
						move_uploaded_file($tmp_name, './foto/' . $newname);

						$insert = mysqli_query($conn, "INSERT INTO tb_image VALUES (
						               null,
									   '" . $kategori . "',
									   '" . $nama_ka . "',
									   '" . $ida . "',
									   '" . $user . "',
									   '" . $nama . "',
									   '" . $deskripsi . "',
									   '" . $newname . "',
									   '" . $status . "',
									   null
						                   ) ");

						if ($insert) {
							echo '<script>alert("Tambah Foto berhasil")</script>';
							echo '<script>window.location="data-image.php"</script>';
						} else {
							echo 'gagal' . mysqli_error($conn);
						}
					}
				}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2024 - Web Galeri Foto.</small>
		</div>
	</footer>
	<script>
		CKEDITOR.replace('deskripsi');
	</script>
	<script type="text/javascript">
		<?php echo $jsArray; ?>
	</script>
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
</body>

</html>