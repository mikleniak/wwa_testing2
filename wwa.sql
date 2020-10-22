-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2019 pada 19.27
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_lengkap`, `email`, `password`) VALUES
(1, 'abi', 'Abraham Timotius', '', 'abi'),
(2, 'doni', 'Doni Ghazy', '', 'doni'),
(3, 'el', 'Imanuel Septian', '', 'anying'),
(4, 'lail', 'Lailatis Syarifah', 'lailatissyarifah@student.undip.ac.id', 'Lail123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `link` text NOT NULL,
  `id_kota` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `gambar1` varchar(225) NOT NULL,
  `gambar2` varchar(225) NOT NULL,
  `gambar3` varchar(225) NOT NULL,
  `gambar4` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `nama`, `alamat`, `deskripsi`, `link`, `id_kota`, `id_admin`, `gambar1`, `gambar2`, `gambar3`, `gambar4`) VALUES
(7, 'Rawa Pening', 'Kabupaten Semarang, Jawa Tengah, Indonesia', 'Rawa Pening (pening adalah salah satu varian bahasa Jawa untuk \"bening\") adalah danau alam di Kabupaten Semarang, Jawa Tengah. Dengan luas 2.670 hektare ia menempati wilayah Kecamatan Ambarawa, Bawen, Tuntang, dan Banyubiru.\r\n\r\nRawa Pening terletak di cekungan terendah lereng Gunung Merbabu, Gunung Telomoyo, dan Gunung Ungaran. Danau ini dangkal dan menjadi hulu bagi Sungai Tuntang.\r\nMenurut legenda, Rawa Pening terbentuk dari muntahan air yang mengalir dari bekas cabutan lidi yang dilakukan oleh Baru Klinthing. Cerita Baru Klinthing yang berubah menjadi anak kecil yang penuh luka dan berbau amis sehingga tidak diterima masyarakat dan akhirnya ditolong janda tua. Rawa ini digemari sebagai objek wisata pemancingan dan sarana olahraga air. Namun akhir-akhir ini, perahu nelayan bergerak pun sulit.\r\nDanau ini mengalami pendangkalan yang pesat. Pernah menjadi tempat mencari ikan, kini hampir seluruh permukaan rawa ini tertutup eceng gondok. Gulma ini juga sudah menutupi Sungai Tuntang, terutama di bagian hulu. Usaha mengatasi spesies invasif ini dilakukan dengan melakukan pembersihan serta pelatihan pemanfaatan eceng gondok dalam kerajinan, namun tekanan populasi tumbuhan ini sangat tinggi.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15830.503706084497!2d110.42457821502268!3d-7.283332765888139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70821b08023e17%3A0x2a027a7715de3a70!2sRw.%20Pening!5e0!3m2!1sid!2sid!4v1574182344027!5m2!1sid!2sid', 1, 1, '965926659.jpg', 'bukit-cinta-rawa-pening.jpg', 'menikmati-pemandangan-rawa-pening-dengan-lori-kereta-630x380.jpg', 'Rawa_Pening_Central_Java.jpg'),
(8, 'Borobudur', 'Kecamatan Borobudur, sekitar 3 km dari Kota Mungkid (ibukota Kabupaten Magelang, Jawa Tengah)', 'Borobudur (bahasa Jawa: ê¦•ê¦¤ê§€ê¦ê¦¶â€‹ê¦§ê¦«ê¦§ê¦¸ê¦ê¦¸ê¦‚, translit. Candhi Barabudhur) adalah sebuah candi Buddha yang terletak di Borobudur, Magelang, Jawa Tengah, Indonesia. Candi ini terletak kurang lebih 100 km di sebelah barat daya Semarang, 86 km di sebelah barat Surakarta, dan 40 km di sebelah barat laut Yogyakarta. Candi berbentuk stupa ini didirikan oleh para penganut agama Buddha Mahayana sekitar tahun 800-an Masehi pada masa pemerintahan wangsa Syailendra. Borobudur adalah candi atau kuil Buddha terbesar di dunia, sekaligus salah satu monumen Buddha terbesar di dunia.\r\n\r\nMonumen ini terdiri atas enam teras berbentuk bujur sangkar yang di atasnya terdapat tiga pelataran melingkar, pada dindingnya dihiasi dengan 2.672 panel relief dan aslinya terdapat 504 arca Buddha. Borobudur memiliki koleksi relief Buddha terlengkap dan terbanyak di dunia. Stupa utama terbesar teletak di tengah sekaligus memahkotai bangunan ini, dikelilingi oleh tiga barisan melingkar 72 stupa berlubang yang di dalamnya terdapat arca Buddha tengah duduk bersila dalam posisi teratai sempurna dengan mudra (sikap tangan) Dharmachakra mudra (memutar roda dharma).\r\n\r\nMonumen ini merupakan model alam semesta dan dibangun sebagai tempat suci untuk memuliakan Buddha sekaligus berfungsi sebagai tempat ziarah untuk menuntun umat manusia beralih dari alam nafsu duniawi menuju pencerahan dan kebijaksanaan sesuai ajaran Buddha. Para peziarah masuk melalui sisi timur dan memulai ritual di dasar candi dengan berjalan melingkari bangunan suci ini searah jarum jam, sambil terus naik ke undakan berikutnya melalui tiga tingkatan ranah dalam kosmologi Buddha. Ketiga tingkatan itu adalah KÄmadhÄtu (ranah hawa nafsu), Rupadhatu (ranah berwujud), dan Arupadhatu (ranah tak berwujud). Dalam perjalanannya para peziarah berjalan melalui serangkaian lorong dan tangga dengan menyaksikan tak kurang dari 1.460 panel relief indah yang terukir pada dinding dan pagar langkan.\r\n\r\nMenurut bukti-bukti sejarah, Borobudur ditinggalkan pada abad ke-14 seiring melemahnya pengaruh kerajaan Hindu dan Buddha di Jawa serta mulai masuknya pengaruh Islam.[6] Dunia mulai menyadari keberadaan bangunan ini sejak ditemukan 1814 oleh Sir Thomas Stamford Raffles, yang saat itu menjabat sebagai Gubernur Jenderal Inggris atas Jawa. Sejak saat itu Borobudur telah mengalami serangkaian upaya penyelamatan dan pemugaran (perbaikan kembali). Proyek pemugaran terbesar digelar pada kurun waktu 1975 hingga 1982 atas upaya Pemerintah Republik Indonesia dan UNESCO, kemudian situs bersejarah ini masuk dalam daftar Situs Warisan Dunia.\r\n\r\nBorobudur kini masih digunakan sebagai tempat ziarah keagamaan; tiap tahun umat Buddha yang datang dari seluruh Indonesia dan mancanegara berkumpul di Borobudur untuk memperingati Trisuci Waisak. Dalam dunia pariwisata, Borobudur adalah objek wisata tunggal di Indonesia yang paling banyak dikunjungi wisatawan.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.697418017639!2d110.20156261432435!3d-7.607868477309594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8cf009a7d697%3A0xdd34334744dc3cb!2sCandi%20Borobudur!5e0!3m2!1sid!2sid!4v1574182987885!5m2!1sid!2sid', 5, 1, '987d17a5-261a-42b5-8fbf-8e6bc9fc7910-1566530814274-9b29443d90d3d7a0356c6febc63afa6e.jpg', 'borobudur2-1024x683.jpg', 'liputan6-com-5c9d609495760e7bd362a373.jpg', 'misteri-jam-raksasa-di-candi-borobudur-mengungkap-matahari-yang-tak-selalu-terbit-di-timur.jpg'),
(12, 'Brown Canyon', 'Rowosari, Meteseh, Tembalang, Semarang', 'Grand Canyon adalah sebuah ngarai tebing-terjal yang menjadi salah satu icon di benua amerika, sedangkan di Indonesia sendiri ternyata memililiki tempat tak kalah indah grand canyon bernama Brown Canyon.\r\n\r\nBrown Canyon berada di 2 KM sebelah selatan TVRI Jawa Tengah â€“ Pucang Gading Mranggen, terdapat tebing-tebing tinggi yang sekilas menyerupai Grand Canyon. Tempat ini sedang ngehits diantara mereka yang hobi fotografi. Brown Canyon Semarang sebenarnya merupakan sebuah proyek galian yang sudah berumur 10 tahun lebih.\r\n\r\nSebenarnya brown canyon bukanlah tempat wisata melainkan sebuah perbukitan biasa, namun karena penambangan material yang dilakukan setiap hari selama bertahun-tahun ahirnya berubah wujud seperti layaknya grand canyon yang mempesona di Amerika.\r\nKeindahan panoramanya yang cantik membuat brown canyon ini menjadi salah satu obyek wisata dan tempat yang terbaik bagi para pecinta fotografi. Tebing â€“ tebing yang menjulang tinggi menjadikan pemandangan yang sangat menarik dan sayang untuk tidak dikunjungi.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5969491440082!2d110.48391721402166!3d-7.056553994903346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708e7e1d16e6c7%3A0x38cd451e8fbddbc4!2sBrown%20Canyon!5e0!3m2!1sid!2sid!4v1574231665327!5m2!1sid!2sid', 1, 1, 'Brown-Canyon-Semarang-1.jpg', 'Brown-Canyon-Semarang-3.png', 'f23fd2441ae2.jpg', 'Screenshot-2015-03-31-09.34.38.png'),
(13, 'Kepulauan Karimunjawa', 'Karimunjawa, Kemujan, Parang, Jepara', 'Karimunjawa adalah kepulauan di Laut Jawa yang termasuk dalam Kabupaten Jepara, Jawa Tengah. Dengan luas daratan Â±1.500 hektare dan perairan Â±110.000 hektare, Karimunjawa kini dikembangkan menjadi pesona wisata Taman Laut yang mulai banyak digemari wisatawan lokal maupun mancanegara.\r\n\r\nBerdasarkan legenda, Pulau Karimunjawa ditemukan oleh Sunan Muria. Legenda itu berkisah tentang Sunan Muria yang prihatin atas kenakalan putranya, Amir Hasan. Dengan maksud mendidik, Sunan Muria kemudian memerintahkan putranya untuk pergi ke sebuah pulau yang tampak \"kremun-kremun\" (kabur) dari puncak Gunung Muria agar si anak dapat memperdalam dan mengembangkan ilmu agamanya. Karena tampak \"kremun-kremun\" maka dinamakanlah pulau tersebut Pulau Karimun.\r\nSejak tanggal 15 Maret 2001, Karimunjawa ditetapkan oleh pemerintah Jepara sebagai Taman Nasional. Karimunjawa adalah rumah bagi terumbu karang, hutan bakau, hutan pantai, serta hampir 400 spesies fauna laut, di antaranya 242 jenis ikan hias. Beberapa fauna langka yang berhabitat disini adalah Elang Laut Dada Putih, penyu sisik, dan penyu hijau.\r\n\r\nTumbuhan yang menjadi ciri khas Taman Nasional Karimunjawa yaitu dewadaru (Crystocalyx macrophyla) yang terdapat pada hutan hujan dataran rendah.\r\n\r\nOmbak di Karimunjawa tergolong rendah dan jinak, dibatasi oleh pantai yang kebanyakan adalah pantai pasir putih halus.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254036.1493258434!2d110.2449952286941!3d-5.811136748853236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e710b2f2f047749%3A0x424831dbd201c7ff!2sKarimunjawa%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1574235683745!5m2!1sid!2sid', 3, 1, 'Blog_7-Kegiatan-Menarik-yang-Bisa-Dilakukan-di-Karimun-Jawa.jpg', 'hipwee-3-1-IslandHopping-By-paket_wisata_karimunjawa_murah-750x422.jpg', 'img_20180824102055_5b7f7997e5b77.jpg', 'keindahan-pulau-karimunjawa-jepara6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(3) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Semarang'),
(2, 'Salatiga'),
(3, 'Jepara'),
(4, 'Wonosobo'),
(5, 'Magelang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomen` int(5) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar1` varchar(225) NOT NULL,
  `gambar2` varchar(225) NOT NULL,
  `gambar3` varchar(225) NOT NULL,
  `gambar4` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomen`, `pengirim`, `nama_wisata`, `alamat`, `deskripsi`, `gambar1`, `gambar2`, `gambar3`, `gambar4`) VALUES
(1, 'lail', 'tes tes', 'tembalang', 'hahahha', '9s3f3kh.jpg', 'borobudur2-1024x683.jpg', 'ganteng.jpg', 'S__52756484.jpg'),
(2, 'kepo', 'itu loh', 'nggatau dimana', 'apa ya', '987d17a5-261a-42b5-8fbf-8e6bc9fc7910-1566530814274-9b29443d90d3d7a0356c6febc63afa6e.jpg', 'borobudur2-1024x683.jpg', 'Brown-Canyon-Semarang-1.jpg', ''),
(3, 't', 'tes tes', 'tembalang', '-', 'imgbin-computer-monitors-laptop-display-device-flat-panel-display-computer-screen-is-broken-AzKziZCqtyf36vfhtYNcVRJtE.jpg', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `id_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
