<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
// Jumlah data per halaman
$limit = 5;

// Halaman yang sedang dibuka, default halaman 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

// Ambil ID user dari session
$user = $_SESSION['a_global']->admin_id;

// Query untuk menghitung total data
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_image WHERE admin_id = '$user'");
$total_rows = mysqli_fetch_assoc($total_result)['total'];

// Hitung total halaman
$total_pages = ceil($total_rows / $limit);

// Query untuk mengambil data sesuai halaman
$foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' LIMIT $start, $limit");

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
            background-color: #fdfdfd;
            /* Light background for table */
            border: 1px solid #ddd;
            /* Soft border */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
        }

        .table th,
        .table td {
            padding: 12px 15px;
            /* Increased padding for better readability */
            text-align: left;
            /* Left-align text for clarity */
            border-bottom: 1px solid #ddd;
            /* Light border between rows */
            color: #333;
            /* Darker text for contrast */
            font-size: 14px;
            /* Consistent font size */
        }

        .table th {
            background-color: #f4f4f4;
            /* Light gray background for header */
            font-weight: bold;
            /* Bold header text */
            text-transform: uppercase;
            /* Uppercase header text */
        }

        .table tr:hover {
            background-color: #f1f1f1;
            /* Highlight row on hover */
        }

        .table td a {
            color: #007BFF;
            /* Blue color for links */
            text-decoration: none;
            /* Remove underline from links */
        }

        .table td a:hover {
            text-decoration: underline;
            /* Underline links on hover */
        }

        .table td img {
            width: 60px;
            /* Adjusted image size */
            height: auto;
            border-radius: 4px;
            /* Slightly rounded corners */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            /* Light shadow on images */
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

        .btn-add-data {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2C3E50;
            color: #fff;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-add-data:hover {
            background-color: #008000;
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

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #000;
            padding: 10px 15px;
            text-decoration: none;
            margin: 0 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .pagination a.active {
            background-color: #2C3E50;
            color: white;
            border: 1px solid #2C3E50;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        /* Mobile Styles */
        @media screen and (max-width: 768px) {
            .box {
                padding: 15px;
                overflow-x: auto;
                /* Menambahkan scroll horizontal */
            }

            .table-responsive {
                width: 100%;
                overflow-x: auto;
                /* Mengaktifkan scroll horizontal */
                -webkit-overflow-scrolling: touch;
                /* Agar gulir lebih halus di perangkat sentuh */
            }

            .table {
                width: 100%;
                border-collapse: collapse;
            }

            .table th,
            .table td {
                padding: 10px;
                text-align: left;
            }

            .table img {
                width: 50px;
                height: auto;
            }

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
            <h3>Data Galeri Foto</h3>
            <div class="box">
                <p><a href="tambah-image.php" class="btn-add-data">Tambah Data</a></p><br>
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table border="1" cellspacing="0" class="table">
                            <thead>
                                <tr>
                                    <th width="60px">No</th>
                                    <th>Kategori</th>
                                    <th>Nama User</th>
                                    <th>Nama Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($foto) > 0) {
                                    $no = $start + 1; // Mulai nomor sesuai halaman
                                    while ($row = mysqli_fetch_array($foto)) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $row['admin_name'] ?></td>
                                            <td><?php echo $row['image_name'] ?></td>
                                            <td><?php echo $row['image_description'] ?></td>
                                            <td><a href="foto/<?php echo $row['image'] ?>" target="_blank"><img src="foto/<?php echo $row['image'] ?>" width="50px"></a></td>
                                            <td><?php echo ($row['image_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                            <td>
                                                <a href="edit-image.php?id=<?php echo $row['image_id'] ?>" style="color: #4CAF50; margin-right: 10px;">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" style="color: #f44336;" onclick="return confirm('Yakin Ingin Hapus ?')">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?php echo $page - 1 ?>">&#171; Previous</a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i ?>" class="<?php echo ($i == $page) ? 'active' : '' ?>"><?php echo $i ?></a>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <a href="?page=<?php echo $page + 1 ?>">Next &#187;</a>
                        <?php endif; ?>
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

        hamburger.addEventListener('click', function() {
            popupMenu.style.display = 'flex'; // Show the popup menu
        });

        popupMenu.addEventListener('click', function() {
            popupMenu.style.display = 'none'; // Hide the popup menu when clicked
        });
    });
</script>

</html>