<?php

include 'db.php';

// Cek apakah parameter 'idp' ada di URL
if (isset($_GET['idp'])) {
    // Ambil data gambar dari database berdasarkan id
    $foto = mysqli_query($conn, "SELECT image FROM tb_image WHERE image_id = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($foto);

    // Jika gambar ditemukan
    if ($p) {
        // Hapus file gambar dari folder 'foto'
        unlink('./foto/' . $p->image);

        // Hapus data komentar terkait gambar dari tabel 'tb_comments' (jika ada)
        $deleteComments = mysqli_query($conn, "DELETE FROM tb_comments WHERE image_id = '".$_GET['idp']."'");

        // Hapus data like terkait gambar dari tabel 'tb_likes' (jika ada)
        $deleteLikes = mysqli_query($conn, "DELETE FROM tb_likes WHERE image_id = '".$_GET['idp']."'");

        // Hapus data gambar dari tabel 'tb_image'
        $deleteImage = mysqli_query($conn, "DELETE FROM tb_image WHERE image_id = '".$_GET['idp']."'");

        // Jika penghapusan berhasil, redirect ke halaman data-image.php
        if ($deleteImage) {
            echo '<script>window.location="data-image.php"</script>';
        } else {
            echo 'Gagal menghapus data gambar.';
        }
    } else {
        echo 'Gambar tidak ditemukan.';
    }
}

?>
