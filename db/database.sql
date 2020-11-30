-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.47 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table poin.groups: ~5 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'bpbk', 'BP/BK'),
	(3, 'walikelas', 'Wali Kelas'),
	(4, 'guru', 'Guru'),
	(5, 'siswa', 'General users');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping data for table poin.gtk: ~0 rows (approximately)
/*!40000 ALTER TABLE `gtk` DISABLE KEYS */;
/*!40000 ALTER TABLE `gtk` ENABLE KEYS */;

-- Dumping data for table poin.konseling: ~0 rows (approximately)
/*!40000 ALTER TABLE `konseling` DISABLE KEYS */;
/*!40000 ALTER TABLE `konseling` ENABLE KEYS */;

-- Dumping data for table poin.login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping data for table poin.poin: ~53 rows (approximately)
/*!40000 ALTER TABLE `poin` DISABLE KEYS */;
INSERT INTO `poin` (`id`, `nama_poin`, `jenis_poin`, `nilai`) VALUES
	(22, 'Merokok', 0, -50),
	(23, 'Bolos Sekolah', 0, -20),
	(24, 'Terlambat Sekolah', 0, -5),
	(25, 'Terlibat Dalam Penyalahgunaan Narkoba', 0, -100),
	(26, 'Tidak Menjaga Kebersihan', 0, -10),
	(27, 'Kabur', 0, -20),
	(28, 'Pemalsuan Surat izin', 0, -10),
	(29, 'Tidak Mengikuti Sholat Dzuhur', 0, -5),
	(30, 'Melawan Guru', 0, -50),
	(31, 'Kriminalitas', 0, -50),
	(32, 'Tidak Mengerjakan Piket Sekolah', 0, -5),
	(33, 'Tidak Mengikuti Do\'a Pagi', 0, -5),
	(34, 'Tidak Mengikuti Sholat Ashar', 0, -5),
	(35, 'Tidak Mengerjakan Tugas Pelajaran', 0, -5),
	(36, 'Merusak Barang Milik Sekolah', 0, -10),
	(37, 'Memakai Tato', 0, -20),
	(38, 'Membawa Make Up ke Sekolah', 0, -5),
	(39, 'Membawa Senjata Tajam', 0, -10),
	(40, 'Menonton Video Porno', 0, -10),
	(41, 'Mencemarkan Nama Baik Sekolah', 0, -30),
	(42, 'Berkelahi di Sekolah', 0, -30),
	(43, 'Memakai Make Up ke Sekolah', 0, -10),
	(44, 'Mencontek', 0, -100),
	(45, 'Bermain Handphone di Jam Pelajaran', 0, -15),
	(46, 'Di Kantin Pada Saat Jam Belajar', 0, -5),
	(47, 'Membantu Teman Mengerjakan Tugas', 1, 5),
	(48, 'Menjuarai Perlombaan', 1, 20),
	(49, 'Ketua Organisasi', 1, 20),
	(50, 'Menjenguk Teman yang Sakit ', 1, 20),
	(51, 'Petugas Upacara Bendera', 1, 20),
	(52, 'Membantu Pekerjaan Guru', 1, 20),
	(53, 'Membersihkan Masjid', 1, 20),
	(54, 'Menyiram Tanaman di Sekolah', 1, 10),
	(55, 'Qari Kegiatan Keagamaan', 1, 10),
	(56, 'Menjadi Muadzin', 1, 10),
	(58, 'Menjadi Imam', 1, 10),
	(59, 'Membuang Sampah Sembarangan', 0, -10),
	(60, 'Hafal 1 Juz Alqur\'an', 1, 50),
	(61, 'Hafal 2 Juz Alqur\'an', 1, 100),
	(62, 'Hafal 3Juz Alqur\'an', 1, 150),
	(63, 'Hafal 4 Juz Alqur\'an', 1, 200),
	(64, 'Hafal 5 Juz Alqur\'an', 1, 250),
	(65, 'Mencuri', 0, -50),
	(66, 'Merusak Tanaman', 0, -5),
	(67, 'Pergi ke Toilet Tanpa Izin saat Pembelajaran', 0, -5),
	(68, 'Melanggar Tata Tertib Sekolah', 0, -10),
	(69, 'Tidak Mengikuti Pembelajaran', 0, -10),
	(70, 'Memalak Teman', 0, -15),
	(71, 'Tidak Memakai Seragam atau Atribut Sesuai Aturan ', 0, -5),
	(72, 'Tidak Bersikap Sopan Santun', 0, -20),
	(73, 'Mengobrol Saat Guru Menjelaskan', 0, 5),
	(74, 'Menjadi Panitia Kegiatan Sekolah', 1, 50),
	(75, 'Terlibat Tawuran', 0, -100);
/*!40000 ALTER TABLE `poin` ENABLE KEYS */;

-- Dumping data for table poin.rombel: ~0 rows (approximately)
/*!40000 ALTER TABLE `rombel` DISABLE KEYS */;
/*!40000 ALTER TABLE `rombel` ENABLE KEYS */;

-- Dumping data for table poin.setting: ~0 rows (approximately)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`periode_aktif`, `kepala_sekolah`, `nama_sekolah`, `alamat_sekolah`, `kecamatan_sekolah`, `kabupaten_sekolah`, `npsn_sekolah`, `sinkron`) VALUES
	('Semester Ganjil Tahun Pelajaran 2019/2020', 'Agus Syarif H., S.Sos', 'SMK Plus Al-Farhan', 'Jalan Cisarua Km. 03 Cimahigirang', 'Kec. Kadudampit', 'Kab. Sukabumi', '20257493', '2020-09-03 10:13:57');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Dumping data for table poin.siswa: ~0 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping data for table poin.siswa_poin: ~0 rows (approximately)
/*!40000 ALTER TABLE `siswa_poin` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa_poin` ENABLE KEYS */;

-- Dumping data for table poin.surat: ~0 rows (approximately)
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;

-- Dumping data for table poin.tahun_ajaran: ~3 rows (approximately)
/*!40000 ALTER TABLE `tahun_ajaran` DISABLE KEYS */;
INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `aktif`) VALUES
	(21, '2018/2019', 0),
	(22, '2019/2020', 0),
	(23, '2020/2021', 1);
/*!40000 ALTER TABLE `tahun_ajaran` ENABLE KEYS */;

-- Dumping data for table poin.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `gtk_id`, `siswa_id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `alamat_user`, `tempat_lahir_user`, `tanggal_lahir_user`, `foto`) VALUES
	(1, 46, NULL, '127.0.0.1', 'administrator', '$2y$12$PrxqSM3THk39chtLAtFbNOBvdUF62hh1klWD9IrREPs5KM.sGF7rS', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1599171203, 1, 'Super Admin', NULL, NULL, '0', NULL, NULL, '2020-08-23', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping data for table poin.users_groups: ~1 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(3681, 1, 1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
