-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2021 at 03:29 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi_cerdas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` char(25) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Prodi` varchar(35) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `Nama`, `Prodi`, `User_Id`) VALUES
('1', 'Arnold Jozefiak', 'Training', 1),
('10', 'Pincus Dussy', 'Product Management', 10),
('11', 'Gothart Parker', 'Engineering', 11),
('12', 'Gerda Clixby', 'Product Management', 12),
('13', 'Jorgan Granville', 'Business Development', 13),
('14', 'Josh Bulward', 'Services', 14),
('15', 'Elysee Spratley', 'Human Resources', 15),
('16', 'Tallie Breagan', 'Support', 16),
('17', 'Charita Glasard', 'Business Development', 17),
('18', 'Nicolette Dundon', 'Services', 18),
('19', 'Fin Shannon', 'Legal', 19),
('2', 'Fayth MacCroary', 'Sales', 2),
('20', 'Charlene Liveing', 'Legal', 20),
('2001801', 'Insan Kamil', 'Teknik Informatika', 1),
('21', 'Devora Herety', 'Product Management', 21),
('22', 'Josefina Gwyer', 'Services', 22),
('23', 'Ansel Thirsk', 'Legal', 23),
('24', 'Aggi Gabbett', 'Business Development', 24),
('25', 'Kakalina Kennewell', 'Human Resources', 25),
('26', 'Ardine Allman', 'Services', 26),
('27', 'Minny Jakes', 'Accounting', 27),
('28', 'Juliane Opy', 'Research and Development', 28),
('29', 'Robinia Gerram', 'Engineering', 29),
('3', 'Betteanne Collacombe', 'Human Resources', 3),
('30', 'Casi Fowley', 'Research and Development', 30),
('31', 'Marabel Vasic', 'Engineering', 31),
('32', 'Evonne Mylechreest', 'Research and Development', 32),
('33', 'Maurizia Cottee', 'Support', 33),
('34', 'Grantley Bahia', 'Support', 34),
('35', 'Mollee Lackeye', 'Marketing', 35),
('36', 'Meade Boffey', 'Legal', 36),
('37', 'Onfroi McMearty', 'Sales', 37),
('38', 'Kamila Cogin', 'Business Development', 38),
('39', 'Madelena Southward', 'Product Management', 39),
('4', 'Danna Winchurst', 'Training', 4),
('40', 'Zonda Hamprecht', 'Sales', 40),
('41', 'Marshall Ockleshaw', 'Sales', 41),
('42', 'Sammy Crosetto', 'Product Management', 42),
('43', 'Ivie Morstatt', 'Marketing', 43),
('44', 'Henrietta Standish-Brooks', 'Services', 44),
('45', 'Mano Avrahamy', 'Accounting', 45),
('46', 'Adrienne Cristofor', 'Services', 46),
('47', 'Braden Ladley', 'Training', 47),
('48', 'Ode Questier', 'Sales', 48),
('49', 'Dmitri Apthorpe', 'Training', 49),
('5', 'Ashil Marquez', 'Legal', 5),
('50', 'Barbra Matthessen', 'Accounting', 50),
('6', 'Aksel Quittonden', 'Business Development', 6),
('7', 'Brocky Watkin', 'Legal', 7),
('8', 'Channa Ludvigsen', 'Marketing', 8),
('9', 'Bettye Bartomeu', 'Training', 9);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_jadwal` char(5) NOT NULL,
  `Hari` varchar(255) NOT NULL,
  `Jam` time NOT NULL,
  `Id_kelas` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Id_jadwal`, `Hari`, `Jam`, `Id_kelas`) VALUES
