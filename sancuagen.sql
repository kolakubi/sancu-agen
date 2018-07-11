-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 05:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sancuagen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nik`, `nama`, `alamat`, `kota`, `telepon`, `kelamin`, `email`) VALUES
('admin001', 'Nurul ', 'jalan asmin 1 gang sabar RT 03/ RW 26 susukan ciracas jakarta timur', 'Jakarta Timur', '085715050949', 'perempuan', 'nurulsancu@yahoo.com'),
('admin002', 'Nisa', 'Jalan Ceger', 'Jakarta Timur', '08561000000', 'Perempuan', 'nisa@sancu.com'),
('admin003', 'Erna', 'Jalan Cibubur', 'Jakarta', '089676069067', 'Perempuan', ''),
('firman', 'Firmansyah', 'Jalan Persahabatan', 'DKI Jakarta', '082122694604', 'Laki-laki', 'info.sancuindonesia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `kode_agen` varchar(10) NOT NULL,
  `tgl_gabung` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `fotoprofil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`kode_agen`, `tgl_gabung`, `nama`, `alamat`, `kota`, `telepon`, `email`, `kelamin`, `fotoprofil`) VALUES
('agen001', 'Nop 2011', ' A halim falatehan ', ' Jl. Perjuangan pdk No. A34a Kota Cirebon, Prov. Jawa Barat ', 'Cirebon', ' 0231482189 / 08121437550 ', ' ahalimfalatehan@yahoo.com ', 'laki-laki', ''),
('agen002', 'Nop 2017', 'Aan', 'JL.SARI GADING DARAT NO 41 (belakang Pondok Pesantren AL MARHAMAH Jl.Tjilik Riwut ) Baamang Tengah', 'Sampit', '085821333234', 'ekantvalent@gmail.com / sancusampit@gmail.com', 'laki-laki', ''),
('agen003', 'Jan 2012', ' Abin / Tary ', ' Jl. cipinang pulo Rt.013/012 NO. 24 Kel. Cipinang Besar Utara Kec. Jatinegara Jakarta Timur 13410 ', 'Jaktim', ' 02194246724 / 02189646719 / 085219441217 ', ' tary_minie@yahoo.co.id ', 'laki-laki', ''),
('agen004', 'Nop 2011', ' Agung Winoto ', ' Gamping kidul rt 02/ 19 ambarketawang gamping sleman yogyakarta 55294 ', 'Yogyakarta', ' 087738052331 ', ' deezey503@yahoo.com / gungs21@yahoo.co.id ', 'laki-laki', ''),
('agen005', 'Mei 2014', 'Ahmad Rostani', 'Jl.Letu suyitno GG. Sumiran 2 RT 020 rw 003 Desa Banjarejo Kec. Bojonegoro - Bojonegoro', 'Bojonegoro', '0878-5871-7172', 'ahmadrostani@yahoo.co.id / ahmadrostani@yahoo.com', 'laki-laki', ''),
('agen006', '', 'Aini Pesawaran', 'Jl. Imam Bonjol Gg. Waluh No. 17 Kemiling - Bandar Lampung', 'Pesawaran', '081369476416', 'nekomataaini@yahoo.com', 'perempuan', ''),
('agen007', 'Des 2013', 'Akbar / irvan', 'Jl. Danau sentarum. Komplek Sentarum Permai Blok G No 7 Kalimantan Barat Kec : Pontianak Kota', 'Pontianak', '0852-5224-2634 / 0896-9353-9870', 'sancu1pontianak@gmail.com / heru_pandan@yahoo.com', 'laki-laki', ''),
('agen008', 'Juni 2011', ' Aman ', ' Jl. Bunut Rt. 004/04 No. 2 Pondok Rangon Cipayung Jak-Tim  ', 'Jaktim', ' 08567518721 ', ' aman_bener@yahoo.co.id / ich_rianti@yahoo.co.id ', 'laki-laki', ''),
('agen009', 'Nov 2016', ' Andry Haryandi Kohar ', ' Jl. Raya Pemda Kab. Tangerang Kp. Jalupat RT 002/006 Desa Matagara, Kec. Tigaraksa. Kab Tangerang ( Samping RS Harapan Mulia - Tigaraksa) ', 'Tangerang', ' 089613319711 ', ' andryharyandi@gmail.com ', 'laki-laki', ''),
('agen010', 'des 2014', ' Arifin ', ' Villa mutiara bogor blok G 12 No. 6 Kel. Mekar wangi Kec. Tanah Sereal Kota Bogor  ', 'Bogor', ' 085885584459 / 081513143439 ', ' are.fans@gmail.com ', 'laki-laki', ''),
('agen011', 'Juni 2015', 'Arum', 'Jl. Pinus No 21 Dusun Silva Lambaroeh Ulee Pata Kec. Jaya Baru - Banda Aceh', 'Banda Aceh', '081361463163', 'astya_arum@yahoo.com', 'perempuan', ''),
('agen012', 'Jan 2013', 'Aslam Mahmudi', ' bumiroso RT. 07 RW. 04 Desa Bumiroso Kec: Watumalang Kab. Wonosobo Prov. Jawa Tengah 56352 ', 'Wonosobo', ' \'081327017145 ', ' alamz77@ymail.com ', 'laki-laki', ''),
('agen013', 'Mei 2014', 'Asri Muntafiah', 'Jl. Taman Siswa Km. 1 Tahunan RT 03/03 Jepara ---> Alamat Toko', 'Jepara', '082323568042', ' wildanistonline@gmail.com ', 'perempuan', ''),
('agen014', '', 'Ayunda', 'klinik basmallah jl T iskandar no 3 gampong meunasah manyang kec barona jaya kab aceh besar', 'Aceh', '085773891043-081321357762', 'ayunda_qu@yahoo.com', 'perempuan', ''),
('agen015', 'Juni 2012', ' Beny / Hamroh ', ' Jl. Margodadi  II / 63A Gundih Kec. Bubutan - Surabaya ', 'Surabaya', ' 0856-0627-2040 ', 'hamz.file@gmail.com / beny@sancu-lucu.com / iben@ibenstore.com', 'laki-laki', ''),
('agen016', 'Mei 2013', ' Chaerul Saleh ', ' Jl perjuangan no 14 kel tanjung rejo kec medan sunggal, kota medan kode pos 20122. sumatera ', 'Rejo', ' 082364929795 ', ' csbisnis2009@gmail.com ', 'laki-laki', ''),
('agen017', 'Nov 2011', ' Dede Soleman ', ' Jl abu chaer no 89 rt 02/ 03 desa kudumulya kec babakan Cirebon ', 'Cirebon', ' 08122432568 ', ' de2avfa@gmail.com ', 'laki-laki', ''),
('agen018', 'Juli 2011', ' Dedi Irianto ', ' Jl. Re Martadinata Gang Panti Asuhan  Rt 05/04 No. 45 Kec. Ciputat Tanggerang 15411 ', 'Ciputat', ' 08567656469 ', ' dediirianto@rocketmail.com ', 'laki-laki', ''),
('agen019', 'Des 2017', 'Dilli Juang Nugroho', 'krandegan rt 4 rw 9 kec. Banjarnegara kab. Banjarnegara', 'Banjarnegara', '082324774844', ' dily14juang@gmail.com ', 'laki-laki', ''),
('agen020', 'Jan 2018', ' Edy ', ' Perum Sari Indah Permai. Blok G 5 Dsn. Cempokosari RT 02 RW 04 Ds. Sarimulyo Kec. Cluring Kab. Banyuwangi (Alamat Keagenan) ', 'Banyuwangi', ' 081231130037 ', ' esoepraptoe@ymail.com ', 'laki-laki', ''),
('agen021', 'Jan 2013', 'Eko', ' Jl. Pahlawan 6 Kp. Baru No. 40 RT 04 RW 07 Kel. Sukabumi Selatan Kec. Kebon Jeruk - JAKARTA BARAT ', 'Jakbar', ' 085770503309 ', ' sancukebonjeruk@yahoo.com /\nsyakiranadhir@yahoo.com / arka7@yahoo.com ', 'laki-laki', ''),
('agen022', 'Jun 2013', ' Eko ', 'perum, gadang mandiri b-8  JL. Lowokdoro gang 2 malang kecamatan sukun, kota malang jawa timur', 'Malang', '081233400578', ' eym_jr@yahoo.com ', 'laki-laki', ''),
('agen023', 'Feb 2010', ' Elang pulogadung ', ' Jl. Raya Bekasi Gang Remaja 3 RT.07/07 No.20 Pulo Gadung ', 'Jaktim', ' 08999158986 / \'08989135346 / \'081316644315 ', ' elangyudantoro@yahoo.com / tanyaelang@gmail.com ', 'laki-laki', ''),
('agen024', 'Nov 2014', 'Elsi Heviana', 'Jl Ata Jorong Pincuran Baruah Nagari Saok Laweh Kec. Kubung Kab. Solok Sumbar 27361', 'Solok', '085274069162', 'yumikailmohsen@gmail.com', 'perempuan', ''),
('agen025', 'Jan 2018', ' Fara ', ' Taman kopo indah 2 blok a4 no 49b Bandung ', 'Bandung', ' 0896-5526-9747 / 08986991282 ', ' Faramaya72@gmail.com ', 'perempuan', ''),
('agen026', 'Juni 2014', 'Farchan', 'Jl. Sunan Kudus No. 235, Kudus, Prov. Jawa Tengah. (Almt Baru)', 'Kudus', '085640210888 / 085640019556', ' farchanjayadi@yahoo.com ', 'laki-laki', ''),
('agen027', 'Nov 2017', 'Hadi yuswono', 'Jln. Basuki Rahmat RT 1 RW 23 no.266 tegalbesar Kaliwates Jember - Jawa Timur (Depan Bengkel AHASS)', 'Jember', '085204220559', 'hadyyuswono@gmail.com', 'laki-laki', ''),
('agen028', 'Sep 2011', ' Hotimah ', ' TALAGA BESTARI  Kp. Sumur Rt. 004/005 No. 24 Desa Wanakerta Kec. Sindang Jaya Tanggerang 15831 ', 'Jakut', ' 02191460558 / 083872216658 ', ' ntiems_neeh@yahoo.co.id ', 'perempuan', ''),
('agen029', 'Nov 2013', ' Ikhsan ', ' Jl.Raya PKP (gg.PERSAHABATAN 1 ) Kelapa Dua Wetan, Ciracas, Jak-Tim.', 'Jaktim', '085780777353 / \'0812-9392-5404', ' ikhsan_muhamad70@yahoo.com ', 'laki-laki', ''),
('agen030', 'Sep 2011', ' Illa ', ' Jl. Perum Nirwana Graha Blok G No. 21 RT. 05 RW. 07 Salaerih, Warudoyong, Sukabumi, Jawa Tengah. (Alamat Baru) ', 'Sukabumi', ' 085885595165 / 081290247919 ', ' kurniawati.illa@yahoo.co.id ', 'perempuan', ''),
('agen031', 'Feb 2011', ' Imam ', ' Perum Wahana Blok A14 No. 20 Rt. 007 / 009 Sukadami Cikarang Selatan Bekasi 17550 ', 'Cikarang', ' 081280919644 / 081287809328 ', ' imamkhomsah@yahoo.co.id ', 'laki-laki', ''),
('agen032', 'Sep 2011', ' Intan ', ' Perum bumi damai blok A no 3 kec taluh kab cirebon ', 'Cirebon', ' 085224222210 / 082115931113 / 081313004242 ', ' ahalimfalatehan@yahoo.com / intengilang@ymail.com ', 'perempuan', ''),
('agen033', 'Apr 2010', ' Iskandar ', ' Jl Veteran no 94 rt 2/ 10 pelutan pemalang ', 'Pemalang', ' 085727230310 / 085727128886 / 088215102808 / 082169320000 ', ' kantuik1980@yahoo.co.id ', 'laki-laki', ''),
('agen034', 'Des 2017', 'Isnawan', 'Dusun 3 rt.12 rw.06 sumber baru seputih banyak lampung tengah.', 'Lampung', '081368785868', 'Suburmakmur795@gmail.com', 'laki-laki', ''),
('agen035', 'Apr 2011', ' Iwan Fakhrudin ', ' Perum . Abdi Negara jalan Kresna 3 No. 2 Bojanegara Rt. 06 Rw. 04 Padamara Purbalingga Jawa- Tengah ', 'Purbalingga', ' 081390043310 ', ' my_fakhruddin@yahoo.com ', 'laki-laki', ''),
('agen036', 'Mar 2012', ' Junaedi ', ' Jl. Jawa No. 39 Kel. Gubeng Kec. Gubeng - Surabaya ', 'Surabaya', ' 081231155719  ', ' mochamadadnan82@gmail.com ', 'laki-laki', ''),
('agen037', 'Jan 2014', ' Luki ', ' jl masjid no 2 pekan selesai, kecamatan selesai kabupaten langkat,, sumatera utara ', 'Langkat', ' \'089692454456 ', ' tiaraputri250@yahoo.com ', 'laki-laki', ''),
('agen038', 'Jan 2013', 'Lutfi Hakiki', 'Jl. Komplek Chandra Utama, No. 26, Kel. Guntung Manggis, Kota Banjarbaru, Kalimantan Selatan (Alamat Toko)', 'Tapin', '085251095452', 'luthfi_hakiki@ymail.com', 'laki-laki', ''),
('agen039', 'Jan 2010', ' M suwandi ', ' Taman banjar agung indah blok C5 no 4 ( samping play group azkia ) pakupatan kec cipocok jaya rt 001/ 009 serang 42122 ', 'Serang', ' 081388063155 / 081219161416 / 087788220324 ', ' siaa1124@yahoo.com / suwandi@adis.co.id / nisrina_kaysa@yahoo.com ', 'laki-laki', ''),
('agen040', 'Jan 2012', ' M syukur ', ' Villa mutiara jaya Blok M 8 no 13 rt 02/ 07 Desa wanajaya Cibitung ', 'Bekasi', ' 081318127849 ', ' mohamad.syukur@rocketmail.com ', 'laki-laki', ''),
('agen041', 'Mei 2016', 'M. Ahmad', 'ngebrak genting rt 02 rw 01 tunggul paciran lamongan', 'Lamongan', '085733565282', 'ahmadpud@yahoo.co.id', 'laki-laki', ''),
('agen042', 'Des 2017', 'Masyita', ' JL. IR SOETAMI RT 15 RW 05 KEL.RABADOMPU TIMUR - KOTA BIMA - NTB', 'NTB', '081239492004', 'papilioglumei@gmail.com', 'perempuan', ''),
('agen043', 'Des 2015', 'Meri', 'jl. Belimbing perum balinda blok b no 1 rt 3/ rw 6 kel. libuo, kec. Dungingi, kota gorontalo', 'Gorontalo', '085240038393', ' odinglove.meri@gmail.com ', 'perempuan', ''),
('agen044', 'Okt 2014', 'Muhtadi', ' Jl. Semanan Raya Kap Cipondo Rt. 03/08 No. 86 Kel. Semanan Kec. Kalideres Jakarta Barat (Alamat Lama) ', 'Jakbar', ' \'085711884571 ', ' zakiynuri@gmail.com ', 'laki-laki', ''),
('agen045', 'Jul 2013', 'Mutiara', 'Jl. Gatot Subroto I Perum Damai Putra Gg. Kayun Ayu No. 8 Br. Tegeh Sari Denpasar Bali 80231 Indonesia (Almat Baru)', 'Denpasar', '081999152700 / 081803664622', 'abraham_marbun23@yahoo.com / mutiara_yakin@yahoo.com', 'perempuan', ''),
('agen046', 'Nov 2011', ' Nada ', ' Dusun mekarsari jl sirna raga desa kalijati timur kec kalijati subang ', 'Subang', ' 0899-1787-875 / 0897-7059-605 / 085223222812 ', 'sururi_86@yahoo.co.id', 'laki-laki', ''),
('agen047', 'Okt 2013', 'Nadzir', 'Dukuh bendungan podoluhur Rt 01/05, klirong kebumen kabupaten kebumen', 'Kebumen', '087715039211', ' nadzir.akhmad@yahoo.com ', 'laki-laki', ''),
('agen048', 'Des 2017', 'Naskar', 'jl. Jembatan bongkok, rt 21 no. 123\nKel. Karang Anyar Pantai\nKec. Tarakan Barat\nTarakan, Kalimantan Utara. k. pos 77117', 'Tarakan', '0812-5881-151', 'naskaruda@gmail.com', 'laki-laki', ''),
('agen049', 'Jul 2014', ' Neneng ', 'pajeleren jln cempaka no 47 rt 3 rw 8 sukahati cibinong 16913', 'Cibinong', ' 0877-8260-7444 / 08129716566 / 085782460245 ', ' nenengyanihb@yahoo.co.id ', 'perempuan', ''),
('agen050', 'Feb 2011', ' Neng Putri ', ' Kp. Pabuaran Rt. 03/ 01 Desa Cibolang Kec. Gunungguruh Kab. Sukabumi 43152 ', 'Sukabumi', '085863381008', ' hayatidewi@rocketmail.com ', 'perempuan', ''),
('agen051', 'Jan 2010', ' Oman ', ' BSD Komplek Batan Indah Blok H No. 37 Kel. Kademangan Kec. Setu Tangerang ', 'Tangerang', ' 0813 88723877 / 085888402018 ', ' kmz_albantani@yahoo.co.id ', 'perempuan', ''),
('agen052', 'Jan 2012', ' Parno ', ' Perumnas KCVRI No.13 RT04/RW01 Dsn Mulyoasri Desa Bogokidul Kecamatan Plemahan Kabupaten Kediri 64155 ', 'Kediri', ' 085714688681 / 081288993354 / 0354-528600 ', ' p4rn6@yahoo.com.sg ', 'laki-laki', ''),
('agen053', 'Sep 2011', ' Pujiono ', ' Jl. Moh Khafi 2 Gg. Damai  Rt. 08/08 No. 62 Srengseng Sawah Jagakarsa (samping pom bensin) ', 'Jaksel', ' 081319399667 / 087775550667 / 0878-8243-8711 . 083892350404', 'pujiono_007@yahoo.com / pujionowng@gmail.com', 'laki-laki', ''),
('agen054', 'Jan 2011', ' Purwati ', ' Jl. Arus Rt 008/01 No. 99 Cawang Kramat Jati Jakarta Timur 13630 ', 'Jaktim', ' 085216083115 ', ' purwati23@gmail.com ', 'perempuan', ''),
('agen055', 'Nov 2017', 'Putu Badung', 'Perumahan bayangkara IV,blok C,no.43,br.pasek desa jagapati,abiansemal badung bali', 'Bali', '0857-3829-5252', 'putu_kannop@yahoo.com', 'laki-laki', ''),
('agen056', 'Jan 2018', 'Ragil', 'Jln pahlawan rt 4 rw 5, dsn gelung barat, ds gelung, kec paron, kab ngawi', 'Ngawi', '0812-1680-4410', 'ragilwulan.rw@gmail.com', 'laki-laki', ''),
('agen057', 'Feb 2014', ' Ramli ', ' Jl. Baledesa Gg. Rusa No. 10 RT.01/07 Kel. GunungParang Kec. Cikole Kota Sukabumi Jawa Barat ', 'Sukabumi', ' 081213115335 / 089657506888 (WA) ', ' ramlisandiberata@hotmail.com ', 'laki-laki', ''),
('agen058', 'Okt 2011', ' Rifai ', ' Kp. Bojong RT 04 RW 07 No 21 Desa Puspanegara IV Kec. Citeureup Kab.Bogor (Alamat Baru) ', 'Bogor', ' 085694834369 ', ' rifai.maestro8@gmail.com ', 'laki-laki', ''),
('agen059', 'Sep 2015', 'Risda', '  jl.semagka no 63 perumnas BTN karang anyer 2 ,kec argamakmur, kb bengkulu utara.bengkulu ( karung tulis argamakmur )  \n', 'Bengkulu', '\'085274667640', 'risdafitriati@gmail.com', 'laki-laki', ''),
('agen060', 'Mei 2011', ' S.Wardono Pulo Gebang ', ' Jl. Raya Rawa Kuning Gg. Kemun Rt. 1/16 No. 38-33 B PuloGebang Cakung Jakarta Timur  ', 'Jaktim', ' 0857-1792-5462 / 0214804675 / 02194172636 ', ' sswardono@yahoo.com ', 'laki-laki', ''),
('agen061', 'Mei 2014', 'Sabilal Lubis', 'Jl. Pasar 5 Tembung - Medan (Disamping Gg. Berdikari) Toko SANCU', 'Medan', '08126333336', ' bilallubis@gmail.com ', 'perempuan', ''),
('agen062', 'Mar 2011', ' Septin ', ' Jl. Jend Sutoyo Gang I No. 09 Purwokerto RT. 02. RW. 08 Kel. Kedungwuluh, Kec Purwokerto Barat, Kab. Banyumas, Jawa Tengah. ', 'Purwokerto', ' 02819100556 / 081393014849 ', ' septinharyanto@gmail.com / PIN BB : 299612E9 ', 'laki-laki', ''),
('agen063', 'Mei 2014', 'Sinta', 'taman sari bukit mutiara (wika) cluster berau blok CB 8 No 10 Kel. Gunung Samarinda Kec. Balikpapan utara, kota balikpapan, kalimantan timur 77311', 'Balikpapan', '081253316666', '', 'perempuan', ''),
('agen064', 'Des 2010', ' Sudarmadi ', '  jl.alexindo - SBS / rawa bambu , kav. Pertokoan AZWAR no.54 D, kel.harapan jaya, bekasi utara ( samping JNE )  ', 'Bekasi', ' 085780282333 ', ' sudarmadi141072@yahoo.com ', 'laki-laki', ''),
('agen065', 'Nop 2011', 'Sumiati', 'Jl. Jend Sudirman Gg. Guru-guru Air Putih Baru - Curup - Bengkulu', 'Bengkulu', '085839054603 / 081539281256', 'sumiatiati43@yahoo.co.id', 'perempuan', ''),
('agen066', 'Jan 2018', 'Sunarko', 'RT 15 RW.04 GG masjid selatan Ds Plandi Kec.Jombang kab.Jombang Jatim', 'Jombang', '08123521063', 'sunakojombang63@gmail.com', 'laki-laki', ''),
('agen067', 'Ags 2012', ' Sunarni ', 'Jl. Dr. Sutomo, depan gedung PKK, Dukuhwringin RT.04 RW.03, Slawi, Kab .Tegal ( Alamat Rumah )', 'Tegal', '085226597481 / 08139200212 (suami)', 'nanik6668@gmail.com', 'perempuan', ''),
('agen068', 'Juli 2012', ' Supriyanti ', ' Kampung Rawa Rt.09 Rw.09 No.27 Kel.Grogol Utara Kec.Kebayoran Lama - Jakarta Selatan 12210 ---> pengiriman dicatat grogol utara ', 'Jaksel', ' 085218986985 / 08158745457 ', ' supriyantisandimin@yahoo.com ', 'perempuan', ''),
('agen069', 'Des 2010', ' Surahmat ', ' Desa Duren Rt.13/004 No.24 Kec Klari Kab Karawang 41371 (Belakang Tempat kursus English Confersecion Center (ECC) ', 'Karawang', ' 085716534598 / 081310985312 ', ' rahmat0181@yahoo.com ', 'laki-laki', ''),
('agen070', 'Des 2017', 'Syamsudin', 'Perum Griya KPN Blok i5 No. 33 Batam Center - Kota Batam, Prov. Kep Riau 29464', 'Batam', '0853-6588-1893', 'syamlinggabusiness@gmail.com', 'laki-laki', ''),
('agen071', 'Ags 2015', ' Syamsudin ', ' JL.BARUKANG UTARA LR. 7 NO. 98 KEC. UJUNG TANAH KEL. CAMBAYYA, MAKASSAR  ', 'Makassar', ' \'082187716218 ', ' capunk.lintut@gmail.com ', 'laki-laki', ''),
('agen072', 'Mei 2017', ' Uly yanah/ Eris ', 'Jln Pemuda / Kaligangsa Kulon Brebes RT 04 RW 05 No. 25 ', 'Brebes', '0817-428-924', ' erisbudiartoo@gmail.com ', 'perempuan', ''),
('agen073', 'Juli 2013', ' wanti ', ' Perum Pesona Griya Asri Blok G4 no 19 Rt 06/11 Purwakarta 41118 (alamat rumah) ', 'Purwakarta', ' \'081312224369, 087778786788, 085864442345 ', ' warsaya80@ymail.com ', 'perempuan', ''),
('agen074', 'Mar 2011', ' Watini ', ' Jl. Jembatan ll gg. Petasan No. 2 C Kel. Pejagalan Kec. Penjaringan Jakarta Utara 14450  ', 'Jaksel', '083807634414 / 085695015795 / 021-97854032', ' ca_lancar.palmerah@yahoo.com / agensandaltas@yahoo.co.id ', 'perempuan', ''),
('agen075', 'Des 2017', ' Wawan toko liwanda ', 'JL.WR.MONGINSIDI NO.113 , KELURAHAN: BATARAGURU. KECAMATAN : WOLIO KOTA BAUBAU PROVINSI: SULAWESI TENGGARA', 'Baubau', '0813 2241 7220', ' sancubaubau@gmail.com ', 'laki-laki', ''),
('agen076', 'Des 2017', ' Widodo ', ' Kedung Banteng RT 43, Banaran, Sb. Macan- Sragen, Jawa Tengah.?  ', 'Sragen', ' 085 786 019 749 / 0821-4380-2446 ', ' utama_cp@yahoo.com ', 'laki-laki', ''),
('agen077', 'Feb 2016', 'Winiarti / Sugiono', 'Pasar Pagi Melcem Blok A No.15 Batu Ampar - Batam', 'Sugiono', '081261105584 / \'0811776318', '', 'perempuan', ''),
('agen078', 'Des 2014', ' Yadi Suryadi ', 'Jl. raya selakopi no 8 rt 1/07 , desa lembur sawah , kec cicantayan, sukabumi . 43155 (Alamat Toko)', 'Sukabumi', ' \'0878-7727-7761 / 087720944105  ', 'yadisuryadi@gmail.com', '', ''),
('agen079', 'Mei 2013', ' Yano ', ' Jl. Perum Citra Srago Indah No. B4 RT. 05 RW.11, Gumulan , Klaten Tengah, Klaten, Jawa Tengah (Almt Baru) ', 'Klaten', ' 087834948328 / 081381562140 / 082136417178 ', ' yano1577@yahoo.com ', 'laki-laki', ''),
('agen080', 'Jan 2018', ' Yanti ', ' jalan Jawa no 2 ( wisma Danisky)  Pangkalan Brandan. Kab. Langkat Sumatera Utara.  Kode pos 20857 ', 'Langkat', ' 0852-7016-8090 ', ' yantiustam69@gmail.com ', 'perempuan', ''),
('agen081', 'Des 2011', ' Yedi Wijaya ', ' Jl. Iskandar Muda RT. 01 RW 01 No. 26 Kel. Kedaung Wetan, Kec. Neglasari, Tangerang.  (Alamat Baru) ', 'Tangerang', ' 085880111186 / 02199788319 ', ' wijaya.yedi@yahoo.co.id ', 'laki-laki', ''),
('agen082', 'Mei 2011', ' Yuli ', ' Adinusa rt 6/ 03 no 57 kec suban kab batang kel adinusa kota batang jawa tengah ', 'Batang', ' 082137009291 / 081931985515 ', ' yulitriviyanti@gmail.com /  soviansolikin@yahoo.co.id ', 'perempuan', ''),
('agen083', 'Juni 2015', 'Yuli', 'sawahan rt 06 rw 10 pancuran mas, secang, magelang (kavling dpn sd pancuran mas)', 'Secang', '\'087838286575', ' effnizuliastuti@gmail.com ', 'perempuan', ''),
('agen084', 'Mei 2010', ' Yuliati / Arum Drajat ', '  Jl. Gambir Anom Atas No.9 RT: 003/011 Sukaluyu Cibeunying Kaler Bandung 40123 ', 'Bandung', ' 0812 8032308 / 081310010056 (suami) ', ' mura_sheva@yahoo.com / palemkuning@yahoo.co.id ', 'perempuan', ''),
('agen085', 'Feb 2011', ' Yuni ', ' Jl. Sedompyong Raya Rt. 05/ 11 Kel. Kemijen Kec. Semarang Timur 50128 ', 'Semarang', ' 081325656978 ', ' izzdzak@ymail.com ', 'perempuan', ''),
('agen086', 'Sep 2014', 'Yusri', 'Jl. Tepi Bandar Bekali No 20 Kel. Sawahan Timur Kec. Padang Timur 25127', 'Padang', '08126783544', 'jefryparis@gmail.com / alnadevita@gmail.com', '', ''),
('agen087', 'Mar 2010', ' Yustika ', ' Jl. Cilayu No. 13 Rt. 01/ 03 Cisalak Pasar Kec. Cimanggis - Depok  ', 'Cimanggis', ' 081222766575 / 085797000779 ', ' some1else_ku@yahoo.co.id ', 'perempuan', ''),
('agen088', 'okt 2012', 'Yusup', 'komp . Griya permata raya , blok B.3 No 1 Rancaekek, desa nanjung mekar , kec rancaekek. Kab bandung', 'Sumedang', '085794977478 / 085222843824', 'yusupsumedang@yahoo.co.id', 'laki-laki', ''),
('agen089', 'Nop 2016', 'Zaki Abrori', 'Jl. Tongkol GG. Sabar No. 19 Pekanbaru Riau', 'Pekanbaru', '081268208785', 'ahmadzaki.abrori@yahoo.com', 'laki-laki', '');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `kode_bonus` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `jumlah_bonus` int(11) NOT NULL,
  `ribuan` int(11) NOT NULL,
  `puluhan_ribu` int(11) NOT NULL,
  `total_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_detail`
