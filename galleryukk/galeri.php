<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);
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

        .input-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn {
            padding: 8px 15px;
            background-color: #C70039;
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
            border: 1px solid #2C3E50;
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
            background-color: #2C3E50;
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
            box-shadow: 0 0 3px #2C3E50;
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
            color: #3498DB;
        }

        footer {
            padding: 25px 0;
            background-color: #2C3E50;
            color: #fff;
            text-align: center;
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
            color: #2C3E50;
        }

        .col-2 p {
            margin: 15px 0;
            text-align: justify;
            line-height: 25px;
            font-size: 14px;
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

        .icon-wrapper {
            display: flex;
            justify-content: center;
            /* Center the icon horizontally */
            align-items: center;
            /* Center the icon vertically */
            width: 100%;
            /* Make the wrapper take full width */
            margin-bottom: 10px;
            /* Space between icon and text */
        }

        .icon-wrapper i {
            font-size: 24px;
            /* Adjust the size of the icon */
            color: white;
            background-color: #2C3E50;
            padding: 15px;
            border-radius: 50%;
            /* Makes the icon circular */
        }

        .col-5 {
            width: 20%;
            height: 100px;
            text-align: center;
            float: left;
            padding: 10px;
            box-sizing: border-box;
        }

        .col-5 p {
            margin-top: 10px;
            /* Space between icon and text */
            font-size: 14px;
            color: #333;
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
            <h1><a href="index.php">G A L E R I</a></h1>
            <div class="hamburger-menu">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <div class="popup-menu">
        <ul class="popup-nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="registrasi.php">Registrasi</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Galeri Foto</h3>
            <div class="box">
                <?php
                // Jika ada parameter pencarian atau kategori yang dipilih, tambahkan kondisi ke query
                $where = '';
                if (!empty($_GET['search']) || !empty($_GET['kat'])) {
                    $where = "AND image_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
                }
                // Ambil semua foto dari database yang sesuai dengan kondisi
                $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
                // Jika ada foto yang ditemukan, tampilkan dalam bentuk grid
                if (mysqli_num_rows($foto) > 0) {
                    while ($p = mysqli_fetch_array($foto)) {
                ?>
                        <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
                            <div class="col-4">
                                <img src="foto/<?php echo $p['image'] ?>" alt="<?php echo $p['image_name'] ?>" height="180px" />
                                <p class="nama"><?php echo substr($p['image_name'], 0, 30) ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Foto tidak ada</p>
                <?php } ?>
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

        // Function to toggle the popup menu visibility
        function togglePopupMenu() {
            if (popupMenu.style.display === 'flex') {
                popupMenu.style.display = 'none';
            } else {
                popupMenu.style.display = 'flex';
            }
        }

        hamburger.addEventListener('click', function() {
            togglePopupMenu();
        });

        popupMenu.addEventListener('click', function() {
            togglePopupMenu();
        });
    });
</script>

</html>