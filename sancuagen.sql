-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2018 at 02:48 PM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nvcffdiq_app`
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
('agen021', 'Jan 2013', 'Eko Jakbar', ' Jl. Pahlawan 6 Kp. Baru No. 40 RT 04 RW 07 Kel. Sukabumi Selatan Kec. Kebon Jeruk - JAKARTA BARAT ', 'Jakbar', ' 085770503309 ', ' sancukebonjeruk@yahoo.com /\nsyakiranadhir@yahoo.com / arka7@yahoo.com ', 'laki-laki', ''),
('agen022', 'Jun 2013', ' Eko Malang', 'perum, gadang mandiri b-8  JL. Lowokdoro gang 2 malang kecamatan sukun, kota malang jawa timur', 'Malang', '081233400578', ' eym_jr@yahoo.com ', 'laki-laki', ''),
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

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`kode_bonus`, `kode_agen`, `jumlah_bonus`, `ribuan`, `puluhan_ribu`, `total_item`) VALUES
(293, 'agen021', 350000, 0, 0, 1530),
(294, 'agen064', 650000, 0, 0, 1815),
(295, 'agen012', 0, 0, 0, 210),
(296, 'agen072', 350000, 0, 0, 1330),
(297, 'agen057', 700000, 0, 0, 140),
(298, 'agen029', 300000, 0, 0, 145),
(300, 'agen022', 300000, 0, 0, 465),
(301, 'agen047', 0, 0, 0, 1340),
(302, 'agen062', 0, 0, 0, 590),
(305, 'agen009', 0, 0, 0, 760),
(306, 'agen088', 1400000, 0, 0, 2580),
(307, 'agen069', 0, 0, 0, 405),
(308, 'agen024', 650000, 0, 0, 1495),
(309, 'agen030', 0, 0, 0, 70),
(310, 'agen074', 300000, 0, 0, 845),
(311, 'agen019', 0, 0, 0, 0),
(312, 'agen061', 0, 0, 0, 555),
(313, 'agen046', 300000, 0, 0, 325),
(314, 'agen079', 300000, 0, 0, 670),
(315, 'agen075', 300000, 0, 0, 370),
(316, 'agen036', 0, 0, 0, 325),
(317, 'agen015', 0, 0, 0, 130),
(318, 'agen026', 0, 0, 0, 145),
(319, 'agen010', 650000, 0, 0, 105),
(320, 'agen028', 0, 0, 0, 150),
(321, 'agen070', 0, 0, 0, 275),
(322, 'agen032', 0, 0, 0, 180),
(323, 'agen033', 300000, 0, 0, 900),
(325, 'agen023', 300000, 0, 0, 760),
(326, 'agen007', 300000, 0, 0, 455),
(327, 'agen011', 0, 0, 0, 715);

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

--
-- Dumping data for table `bonus_detail`
--

INSERT INTO `bonus_detail` (`kode_bonus`, `status`, `bonus`, `jumlah_item`, `tanggal_pembelian`, `kode_bonus_detail`, `history_item`, `nik`, `kode_pembelian`) VALUES
(293, '', 350000, 1530, '2018-07-11', 398, 1530, 'admin003', 835),
(294, '', 350000, 1120, '2018-07-11', 399, 1120, 'admin003', 836),
(295, '', 0, 210, '2018-07-11', 400, 210, 'admin003', 837),
(296, '', 350000, 1330, '2018-07-11', 401, 1330, 'admin003', 838),
(297, '', 700000, 140, '2018-07-12', 402, 140, 'admin003', 839),
(298, '', 300000, 145, '2018-07-12', 403, 145, 'admin003', 840),
(300, '', 300000, 465, '2018-07-12', 405, 465, 'admin003', 842),
(301, '', 0, 1340, '2018-07-12', 406, 1340, 'admin003', 843),
(302, '', 0, 590, '2018-07-12', 407, 590, 'admin003', 844),
(305, '', 0, 50, '2018-07-12', 410, 50, 'admin003', 847),
(306, '', 1050000, 1580, '2018-07-13', 411, 1580, 'admin003', 848),
(306, '', 350000, 1000, '2018-07-13', 412, 2580, 'admin003', 849),
(307, '', 0, 165, '2018-07-13', 413, 165, 'admin003', 850),
(308, '', 350000, 1005, '2018-07-13', 414, 1005, 'admin003', 851),
(309, '', 0, 70, '2018-07-14', 415, 70, 'admin003', 852),
(310, '', 300000, 845, '2018-07-14', 416, 845, 'admin003', 853),
(311, '', 0, 0, '2018-07-14', 417, 0, 'admin003', 854),
(312, '', 0, 0, '2018-07-14', 418, 0, 'admin003', 855),
(313, '', 300000, 325, '2018-07-14', 419, 325, 'admin003', 856),
(312, '', 0, 555, '2018-07-14', 420, 555, 'admin003', 857),
(314, '', 300000, 670, '2018-07-14', 421, 670, 'admin003', 858),
(315, '', 300000, 370, '2018-07-14', 422, 370, 'admin003', 859),
(305, '', 0, 510, '2018-07-14', 423, 560, 'admin003', 860),
(316, '', 0, 120, '2018-07-14', 424, 120, 'admin003', 861),
(317, '', 0, 0, '2018-07-13', 425, 0, 'admin003', 862),
(317, '', 0, 45, '2018-07-14', 426, 45, 'admin003', 863),
(317, '', 0, 50, '2018-07-13', 427, 95, 'admin003', 864),
(317, '', 0, 35, '2018-07-14', 428, 130, 'admin003', 865),
(305, '', 0, 200, '2018-07-16', 429, 760, 'admin003', 866),
(316, '', 0, 205, '2018-07-16', 430, 325, 'admin003', 867),
(317, '', 0, 0, '2018-07-16', 431, 130, 'admin003', 868),
(317, '', 0, 0, '2018-07-16', 432, 130, 'admin003', 869),
(297, '', 0, 0, '2018-07-16', 433, 140, 'admin003', 870),
(297, '', 0, 0, '2018-07-16', 434, 140, 'admin003', 871),
(294, '', 0, 0, '2018-07-16', 435, 1120, 'admin003', 872),
(318, '', 0, 145, '2018-07-16', 436, 145, 'admin003', 873),
(319, '', 650000, 105, '2018-07-17', 437, 105, 'admin003', 874),
(308, '', 300000, 490, '2018-07-17', 438, 1495, 'admin003', 875),
(320, '', 0, 150, '2018-07-17', 439, 150, 'admin003', 876),
(321, '', 0, 275, '2018-07-17', 440, 275, 'admin003', 877),
(322, '', 0, 180, '2018-07-17', 441, 180, 'admin003', 878),
(323, '', 300000, 900, '2018-07-18', 442, 900, 'admin003', 879),
(325, '', 300000, 760, '2018-07-18', 444, 760, 'admin003', 881),
(307, '', 0, 240, '2018-07-18', 445, 405, 'admin003', 882),
(326, '', 300000, 455, '2018-07-18', 446, 455, 'admin003', 883),
(327, '', 0, 715, '2018-07-18', 447, 715, 'admin003', 884),
(294, '', 300000, 695, '2018-07-18', 448, 1815, 'admin003', 885);

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

--
-- Dumping data for table `history_delete`
--

INSERT INTO `history_delete` (`kode_delete`, `kode_admin`, `keterangan`, `date`) VALUES
(1, 'admin001', 'hapus data pembelian 880 | agen018 |  nominal pembayaran 21618500', '2018-07-19 15:30:24');

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

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`kode_login`, `username`, `time`, `ip`, `status`) VALUES
(81, 'admin001', '2018-07-11 11:16:03', '111.95.204.211', 'sukses'),
(82, 'admin003', '2018-07-11 11:17:26', '111.95.204.211', 'sukses'),
(83, 'admin003', '2018-07-11 11:17:51', '111.95.204.211', 'sukses'),
(84, 'admin003', '2018-07-11 13:29:44', '111.95.204.211', 'sukses'),
(85, 'admin003', '2018-07-11 14:46:05', '111.95.204.211', 'sukses'),
(86, 'Admin003', '2018-07-11 14:51:26', '114.4.213.111', 'sukses'),
(87, 'admin003', '2018-07-12 08:09:53', '139.193.27.22', 'sukses'),
(88, 'admin003', '2018-07-12 13:33:17', '139.193.27.22', 'sukses'),
(89, 'agen021', '2018-07-12 14:06:22', '139.193.27.22', 'sukses'),
(90, 'agen021', '2018-07-12 14:07:04', '139.193.27.22', 'sukses'),
(91, 'Agen021', '2018-07-12 14:09:32', '139.193.27.22', 'sukses'),
(92, 'admin003', '2018-07-12 14:16:03', '139.193.27.22', 'sukses'),
(93, 'firman', '2018-07-12 15:13:07', '139.193.27.22', 'gagal'),
(94, 'firman', '2018-07-12 15:13:15', '139.193.27.22', 'sukses'),
(95, 'Firman', '2018-07-12 15:49:10', '120.188.95.189', 'sukses'),
(96, 'firman', '2018-07-12 21:44:20', '114.124.243.44', 'gagal'),
(97, 'firman', '2018-07-12 21:44:43', '114.124.243.44', 'sukses'),
(98, 'firman', '2018-07-13 05:35:32', '182.0.164.25', 'sukses'),
(99, 'firman', '2018-07-13 05:36:33', '182.0.164.25', 'sukses'),
(100, 'admin003', '2018-07-13 08:44:02', '111.95.206.201', 'sukses'),
(101, 'admin003', '2018-07-13 13:15:48', '111.95.206.201', 'sukses'),
(102, 'admin001', '2018-07-13 13:34:02', '111.95.206.201', 'sukses'),
(103, 'admin001', '2018-07-13 14:51:16', '111.95.206.201', 'sukses'),
(104, 'admin001', '2018-07-13 15:20:03', '111.95.206.201', 'sukses'),
(105, 'admin001', '2018-07-13 22:48:38', '118.136.103.13', 'sukses'),
(106, 'admin001', '2018-07-14 11:12:59', '111.95.204.210', 'gagal'),
(107, 'admin001', '2018-07-14 11:13:04', '111.95.204.210', 'sukses'),
(108, 'admin003', '2018-07-14 13:55:21', '111.95.204.210', 'sukses'),
(109, 'admin001', '2018-07-14 14:25:00', '111.95.204.210', 'sukses'),
(110, 'admin003', '2018-07-14 14:26:28', '111.95.204.210', 'sukses'),
(111, 'admin003', '2018-07-14 14:29:07', '111.95.204.210', 'sukses'),
(112, 'admin003', '2018-07-14 14:50:46', '111.95.204.210', 'sukses'),
(113, 'Agen001', '2018-07-14 22:55:50', '125.160.253.45', 'gagal'),
(114, 'Admin001', '2018-07-14 22:56:11', '125.160.253.45', 'sukses'),
(115, 'firman', '2018-07-16 06:03:20', '120.188.33.55', 'sukses'),
(116, 'firman', '2018-07-16 06:04:39', '120.188.33.55', 'sukses'),
(117, 'firman', '2018-07-16 06:05:21', '120.188.33.55', 'sukses'),
(118, 'firman', '2018-07-16 06:07:02', '120.188.33.55', 'sukses'),
(119, 'admin003', '2018-07-16 13:04:53', '139.0.187.125', 'sukses'),
(120, 'admin003', '2018-07-17 08:49:10', '139.192.133.66', 'gagal'),
(121, 'admin003', '2018-07-17 08:49:17', '139.192.133.66', 'gagal'),
(122, 'admin003', '2018-07-17 08:49:30', '139.192.133.66', 'sukses'),
(123, 'admin001', '2018-07-17 09:53:23', '139.192.133.66', 'sukses'),
(124, 'admin003', '2018-07-17 14:43:06', '139.192.133.66', 'sukses'),
(125, 'admin003', '2018-07-17 14:43:14', '139.192.133.66', 'sukses'),
(126, 'admin003', '2018-07-17 14:43:21', '139.192.133.66', 'sukses'),
(127, 'firman', '2018-07-17 18:18:20', '120.188.38.44', 'sukses'),
(128, 'admin001', '2018-07-18 08:24:12', '139.193.27.12', 'gagal'),
(129, 'admin001', '2018-07-18 08:24:18', '139.193.27.12', 'sukses'),
(130, 'Admin001', '2018-07-18 08:28:02', '114.4.83.49', 'sukses'),
(131, 'firman', '2018-07-18 09:23:38', '120.188.67.77', 'sukses'),
(132, 'Agen001', '2018-07-18 10:27:32', '114.4.83.49', 'gagal'),
(133, 'Admin001', '2018-07-18 10:27:47', '114.4.83.49', 'sukses'),
(134, 'Admin001', '2018-07-18 10:34:03', '114.4.83.49', 'sukses'),
(135, 'Admin001', '2018-07-18 10:39:00', '114.4.83.49', 'sukses'),
(136, 'firman', '2018-07-18 11:08:55', '120.188.94.97', 'sukses'),
(137, 'admin003', '2018-07-18 13:17:32', '139.193.27.12', 'sukses'),
(138, 'firman', '2018-07-18 14:56:25', '114.4.212.162', 'sukses'),
(139, 'agen001', '2018-07-18 15:02:55', '139.193.27.12', 'sukses'),
(140, 'agen036', '2018-07-18 15:04:09', '139.193.27.12', 'gagal'),
(141, 'agen036', '2018-07-18 15:04:16', '139.193.27.12', 'sukses'),
(142, 'admin001', '2018-07-18 18:57:00', '118.136.103.13', 'sukses'),
(143, 'admin003', '2018-07-19 14:17:46', '111.95.205.86', 'sukses'),
(144, 'admin003', '2018-07-19 14:26:16', '111.95.205.86', 'sukses'),
(145, 'admin003', '2018-07-19 14:47:36', '111.95.205.86', 'sukses'),
(146, 'firman', '2018-07-19 14:53:26', '114.5.145.7', 'sukses'),
(147, 'admin001', '2018-07-19 15:19:02', '111.95.205.86', 'sukses'),
(148, 'firman', '2018-07-20 08:38:49', '114.4.79.46', 'gagal'),
(149, 'firman', '2018-07-20 08:38:58', '114.4.79.46', 'sukses'),
(150, 'admin003', '2018-07-20 13:28:08', '139.192.133.49', 'sukses'),
(151, 'admin003', '2018-07-20 14:30:40', '139.192.133.49', 'sukses'),
(152, 'admin001', '2018-07-20 14:48:31', '139.192.133.49', 'sukses');

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kode_pembayaran`, `kode_pembelian`, `tanggal_pembelian`, `jumlah_pembelian`, `sisa_tagihan`) VALUES
(39, 835, '2018-07-11', 37611600, 722250),
(40, 836, '2018-07-11', 38323912, 20973912),
(41, 837, '2018-07-11', 3702700, 93600),
(42, 838, '2018-07-11', 24772000, 609375),
(43, 839, '2018-07-12', 2562300, 22950),
(44, 840, '2018-07-12', 2432600, 2132600),
(46, 842, '2018-07-12', 9334900, 151800),
(47, 843, '2018-07-12', 22817650, 22817650),
(48, 844, '2018-07-12', 11837375, 2049875),
(51, 847, '2018-07-12', 1817200, 0),
(52, 848, '2018-07-13', 27504280, -16181356),
(53, 849, '2018-07-13', 16943230, 16593230),
(54, 850, '2018-07-13', 5679970, 3740030),
(55, 851, '2018-07-13', 16269500, 3139750),
(56, 852, '2018-07-14', 2310250, 65250),
(57, 853, '2018-07-14', 13213200, 255000),
(58, 854, '2018-07-14', 1671150, 54500),
(59, 855, '2018-07-14', 1230000, 0),
(60, 856, '2018-07-14', 14071700, 7671700),
(61, 857, '2018-07-14', 15494150, 5494150),
(62, 858, '2018-07-14', 11344500, 0),
(63, 859, '2018-07-14', 6235700, 0),
(64, 860, '2018-07-14', 8852610, 3196500),
(65, 861, '2018-07-14', 25484550, 25484550),
(66, 862, '2018-07-13', 1037500, 0),
(67, 863, '2018-07-14', 713250, 0),
(68, 864, '2018-07-13', 702500, 0),
(69, 865, '2018-07-14', 68229770, 67666270),
(70, 866, '2018-07-16', 3279660, 3279660),
(71, 867, '2018-07-16', 4716500, 4716500),
(72, 868, '2018-07-16', 325000, 0),
(73, 869, '2018-07-16', 225000, 0),
(74, 870, '2018-07-16', 2192500, 152250),
(75, 871, '2018-07-16', 2217500, 0),
(76, 872, '2018-07-16', 6552040, 0),
(77, 873, '2018-07-16', 9718725, 7018725),
(78, 874, '2018-07-17', 32214750, 31564750),
(79, 875, '2018-07-17', 11939450, 4316700),
(80, 876, '2018-07-17', 3180870, 1002870),
(81, 877, '2018-07-17', 4197450, 172800),
(82, 878, '2018-07-17', 7768000, 3768000),
(83, 879, '2018-07-18', 19297310, 13997310),
(85, 881, '2018-07-18', 12017750, 11717750),
(86, 882, '2018-07-18', 6806750, 6806750),
(87, 883, '2018-07-18', 8812750, 413000),
(88, 884, '2018-07-18', 13449250, 615950),
(89, 885, '2018-07-18', 11403590, 10103590);

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

