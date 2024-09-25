<?php
include 'db.php';
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

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
                <form id="registerForm" action="" method="POST" onsubmit="return validateForm()">
                    <input type="text" id="nama" name="nama" placeholder="Nama User" class="input-control" required>
                    <input type="text" id="user" name="user" placeholder="Username" class="input-control" required>
                    <input type="password" id="pass" name="pass" placeholder="Password" class="input-control" required>
                    <input type="text" id="tlp" name="tlp" placeholder="Nomor Telpon" class="input-control" required>
                    <input type="email" id="email" name="email" placeholder="E-mail" class="input-control" required>
                    <input type="text" id="almt" name="almt" placeholder="Alamat" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <script>
                    function validateForm() {
                        // Ambil semua elemen input
                        var inputs = document.querySelectorAll('.input-control');
                        var isValid = true;

                        // Periksa apakah ada input yang kosong
                        inputs.forEach(function(input) {
                            if (input.value.trim() === '') {
                                isValid = false;
                                alert('Field ' + input.placeholder + ' tidak boleh kosong.');
                            }
                        });

                        // Mencegah submit jika ada field kosong
                        return isValid;
                    }
                </script>

                <?php
                if (isset($_POST['submit'])) {
                    $nama = ucwords($_POST['nama']);
                    $username = $_POST['user'];
                    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Menggunakan hashing untuk password
                    $telpon = $_POST['tlp'];
                    $mail = $_POST['email'];
                    $alamat = ucwords($_POST['almt']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                                        null,
                                        '" . $nama . "',
                                        '" . $username . "',
                                        '" . $password . "',
                                        '" . $telpon . "',
                                        '" . $mail . "',
                                        '" . $alamat . "',
                                        NULL, 
                                        NULL)
                                        
                                        ");
                    if ($insert) {
                        echo '<script>alert("Registrasi berhasil")</script>';
                        echo '<script>window.location="login.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>

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

        // Function to check if the screen width is mobile size
        function isMobile() {
            return window.innerWidth <= 768;
        }

        hamburger.addEventListener('click', function() {
            if (isMobile()) {
                // Show the popup menu only on mobile
                popupMenu.style.display = 'flex';
                console.log('Popup should be visible now');
            }
        });

        popupMenu.addEventListener('click', function() {
            if (isMobile()) {
                // Hide the popup menu only on mobile
                popupMenu.style.display = 'none';
                console.log('Popup should be hidden now');
            }
        });
    });
</script>

</html>