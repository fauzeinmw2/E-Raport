-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 08:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb_eraport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_admin`) VALUES
(1, 'budi123', 'Budi Hartono');

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `aktifraport`
--

CREATE TABLE `aktifraport` (
  `id_tapel` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `tglaktif` int(11) NOT NULL,
  `tglm` int(11) DEFAULT NULL,
  `tgls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nik` varchar(25) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nik`, `nama_guru`, `status`) VALUES
('34651', 'Zulfan', 'aktif'),
('44556', 'Marnetti Yuniengsih B', 'aktif'),
('45657', 'Hidayati, S.Kom', 'aktif'),
('45769', 'Eka Puspita, S.Kom', 'aktif'),
('56768', 'Igus Saputra', 'aktif'),
('65656', 'Zizi', 'aktif'),
('66776', 'Aria Amelia, S.Kom', 'aktif'),
('66987', 'Juni Advan, M.Kom', 'aktif'),
('77886', 'Linda Jasman, M.Pd', 'aktif'),
('78457', 'Jhoni Eka Putra, S.Kom', 'aktif'),
('98897', 'Herni', 'aktif'),
('99808', 'Irdanelia, S.Kom', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id_guru_mapel`, `nik`, `id_mapel`, `id_rombel`) VALUES
(208, '78457', 86, 1),
(209, '45769', 87, 1),
(210, '45657', 88, 1),
(211, '34651', 92, 1),
(212, '65656', 93, 1),
(213, '44556', 94, 1),
(214, '98897', 95, 1),
(215, '77886', 96, 1),
(216, '56768', 101, 1),
(217, '45657', 107, 1),
(218, '44556', 90, 2),
(219, '45769', 86, 7),
(220, '45769', 87, 7),
(221, '45657', 88, 7),
(222, '34651', 92, 7),
(223, '65656', 93, 7),
(224, '44556', 94, 7),
(225, '98897', 95, 7),
(226, '77886', 96, 7),
(227, '56768', 101, 7),
(228, '45657', 107, 7);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `tingkat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_jurusan`, `tingkat`) VALUES
(1, 'X PPLG', 1, 'X'),
(2, 'XI RPL', 1, 'XI'),
(3, 'XII RPL', 1, 'XII'),
(4, 'X TKJ 1', 2, 'X'),
(5, 'XI TKJ', 2, 'XI'),
(6, 'XII TKJ', 2, 'XII'),
(19, 'X TKJ 2', 2, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `a` int(2) NOT NULL,
  `b` int(2) NOT NULL,
  `c` int(2) NOT NULL,
  `d` int(2) NOT NULL,
  `e` int(2) NOT NULL,
  `f` int(2) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kelompok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `singkatan`, `a`, `b`, `c`, `d`, `e`, `f`, `id_jurusan`, `kelompok`) VALUES
(86, 'Pemrograman Web dan Perangkat Bergerak', 'PWDPB', 0, 0, 1, 1, 1, 1, 1, 'C'),
(87, 'Pemrograman Berorientasi Objek', 'PBO', 0, 0, 1, 1, 1, 1, 1, 'C'),
(88, 'Basis Data', 'BD', 0, 0, 1, 1, 1, 1, 1, 'C'),
(90, 'Bahasa Indonesia', 'BIN', 1, 1, 1, 1, 1, 1, 2, 'A'),
(91, 'Pemodelan Perangkat Lunak', 'PPL', 0, 0, 1, 1, 0, 0, 1, 'C'),
(92, 'Pendidikan Agama dan Budi Pekerti', 'PADPB', 1, 1, 1, 1, 1, 1, 1, 'A'),
(93, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPDK', 1, 1, 1, 1, 1, 1, 1, 'A'),
(94, 'Bahasa Indonesia', 'BIN', 1, 1, 1, 1, 1, 1, 1, 'A'),
(95, 'Bahasa Inggris', 'BING', 1, 1, 1, 1, 1, 1, 1, 'A'),
(96, 'Matematika', 'MTK', 1, 1, 1, 1, 1, 1, 1, 'A'),
(97, 'Sejarah Indonesia', 'SI', 1, 1, 0, 0, 0, 0, 1, 'A'),
(98, 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'PJOK', 1, 1, 1, 1, 0, 0, 1, 'B'),
(99, 'Seni Budaya', 'SB', 1, 1, 0, 0, 0, 0, 1, 'B'),
(101, 'Bimbingan Konseling', 'BK', 1, 1, 1, 1, 1, 1, 1, '0'),
(102, 'Proyek Ilmu Pengetahuan Alam dan Sosial', 'IPAS', 1, 1, 0, 0, 0, 0, 1, 'C'),
(103, 'Informatika', 'IT', 1, 1, 0, 0, 0, 0, 1, 'C'),
(104, 'Penguatan Proyek PPP BK', 'P5BK', 1, 1, 0, 0, 0, 0, 1, 'C'),
(105, 'Dasar Dasar PPLG dan Gim', 'DPDG', 1, 1, 0, 0, 0, 0, 1, 'C'),
(106, 'Keminangkabauan', 'K', 1, 1, 0, 0, 0, 0, 1, 'B'),
(107, 'Produk Kreatif dan Kewirausahaan', 'PKDK', 0, 0, 1, 1, 1, 1, 1, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_rombel`, `id_mapel`, `nis`, `nilai`) VALUES
(365, 1, 92, 1907001, 90),
(366, 1, 92, 1907002, 90),
(367, 1, 92, 1907003, 90),
(368, 1, 92, 1907004, 90),
(369, 1, 92, 1907005, 90),
(370, 1, 92, 1907006, 90),
(371, 1, 92, 1907008, 90),
(372, 1, 92, 1907009, 90),
(373, 1, 92, 1907010, 90),
(374, 1, 92, 1907011, 90),
(375, 1, 92, 1907012, 90),
(376, 1, 92, 1907013, 90),
(377, 1, 92, 1907014, 90),
(378, 1, 92, 1907016, 90),
(379, 1, 92, 1907017, 90),
(380, 1, 92, 1907018, 90),
(381, 1, 92, 1907019, 90),
(382, 1, 92, 1907020, 90),
(383, 1, 92, 1907021, 97),
(384, 1, 93, 1907001, 90),
(385, 1, 93, 1907002, 90),
(386, 1, 93, 1907003, 90),
(387, 1, 93, 1907004, 90),
(388, 1, 93, 1907005, 90),
(389, 1, 93, 1907006, 90),
(390, 1, 93, 1907008, 90),
(391, 1, 93, 1907009, 90),
(392, 1, 93, 1907010, 90),
(393, 1, 93, 1907011, 90),
(394, 1, 93, 1907012, 90),
(395, 1, 93, 1907013, 90),
(396, 1, 93, 1907014, 90),
(397, 1, 93, 1907016, 90),
(398, 1, 93, 1907017, 90),
(399, 1, 93, 1907018, 90),
(400, 1, 93, 1907019, 90),
(401, 1, 93, 1907020, 90),
(402, 1, 93, 1907021, 94),
(403, 1, 94, 1907001, 88),
(404, 1, 94, 1907002, 88),
(405, 1, 94, 1907003, 88),
(406, 1, 94, 1907004, 88),
(407, 1, 94, 1907005, 88),
(408, 1, 94, 1907006, 88),
(409, 1, 94, 1907008, 88),
(410, 1, 94, 1907009, 88),
(411, 1, 94, 1907010, 88),
(412, 1, 94, 1907011, 88),
(413, 1, 94, 1907012, 88),
(414, 1, 94, 1907013, 88),
(415, 1, 94, 1907014, 88),
(416, 1, 94, 1907016, 88),
(417, 1, 94, 1907017, 88),
(418, 1, 94, 1907018, 88),
(419, 1, 94, 1907019, 88),
(420, 1, 94, 1907020, 88),
(421, 1, 94, 1907021, 96),
(422, 1, 96, 1907001, 89),
(423, 1, 96, 1907002, 89),
(424, 1, 96, 1907003, 89),
(425, 1, 96, 1907004, 89),
(426, 1, 96, 1907005, 89),
(427, 1, 96, 1907006, 89),
(428, 1, 96, 1907008, 89),
(429, 1, 96, 1907009, 89),
(430, 1, 96, 1907010, 89),
(431, 1, 96, 1907011, 89),
(432, 1, 96, 1907012, 89),
(433, 1, 96, 1907013, 89),
(434, 1, 96, 1907014, 89),
(435, 1, 96, 1907016, 89),
(436, 1, 96, 1907017, 89),
(437, 1, 96, 1907018, 89),
(438, 1, 96, 1907019, 89),
(439, 1, 96, 1907020, 89),
(440, 1, 96, 1907021, 92),
(441, 1, 95, 1907001, 93),
(442, 1, 95, 1907002, 93),
(443, 1, 95, 1907003, 93),
(444, 1, 95, 1907004, 93),
(445, 1, 95, 1907005, 93),
(446, 1, 95, 1907006, 93),
(447, 1, 95, 1907008, 93),
(448, 1, 95, 1907009, 93),
(449, 1, 95, 1907010, 93),
(450, 1, 95, 1907011, 93),
(451, 1, 95, 1907012, 93),
(452, 1, 95, 1907013, 93),
(453, 1, 95, 1907014, 93),
(454, 1, 95, 1907016, 93),
(455, 1, 95, 1907017, 93),
(456, 1, 95, 1907018, 93),
(457, 1, 95, 1907019, 93),
(458, 1, 95, 1907020, 93),
(459, 1, 95, 1907021, 94),
(460, 1, 88, 1907001, 90),
(461, 1, 88, 1907002, 70),
(462, 1, 88, 1907003, 88),
(463, 1, 88, 1907004, 90),
(464, 1, 88, 1907005, 70),
(465, 1, 88, 1907006, 90),
(466, 1, 88, 1907008, 70),
(467, 1, 88, 1907009, 90),
(468, 1, 88, 1907010, 88),
(469, 1, 88, 1907011, 96),
(470, 1, 88, 1907012, 78),
(471, 1, 88, 1907013, 80),
(472, 1, 88, 1907014, 70),
(473, 1, 88, 1907016, 88),
(474, 1, 88, 1907017, 80),
(475, 1, 88, 1907018, 85),
(476, 1, 88, 1907019, 80),
(477, 1, 88, 1907020, 85),
(478, 1, 88, 1907021, 93),
(479, 1, 107, 1907001, 95),
(480, 1, 107, 1907002, 85),
(481, 1, 107, 1907003, 90),
(482, 1, 107, 1907004, 93),
(483, 1, 107, 1907005, 78),
(484, 1, 107, 1907006, 90),
(485, 1, 107, 1907008, 80),
(486, 1, 107, 1907009, 95),
(487, 1, 107, 1907010, 90),
(488, 1, 107, 1907011, 95),
(489, 1, 107, 1907012, 85),
(490, 1, 107, 1907013, 88),
(491, 1, 107, 1907014, 60),
(492, 1, 107, 1907016, 90),
(493, 1, 107, 1907017, 80),
(494, 1, 107, 1907018, 90),
(495, 1, 107, 1907019, 88),
(496, 1, 107, 1907020, 90),
(497, 1, 107, 1907021, 100),
(498, 1, 87, 1907001, 91),
(499, 1, 87, 1907002, 50),
(500, 1, 87, 1907003, 88),
(501, 1, 87, 1907004, 90),
(502, 1, 87, 1907005, 55),
(503, 1, 87, 1907006, 85),
(504, 1, 87, 1907008, 60),
(505, 1, 87, 1907009, 90),
(506, 1, 87, 1907010, 86),
(507, 1, 87, 1907011, 90),
(508, 1, 87, 1907012, 70),
(509, 1, 87, 1907013, 78),
(510, 1, 87, 1907014, 60),
(511, 1, 87, 1907016, 84),
(512, 1, 87, 1907017, 78),
(513, 1, 87, 1907018, 83),
(514, 1, 87, 1907019, 80),
(515, 1, 87, 1907020, 85),
(516, 1, 87, 1907021, 97),
(517, 1, 86, 1907001, 85),
(518, 1, 86, 1907002, 50),
(519, 1, 86, 1907003, 85),
(520, 1, 86, 1907004, 90),
(521, 1, 86, 1907005, 78),
(522, 1, 86, 1907006, 90),
(523, 1, 86, 1907008, 10),
(524, 1, 86, 1907009, 90),
(525, 1, 86, 1907010, 80),
(526, 1, 86, 1907011, 90),
(527, 1, 86, 1907012, 20),
(528, 1, 86, 1907013, 78),
(529, 1, 86, 1907014, 10),
(530, 1, 86, 1907016, 88),
(531, 1, 86, 1907017, 70),
(532, 1, 86, 1907018, 85),
(533, 1, 86, 1907019, 80),
(534, 1, 86, 1907020, 88),
(535, 1, 86, 1907021, 90);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `guru_kelas` int(11) NOT NULL,
  `guru_bk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `id_kelas`, `tapel`, `semester`, `guru_kelas`, `guru_bk`) VALUES
(1, 3, '1', '5', 45769, 56768),
(2, 6, '1', '5', 66987, 56768),
(3, 1, '1', '1', 45657, 56768),
(5, 19, '1', '1', 99808, 56768),
(6, 2, '1', '3', 66776, 56768),
(7, 3, '1', '6', 45769, 56768);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kode_semester` varchar(10) NOT NULL,
  `jenis` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`, `kode_semester`, `jenis`) VALUES
(1, '1', 'Satu', 'Ganjil'),
(2, '2', 'Dua', 'Genap'),
(3, '3', 'Tiga', 'Ganjil'),
(4, '4', 'Empat', 'Genap'),
(5, '5', 'Lima', 'Ganjil'),
(6, '6', 'Enam', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `id_jurusan`, `status`) VALUES
('1111111111', 'Alvian', 2, 'aktif'),
('1907001', 'Abdul Halim Maulana', 1, 'aktif'),
('1907002', 'Adith Yuzairi', 1, 'aktif'),
('1907003', 'Aditya Alfa Rezel', 1, 'aktif'),
('1907004', 'Ahmad Farhan', 1, 'aktif'),
('1907005', 'Ahmad Rayyan Syabiluna', 1, 'aktif'),
('1907006', 'Akmal Rendiansyah', 1, 'aktif'),
('1907008', 'Alan Yuhanda', 1, 'aktif'),
('1907009', 'Alfred Cristian Nugraha Zagoto', 1, 'aktif'),
('1907010', 'Amanda Lovina Afifa', 1, 'aktif'),
('1907011', 'Arif Farinos', 1, 'aktif'),
('1907012', 'Aulia Cahayati', 1, 'aktif'),
('1907013', 'Azlan Agung Pratama', 1, 'aktif'),
('1907014', 'Deanda Valentino Rofif', 1, 'aktif'),
('1907016', 'Dian Rivanno', 1, 'aktif'),
('1907017', 'Dinda Lamedhania Debora', 1, 'aktif'),
('1907018', 'Dzaky Daffa Zahran', 1, 'aktif'),
('1907019', 'Farhan Aldifar', 1, 'aktif'),
('1907020', 'Farig Muhammad Taqy', 1, 'aktif'),
('1907021', 'Fauzein Mulya Warman', 1, 'aktif'),
('1907022', 'Firdaus Ramadhan', 1, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_rombel`
--

