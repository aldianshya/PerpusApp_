-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2023 pada 18.58
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusappdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(13) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Penulis` varchar(50) NOT NULL,
  `Penerbit` varchar(50) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Cover` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `Bahasa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`ISBN`, `Judul`, `Penulis`, `Penerbit`, `Deskripsi`, `Cover`, `id_kategori`, `Bahasa`) VALUES
('ISBN1', 'Judul Buku 1', 'Penulis 1', 'Penerbit 1', 'Deskripsi Buku 1', '', 1, 'Bahasa 1'),
('ISBN10', 'Judul Buku 10', 'Penulis 5', 'Penerbit 2', 'Deskripsi Buku 10', '', 3, 'Bahasa 3'),
('ISBN2', 'Judul Buku 2', 'Penulis 2', 'Penerbit 2', 'Deskripsi Buku 2', '', 2, 'Bahasa 2'),
('ISBN3', 'Judul Buku 3', 'Penulis 3', 'Penerbit 3', 'Deskripsi Buku 3', '', 1, 'Bahasa 1'),
('ISBN4', 'Judul Buku 4', 'Penulis 4', 'Penerbit 1', 'Deskripsi Buku 4', '', 3, 'Bahasa 3'),
('ISBN5', 'Judul Buku 5', 'Penulis 5', 'Penerbit 4', 'Deskripsi Buku 5', '', 2, 'Bahasa 2'),
('ISBN6', 'Judul Buku 6', 'Penulis 1', 'Penerbit 2', 'Deskripsi Buku 6', '', 1, 'Bahasa 1'),
('ISBN7', 'Judul Buku 7', 'Penulis 3', 'Penerbit 3', 'Deskripsi Buku 7', '', 3, 'Bahasa 3'),
('ISBN8', 'Judul Buku 8', 'Penulis 2', 'Penerbit 4', 'Deskripsi Buku 8', '', 2, 'Bahasa 2'),
('ISBN9', 'Judul Buku 9', 'Penulis 4', 'Penerbit 1', 'Deskripsi Buku 9', '', 1, 'Bahasa 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `ISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `ISBN`) VALUES
(1, 'F1E122027', 'ISBN1'),
(2, 'F1E122027', 'ISBN3'),
(3, 'F1E122103', 'ISBN3'),
(4, 'F1E122143', 'ISBN2'),
(5, 'F1E122027', 'ISBN10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout_confirmed`
--

CREATE TABLE `checkout_confirmed` (
  `id_checkout_confirmed` varchar(20) NOT NULL,
  `id_checkout_unconfirmed` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_berakhir` date NOT NULL,
  `jumlah_perpanjangan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `checkout_confirmed`
--

INSERT INTO `checkout_confirmed` (`id_checkout_confirmed`, `id_checkout_unconfirmed`, `tanggal_peminjaman`, `tanggal_berakhir`, `jumlah_perpanjangan`) VALUES
('1', 1, '2023-11-24', '2023-11-30', 0),
('2', 2, '2023-11-24', '2023-11-30', 0),
('3', 3, '2023-11-24', '2023-11-30', 0),
('4', 4, '2023-11-24', '2023-11-30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout_unconfirmed`
--

CREATE TABLE `checkout_unconfirmed` (
  `id_checkout_unconfirmed` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `checkout_unconfirmed`
--

INSERT INTO `checkout_unconfirmed` (`id_checkout_unconfirmed`, `tanggal_pengajuan`, `id_user`, `id_mitra`, `ISBN`) VALUES
(1, '2023-11-15', 'F1E122027', 1, 'ISBN3'),
(2, '2023-11-15', 'F1E122027', 1, 'ISBN4'),
(3, '2023-11-15', 'F1E122027', 1, 'ISBN6'),
(4, '2023-11-15', 'F1E122027', 2, 'ISBN5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`, `id_provinsi`) VALUES
(1, 'Kota Jambi', 5),
(2, 'Kabupaten Muaro Jambi', 5),
(3, 'Kota Sawahlunto', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(0, 'Anak'),
(1, 'fiksi'),
(2, 'non-fiksi'),
(3, 'kuliner'),
(4, 'Kesehatan'),
(5, 'Kerajinan Tangan'),
(6, 'Informatika'),
(7, 'Pendidikan'),
(8, 'Religius'),
(9, 'Kepemimpinan'),
(10, 'Politik dan Hukum'),
(11, 'Kesenian'),
(12, 'Alam'),
(13, 'Perjalanan'),
(14, 'Puisi'),
(15, 'Ilmiah dan Teknis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_mitra` varchar(50) NOT NULL,
  `deskripsi_mitra` text NOT NULL,
  `telepon_mitra` varchar(15) NOT NULL,
  `email_mitra` varchar(255) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `foto_mitra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `id_kabupaten`, `nama_mitra`, `deskripsi_mitra`, `telepon_mitra`, `email_mitra`, `jam_buka`, `jam_tutup`, `foto_mitra`) VALUES
(1, 2, 'Perpustakaan Universitas Jambi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc.', '08xxxxxxxxxx', 'uptperpusunja@unja.ac.id', '08:00:00', '15:30:00', NULL),
(2, 1, 'Perpustakaan Umum Kota Jambi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '08xxxxxxxxxx', 'contohemail@gmail.com', '08:00:00', '15:30:00', NULL),
(3, 3, 'Perpustakaan Adinegoro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '08xxxxxxxxxx', 'contohemail1@gmail.com', '08:00:00', '21:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlists`
--

CREATE TABLE `playlists` (
  `id_playlist` int(11) NOT NULL,
  `nama_playlist` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `deskripsi_playlist` text NOT NULL,
  `foto_playlist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `playlists`
--

INSERT INTO `playlists` (`id_playlist`, `nama_playlist`, `id_user`, `deskripsi_playlist`, `foto_playlist`) VALUES
(1, 'Playlist 1', 'F1E122027', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL),
(2, 'Playlist 2', 'F1E122143', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlist_books`
--

CREATE TABLE `playlist_books` (
  `id_playlist_books` int(11) NOT NULL,
  `id_playlist` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `playlist_books`
--

INSERT INTO `playlist_books` (`id_playlist_books`, `id_playlist`, `ISBN`, `urutan`) VALUES
(1, 1, 'ISBN2', 1),
(2, 1, 'ISBN3', 2),
(3, 1, 'ISBN8', 3),
(4, 1, 'ISBN7', 4),
(5, 2, 'ISBN5', 4),
(6, 2, 'ISBN4', 1),
(7, 2, 'ISBN3', 2),
(8, 2, 'ISBN6', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'ACEH'),
(2, 'SUMATERA UTARA'),
(3, 'SUMATERA BARAT'),
(4, 'RIAU'),
(5, 'JAMBI'),
(6, 'SUMATERA SELATAN'),
(7, 'BENGKULU'),
(8, 'LAMPUNG'),
(9, 'KEPULAUAN BANGKA BEL'),
(10, 'KEPULAUAN RIAU'),
(11, 'DKI JAKARTA'),
(12, 'JAWA BARAT'),
(13, 'JAWA TENGAH'),
(14, 'DAERAH ISTIMEWA YOGY'),
(15, 'JAWA TIMUR'),
(16, 'BANTEN'),
(17, 'BALI'),
(18, 'NUSA TENGGARA BARAT'),
(19, 'NUSA TENGGARA TIMUR'),
(20, 'KALIMANTAN BARAT'),
(21, 'PAPUA BARAT'),
(22, 'KALIMANTAN TENGAH'),
(23, 'KALIMANTAN SELATAN'),
(24, 'KALIMANTAN TIMUR'),
(25, 'KALIMANTAN UTARA'),
(26, 'SULAWESI UTARA'),
(27, 'SULAWESI TENGAH'),
(28, 'SULAWESI SELATAN'),
(29, 'SULAWESI TENGGARA'),
(30, 'GORONTALO'),
(31, 'SULAWESI BARAT'),
(32, 'MALUKU'),
(33, 'MALUKU UTARA'),
(34, 'PAPUA'),
(35, 'PAPUA SELATAN'),
(36, 'PAPUA TENGAH'),
(37, 'PAPUA PEGUNUNGAN'),
(38, 'PAPUA BARAT DAYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_buku`
--

CREATE TABLE `stok_buku` (
  `id_stok_buku` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok_buku`
--

INSERT INTO `stok_buku` (`id_stok_buku`, `id_mitra`, `isbn`, `stok`) VALUES
(1, 1, 'ISBN1', 5),
(2, 1, 'ISBN2', 10),
(3, 1, 'ISBN3', 20),
(4, 1, 'ISBN4', 15),
(5, 1, 'ISBN5', 3),
(6, 1, 'ISBN6', 4),
(7, 1, 'ISBN7', 5),
(8, 1, 'ISBN8', 7),
(9, 1, 'ISBN9', 10),
(10, 1, 'ISBN10', 1),
(11, 2, 'ISBN1', 2),
(12, 2, 'ISBN2', 5),
(13, 2, 'ISBN3', 3),
(14, 2, 'ISBN4', 10),
(15, 2, 'ISBN5', 7),
(16, 3, 'ISBN3', 7),
(17, 3, 'ISBN4', 7),
(18, 3, 'ISBN5', 7),
(19, 3, 'ISBN6', 7),
(20, 3, 'ISBN7', 7),
(21, 3, 'ISBN8', 7),
(22, 3, 'ISBN9', 7),
(23, 3, 'ISBN10', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_buku`
--

CREATE TABLE `ulasan_buku` (
  `id_ulasan` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `rating` float NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_ulasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan_buku`
--

INSERT INTO `ulasan_buku` (`id_ulasan`, `ISBN`, `id_user`, `rating`, `komentar`, `tanggal_ulasan`) VALUES
(1, 'ISBN1', 'F1E122027', 4.5, 'Buku bagus, sangat merekomendasikan!', '2023-11-23'),
(2, 'ISBN1', 'F1E122103', 3.8, 'Ceritanya menarik, tapi endingnya kurang memuaskan.', '2023-11-24'),
(3, 'ISBN1', 'F1E122143', 5, 'Sangat suka dengan gaya penulisan penulis.', '2023-11-25'),
(4, 'ISBN2', 'F1E122027', 4.2, 'Tokoh utamanya sangat karismatik.', '2023-11-26'),
(5, 'ISBN2', 'F1E122103', 3.5, 'Cerita agak membosankan di beberapa bagian.', '2023-11-27'),
(6, 'ISBN2', 'F1E122143', 4.8, 'Intrik ceritanya membuat saya penasaran terus.', '2023-11-28'),
(7, 'ISBN3', 'F1E122027', 3.9, 'Pengembangan karakter yang baik.', '2023-11-29'),
(8, 'ISBN3', 'F1E122103', 4.1, 'Saya suka dengan twist di tengah cerita.', '2023-11-30'),
(9, 'ISBN3', 'F1E122143', 3.7, 'Setting tempatnya sangat mendukung atmosfer cerita.', '2023-12-01'),
(10, 'ISBN4', 'F1E122027', 4.6, 'Ceritanya penuh emosi, membuat saya terharu.', '2023-12-02'),
(11, 'ISBN4', 'F1E122103', 3.5, 'Tidak terlalu suka dengan tokoh antagonisnya.', '2023-12-03'),
(12, 'ISBN4', 'F1E122143', 4.2, 'Saya merekomendasikan buku ini untuk pembaca baru.', '2023-12-04'),
(13, 'ISBN5', 'F1E122027', 4.8, 'Penuh dengan misteri dan suspens.', '2023-12-05'),
(14, 'ISBN5', 'F1E122103', 3.9, 'Twist di akhir cerita membuat saya terkejut!', '2023-12-06'),
(15, 'ISBN5', 'F1E122143', 4.5, 'Karakternya terasa hidup dan autentik.', '2023-12-07'),
(16, 'ISBN6', 'F1E122027', 4.2, 'Pesan moralnya sangat kuat.', '2023-12-08'),
(17, 'ISBN6', 'F1E122103', 3.6, 'Saya suka dengan gaya berceritanya.', '2023-12-09'),
(18, 'ISBN6', 'F1E122143', 4, 'Cerita yang menyentuh hati.', '2023-12-10'),
(19, 'ISBN7', 'F1E122027', 3.8, 'Agak sulit memahami beberapa twist di tengah cerita.', '2023-12-11'),
(20, 'ISBN7', 'F1E122103', 4.3, 'Setting tempatnya sangat realistis.', '2023-12-12'),
(21, 'ISBN7', 'F1E122143', 3.5, 'Ceritanya cukup menghibur.', '2023-12-13'),
(22, 'ISBN8', 'F1E122027', 4.5, 'Karakternya sangat kompleks dan menarik.', '2023-12-14'),
(23, 'ISBN8', 'F1E122103', 3.7, 'Saya suka dengan alur ceritanya yang cepat.', '2023-12-15'),
(24, 'ISBN8', 'F1E122143', 4, 'Cerita yang penuh dengan petualangan.', '2023-12-16'),
(25, 'ISBN9', 'F1E122027', 3.9, 'Intrik ceritanya membuat saya penasaran.', '2023-12-17'),
(26, 'ISBN9', 'F1E122103', 4.2, 'Klimaks cerita yang memuaskan.', '2023-12-18'),
(27, 'ISBN9', 'F1E122143', 3.8, 'Beberapa adegan membuat saya tertawa.', '2023-12-19'),
(28, 'ISBN10', 'F1E122027', 4, 'Suka dengan karakter pendukungnya.', '2023-12-20'),
(29, 'ISBN10', 'F1E122103', 3.2, 'Plot twistnya membuat saya terkejut!', '2023-12-21'),
(30, 'ISBN10', 'F1E122143', 4.5, 'Rekomendasi untuk penggemar genre ini.', '2023-12-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_mitra`
--

CREATE TABLE `ulasan_mitra` (
  `id_ulasan` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `rating` float NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_ulasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan_mitra`
--

INSERT INTO `ulasan_mitra` (`id_ulasan`, `id_mitra`, `id_user`, `rating`, `komentar`, `tanggal_ulasan`) VALUES
(1, 1, 'F1E122027', 4.5, 'Perpustakaan ini lengkap dengan koleksi buku.', '2023-12-20'),
(2, 1, 'F1E122103', 4, 'Suasana perpustakaannya sangat nyaman.', '2023-12-21'),
(3, 1, 'F1E122143', 4.2, 'Pelayanannya ramah dan membantu.', '2023-12-22'),
(4, 2, 'F1E122027', 3.8, 'Koleksi bukunya cukup bervariasi.', '2023-12-23'),
(5, 2, 'F1E122103', 3.5, 'Perlu peningkatan dalam sistem peminjaman.', '2023-12-24'),
(6, 2, 'F1E122143', 4.1, 'Tempat yang bagus untuk belajar dan membaca.', '2023-12-25'),
(7, 3, 'F1E122027', 4.6, 'Perpustakaan ini sangat bersih dan teratur.', '2023-12-26'),
(8, 3, 'F1E122103', 4.3, 'Pelayanan yang cepat dan efisien.', '2023-12-27'),
(9, 3, 'F1E122143', 4.8, 'Saya suka dengan program-programnya.', '2023-12-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaLengkap_user` varchar(30) NOT NULL,
  `namaTampilan_user` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_instansi` varchar(255) NOT NULL,
  `foto_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `password`, `namaLengkap_user`, `namaTampilan_user`, `email`, `tanggal_lahir`, `asal_instansi`, `foto_user`) VALUES
('F1E122027', 'ikhsan123', 'Ikhsan Tri Maulana Ramadhan', 'Vizing', 'unja.r004.22@gmail.com', '2004-02-29', 'Universitas Jambi', NULL),
('F1E122103', 'aldi123', 'Aldiansyah', 'Jadu', 'ptcintasejati@gmail.com', '2004-07-26', 'Universitas Jambi', NULL),
('F1E122143', 'farhan123', 'M. Adzikri Farhan', 'YI', 'lolosutbk2022@gmail.com', '2004-08-29', 'Universitas Jambi', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `isbn` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `isbn`) VALUES
(1, 'F1E122027', 'ISBN1'),
(2, 'F1E122027', 'ISBN2'),
(3, 'F1E122027', 'ISBN3'),
(4, 'F1E122027', 'ISBN4'),
(5, 'F1E122143', 'ISBN7'),
(6, 'F1E122143', 'ISBN3'),
(7, 'F1E122103', 'ISBN1'),
(8, 'F1E122103', 'ISBN2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_books_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_cart_users` (`id_user`),
  ADD KEY `fk_cart_books` (`ISBN`);

--
-- Indeks untuk tabel `checkout_confirmed`
--
ALTER TABLE `checkout_confirmed`
  ADD PRIMARY KEY (`id_checkout_confirmed`),
  ADD KEY `fk_ch_chun` (`id_checkout_unconfirmed`);

--
-- Indeks untuk tabel `checkout_unconfirmed`
--
ALTER TABLE `checkout_unconfirmed`
  ADD PRIMARY KEY (`id_checkout_unconfirmed`),
  ADD KEY `fk_chun_mitra` (`id_mitra`),
  ADD KEY `fk_chun_users` (`id_user`),
  ADD KEY `fk_chun_books` (`ISBN`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `fk_kab_prov` (`id_provinsi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD KEY `fk_mitra_kab` (`id_kabupaten`);

--
-- Indeks untuk tabel `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `fk_playlist_user` (`id_user`);

--
-- Indeks untuk tabel `playlist_books`
--
ALTER TABLE `playlist_books`
  ADD PRIMARY KEY (`id_playlist_books`),
  ADD KEY `fk_onPlaylist_books` (`ISBN`),
  ADD KEY `fk_onPlaylist_playlists` (`id_playlist`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indeks untuk tabel `stok_buku`
--
ALTER TABLE `stok_buku`
  ADD PRIMARY KEY (`id_stok_buku`),
  ADD KEY `fk_stok_mitra` (`id_mitra`),
  ADD KEY `fk_stok_buku` (`isbn`);

--
-- Indeks untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_ulasan_books` (`ISBN`),
  ADD KEY `fk_ulasan_user` (`id_user`);

--
-- Indeks untuk tabel `ulasan_mitra`
--
ALTER TABLE `ulasan_mitra`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_ulasmtr_mitra` (`id_mitra`),
  ADD KEY `fk_ulasmtr_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `fk_wishlist_user` (`id_user`),
  ADD KEY `fk_wishlist_books` (`isbn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `checkout_unconfirmed`
--
ALTER TABLE `checkout_unconfirmed`
  MODIFY `id_checkout_unconfirmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `playlist_books`
--
ALTER TABLE `playlist_books`
  MODIFY `id_playlist_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `stok_buku`
--
ALTER TABLE `stok_buku`
  MODIFY `id_stok_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_books` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_cart_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `checkout_confirmed`
--
ALTER TABLE `checkout_confirmed`
  ADD CONSTRAINT `fk_ch_chun` FOREIGN KEY (`id_checkout_unconfirmed`) REFERENCES `checkout_unconfirmed` (`id_checkout_unconfirmed`);

--
-- Ketidakleluasaan untuk tabel `checkout_unconfirmed`
--
ALTER TABLE `checkout_unconfirmed`
  ADD CONSTRAINT `fk_chun_books` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_chun_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`),
  ADD CONSTRAINT `fk_chun_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `fk_kab_prov` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Ketidakleluasaan untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `fk_mitra_kab` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`);

--
-- Ketidakleluasaan untuk tabel `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `fk_playlist_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `playlist_books`
--
ALTER TABLE `playlist_books`
  ADD CONSTRAINT `fk_onPlaylist_books` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_onPlaylist_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id_playlist`);

--
-- Ketidakleluasaan untuk tabel `stok_buku`
--
ALTER TABLE `stok_buku`
  ADD CONSTRAINT `fk_stok_buku` FOREIGN KEY (`isbn`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_stok_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`);

--
-- Ketidakleluasaan untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD CONSTRAINT `fk_ulasan_books` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_ulasan_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `ulasan_mitra`
--
ALTER TABLE `ulasan_mitra`
  ADD CONSTRAINT `fk_ulasmtr_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`),
  ADD CONSTRAINT `fk_ulasmtr_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wishlist_books` FOREIGN KEY (`isbn`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_wishlist_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