('JD346', 'Senin', '07:00:00', 'KL219'),
('JD639', 'Rabu', '07:00:00', 'KL948');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `Id_kelas` char(5) NOT NULL,
  `Id_matkul` char(15) NOT NULL,
  `NIP` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Id_kelas`, `Id_matkul`, `NIP`) VALUES
('KL219', 'MK001', '2001801'),
('KL948', 'MK002', '2001801');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `Id_krs` int(11) NOT NULL,
  `NIM` char(15) CHARACTER SET latin1 NOT NULL,
  `Id_kelas` char(5) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`Id_krs`, `NIM`, `Id_kelas`) VALUES
(1, '1', 'KL219'),
(2, '1', 'KL948'),
(3, '2', 'KL219'),
(4, '2', 'KL948'),
(5, '3', 'KL219'),
(6, '3', 'KL948'),
(7, '4', 'KL219'),
(8, '4', 'KL948');

-- --------------------------------------------------------

--
-- Table structure for table `kunci`
--

CREATE TABLE `kunci` (
  `id` int(11) NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` char(15) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Semester` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Semester`) VALUES
('1', 'Stefa Snoddin', '1'),
('10', 'Mike Penvarne', '10'),
('11', 'Christophorus Waddilow', '11'),
('12', 'Glenine Seniour', '12'),
('13', 'Dominique Casey', '13'),
('14', 'Gottfried O\'Lunney', '14'),
('15', 'Philipa Gussin', '15'),
('16', 'Barrie Charrette', '16'),
('1600018015', 'M Insan Kamil', '1'),
('1600018021', 'Fitriana Puspa Wardani', '1'),
('17', 'Winny Jardein', '17'),
('18', 'Natalya Metcalf', '18'),
('19', 'Gratiana Bearcroft', '19'),
('2', 'Juliet Winch', '2'),
('20', 'Skipp Vasyukov', '20'),
('21', 'Liam Faires', '21'),
('22', 'Rourke Baron', '22'),
('23', 'Woody Mateuszczyk', '23'),
('24', 'Kirby Boteman', '24'),
('25', 'Shep Chidley', '25'),
('26', 'Rania Affleck', '26'),
('27', 'Renae Bog', '27'),
('28', 'Vivyanne MacFaul', '28'),
('29', 'Mariellen Koenen', '29'),
('3', 'Ramsey Ableson', '3'),
('30', 'Celisse Bullene', '30'),
('31', 'Farris Bronger', '31'),
('32', 'Ephraim Gaspard', '32'),
('33', 'Chad Troy', '33'),
('34', 'Babbette Kleis', '34'),
('35', 'Abigail Whyley', '35'),
('36', 'Ginelle Nuth', '36'),
('37', 'Spencer Jailler', '37'),
('38', 'Vaughan Bream', '38'),
('39', 'Xena More', '39'),
('4', 'Tamas Lawlee', '4'),
('40', 'Darryl Catterick', '40'),
('41', 'Kendal Lathaye', '41'),
('42', 'Brooks Thorius', '42'),
('43', 'Sibyl Hatwells', '43'),
('44', 'Gunther O\'Halloran', '44'),
('45', 'Hildegarde Ferrettino', '45'),
('46', 'Cyndi Keyho', '46'),
('47', 'Elvina Nucci', '47'),
('48', 'Gray Tixier', '48'),
('49', 'Kristin Manion', '49'),
('5', 'Nollie Izaks', '5'),
('50', 'Nerty Loudwell', '50'),
('6', 'Lorine Brounfield', '6'),
('7', 'Willey Descroix', '7'),
('8', 'Stephen Trevear', '8'),
('9', 'Simona Chittenden', '9');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `Id_matkul` char(15) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`Id_matkul`, `Nama`) VALUES
('0015120', 'Bahasa Inggris Informatika'),
('1815120', 'Kalkulus Informatika'),
('1815230', 'Dasar Pemrograman'),
('1815431', 'Logika Informatika'),
('1815530', 'Dasar Sistem Komputer'),
('1815620', 'Komunikasi Interpersonal'),
('1825130', 'Algoritma Pemrograman'),
('1835131', 'Struktur Data'),
('1835241', 'Statistika Informatika'),
('1835341', 'Basis Data'),
('1835431', 'Pemrograman Berorientasi Objek'),
('1835530', 'Komunikasi Data dn Jaringan Komputer'),
('1845131', 'Grafika Komputer'),
('1845330', 'Pengantar Rekayasa Perangkat Lunak'),
('1845531', 'Kecerdasan Buatan'),
('1855131', 'Keamanan Komputer'),
('1855230', 'Interaksi Manusia dan Komputer'),
('1855330', 'Rekayasa Kebutuhan Sistem'),
('1855431', 'Pemrograman Mobile'),
('1855522', 'Kerja Praktek'),
('1855620', 'Teori Bahasa Otomata'),
('1865131', 'Manajemen Tugas Proyek'),
('1865220', 'Etika Profesi'),
('1865331', 'Analisa dan Perancangan Perangkat Lunak'),
('1865631', 'Pemrograman Web Dinamis'),
('1865830', 'Sistem Pendukung Keputusan'),
('1866031', 'Pengenalan Pola'),
('1875220', 'Bahasa Inggris Profesional'),
('1875331', 'Komputer Visi'),
('1875431', 'Data Mining'),
('1875631', 'Grafika Lanjut'),
('1875731', 'Forensik Digital'),
('1875831', 'Pemrograman Paralel'),
('1875930', 'Sistem Temu Balik Informasi'),
('1876031', 'Penjamin Kualitas Perangkat Lunak'),
('1885160', 'Skripsi'),
('1975120', 'Metodologi Penelitian'),
('MK001', 'Algoritma'),
('MK002', 'Kalkulus');

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `Id_pertemuan` int(11) NOT NULL,
  `Id_jadwal` char(5) CHARACTER SET latin1 NOT NULL,
  `Pertemuan` int(11) NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `Tanggal_jam_publish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`Id_pertemuan`, `Id_jadwal`, `Pertemuan`, `kunci`, `Tanggal_jam_publish`) VALUES
(13, 'JD346', 1, 'M+u9rbHjKiK9l/2ClT8Kt1ecyplNF/vdfPNNCVRBd7BFyY8OQQdLsC3tggGe87zLyZe44DXpb6TWSW8yYs5NgtYEO5Yt59czLCacv+xm9+sbLreJ7Jug8pDwbhASmf+wFktgRQyNWX/VU27LaN8WhGIwAx0yCUxnqW6ZErSZS9w=', '2021-02-18 16:32:41'),
(14, 'JD639', 1, 'gUeycoVmF7S/TUA7O7mlZxX11UQUHDuhwAd/QRJPiL2yLjgCcJpEdpZJ7nIlWX9AJfeb1EDL5zBtGG7u4pBcSHbzc9INPNxmxy31mmmYUsP9m7arM7pVrtYoFqyA47ENH8dx+UZ3PXh/W11uZ6GF9lFWV+2fC8/xWdOcQH2qjdQ=', '2021-02-27 21:38:15'),
(15, 'JD346', 5, 'eOl4T6uRwvmPkJDOLHY0b2NcG9/bu03Ybm13xLIOhCeYaq/9XD6137ZKNN5C/c53TAXxi36AYMYwCKFTNGwpSIEDMW283nK8ISVploOiZZNUFF8SX6D6irRMo91kXB6XLgN9VAWt6UE43BJpTq1qDm+B2V7VA5W3Uu8IO9y0nCU=', '2021-04-26 16:11:28'),
(16, 'JD639', 6, 'aGkU3qnB7tD/IFIYXRgrfutq/63SpccLlZaeaszHbxmj7j5JXR5jgTYewOGmQhkkSeO7EVwMZiJ6ePPGps4qWTXQD5cyB2jXAVYk9vrDEFnKpKMViHhQ8qtUptc9G56Q97/XnDy5hOz38bVkMU5u2ImN/A0h35UAk3uWCb8DH7Y=', '2021-04-28 14:01:34'),
(17, 'JD639', 5, 'NOPUU3XCHXpqlalZqpgF6q9leHDM0UyNMxFQKSo9Bct726lbsvilBYEC/AEfvNgsdJQrdNSHxREpUFTJpgmKI0jR0Yuukis7zAW+7Qp4EN/TTaFsjLzJiZz1j/fJS380o6nuzhfxB2iIpJ7MIXZXVccX/LvcdLON/k/P4pYIFb0=', '2021-05-07 08:15:07'),
(18, 'JD639', 5, 'NHWzPXxaTzVh4xMdAJuu2VZpEpu3CrKKgGb+6EfIlbFbN/sNI0HaoBXuVhlcgrD5D67rB8A244VCQQGAyBryqetWK9Hudd3CEaYOTBXKOBtwEQA3B/7b4lS6NP8EU1UQcuY2opImxCaRh14ukULdh7xqGC67WQ/G35xkWHX3+eI=', '2021-05-07 08:47:43'),
(19, 'JD639', 5, 'fJczTRjNQERYKDHSg8l2BbrlGxo0uXjFR5/yIxQ04WhxxXtrBBE5U9CSQJkqkY/PnFmhk0jUOaWZxF/Plh7mXLLWJ1TRwQgkU94nnBxiQ+ZBpISecrqYOnWw0bTGJUoFlAzgxmZ4Jvtik9TJa4fvbomxdRsW076U/EUuLmdZ/2k=', '2021-05-07 08:51:37'),
(20, 'JD639', 6, 'B58Z0E/o/c5Sa/iqnfIQF3v/oz+yBXnY84IZBkZ+cXb147F27frn8XfnmW1OuWf+zdyqzaJhPixerx2r8CmM2zPzuc5/zF/l1yBY4Y9Ey6WcxeolpLpxznx7CwnQnSVZkB9I3CQI1eEtBu+6uyhaahqxy3Q+Cq7fn9xPZnFBP+w=', '2021-05-07 08:51:39'),
(21, 'JD639', 6, 'BqIcnafQolu/GGP//fSmOvJ9VyYZO7AHyI2wqA0j2Iu304MIPyafMErRQSbpvTrn/Ue4uOCobhRush81CoItnkb4TD7mLUiwjc/HgsPDoe1gIDrR7J8FV5P+LZrvyC1EBzZaZEIeVmHOHYYuA+0k9oY7arRusFrCERVwenHwiA8=', '2021-05-07 08:53:01'),
(22, 'JD639', 9, 'BnkG5yVvWfQpJHnGP57KwvgLesXuq+fBNE5bcazXYi5EJJYy8x325NGjznkNJcU2evr5GEraHjH70TttHo9j8mS1/6Rkrqgx5ReNGtKy0BVvWKKUSmPEQ2cepnOLXINAw46BLeVDZ1+XSARBWQ6BA4c1yLImStR0s/Wa23c48k4=', '2021-05-07 08:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `Id_presensi` int(11) NOT NULL,
  `Id_pertemuan` int(11) NOT NULL,
  `NIM` char(15) NOT NULL,
  `Tanggal_jam_presensi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`Id_presensi`, `Id_pertemuan`, `NIM`, `Tanggal_jam_presensi`) VALUES
