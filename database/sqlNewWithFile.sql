-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table spk_gurubeasiswa.alternativ
DROP TABLE IF EXISTS `alternativ`;
CREATE TABLE IF NOT EXISTS `alternativ` (
  `ialternativ` int(11) NOT NULL AUTO_INCREMENT,
  `imaster_guru` int(11) DEFAULT NULL,
  `fnilai_akhir` float DEFAULT NULL,
  `iPeringkat` int(11) DEFAULT NULL,
  `fnilai_akhir_s_wp` float DEFAULT NULL,
  `fnilai_akhir_saw` float DEFAULT NULL,
  `fnilai_akhir_wp` float DEFAULT NULL,
  `vTahun` char(50) DEFAULT NULL,
  PRIMARY KEY (`ialternativ`),
  KEY `imaster_guru` (`imaster_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_gurubeasiswa.alternativ: ~5 rows (approximately)
/*!40000 ALTER TABLE `alternativ` DISABLE KEYS */;
INSERT INTO `alternativ` (`ialternativ`, `imaster_guru`, `fnilai_akhir`, `iPeringkat`, `fnilai_akhir_s_wp`, `fnilai_akhir_saw`, `fnilai_akhir_wp`, `vTahun`) VALUES
	(11, 4, 13.4362, 6, 2.77021, 13.3, 0.136174, '2017'),
	(12, 50, 18.4836, 1, 3.73554, 18.3, 0.183626, '2017'),
	(13, 40, 17.1761, 3, 3.58163, 17, 0.17606, '2017'),
	(14, 2, 16.3203, 4, 3.46411, 16.15, 0.170284, '2017'),
	(15, 30, 18.1852, 2, 3.76795, 18, 0.185219, '2017'),
	(16, 10, 15.7486, 5, 3.02375, 15.6, 0.148637, '2017');
/*!40000 ALTER TABLE `alternativ` ENABLE KEYS */;

-- Dumping structure for table spk_gurubeasiswa.alternativ_detail
DROP TABLE IF EXISTS `alternativ_detail`;
CREATE TABLE IF NOT EXISTS `alternativ_detail` (
  `ialternativ_detail` int(11) NOT NULL AUTO_INCREMENT,
  `ialternativ` int(11) DEFAULT NULL,
  `imaster_kriteria` int(11) DEFAULT NULL,
  `imaster_subkriteria` float DEFAULT NULL,
  `fnilai_awal` float DEFAULT NULL,
  `fnilai_normal_saw` float DEFAULT NULL,
  `fnilai_bobot_saw` float DEFAULT NULL,
  `fnilai_s_wp` float DEFAULT NULL,
  `vTahun` char(50) DEFAULT NULL,
  PRIMARY KEY (`ialternativ_detail`),
  KEY `ialternativ` (`ialternativ`),
  KEY `imaster_kriteria` (`imaster_kriteria`),
  KEY `imaster_subkriteria` (`imaster_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_gurubeasiswa.alternativ_detail: ~30 rows (approximately)
/*!40000 ALTER TABLE `alternativ_detail` DISABLE KEYS */;
INSERT INTO `alternativ_detail` (`ialternativ_detail`, `ialternativ`, `imaster_kriteria`, `imaster_subkriteria`, `fnilai_awal`, `fnilai_normal_saw`, `fnilai_bobot_saw`, `fnilai_s_wp`, `vTahun`) VALUES
	(103, 11, 1, 2, 4, 0.8, 4, 1.37035, '2017'),
	(104, 11, 2, 9, 2, 0.5, 2.5, 1.17062, '2017'),
	(105, 11, 3, 14, 2, 0.4, 1.2, 1.09913, '2017'),
	(106, 11, 4, 17, 4, 0.8, 2.4, 1.20809, '2017'),
	(107, 11, 5, 23, 3, 0.6, 2.4, 1.22109, '2017'),
	(108, 11, 6, 29, 2, 0.4, 0.8, 1.06504, '2017'),
	(109, 12, 1, 1, 5, 1, 5, 1.44164, '2017'),
	(110, 12, 2, 9, 2, 0.5, 2.5, 1.17062, '2017'),
	(111, 12, 3, 11, 5, 1, 3, 1.24542, '2017'),
	(112, 12, 4, 16, 5, 1, 3, 1.24542, '2017'),
	(113, 12, 5, 21, 5, 1, 4, 1.33994, '2017'),
	(114, 12, 6, 29, 2, 0.4, 0.8, 1.06504, '2017'),
	(115, 13, 1, 2, 4, 0.8, 4, 1.37035, '2017'),
	(116, 13, 2, 7, 4, 1, 5, 1.37035, '2017'),
	(117, 13, 3, 13, 3, 0.6, 1.8, 1.16161, '2017'),
	(118, 13, 4, 18, 3, 0.6, 1.8, 1.16161, '2017'),
	(119, 13, 5, 23, 3, 0.6, 2.4, 1.22109, '2017'),
	(120, 13, 6, 26, 5, 1, 2, 1.15756, '2017'),
	(121, 14, 1, 2, 4, 0.8, 4, 1.37035, '2017'),
	(122, 14, 2, 8, 3, 0.75, 3.75, 1.28362, '2017'),
	(123, 14, 3, 12, 4, 0.8, 2.4, 1.20809, '2017'),
	(124, 14, 4, 17, 4, 0.8, 2.4, 1.20809, '2017'),
	(125, 14, 5, 23, 3, 0.6, 2.4, 1.22109, '2017'),
	(126, 14, 6, 28, 3, 0.6, 1.2, 1.10503, '2017'),
	(127, 15, 1, 3, 3, 0.6, 3, 1.28362, '2017'),
	(128, 15, 2, 7, 4, 1, 5, 1.37035, '2017'),
	(129, 15, 3, 13, 3, 0.6, 1.8, 1.16161, '2017'),
	(130, 15, 4, 16, 5, 1, 3, 1.24542, '2017'),
	(131, 15, 5, 21, 5, 1, 4, 1.33994, '2017'),
	(132, 15, 6, 28, 3, 0.6, 1.2, 1.10503, '2017'),
	(133, 16, 1, 1, 5, 1, 5, 1.44164, '2017'),
	(134, 16, 2, 7, 4, 1, 5, 1.37035, '2017'),
	(135, 16, 3, 13, 3, 0.6, 1.8, 1.16161, '2017'),
	(136, 16, 4, 18, 3, 0.6, 1.8, 1.16161, '2017'),
	(137, 16, 5, 24, 2, 0.4, 1.6, 1.13431, '2017'),
	(138, 16, 6, 30, 1, 0.2, 0.4, 1, '2017');
/*!40000 ALTER TABLE `alternativ_detail` ENABLE KEYS */;

-- Dumping structure for table spk_gurubeasiswa.master_guru
DROP TABLE IF EXISTS `master_guru`;
CREATE TABLE IF NOT EXISTS `master_guru` (
  `imaster_guru` int(11) NOT NULL AUTO_INCREMENT,
  `vPassword` varchar(50) DEFAULT NULL,
  `vNama_guru` varchar(255) DEFAULT NULL,
  `vNik` varchar(50) DEFAULT NULL,
  `vJabatan` varchar(50) DEFAULT NULL,
  `vJk` enum('L','P') DEFAULT NULL,
  `talamat` text,
  `vBirthday` varchar(50) DEFAULT NULL,
  `dBirthday` date DEFAULT NULL,
  `vNmapelajaran` varchar(50) DEFAULT NULL,
  `tpath` text,
  PRIMARY KEY (`imaster_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_gurubeasiswa.master_guru: ~54 rows (approximately)
/*!40000 ALTER TABLE `master_guru` DISABLE KEYS */;
INSERT INTO `master_guru` (`imaster_guru`, `vPassword`, `vNama_guru`, `vNik`, `vJabatan`, `vJk`, `talamat`, `vBirthday`, `dBirthday`, `vNmapelajaran`, `tpath`) VALUES
	(1, '88ab5bc3b3e83dcbea3def230d643c91', 'Dra. NENENG HENI MARDALENI, M.Pd.', '1581359424', 'KEPALA SEKOLAH', 'P', 'SERANG', 'SERANG', '2019-01-18', 'MATEMATIKA', 'Screenshot_from_2018-12-30_21-14-474.png'),
	(2, '23b82cecb4a6221dc53be2da656d3265', 'Dra. Hj. WIRDAWATI R, M.M.Pd', '7007353110', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(3, 'f7ea62bd4047e07b22d5713a63b38e16', 'Dra. Hj. CHOMSIYATUN, M.M.', '9947640277', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(4, '6f96bec6ad0b33dba3c37a1e5616adb7', 'Dra. DEWI ARIYANI', '4979095843', 'dsad', 'P', 'ad', 'asd', '2019-01-09', 'asd', 'Screenshot_from_2018-12-30_20-24-513.png'),
	(5, '9933fdadeccb3886fae2a4015d8b7f8c', 'PUTRI ZULFIATI, S.Pd', '3596741378', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(6, '9e885b8484947139e39d4ee91fa2203a', 'RITA VARIALIS, S.Pd', '1591798926', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(7, '81dc9bdb52d04dc20036dbd8313ed055', 'Drs. CHRISTISON, M.M.Pd', '4884769064', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(8, 'cf9555fd8262bb619e8f7ee7138f0aeb', 'YARNIMA NURUT, S.Pd', '6992288182', 'GURU', 'P', '-', 'jombang', '2019-01-30', '-', NULL),
	(9, 'baaa89e6e8fc885470daf7fc780c626f', 'Drs. RASTAM', '2236935517', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(10, '71aa20578b7d8b7fea54e7c2060c0b2d', 'Dra. Hj. YATI ROSDAYATI, M.Pd', '3518697037', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(11, 'e5e849978ad714001f03b1f7cebd52f5', 'Hj. EUIS HADININGSIH, S.Pd', '3065508370', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(12, '814b43b57904b9af8209b1945bd14bdd', 'Dra. Hj. ENNI SUPRIAWATI', '7476115437', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(13, '10bb78c896cbd7d92e4694da5c0a8057', 'Drs. MUSBIR, MM', '9155152844', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(14, 'e030c6167f6e8e47c56b0aec01da0385', 'Dra. OKDELBENS ARDIM', '9876656065', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(15, 'badec8bf50f3fa137228ff5a89d74fd5', 'Drs. DESMAN LUMBANTORUAN', '7000663186', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(16, 'a161c5fd551efbd9ead1d07a0dd0635a', 'Dra. SUNDARWATI', '5361914370', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(17, '2edd4d81422e121c953c5491348051a9', 'Hj. TJANDRAWATI, S.Pd', '5427017971', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(18, '6552aa999c5d240f3d027e3fc94278c8', 'Dra. ROSNAENI', '5130389283', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(19, 'ee529ed846d3641b0235ddbd0770d4a0', 'Hj. ELTIS NAZAR, S.Pd', '9324979821', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(20, '49f2671d2c0ceea76935a72c70778e49', 'HARYANTO, S.Pd', '5800985493', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(21, 'f7d9b3230b52d299d9cca9b1283584f5', 'Drs. SUDOYO', '8400348749', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(22, '0851053bad84da9ce9abc8835c076349', 'DIDI SUPRIADI, S.Pd', '3830550825', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(23, 'f0ec8f2c51036592aab5ab901982d63f', 'Dra. HUSNIATI', '7295920818', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(24, '9de47a8304f2a0bc924d7aa5551d3ebd', 'Dra. SRI YARTI, M.Pd', '9734217634', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(25, 'f36b0bbba101aa378de89fb0e7dd6bf4', 'ARIEF SYAFIOEDIN, S.Pd', '4770882758', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(26, '546cd2fae2d38a2c70701686d9de4f5c', 'SRI MULYONO, S.Pd', '6372053747', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(27, 'd87d23581e21c59cb9eeaadb875438cc', 'SULASMI, S.Pd', '4555745168', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(28, '11688d083aca1c40a3d1137c21ab8fa9', 'Drs. M. M. MUNIR', '8382365667', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(29, '2ee64da112773a5bd057fb6c16f6b3ec', 'Drs. ROIS HIDAYAT', '2847038438', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(30, 'd19f1e77cb821f8017931e629b7069b8', 'SUGIYANTA, S.Pd', '2285814966', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(31, '74a15d14cc73cbfdf4aed6b4d138a017', 'RITA ELFIRA, S.Pd', '9222164288', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(32, '71575a85812bc405607e7cc49459d58f', 'HARJANTO, S.Pd', '3197561228', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(33, 'd4544b495a326b2151ff8ab2c416ddc1', 'KIKA HERIATI, S.Pd', '1986321773', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(34, 'ba13b74a797ba9ce13168cc0c6a68571', 'PUPUNG SAPURO, S.Pd', '7076549760', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(35, '82348d8b1152e2c79021ae2e60da67c9', 'H. SYAHRULLOH, M.Si', '7831437135', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(36, '5da517b02cca89ca69ec9061b8dc160b', 'MARIA MELUR SILABAN', '3099449221', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(37, 'a02de277202af60f7be5a885f2aa8789', 'SITI MUTMAINAH, M.Pd', '6954934274', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(38, 'bfd6731968f762994c0eb72057ef40c6', 'NAGIB ABDILLAH, S.Kom', '1609833767', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(39, 'af8615198ccca67d960b237cd0ce4bb8', 'PURWANTO, S.Kom', '7319348166', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(40, 'bc5819622227cab610b524ebbedb7ef8', 'DEWI EKAWATI, S Pd', '3530107766', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(41, '6ac0d5c31511aa5da7057483c6a7125d', 'LAROSA SUCIPTA A, M.Pd', '8532080223', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(42, 'd4ff7cd5ce21da97e13ee799d5e7a6b9', 'ARLIHANDRA YANA, S.Pd', '2927048247', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(43, '184d0915e22ac1216f956d26b43b5849', 'GEMALA NURTANIA ,S.Pd', '8248959883', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(44, 'f6e81925893312e5215a245535e8f3a0', 'FRANSISCA HENDRY, M.Pd', '3916263149', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(45, 'edce5b64a549f2efe2645e97c26b276a', 'KURNIA HIDAYATI, SS', '9735045874', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(46, '51ee2e1a507c22502c2c9eb54268a9cc', 'ERNA WIJAYANTI, M.Pd', '3161205566', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(47, '727b97add09a33d924ba0b72af9d87eb', 'GATOT ARIBOWO, SS', '9388637551', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(48, '2140d7546ad23610fba84196250bc028', 'YULIWARNI, M Si', '9571707427', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(49, '3f50f400402fd37caebf110b19f2612d', 'GUNTORO, S.Si', '3203656988', NULL, 'L', NULL, NULL, NULL, NULL, NULL),
	(50, '4cd360d13451d556483ef0c528e51a8d', 'TRI JOKO PUTRANTO, S.Pd', '3686434705', 'asdsd', 'L', 'asdsad', 'asd', '2019-01-09', 'asd', 'Screenshot_from_2018-12-30_21-14-471.png'),
	(51, 'dcd20591b27970d89feadc309faff7c0', 'DWI AFRIANTI, S.Pd', '1413067859', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(52, '4181b057a390841ab2afc696f91db336', 'ROHMA SULISTYANINGSIH, S.Si', '4590927980', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(53, 'fc00cbe3e48dd65246a140bbd02e7cd5', 'SITI AMINAH, S.Pd', '7454457812', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(54, 'bb97be99e8e7e8bf99f34af5bb0a182d', 'WIDYA KRISTIYANTI, S.Pd', '4886989596', NULL, 'P', NULL, NULL, NULL, NULL, NULL),
	(56, 'c99a11a53a3748269e3f86d7ac38df11', 'sadsadsad', 'sadasd', 'dsad', 'P', 'asd', 'asd', '2019-01-17', 'sad', 'Screenshot_from_2018-12-30_20-24-511.png');
/*!40000 ALTER TABLE `master_guru` ENABLE KEYS */;

-- Dumping structure for table spk_gurubeasiswa.master_kriteria
DROP TABLE IF EXISTS `master_kriteria`;
CREATE TABLE IF NOT EXISTS `master_kriteria` (
  `imaster_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `cKode` char(50) DEFAULT NULL,
  `vNama_kriteria` varchar(50) DEFAULT NULL,
  `vAtribut` enum('Benefit','Cost') DEFAULT NULL,
  `fbobot` float DEFAULT NULL COMMENT 'Satuan Persentase',
  `fbobot_preferensi` float DEFAULT NULL,
  PRIMARY KEY (`imaster_kriteria`),
  KEY `cKode` (`cKode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_gurubeasiswa.master_kriteria: ~6 rows (approximately)
/*!40000 ALTER TABLE `master_kriteria` DISABLE KEYS */;
INSERT INTO `master_kriteria` (`imaster_kriteria`, `cKode`, `vNama_kriteria`, `vAtribut`, `fbobot`, `fbobot_preferensi`) VALUES
	(1, 'KRITERIA-01', 'Masa Kerja', 'Benefit', 5, 0.227273),
	(2, 'KRITERIA-02', 'Beban Kerja', 'Benefit', 5, 0.227273),
	(3, 'KRITERIA-03', 'Tingkat Kehadiran', 'Benefit', 3, 0.136364),
	(4, 'KRITERIA-04', 'Tingkat Disiplin', 'Benefit', 3, 0.136364),
	(5, 'KRITERIA-05', 'Nilai Pedagogik', 'Benefit', 4, 0.181818),
	(6, 'KRITERIA-06', 'Jumlah Pelatihan', 'Benefit', 2, 0.0909091);
/*!40000 ALTER TABLE `master_kriteria` ENABLE KEYS */;

-- Dumping structure for table spk_gurubeasiswa.master_subkriteria
DROP TABLE IF EXISTS `master_subkriteria`;
CREATE TABLE IF NOT EXISTS `master_subkriteria` (
  `imaster_subkriteria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imaster_kriteria` int(11) DEFAULT NULL,
  `vnama` varchar(50) DEFAULT NULL,
  `fnilai` float DEFAULT NULL,
  PRIMARY KEY (`imaster_subkriteria`),
  KEY `imaster_kriteria` (`imaster_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_gurubeasiswa.master_subkriteria: ~30 rows (approximately)
/*!40000 ALTER TABLE `master_subkriteria` DISABLE KEYS */;
INSERT INTO `master_subkriteria` (`imaster_subkriteria`, `imaster_kriteria`, `vnama`, `fnilai`) VALUES
	(1, 1, '>13', 5),
	(2, 1, '10-12', 4),
	(3, 1, '7-9', 3),
	(4, 1, '4-6', 2),
	(5, 1, '1-3', 1),
	(6, 2, '>24', 5),
	(7, 2, '20-24', 4),
	(8, 2, '16-19', 3),
	(9, 2, '10-15', 2),
	(10, 2, '<10', 1),
	(11, 3, '>100', 5),
	(12, 3, '90-99', 4),
	(13, 3, '80-89', 3),
	(14, 3, '70-79', 2),
	(15, 3, '<70', 1),
	(16, 4, '>100', 5),
	(17, 4, '90-99', 4),
	(18, 4, '80-89', 3),
	(19, 4, '70-79', 2),
	(20, 4, '<70', 1),
	(21, 5, '>100', 5),
	(22, 5, '90-99', 4),
	(23, 5, '80-89', 3),
	(24, 5, '70-79', 2),
	(25, 5, '<70', 1),
	(26, 6, '4', 5),
	(27, 6, '3', 4),
	(28, 6, '2', 3),
	(29, 6, '1', 2),
	(30, 6, '0', 1);
/*!40000 ALTER TABLE `master_subkriteria` ENABLE KEYS */;

-- Dumping structure for table spk_gurubeasiswa.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(16) DEFAULT NULL,
  `tpath` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_gurubeasiswa.tb_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id_user`, `nama_user`, `user`, `pass`, `alamat`, `telpon`, `tpath`) VALUES
	(3, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '-', '-', 'Screenshot_from_2018-12-30_21-14-471.png');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
