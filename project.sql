-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Des 2018 pada 00.34
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(11) NOT NULL,
  `kategori_artikel` varchar(50) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `desk_artikel` text NOT NULL,
  `isi_artikel` text NOT NULL,
  `sumber_artikel` varchar(100) NOT NULL,
  `user_staff` varchar(30) DEFAULT NULL,
  `user_ukm` varchar(30) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `kategori_artikel`, `judul_artikel`, `desk_artikel`, `isi_artikel`, `sumber_artikel`, `user_staff`, `user_ukm`, `image`) VALUES
(27, 'Bisnis', 'UKM Naik Kelas Sadar Legalitas', 'UKM Naik Kelas Sadar Legalitas ', 'Alhamdulillah acara Bincang Bisnis UKM: Meningkatkan Daya Saing dengan Izin Edar yang diselenggarakan pada Kamis, 8 November 2018 oleh UKMIndonesia.id bersama Uniqorn CoWorking Space yang disponsori oleh Bank DBS berlangsung lancar. Peserta yang antusias membuat Ibu Dewi Meisari sebagai moderator merinding bahagia karena biasanya yang "kepo" urusan perizinan ini sedikit banget. Tapi di Bincang Bisnis UKM kali ini, sesi tanya jawab sampai 3 termin dan per termin ada 4 orang yang bertanya.\r\n\r\nBerikut ini beberapa kasus menarik yang dirangkum oleh Ibu Dewi Meisari, diantaranya:\r\n\r\nTerkait Beras Analog (hasil pemrosesan beberapa biji-bijian seperti jagung dan lain-lain, menjadi bulir-bulir yang bentuknya seperti beras) dan black garlic, yang membuat BPOM harus menjadikannya PR - apakah produk seperti ini digolongkan sebagai pangan segar yang pengawasannya berada di Kementerian Pertanian, atau di BPOM yang berwenang atas produk pangan olahan.\r\nBahwa kalau suatu produk pangan di LABELnya mengandung klaim atas khasiat tertentu dan kadar herbal berkhasiatnya tinggi (bukan sekedar untuk memberi nuansa rasa tapi untuk khasiat), pengawasannya langsung pindah dari Urusan Pangan Olahan (BPOM MD) ke Obat Tradisional (BPOM TR).\r\nSPP-IRT dari Dinkes setempat sekarang khusus diperuntukan bagi produk pangan saja dan semua minuman olahan (baik frozen maupun dengan bahan tambahan yang membuat masa simpannya bisa tahan lebih dari 7 hari) akan beralih ke BPOM.\r\nBanyak sekali informasi dan pengetahuan baru yang diperoleh dari Bincang Bisnis UKM ini. Insya Allah UKMIndonesia.id akan melanjutkan kolaborasi dengan BPOM RI untuk mewadahi proses pengurusan perizinan edar produk pangan, minuman, obat tradisional dan kosmetik yang memang tidak sederhana prosesnya. Ibarat kalau mau lulus ujian kenaikan kelas, kan memang harus belajar, baca buku dan latihan soal ya supaya bisa lulus?? Begitu pula kita pelaku UKM yang ingin naik kelas. Yuk semangat mengarungi perjalanan naik kelas kita sama-sama!!\r\n\r\nTerima kasih Ibu Dewi Meisari yang sudah menjadi moderator hingga acara berlangsung seru. Terima kasih kepada narasumber yang sudah berkenan berbagi informasi mengenai Izin Edar dengan sahabat UKM, yaitu :\r\n\r\nDra. Cendekia Sri Muwarni, Apt., Apt., MKM - Direktorat Registrasi Obat Tradisional, Suplemen Kesehatan dan Kosmetik BPOM RI. Unduh materi di sini.\r\nYeni Oktaviany, STP - Direktorat Registrasi Pangan Olahan BPOM RI. Unduh materi di sini.\r\nDr. Yuliandi, M. Kes - Kepala Bidang Sumber Daya Kesehatan Dinas Kesehatan Pemerintah Kota Depok. Unduh materi di sini.\r\nTerima kasih @orangeroomcs yang sudah mendesain publikasi Bincang Bisnis UKM & tim yang mendokumentasikan acara. Juga terima kasih kepada sahabat UKM atas partisipasi dan minatnya.\r\n\r\nNantikan ringkasan artikel & youtube-nya ya! Sampai jumpa di Bincang Bisnis UKM bulan depan!', 'https://www.ukmindonesia.id/baca-artikel/99', 'staff_001', NULL, '22c3914be990074985e6c1d3d1f4b2d5.JPG'),
(28, 'Pendidikan', 'Bagaimana Memulai Ekspor untuk Pemula?', 'Bagaimana Memulai Ekspor untuk Pemula?', 'UKM pasti sudah tidak asing lagi dengan istilah ekspor, kira-kira apa yang pertama kali muncul dipikiran kita ketika mendengar kata ekspor? Ekspor sering diasosiasikan sebagai suatu aktivitas pemasaran dalam bisnis dengan tahapan yang sulit. Jika pelaku usaha ditanyakan tentang ekspor, secara umum kebanyakan akan menjawab ongkos yang mahal, pandangan (mindset) bahwa berurusan dengan bea cukai sulit, hingga yang paling klasik yaitu ekspor harus dalam kuantitas yang banyak atau satu kontainer.\r\n\r\nDalam Permendag No.13/2012 tentang Ketentuan Umum bidang Ekspor, dijelaskan bahwa Ekspor adalah kegiatan mengeluarkan barang dari daerah pabean. Jadi, walau produk yang Anda kirim hanya dalam skala kecil (kurang dari 50 kg) dan selama semua dalam rangka transaksi (bukan sampel gratis atau sebuah barang yang dikirim dalam rangka misi kemanusiaan misalnya), maka sah secara hukum dan ketentuan yang berlaku bahwa Anda telah melakukan kegiatan ekspor.\r\n\r\nBanyak pula yang mengira bisnis skala UMKM identik dengan usaha kecil dan masih belum pantas untuk ekspor. Padahal UMKM yang sering dipandang kecil ini memiliki peran yang besar bagi perekonomian Indonesia. Namun untuk melakukan ekspor memang UMKM perlu memiliki legalitas dan badan usaha.\r\n\r\n\r\n\r\nEmpat tips memulai ekspor untuk pemula:\r\n\r\n1. Siapkan dokumen legalitas usaha untuk ekspor\r\n\r\nTerdapat empat syarat dokumen legalitas bagi eksportir, yaitu :\r\n\r\nSIUP (Surat Izin Perdagangan) oleh Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten/Kota\r\nTDP (Tanda Daftar Perusahaan) oleh Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu (DPMPTSP) Kabupaten/Kota\r\nNPWP (Nomor Pokok Wajib Pajak) oleh Kantor Pelayanan Pajak\r\nNIK (Nomor identitas Kepabeanan) oleh Ditjen Bea Cukai\r\nKecuali NPWP, beberapa daerah sudah menerapkan sistem online untuk ketiga dokumen di atas, dengan catatan berkas dan persyaratan yang diminta sudah lengkap. Tips untuk mempermudah proses ekspor yaitu sebaiknya semua informasi selaras, baik dari nama perusahaan, alamat perusahaan, dll karena terkadang lamanya proses disebabkan beberapa data dokumen satu dengan yang lain tidak sesuai/selaras.\r\n\r\nBila belum memiliki NIK, Anda tidak perlu khawatir karena Anda dapat menggunakan jasa undername yaitu meminjam bendera perusahaan lain yang telah memiliki NIK. Baik eksportir yang sudah memiliki NIK sendiri atau menggunakan undername, tidak akan berurusan dengan bea cukai secara langsung. Hal ini karena urusan bea cukai menjadi tugas forwarder, yaitu jasa yang akan eksportir pakai ketika mengirim barang melalui laut maupun udara.\r\n\r\n2. Siapkan dokumen ekspor\r\n\r\nDokumen ekspor yang utama\r\nInvoice (dibuat oleh eksportir)\r\nPacking list (dibuat oleh eksportir)\r\nBill of lading (dibuat shipping company bila laut / airway bill bila udara)\r\nDokumen tambahan\r\nCertificate of origin (Dinas Perdagangan dan Industri Kabupaten / Kota)\r\nCertificate of analysis (laboratorium)\r\nCertificate of Phytosanitary (badan karantina untuk produk tumbuhan)\r\nDokumen tambahan lainnya sesuai permintaan pembeli\r\nDokumen yang diperlukan sebelum ekspor\r\nShipping Instruction dari eksportir ke Shipping line\r\nPEB (Pemberitahuan Ekspor Barang) dari eksportir\r\nSulit atau mudahnya melakukan ekspor relatif tergantung pada persyaratan yang perlu dipersiapkan seperti legalitas dan dokumen ekspor. Banyaknya dokumen ekspor yang diperlukan tergantung pada produk atau komoditas yang akan diekspor, prosedur di negara tujuan, dan permintaan dari pembeli yang pastinya berkaitan dengan perusahaannya.', 'https://www.ukmindonesia.id/baca-artikel/98', 'staff_001', NULL, 'c0c678621a78e1705a5be4a7a7f16358.JPG'),
(29, 'Ekonomi', 'Mengenal Content Marketing untuk Tingkatkan Penjualan', 'Mengenal Content Marketing untuk Tingkatkan Penjualan', 'Media sosial menawarkan banyak kemudahan bagi pelaku UKM untuk mempromosikan produk atau layanannya dengan lebih tepat sasaran, namun tetap cost effective alias murah meriah. Namun ditengah melimpahnya informasi yang diterima masyarakat melalui media sosial atau website dewasa ini, orang dapat dengan mudah melewati atau skip konten kita. Secara rata-rata, dikatakan bahwa otak kita hanya membutuhkan waktu selama 1,7 detik untuk secara cepat menilai gambar (media sosial) atau judul konten (jika konten berupa blog atau artikel di website) dan memutuskan untuk klik atau tidak.\r\n\r\nSituasi seperti inilah yang membuat seni menyusun konten untuk di posting melalui media sosial atau website atau kanal digital lainnya, menjadi tema yang semakin penting untuk kita ketahui.\r\n\r\nSebagai bentuk pengenalan awal, pada 6 September 2018 lalu ukmindonesia menyelenggarakan program rutin bulanan Bincang Bisnis UKM yang mengangkat tema tentang content marketing. Pada hari itu hadir beberapa narasumber yang menawarkan sudut pandang yang berbeda, yaitu Mas Aryo Priambodho (managing director coconut Indonesia, facebook affiliated), Rizky Ardy Nugroho (Owner Honey to the Bee 3D Cake, dan selebgram @mizter.popo), dan Muliandy Nasution (Managing Director, Fath Capital). Berikut beberapa poin-poin utama yang penting bagi kita untuk berkenalan dengan Content Marketing.\r\n\r\n\r\nContent Marketing tidak sama dengan Iklan\r\n\r\nMas Aryo memulai sharingnya dengan menekankan bahwa content marketing itu berbeda dengan iklan. Kalau dari berbagai literatur, memang dikatakan bahwa iklan tradisional itu umumnya dibuat untuk meyakinkan konsumen agar membeli (orientasi jangka pendek), sehingga cukup banyak yang mengandung pesan-pesan self-claim yang misalnya mengatakan â€œkami produk terbaik nomor 1, kami yang pertama, dllâ€. Sementara content marketing dibuat untuk membangun hubungan dengan konsumen (orientasi jangka panjang).', 'https://www.ukmindonesia.id/baca-artikel/97', 'staff_001', NULL, 'bc1cce0d05a59c6b6c5eef028e21d327.JPG'),
(30, 'Pendidikan', 'â€‹Tips Mengurus Perizinan dan Legalitas Usaha bagi UMKM', 'â€‹Tips Mengurus Perizinan dan Legalitas Usaha bagi UMKM', 'Para pelaku UMKM saat akan mulai mengurus perizinan seringkali bertanya-tanya harus dimulai dari mana ya? Izin apa yang harus diurus dahulu? Apakah setiap urus perizinan itu gratis dan tidak dikenakan retribusi?\r\n<br><br>\r\nAgar UMKM mendapatkan gambaran dalam mengurus perizinan dan legalitas usaha berikut tips terkait perizinan dan legalitas usaha:\r\n<br><br>\r\nKalau bergerak di bidang produksi makanan, bisa prioritaskan mendapatkan PIRT dulu, agar produknya bisa dipasarkan secara luas. Agar bisa PIRT, coba utamakan untuk produksi makanan yang tidak perlu SUSU Segar (kalau susu bubuk boleh), tidak pakai bahan pengawet, tidak frozen, dan tidak pakai alkohol. Karena kalau pakai bahan-bahan di atas, umumnya Dinas Kesehatan setempat tidak akan mau mengeluarkan sertifikat PIRT, dan akan dirujuk mengurus Sertifikat BPOM MD, yang mengurusnya lebih kompleks lagi karena fasilitas produksi yang ada harus sesuai dengan standar Good Manufacturing Practice (GMP).\r\nKalau bergerak di bidang perdangangan - misalnya jualan online, jualan jasa, dll - sebaiknya informal dulu juga tidak apa-apa sampai Anda merasa yakin ingin serius membesarkan usaha dan ingin menggalang dana modal jumlah besar (misalnya di atas Rp200 juta), yang membutuhkan perizinan. Sekarang, membangun citra toko tidak mesti harus pakai perizinan, bisa pakai media sosial yang dikelola dengan baik (pilih foto yang bagus, bikin narasi yang menarik) konsumen akan memberikan merespon positif juga.\r\nKalau bergerak di bidang jasa/perdagangan yang biasanya dibayar belakangan oleh klien (misalnya 60 hari setelah jasa diselesaikan baru dananya masuk ke rekening kita), ini bisa mencoba peluang untuk mendapatkan invoice financing dari FinTech, seperti modalku.co.id, pinjam.id. Umumnya, Fintech menawarkan prosedur yang lebih mudah daripada perbankan.\r\n<br><br>\r\nPerizinan dan legalitas usaha penting bagi UMKM sehingga UMKM dapat mengakses pendanaan atau peluang-peluang usaha lainnya.\r\n<br><br>\r\nUntuk membaca dan mengetahui pentingnya perizinan dan legalitas usaha bagi UMKM yang ingin Naik Kelas silahkan klik disini.', 'https://www.ukmindonesia.id/baca-artikel/90', NULL, 'Green Homes', '74518772aafb6085256ea622743dd622.JPG'),
(31, 'Kesehatan', 'hidup sehat cut', 'assafsafsa', 'dsfdsafdsa', 'www.ukm.com', NULL, 'Toko topher', 'c1e3725fb840e6666798bccf00643f06.jpg'),
(32, 'Ilmiah', 'edit cobaan', 'sajfklsafsaf', 'safsafsafsafasdasd', 'admin', 'staff_001', NULL, '0a3459df990212ed6fb7bcae01342b28.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `image` varchar(200) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kmdt-prod`
--

CREATE TABLE IF NOT EXISTS `kmdt-prod` (
`id_kmdt-prod` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_komoditas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kmdt-prod`
--

INSERT INTO `kmdt-prod` (`id_kmdt-prod`, `id_produk`, `id_komoditas`) VALUES
(9, 77, 14),
(10, 78, 15),
(11, 79, 15),
(12, 80, 15),
(17, 82, 14),
(18, 83, 16),
(19, 84, 15);

--
-- Trigger `kmdt-prod`
--
DELIMITER //
CREATE TRIGGER `apusProduk` AFTER DELETE ON `kmdt-prod`
 FOR EACH ROW DELETE FROM produk
    WHERE id_produk = old.id_produk
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE IF NOT EXISTS `komoditas` (
`id_kmdt` int(11) NOT NULL,
  `judul_kmdt` varchar(50) NOT NULL,
  `deskripsi_kmdt` text NOT NULL,
  `gambar_kmdt` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`id_kmdt`, `judul_kmdt`, `deskripsi_kmdt`, `gambar_kmdt`) VALUES
(14, 'Tepungs', 'Tepungs', 'ca47c15a8f4dcd594c4692818812c21d.jpg'),
(15, 'Kayu jati', 'Kayu jati asli', 'c10f2c87e817cf533219838f4713328e.jpg'),
(16, 'aer', 'sfsafasfcxvxcvsf', '5139cc89ecd403684167f6d40179c4ce.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultan`
--

CREATE TABLE IF NOT EXISTS `konsultan` (
`id_konsultan` int(11) NOT NULL,
  `nama_konsultan` varchar(40) NOT NULL,
  `isi_konsultan` varchar(10000) NOT NULL,
  `kategori_konsultan` varchar(30) NOT NULL,
  `harga_konsultan` int(11) NOT NULL,
  `foto` text NOT NULL,
  `user_staff` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsultan`
--

INSERT INTO `konsultan` (`id_konsultan`, `nama_konsultan`, `isi_konsultan`, `kategori_konsultan`, `harga_konsultan`, `foto`, `user_staff`) VALUES
(25, 'Jasa Membuat Mobile App Sendiri', 'T. Compro Kotak Inovasi dapat melayani UMKM yang ingin memiliki mobile app sendiri dan bisa diunduh dari Google Playstore dan App Store (apabila memenuhi kriteria dan dinyatakan lolos oleh Apple).\r\n<br><br>\r\nPT. Compro Kotak Inovasi didirikan oleh Andrie Wongso dan Prasetio Erlimus, memiliki visi menjadi perusahaan terbaik untuk memberdayakan manusia dan bisnis dengan memanfaatkan perkembangan teknologi digital.\r\n<br><br>\r\nCompro Mobile App Builder dirancang menjadi sebuah platform (native app-based) untuk membuat mobile application bagi siapa pun, tanpa harus belajar dan tahu bahasa pemrograman atau coding. Kami membuat sebuah metode dimana Anda cukup mengikuti 4 langkah sederhana dan dalam waktu kurang dari 7 hari, Anda sudah memiliki mobile app sendiri yang bisa diunduh dari Google Playstore dan App Store (apabila memenuhi kriteria dan dinyatakan lolos oleh Apple). Melalui platform ini, Anda bisa mendorong bisnis Anda masuk ke pasar online, menjangkau lebih banyak konsumen dan berinteraksi lebih baik dan lebih cepat dengan pelanggan setia maupun calon pelanggan Anda.\r\n<br><br>\r\nPT. Compro Kotak Inovasi memilih strategi pemasaran berjenjang atau kami menyebutnya network marketing, karena tiga hal utama. Pertama, sistem referensi dan kemitraan terbukti sangat membantu percepatan pertumbuhan bisnis di tanah air. Kedua, kami menawarkan peluang usaha kepada sebanyak mungkin orang dengan modal usaha dan tingkat resiko yang relatif kecil. Ketiga, sistem network marketing mendorong perusahaan untuk memberikan dukungan yang berkesinambungan kepada para mitra, baik dalam bentuk layanan pelanggan maupun terutama pembekalan atau pengembangan diri para mitra dengan berbagai pelatihan. Perusahaan percaya bahwa bila kapasitas (soft skill dan hard skill) para mitra dikembangkan, maka perusahaan pun akan ikut berkembang. Melalui pengembangan jaringan itulah perusahaan mampu menjangkau lebih banyak orang untuk memberikan berbagai pelatihan dan edukasi untuk memajukan bisnis mereka dengan memanfaatkan teknologi, yang dalam hal ini, PT Compro Kotak Inovasi sekarang ini fokus pada pengembangan produk beserta feature-feature yang saat ini belum ada dan dirasakan perlu dan dibutuhkan oleh pelanggan.\r\n<br><br>\r\nJasa Kami : <br>\r\n-Penyediaan template Mobile App Basic, advance, dan marketplace.<br>\r\n-Khusus paket Toko online (advance dan marketplace) Compro bekerja sama dengan Midtrans, menerima pembayaran dari jenis Kartu Debit dan Kredit (Visa dan Mastercard) yang terbit di Indonesia, Indomaret, T-Cash, Go-Pay, dan masih banyak lagi.<br>\r\n-Pelatihan cara membuat Mobile App. Training Center tersebar di 10 lokasi (Jakarta, Serpong, Medan, Batam, Pontianak, Bandung, Semarang, Surabaya, Bali, dan Makassar).', 'Branding/Pemasaran', 13500000, '08168f503811e0aee70e976a666ab848.JPG', 'staff_001'),
(26, 'Layanan Jasa Akuntansi', 'INSPIRASINDO merupakan penyedia Jasa Akuntansi di Indonesia yang sudah bersertifikasi dan dengan pengalaman lebih dari 15 tahun di bidangnya, akan membantu UMKM Indonesia untuk mendapatkan Laporan Keuangannya yang Tepat, Cepat dan Akurat.\r\n<br><br>\r\nAnda akan dibantu untuk memonitor Laporan Keuangan terbaru melalui gadget atau tablet dimana pun dan kapan pun secara mandiri sehingga Anda dapat fokus memperbesar perusahaan Anda tetapi tetap bisa mengelola Laporan Keuangan secara instan seperti membuka pesan di telepon genggam Anda\r\n<br><br>\r\n\r\n\r\nProduk Layanan Jasa Akuntansi:<br>\r\n-Laporan Posisi Keuangan (Neraca) Bulanan<br>\r\n-Laporan Laba Rugi dan Penghasilan Komprehensif Lain Bulanan<br>\r\n-Laporan Arus Kas Bulanan<br><br>\r\n\r\nBiaya:<br><br>\r\n\r\nBiaya Jasa Akuntansi ini yaitu sebesar Rp 999.000,- / bulan. Jika Anda tertarik menggunakan Jasa Akuntansi selama satu tahun maka Anda bisa mendapatkan harga yang lebih terjangkau yaitu hanya Rp 9.999.000,- / satu tahun.\r\n<br><br>\r\nBiaya ini sudah termasuk konsultasi gratis selama 1 jam per minggu melalui Whatsapp pesan ataupun telepon.\r\n<br><br>\r\nSetiap Pendapatan (Fee) yang Kami hasilkan dari Jasa Akuntansi dan Biaya Setup akan disisihkan sebagian kepada anak-anak yang tidak dapat bersekolah di Indonesia.\r\n', 'Branding/Pemasaran', 3000000, 'aeea5c2060b67ff0cd154b1a990f7183.jpg', 'staff_001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `pemilik_produk` varchar(30) NOT NULL,
  `kategori_produk` varchar(30) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `pemilik_produk`, `kategori_produk`, `gambar`) VALUES
(77, 'kebabue', ' Kebab asli dari Bapak Erdogan', 'AS', 'Makanan', 'kebab.jpg'),
(78, 'kursi teras anggur kayu jati', ' kursi teras anggur kayu jati asli mentahan termurah', 'Green Homes', 'Kriya', '9595e8969d4d1785347ce6d471b86abe.jpg'),
(79, 'Kursi Kayu Jongkok Serbaguna', ' Kursi Kayu Jongkok Serbaguna ini terbuat dari kayu Jati Belanda kualitas terbaik, anti rayap, ringan namun kuat, pengerjaan halus dan rapi, serta memiliki keistimewaan diserat kayunya yg terkesan Vintage (unik dan klasik).\r\nKursi ini tersedia dengan ukuran (PxLxT) : 25x25x20 cm. \r\n', 'Green Homes', 'Kriya', '2d03d8047191c848b4eb2f8e7e066f04.jpg'),
(80, 'Meja Kayu Lipat Serbaguna', ' Meja Kayu Lipat ini memiliki banyak fungsi, antara lain; Meja Laptop, Meja Belajar, Meja Baca, Meja Menulis, Menggambar, Meja makan, Meja TV, Meja Dispenser, dll.\r\n<br><br>\r\nBahan Kayu:<br>\r\nMeja Kayu Lipat ini terbuat dari bahan Kayu Jati Belanda. Kayu ini berasal dari kayu Kiefer/Oak/Pine yang dikenal kuat namun tidak terlalu berat, warnanya kuning muda, dan seratnya menimbulkan kesan unik tersendiri yang terletak pada alur urat dan mata kayunya, sehingga menimbulkan kesan vintage (unik dan klasik).\r\n<br><br>\r\nUkuran dan Desain:<br>\r\nUkuruan (P x L xT) : 65 x 40 x 29 cm dan 65 x 40 x 7 cm, ketika kaki dilipat.\r\nMeja ini didesain rapi dan kokoh, dengan material kayu yang tebal; Ketebalan kayu kaki meja 5 cm, Ketebalan kayu List Meja 2 cm dan Menggunakan Triplek kualitas terbaik dengan ketebalan 1 cm.', 'Green Homes', 'Kriya', '901f9464e65a96b1615ca31214ba1363.jpg'),
(82, 'Kebab Frozen mini ', ' qwdqwdqwd', 'AS', 'Makanan', 'd8b722df126d3dcfea7130e8849e0e12.png'),
(83, 'minuman update', ' asfasfsavxzvxvasfaf', 'Toko topher', 'Minuman', '6f8a46ffb49a9b110ae0e507623ad8d2.jpg'),
(84, 'minuman 2', ' afasfsaf', 'Toko topher', 'Minuman', 'a6e126c60aef4a542544810b201bd9de.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`id_program` int(11) NOT NULL,
  `user_staff` varchar(30) NOT NULL,
  `judul_program` varchar(50) NOT NULL,
  `isi_program` varchar(10000) NOT NULL,
  `harga_program` int(11) NOT NULL,
  `waktu_penyelanggaraan` datetime NOT NULL,
  `kategori_program` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `user_staff`, `judul_program`, `isi_program`, `harga_program`, `waktu_penyelanggaraan`, `kategori_program`, `foto`) VALUES
(94, 'staff_001', 'Kredit Usaha Rakyat (KUR) Ritel', 'Kredit Usaha Rakyat (KUR) adalah kredit/pembiayaan modal kerja dan/atau investasi kepada debitur individu/perseorangan, badan usaha dan/atau kelompok usaha yang produktif dan layak namun belum memiliki agunan tambahan atau agunan tambahan belum cukup. UMKM dan Koperasi yang diharapkan dapat mengakses KUR adalah yang bergerak di sektor usaha produktif antara lain: pertanian, perikanan dan kelautan, perindustrian, kehutanan, dan jasa keuangan simpan pinjam.\r\n<br>\r\nKredit Modal Kerja dan atau Kredit Investasi dengan plafon kredit sampai dengan Rp 500 juta yang diberikan kepada usaha mikro, kecil dan koperasi yang memiliki usaha produktif yang akan mendapat penjaminan dari Perusahaan Penjamin.\r\n<br>\r\nKUR Ritel BANK BRI adalah Kredit Modal Kerja dan atau Investasi yang diberikan kepada debitur yang memiliki usaha produktif dan layak dengan plafond > Rp 25 juta s.d Rp 500 juta per debitur.\r\n<br>\r\n<h6>Persyaratan<br>\r\n1. Mempunyai usaha produktif dan layak<br>\r\n2. Tidak sedang menerima kredit dari perbankan kecuali kredit konsumtif seperti KPR, KKB, dan, Kartu Kredit<br>\r\n3. Telah melakukan usaha secara aktif minimal 6 bulan<br>\r\n4. Memiliki Surat Izin Usaha Mikro dan Kecil (IUMK) atau surat izin usaha lainnya yang dapat dipersamakan<br>\r\n<h6>Detail Program<br>\r\n1. Besar kredit > Rp 25 juta - Rp 500 juta<br>\r\n2. Jenis kredit :<br>\r\nKredit Modal Kerja (KMK) jangka waktu maksimal 4 (empat) tahun<br>\r\nKredit Investasi (KI) jangka waktu maksimal 5 (lima) tahun<br>\r\n3. Suku bunga 7% efektif per tahun<br>\r\n4. Tidak dipungut biaya provisi dan administrasi<br>\r\n5. Agunan sesuai ketentuan bank<br>\r\n<h6>Tujuan Program\r\n1. Meningkatkan akses pembiayaan UMKM & K kepada Bank<br>\r\n2. Pembelajaran UMKM untuk menjadi debitur yang bankable sehingga dapat dilayani sesuai ketentuan komersial 3. perbankan pada umumnya (Sebagai embrio debitur komersial).<br>\r\n3. Diharapkan usaha yang dibiayai dapat tumbuh dan berkembang secara berkesinambungan.<br>\r\n<h6>Informasi Penting Lainnya<br>\r\nUMKM dan Koperasi dapat langsung mengakses KUR di Kantor Cabang atau Kantor Cabang Pembantu Bank Rakyat Indonesia atau Bank pelaksana KUR.<br>\r\n\r\n<h6>Target Peserta<br>\r\nMempunyai usaha produktif dan layak<br>\r\nTidak sedang menerima kredit dari perbankan kecuali kredit konsumtif seperti KPR, KKB, dan, Kartu Kredit<br>\r\nTelah melakukan usaha secara aktif minimal 6 bulan<br>\r\n<h6>Dokumen Pendaftaran<br>\r\nSurat Izin Usaha Mikro dan Kecil (IUMK) atau surat izin usaha lainnya yang dapat dipersamakan', 100000, '2018-12-20 13:02:00', 'Pendanaan', '10783dc6626e65daa1823e4669ac0b7e.jpg'),
(95, 'staff_001', 'Bagaimana Membangun Sebuah Brand yang Powerful di ', 'Apakah Anda merasa brand kuliner Anda tidak menarik bagi target market Anda? Sudah mengeluarkan dana banyak untuk membangun brand tapi tidak terasa efeknya? Ikuti sesi networking & learning bersama Gastropreneurship Community, mempelajari bagaimana cara membangun sebuah brand F&B yang powerful!\n\nAnda akan mendapatkan:\n\n-Networking bersama sesama pengusaha kuliner bermindset sukses<br>\n-Sharing session dari pengusaha kuliner yang berhasil MEMBANGUN BRAND F&B -nya & memenangkan hati customer<br>\n-Panel discussion tentang MEMBANGUN BRAND DI BISNIS KULINER oleh pakar & pengamat bisnis kuliner<br>\n\n\nGuest Speaker Sharing Session:\n\nJoseph Eko - Founder & Owner - TOT.AW & Lareia Cake<br>\n\nEko merupakan lulusan dari Imago - School of Modern Advertising. Membangun karir di Multi-National Agency dalam bidang creative, marketing & branding dan bekerja di beberapa perusahaan ternama di bidang media dan F&B. Eko kemudian memutuskan menjadi entrepreneur dengan membangun bisnis F&B yang terkenal dengan cake mie-nya TOT.AW. Eko juga menjalankan satu bisnis F&B bernama Lareia Resto & Cake yang sudah berada di beberapa kota dan bekerjasama juga dengan beberapa cafe/resto ternama. Terakhir, Eko berkolaborasi membangun sebuah branding consultant untuk membantu klien-kliennya mendapatkan hasil lewat metode yang insightful dan praktis.\n\nGuest Speaker Panel Discussion:\n\n1. David Handriyanto - Founder & Managing Director iClean\n\nSelama 25 tahun membangun karir di dunia cleaning and sanitation industry. Selama 10 tahun terakhir menjadi entrepreneur dengan membangun iCLEAN. Perusahaan yang saat ini telah berkembang menjadi perusahaan nasional yang memproduksi dan memasarkan berbagai jenis cleaning solution untuk industri, antara lain cafe & resto, hotel, laundry, hospital, food & beverage industry, cleaning service, dan lain- lain.\n\nSemangatnya dalam memimpin dan mengembangkan ide baru terbukti dengan banyaknya jumlah customer yang menggunakan produk iCLEAN sudah mencapai lebih dari 500 outlet di seluruh Indonesia. Berbekal juga dengan sertifikat kompetensi yang dimilikinya di bidang resto management, safety & leadership membuatnya ingin terus berkontribusi dengan berbagi pengetahuan dan pengalaman dengan para entrepreneur di Indonesia.\n\n2. Sovi Chan - Founder of Horekamall\n\nLifestyle & womanpreneur, itulah sosok Sovi dibalik kiprah karir nya di Indonesia. Keinginannya dalam membangun sebuah masyarakat maju yang memiliki gaya hidup sehat membuatnya menekuni bidang food & beverage di tanah air selama 10 tahun terakhir. Dirinya juga dipercaya untuk menjadi direktur pemasaran distributor terbesar mesin pengolahan makanan, pengemas, dan kitchen eguipment, yang telah berhasil membangun dan menghubungkan sebuah jaringan pelanggan yang terdiri atas lebih dari 100 pengusaha food & beverage di tanah air dalam sebuah komunitas yang solid. Pengalamannya yang banyak di dunia bisnis mendorongnya untuk ingin berbagi kepada sesama entrepreneur. ', 40000, '2018-10-18 13:00:00', 'Bincang Bisnis', 'b61f9cf63f6ed0b118e6aa1daf79a4fc.JPG'),
(96, 'staff_001', 'Indonesia Syariah Fair 2018', 'Mau mengembangkan bisnis tapi bingung harus bagaimana dan kemana? Yuk, hadiri acara INSYAF (Indonesia Syariah Fair).\r\n<br>\r\nDi sini UKM bisa langsung mengajukan pembiayaan kepada LPDB dan juga lembaga keuangan lainnya yang sudah terkoordinasi oleh LPDB.\r\n<br>\r\nMau tau detailnya? Penasaran berapa nilai modal dan hitungannya? Yuk hadiri acara ini. Karena kalian bisa mendapatkan banyak ilmu bisnis dari LPDB, MES, Bekraf, LKB dan LKBB, juga sponsor lainnya.\r\n<br>\r\nUntuk yang tidak mempunyai jaminan akan ada lembaga penjamin yang bekerja sama dengan LPDB untuk membantu UKM mendapatkan pinjaman dengan nilai yang maksimal dan angsuran yang ringan.\r\n<br>\r\nApa yang perlu dipersiapkan untuk mengajukan pembiayaan modal usaha dari LPDB Syariah?\r\n<br>\r\nUnduh (download) aplikasi di www.lpdb.id<br>\r\nBawa dan ajukan proposal ke acara INSYAF (Indonesia Syariah Fair 2018)<br>\r\nKunjungi booth LPDB di acara INSYAF<br>', 0, '2018-11-27 08:00:00', 'Pameran', '923cd9d09549fd866cf9e6edaf6b8813.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`uname`, `password`) VALUES
('staff_001', '12345'),
('staff_002', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `namaUKM` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `pemilik` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukm`
--

INSERT INTO `ukm` (`namaUKM`, `deskripsi`, `pemilik`, `alamat`, `no_telp`, `gambar`) VALUES
('AS', 'AS ', 'eky', 'Vila Dago Alam Asri 3', 2147483647, '257c09a7b83c47e1b9521fae9bf2101e.png'),
('Green Homes', 'Perusahaan yang menjual interior berdasarkan kayu asli', 'eky', 'Bekasi Timur J2/91', 2147483647, 'b72418ac3748afffc490ed45c2896ffe.jpg'),
('jagungBerkualitas', 'Ini jagung bagus banget loh', 'desabojong12', '', 0, ''),
('KristoUKM', 'UKM yang punya kristo\r\n', 'kristo111', 'ddasd', 0, 'f53c3727a2825e1433af3b0890ed2ed1.jpg'),
('Toko topher', 'TOpher\r\n', 'kristo', 'diananaamamna', 14124124, '31b49d15df11a72a54e52d2713f5081f.jpg'),
('toko topher 2', 'safjlkasfjaf', 'kristo', 'sfvxbxbsdgv', 141212525, '69516684a42e497cfa0686c61d8ce512.jpg'),
('waroeng octa', 'Warungku Duitku', 'oktanich', 'Dimana mana', 2147483647, '17a26bf50e65854870746f15876cf6b8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_mas` varchar(30) NOT NULL,
  `jk_mas` varchar(1) NOT NULL,
  `alamat_mas` varchar(50) NOT NULL,
  `kota_mas` varchar(50) NOT NULL,
  `notelp_mas` varchar(50) NOT NULL,
  `email_mas` varchar(50) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama_mas`, `jk_mas`, `alamat_mas`, `kota_mas`, `notelp_mas`, `email_mas`, `role`) VALUES
('123', '123', 'adas', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', '10ipa3.abdulrahman@gmail.com', 2),
('22', '22', '2222', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', 'pramudyadandy00@gmail.com', 2),
('andri123', '123456', 'Andri Kons', 'L', 'Jalan Tatata', 'Jakarta', '0541235123', 'afsdgasdgas@gmail.com', 2),
('bahlul123', 'anjing', '', '', '', '', '', '', 2),
('cyberneoo', '1234', 'Christopher', 'P', 'Jalan kebangkitan tidur nomor 3', 'Jakarta Tengah', '051238994123', 'cyberneoo@gmail.com', 2),
('desabojong12', '123', '', '', '', '', '', '', 2),
('eeeeeee', 'eeeeee', 'eeeeeeeeee', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', 'eeeeee', 1),
('eky', 'eky', 'ek', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', '123123', 2),
('gasd', 'das', 'asd', 'L', 'asd', '4SADF', 'GASD', 'GASDF', 1),
('halohalo', '123', 'halohalo', 'L', '', '', '', 'halohalo@gmail.com', 1),
('helo', 'helo', 'helo', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', 'helo', 1),
('koko', 'koko', '123123', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', '123123', 2),
('kristo', '123', 'Kristoper', 'L', 'Jjekarte ', 'Jkaarta', '081398720624', 'kristoper@gmail.com', 2),
('kristo111', '123', 'kristoper', 'L', 'Jl. Mawar Merah Raya No. 37 RT 006 RW 001 Pondok K', 'Jakarta', '144444', 'kristopher@gmail.com', 2),
('mantup', 'mantup', 'Abdul Rahman', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', '10ipa3.abdulrahman@gmail.com', 2),
('oktanich', '123', 'Oktaviansyah', 'L', 'Jalan Raya Taman Pagelaran Nomor 118', 'Bogor', '081398720624', 'oktanich@gmail.com', 2),
('rahman', 'rahman', 'rahman', 'L', 'Vila Dago Alam Asri 3', 'Tangerang Selatan', '0895332151170', '10ipa3.abdulrahman@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`), ADD KEY `user_ukm` (`user_ukm`), ADD KEY `user_staff` (`user_staff`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
 ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kmdt-prod`
--
ALTER TABLE `kmdt-prod`
 ADD PRIMARY KEY (`id_kmdt-prod`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
 ADD PRIMARY KEY (`id_kmdt`);

--
-- Indexes for table `konsultan`
--
ALTER TABLE `konsultan`
 ADD PRIMARY KEY (`id_konsultan`), ADD KEY `nama_konsultan` (`nama_konsultan`), ADD KEY `user_staff` (`user_staff`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`), ADD KEY `pemilik_produk` (`pemilik_produk`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD PRIMARY KEY (`id_program`), ADD KEY `user_staff` (`user_staff`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
 ADD PRIMARY KEY (`namaUKM`), ADD KEY `pemilik` (`pemilik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `kmdt-prod`
--
ALTER TABLE `kmdt-prod`
MODIFY `id_kmdt-prod` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
MODIFY `id_kmdt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `konsultan`
--
ALTER TABLE `konsultan`
MODIFY `id_konsultan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`user_ukm`) REFERENCES `ukm` (`namaUKM`),
ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`user_staff`) REFERENCES `staff` (`uname`);

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `kmdt-prod`
--
ALTER TABLE `kmdt-prod`
ADD CONSTRAINT `kmdt-prod_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_kmdt`),
ADD CONSTRAINT `kmdt-prod_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `konsultan`
--
ALTER TABLE `konsultan`
ADD CONSTRAINT `fk_staff` FOREIGN KEY (`user_staff`) REFERENCES `staff` (`uname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`pemilik_produk`) REFERENCES `ukm` (`namaUKM`);

--
-- Ketidakleluasaan untuk tabel `program`
--
ALTER TABLE `program`
ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`user_staff`) REFERENCES `staff` (`uname`);

--
-- Ketidakleluasaan untuk tabel `ukm`
--
ALTER TABLE `ukm`
ADD CONSTRAINT `ukm_ibfk_1` FOREIGN KEY (`pemilik`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
