-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2024 pada 05.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifoto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `reset_token`, `reset_token_expiration`) VALUES
(11, 'Rpl', 'rpl', '$2y$10$Ofs5KASc4wQrcPlJsMe5MOM.9SSY91OBGFB3JeqruZjwHDzxvswpW', '2131231231', 'arifiyantobahtyar@gmail.com', 'Jl. Wijaya Kusuma No.26', NULL, NULL),
(12, 'XII RPL 1 ', 'admin', '$2y$10$2y/x.EJ0tbLkQfbCrAHgmeQMQ5t6DKvBP8F1JjFHMc4LNC1nfySn.', '034193913', 'okesiap@gmail.com', 'Jl. Priksan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Fashion'),
(2, 'Event'),
(3, 'Olahraga'),
(4, 'Dokumenter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(8, 1, 'Fashion', 11, 'XII RPL 1', 'Outfit terbaru 2024 ', 'Baju ini merupakan trend terbaru dari remaja laki-laki. kebanyakan remaja laki-laki suka memakai style ini untuk sebuah kegiatan ber gengsi', 'foto1726556722.jpeg', 1, '2024-09-17 07:05:22'),
(9, 2, 'Event', 11, 'XII RPL 1', 'Piala Asia AFC 2023 Qatar', '<p>Asian Cup atau Piala Asia 2023 berlangsung di Qatar mulai 12 Januari hingga 10 Februari 2024. Turnamen sepak bola terbesar di Asia itu diikuti oleh tim nasional sepakbola dari 24 negara, termasuk Indonesia loh. ( kalender-event-indonesia-2024 )</p>\r\n', 'foto1726556913.jpeg', 1, '2024-09-17 07:10:11'),
(10, 2, 'Event', 11, 'XII RPL 1', 'Indonesia Masters 2024', 'Ajang olahraga besar yang membuka agenda panjang international sport-event di Indonesia adalah Indonesia Masters tahun 2024.  Turnamen Super 500 BWF ini akan kembali dimainkan di Jakarta, atau tepatnya di Istora Senayan pada 23-28 Januari 2024. ( kalender-event-indonesia-2024 )', 'foto1726556996.jpeg', 1, '2024-09-17 07:09:56'),
(11, 2, 'Event', 11, 'XII RPL 1', 'MOTOGP, Mandalika Indonesia', 'penyelenggaraan balap MotoGP kedua di Sirkuit Mandalika, Lombok, yang akan berlangsung pada  27-29 September 2024', 'foto1726557230.png', 1, '2024-09-17 07:13:50'),
(12, 4, 'Dokumenter', 12, 'XII RPL 1 ', 'Our Planet (2019)', '<p>Mau mendengar narasi khas yang memikat dari David Attenborough? Kita bisa menikmatinya melalui dokumenter tentang alam satu ini. Namun bila biasanya kita mendengarkan suara David dengan pemandangan indah dan hewan-hewan lucu, kini hal itu tidak ditemukan dalam Our Planet. Kita malah sengaja dibuat tidak nyaman dengan fakta-fakta mencengangkan. Misalnya bagaimana hutan-hutan dihancurkan dan dimanfaatkan untuk usaha lain atau kematian hewan-hewan akibat ulah manusia.</p>\r\n', 'foto1726557747.jpg', 1, '2024-09-18 00:20:07'),
(13, 4, 'Dokumenter', 12, 'XII RPL 1 ', 'BBC - Infested: Living with Parasites (2014)', '<p>Dr. Michael Mosley adalah dokter fenomenal yang mengabdikan dirinya pada ilmu pengetahuan. Salah satu percobaannya yang sangat kontroversi adalah dengan cara menjadikan tubuhnya sendiri sebagai laboratorium hidup tempat berkembang biak parasit ganas.&nbsp;Dalam film ini akan dibahas pengetahuan mengenai ilmu&nbsp;Parasitology&nbsp;yang dipandu langsung oleh&nbsp;Dr. Michael Mosley.</p>\r\n', 'foto1726557980.jpg', 1, '2024-09-18 00:20:24'),
(14, 4, 'Dokumenter', 12, 'XII RPL 1 ', 'Chasing Coral', '<p>Dokumenter karya Jeff Orlowski ini bisa disaksikan di Netflix. Selama satu jam penonton akan disajikan tayangan mengenai proses kematian terumbu karang di dunia. Salah satu yang paling parah ialah di Great Barrier Reef, Australia. Gambar-gambar bawah laut yang ditampilkan sangat memukau, namun dengan fakta bahwa 50 persen terumbu karang di dunia telah mati dokumenter ini sebenarnya cukup membuat depresi. Dokumenter ini juga sempat menjadi nominasi dalam Piala Oscar 2017.</p>\r\n', 'foto1726558187.jpeg', 1, '2024-09-18 00:21:08'),
(15, 1, 'Fashion', 12, 'XII RPL 1 ', 'Outfit Berudak Bandung', 'outfit ini merupakan sebuah outfit yang lagi trend di wilayah jawa barat yaitu bandung', 'foto1726558349.jpeg', 1, '2024-09-17 07:32:29'),
(16, 1, 'Fashion', 12, 'XII RPL 1 ', 'Outerwear Oversized', '<p>Jaket oversized dengan potongan tegas dan bahan yang waterproof atau windproof sedang populer. Banyak yang memilih model jaket parka atau trench coat panjang dengan warna netral seperti khaki, abu-abu, dan hitam. Beberapa desainer juga menambahkan aksen warna neon atau logam pada detail ritsleting atau kantong untuk sentuhan futuristik.</p>\r\n', 'foto1726558487.jpeg', 1, '2024-09-17 07:35:23'),
(17, 3, 'Olahraga', 12, 'XII RPL 1 ', 'Australia vs Timnas Indonesia di Piala Asia ', '<p>Timnas Indonesia akan menghadapi Australia dalam pertandingan babak 16 Besar Piala Asia 2023 di Qatar pada laga yang digelar di Stadion Jassim Bin Hamad Doha pada Minggu (28/1) Pukul 18:30 WIB. Meski berat, namun mengalahkan Australia bukan sesuatu hal yang mustahil. Artikel ini telah tayang di TribunKaltim.co dengan judul Australia vs Timnas Indonesia di Piala Asia, Pengalaman Pernah Menang</p>\r\n', 'foto1726558870.jpeg', 1, '2024-09-17 08:03:33'),
(18, 3, 'Olahraga', 12, 'XII RPL 1 ', 'Timnas Futsal Indonesia', '<p>Timnas Futsal Indonesia masuk Grup C Piala Asia Futsal 2022. Itu berdasarkan undian yang dilakukan, Kamis (26/5). Indonesia di grup tersebut bersama raja futsal Asia Iran. Sepanjang penyelenggaraan Piala Asia, Iran menjadi tim tersukses dengan raihan 12 gelar juara. Selain Iran, Indonesia akan berhadapan Lebanon, dan China Taipei. Sementara Grup A diisi tuan rumah Kuwait, Irak, Thailand, dan Oman.</p>\r\n', 'foto1726560016.jpeg', 1, '2024-09-18 00:20:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_likes`
--

CREATE TABLE `tb_likes` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `liked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indeks untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indeks untuk tabel `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_likes`
--
ALTER TABLE `tb_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `tb_image` (`image_id`);

--
-- Ketidakleluasaan untuk tabel `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);

--
-- Ketidakleluasaan untuk tabel `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD CONSTRAINT `tb_likes_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_likes_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `tb_image` (`image_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
