-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 04:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipa-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment`
--

CREATE TABLE `data_rekrutment` (
  `id` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `nama_rek` varchar(200) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `start` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment`
--

INSERT INTO `data_rekrutment` (`id`, `slug`, `nama_rek`, `tahun`, `start`, `end`, `foto`, `created_on`, `update_at`) VALUES
('62b7e5493c13e', 'bintara-ahli-2022', 'BINTARA KEAHLIAN', '2022', '01-06-2022', '04-07-2022', 'PHOTO_REK-1656218953.png', '2022-06-26 11:49:13', '0000-00-00 00:00:00'),
('62b7e568c300e', 'bintara-reg-2022', 'BINTARA PK REGULAR', '2022', '05-07-2022', '01-08-2022', 'default.jpg', '2022-06-26 11:49:44', '2022-06-26 12:15:55'),
('62b7e58949094', 'taruna-reg-2022', 'TARUNA', '2022', '01-05-2022', '24-05-2022', 'default.jpg', '2022-06-26 11:50:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment_jadwal`
--

CREATE TABLE `data_rekrutment_jadwal` (
  `id` int(11) NOT NULL,
  `id_rek` varchar(100) NOT NULL,
  `isi_jadwal` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment_jadwal`
--

INSERT INTO `data_rekrutment_jadwal` (`id`, `id_rek`, `isi_jadwal`, `created_on`, `update_at`) VALUES
(7, '62b7e5493c13e', 'CABA PK REGULER, KEAHLIAN DAN KHUSUS KEAGAMAAN PRIA SERTA REGULER WANITA\r\n\r\nJADWAL CABA PK REGULER WANITA DAN KEAHLIAN PRIA\r\nDAFTAR ONLINE  MULAI 3 JANUARI SD 13 JULI 2022\r\nDAFTAR ULANG/VALIDASI TGL 4 S.D. 13 JULI 2022\r\nRIK/UJI SUB PANDA TGL 14 SD 26 JULI 2022\r\nRIK/UJI PANDA TGL 28 JULI SD 15 AGUSTUS 2022\r\nRIK/UJI PANPUS TGL 19 AGUSTUS SD 1 SEPTEMBER 2022\r\nBUKA DIK TGL 23 SEPTEMBER 2022\r\n\r\nJADWAL CABA PK REGULER DAN KHUSUS KEAGAMAAN PRIA\r\nDAFTAR ONLINE MULAI 3 JANUARI S.D. 10 AGUSTUS 2022\r\nDAFTAR ULANG/VALIDASI TGL 1 S.D. 10 AGUSTUS 2022\r\nRIK/UJI SUB PANDA TGL 11 S.D. 23 AGUSTUS 2022\r\nRIK/UJI PANDA TGL 25 AGUSTUS S.D.. 2 SEPTEMBER 2022\r\nRIK/UJI PANPUS TGL 8 S.D. 21 SEPTEMBER 2022\r\nBUKA DIK TGL 23 SEPTEMBER 2022', '2022-06-26 11:49:13', '2022-07-01 13:07:49'),
(8, '62b7e568c300e', 'Isi Jadwal Di Sini.... a', '2022-06-26 11:49:44', '2022-07-01 13:07:54'),
(9, '62b7e58949094', 'Isi Jadwal Di Sini....', '2022-06-26 11:50:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment_lokasi`
--

CREATE TABLE `data_rekrutment_lokasi` (
  `id` int(11) NOT NULL,
  `id_rek` varchar(100) NOT NULL,
  `isi_lokasi` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment_lokasi`
--

INSERT INTO `data_rekrutment_lokasi` (`id`, `id_rek`, `isi_lokasi`, `created_on`, `update_at`) VALUES
(7, '62b7e5493c13e', 'TEMPAT INFORMASI DAN PENDAFTARAN:\r\n\r\n1. KODAM I/BB\r\n- KODAM I/BB MEDAN, JL. GATOT SUBROTO KM 7,5 MEDAN, 061-8451300\r\n- KOREM 022/PT SIANTAR, JL. ASAHAN KM 3,5 SIANTAR, 0622-7550071\r\n- KOREM 023/KS SIBOLGA, JL. DATUK IMAM NO. 1 SIBOLGA, 0631-22805\r\n- KOREM 031/WB PEKANBARU, JL. MAYOR ALI RASYID NO. 1 PEKANBARU, 0761-33031\r\n- KOREM 032/WBR PADANG, JL. SAMUDERA NO. 1 PADANG, 0751-23365\r\n- KOREM 033/WP TANJUNG PINANG, JL. SEI TIMUN KM 14 TJ PINANG, 0771-7333025\r\n\r\n2. KODAM II/SWJ\r\n- AJENDAM II/SWJ PALEMBANG, JL. URIP SUMOHARJO KEL 2 ILIR PALEMBANG, 0711-713868\r\n- AJENREM 041/GAMAS BENGKULU, JL. INDRAGIRI NO 28 PADANG HARAPAN BENGKULU, 0736-23952\r\n- AJENREM 042/GAPU JAMBI, JL. DR AK GANI NO. 3 KEL PASAR JAMBI, 0741-23191\r\n- AJENREM 043/GATAM LAMPUNG, JL. SOEKARNO HATTA BY PASS (DEPAN RS IMMANUEL), 0721-702074 \r\n- KOREM 045/GAYA BABEL, JL. RAYA KOBA KM 28, KAB BANGKA TENGAH, BANGKA BELITUNG 0717-9112322\r\n\r\n3. KODAM III/SLW\r\n- AJENDAM III/SLW BANDUNG, JL. BOSCHA NO. 4 BANDUNG, 022-2038102\r\n- AJENREM 061/SK BOGOR, JL MERDEKA NO. 120 BOGOR, 0251-8383269\r\n- AJENREM 062/TN GARUT, JL. BRATAYUDHA 65 GARUT, 0262-2800147\r\n- AJENREM 063/SGJ CIREBON, JL. BYPASS BRIGJEN DARSONO NO 4 CIREBON, 0231-203996\r\n- AJENREM 064/MY SERANG, JL. MAULANA YUSUF NO. 9 SERANG, 0254-200208\r\n \r\n4. KODAM IV/DIP\r\n- AJENDAM IV/DIP SEMARANG, JL. P. KEMERDEKAAN WATUGONG SEMARANG, 074-7474738, 7472249\r\n- AJENREM TIPE B 071 PURWOKERTO, JL JEND SUTOYO N0. 2 PURWOKERTO 0281-637341\r\n- AJENREM TIPE A 072, JL RING ROAD BARAT KM 5,6 DEMAK IJO YOGYAKARTA 0274-566325\r\n- AJENREM 074/WRT, JL. JL. ADISUCIPTO NO 210 MANAHAN SURAKARTA, 0271-719101  \r\n\r\n5.  KODAM V/BRW\r\n- AJENREM TIPE “B” 083 MALANG, JL. KESATRIAN E7 MALANG 0341-326039\r\n- AJENREM TIPE “B” 081 MADIUN, JL. DR SOETOMO NO. 1 MADIUN, 0351-484782\r\n- AJENREM TIPE “B” 082 MOJOKERTO, JL. GAJAH MADA NO. 6 MOJOKERTO, 0321-321078 \r\n- AJENREM TIPE “B” 084 SURABAYA, JL. KEREMBANGAN BARAT NO 65 SURABAYA, 031-3551057\r\n \r\n6. KODAM VI/MLW\r\n- KODAM VI/MLW BALIKPAPAN, JL. JEND. SUDIRMAN BALIKPAPAN, 0542-425342\r\n- KOREM 091/ASN SAMARINDA, JL. GAJAHMADA NO 11 SAMARINDA 0541-73143\r\n- AJENREM 101/ANT BANJARMASIN, JL. PIERE TENDEAN NO 22 BANJARMASIN, 0511-3252141 \r\n\r\n7. KODAM IX/UDY\r\n- AJENDAM IX/UDY BALI, JL PB SUDIRMAN DENPASAR, 0361-228029\r\n- AJENREM 161/WIRASAKTI KUPANG, JL CENDANA NO 7 KUPANG, 0380-821072\r\n- AJENREM 162/WB MATARAM, JL MALOMBA AMPENAN KOTA MATARAM, 0370-621273\r\n\r\n8. KODAM XII/TPR\r\n- KODAM XII/TPR PONTIANAK, JL. ADISUCIPTO KM 6 SEI RAYA PONTIANAK, 0561-723583\r\n- KOREM 102/PJ PALANGKARAYA, JL IMAM BONJOL NO 5 PALANGKARAYA, 0561-724435\r\n- KOREM 121/ABW SINTANG, JL. PANGERAN KUNING NO. 1 SINTANG, 0565-2025674 \r\n\r\n9. KODAM XIII/MDK\r\n- AJENDAM XIII/MDK MANADO, JL. A. YANI 19 SARIO MANADO, 0431-862011\r\n- KOREM 132/TDL PALU, JL. PRAMUKA NO 44 PALU, 0451-421333\r\n- KOREM 133/NW GORONTALO, JL. TRANS SULAWESI KEL. TRIDARMA KEC. PULUBALA KAB. GORONTALO.\r\n\r\n10. KODAM XIV/HSN\r\n- KODAM XIV/HSN MAKASAR, JL. URIP SUMOHARJO KM 7 MAKASSAR, 0411-853108\r\n- KOREM 141/TP BONE, JL. ORDE BARU NO 6 WATAMPONE BONE, 0481-21076\r\n- AJENREM 142/TTG PAREPARE, JL VETERAN NO 1 KEL UJUNG SABBANG KEC UJUNG KOTA PAREPARE SULSEL 0421-23117\r\n- AJENREM TIPE “B” 143/HO KENDARI, JL. DRS H ABD SILONDAE 41 KENDARI, 0401-321444\r\n\r\n11. KODAM XVI/PTM\r\n- AJENDAM XVI/PTM AMBON, JL AJEN NO 1 BATU GAJAH AMBON, 0911-313537\r\n- KOREM 152/BBL TERNATE, JL. PIPIT NO 30 BELAKANG BENTENG TERNATE MALUKU UTARA, 0921-328006 \r\n\r\n12. KODAM XVII/CEN\r\n- AJENDAM XVII/CEN JAYAPURA, JL. DIPONEGORO KEL. GURABESI JAYAPURA UTARA, 0967-533854\r\n- AJENREM 173/PVB BIAK, JL MAJAPAHIT GG TRIKORA 1 NO 9 BELAKANG RRI BIAK, 0981-21471\r\n- KOREM 174/ATW MERAUKE, JL. LB MOERDANI TANAH MIRING MERAUKE PAPUA, 0971-321707 \r\n\r\n13. KODAM XVIII/KSR\r\n- KODAM XVIII/KSR MANOKWARI, JL. TRIKORA ARFAI MANOKWARI PAPUA BARAT  \r\n- KOREM 171/PVT SORONG, JL PRAMUKA 1 SORONG, 0951-331405\r\n\r\n14. KODAM JAYA JAKARTA, JL MAYJEN SUTOYO NO 5 CILILITAN JAKTIM, 021-8091114 \r\n\r\n15. KODAM IM BANDA ACEH\r\n- KODAM IM BANDA ACEH, JL NYAK ADAM KAMIL II NO B1 BANDA ACEH, 0651-266786   \r\n- KOREM 011/LW LHOKSEUMAWE, JL ISKANDAR MUDA NO 5 LHOKSEUMAWE KAB ACEH UTARA 0645-43196\r\n- KOREM 012/TU MEULABOH, JL. ALUE PEUNYARING DESA UJONG TANOH DARAT KEC MEUREBO KAB ACEH BARAT 0655-7556010', '2022-06-26 11:49:13', '2022-07-01 13:05:58'),
(8, '62b7e568c300e', 'Isi Lokasi Di Sini....', '2022-06-26 11:49:44', '0000-00-00 00:00:00'),
(9, '62b7e58949094', 'Isi Lokasi Di Sini.... as', '2022-06-26 11:50:17', '2022-07-01 13:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment_materi`
--

CREATE TABLE `data_rekrutment_materi` (
  `id` int(11) NOT NULL,
  `id_rek` varchar(100) NOT NULL,
  `isi_materi` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment_materi`
--

INSERT INTO `data_rekrutment_materi` (`id`, `id_rek`, `isi_materi`, `created_on`, `update_at`) VALUES
(7, '62b7e5493c13e', 'Aspek Penilaian\r\n\r\nMATERI PENILAIAN\r\n\r\n(1)       ADMINISTRASI;\r\n(2)       KESEHATAN;\r\n(3)       JASMANI;\r\n(4)       LITPERS;      \r\n(5)       PSIKOLOGI;\r\n(6)       KEAHLIAN KEAGAMAAN (KHUSUS KEAGAMAAN)', '2022-06-26 11:49:13', '2022-07-01 13:09:24'),
(8, '62b7e568c300e', 'Isi Materi Di Sini.... addf', '2022-06-26 11:49:44', '2022-07-01 13:09:06'),
(9, '62b7e58949094', 'Isi Materi Di Sini.... a', '2022-06-26 11:50:17', '2022-07-01 13:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment_panduan`
--

CREATE TABLE `data_rekrutment_panduan` (
  `id` int(11) NOT NULL,
  `id_rek` varchar(100) NOT NULL,
  `isi_panduan` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment_panduan`
--

INSERT INTO `data_rekrutment_panduan` (`id`, `id_rek`, `isi_panduan`, `created_on`, `update_at`) VALUES
(7, '62b7e5493c13e', 'TATA CARA PENDAFTARAN\r\n\r\n1. Calon mendaftar Online Bintara PK TNI AD melalui website penerimaan prajurit TNI yaitu di alamat http://rekrutmen-tni.mil.id sesuai batas waktu yang telah ditentukan. (Bagi calon yang belum memahami cara mendaftar melalui Online dapat langsung datang ke tempat pendaftaran untuk mendapatkan penjelasan dari petugas pendaftaran bagaimana cara mendaftar dengan membawa persyaratan administrasi sesuai ketentuan yang berlaku)\r\n2. Cetak Printout formulir pendaftaran\r\n3. Datang ke Ajendam/Rem terdekat untuk melaksanakan daftar ulang (di luar tanggal yang telah ditentukan adalah tidak sah) \r\n4. Persiapkan diri sebaik-baiknya untuk mengikuti kegiatan seleksi\r\n5. Ikuti tahapan seleksi yang telah diatur oleh Panda masing-masing\r\n6. Selama proses kegiatan penerimaan tidak dipungut biaya apapun', '2022-06-26 11:49:13', '2022-07-01 13:11:04'),
(8, '62b7e568c300e', 'Isi Panduan Di Sini.... d', '2022-06-26 11:49:44', '2022-07-01 13:10:24'),
(9, '62b7e58949094', 'Isi Panduan Di Sini.... a', '2022-06-26 11:50:17', '2022-07-01 13:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment_pengumuman`
--

CREATE TABLE `data_rekrutment_pengumuman` (
  `id` int(11) NOT NULL,
  `id_rek` varchar(100) NOT NULL,
  `isi_pengumuman` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment_pengumuman`
--

INSERT INTO `data_rekrutment_pengumuman` (`id`, `id_rek`, `isi_pengumuman`, `created_on`, `update_at`) VALUES
(7, '62b7e5493c13e', 'TELAH DIBUKA !\r\nPENDAFTARAN BINTARA KEAHLIAN TNI AD TA 2022\r\n', '2022-06-26 11:49:13', '2022-06-26 12:34:37'),
(8, '62b7e568c300e', 'Isi Pengumuman Di Sini....', '2022-06-26 11:49:44', '0000-00-00 00:00:00'),
(9, '62b7e58949094', 'Pengumuman taruna s', '2022-06-26 11:50:17', '2022-07-01 12:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekrutment_persyaratan`
--

CREATE TABLE `data_rekrutment_persyaratan` (
  `id` int(11) NOT NULL,
  `id_rek` varchar(100) NOT NULL,
  `isi_persyaratan` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekrutment_persyaratan`
--

INSERT INTO `data_rekrutment_persyaratan` (`id`, `id_rek`, `isi_persyaratan`, `created_on`, `update_at`) VALUES
(7, '62b7e5493c13e', 'a. Persyaratan umum. Persyaratan umum yang harus dipenuhi antara lain:\r\n\r\n1) Warga negara Indonesia;\r\n2) Beriman dan bertaqwa kepada Tuhan Yang Maha Esa;\r\n3) Setia kepada Negara Kesatuan Republik Indonesia yang berdasarkan Pancasila dan Undang-Undang Dasar Republik Indonesia tahun 1945;\r\n4) Tidak memiliki catatan kriminalitas yang dikeluarkan secara tertulis oleh Kepolisian Republik Indonesia;\r\n5) Sehat jasmani dan rohani serta tidak berkacamata; dan\r\n6) Tidak sedang kehilangan hak menjadi prajurit berdasarkan putusan pengadilan yang telah memperoleh kekuatan hukum tetap.\r\n\r\nb. Persyaratan lain.\r\n\r\n1) Pria dan/atau wanita, bukan anggota/mantan prajurit TNI/Polri atau PNS TNI.\r\n2) Berijazah minimal SMA/MA/SMK baik negeri atau swasta yang terakreditasi sesuai kebutuhan, dengan persyaratan nilai rata-rata sebagai berikut serta tambahan untuk sumber santri calon merupakan santri lulusan pondok pesantren dan untuk keagamaan di sampaikan waktu daftar ulang/validasi:\r\na) Lulusan SMA/MA/SMK tahun 2017, nilai ujian nasional rata-rata minimal 40 (untuk wilayah di Pulau Jawa, Pulau Sumatera dan provinsi Bali) dan minimal 38 untuk wilayah lainnya;\r\nb) Lulusan SMA/MA/SMK tahun 2018, nilai ujian nasional rata-rata minimal 39 (untuk wilayah di Pulau Jawa, Pulau Sumatera dan provinsi Bali) dan minimal 37 untuk wilayah lainnya; dan\r\nc) Lulusan SMA/MA/SMK tahun 2019, nilai ujian nasional rata-rata minimal 40.5 (untuk wilayah di Pulau Jawa, Pulau Sumatera dan provinsi Bali) dan minimal 38.5 untuk wilayah lainnya.\r\nd) Lulusan SMA/MA/SMK tahun 2019, nilai ujian nasional rata-rata minimal 40.5 (untuk wilayah di Pulau Jawa, Pulau Sumatera dan provinsi Bali) dan minimal 38.5 untuk wilayah lainnya.\r\ne)Lulusan SMA/MA/SMK tahun 2020, nilai minimal rata-rata raport dari 3 mata pelajaran (Bahasa Indonesia, Bahasa Inggris, dan Matematika) adalah 68.\r\nf) Lulusan SMA/MA/SMK tahun 2021, nilai minimal rata-rata raport dari 3 mata pelajaran (Bahasa Indonesia, Bahasa Inggris, dan Matematika) adalah 70.g) Lulusan SMA/MA/SMK tahun 2022, nilai ujian nasional rata-rata akan ditentukan kemudian\r\n3) Belum pernah kawin dan sanggup tidak kawin selama dalam pendidikan pertama sampai dengan 2 (dua) tahun setelah selesai pendidikan pertama.\r\n4) Usia:\r\na)  Berumur sekurang-kurangnya 17 tahun 9 bulan dan setinggi-tingginya 22 tahun pada saat pembukaan pendidikan pertama tanggal 6 Mei 2022 untuk Caba PK sumber Santri Lintas Agama Gel I.\r\nb)  Berumur sekurang-kurangnya 17 tahun 9 bulan dan setinggi-tingginya 22 tahun pada saat pembukaan pendidikan pertama tanggal 25 September 2022 untuk Caba PK keahlian Pria, Santri LIntas Agama Gel II dan Reguler Wanita.\r\n5) Memiliki tinggi badan sekurang-kurangnya 160 cm untuk laki-laki dan 155 cm untuk perempuan serta memiliki berat badan seimbang menurut ketentuan yang berlaku.\r\n6) Bersedia menjalani Ikatan Dinas Pertama (IDP) selama 10 (sepuluh) tahun.\r\n7) Bersedia ditempatkan di seluruh wilayah Negara Kesatuan Republik Indonesia.\r\n8) Harus mengikuti pemeriksaan/pengujian yang diselenggarakan oleh panitia penerimaan yang meliputi:\r\na) Administrasi;\r\nb) Kesehatan;\r\nc) Jasmani;\r\nd) Litpers; dan     \r\ne) Psikologi.     \r\n\r\nc. Persyaratan tambahan.\r\n\r\n1) Harus ada surat persetujuan orang tua/wali dan selama proses penerimaan prajurit TNI AD tidak melakukan intervensi terhadap panitia penerimaan maupun penyelenggara pendidikan pertama dalam bentuk apapun, kapanpun dan dimanapun.\r\n2) Orang yang ditunjuk sebagai wali dari yang bersangkutan berdasarkan surat keterangan dari Kecamatan.\r\n3) Bagi yang memperoleh ijazah dari negara lain atau lembaga pendidikan di luar naungan Kemendikbud, harus mendapat pengesahan dari Kemendikbud.\r\n4) Tidak bertato/bekas tato dan tidak ditindik/bekas tindik, kecuali yang disebabkan oleh ketentuan agama/adat.\r\n5) Bersedia mematuhi peraturan bebas KKN baik langsung maupun tidak langsung, apabila terbukti secara hukum melanggar sebagaimana yang dimaksud, maka harus bersedia dinyatakan tidak lulus dan atau dikeluarkan dari Dikma, jika pelanggaran tersebut ditemukan di kemudian hari pada saat mengikuti pendidikan pertama. \r\n6) Memiliki kartu BPJS (Badan Penyelenggara Jaminan Sosial) aktif. \r\n\r\nd. Persyaratan khusus.\r\nMemenuhi persyaratan Rik/Uji sesuai dengan ketentuan. ', '2022-06-26 11:49:13', '2022-07-01 12:47:16'),
(8, '62b7e568c300e', 'Isi Persyaratan Di Sini.... ok', '2022-06-26 11:49:44', '2022-07-01 12:45:09'),
(9, '62b7e58949094', 'Isi Persyaratan Di Sini....', '2022-06-26 11:50:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email_username` varchar(50) NOT NULL,
  `password` varchar(226) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `foto_admin` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `role_id` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `admin_online` int(1) NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_logout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email_username`, `password`, `nama_admin`, `foto_admin`, `role_id`, `active`, `admin_online`, `created_on`, `update_at`, `last_login`, `last_logout`) VALUES
(1, 'vebri@admin.com', '$2y$10$lR.gs1.j5eL19x399IwlFetcw.Ae1mM8XU.r/eKJid6QQ8Dyj9unS', 'Vebri Yusdi Putra Pradana', 'PHOTO_ADMIN-1653141450.JPG', 1, 1, 1, '2021-02-12 09:50:30', '2022-05-23 11:47:12', '2022-07-17 09:06:31', '2022-07-17 09:04:39'),
(5, 'kodam5@petugas.com', '$2y$10$SknIiTfxjMEM7LUxIGLOGO9wjpROOtnAbDnvukRpQBb/efuGEVqtG', 'KODAM 5 BRAWIJAYA', 'PHOTO_ADMIN-1653572073.png', 1, 1, 0, '2022-04-19 14:04:59', '2022-05-26 20:35:11', '2022-05-26 20:35:39', '2022-05-26 20:35:48'),
(6, 'rem083@petugas.com', '$2y$10$TE5QO.9Z6y4Tlu3SnjqWBe4UnD51gggL4nuH0cR9wn0YR..CVlEPe', 'AJENREM 083', 'user.jpg', 3, 1, 0, '2022-04-19 14:05:24', '2022-05-26 20:22:08', '2022-04-19 14:05:24', '2022-04-19 14:05:24'),
(7, 'chanelpusat330@gmail.com', '$2y$10$AX/Nrkpetqj5bdH0oSWMBu7Ha8Gc2VvCkZQvF7fObuj3pQBkbC3iq', 'VEBRI 330', 'user.jpg', 3, 0, 0, '2022-07-01 14:12:50', '2022-07-01 14:12:50', '2022-07-01 14:12:50', '2022-07-01 14:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_token`
--

CREATE TABLE `tbl_admin_token` (
  `id` int(11) NOT NULL,
  `email_username` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_token`
--

INSERT INTO `tbl_admin_token` (`id`, `email_username`, `token`, `created_on`) VALUES
(1, 'chanelpusat330@gmail.com', 'Udaq3dYShYn3F4ZK5Mm7FOO5bxgllJb6apwOb5w76f4=', 1656659570);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_agama`
--

CREATE TABLE `tbl_data_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_agama`
--

INSERT INTO `tbl_data_agama` (`id_agama`, `nama_agama`, `created_on`, `update_at`) VALUES
(2, 'Islam', '2022-05-29 19:55:57', '0000-00-00 00:00:00'),
(5, 'Kristen', '2022-05-29 20:08:03', '0000-00-00 00:00:00'),
(6, 'Budha', '2022-05-29 20:08:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_instansi_kodam`
--

CREATE TABLE `tbl_data_instansi_kodam` (
  `id` int(11) NOT NULL,
  `nama_kodam` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `jml_korem` int(11) NOT NULL,
  `jml_kodim` int(11) NOT NULL,
  `jml_koramil` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_instansi_kodam`
--

INSERT INTO `tbl_data_instansi_kodam` (`id`, `nama_kodam`, `wilayah`, `foto`, `jml_korem`, `jml_kodim`, `jml_koramil`, `created_on`, `update_at`) VALUES
(2, 'KODAM 5 BRAWIJAYA', 'Jawa Timur', 'PHOTO_KODAM-1654145973.png', 4, 33, 64, '2022-06-02 11:37:12', '2022-06-02 12:03:13'),
(4, 'KODAM 4 DIPONEGORO', 'Jawa Tengah', 'PHOTO_KODAM-1654146246.png', 4, 38, 10, '2022-06-02 12:04:06', '0000-00-00 00:00:00'),
(5, 'KODAM 3 SILIWANGI', 'Jawa Barat', 'PHOTO_KODAM-1654146277.png', 4, 25, 17, '2022-06-02 12:04:37', '0000-00-00 00:00:00'),
(6, 'KODAM 6 MULAWARMAN', 'Kalimantan Selatan,Timur,Utara', 'PHOTO_KODAM-1654146357.png', 1, 0, 0, '2022-06-02 12:05:45', '2022-06-02 12:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_instansi_kodim`
--

CREATE TABLE `tbl_data_instansi_kodim` (
  `id` int(11) NOT NULL,
  `id_kodam` int(11) NOT NULL,
  `id_korem` int(11) NOT NULL,
  `nama_kodim` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_instansi_kodim`
--

INSERT INTO `tbl_data_instansi_kodim` (`id`, `id_kodam`, `id_korem`, `nama_kodim`, `wilayah`, `foto`, `created_on`, `update_at`) VALUES
(1, 2, 14, 'Kodim 0818', 'Kab.Malang - Kota Batu', 'default.jpg', '2022-06-02 20:57:54', '2022-06-02 21:15:15'),
(2, 2, 14, 'Kodim 0819', 'Pasuruan', 'default.jpg', '2022-06-02 20:58:12', '0000-00-00 00:00:00'),
(3, 2, 14, 'Kodim 0820', 'Probolinggo', 'default.jpg', '2022-06-02 20:59:26', '0000-00-00 00:00:00'),
(4, 2, 14, 'Kodim 0821', 'Lumajang', 'default.jpg', '2022-06-02 20:59:38', '0000-00-00 00:00:00'),
(5, 2, 14, 'Kodim 0822', 'Bondowoso', 'default.jpg', '2022-06-02 20:59:59', '0000-00-00 00:00:00'),
(6, 2, 14, 'Kodim 0823', 'Situbondo', 'default.jpg', '2022-06-02 21:00:17', '0000-00-00 00:00:00'),
(7, 2, 14, 'Kodim 0824', 'Jember', 'default.jpg', '2022-06-02 21:00:31', '0000-00-00 00:00:00'),
(8, 2, 14, 'Kodim 0825', 'Banyuwangi', 'default.jpg', '2022-06-02 21:00:41', '0000-00-00 00:00:00'),
(9, 2, 14, 'Kodim 0833', 'Kota Malang', 'default.jpg', '2022-06-02 21:00:52', '0000-00-00 00:00:00'),
(10, 2, 12, 'Kodim 0801', 'Pacitan', 'default.jpg', '2022-06-02 21:01:21', '0000-00-00 00:00:00'),
(11, 2, 12, 'Kodim 0802', 'Ponorogo', 'default.jpg', '2022-06-02 21:01:35', '0000-00-00 00:00:00'),
(12, 2, 12, 'Kodim 0803', 'Madiun', 'default.jpg', '2022-06-02 21:01:55', '0000-00-00 00:00:00'),
(13, 2, 12, 'Kodim 0804', 'Magetan', 'default.jpg', '2022-06-02 21:02:05', '0000-00-00 00:00:00'),
(14, 2, 12, 'Kodim 0805', 'Ngawi', 'default.jpg', '2022-06-02 21:02:17', '0000-00-00 00:00:00'),
(15, 2, 12, 'Kodim 0806', 'Trenggalek', 'default.jpg', '2022-06-02 21:02:27', '0000-00-00 00:00:00'),
(16, 2, 12, 'Kodim 0807', 'Tulungagung', 'default.jpg', '2022-06-02 21:02:36', '0000-00-00 00:00:00'),
(17, 2, 12, 'Kodim 0808', 'Blitar', 'default.jpg', '2022-06-02 21:02:45', '0000-00-00 00:00:00'),
(18, 2, 12, 'Kodim 0810', 'Nganjuk', 'default.jpg', '2022-06-02 21:02:52', '0000-00-00 00:00:00'),
(19, 2, 11, 'Kodim 0809', 'Kediri', 'default.jpg', '2022-06-02 21:03:20', '0000-00-00 00:00:00'),
(20, 2, 11, 'Kodim 0811', 'Tuban', 'default.jpg', '2022-06-02 21:03:26', '0000-00-00 00:00:00'),
(21, 2, 11, 'Kodim 0812', 'Lamongan', 'default.jpg', '2022-06-02 21:03:35', '0000-00-00 00:00:00'),
(22, 2, 11, 'Kodim 0813', 'Bojonegoro', 'default.jpg', '2022-06-02 21:03:45', '0000-00-00 00:00:00'),
(23, 2, 11, 'Kodim 0814', 'Jombang', 'default.jpg', '2022-06-02 21:03:54', '0000-00-00 00:00:00'),
(24, 2, 11, 'Kodim 0815', 'Mojokerto', 'default.jpg', '2022-06-02 21:04:05', '0000-00-00 00:00:00'),
(25, 2, 15, 'Kodim 0816', 'Sidoarjo', 'default.jpg', '2022-06-02 21:04:29', '0000-00-00 00:00:00'),
(26, 2, 15, 'Kodim 0817', 'Gresik', 'default.jpg', '2022-06-02 21:04:37', '0000-00-00 00:00:00'),
(27, 2, 15, 'Kodim 0826', 'Pamekasan', 'default.jpg', '2022-06-02 21:04:44', '0000-00-00 00:00:00'),
(28, 2, 15, 'Kodim 0827', 'Sumenep', 'default.jpg', '2022-06-02 21:04:53', '0000-00-00 00:00:00'),
(29, 2, 15, 'Kodim 0828', 'Sampang', 'default.jpg', '2022-06-02 21:05:02', '0000-00-00 00:00:00'),
(30, 2, 15, 'Kodim 0829', 'Bangkalan', 'default.jpg', '2022-06-02 21:05:10', '0000-00-00 00:00:00'),
(31, 2, 15, 'Kodim 0830', 'Surabaya Utara', 'default.jpg', '2022-06-02 21:05:19', '0000-00-00 00:00:00'),
(32, 2, 15, 'Kodim 0831', 'Surabaya Timur', 'default.jpg', '2022-06-02 21:05:27', '0000-00-00 00:00:00'),
(33, 2, 15, 'Kodim 0832', 'Surabaya Selatan', 'default.jpg', '2022-06-02 21:05:35', '0000-00-00 00:00:00'),
(34, 4, 16, 'Kodim 0701', 'Kabupaten Banyumas', 'default.jpg', '2022-06-03 14:24:29', '0000-00-00 00:00:00'),
(35, 4, 16, 'Kodim 0702', 'Purbalingga', 'default.jpg', '2022-06-03 14:24:55', '0000-00-00 00:00:00'),
(36, 4, 16, 'Kodim 0703', 'Cilacap', 'default.jpg', '2022-06-03 14:25:12', '0000-00-00 00:00:00'),
(37, 4, 16, 'Kodim 0704', 'Banjarnegara', 'default.jpg', '2022-06-03 14:25:21', '0000-00-00 00:00:00'),
(38, 4, 16, 'Kodim 0710', 'Pekalongan', 'default.jpg', '2022-06-03 14:25:29', '0000-00-00 00:00:00'),
(39, 4, 16, 'Kodim 0711', 'Pemalang', 'default.jpg', '2022-06-03 14:25:37', '0000-00-00 00:00:00'),
(40, 4, 16, 'Kodim 0712', 'Tegal', 'default.jpg', '2022-06-03 14:25:45', '0000-00-00 00:00:00'),
(41, 4, 16, 'Kodim 0713', 'Brebes', 'default.jpg', '2022-06-03 14:25:54', '0000-00-00 00:00:00'),
(42, 4, 16, 'Kodim 0736', 'Batang', 'default.jpg', '2022-06-03 14:26:03', '0000-00-00 00:00:00'),
(43, 4, 17, 'Kodim 0705', 'Magelang', 'default.jpg', '2022-06-03 14:26:16', '0000-00-00 00:00:00'),
(44, 4, 17, 'Kodim 0706', 'Temanggung', 'default.jpg', '2022-06-03 14:26:26', '0000-00-00 00:00:00'),
(45, 4, 17, 'Kodim 0707', 'Wonosobo', 'default.jpg', '2022-06-03 14:26:36', '0000-00-00 00:00:00'),
(46, 4, 17, 'Kodim 0708', 'Purworejo', 'default.jpg', '2022-06-03 14:26:45', '0000-00-00 00:00:00'),
(47, 4, 17, 'Kodim 0709', 'Kebumen', 'default.jpg', '2022-06-03 14:27:00', '0000-00-00 00:00:00'),
(48, 4, 17, 'Kodim 0729', 'Bantul', 'default.jpg', '2022-06-03 14:27:08', '0000-00-00 00:00:00'),
(49, 4, 17, 'Kodim 0730', 'Gunung Kidul', 'default.jpg', '2022-06-03 14:27:17', '0000-00-00 00:00:00'),
(50, 4, 17, 'Kodim 0731', 'Kulon Progo', 'default.jpg', '2022-06-03 14:27:26', '0000-00-00 00:00:00'),
(51, 4, 17, 'Kodim 0732', 'Sleman', 'default.jpg', '2022-06-03 14:27:35', '0000-00-00 00:00:00'),
(52, 4, 17, 'Kodim 0734', 'Yogyakarta', 'default.jpg', '2022-06-03 14:27:43', '0000-00-00 00:00:00'),
(53, 4, 17, 'Yonif Mekanis 403', 'Wirasada Pratista', 'default.jpg', '2022-06-03 14:27:56', '0000-00-00 00:00:00'),
(54, 4, 18, 'Kodim 0714', 'Salatiga', 'default.jpg', '2022-06-03 14:28:11', '0000-00-00 00:00:00'),
(55, 4, 18, 'Kodim 0715', 'Kendal', 'default.jpg', '2022-06-03 14:28:21', '0000-00-00 00:00:00'),
(56, 4, 18, 'Kodim 0716', 'Demak', 'default.jpg', '2022-06-03 14:28:28', '0000-00-00 00:00:00'),
(57, 4, 18, 'Kodim 0717', 'Purwodadi', 'default.jpg', '2022-06-03 14:28:36', '0000-00-00 00:00:00'),
(58, 4, 18, 'Kodim 0718', 'Pati', 'default.jpg', '2022-06-03 14:28:44', '0000-00-00 00:00:00'),
(59, 4, 18, 'Kodim 0719', 'Jepara', 'default.jpg', '2022-06-03 14:28:55', '0000-00-00 00:00:00'),
(60, 4, 18, 'Kodim 0720', 'Rembang', 'default.jpg', '2022-06-03 14:29:03', '0000-00-00 00:00:00'),
(61, 4, 18, 'Kodim 0721', 'Blora', 'default.jpg', '2022-06-03 14:29:11', '0000-00-00 00:00:00'),
(62, 4, 18, 'Kodim 0722', 'Kudus', 'default.jpg', '2022-06-03 14:29:21', '0000-00-00 00:00:00'),
(63, 4, 18, 'Yonif 410', 'Alugora', 'default.jpg', '2022-06-03 14:29:30', '0000-00-00 00:00:00'),
(64, 4, 19, 'Kodim 0723', 'Klaten', 'default.jpg', '2022-06-03 14:29:43', '0000-00-00 00:00:00'),
(65, 4, 19, 'Kodim 0724', 'Boyolali', 'default.jpg', '2022-06-03 14:29:50', '0000-00-00 00:00:00'),
(66, 4, 19, 'Kodim 0725', 'Sragen', 'default.jpg', '2022-06-03 14:29:57', '2022-06-03 14:30:04'),
(67, 4, 19, 'Kodim 0726', 'Sukoharjo', 'default.jpg', '2022-06-03 14:30:13', '0000-00-00 00:00:00'),
(68, 4, 19, 'Kodim 0727', 'Karanganyar', 'default.jpg', '2022-06-03 14:30:21', '0000-00-00 00:00:00'),
(69, 4, 19, 'Kodim 0728', 'Wonogiri', 'default.jpg', '2022-06-03 14:30:31', '0000-00-00 00:00:00'),
(70, 4, 19, 'Kodim 0735', 'Surakarta', 'default.jpg', '2022-06-03 14:30:41', '0000-00-00 00:00:00'),
(71, 4, 19, 'Yonif Raider 408', 'Suhbrastha', 'default.jpg', '2022-06-03 14:30:49', '0000-00-00 00:00:00'),
(72, 5, 20, 'Kodim 0606', 'Kota Bogor', 'default.jpg', '2022-06-03 19:46:42', '0000-00-00 00:00:00'),
(73, 5, 20, 'Kodim 0607', 'Kota Sukabumi', 'default.jpg', '2022-06-03 19:46:50', '0000-00-00 00:00:00'),
(74, 5, 20, 'Kodim 0608', 'Cianjur', 'default.jpg', '2022-06-03 19:46:59', '0000-00-00 00:00:00'),
(75, 5, 20, 'Kodim 0621', 'Kabupaten Bogor', 'default.jpg', '2022-06-03 19:47:07', '0000-00-00 00:00:00'),
(76, 5, 20, 'Kodim 0622', 'Kabupaten Sukabumi', 'default.jpg', '2022-06-03 19:47:15', '0000-00-00 00:00:00'),
(77, 5, 21, 'Kodim 0609', 'Cimahi', 'default.jpg', '2022-06-03 19:48:58', '0000-00-00 00:00:00'),
(78, 5, 21, 'Kodim 0610', 'Sumedang', 'default.jpg', '2022-06-03 19:49:10', '0000-00-00 00:00:00'),
(79, 5, 21, 'Kodim 0611', 'Garut', 'default.jpg', '2022-06-03 19:49:17', '0000-00-00 00:00:00'),
(80, 5, 21, 'Kodim 0612', 'Tasikmalaya', 'default.jpg', '2022-06-03 19:49:23', '0000-00-00 00:00:00'),
(81, 5, 21, 'Kodim 0613', 'Ciamis', 'default.jpg', '2022-06-03 19:49:29', '0000-00-00 00:00:00'),
(82, 5, 21, 'Kodim 0624', 'Kabupaten Bandung', 'default.jpg', '2022-06-03 19:49:38', '0000-00-00 00:00:00'),
(83, 5, 21, 'Kodim 0625', 'Pangandaran', 'default.jpg', '2022-06-03 19:49:44', '0000-00-00 00:00:00'),
(84, 5, 22, 'Kodim 0604', 'Karawang', 'default.jpg', '2022-06-03 19:52:24', '0000-00-00 00:00:00'),
(85, 5, 22, 'Kodim 0605 ', 'Subang', 'default.jpg', '2022-06-03 19:52:40', '0000-00-00 00:00:00'),
(86, 5, 22, 'Kodim 0614', 'Kota Cirebon', 'default.jpg', '2022-06-03 19:52:46', '0000-00-00 00:00:00'),
(87, 5, 22, 'Kodim 0615', 'Kuningan', 'default.jpg', '2022-06-03 19:52:53', '0000-00-00 00:00:00'),
(88, 5, 22, 'Kodim 0616', 'Indramayu', 'default.jpg', '2022-06-03 19:53:01', '0000-00-00 00:00:00'),
(89, 5, 22, 'Kodim 0617 ', 'Majalengka', 'default.jpg', '2022-06-03 19:53:09', '0000-00-00 00:00:00'),
(90, 5, 22, 'Kodim 0619', 'Purwakarta', 'default.jpg', '2022-06-03 19:53:17', '0000-00-00 00:00:00'),
(91, 5, 22, 'Kodim 0620', 'Kabupaten Cirebon', 'default.jpg', '2022-06-03 19:53:25', '0000-00-00 00:00:00'),
(92, 5, 23, 'Kodim 0601', 'Pandeglang', 'default.jpg', '2022-06-03 19:54:45', '0000-00-00 00:00:00'),
(93, 5, 23, 'Kodim 0602', 'Serang', 'default.jpg', '2022-06-03 19:54:51', '0000-00-00 00:00:00'),
(94, 5, 23, 'Kodim 0603', 'Lebak', 'default.jpg', '2022-06-03 19:54:56', '0000-00-00 00:00:00'),
(95, 5, 23, 'Kodim 0623', 'Cilegon', 'default.jpg', '2022-06-03 19:55:03', '0000-00-00 00:00:00'),
(96, 5, 23, 'Yonif 320', 'Badak Putih', 'default.jpg', '2022-06-03 19:55:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_instansi_koramil`
--

CREATE TABLE `tbl_data_instansi_koramil` (
  `id` int(11) NOT NULL,
  `id_kodam` int(11) NOT NULL,
  `id_korem` int(11) NOT NULL,
  `id_kodim` int(11) NOT NULL,
  `nama_koramil` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_instansi_koramil`
--

INSERT INTO `tbl_data_instansi_koramil` (`id`, `id_kodam`, `id_korem`, `id_kodim`, `nama_koramil`, `wilayah`, `foto`, `created_on`, `update_at`) VALUES
(11, 2, 14, 1, 'Koramil 0818/01', 'Pujon', 'default.jpg', '2022-06-03 19:26:25', '0000-00-00 00:00:00'),
(12, 2, 14, 1, 'Koramil 0818/02', 'Batu', 'default.jpg', '2022-06-03 19:26:40', '0000-00-00 00:00:00'),
(13, 2, 14, 1, 'Koramil 0818/03', 'Kasembon', 'default.jpg', '2022-06-03 19:26:51', '0000-00-00 00:00:00'),
(14, 2, 14, 1, 'Koramil 0818/04', 'Ngantang', 'default.jpg', '2022-06-03 19:27:03', '0000-00-00 00:00:00'),
(15, 2, 14, 1, 'Koramil 0818/05', 'Kepanjen', 'default.jpg', '2022-06-03 19:27:18', '0000-00-00 00:00:00'),
(16, 2, 14, 1, 'Koramil 0818/06', 'Sumberpucung', 'default.jpg', '2022-06-03 19:27:28', '0000-00-00 00:00:00'),
(17, 2, 14, 1, 'Koramil 0818/07', 'Pakisaji', 'default.jpg', '2022-06-03 19:27:41', '0000-00-00 00:00:00'),
(18, 2, 14, 1, 'Koramil 0818/08', 'Wagir', 'default.jpg', '2022-06-03 19:27:48', '0000-00-00 00:00:00'),
(19, 2, 14, 1, 'Koramil 0818/09', 'Ngajum', 'default.jpg', '2022-06-03 19:27:57', '0000-00-00 00:00:00'),
(20, 2, 14, 1, 'Koramil 0818/10', 'Pagak', 'default.jpg', '2022-06-03 19:28:07', '0000-00-00 00:00:00'),
(21, 2, 14, 1, 'Koramil 0818/11', 'Donomulyo', 'default.jpg', '2022-06-03 19:28:17', '0000-00-00 00:00:00'),
(22, 2, 14, 1, 'Koramil 0818/12', 'Wagir', 'default.jpg', '2022-06-03 19:28:26', '0000-00-00 00:00:00'),
(23, 2, 14, 1, 'Koramil 0818/13 ', 'Kalipare', 'default.jpg', '2022-06-03 19:28:34', '0000-00-00 00:00:00'),
(24, 2, 14, 1, 'Koramil 0818/14 ', 'Turen', 'default.jpg', '2022-06-03 19:28:44', '0000-00-00 00:00:00'),
(25, 2, 14, 1, 'Koramil 0818/15 ', 'Dampit', 'default.jpg', '2022-06-03 19:28:49', '0000-00-00 00:00:00'),
(26, 2, 14, 1, 'Koramil 0818/16 ', 'Sumbermanjing Wetan', 'default.jpg', '2022-06-03 19:28:59', '0000-00-00 00:00:00'),
(27, 2, 14, 1, 'Koramil 0818/17 ', 'Ampelgading', 'default.jpg', '2022-06-03 19:29:07', '0000-00-00 00:00:00'),
(28, 2, 14, 1, 'Koramil 0818/18 ', 'Bululawang', 'default.jpg', '2022-06-03 19:29:14', '0000-00-00 00:00:00'),
(29, 2, 14, 1, 'Koramil 0818/19 ', 'Gondanglegi', 'default.jpg', '2022-06-03 19:29:22', '0000-00-00 00:00:00'),
(30, 2, 14, 1, 'Koramil 0818/20 ', 'Tajinan', 'default.jpg', '2022-06-03 19:29:30', '0000-00-00 00:00:00'),
(31, 2, 14, 1, 'Koramil 0818/21 ', 'Wajak', 'default.jpg', '2022-06-03 19:29:38', '0000-00-00 00:00:00'),
(32, 2, 14, 1, 'Koramil 0818/22 ', 'Tumpang', 'default.jpg', '2022-06-03 19:29:48', '0000-00-00 00:00:00'),
(33, 2, 14, 1, 'Koramil 0818/23 ', 'Jabung', 'default.jpg', '2022-06-03 19:29:56', '0000-00-00 00:00:00'),
(34, 2, 14, 1, 'Koramil 0818/24 ', 'Poncokusumo', 'default.jpg', '2022-06-03 19:30:06', '0000-00-00 00:00:00'),
(35, 2, 14, 1, 'Koramil 0818/25 ', 'Pakis', 'default.jpg', '2022-06-03 19:30:14', '0000-00-00 00:00:00'),
(36, 2, 14, 1, 'Koramil 0818/26 ', 'Singosari', 'default.jpg', '2022-06-03 19:30:21', '0000-00-00 00:00:00'),
(37, 2, 14, 1, 'Koramil 0818/27 ', 'Lawang', 'default.jpg', '2022-06-03 19:30:30', '0000-00-00 00:00:00'),
(38, 2, 14, 1, 'Koramil 0818/28 ', 'Karangploso', 'default.jpg', '2022-06-03 19:30:38', '0000-00-00 00:00:00'),
(39, 2, 14, 1, 'Koramil 0818/29 ', 'Dau', 'default.jpg', '2022-06-03 19:30:45', '0000-00-00 00:00:00'),
(40, 2, 14, 1, 'Koramil 0818/30 ', 'Tirtoyudo', 'default.jpg', '2022-06-03 19:30:53', '0000-00-00 00:00:00'),
(41, 2, 14, 1, 'Koramil 0818/31 ', 'Gedangan', 'default.jpg', '2022-06-03 19:30:59', '0000-00-00 00:00:00'),
(42, 2, 14, 1, 'Koramil 0818/32 ', 'Wonosari', 'default.jpg', '2022-06-03 19:31:06', '0000-00-00 00:00:00'),
(43, 2, 14, 1, 'Koramil 0818/33 ', 'Bumiaji', 'default.jpg', '2022-06-03 19:31:16', '0000-00-00 00:00:00'),
(44, 2, 14, 1, 'Pos Koramil 0818/34 ', 'Junrejo', 'default.jpg', '2022-06-03 19:31:25', '0000-00-00 00:00:00'),
(45, 2, 14, 1, 'Pos Koramil 0818/35 ', 'Kromengan', 'default.jpg', '2022-06-03 19:31:35', '0000-00-00 00:00:00'),
(46, 2, 14, 1, 'Pos Koramil 0818/36 ', 'Pagelaran', 'default.jpg', '2022-06-03 19:31:42', '0000-00-00 00:00:00'),
(47, 2, 11, 22, 'Koramil 0813-01', 'Bojonegoro', 'default.jpg', '2022-06-03 19:34:49', '0000-00-00 00:00:00'),
(48, 2, 11, 22, 'Koramil 0813-02', 'Kapas', 'default.jpg', '2022-06-03 19:35:01', '0000-00-00 00:00:00'),
(49, 2, 11, 22, 'Koramil 0813-03', 'Balen', 'default.jpg', '2022-06-03 19:35:11', '0000-00-00 00:00:00'),
(50, 2, 11, 22, 'Koramil 0813-04', 'Sugihwaras', 'default.jpg', '2022-06-03 19:35:21', '0000-00-00 00:00:00'),
(51, 2, 11, 22, 'Koramil 0813-05', 'Dander', 'default.jpg', '2022-06-03 19:35:32', '0000-00-00 00:00:00'),
(52, 2, 11, 22, 'Koramil 0813-06', 'Baureno', 'default.jpg', '2022-06-03 19:35:44', '0000-00-00 00:00:00'),
(53, 2, 11, 22, 'Koramil 0813-07', 'Kepohbaru', 'default.jpg', '2022-06-03 19:35:54', '0000-00-00 00:00:00'),
(54, 2, 11, 22, 'Koramil 0813-08', 'Kedungadem', 'default.jpg', '2022-06-03 19:36:05', '0000-00-00 00:00:00'),
(55, 2, 11, 22, 'Koramil 0813-09', 'Sumberejo', 'default.jpg', '2022-06-03 19:36:15', '0000-00-00 00:00:00'),
(56, 2, 11, 22, 'Koramil 0813-10', 'Kanor', 'default.jpg', '2022-06-03 19:36:27', '0000-00-00 00:00:00'),
(57, 2, 11, 22, 'Koramil 0813-11', 'Padangan', 'default.jpg', '2022-06-03 19:36:36', '0000-00-00 00:00:00'),
(58, 2, 11, 22, 'Koramil 0813-12', 'Kasiman', 'default.jpg', '2022-06-03 19:36:46', '0000-00-00 00:00:00'),
(59, 2, 11, 22, 'Koramil 0813-13', 'Purwosari', 'default.jpg', '2022-06-03 19:36:55', '0000-00-00 00:00:00'),
(60, 2, 11, 22, 'Koramil 0813-14', 'Tambakrejo', 'default.jpg', '2022-06-03 19:37:04', '0000-00-00 00:00:00'),
(61, 2, 11, 22, 'Koramil 0813-15', 'Ngraho', 'default.jpg', '2022-06-03 19:37:14', '0000-00-00 00:00:00'),
(62, 2, 11, 22, 'Koramil 0813-16', 'Ngambon', 'default.jpg', '2022-06-03 19:37:23', '0000-00-00 00:00:00'),
(63, 2, 11, 22, 'Koramil 0813-17', 'Kalitidu', 'default.jpg', '2022-06-03 19:37:32', '0000-00-00 00:00:00'),
(64, 2, 11, 22, 'Koramil 0813-18', 'Ngasem', 'default.jpg', '2022-06-03 19:37:41', '0000-00-00 00:00:00'),
(65, 2, 11, 22, 'Koramil 0813-19', 'Bubulan', 'default.jpg', '2022-06-03 19:37:49', '0000-00-00 00:00:00'),
(66, 2, 11, 22, 'Koramil 0813-20', 'Malo', 'default.jpg', '2022-06-03 19:37:57', '0000-00-00 00:00:00'),
(67, 2, 11, 22, 'Koramil 0813-21', 'Sukosewu', 'default.jpg', '2022-06-03 19:38:06', '0000-00-00 00:00:00'),
(68, 2, 11, 22, 'Koramil 0813-22', 'Trucuk', 'default.jpg', '2022-06-03 19:38:16', '0000-00-00 00:00:00'),
(69, 2, 11, 22, 'Koramil 0813-23', 'Temayang', 'default.jpg', '2022-06-03 19:38:24', '0000-00-00 00:00:00'),
(70, 2, 11, 22, 'Koramil 0813-24', 'Kedewan', 'default.jpg', '2022-06-03 19:38:33', '0000-00-00 00:00:00'),
(71, 2, 11, 22, 'Pos Ramil 0813-15', 'Margomulyo', 'default.jpg', '2022-06-03 19:38:42', '0000-00-00 00:00:00'),
(72, 2, 11, 22, 'Pos Ramil 0813-16', 'Sekar', 'default.jpg', '2022-06-03 19:38:51', '0000-00-00 00:00:00'),
(73, 2, 11, 22, 'Pos Ramil 0813-18', 'Gayam', 'default.jpg', '2022-06-03 19:39:04', '0000-00-00 00:00:00'),
(74, 2, 11, 22, 'Pos Ramil 0813-19', 'Gondang', 'default.jpg', '2022-06-03 19:39:14', '0000-00-00 00:00:00'),
(75, 4, 16, 36, 'Koramil 01', 'Kota Cilacap', 'default.jpg', '2022-06-03 19:41:14', '0000-00-00 00:00:00'),
(76, 4, 16, 36, 'Koramil 02', 'Jeruklegi', 'default.jpg', '2022-06-03 19:41:27', '0000-00-00 00:00:00'),
(77, 4, 16, 36, 'Koramil 03', 'Kroya', 'default.jpg', '2022-06-03 19:41:39', '0000-00-00 00:00:00'),
(78, 4, 16, 36, 'Koramil 04', 'Binangun', 'default.jpg', '2022-06-03 19:41:51', '0000-00-00 00:00:00'),
(79, 4, 16, 36, 'Koramil 05', 'Nusawungu', 'default.jpg', '2022-06-03 19:42:03', '0000-00-00 00:00:00'),
(80, 4, 18, 62, 'Koramil 01', 'Kota Kudus', 'default.jpg', '2022-06-03 19:42:41', '0000-00-00 00:00:00'),
(81, 4, 18, 62, 'Koramil 02', 'Jati', 'default.jpg', '2022-06-03 19:42:56', '0000-00-00 00:00:00'),
(82, 4, 18, 62, 'Koramil 03', 'Undaan', 'default.jpg', '2022-06-03 19:43:08', '0000-00-00 00:00:00'),
(83, 4, 18, 62, 'Koramil 04', 'Jekulo', 'default.jpg', '2022-06-03 19:43:19', '0000-00-00 00:00:00'),
(84, 4, 18, 62, 'Koramil 05', 'Mejobo', 'default.jpg', '2022-06-03 19:43:30', '0000-00-00 00:00:00'),
(85, 5, 20, 73, 'Koramil 0701', 'Sukaraja', 'default.jpg', '2022-06-03 19:56:32', '0000-00-00 00:00:00'),
(86, 5, 20, 73, 'Koramil 0702', 'Citamiang', 'default.jpg', '2022-06-03 19:56:42', '0000-00-00 00:00:00'),
(87, 5, 20, 73, 'Koramil 0703', 'Baros', 'default.jpg', '2022-06-03 19:56:51', '0000-00-00 00:00:00'),
(88, 5, 20, 73, 'Koramil 0704', 'Cikole', 'default.jpg', '2022-06-03 19:57:00', '0000-00-00 00:00:00'),
(89, 5, 20, 73, 'Koramil 0705', 'Kec. Sukabumi', 'default.jpg', '2022-06-03 19:57:10', '0000-00-00 00:00:00'),
(90, 5, 20, 73, 'Koramil 0706', 'Gunungpuyuh', 'default.jpg', '2022-06-03 19:57:20', '0000-00-00 00:00:00'),
(91, 5, 20, 74, 'Koramil 0608-01/Kota', 'Kecamata Cianjur Kecamatan Cilaku', 'default.jpg', '2022-06-03 19:58:12', '0000-00-00 00:00:00'),
(92, 5, 20, 74, 'Koramil 0608-05', 'Cugenang', 'default.jpg', '2022-06-03 19:58:24', '0000-00-00 00:00:00'),
(93, 5, 20, 74, 'Koramil 0608-06', 'Kr. Tengah', 'default.jpg', '2022-06-03 19:58:34', '0000-00-00 00:00:00'),
(94, 5, 20, 75, 'Koramil 2102', 'Cibinong', 'default.jpg', '2022-06-03 19:58:59', '0000-00-00 00:00:00'),
(95, 5, 20, 75, 'Koramil 2105', 'Gunung Putri', 'default.jpg', '2022-06-03 19:59:10', '0000-00-00 00:00:00'),
(96, 5, 21, 77, 'Koramil 0910', 'Cisarua', 'default.jpg', '2022-06-03 19:59:49', '0000-00-00 00:00:00'),
(97, 5, 21, 77, 'Koramil 0906', 'Cipeundeuy', 'default.jpg', '2022-06-03 19:59:59', '0000-00-00 00:00:00'),
(98, 5, 21, 77, 'Koramil 0908', 'Cimahi Tengah', 'default.jpg', '2022-06-03 20:00:07', '0000-00-00 00:00:00'),
(99, 5, 21, 80, 'Koramil 1203', 'Kawalu', 'default.jpg', '2022-06-03 20:00:18', '0000-00-00 00:00:00'),
(100, 5, 21, 80, 'Koramil 1201', 'Kota Tasikmalaya', 'default.jpg', '2022-06-03 20:00:32', '0000-00-00 00:00:00'),
(101, 5, 21, 80, 'Koramil 1217', 'Bantarkalong', 'default.jpg', '2022-06-03 20:00:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_instansi_korem`
--

CREATE TABLE `tbl_data_instansi_korem` (
  `id` int(11) NOT NULL,
  `id_kodam` int(11) NOT NULL,
  `nama_korem` varchar(100) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_instansi_korem`
--

INSERT INTO `tbl_data_instansi_korem` (`id`, `id_kodam`, `nama_korem`, `wilayah`, `foto`, `created_on`, `update_at`) VALUES
(11, 2, 'Korem 082/Citra Panca Yudha Jaya (CPYJ) - Mojokerto', 'Kediri, Tuban, Lamongan, Bojonegoro, Jombang, Mojokerto', 'PHOTO_KOREM-1654175074.png', '2022-06-02 16:10:04', '2022-06-02 20:04:34'),
(12, 2, 'Korem 081/Dhirotsaha Jaya (DSJ) - Madiun', 'Madiun, Ngawi, Magetan, Ponorogo, Pacitan, Trenggalek, Nganjuk, Blitar, Tulungagung, Blitar, Nganjuk, Yonif 511/Dibyatara Yudha', 'PHOTO_KOREM-1654174942.png', '2022-06-02 16:10:33', '2022-06-02 20:17:37'),
(13, 6, 'Korem 092/Maharajalila', 'Tanjung Selor, Tarakan, Malinau, Nunukan, Tana Tidung', 'PHOTO_KOREM-1654174816.png', '2022-06-02 20:00:16', '0000-00-00 00:00:00'),
(14, 2, 'Korem 083/Baladhika Jaya (BDJ) - Kota Malang', 'Malang-Batu, Pasuruan, Probolinggo, Lumajang, Bondowoso, Situbondo, Jember, Banyuwangi, Kota Malang, Yonif 527/Baladibya Yudha', 'PHOTO_KOREM-1654175231.jpg', '2022-06-02 20:07:11', '2022-06-02 20:18:00'),
(15, 2, 'Korem 084/Bhaskara Jaya (BJ) - Surabaya', 'Sidoarjo, Gresik, Pamekasan, Sumenep, Sampang, Bangkalan, Surabaya Utara, Surabaya Timur, Surabaya Selatan', 'PHOTO_KOREM-1654175326.png', '2022-06-02 20:08:46', '2022-06-02 20:18:13'),
(16, 4, 'Korem 071/Wijayakusuma (WK) - Purwokerto', 'Banyumas, Purbalingga, Cilacap, Banjarnegara, Pekalongan, Pemalang, Tegal, Brebes, Batang', 'PHOTO_KOREM-1654175469.png', '2022-06-02 20:11:10', '0000-00-00 00:00:00'),
(17, 4, 'Korem 072/Pamungkas (PMK) - kota Yogyakarta', 'Magelang, Temanggung, Wonosobo, Purworejo, Kebumen, Bantul, Gunung Kidul, Kulon Progo, Sleman Yogyakarta, Yonif Mekanis 403/Wirasada Pratista', 'PHOTO_KOREM-1654175562.png', '2022-06-02 20:12:42', '2022-06-02 20:15:45'),
(18, 4, 'Korem 073/Makutarama (MK) - Salatiga', 'Salatiga, Kendal, Demak, Grobogan, Pati, jepara Rembang, Blora, Kudus, Yonif 410/Alugora', 'PHOTO_KOREM-1654175633.png', '2022-06-02 20:13:53', '2022-06-02 20:15:02'),
(19, 4, 'Korem 074/Warastratama (WRT) - Surakarta', 'Klaten, Boyolali Sragen, Sukoharjo, Karanganyar, Wonogiri, Surakarta, Yonif Raider 408/Suhbrasta', 'PHOTO_KOREM-1654175803.png', '2022-06-02 20:14:49', '2022-06-02 20:16:43'),
(20, 5, 'Korem 061/Surya Kencana (SK) - Kota Bogor ', 'Kota Bogor, Sukabumi, Cianjur, Kabupaten Bogor, Kabupaten Sukabumi', 'PHOTO_KOREM-1654260374.png', '2022-06-03 19:46:07', '2022-06-03 19:46:14'),
(21, 5, 'Korem 062/Tarumanagara -  Garut', 'Cimahi, Sumedang, Garut, Tasikmalaya, Ciamis Kabupaten Bandung, Pangandaran', 'PHOTO_KOREM-1654260642.png', '2022-06-03 19:48:27', '2022-06-03 19:50:42'),
(22, 5, 'Korem 063/Sunan Gunung Jati - Cirebon Kota', 'Makorem 063/Sunan Gunung Jati dan Tim Intel, Karawang Subang, Kota Cirebon Kuningan, Indramayu, Majalengka Purwakarta Kabupaten Cirebon Batalyon Arhanudse 14 BKO Korem 063/SGJ', 'PHOTO_KOREM-1654260725.png', '2022-06-03 19:51:55', '2022-06-03 19:52:05'),
(23, 5, 'Korem 064/Maulana (MY) - Serang', 'Pandeglang, Serang, Lebak Cilegon, Badak Putih', 'PHOTO_KOREM-1654260870.png', '2022-06-03 19:54:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_suku`
--

CREATE TABLE `tbl_data_suku` (
  `id_suku` int(11) NOT NULL,
  `nama_suku` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_suku`
--

INSERT INTO `tbl_data_suku` (`id_suku`, `nama_suku`, `created_on`, `update_at`) VALUES
(1, 'Jawa', '2022-05-29 20:15:20', '2022-05-29 20:20:03'),
(2, 'Dayak', '2022-05-29 20:15:26', '2022-05-29 20:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_wilayah`
--

CREATE TABLE `tbl_data_wilayah` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kodepos` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_wilayah`
--

INSERT INTO `tbl_data_wilayah` (`id`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`) VALUES
(1, 'CANDIRENGGO', 'SINGOSARI', 'KAB. MALANG', 'JAWA TIMUR', '65153'),
(2, 'TURIREJO', 'LAWANG', 'KAB. MALANG', 'JAWA TIMUR', '65211');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `email_pswd` varchar(255) NOT NULL,
  `email_protocol` varchar(255) NOT NULL,
  `email_host` varchar(255) NOT NULL,
  `email_port` varchar(255) NOT NULL,
  `email_type` varchar(255) NOT NULL,
  `email_charset` varchar(255) NOT NULL,
  `email_verifikasi` int(1) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `update_at` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_website`, `deskripsi`, `email`, `email_pswd`, `email_protocol`, `email_host`, `email_port`, `email_type`, `email_charset`, `email_verifikasi`, `phone`, `logo`, `update_at`) VALUES
(1010, 'SIPA TNI AD', 'SISTEM INFORMASI PENERIMAAN ANGGOTA TNI AD', 'kosong@gmail.com', 'kosong', 'smtp', 'ssl://smtp.googlemail.com', '465', 'html', 'utf-8', 1, '0895367081854', 'PHOTO_WEBSITE-1653660298.png', '2022-07-17 09:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_rekrutment`
--
ALTER TABLE `data_rekrutment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekrutment_jadwal`
--
ALTER TABLE `data_rekrutment_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekrutment_lokasi`
--
ALTER TABLE `data_rekrutment_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekrutment_materi`
--
ALTER TABLE `data_rekrutment_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekrutment_panduan`
--
ALTER TABLE `data_rekrutment_panduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekrutment_pengumuman`
--
ALTER TABLE `data_rekrutment_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekrutment_persyaratan`
--
ALTER TABLE `data_rekrutment_persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_admin_token`
--
ALTER TABLE `tbl_admin_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_agama`
--
ALTER TABLE `tbl_data_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_data_instansi_kodam`
--
ALTER TABLE `tbl_data_instansi_kodam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_instansi_kodim`
--
ALTER TABLE `tbl_data_instansi_kodim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_instansi_koramil`
--
ALTER TABLE `tbl_data_instansi_koramil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_instansi_korem`
--
ALTER TABLE `tbl_data_instansi_korem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_suku`
--
ALTER TABLE `tbl_data_suku`
  ADD PRIMARY KEY (`id_suku`);

--
-- Indexes for table `tbl_data_wilayah`
--
ALTER TABLE `tbl_data_wilayah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ixkodepos` (`kodepos`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_rekrutment_jadwal`
--
ALTER TABLE `data_rekrutment_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_rekrutment_lokasi`
--
ALTER TABLE `data_rekrutment_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_rekrutment_materi`
--
ALTER TABLE `data_rekrutment_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_rekrutment_panduan`
--
ALTER TABLE `data_rekrutment_panduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_rekrutment_pengumuman`
--
ALTER TABLE `data_rekrutment_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_rekrutment_persyaratan`
--
ALTER TABLE `data_rekrutment_persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin_token`
--
ALTER TABLE `tbl_admin_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_data_agama`
--
ALTER TABLE `tbl_data_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_data_instansi_kodam`
--
ALTER TABLE `tbl_data_instansi_kodam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_data_instansi_kodim`
--
ALTER TABLE `tbl_data_instansi_kodim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_data_instansi_koramil`
--
ALTER TABLE `tbl_data_instansi_koramil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_data_instansi_korem`
--
ALTER TABLE `tbl_data_instansi_korem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_data_suku`
--
ALTER TABLE `tbl_data_suku`
  MODIFY `id_suku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_data_wilayah`
--
ALTER TABLE `tbl_data_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
