-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 02:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_msi_sugihwaras_rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku0072`
--

CREATE TABLE `buku0072` (
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` enum('Laki-Laki','Perempuan') NOT NULL DEFAULT 'Laki-Laki',
  `stok_buku` bigint(20) NOT NULL,
  `status_buku` enum('Tersedia','Dipinjam') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_ayah`
--

CREATE TABLE `data_ayah` (
  `nis` varchar(10) NOT NULL,
  `nama_ayah` varchar(60) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `pendapatan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_ibu`
--

CREATE TABLE `data_ibu` (
  `nis` varchar(10) NOT NULL,
  `nama_ibu` varchar(60) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `pendapatan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emis`
--

CREATE TABLE `emis` (
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `jenis_kel` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lhr` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `tinggi_bdn` varchar(3) NOT NULL,
  `berat_bdn` varchar(3) NOT NULL,
  `riwayat_pnykt` varchar(50) NOT NULL,
  `nama_ayah` varchar(40) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emis`
--

INSERT INTO `emis` (`nis`, `nisn`, `nik`, `nama`, `foto`, `alamat`, `jenis_kel`, `tempat_lhr`, `tgl_lahir`, `agama`, `tahun_ajaran`, `tinggi_bdn`, `berat_bdn`, `riwayat_pnykt`, `nama_ayah`, `nama_ibu`) VALUES
('101', '202', '222', 'Eka Paka', '2.png', 'Pekalongan', 'perempuan', 'pekalongan', '2023-06-20', 'islam', '2020/2021', '21', '22', 'tidak ada', 'dada', 'dari'),
('1122', '2123000871', '000000', 'GENTALA MAHARI', 'manfaat-terong-ungu-untuk-kesehatan-solusi-jitu-untuk-turunkan-berat-badan-220316j 1.png', 'PEMALANG', 'laki-laki', 'Pemalang ', '2005-12-02', 'islam', '2020/2021', '178', '56', 'tidak ada', 'ayah', 'ibu'),
('14589', '35162', '21725', 'ilo', '3.png', 'pekalongan', 'perempuan', 'Pekalongan', '2000-10-10', 'Islam', '2020/2021', '160', '43', 'no', 'wer', 'wer'),
('180959', '0016863262', '3326260100201002', 'Agung Ahendi', '—Pngtree—modern mandala with green gradient_5887468.png', 'Podosugih', 'laki-laki', 'pekalongan', '2009-03-20', 'islam', '2020/2021', '165', '50', '-', 'johan', 'Jumia'),
('222', '222', '222', 'ILMAA', '1.png', 'pekalongan', 'laki-laki', 'Pekalongan', '2023-05-16', 'Islam', '2020/2021', '120', '42', '-', 'Al', 'muti'),
('267365', '37625', '28326', 'uji', '4.png', 'pekalongan', 'laki-laki', 'Pekalongan', '2000-12-07', 'Islam', '2020/2021', '130', '55', 'tidak ada', 'lolo', 'polo'),
('836475', '274637', '82336', 'ryu', '1.png', 'pekalongan', 'perempuan', 'Pekalongan', '2001-12-12', 'Islam', '2020/2021', '150', '40', 'tidak ada', 'tuti', 'ruei'),
('88888', '33276651', '3327555555556666', 'ALIFFIYAN', '1686529191655.jpg', 'PEKALONGAN', 'laki-laki', 'Pemalang', '2001-02-08', 'islam', '2020/2021', '189', '67', 'Asam Lambung', 'ayah', 'ibu'),
('97483', '37283', '328327', 'fufi', '2.png', 'pekalongan', 'perempuan', 'Pekalongan', '2000-03-07', 'Islam', '2020/2021', '150', '50', 'tidak ada', 'oli', 'jsi'),
('99928J23', '1928312J', '9182KJ1', 'KAJSDKJ', 'gambarbrownies1.png', 'AJSDKASJ', 'laki-laki', 'ASDSAD', '2222-02-02', 'KRISlam', '2020/2021', '170', '903', '23020', '2320', '2323'),
('9999', '89009877', '0988363733838', 'RHIZA', '—Pngtree—modern mandala with green gradient_5887468.png', 'pemalang', 'laki-laki', 'pemalang', '2023-05-06', 'Islam', '2020/2021', '150', '52', 'tidak ada', 'ayahhh', 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `nis` varchar(10) NOT NULL,
  `jumlah` int(10) UNSIGNED NOT NULL,
  `rata_rata` int(10) UNSIGNED NOT NULL,
  `status` enum('tunggu','verifikasi','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`nis`, `jumlah`, `rata_rata`, `status`) VALUES
('222', 527, 88, 'tunggu');

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_ajaran`
--