--
-- Dumping data for table `pembayaran_detail`
--

INSERT INTO `pembayaran_detail` (`kode_pembayaran`, `tanggal_pembayaran`, `tagihan_sebelumnya`, `nominal_pembayaran`, `sisa_tagihan`, `kode_pembayaran_detail`, `keterangan`, `nik`, `status_no_edit`) VALUES
(39, '2018-07-11', 37611600, 350000, 37261600, 43, 'bonus pembelian 2018-07-11', 'admin003', 1),
(40, '2018-07-11', 38323912, 350000, 37973912, 44, 'bonus pembelian 2018-07-11', 'admin003', 1),
(39, '2018-07-12', 37261600, 11335000, 25926600, 45, 'bca 10 juli 11335000', 'admin003', 1),
(39, '2018-07-12', 25926600, 1125000, 24801600, 46, 'bca 10 juli 1125000', 'admin003', 1),
(39, '2018-07-12', 24801600, 24079350, 722250, 47, 'bca 10 juli 24079350', 'admin003', 0),
(41, '2018-07-11', 3702700, 3609100, 93600, 48, 'mandiri 10 juli 3609100', 'admin003', 0),
(40, '2018-07-10', 37973912, 5000000, 32973912, 49, 'bca 10 juli 5jt', 'admin003', 1),
(40, '2018-07-11', 32973912, 4000000, 28973912, 50, 'bca 11 juli 4jt', 'admin003', 1),
(42, '2018-07-11', 24772000, 350000, 24422000, 51, 'bonus pembelian 2018-07-11', 'admin003', 1),
(42, '2018-07-10', 24422000, 800000, 23622000, 52, 'mandiri 10 juli 800rb', 'admin003', 1),
(42, '2018-07-11', 23622000, 23012625, 609375, 53, 'mandiri 10 juli 23,012,625', 'admin003', 0),
(43, '2018-07-12', 2562300, 700000, 1862300, 54, 'bonus pembelian 2018-07-12', 'admin003', 1),
(43, '2018-07-12', 1862300, 1839350, 22950, 55, 'mandiri 12 juli 1,839,350', 'admin003', 0),
(44, '2018-07-12', 2432600, 300000, 2132600, 56, 'bonus pembelian 2018-07-12', 'admin003', 1),
(46, '2018-07-12', 9334900, 300000, 9034900, 58, 'bonus pembelian 2018-07-12', 'admin003', 1),
(40, '2018-07-13', 28973912, 8000000, 20973912, 59, 'BCA 13 juli 8jt', 'admin003', 0),
(46, '2018-07-12', 9034900, 1362500, 7672400, 61, 'mandiri 12 juli 1,362,500', 'admin003', 1),
(46, '2018-07-12', 7672400, 7520600, 151800, 62, 'mandiri 12 juli 7,520,600', 'admin003', 0),
(48, '2018-07-13', 11837375, 8000000, 3837375, 63, 'mandiri 13 juli 8jt', 'admin003', 1),
(48, '2018-07-13', 3837375, 1787500, 2049875, 64, 'mandiri 13 juli 1,787,500', 'admin003', 0),
(51, '2018-07-12', 1817200, 1760500, 56700, 68, 'mandiri 12 juli 1,760,500. ', 'admin003', 1),
(52, '2018-07-13', 27504280, 1050000, 26454280, 69, 'bonus pembelian 2018-07-13', 'admin003', 1),
(52, '2018-07-12', 26454280, 25810000, 644280, 70, 'mandiri 12 juli 25,810,000', 'admin003', 1),
(53, '2018-07-13', 16943230, 350000, 16593230, 71, 'bonus pembelian 2018-07-13', 'admin003', 1),
(52, '2018-07-12', 644280, 16182000, -16181356, 72, 'mandiri 12 juli 16,182,000', 'admin003', 0),
(54, '2018-07-13', 5679970, 2525, 3154970, 75, 'mandiri 13 juli 2,525,000', 'admin003', 1),
(54, '2018-07-13', 3154970, 2900, 254970, 76, 'mandiri 13 juli 2,9jt', 'admin003', 1),
(54, '2018-07-13', 5679970, 2900000, 2779970, 77, 'mandiri 13 juli 2,9jt', 'admin003', 1),
(54, '2018-07-13', 2779970, 2525000, 254970, 78, 'mandiri 13 juli 2,525,000', 'admin003', 1),
(55, '2018-07-13', 16269500, 350000, 15919500, 79, 'bonus pembelian 2018-07-13', 'admin003', 1),
(55, '2018-07-13', 15919500, 16469750, 550250, 80, 'mandiri 13 juli 16,469,750', 'admin003', 1),
(57, '2018-07-14', 13213200, 300000, 12913200, 81, 'bonus pembelian 2018-07-14', 'admin003', 1),
(58, '2018-07-13', 1671150, 1616650, 54500, 82, 'bca 13 juli 1616650', 'admin003', 0),
(59, '2018-07-16', 1230000, 1230000, 0, 83, 'mandiri 16 juli 1230000', 'admin003', 0),
(60, '2018-07-14', 14071700, 300000, 13771700, 84, 'bonus pembelian 2018-07-14', 'admin003', 1),
(60, '2018-07-14', 13771700, 4650000, 9121700, 85, 'mandiri 14 juli 4,650,000', 'admin003', 1),
(61, '2018-07-16', 15494150, 10000000, 5494150, 86, 'mandiri 16 juli 10jt', 'admin003', 0),
(62, '2018-07-14', 11344500, 300000, 11044500, 87, 'bonus pembelian 2018-07-14', 'admin003', 1),
(62, '2018-07-14', 11044500, 11044500, 0, 88, 'mandiri 14 juli 11,044,500', 'admin003', 0),
(63, '2018-07-14', 6235700, 300000, 5935700, 89, 'bonus pembelian 2018-07-14', 'admin003', 1),
(63, '2018-07-13', 5935700, 5818250, 117450, 90, 'MANDIRI 13 juli 5,818,250 ', 'admin003', 1),
(51, '2018-07-13', 56700, 56700, 0, 91, 'mandiri 13 juli 56700', 'admin003', 0),
(64, '2018-07-14', 8852610, 8618250, 234360, 92, 'mandiri 14 juli 8,618,250.', 'admin003', 1),
(66, '2018-07-14', 1037500, 1037500, 0, 93, 'bca 14 juli 1037500', 'admin003', 0),
(67, '2018-07-14', 713250, 713250, 0, 94, 'bca 14 juli 713250', 'admin003', 0),
(68, '2018-07-14', 702500, 702500, 0, 95, 'bca 14 juli 702500', 'admin003', 0),
(69, '2018-07-14', 68229770, 563500, 67666270, 96, 'bca 14 juli 563500', 'admin003', 0),
(63, '2018-07-16', 117450, 117450, 0, 97, 'mandiri 16 juli 117,450', 'admin003', 0),
(57, '2018-07-17', 12913200, 12658200, 255000, 98, 'bca 17 juli 12658200', 'admin003', 0),
(56, '2018-07-15', 2310250, 985000, 1325250, 99, 'bca 15 juli 985,000', 'admin003', 1),
(56, '2018-07-15', 1325250, 1260000, 65250, 100, 'bca 15 juli 1,260,000', 'admin003', 0),
(64, '2018-07-17', 234360, 3430860, 3196500, 101, '', 'admin003', 0),
(74, '2018-07-14', 2192500, 2040250, 152250, 102, 'mandiri 14 juli 2,040,250', 'admin003', 0),
(75, '2018-07-14', 2217500, 2217500, 0, 103, 'mandiri 14 juli 2,217,500', 'admin003', 0),
(76, '2018-07-16', 6552040, 5000000, 1552040, 104, 'bca 16 juli 5jt', 'admin003', 1),
(77, '2018-07-14', 9718725, 2700000, 7018725, 105, 'bca 14 juli 2,7jt', 'admin003', 0),
(78, '2018-07-17', 32214750, 650000, 31564750, 106, 'bonus pembelian 2018-07-17', 'admin003', 1),
(79, '2018-07-17', 11939450, 300000, 11639450, 107, 'bonus pembelian 2018-07-17', 'admin003', 1),
(79, '2018-07-16', 11639450, 7322750, 4316700, 108, 'mandiri 16 juli 7,322,750', 'admin003', 0),
(55, '2018-07-16', 550250, 3690000, 3139750, 109, 'mandiri 16 juli 3,690,000', 'admin003', 0),
(80, '2018-07-17', 3180870, 1078000, 2102870, 110, 'bca 17 juli 1078000', 'admin003', 1),
(80, '2018-07-18', 2102870, 1100000, 1002870, 111, 'bca 18 juli 1,1jt', 'admin003', 0),
(81, '2018-07-17', 4197450, 4024650, 172800, 112, 'mandiri 17 juli 4,024,650', 'admin003', 0),
(82, '2018-07-16', 7768000, 4000000, 3768000, 113, 'mandiri 16 juli 4jt', 'admin003', 0),
(72, '2018-07-18', 325000, 325000, 0, 114, 'mandiri 18 juli 325,000', 'admin003', 0),
(73, '2018-07-18', 225000, 225000, 0, 115, 'bca 18 juli 225rb', 'admin003', 0),
(83, '2018-07-18', 19297310, 300000, 18997310, 116, 'bonus pembelian 2018-07-18', 'admin003', 1),
(83, '2018-07-17', 18997310, 5000000, 13997310, 117, 'bca 17 juli 5jt', 'admin003', 0),
(85, '2018-07-18', 12017750, 300000, 11717750, 119, 'bonus pembelian 2018-07-18', 'admin003', 1),
(54, '2018-07-18', 254970, 3995000, 3740030, 120, 'mandiri 18 juli 3,995,000', 'admin003', 0),
(87, '2018-07-18', 8812750, 300000, 8512750, 121, 'bonus pembelian 2018-07-18', 'admin003', 1),
(87, '2018-07-19', 8512750, 8099750, 413000, 122, 'mandiri 19 juli 8,099,750', 'admin003', 0),
(88, '2018-07-17', 13449250, 12833300, 615950, 123, 'mandiri 17 juli 12,833,300', 'admin003', 0),
(89, '2018-07-18', 11403590, 300000, 11103590, 124, 'bonus pembelian 2018-07-18', 'admin003', 1),
(60, '2018-07-19', 9121700, 1450000, 7671700, 125, 'mandiri 19 juli 1,450,000', 'admin003', 0),
(76, '2018-07-19', 1552040, 1552040, 0, 126, 'BCA 19 juli 1552040', 'admin003', 0),
(89, '2018-07-19', 11103590, 1000000, 10103590, 127, 'bca 19 juli 1jt', 'admin003', 0);

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
(835, 'agen021', '2018-07-11', 2125, 37611600, 'tidak ada', 'admin003', 1),
(836, 'agen064', '2018-07-11', 1120, 38323912, 'tidak ada', 'admin003', 1),
(837, 'agen012', '2018-07-11', 210, 3702700, 'tidak ada', 'admin003', 1),
(838, 'agen072', '2018-07-11', 1355, 24772000, 'tidak ada', 'admin003', 1),
(839, 'agen057', '2018-07-12', 140, 2562300, 'royalti  yadi 431. 700rb', 'admin003', 1),
(840, 'agen029', '2018-07-12', 145, 2432600, 'tidak ada', 'admin003', 0),
(842, 'agen022', '2018-07-12', 520, 9334900, 'tidak ada', 'admin003', 1),
(843, 'agen047', '2018-07-12', 1365, 22817650, 'tidak ada', 'admin003', 0),
(844, 'agen062', '2018-07-12', 640, 11837375, 'tidak ada', 'admin003', 1),
(847, 'agen009', '2018-07-12', 75, 1817200, 'tidak ada', 'admin003', 1),
(848, 'agen088', '2018-07-13', 1605, 27504280, 'tidak ada', 'admin003', 1),
(849, 'agen088', '2018-07-13', 1020, 16943230, 'tidak ada', 'admin003', 0),
(850, 'agen069', '2018-07-13', 275, 5679970, 'tidak ada', 'admin003', 1),
(851, 'agen024', '2018-07-13', 1005, 16269500, 'tidak ada', 'admin003', 1),
(852, 'agen030', '2018-07-14', 140, 2310250, 'tidak ada', 'admin003', 1),
(853, 'agen074', '2018-07-14', 845, 13213200, 'tidak ada', 'admin003', 1),
(854, 'agen019', '2018-07-14', 80, 1671150, 'tidak ada', 'admin003', 1),
(855, 'agen061', '2018-07-14', 40, 1230000, 'tidak ada', 'admin003', 1),
(856, 'agen046', '2018-07-14', 365, 14071700, 'tidak ada', 'admin003', 1),
(857, 'agen061', '2018-07-14', 555, 15494150, 'tidak ada', 'admin003', 1),
(858, 'agen079', '2018-07-14', 670, 11344500, 'tidak ada', 'admin003', 1),
(859, 'agen075', '2018-07-14', 370, 6235700, 'tidak ada', 'admin003', 1),
(860, 'agen009', '2018-07-14', 510, 8852610, 'tidak ada', 'admin003', 1),
(861, 'agen036', '2018-07-14', 120, 25484550, 'tidak ada', 'admin003', 1),
(862, 'agen015', '2018-07-13', 30, 1037500, 'tidak ada', 'admin003', 1),
(863, 'agen015', '2018-07-14', 45, 713250, 'tidak ada', 'admin003', 1),
(864, 'agen015', '2018-07-13', 50, 702500, 'tidak ada', 'admin003', 1),
(865, 'agen015', '2018-07-14', 35, 68229770, 'tidak ada', 'admin003', 1),
(866, 'agen009', '2018-07-16', 200, 3279660, 'tidak ada', 'admin003', 0),
(867, 'agen036', '2018-07-16', 250, 4716500, 'tidak ada', 'admin003', 0),
(868, 'agen015', '2018-07-16', 10, 325000, 'tidak ada', 'admin003', 1),
(869, 'agen015', '2018-07-16', 5, 225000, 'tidak ada', 'admin003', 1),
(870, 'agen057', '2018-07-16', 60, 2192500, 'tidak ada', 'admin003', 1),
(871, 'agen057', '2018-07-16', 65, 2217500, 'tidak ada', 'admin003', 1),
(872, 'agen064', '2018-07-16', 190, 6552040, 'tidak ada', 'admin003', 1),
(873, 'agen026', '2018-07-16', 145, 9718725, 'tidak ada', 'admin003', 1),
(874, 'agen010', '2018-07-17', 435, 32214750, 'tidak ada', 'admin003', 0),
(875, 'agen024', '2018-07-17', 610, 11939450, 'tidak ada', 'admin003', 1),
(876, 'agen028', '2018-07-17', 165, 3180870, 'tidak ada', 'admin003', 1),
(877, 'agen070', '2018-07-17', 275, 4197450, 'tidak ada', 'admin003', 1),
(878, 'agen032', '2018-07-17', 180, 7768000, 'tidak ada', 'admin003', 1),
(879, 'agen033', '2018-07-18', 900, 19297310, 'tidak ada', 'admin003', 1),
(881, 'agen023', '2018-07-18', 760, 12017750, 'tidak ada', 'admin003', 0),
(882, 'agen069', '2018-07-18', 320, 6806750, 'tidak ada', 'admin003', 0),
(883, 'agen007', '2018-07-18', 475, 8812750, 'tidak ada', 'admin003', 1),
(884, 'agen011', '2018-07-18', 715, 13449250, 'tidak ada', 'admin003', 1),
(885, 'agen064', '2018-07-18', 695, 11403590, 'tidak ada', 'admin003', 1);

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

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`kode_pembelian_detail`, `kode_pembelian`, `kode_item`, `jumlah_item`, `total_harga_item`) VALUES
(554, 835, 'sancu', 1445, 25151600),
(555, 835, 'boncu', 85, 1125000),
(556, 835, 'pretty', 535, 9415000),
(557, 835, 'xtreme', 60, 1920000),
(558, 836, 'sancu', 1120, 38323912),
(559, 837, 'sancu', 210, 3702700),
(560, 838, 'sancu', 1330, 23972000),
(561, 838, 'xtreme', 25, 800000),
(562, 839, 'sancu', 140, 2562300),
(563, 840, 'sancu', 145, 2432600),
(567, 842, 'sancu', 465, 7972400),
(568, 842, 'pretty', 40, 695000),
(569, 842, 'xtreme', 15, 667500),
(570, 843, 'sancu', 910, 16295150),
(571, 843, 'boncu', 430, 5535000),
(572, 843, 'xtreme', 25, 987500),
(573, 844, 'sancu', 590, 10049875),
(574, 844, 'xtreme', 50, 1787500),
(580, 847, 'sancu', 50, 879700),
(581, 847, 'xtreme', 25, 937500),
(582, 848, 'sancu', 1425, 24386780),
(583, 848, 'boncu', 155, 2105000),
(584, 848, 'xtreme', 25, 1012500),
(585, 849, 'sancu', 1000, 16303230),
(586, 849, 'xtreme', 20, 640000),
(587, 850, 'sancu', 165, 3064970),
(588, 850, 'pretty', 70, 1315000),
(589, 850, 'xtreme', 40, 1300000),
(590, 851, 'sancu', 1005, 16269500),
(591, 852, 'boncu', 70, 985000),
(592, 852, 'pretty', 70, 1325250),
(593, 853, 'sancu', 825, 12958200),
(594, 853, 'boncu', 20, 255000),
(595, 854, 'pretty', 80, 1671150),
(596, 855, 'pretty', 5, 92500),
(597, 855, 'xtreme', 35, 1137500),
(598, 856, 'sancu', 325, 7305200),
(599, 856, 'xtreme', 40, 6766500),
(600, 857, 'sancu', 555, 15494150),
(601, 858, 'sancu', 670, 11344500),
(602, 859, 'sancu', 370, 6235700),
(603, 860, 'sancu', 510, 8852610),
(604, 861, 'sancu', 120, 25484550),
(605, 862, 'xtreme', 30, 1037500),
(606, 863, 'sancu', 45, 713250),
(607, 864, 'boncu', 50, 702500),
(608, 865, 'sancu', 35, 68229770),
(609, 866, 'sancu', 145, 2534660),
(610, 866, 'boncu', 55, 745000),
(611, 867, 'sancu', 160, 2611500),
(612, 867, 'boncu', 45, 662500),
(613, 867, 'pretty', 10, 180000),
(614, 867, 'xtreme', 35, 1262500),
(615, 868, 'xtreme', 10, 325000),
(616, 869, 'xtreme', 5, 225000),
(617, 870, 'pretty', 15, 262500),
(618, 870, 'xtreme', 45, 1930000),
(619, 871, 'pretty', 10, 180000),
(620, 871, 'xtreme', 55, 2037500),
(621, 872, 'xtreme', 190, 6552040),
(622, 873, 'sancu', 145, 9718725),
(623, 874, 'sancu', 105, 24039750),
(624, 874, 'pretty', 195, 3537500),
(625, 874, 'xtreme', 135, 4637500),
(626, 875, 'sancu', 490, 8411950),
(627, 875, 'pretty', 40, 740000),
(628, 875, 'xtreme', 80, 2787500),
(629, 876, 'sancu', 150, 2908370),
(630, 876, 'pretty', 15, 272500),
(631, 877, 'sancu', 275, 4197450),
(632, 878, 'sancu', 180, 7768000),
(633, 879, 'sancu', 795, 17899810),
(634, 879, 'boncu', 105, 1397500),
(637, 881, 'sancu', 575, 9372750),
(638, 881, 'boncu', 185, 2645000),
(639, 882, 'sancu', 240, 4019250),
(640, 882, 'xtreme', 80, 2787500),
(641, 883, 'sancu', 455, 7975250),
(642, 883, 'xtreme', 20, 837500),
(643, 884, 'sancu', 715, 13449250),
(644, 885, 'sancu', 695, 11403590);

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
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`kode_saldo`, `kode_agen`, `kode_pembelian`, `kode_pembayaran_detail`, `tgl_perubahan`, `debet`, `kredit`, `nominal`, `keterangan`) VALUES
(520, 'agen021', 835, 0, '2018-07-11', 37611600, 0, 37611600, 'pembelian'),
(521, 'agen021', 0, 835, '2018-07-11', 0, 350000, 37261600, 'bonus pembelian 2018-07-11'),
(522, 'agen064', 836, 0, '2018-07-11', 38323912, 0, 38323912, 'pembelian'),
(523, 'agen064', 0, 836, '2018-07-11', 0, 350000, 37973912, 'bonus pembelian 2018-07-11'),
(524, 'agen012', 837, 0, '2018-07-11', 3702700, 0, 3702700, 'pembelian'),
(525, 'agen021', 0, 45, '2018-07-12', 0, 11335000, 25926600, 'bca 10 juli 11335000'),
(526, 'agen021', 0, 46, '2018-07-12', 0, 1125000, 24801600, 'bca 10 juli 1125000'),
(527, 'agen021', 0, 47, '2018-07-12', 0, 24079350, 722250, 'bca 10 juli 24079350'),
(528, 'agen012', 0, 48, '2018-07-11', 0, 3609100, 93600, 'mandiri 10 juli 3609100'),
(529, 'agen064', 0, 49, '2018-07-10', 0, 5000000, 32973912, 'bca 10 juli 5jt'),
(530, 'agen064', 0, 50, '2018-07-11', 0, 4000000, 28973912, 'bca 11 juli 4jt'),
(531, 'agen072', 838, 0, '2018-07-11', 24772000, 0, 24772000, 'pembelian'),
(532, 'agen072', 0, 838, '2018-07-11', 0, 350000, 24422000, 'bonus pembelian 2018-07-11'),
(533, 'agen072', 0, 52, '2018-07-10', 0, 800000, 23622000, 'mandiri 10 juli 800rb'),
(534, 'agen072', 0, 53, '2018-07-11', 0, 23012625, 609375, 'mandiri 10 juli 23,012,625'),
(535, 'agen057', 839, 0, '2018-07-12', 2562300, 0, 2562300, 'pembelian'),
(536, 'agen057', 0, 839, '2018-07-12', 0, 700000, 1862300, 'bonus pembelian 2018-07-12'),
(537, 'agen057', 0, 55, '2018-07-12', 0, 1839350, 22950, 'mandiri 12 juli 1,839,350'),
(538, 'agen029', 0, 0, '2018-07-13', 25524300, 0, 25524300, 'Saldo Awal per 13 Juli 2018'),
(539, 'agen029', 840, 0, '2018-07-12', 2432600, 0, 27956900, 'pembelian'),
(540, 'agen029', 0, 840, '2018-07-12', 0, 300000, 27656900, 'bonus pembelian 2018-07-12'),
(543, 'agen022', 842, 0, '2018-07-12', 9334900, 0, 9334900, 'pembelian'),
(544, 'agen022', 0, 842, '2018-07-12', 0, 300000, 9034900, 'bonus pembelian 2018-07-12'),
(545, 'agen047', 843, 0, '2018-07-12', 22817650, 0, 22817650, 'pembelian'),
(546, 'agen062', 844, 0, '2018-07-12', 11837375, 0, 11837375, 'pembelian'),
(548, 'agen064', 0, 59, '2018-07-13', 0, 8000000, 20973912, 'BCA 13 juli 8jt'),
(550, 'agen022', 0, 61, '2018-07-12', 0, 1362500, 7672400, 'mandiri 12 juli 1,362,500'),
(551, 'agen022', 0, 62, '2018-07-12', 0, 7520600, 151800, 'mandiri 12 juli 7,520,600'),
(552, 'agen062', 0, 63, '2018-07-13', 0, 8000000, 3837375, 'mandiri 13 juli 8jt'),
(553, 'agen062', 0, 64, '2018-07-13', 0, 1787500, 2049875, 'mandiri 13 juli 1,787,500'),
(558, 'agen009', 847, 0, '2018-07-12', 1817200, 0, 1817200, 'pembelian'),
(559, 'agen009', 0, 68, '2018-07-12', 0, 1760500, 56700, 'mandiri 12 juli 1,760,500. '),
(560, 'agen088', 848, 0, '2018-07-13', 27504280, 0, 27504280, 'pembelian'),
(561, 'agen088', 0, 848, '2018-07-13', 0, 1050000, 26454280, 'bonus pembelian 2018-07-13'),
(562, 'agen088', 0, 70, '2018-07-12', 0, 25810000, 644280, 'mandiri 12 juli 25,810,000'),
(563, 'agen088', 849, 0, '2018-07-13', 16943230, 0, 17587510, 'pembelian'),
(564, 'agen088', 849, 0, '2018-07-13', 0, 350000, 17237510, 'bonus pembelian 2018-07-13'),
(565, 'agen088', 0, 72, '2018-07-12', 0, 16182000, 1055510, 'mandiri 12 juli 16,182,000'),
(566, 'agen069', 850, 0, '2018-07-13', 5679970, 0, 5679970, 'pembelian'),
(571, 'agen069', 0, 77, '2018-07-13', 0, 2900000, 2779970, 'mandiri 13 juli 2,9jt'),
(572, 'agen069', 0, 78, '2018-07-13', 0, 2525000, 254970, 'mandiri 13 juli 2,525,000'),
(573, 'agen024', 851, 0, '2018-07-13', 16269500, 0, 16269500, 'pembelian'),
(574, 'agen024', 0, 851, '2018-07-13', 0, 350000, 15919500, 'bonus pembelian 2018-07-13'),
(575, 'agen024', 0, 80, '2018-07-13', 0, 16469750, -550250, 'mandiri 13 juli 16,469,750'),
(576, 'agen030', 852, 0, '2018-07-14', 2310250, 0, 2310250, 'pembelian'),
(577, 'agen074', 853, 0, '2018-07-14', 13213200, 0, 13213200, 'pembelian'),
(578, 'agen074', 0, 853, '2018-07-14', 0, 300000, 12913200, 'bonus pembelian 2018-07-14'),
(579, 'agen019', 854, 0, '2018-07-14', 1671150, 0, 1671150, 'pembelian'),
(580, 'agen061', 855, 0, '2018-07-14', 1230000, 0, 1230000, 'pembelian'),
(581, 'agen019', 0, 82, '2018-07-13', 0, 1616650, 54500, 'bca 13 juli 1616650'),
(582, 'agen061', 0, 83, '2018-07-16', 0, 1230000, 0, 'mandiri 16 juli 1230000'),
(583, 'agen046', 856, 0, '2018-07-14', 14071700, 0, 14071700, 'pembelian'),
(584, 'agen046', 0, 856, '2018-07-14', 0, 300000, 13771700, 'bonus pembelian 2018-07-14'),
(585, 'agen046', 0, 85, '2018-07-14', 0, 4650000, 9121700, 'mandiri 14 juli 4,650,000'),
(586, 'agen061', 857, 0, '2018-07-14', 15494150, 0, 15494150, 'pembelian'),
(587, 'agen061', 0, 86, '2018-07-16', 0, 10000000, 5494150, 'mandiri 16 juli 10jt'),
(588, 'agen079', 858, 0, '2018-07-14', 11344500, 0, 11344500, 'pembelian'),
(589, 'agen079', 0, 858, '2018-07-14', 0, 300000, 11044500, 'bonus pembelian 2018-07-14'),
(590, 'agen079', 0, 88, '2018-07-14', 0, 11044500, 0, 'mandiri 14 juli 11,044,500'),
(591, 'agen075', 859, 0, '2018-07-14', 6235700, 0, 6235700, 'pembelian'),
(592, 'agen075', 0, 859, '2018-07-14', 0, 300000, 5935700, 'bonus pembelian 2018-07-14'),
(593, 'agen075', 0, 90, '2018-07-13', 0, 5818250, 117450, 'MANDIRI 13 juli 5,818,250 '),
(594, 'agen009', 0, 91, '2018-07-13', 0, 56700, 0, 'mandiri 13 juli 56700'),
(595, 'agen009', 860, 0, '2018-07-14', 8852610, 0, 8852610, 'pembelian'),
(596, 'agen009', 0, 92, '2018-07-14', 0, 8618250, 234360, 'mandiri 14 juli 8,618,250.'),
(597, 'agen036', 861, 0, '2018-07-14', 25484550, 0, 25484550, 'pembelian'),
(598, 'agen015', 862, 0, '2018-07-13', 1037500, 0, 1037500, 'pembelian'),
(599, 'agen015', 863, 0, '2018-07-14', 713250, 0, 1750750, 'pembelian'),
(600, 'agen015', 864, 0, '2018-07-13', 702500, 0, 2453250, 'pembelian'),
(601, 'agen015', 865, 0, '2018-07-14', 68229770, 0, 70683020, 'pembelian'),
(602, 'agen015', 0, 93, '2018-07-14', 0, 1037500, 69645520, 'bca 14 juli 1037500'),
(603, 'agen015', 0, 94, '2018-07-14', 0, 713250, 68932270, 'bca 14 juli 713250'),
(604, 'agen015', 0, 95, '2018-07-14', 0, 702500, 68229770, 'bca 14 juli 702500'),
(605, 'agen015', 0, 96, '2018-07-14', 0, 563500, 67666270, 'bca 14 juli 563500'),
(606, 'agen075', 0, 97, '2018-07-16', 0, 117450, 0, 'mandiri 16 juli 117,450'),
(607, 'agen074', 0, 98, '2018-07-17', 0, 12658200, 255000, 'bca 17 juli 12658200'),
(608, 'agen030', 0, 99, '2018-07-15', 0, 985000, 1325250, 'bca 15 juli 985,000'),
(609, 'agen030', 0, 100, '2018-07-15', 0, 1260000, 65250, 'bca 15 juli 1,260,000'),
(610, 'agen009', 866, 0, '2018-07-16', 3279660, 0, 3514020, 'pembelian'),
(611, 'agen009', 0, 101, '2018-07-17', 0, 3430860, 83160, ''),
(612, 'agen036', 867, 0, '2018-07-16', 4716500, 0, 30201050, 'pembelian'),
(613, 'agen015', 868, 0, '2018-07-16', 325000, 0, 67991270, 'pembelian'),
(614, 'agen015', 869, 0, '2018-07-16', 225000, 0, 68216270, 'pembelian'),
(615, 'agen057', 870, 0, '2018-07-16', 2192500, 0, 2215450, 'pembelian'),
(616, 'agen057', 0, 102, '2018-07-14', 0, 2040250, 175200, 'mandiri 14 juli 2,040,250'),
(617, 'agen057', 871, 0, '2018-07-16', 2217500, 0, 2392700, 'pembelian'),
(618, 'agen057', 0, 103, '2018-07-14', 0, 2217500, 175200, 'mandiri 14 juli 2,217,500'),
(619, 'agen064', 872, 0, '2018-07-16', 6552040, 0, 27525952, 'pembelian'),
(620, 'agen064', 0, 104, '2018-07-16', 0, 5000000, 22525952, 'bca 16 juli 5jt'),
(621, 'agen026', 873, 0, '2018-07-16', 9718725, 0, 9718725, 'pembelian'),
(622, 'agen026', 0, 105, '2018-07-14', 0, 2700000, 7018725, 'bca 14 juli 2,7jt'),
(623, 'agen010', 874, 0, '2018-07-17', 32214750, 0, 32214750, 'pembelian'),
(624, 'agen010', 0, 874, '2018-07-17', 0, 650000, 31564750, 'bonus pembelian 2018-07-17'),
(625, 'agen024', 875, 0, '2018-07-17', 11939450, 0, 11389200, 'pembelian'),
(626, 'agen024', 875, 0, '2018-07-17', 0, 300000, 11089200, 'bonus pembelian 2018-07-17'),
(627, 'agen024', 0, 108, '2018-07-16', 0, 7322750, 3766450, 'mandiri 16 juli 7,322,750'),
(628, 'agen024', 0, 109, '2018-07-16', 0, 3690000, 76450, 'mandiri 16 juli 3,690,000'),
(629, 'agen028', 876, 0, '2018-07-17', 3180870, 0, 3180870, 'pembelian'),
(630, 'agen028', 0, 110, '2018-07-17', 0, 1078000, 2102870, 'bca 17 juli 1078000'),
(631, 'agen028', 0, 111, '2018-07-18', 0, 1100000, 1002870, 'bca 18 juli 1,1jt'),
(632, 'agen070', 877, 0, '2018-07-17', 4197450, 0, 4197450, 'pembelian'),
(633, 'agen070', 0, 112, '2018-07-17', 0, 4024650, 172800, 'mandiri 17 juli 4,024,650'),
(634, 'agen032', 878, 0, '2018-07-17', 7768000, 0, 7768000, 'pembelian'),
(635, 'agen032', 0, 113, '2018-07-16', 0, 4000000, 3768000, 'mandiri 16 juli 4jt'),
(636, 'agen015', 0, 114, '2018-07-18', 0, 325000, 67891270, 'mandiri 18 juli 325,000'),
(637, 'agen015', 0, 115, '2018-07-18', 0, 225000, 67666270, 'bca 18 juli 225rb'),
(638, 'agen033', 879, 0, '2018-07-18', 19297310, 0, 19297310, 'pembelian'),
(639, 'agen033', 0, 879, '2018-07-18', 0, 300000, 18997310, 'bonus pembelian 2018-07-18'),
(640, 'agen033', 0, 117, '2018-07-17', 0, 5000000, 13997310, 'bca 17 juli 5jt'),
(643, 'agen023', 881, 0, '2018-07-18', 12017750, 0, 12017750, 'pembelian'),
(644, 'agen023', 0, 881, '2018-07-18', 0, 300000, 11717750, 'bonus pembelian 2018-07-18'),
(645, 'agen069', 882, 0, '2018-07-18', 6806750, 0, 7061720, 'pembelian'),
(646, 'agen069', 0, 120, '2018-07-18', 0, 3995000, 3066720, 'mandiri 18 juli 3,995,000'),
(647, 'agen007', 883, 0, '2018-07-18', 8812750, 0, 8812750, 'pembelian'),
(648, 'agen007', 0, 883, '2018-07-18', 0, 300000, 8512750, 'bonus pembelian 2018-07-18'),
(649, 'agen007', 0, 122, '2018-07-19', 0, 8099750, 413000, 'mandiri 19 juli 8,099,750'),
(650, 'agen011', 884, 0, '2018-07-18', 13449250, 0, 13449250, 'pembelian'),
(651, 'agen011', 0, 123, '2018-07-17', 0, 12833300, 615950, 'mandiri 17 juli 12,833,300'),
(652, 'agen064', 885, 0, '2018-07-18', 11403590, 0, 33929542, 'pembelian'),
(653, 'agen064', 885, 0, '2018-07-18', 0, 300000, 33629542, 'bonus pembelian 2018-07-18'),
(654, 'agen046', 0, 125, '2018-07-19', 0, 1450000, 7671700, 'mandiri 19 juli 1,450,000'),
(655, 'agen064', 0, 126, '2018-07-19', 0, 1552040, 32077502, 'BCA 19 juli 1552040'),
(656, 'agen064', 0, 127, '2018-07-19', 0, 1000000, 31077502, 'bca 19 juli 1jt');

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
  MODIFY `kode_bonus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  MODIFY `kode_bonus_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;

--
-- AUTO_INCREMENT for table `history_delete`
--
ALTER TABLE `history_delete`
  MODIFY `kode_delete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `kode_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  MODIFY `kode_pembayaran_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kode_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=886;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `kode_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=645;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `kode_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

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
