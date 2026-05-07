-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 05:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `nama_film` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `durasi` varchar(50) DEFAULT NULL,
  `jam_tayang` varchar(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `nama_film`, `harga`, `genre`, `durasi`, `jam_tayang`, `deskripsi`, `gambar`) VALUES
(1, 'Zootopia 2', 80000, 'Animasi / Petualangan / Komedi', '108 Menit', '14:00', 'Judy dan Nick kembali sebagai partner polisi dan menghadapi misteri baru', 'https://upload.wikimedia.org/wikipedia/en/6/6a/Zootopia_2_%282025_film%29.jpg'),
(2, 'Sore : Istri dari Masa Depan', 75000, 'Drama / Romantis', '120 Menit', '16:00', 'Film ini bercerita tentang seorang wanita dari masa depan yang datang untuk mengubah kehidupan calon suaminya agar tak berakhir buruk', 'https://upload.wikimedia.org/wikipedia/id/a/ad/Poster_Film_Sore.jpg'),
(3, 'Avangers : Endgame', 85000, 'Aksi / Petualangan / Sci-Fi', '180 Menit', '18:00', 'Avengers: Endgame menceritakan para Avengers yang berusaha membalikkan kehancuran akibat Thanos dengan misi terakhir demi menyelamatkan alam semesta.', 'https://upload.wikimedia.org/wikipedia/id/0/0d/Avengers_Endgame_poster.jpg'),
(4, 'Star Wars : The Last Jedi', 90000, 'Aksi / Petualangan / Fantasi / Sci-Fi', '150 Menit', '20:00', 'Star Wars: The Last Jedi menceritakan perjuangan Rey belajar tentang Jedi bersama Luke Skywalker, sementara Resistance berusaha bertahan dari serangan First Order.', 'https://upload.wikimedia.org/wikipedia/id/7/7f/Star_Wars_The_Last_Jedi.jpg'),
(5, 'Haikyuu : The Dumpster Battle', 65000, 'Animasi / Olahraga / Drama / Shounen', '85 Menit', '19:00', 'Haikyu!! The Dumpster Battle menceritakan pertandingan sengit antara Karasuno dan Nekoma', 'https://upload.wikimedia.org/wikipedia/en/d/d0/Haikyu_The_Dumpster_Battle_Poster.jpg'),
(6, 'Your Name', 75000, 'Animasi / Romantis / Drama', '106 Menit', '18:00', 'Film ini bercerita tentang dua remaja, Taki dan Mitsuha, yang secara misterius bertukar tubuh dan berusaha saling menemukan untuk mengubah takdir yang mengancam mereka.', 'https://upload.wikimedia.org/wikipedia/id/0/0b/Your_Name_poster.png');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `id_film` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kursi` varchar(10) DEFAULT NULL,
  `pembayaran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama`, `email`, `id_film`, `jumlah`, `kursi`, `pembayaran`) VALUES
(13, 'Juun', 'ykatou867@gmail.com', 4, 1, '3D', 'Cash'),
(15, 'Josee', 'yobe867@gmail.com', 1, 1, '3D', 'Cash'),
(17, 'Josee', 'yobe867@gmail.com', 6, 1, '2D', 'QRIS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'Fadhil', 'DHIL.123', 'ffadhil867@gmail.com'),
(2, 'Josee', 'jose123', 'yobe867@gmail.com'),
(3, 'Juun', 'kimjuun', 'ykatou867@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