CREATE TABLE `siswa_rombel` (
  `id_siswa_rombel` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa_rombel`
--

INSERT INTO `siswa_rombel` (`id_siswa_rombel`, `nis`, `id_rombel`) VALUES
(36, '1907001', 1),
(37, '1907002', 1),
(38, '1907003', 1),
(39, '1907004', 1),
(40, '1907005', 1),
(41, '1907006', 1),
(42, '1907008', 1),
(43, '1907009', 1),
(44, '1907010', 1),
(45, '1907011', 1),
(46, '1907012', 1),
(47, '1907013', 1),
(48, '1907014', 1),
(49, '1907016', 1),
(50, '1907017', 1),
(51, '1907018', 1),
(52, '1907019', 1),
(53, '1907020', 1),
(54, '1907021', 1),
(138, '1907004', 7),
(139, '1907006', 7),
(140, '1907009', 7),
(141, '1907010', 7),
(142, '1907011', 7),
(143, '1907013', 7),
(144, '1907016', 7),
(145, '1907017', 7),
(146, '1907018', 7),
(147, '1907019', 7),
(148, '1907020', 7),
(149, '1907021', 7),
(150, '1907001', 7),
(151, '1907003', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id_tapel` int(11) NOT NULL,
  `tapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tapel`
--

INSERT INTO `tapel` (`id_tapel`, `tapel`) VALUES
(1, '2021/2022'),
(3, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `pass`, `aktif`, `akses`) VALUES
(33, 'budi123', 'admin', '', '', '1'),
(34, '78457', 'guru', '', '', '2'),
(35, '1907021', '021203', '', '', '3'),
(36, '45657', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(38, '0038818644', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(39, '45769', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(40, '1907001', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(41, '34651', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(42, '65656', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(43, '44556', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(44, '98897', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(45, '77886', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(46, '56768', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(47, '66776', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(48, '99808', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(49, '66987', 'guru', '77e69c137812518e359196bb2f5e9bb9', '', '2'),
(50, '1111111111', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(51, '1907002', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(52, '1907003', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(53, '1907004', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(54, '1907005', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(55, '1907006', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(56, '1907008', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(57, '1907009', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(58, '1907010', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(59, '1907011', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(60, '1907012', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(61, '1907013', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(62, '1907014', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(63, '1907016', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(64, '1907017', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(65, '1907018', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(66, '1907019', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(67, '1907020', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3'),
(68, '1907022', 'siswa', 'bcd724d15cde8c47650fda962968f102', '', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `siswa_rombel`
--
ALTER TABLE `siswa_rombel`
  ADD PRIMARY KEY (`id_siswa_rombel`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id_tapel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa_rombel`
--
ALTER TABLE `siswa_rombel`
  MODIFY `id_siswa_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id_tapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