(1, 17, '1600018015', '2021-05-07 03:29:14'),
(2, 18, '1600018015', '2021-05-07 03:48:39'),
(3, 20, '1600018015', '2021-05-07 03:52:03'),
(4, 21, '1600018015', '2021-05-07 03:53:35'),
(5, 22, '1600018015', '2021-05-07 03:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_dosen`
--

CREATE TABLE `user_dosen` (
  `Id_User` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Id_jadwal`),
  ADD KEY `Id_kelas` (`Id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Id_kelas`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `Id_matkul` (`Id_matkul`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`Id_krs`),
  ADD KEY `NIM` (`NIM`,`Id_kelas`),
  ADD KEY `Id_kelas` (`Id_kelas`);

--
-- Indexes for table `kunci`
--
ALTER TABLE `kunci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`Id_matkul`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`Id_pertemuan`),
  ADD KEY `Id_jadwal` (`Id_jadwal`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`Id_presensi`),
  ADD KEY `Id_jadwal` (`Id_pertemuan`,`NIM`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `user_dosen`
--
ALTER TABLE `user_dosen`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `Id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kunci`
--
ALTER TABLE `kunci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `Id_pertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `Id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_dosen`
--
ALTER TABLE `user_dosen`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Id_kelas`) REFERENCES `kelas` (`Id_kelas`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `dosen` (`NIP`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`Id_matkul`) REFERENCES `matakuliah` (`Id_matkul`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`Id_kelas`) REFERENCES `kelas` (`Id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `presensi_ibfk_3` FOREIGN KEY (`Id_pertemuan`) REFERENCES `pertemuan` (`Id_pertemuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
