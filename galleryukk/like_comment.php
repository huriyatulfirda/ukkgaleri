<?php
session_start();
include 'db.php'; // Koneksi ke database

// Cek apakah admin_id ada di session
if (!isset($_SESSION['id'])) {
    die("Anda belum login."); // Berikan pesan error atau redirect ke halaman login
}

$admin_id = $_SESSION['id']; // Mengambil admin_id dari session
$admin_name = $_SESSION['admin_name']; // Mengambil admin_name dari session
$image_id = isset($_GET['image_id']) ? $_GET['image_id'] : null;

// Logika Like
if ($image_id) {

    // Cek apakah pengguna sudah like gambar ini
    $query_check_like = "SELECT * FROM tb_likes WHERE admin_id = '$admin_id' AND image_id = '$image_id'";
    $result_check_like = mysqli_query($conn, $query_check_like);
    $like_status = mysqli_fetch_assoc($result_check_like);

    // Cek apakah pengguna sudah like gambar ini
    $query_check_like = "SELECT * FROM tb_likes WHERE admin_id = '$admin_id' AND image_id = '$image_id'";
    $result_check_like = mysqli_query($conn, $query_check_like);
    $like_status = mysqli_fetch_assoc($result_check_like);

    if ($like_status) {
        // Jika sudah like, maka toggle like (dislike)
        if ($like_status['liked'] == 1) {
            // Jika sudah di-like, maka dislike
            $query_dislike = "UPDATE tb_likes SET liked = 0 WHERE admin_id = '$admin_id' AND image_id = '$image_id'";
            mysqli_query($conn, $query_dislike);
        } else {
            // Jika sudah di-dislike, maka like
            $query_like = "UPDATE tb_likes SET liked = 1 WHERE admin_id = '$admin_id' AND image_id = '$image_id'";
            mysqli_query($conn, $query_like);
        }
    } else {
        // Jika belum ada di database, maka insert sebagai like
        $query_insert_like = "INSERT INTO tb_likes (admin_id, image_id, liked) VALUES ('$admin_id', '$image_id', 1)";
        mysqli_query($conn, $query_insert_like);
    }

    // Redirect kembali ke halaman detail foto
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Logika Comment
if ($_POST) {
    $admin_id = $_SESSION['id']; // Mengambil admin_id dari session
    $admin_name = $_SESSION['admin_name']; // Mengambil admin_name dari session
    $image_id = $_POST['image_id'];  // Mengambil image_id dari form
    $comment = mysqli_real_escape_string($conn, $_POST['comment']); // Mengamankan input

    // Menyimpan komentar ke database
    $insert = "INSERT INTO tb_comments (admin_id, image_id, comment) VALUES ('$admin_id', '$image_id', '$comment')";
    mysqli_query($conn, $insert);

    // Redirect kembali ke halaman detail foto
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