CREATE TABLE `manajemen_ajaran` (
  `tahun_ajaran` varchar(10) NOT NULL,
  `jumlah_kelas` varchar(3) NOT NULL,
  `kurikulum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manajemen_ajaran`
--

INSERT INTO `manajemen_ajaran` (`tahun_ajaran`, `jumlah_kelas`, `kurikulum`) VALUES
('2020/2021', '8', 'Merdeka'),
('2021/2022', '5', 'K-13'),
('2022/2023', '7', 'Merdeka');

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_kelas`
--

CREATE TABLE `manajemen_kelas` (
  `tahun_ajaran` varchar(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `laki_laki` varchar(4) NOT NULL,
  `perempuan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manajemen_kelas`
--

INSERT INTO `manajemen_kelas` (`tahun_ajaran`, `kelas`, `laki_laki`, `perempuan`) VALUES
('2020/2021', '2', '40', '7'),
('2020/2021', '3', '30', '23'),
('2020/2021', '4', '19', '20'),
('2022/2023', '5', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-01-27-012203', 'App\\Database\\Migrations\\Products', 'default', 'App', 1681276910, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `bhs_indonesia` int(3) UNSIGNED NOT NULL,
  `bhs_inggris` int(3) UNSIGNED NOT NULL,
  `matematika` int(3) UNSIGNED NOT NULL,
  `ipa` int(3) UNSIGNED NOT NULL,
  `ips` int(3) UNSIGNED NOT NULL,
  `agama` int(3) UNSIGNED NOT NULL,
  `status` enum('tunggu','verifikasi','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nis`, `bhs_indonesia`, `bhs_inggris`, `matematika`, `ipa`, `ips`, `agama`, `status`) VALUES
(1, '88888', 10, 100, 90, 80, 100, 70, 'tunggu'),
(3, '222', 100, 78, 90, 90, 100, 80, 'tunggu'),
(16, '1122', 12, 13, 23, 23, 23, 56, 'tunggu'),
(17, '14589', 80, 45, 54, 76, 87, 45, 'tunggu'),
(18, '9999', 100, 19, 98, 98, 97, 78, 'tunggu'),
(23, '99928J23', 90, 100, 56, 57, 65, 89, 'tunggu');

--
-- Triggers `nilai`
--
DELIMITER $$
CREATE TRIGGER `nilai_after_insert_pengajuan` AFTER INSERT ON `nilai` FOR EACH ROW BEGIN
    IF (SELECT COUNT(*) FROM pengajuan_hasil WHERE nis = NEW.nis) > 0 THEN
        UPDATE pengajuan_hasil
        SET
            bhs_indonesia = NEW.bhs_indonesia,
            bhs_inggris = NEW.bhs_inggris,
            matematika = NEW.matematika,
            ipa = NEW.ipa,
            ips = NEW.ips,
            agama = NEW.agama
       WHERE nis = NEW.nis;
    ELSE
      INSERT INTO pengajuan_hasil (nis, bhs_indonesia, bhs_inggris, matematika, ipa, ips, agama)
        VALUES (NEW.nis, NEW.bhs_indonesia, NEW.bhs_inggris, NEW.matematika, NEW.ipa, NEW.ips, NEW.agama);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `nis` varchar(10) NOT NULL,
  `jumlah_nilai` int(11) UNSIGNED NOT NULL,
  `rata_rata` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `jenis_kel` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lhr` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `masuk_thn` varchar(4) NOT NULL,
  `sk_guru` varchar(30) NOT NULL,
  `jabatan` enum('guru','tatausaha','sarpras','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nik`, `id_pegawai`, `nama`, `foto`, `alamat`, `jenis_kel`, `tempat_lhr`, `tgl_lahir`, `agama`, `masuk_thn`, `sk_guru`, `jabatan`) VALUES
