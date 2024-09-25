<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Galeri Foto</title>
    <style>
        @charset "utf-8";

        .btn-like {
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s ease;
            margin-right: 5px;
            /* Menambahkan jarak antara love icon dan jumlah like */
        }

        .btn-like:hover {
            color: red;
            /* Warna merah saat di hover */
        }

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
            /* Semi-transparent black background */
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

        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
            }

            .col-5 {
                width: 50%;
                margin-bottom: 10px;
            }

            .col-4 {
                width: 50%;
                height: 300px;
            }

            .col-2 {
                width: 100%;
            }

            /* Navbar becomes hamburger menu */
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
    </style>
</head>

<body>
    <!-- header -->
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

    <div class="section">
        <div class="container">
            <h3>Detail Foto</h3>
            <div class="box">
                <div class="col-2">
                    <img src="foto/<?php echo $p->image ?>" width="100%" />
                </div>
                <div class="col-2">
                    <h3><?php echo $p->image_name ?><br />Kategori : <?php echo $p->category_name  ?></h3>
                    <h4>Nama User : <?php echo $p->admin_name ?><br />
                        Upload Pada Tanggal : <?php echo $p->date_created  ?></h4>
                    <p>Deskripsi :<br />
                        <?php echo $p->image_description ?>
                    </p>

                    <!-- Like button -->
                    <?php
                    // Cek status like dari tb_likes
                    $query_like = "SELECT * FROM tb_likes WHERE admin_id = '" . $_SESSION['admin_id'] . "' AND image_id = '" . $p->image_id . "'";
                    $result_like = mysqli_query($conn, $query_like);
                    $like_status = mysqli_fetch_assoc($result_like);

                    // Hitung jumlah like untuk gambar ini
                    $query_count_likes = "SELECT COUNT(*) as total_likes FROM tb_likes WHERE image_id = '" . $p->image_id . "' AND liked = 1";
                    $result_count_likes = mysqli_query($conn, $query_count_likes);
                    $total_likes = mysqli_fetch_assoc($result_count_likes)['total_likes'];

                    // Ubah warna icon love jika sudah di-like
                    $like_color = ($like_status && $like_status['liked'] == 1) ? 'color:red' : 'color:black';
                    ?>

                    <!-- Tampilkan tombol like dengan ikon love -->
                    <a href="like_comment.php?image_id=<?php echo $p->image_id ?>" class="btn-like" style="text-decoration:none;">
                        <i class="fas fa-heart" style="<?php echo $like_color; ?>;"></i>
                    </a>
                    <span><?php echo $total_likes; ?> Like(s)</span>


                    <!-- Comment form -->
                    <form method="POST" action="like_comment.php">
                        <textarea name="comment" required></textarea>
                        <input type="hidden" name="image_id" value="<?php echo $p->image_id ?>">
                        <input type="submit" value="Kirim Komentar">
                    </form>

                    <!-- Display Comments -->
                    <br>
                    <h4>Komentar:</h4>
                    <?php
                    // Ambil semua komentar untuk gambar ini dengan join ke tb_admin, termasuk date_created
                    $query_comments = "SELECT c.comment, c.date_created, a.admin_name 
                   FROM tb_comments c 
                   JOIN tb_admin a ON c.admin_id = a.admin_id 
                   WHERE c.image_id = '" . $p->image_id . "'";

                    $result_comments = mysqli_query($conn, $query_comments);

                    // Tampilkan komentar dengan admin_name dan date_created
                    while ($comment = mysqli_fetch_assoc($result_comments)) {
                        echo "<p><strong>" . $comment['admin_name'] . ":</strong> " . $comment['comment'] . " <span style='font-size:10px; color:grey;'>(" . date('d M Y, H:i', strtotime($comment['date_created'])) . ")</span></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>

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