--

CREATE TABLE `bonus_detail` (
  `kode_bonus` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bonus` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_bonus_detail` int(11) NOT NULL,
  `history_item` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `kode_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_delete`
--

CREATE TABLE `history_delete` (
  `kode_delete` int(11) NOT NULL,
  `kode_admin` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `kode_login` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin001', '$2y$10$xDu90/lzgw4QgRHsGBQB5e3eHtAHyYXll8uhEeZDAOWJhLfiBxh2a', 1),
('admin002', '$2y$10$xDu90/lzgw4QgRHsGBQB5e3eHtAHyYXll8uhEeZDAOWJhLfiBxh2a', 1),
('admin003', '$2y$10$xDu90/lzgw4QgRHsGBQB5e3eHtAHyYXll8uhEeZDAOWJhLfiBxh2a', 1),
('agen001', '$2y$10$P.19mb1Jfobgp7neb2gYqe.xYH3DNWRGYdvpCYkbznCqOovRGNePO', 2),
('agen002', '$2y$10$6GD47hRXhwzwkiBpDNcys.UCKFl6jiFmse7psR6ju3/RI8bfJVyum', 2),
('agen003', '$2y$10$yZVcVoP749ZGahzNI8NVSOmfIcngIZICvBspeiiLPIMXO9kXm2Ia2', 2),
('agen004', '$2y$10$LDD34bz1F4nT3fwp2/9Nce5IqFTjLrfAR8/WW0pEMZmQiBqXyPNCW', 2),
('agen005', '$2y$10$P85jWA5/9w8zIweEUiwuEug4b1a6jumFeZm9ClAq95r/91EvHoDRG', 2),
('agen006', '$2y$10$F5qUb0Xu3x54fEF0BIWR7ONOmvXejIN0fBTmuPGbtG.9oXUkzxtwG', 2),
('agen007', '$2y$10$VMWOmpr66D5nd6IjGQVsuex03BbrtT4h9FJQbYHkG/gX/PnLe5Pca', 2),
('agen008', '$2y$10$C6i1wDGMHA1T9TbHSDtZ/uqie3/BdAfybekbiyLyEksPqxWpZjlQW', 2),
('agen009', '$2y$10$gNOKwU0jz0V8kJBohGTk/uuzBr7GqcRfCeTx5MTJcD6FkTIDFyt4m', 2),
('agen010', '$2y$10$iOk12nVkM/ulMnkMM0lGTOQuxeYnqzlLjOwXAxohUGABd3HjOA8Eu', 2),
('agen011', '$2y$10$GZBZfIqswBPm3EwnxqbUk.SUoltaVsD1qrDhw5xGI5nHYX7p5eH5K', 2),
('agen012', '$2y$10$qQhoxv2dNlNinDDsWKmP8.WPdsOdkCvSFR6HHdq0csLazp2Q0/9oS', 2),
('agen013', '$2y$10$WS9/CSDnDuymtlJblxJ7TOZLbKz0Z4JLACoxjZzIJH5zIej4ZLh2S', 2),
('agen014', '$2y$10$UcreuxdMsDKhIuh/UfiWjuylW5JXv9SY.tEzAqjA1K9vxEKnTs8HC', 2),
('agen015', '$2y$10$bXzYRYq2Bc8jdMKoeyhFme8/sMjCJ8WaClmMFoiy.XES5RAaiFaJ.', 2),
('agen016', '$2y$10$kJGa79EhHK9QTxNnDxp1vOdtqZGBcXw5nzBTMj7iljlL.mRaifVdC', 2),
('agen017', '$2y$10$EEL3xbaBpmiXZTnugfB.KOt4C62PHfS/nNFtbAiLWvixOX8RvigpW', 2),
('agen018', '$2y$10$N9mkcgEtcHYnXq/YAKwlvuRKmzNnyAKy9Tjt0DWjkSPJPcm3t/bM6', 2),
('agen019', '$2y$10$geNo3PlvRf1WUHTTSEGEM.eQnkFfJpJjWnfhM2/zMKh7EdmdycGe.', 2),
('agen020', '$2y$10$uo.2QrgwbVHwKr2cJwmMauoG8wMV5dBvYXNUmITSU6RMEesBbBFrO', 2),
('agen021', '$2y$10$pyI9b/R1PuiGQaXlOWZTXuDC/EjAevm4NvX2396COIiAfMcyswvi.', 2),
('agen022', '$2y$10$cc3LvuFVRyfXAIs1MUmYX.mjlWgeVOJqW7By22QWcg3xt.imZMlT.', 2),
('agen023', '$2y$10$sAFLeCiZYHkm2xlPSbFm1OPBqwyi9fM9JOM/.a1j/frqgJxtSOMkm', 2),
('agen024', '$2y$10$tKScGbt/Klvn.LuP/0ZhDeLD4B.j76Yd9gI5.0vdEoh2RX5ewMQZe', 2),
('agen025', '$2y$10$AS8tGyulNduGy345PageK.mEMPaScB5gejthv16MQgCxpj.PJphb2', 2),
('agen026', '$2y$10$x5QE7f/NVQNRpl1rrzzOmeLPLKefJNdpxr5gDImHKxhgvM.hPHeAy', 2),
('agen027', '$2y$10$XQp9dA8x7bWK0nMiZyqkGuddmymt8mhRAlHMq8oz.og/be.tQjkVi', 2),
('agen028', '$2y$10$ABlFPo0SXDou5Ja9ES1V.eRVXRqQSnCS2xHMmSP2mKV.lhQb4TLIW', 2),
('agen029', '$2y$10$nCcD7owPsa057RQYwxcD4uRUqQmyCnsBLqRu1idChBY6GfJq/aJCm', 2),
('agen030', '$2y$10$cQ4hJVqjCsiCCHa/T.O/uOt2V2wJ7tNmIwB1fo96DjVKqLedbLiuu', 2),
('agen031', '$2y$10$g1h0eyvlDaxac0G2wHmgZOUqIaqOVtHVdFEF3NKNMHVPJ04NbxRAe', 2),
('agen032', '$2y$10$4mkDAj8Xiba0Aige3I5ylexsVrVjanx3IA9T0YhJTV1iPXV6K2Ljm', 2),
('agen033', '$2y$10$JL5kOQ1yBFJ9RBog.r4ubeAE1.s98VdTsk.mPo28LfoJnNjB8sgpq', 2),
('agen034', '$2y$10$7rw9UrHmMHRa18y8kBUeXuPoQLJHgOHC9fyexktiTs4fn6Zjy5/Su', 2),
('agen035', '$2y$10$1ZYlVzxMIqg924l8WBEEy.PT7zpMBXYvxKrr2uLTgfJ8Uf65QyNwK', 2),
('agen036', '$2y$10$SX6VZyaMNMqv.tC4V.WpcO0TwcdZcP5FBi1e4lLUK8.H3Yvli1l06', 2),
('agen037', '$2y$10$YspHTdWnOHB.c.nOUu1xp.m7RxmgO9Fg0vEM09krh1fe4oq7GYJJW', 2),
('agen038', '$2y$10$sHKRwOfCWAm0.h57qDVRjeOmw0D/G4VrQImgwH5M.TUkm5ppasLQq', 2),
('agen039', '$2y$10$wBWkTsSpP85awM.xVSfM6OmnxQ9T6JgflJyjEOYvZZExMDXtqsaXC', 2),
('agen040', '$2y$10$GwfJSN77eXfGW43twi7qVesEFmPZrah7muLT.BLvvViZSq4osRRtu', 2),
('agen041', '$2y$10$G5cxlzXXCNbEavmuhDTxpuWbRysG1DG5zF/Dm14.H7wFzf3/5dzua', 2),
('agen042', '$2y$10$HdDZdBFzdRgLDL6MuOxYdufZxVOjjqKMwe7P5/EjcvBPLjINt4jTO', 2),
('agen043', '$2y$10$cVQ18e1nCmcmFwQ9lyQCHe6LvGkZ0.EhYPL6z8M.mWL3ur4zmqQTW', 2),
('agen044', '$2y$10$/hchgdHUUoJ7tpNTQ.H1JebspaiXNig3TDa.yzWkJbbw4uGaqsqgu', 2),
('agen045', '$2y$10$Ec3saQYcKLWIMQSfFO5Ekud/lDN8P5W.ydHo1QeIqS15W2Hx1mWj.', 2),
('agen046', '$2y$10$qG4hcy7IRIMPEH.R1qN08.YjFfEfUzQrfk1LNJ8QMVjT4..1JPoxy', 2),
('agen047', '$2y$10$lb14BNy40pIC5Mqavzr.i.bbzi1ROtNouDvIY9PHGw81me0EqVZAy', 2),
('agen048', '$2y$10$mmSzl7emc1FTGTCWMRPZn.PZ.gOx86vIT6rgRiNKVJ2ZvuO1whuTK', 2),
('agen049', '$2y$10$xUCR9aP1TrO4KD1zCM6eGuycadEKQJEY.uvTNVHLr6PrtdL3WFTki', 2),
('agen050', '$2y$10$YFwTTGE2YduYNH2SMq7NTeW1vGukkVsrPBBm4N/FBKmsZGkfCRb4C', 2),
('agen051', '$2y$10$EVDvKdJJkPS6SJtr/5Kslum7FRMQ5ZDlA5x8jMkvRa9HUznIeRBxy', 2),
('agen052', '$2y$10$msZfbUUYIj7PqHBp7R6lJe.TBzYWKP3edulT7q2a2KZjkqToev6x.', 2),
('agen053', '$2y$10$T/jblgTtC16YDsXvo.xOC.Ddr0Gz9NGY8uquO5wH1Ntfd.pvKRCga', 2),
('agen054', '$2y$10$RsfnUtVItuCKW6c0ZNveluMokhVJCEBJQTV2Ohr46iQok2KfLuTPS', 2),
('agen055', '$2y$10$77qWIK/nAT7PsKYY6iJqGudxaCQ9EKRt666hzukBBX5Xd33LZB2t2', 2),
('agen056', '$2y$10$36ctSuuBNn31C6mt7hl8sObt/w4YgZNMnE5MvXsmqx0bY.PD4xfPm', 2),
('agen057', '$2y$10$RHUyEB9SPMRg7a16E.kLRuCm0f30FemhzVL6jv5Sp/XMc35xv.f4m', 2),
('agen058', '$2y$10$YvIBpYMSPgx1NYL9Wssg9.0tqZR2vzMM8mU6AcnM8Dy2DNuw835ee', 2),
('agen059', '$2y$10$hftv0676Pz4mtTEUzBUtNuHFmlJ06RR8pN2Fp6CC6IfAo2dqpJ/VG', 2),
('agen060', '$2y$10$YZf2ZPPUIrOfmYqf4GX2fOkoaqnMS1Y5lDRztIAbQKBgVeYvDNbPm', 2),
('agen061', '$2y$10$FT52Ya4RceFVOFLb.mvsPOXHLFlQslV2LujTdyO05zRMaGGAMQHS2', 2),
('agen062', '$2y$10$uIWXDoROii4bZ5TQZZ/l9.pxh4LQt4fhN/6luouvsWOUCwYr7Guqa', 2),
('agen063', '$2y$10$5Ms62nqxaAKXA1lo1u09WuZGi4/FMAOzj.6VACQNBnostKgRpsgKm', 2),
('agen064', '$2y$10$PBLy3ZnnKcuxOl3dJpISlOpkUB8wzAfgwwx.9FMgnQO3WXqe0p74S', 2),
('agen065', '$2y$10$X66BntqPo18oWU9t/mr4heLmReFonzCYWDeQr/yrAm.fgwwasC3XW', 2),
('agen066', '$2y$10$RQjKIC0UUI75lLSJDB6reOOB4OCEKohVOGuMEpB5gGNeiTRGvHtSi', 2),
('agen067', '$2y$10$3wYnfIFF52TL/f88a1OySOBV3ah4jLH2qhvwvVLLABTK5PRG0qAjK', 2),
('agen068', '$2y$10$IA2nx683Dr.ss4iTbUzhxe4GOHelkkCVvF07Q8DB/amUPpC9ZPHsm', 2),
('agen069', '$2y$10$gpHIconhevhsitOTTGxiq.VDgwl679wVBT.40YExPPImueedCFj1q', 2),
('agen070', '$2y$10$QMgulNToH8E022K/IeyZwODkmSOynrg6qAEtLUC8vmf6EoYOGjh8i', 2),
('agen071', '$2y$10$l3XqhPEEBAPGoA5e/3yMjeP4sS5CXDypOG7nT14qghrO.6EeDLFfe', 2),
('agen072', '$2y$10$FxgbNz6q3/W3upXFgpWsXOr4lQIPHYs3vANbpcpiZe8c47GPn/rPW', 2),
('agen073', '$2y$10$Ije0RQ5vVIxD8BtPMgunk.Xz3HEnzUczdHN2.Y2JyLo5l4clG6RGG', 2),
('agen074', '$2y$10$TnVwxkBF/hG7Pppoz97CReqd5P8BJ6/VcqgwqNyFFV7QKjv.IT1qW', 2),
('agen075', '$2y$10$SfnhC5S.dN9ZvaOS5d4sgeKCf/xgW9Ew.bCeISbSU7Wa.74MyUkrq', 2),
('agen076', '$2y$10$UpTdVnyOLIitRDOIXvnV8OfNm66eiV0tGTGOjc39Ue1G407/Ot5fu', 2),
('agen077', '$2y$10$6AzfQT6JS38aBbGDyEI5weyool9K.IDzp2sJrOiudcMNzrFODBmwW', 2),
('agen078', '$2y$10$rcLVGR/C.d3H7roSbjWmBuC9RyWbuh9mpZBNb9AIy3J7DY.U/5dzW', 2),
('agen079', '$2y$10$p4BYatRWjCDFNbtNSm9dLeT4ylBNllZPh1YEfq5V9n17IhQsxmfsS', 2),
('agen080', '$2y$10$V6gDvc71gaVcdW.OOxs8ReY6E5qVtY.T.7GrEZeI1hIbt3n9ZEZlK', 2),
('agen081', '$2y$10$Sr6V2YzbR1aaO5BKSHEmdOVQipr9mAZ8fKwk6Tw05qNmV.Kzg.fhq', 2),
('agen082', '$2y$10$lllxMyut/Xt5FtNL9gAK9.2BqdBNlFd3b1zQNCg4S7kJLR5lhfOQW', 2),
('agen083', '$2y$10$73RqR3dJ6UTeMzDYydyUZ.ecD.zfOWcjq9W1EYMIaWKLih4FRDrPC', 2),
('agen084', '$2y$10$PxvD8U8uX.eVkpqRtjjgsO2TA5/PlciGanbXT7W5l/VJlEvkh2mLW', 2),
('agen085', '$2y$10$a4xyLaKDZa5tHhazs9emI.O2ewi.vJyeJkib.YukYQDZ2cgFCWLWG', 2),
('agen086', '$2y$10$FjGcTG3X1sYW1PsaafY2VOnlOqOIh3.UW7YdbM073g787oetXdH0G', 2),
('agen087', '$2y$10$jBwbTZQonfz8bX5y2f0XGOZXG04R4hpHems68znB/ORR7VwacSXPq', 2),
('agen088', '$2y$10$CbdCmWH2Ws9HTBUUcN43OOLCgrgj8UM493o7LMf92LNEK8IEh/DuS', 2),
('agen089', '$2y$10$C0U2//dqr7kfvJLyUQxpL.CGjuU/CbY2bJT3I5Jj84U6YLPRWpETW', 2),
('firman', '$2y$10$xDu90/lzgw4QgRHsGBQB5e3eHtAHyYXll8uhEeZDAOWJhLfiBxh2a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` int(11) NOT NULL,
  `kode_pembelian` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_detail`
--

CREATE TABLE `pembayaran_detail` (
  `kode_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `tagihan_sebelumnya` int(11) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL,
  `kode_pembayaran_detail` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status_no_edit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `perincian` text NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status_no_edit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `kode_agen`, `tanggal_pembelian`, `total_item`, `total_pembelian`, `perincian`, `nik`, `status_no_edit`) VALUES
(824, 'agen003', '2018-07-11', 300, 300000, 'Jaring Rp 100.000', 'admin001', 1),
(826, 'agen003', '2018-07-11', 500, 500000, 'tidak ada', 'admin001', 1),
(828, 'agen001', '2018-07-11', 600, 600000, 'Jaring Rp50.000', 'admin001', 0),
(829, 'agen003', '2018-07-11', 300, 2100000, 'tidak ada', 'admin001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `kode_pembelian_detail` int(11) NOT NULL,
  `kode_pembelian` int(11) NOT NULL,
  `kode_item` varchar(255) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `total_harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_item` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_item`, `Nama`) VALUES
('boncu', 'boncu'),
('pretty', 'pretty'),
('sancu', 'sancu'),
('xtreme', 'xtreme');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `kode_saldo` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `kode_pembelian` int(11) NOT NULL,
  `kode_pembayaran_detail` int(11) NOT NULL,
  `tgl_perubahan` date NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`kode_agen`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`kode_bonus`),
  ADD KEY `kode_agen` (`kode_agen`);

--
-- Indexes for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  ADD PRIMARY KEY (`kode_bonus_detail`),
  ADD KEY `kode_bonus` (`kode_bonus`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `history_delete`
--
ALTER TABLE `history_delete`
  ADD PRIMARY KEY (`kode_delete`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`kode_login`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`),
  ADD KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indexes for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD PRIMARY KEY (`kode_pembayaran_detail`),
  ADD KEY `kode_pembayaran` (`kode_pembayaran`),
  ADD KEY `pembayaran_detail_ibfk_2` (`nik`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `kode_agen` (`kode_agen`),
  ADD KEY `kode_pembelian` (`kode_pembelian`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`kode_pembelian_detail`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `pembelian_detail_ibfk_1` (`kode_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_item`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`kode_saldo`),
  ADD KEY `kode_agen` (`kode_agen`),
  ADD KEY `pembelien_child` (`kode_pembelian`),
  ADD KEY `pembayaran_detail_child` (`kode_pembayaran_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `kode_bonus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  MODIFY `kode_bonus_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `history_delete`
--
ALTER TABLE `history_delete`
  MODIFY `kode_delete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `kode_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  MODIFY `kode_pembayaran_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kode_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=830;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `kode_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `kode_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`kode_agen`) REFERENCES `agen` (`kode_agen`);

--
-- Constraints for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  ADD CONSTRAINT `bonus_detail_ibfk_1` FOREIGN KEY (`kode_bonus`) REFERENCES `bonus` (`kode_bonus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bonus_detail_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `admin` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian` (`kode_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD CONSTRAINT `pembayaran_detail_ibfk_1` FOREIGN KEY (`kode_pembayaran`) REFERENCES `pembayaran` (`kode_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_detail_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `admin` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_agen`) REFERENCES `agen` (`kode_agen`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `admin` (`nik`);

--
-- Constraints for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_detail_ibfk_1` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian` (`kode_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_2` FOREIGN KEY (`kode_item`) REFERENCES `produk` (`kode_item`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