('0071', '12345678', '2020', 'TUMINEM RAPGOD', '033740100_1458615715-20160321-Janda-Ikuti-Festival-Holi-India-Reuters2.jpg', 'wonoyoso', 'perempuan', 'Pemalang kota', '1997-02-28', 'islam', '201', 'ab/2212/cdee', 'guru'),
('92847', '374378', '78668', 'rio', '4.png', 'pekalongan', 'laki-laki', 'Pekalongan', '1995-03-07', 'Islam', '2020', '178', 'guru'),
('09217', '0921898', '93K3', 'PAIJO MANIA Fc', 'gambar-removebg-preview(61).png', 'pekalongan', 'perempuan', 'Pemalang', '2037-12-31', 'Islam', '2024', '20/0098/238281', 'guru'),
('0987', '00000', 'aabbcc', 'Nadya Sakina S', 'PicsArt_10-29-07.51.41.jpg', 'Pemalang', 'laki-laki', 'pml', '2002-03-15', 'islm', '200', 'aa/23/dd/1', 'guru'),
('3216000', '321678345', 'Nadyas-01', 'Nadya Sakina Amalia', 'Untitled Session03545.JPG', 'Jl. Trikora gg 2 No.99', 'perempuan', 'Pekalongan', '2003-04-01', 'islam', '2023', 'SH/01/MRT/001', 'tatausaha'),
('1234', '33276655', 'Nd01', 'Lilis', 'gambar-removebg-preview(58).png', 'wonoyoso', 'perempuan', 'pekalongan', '2003-03-30', 'islam', '2021', '990088', 'sarpras'),
('87879', '32132451', 'roy30', 'Indana Permai', 'Screenshot (5).png', 'pekalongan', 'perempuan', 'kasur', '2023-06-15', 'islam', '2020', '178', 'sarpras'),
('899789', '8766', 'Saki-01', 'Sakinahh', '8bc75cfbb3b998b98fc0eae2ae5e996f.jpg', 'pekalongan', 'perempuan', 'Pekalongan', '2000-12-22', 'Islam', '2020', '178', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id_pembelajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `file` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelajaran`
--

INSERT INTO `pembelajaran` (`id_pembelajaran`, `tahun_ajaran`, `kelas`, `file`) VALUES
(4, '2020/2021', '3', 0x313638363532393139313635352e6a7067),
(5, '2022/2023', '2', 0x646973706c61792073616d706168696e2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_sarpras`
--

CREATE TABLE `peminjaman_sarpras` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_sarpras`
--

INSERT INTO `peminjaman_sarpras` (`id`, `keterangan`, `jumlah`, `id_pegawai`) VALUES
(4, 'kursi', '5', '2020'),
(8, 'kursi', '3', 'aabbcc'),
(9, 'kursi', '5', '2020'),
(10, 'laptop', '1', '2020'),
(11, 'Buku Mapel', '4', '93K3');

--
-- Triggers `peminjaman_sarpras`
--
DELIMITER $$
CREATE TRIGGER `update_barang` AFTER INSERT ON `peminjaman_sarpras` FOR EACH ROW BEGIN
UPDATE sarpras SET jumlah = jumlah - NEW.jumlah
where keterangan= NEW.keterangan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_hasil`
--

CREATE TABLE `pengajuan_hasil` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `bhs_indonesia` int(3) UNSIGNED NOT NULL,
  `bhs_inggris` int(3) UNSIGNED NOT NULL,
  `matematika` int(3) UNSIGNED NOT NULL,
  `ipa` int(3) UNSIGNED NOT NULL,
  `ips` int(3) UNSIGNED NOT NULL,
  `agama` int(3) UNSIGNED NOT NULL,
  `status` enum('tunggu','verifikasi','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_hasil`
--

INSERT INTO `pengajuan_hasil` (`id`, `nis`, `bhs_indonesia`, `bhs_inggris`, `matematika`, `ipa`, `ips`, `agama`, `status`) VALUES
(25, '1122', 12, 13, 23, 23, 23, 56, 'verifikasi'),
(26, '14589', 80, 45, 54, 76, 87, 45, 'verifikasi'),
(27, '9999', 100, 19, 98, 98, 97, 78, 'verifikasi'),
(28, '101', 100, 100, 100, 100, 100, 100, 'verifikasi'),
(29, '9999', 0, 0, 0, 0, 0, 0, 'tolak'),
(30, '101', 100, 100, 100, 100, 100, 100, 'tunggu'),
(31, '9999', 0, 0, 0, 0, 0, 0, 'tunggu'),
(32, '9999', 0, 0, 0, 0, 0, 0, 'tunggu'),
(33, '9999', 0, 0, 0, 0, 0, 0, 'tunggu'),
(34, '9999', 0, 0, 0, 0, 0, 0, 'tunggu'),
(35, '9999', 0, 0, 0, 0, 0, 0, 'tunggu'),
(36, '9999', 0, 0, 0, 0, 0, 0, 'tunggu'),
(40, '99928J23', 90, 100, 56, 57, 65, 89, 'tunggu');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_sarpras`
--

CREATE TABLE `pengeluaran_sarpras` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `jumlah` int(11) UNSIGNED NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `bukti_sarpras` varchar(225) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran_sarpras`
--

INSERT INTO `pengeluaran_sarpras` (`id`, `keterangan`, `jumlah`, `harga`, `bukti_sarpras`, `id_pegawai`) VALUES
(1, 'Baju', 20, 100000, 'x.jpg', '2020'),
(2, 'Baju', 1, 100000, 'gambarbrownies1.png', '2020'),
(6, 'kursi', 20, 1000000, '1dashboard.png', 'aabbcc'),
(8, 'kursi', 2, 100, 'gambar-removebg-preview(62).png', 'aabbcc'),
(9, 'laptop', 5, 100000, 'gambar-removebg-preview(61).png', '78668'),
(10, 'laptop', 10, 10, 'gambar-removebg-preview(61).png', '2020'),
(13, 'Buku Mapel', 20, 1000000, '—Pngtree—modern mandala with green gradient_5887468.png', 'Nd01'),
(14, 'Buku Mapel', 20, 1000000, 'gambar-removebg-preview(60).png', 'Nd01');

--
-- Triggers `pengeluaran_sarpras`
--
DELIMITER $$
CREATE TRIGGER `update_tambah` AFTER INSERT ON `pengeluaran_sarpras` FOR EACH ROW begin 
update sarpras set jumlah = jumlah + new.jumlah,
stok_awal = stok_awal + NEW.jumlah
where keterangan=new.keterangan;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_sarpras`
--

CREATE TABLE `pengembalian_sarpras` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian_sarpras`
--

INSERT INTO `pengembalian_sarpras` (`id`, `keterangan`, `jumlah`, `id_pegawai`) VALUES
(2, 'kursi', '10', '93K3'),
(5, 'kursi', '4', '93K3'),
(6, 'laptop', '2', '2020'),
(7, 'Buku Mapel', '2', '93K3');

--
-- Triggers `pengembalian_sarpras`
--
DELIMITER $$
CREATE TRIGGER `tambah` AFTER INSERT ON `pengembalian_sarpras` FOR EACH ROW BEGIN
update sarpras set jumlah = jumlah + new.jumlah
where keterangan=new.keterangan;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `konten` varchar(250) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `konten`, `tanggal`) VALUES
(4, 'banjir banget gajadi uas', '2023-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `hari` varchar(25) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `mapel` enum('bhs_indonesia','bhs_inggris','matematika','ipa','ips','agama') NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status` enum('tunggu','verifikasi','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id`, `id_pegawai`, `hari`, `waktu_mulai`, `waktu_selesai`, `mapel`, `kelas`, `tahun_ajaran`, `status`) VALUES
(2023, '93K3', 'Selasa', '03:33:00', '15:33:00', 'matematika', '3', '2020/2021', 'verifikasi'),
(2024, '93K3', 'Sabtu', '11:01:00', '14:02:00', 'bhs_indonesia', '3', '2020/2021', 'verifikasi'),
(2025, '93K3', 'minggu', '15:33:00', '16:44:00', 'bhs_inggris', '5', '2020/2021', 'tolak'),
(2026, '78668', 'senin', '16:44:00', '16:44:00', 'ipa', '5', '2022/2023', 'verifikasi'),
(2027, '2020', 'Rabu', '09:14:00', '10:14:00', 'ips', '2', '2022/2023', 'verifikasi'),
(2030, '78668', 'Rabu', '19:49:00', '20:49:00', 'ipa', '2', '2020/2021', 'tolak');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan1`
--

CREATE TABLE `penjadwalan1` (
  `tahun_ajaran` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','sabtu','minggu') NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `mapel` enum('bhs_indonesia','bhs_inggris','matematika','ipa','ips','agama') NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `status` enum('tunggu','verifikasi','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan1`
--

INSERT INTO `penjadwalan1` (`tahun_ajaran`, `id_pegawai`, `hari`, `waktu_mulai`, `waktu_selesai`, `mapel`, `kelas`, `status`) VALUES
('', '2020', 'senin', '14:22:00', '14:33:00', 'bhs_indonesia', '4', 'verifikasi'),
('', 'aabbcc', 'rabu', '16:44:00', '15:03:00', 'ips', '5', 'verifikasi'),
('', 'aabbcc', 'minggu', '21:09:00', '20:09:00', 'matematika', '5', 'verifikasi'),
('', 'kkkk', 'sabtu', '15:33:00', '16:44:00', 'bhs_indonesia', '6', 'tolak'),
('', 'HL-01', 'senin', '17:55:00', '18:06:00', 'bhs_inggris', '4', 'verifikasi'),
('', 'aabbcc', 'rabu', '15:33:00', '03:33:00', 'bhs_indonesia', '3', 'verifikasi'),
('', 'HL-01', 'minggu', '03:33:00', '15:03:00', 'bhs_indonesia', '4', 'verifikasi'),
('', 'aabbcc', 'kamis', '15:33:00', '16:44:00', 'bhs_indonesia', '3', 'verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id_daftar` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kel` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `tempat_lhr` varchar(40) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA Keturunan') NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `jml_sdr` varchar(2) NOT NULL,
  `berat_bdn` varchar(3) NOT NULL,
  `tinggi_bdn` varchar(3) NOT NULL,
  `riwayat_pnykt` varchar(50) NOT NULL,
  `tmpt_tinggal` enum('orang tua','menumpang','asrama') NOT NULL,
  `nama_ayah` varchar(40) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id_daftar`, `nisn`, `nik`, `nama`, `jenis_kel`, `alamat`, `tempat_lhr`, `tgl_lhr`, `agama`, `kewarganegaraan`, `anak_ke`, `jml_sdr`, `berat_bdn`, `tinggi_bdn`, `riwayat_pnykt`, `tmpt_tinggal`, `nama_ayah`, `nama_ibu`) VALUES
('1122', '0089776562', '3327665525266252', 'RHIZA', 'perempuan', 'Sapuro', 'Banten', '2023-04-09', 'islam', 'WNA Keturunan', '7', '6', '52', '165', 'randue duet mumet', 'menumpang', 'ayah', 'ibu'),
('AKDBASNK', 'AABBCC', 'ABC', 'IZUUULLL', 'laki-laki', 'D', 'AJSD', '2023-04-26', 'LKASDSDD', 'WNI', '3', '2', '190', '20', 'aidal', 'asrama', 'asdkasd', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `sarpras`
--

CREATE TABLE `sarpras` (
  `id_barang` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `status` enum('baik','sedang','buruk','') NOT NULL,
  `stok_awal` varchar(3) NOT NULL,
  `jumlah` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sarpras`
--

INSERT INTO `sarpras` (`id_barang`, `tanggal`, `keterangan`, `status`, `stok_awal`, `jumlah`) VALUES
('1014', '2023-07-06', 'kursi', 'baik', '17', '11'),
('123', '2023-07-08', 'laptop', 'baik', '13', '13'),
('2', '2023-05-12', 'Baju Seragam\r\n', 'buruk', '15', '1'),
('BK-06', '2023-07-08', 'Buku Mapel', 'baik', '40', '38');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bulan` enum('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember') NOT NULL,
  `beban_pembayaran` int(5) UNSIGNED NOT NULL,
  `bukti_spp` mediumblob NOT NULL,
  `id_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `nis`, `tanggal_bayar`, `bulan`, `beban_pembayaran`, `bukti_spp`, `id_pegawai`) VALUES
(1, '101', '2023-06-15', 'september', 200000, 0x33633632363632622d316634612d343839382d616230342d6538633438663162306462372e6a7067, '2020'),
(2, '9999', '0003-03-31', 'januari', 100000, 0x322e706e67, 'aabbcc'),
(3, '267365', '2000-06-07', 'desember', 100000, 0x53637265656e73686f74202832292e706e67, 'aabbcc'),
(4, '14589', '2000-09-10', 'april', 100000, 0x53637265656e73686f74202838292e706e67, 'aabbcc'),
(5, '97483', '2001-08-08', 'mei', 100000, 0x53637265656e73686f74202832292e706e67, 'aabbcc'),
(6, '222', '2004-10-10', 'februari', 100000, 0x53637265656e73686f74202833292e706e67, 'aabbcc'),
(7, '267365', '2023-06-15', 'agustus', 100000, 0x53637265656e73686f74202833292e706e67, 'aabbcc'),
(8, '222', '2023-06-15', 'september', 100000, 0x53637265656e73686f74202837292e706e67, 'aabbcc'),
(9, '222', '2023-06-15', 'september', 100000, 0x53637265656e73686f74202837292e706e67, '2020'),
(10, '101', '2023-06-15', 'april', 30000, 0x53637265656e73686f74202837292e706e67, '93K3'),
(12, '101', '2023-07-06', 'maret', 90000, 0x316c6f67696e2e706e67, 'aabbcc'),
(13, '88888', '2023-07-06', 'maret', 1000000, 0x31636f6c6563742073616d7061682e706e67, 'aabbcc'),
(14, '9999', '2023-07-08', 'januari', 100000, 0x67616d6261722d72656d6f766562672d70726576696577283631292e706e67, '93K3');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nama_ujian` varchar(20) NOT NULL,
  `beban_pembayaran` int(5) UNSIGNED NOT NULL,
  `id_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `password` varchar(255) CHARACTER SET macce COLLATE macce_bin NOT NULL,
  `role` enum('guru','tata usaha','sarpras','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_pegawai`, `password`, `role`) VALUES
(7, 'aabbcc', '$2y$10$GJ0o.z6Uv2H5xv5ZNVC9Bu6il/NFQpXwTUPn5fMn0RhCltX8w6VEK', 'tata usaha'),
(8, 'Nd01', '$2y$10$027EqyIEuOm5c2BPdcF1vO0BO4E6GtwiguCee1Yab/dxluyZmrF6i', 'sarpras'),
(9, '93k3', '$2y$10$9o57cV.SEvkYFWpXqhR56.71YcNkTQSRrIYTJdMxWooWnPe5LE.Ve', 'guru'),
(10, 'roy30', '$2y$10$n1VRDPD.lrKiOedBedpYbuHorYKx4jPfjnUiTkfw4iUspdtipA.Uu', 'sarpras'),
(11, 'Nadyas-01', '$2y$10$s5gcpBdEfGj9BRieGvQD/eA/6mzQ1.UiyNLlHX8RPvxSeGw7zrZa2', 'tata usaha');

-- --------------------------------------------------------

--
-- Table structure for table `user_siswa`
--

CREATE TABLE `user_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_siswa`
--

INSERT INTO `user_siswa` (`id`, `nis`, `password`, `role`) VALUES
(1, '88888', '25d55ad283aa400af464c76d713c07ad', 'siswa'),
(3, '222', '25d55ad283aa400af464c76d713c07ad', 'siswa'),
(4, '101', '$2y$10$LQR4MseM/L0kYIDXZH76L.yjLseHaNqw5BhtDQwG71P4e2NT5JHQS', 'siswa'),
(5, '9999', '$2y$10$TdN4iAqiL8nD/mG8ygxFEe7mYL0v8MSkrCtUtZhljGjod7kZZvJ5y', 'siswa'),
(6, '9999', '$2y$10$Od2EeflaZkGfUPvePlG/zesnGfm.rHZzjVTi4QqIARsBFHmvokAya', 'siswa'),
(7, '1122', '$2y$10$jdCFVKZ0vKI5IZFr3JfRKuQOfh6rTdYSDL9lChX.4.r0DnV3WpDcS', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku0072`
--
ALTER TABLE `buku0072`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data_ayah`
--
ALTER TABLE `data_ayah`
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `data_ibu`
--
ALTER TABLE `data_ibu`
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `emis`
--
ALTER TABLE `emis`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `nik` (`nik`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `manajemen_ajaran`
--
ALTER TABLE `manajemen_ajaran`
  ADD PRIMARY KEY (`tahun_ajaran`);

--
-- Indexes for table `manajemen_kelas`
--
ALTER TABLE `manajemen_kelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `nip` (`nip`,`nik`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id_pembelajaran`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `peminjaman_sarpras`
--
ALTER TABLE `peminjaman_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_hasil`
--
ALTER TABLE `pengajuan_hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `pengeluaran_sarpras`
--
ALTER TABLE `pengeluaran_sarpras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`keterangan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pengembalian_sarpras`
--
ALTER TABLE `pengembalian_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `penjadwalan1`
--
ALTER TABLE `penjadwalan1`
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `sarpras`
--
ALTER TABLE `sarpras`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `user_siswa`
--
ALTER TABLE `user_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku0072`
--
ALTER TABLE `buku0072`
  MODIFY `id_buku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id_pembelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman_sarpras`
--
ALTER TABLE `peminjaman_sarpras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengajuan_hasil`
--
ALTER TABLE `pengajuan_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pengeluaran_sarpras`
--
ALTER TABLE `pengeluaran_sarpras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengembalian_sarpras`
--
ALTER TABLE `pengembalian_sarpras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2031;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_siswa`
--
ALTER TABLE `user_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_ayah`
--
ALTER TABLE `data_ayah`
  ADD CONSTRAINT `data_ayah_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`);

--
-- Constraints for table `data_ibu`
--
ALTER TABLE `data_ibu`
  ADD CONSTRAINT `data_ibu_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`);

--
-- Constraints for table `emis`
--
ALTER TABLE `emis`
  ADD CONSTRAINT `emis_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `manajemen_ajaran` (`tahun_ajaran`);

--
-- Constraints for table `manajemen_kelas`
--
ALTER TABLE `manajemen_kelas`
  ADD CONSTRAINT `manajemen_kelas_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `manajemen_ajaran` (`tahun_ajaran`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`);

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `nilai_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`);

--
-- Constraints for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD CONSTRAINT `pembelajaran_ibfk_1` FOREIGN KEY (`tahun_ajaran`) REFERENCES `manajemen_ajaran` (`tahun_ajaran`),
  ADD CONSTRAINT `pembelajaran_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `manajemen_kelas` (`kelas`);

--
-- Constraints for table `pengeluaran_sarpras`
--
ALTER TABLE `pengeluaran_sarpras`
  ADD CONSTRAINT `pengeluaran_sarpras_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`),
  ADD CONSTRAINT `spp_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `user_siswa`
--
ALTER TABLE `user_siswa`
  ADD CONSTRAINT `user_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `emis` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
