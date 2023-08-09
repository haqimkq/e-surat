-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2023 pada 17.11
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelayanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nm_golongan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nm_golongan`) VALUES
(1, 'Pembina Utama Muda ( IV/c )'),
(2, 'Pembina ( IV/a )'),
(3, 'Penata ( III/c )'),
(4, 'Penata Tk.I ( III/d )'),
(5, 'Penata Muda Tk.I ( III/b )');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
(2, 'ADMIN'),
(7, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_msy` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tmpt_lhr` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_msy`, `id_user`, `no_ktp`, `nama`, `tmpt_lhr`, `tgl_lhr`, `alamat`, `agama`, `jk`, `no_tlp`) VALUES
(22, 30, '630307092900321', 'Laila Andini', 'Banjarmasin', '2000-09-10', 'Jl. Jahri Jaleh Komp.Malken Temon No.01', 'Islam', 'Perempuan', '089980706651'),
(23, 31, '172368912391823', 'Bayu S', 'bjm', '2023-08-01', 'asbdhasd', 'islam', 'Laki-Laki', '91273123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `idNews` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `newsText` varchar(550) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`idNews`, `title`, `newsText`, `foto`, `tanggal`) VALUES
(12, 'REMBUK STUNTING ', 'STRATEGI PENAGANAN DAN PENCEGAHAN STUNTING KECAMATAN BANJARMASIN TIMUR TAHUN 2023 dibuka oleh Camat Banjarmasin Timur Dra.Hj.Rusdiana,M.AP yang di hadiri oleh unsur PKK ,Dasawisma,Kader KPM(Kader Pembangunan Manusia), RW, RT dan Tokoh masyarakat di wilayah Kecamatan Banjarmasin Timur selaku sebagai pemateri dari Dinas Kesehatan Kota Banjarmasin Hj.Ariati,AM.KEB. ', '../img/imgnews/photo1685957557.jpeg', '2023-05-15'),
(14, 'Forum Kota Banjarmasin', 'Silaturahmi dan Sosialisasi Perumda PALD Banjarmasin Bersama Tokoh Masyarakat Wilayah Kecamatan Kota Banjarmasin. \"Menyelamatkan Bumi dan Air Dengan Pengelolaan Sanitasi yang Baik untuk mencapai Kinerja Barasih wan Nyaman di Kota Banjarmasin Tahun 2023 di Aula Kecamatan Banjarmasin Timur.', '../img/imgnews/photo1685958361.jpeg', '2023-06-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `nm_pegawai` varchar(30) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(59) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `foto` varchar(55) NOT NULL,
  `instagram` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `id_jabatan`, `id_golongan`, `nm_pegawai`, `nip`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `jk`, `status`, `agama`, `no_tlp`, `foto`, `instagram`, `email`) VALUES
(20, 29, 7, 5, 'Lutfi Muhammad', '19670711 001 002', 'Banjarbaru', '1997-01-03', 'Jl. HKSN Komp MD No.17', 'Laki-Laki', 'Lajang', 'Islam', '085251238469', '../img/8b167af653c2399dd93b952a48740620.jpg', '@lutfi.muhammad', 'lutfi.muhammad@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `j_pelayanan` varchar(55) NOT NULL,
  `biaya` varchar(25) NOT NULL,
  `waktu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `j_pelayanan`, `biaya`, `waktu`) VALUES
(1, 'Legalisasi SKTM', 'Gratis', '30 Menit'),
(3, 'Legalisasi Surat Pengantar Nikah', 'Gratis', '60 Menit'),
(4, 'Legalisasi Susunan Keluarga', 'Gratis', '30 Menit'),
(5, 'Rekomendasi Dispensasi Nikah', 'Gratis', '1 Hari'),
(6, 'Legalisasi Proposal', 'Gratis', '1 Hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_lp` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `s_pernyataan` varchar(225) DEFAULT NULL,
  `s_permohonan` varchar(225) DEFAULT NULL,
  `ktp_p` varchar(225) DEFAULT NULL,
  `tgl` date NOT NULL,
  `statusAdmin` varchar(15) NOT NULL DEFAULT 'Proses',
  `statusCamat` varchar(15) NOT NULL DEFAULT 'Proses',
  `qrCode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_lp`, `id_msy`, `id_pelayanan`, `s_pernyataan`, `s_permohonan`, `ktp_p`, `tgl`, `statusAdmin`, `statusCamat`, `qrCode`) VALUES
(16, 22, 6, '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 2 (1).pdf', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '../img/imgpelayanan/8b167af653c2399dd93b952a48740620.jpg', '2023-08-01', 'Diterima', 'Diterima', '../img/imgpelayanan/hasil_qrcode (4).png'),
(17, 23, 6, '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 2 (1).pdf', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '../img/imgpelayanan/8b167af653c2399dd93b952a48740620.jpg', '2023-08-01', 'Proses', 'Proses', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qrcode`
--

CREATE TABLE `qrcode` (
  `idCode` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `namaTtd` varchar(39) NOT NULL,
  `nip` varchar(29) NOT NULL,
  `tanggalTtd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `qrcode`
--

INSERT INTO `qrcode` (`idCode`, `id_msy`, `id_pelayanan`, `namaTtd`, `nip`, `tanggalTtd`) VALUES
(11, 22, 4, 'Drs. Hj. Rusdiana, M.AP', '196709071990 2 001', '2023-08-02'),
(12, 22, 5, 'Drs. Hj. Rusdiana, M.AP ', '196709071990 2 001', '2023-08-03'),
(13, 22, 1, 'Drs. Hj. Rusdiana, M.AP ', '196709071990 2 001', '2023-08-02'),
(14, 22, 3, 'Drs. Hj. Rusdiana, M.AP', '196709071990 2 001', '2023-08-01'),
(15, 22, 6, 'Drs. Hj. Rusdiana, M.AP', '196709071990 2 001', '2023-08-02'),
(20, 23, 1, 'Drs. Hj. Rusdiana, M.AP', '091231 001292 00 1', '2023-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rdn`
--

CREATE TABLE `rdn` (
  `id_rdn` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `ktp_p` varchar(99) DEFAULT NULL,
  `kk_p` varchar(99) DEFAULT NULL,
  `s_kua` varchar(99) DEFAULT NULL,
  `tgl` date NOT NULL,
  `statusAdmin` varchar(19) NOT NULL DEFAULT 'Proses',
  `statusCamat` varchar(19) NOT NULL DEFAULT 'Proses',
  `qrCode` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rdn`
--

INSERT INTO `rdn` (`id_rdn`, `id_msy`, `id_pelayanan`, `ktp_p`, `kk_p`, `s_kua`, `tgl`, `statusAdmin`, `statusCamat`, `qrCode`) VALUES
(11, 22, 5, '../img/imgpelayanan/wxmceo7nudyy3zygvzb7.jpg', '../img/imgpelayanan/Untitled-design-21.jpg', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '2023-09-01', 'Diterima', 'Diterima', '../img/imgpelayanan/hasil_qrcode (1).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp`
--

CREATE TABLE `skp` (
  `idSkp` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tgl_kinerja` date NOT NULL,
  `nilai_skp` double DEFAULT NULL,
  `orientasi_pelayanan` double DEFAULT NULL,
  `komitmen` double DEFAULT NULL,
  `kerjasama` double DEFAULT NULL,
  `integritas` double DEFAULT NULL,
  `disiplin` double DEFAULT NULL,
  `nilai_perilaku_kerja` double DEFAULT NULL,
  `nilai_prestasi_kerja` double DEFAULT NULL,
  `status_verifikasi` varchar(19) NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skp`
--

INSERT INTO `skp` (`idSkp`, `id_pegawai`, `id_jabatan`, `tgl_kinerja`, `nilai_skp`, `orientasi_pelayanan`, `komitmen`, `kerjasama`, `integritas`, `disiplin`, `nilai_perilaku_kerja`, `nilai_prestasi_kerja`, `status_verifikasi`) VALUES
(33, 18, 7, '2023-07-05', 90, 90, 85, 85, 88, 90, 87.6, 89.04, 'Proses'),
(35, 20, 7, '2023-08-01', 100, 90, 99, 89, 91, 89.92, 91.78, 96.71, 'Diterima'),
(37, 20, 7, '2023-08-03', 80, 90, 80, 90, 77, 79, 83.2, 81.28, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpkecamatan`
--

CREATE TABLE `skpkecamatan` (
  `idSkpKec` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `tgl_kinerja` date NOT NULL,
  `nilai_skp` double DEFAULT NULL,
  `orientasi_pelayanan` double DEFAULT NULL,
  `komitmen` double DEFAULT NULL,
  `kerjasama` double DEFAULT NULL,
  `integritas` double DEFAULT NULL,
  `disiplin` double DEFAULT NULL,
  `nilai_perilaku_kerja` double DEFAULT NULL,
  `nilai_prestasi_kerja` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skpkecamatan`
--

INSERT INTO `skpkecamatan` (`idSkpKec`, `id_msy`, `tgl_kinerja`, `nilai_skp`, `orientasi_pelayanan`, `komitmen`, `kerjasama`, `integritas`, `disiplin`, `nilai_perilaku_kerja`, `nilai_prestasi_kerja`) VALUES
(33, 22, '2023-08-02', 90, 70, 76, 99, 99, 70, 82.8, 87.12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `s_sktm` varchar(225) DEFAULT NULL,
  `ktp` varchar(225) DEFAULT NULL,
  `kk` varchar(225) DEFAULT NULL,
  `s_pernyataan` varchar(225) DEFAULT NULL,
  `tgl` date NOT NULL,
  `statusAdmin` varchar(25) NOT NULL DEFAULT 'Proses',
  `statusCamat` varchar(19) NOT NULL DEFAULT 'Proses',
  `qrCode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_msy`, `id_pelayanan`, `s_sktm`, `ktp`, `kk`, `s_pernyataan`, `tgl`, `statusAdmin`, `statusCamat`, `qrCode`) VALUES
(17, 22, 1, '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '../img/imgpelayanan/8b167af653c2399dd93b952a48740620.jpg', '../img/imgpelayanan/Classic-Marvel-Superheroes.jpg', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 2 (1).pdf', '2023-08-01', 'Diterima', 'Diterima', '../img/imgpelayanan/hasil_qrcode (2).png'),
(18, 23, 1, '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '../img/imgpelayanan/8b167af653c2399dd93b952a48740620.jpg', '../img/imgpelayanan/Classic-Marvel-Superheroes.jpg', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 2 (1).pdf', '2023-08-01', 'Proses', 'Proses', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spn`
--

CREATE TABLE `spn` (
  `id_spn` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `spn` varchar(250) DEFAULT NULL,
  `ktp` varchar(250) DEFAULT NULL,
  `pas_foto` varchar(250) DEFAULT NULL,
  `akte_c` varchar(250) DEFAULT NULL,
  `sk` varchar(250) DEFAULT NULL,
  `skwn` varchar(250) DEFAULT NULL,
  `tgl` date NOT NULL,
  `statusAdmin` varchar(15) NOT NULL DEFAULT 'Proses',
  `statusCamat` varchar(19) NOT NULL DEFAULT 'Proses',
  `qrCode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `spn`
--

INSERT INTO `spn` (`id_spn`, `id_msy`, `id_pelayanan`, `spn`, `ktp`, `pas_foto`, `akte_c`, `sk`, `skwn`, `tgl`, `statusAdmin`, `statusCamat`, `qrCode`) VALUES
(53, 22, 3, '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '../img/imgpelayanan/wxmceo7nudyy3zygvzb7.jpg', '../img/imgpelayanan/Manzone.jpg', '', '', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 2 (1).pdf', '2023-08-01', 'Diterima', 'Diterima', '../img/imgpelayanan/hasil_qrcode (3).png'),
(54, 23, 3, '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 1 (1).pdf', '../img/imgpelayanan/8b167af653c2399dd93b952a48740620.jpg', '../img/imgpelayanan/wxmceo7nudyy3zygvzb7.jpg', '', '', '../pdf/pelayanan/Soal Tes Ujian Masuk HIT - Programmer 2 (1).pdf', '2023-08-01', 'Proses', 'Proses', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_perjalanan_dinas`
--

CREATE TABLE `surat_perjalanan_dinas` (
  `idSuratPerjalanan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `tujuan` varchar(35) NOT NULL,
  `budgetTransportasi` float NOT NULL,
  `budgetPenginapan` float NOT NULL,
  `tglPergi` date NOT NULL,
  `tglPulang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_perjalanan_dinas`
--

INSERT INTO `surat_perjalanan_dinas` (`idSuratPerjalanan`, `id_pegawai`, `perihal`, `tujuan`, `budgetTransportasi`, `budgetPenginapan`, `tglPergi`, `tglPulang`) VALUES
(5, 20, 'Melakukan perencanaan kerjasama antar kecamatan banjarmasin timur dengan banjarbaru utara', 'Kantor Kecamatan Banjarbaru Utara', 500000, 600000, '2023-08-01', '2023-08-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s_keluarga`
--

CREATE TABLE `s_keluarga` (
  `id_sk` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `p_ktp` varchar(99) DEFAULT NULL,
  `p_kk` varchar(99) DEFAULT NULL,
  `ktp_k` varchar(99) DEFAULT NULL,
  `tgl` date NOT NULL,
  `statusAdmin` varchar(19) DEFAULT 'Proses',
  `statusCamat` varchar(19) NOT NULL DEFAULT 'Proses',
  `qrCode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `s_keluarga`
--

INSERT INTO `s_keluarga` (`id_sk`, `id_msy`, `id_pelayanan`, `p_ktp`, `p_kk`, `ktp_k`, `tgl`, `statusAdmin`, `statusCamat`, `qrCode`) VALUES
(27, 22, 4, '../img/imgpelayanan/wxmceo7nudyy3zygvzb7.jpg', '../img/imgpelayanan/Untitled-design-21.jpg', '../img/imgpelayanan/8b167af653c2399dd93b952a48740620.jpg', '2023-08-01', 'Diterima', 'Diterima', '../img/imgpelayanan/hasil_qrcode.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `nm_lengkap` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `level`, `nm_lengkap`, `username`, `password`) VALUES
(6, 0, 'Annisa Yuliani', 'Annisa', '5fad30428811fe378fd389cd7659a33c'),
(27, 3, 'Drs. Hj. Rusdiana, M.AP', 'camat', 'e0dc1c969db5fa159c0e3ccc290e2314'),
(29, 1, 'Lutfi', 'lutfi', 'cdb0b6889f4def26f43951b2d5b7a9e3'),
(30, 2, 'Laila', 'laila', 'f30618ed64655812746272636a992b95'),
(31, 2, 'Bayu', 'bayu', 'a430e06de5ce438d499c2e4063d60fd6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_msy`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_lp`);

--
-- Indeks untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`idCode`);

--
-- Indeks untuk tabel `rdn`
--
ALTER TABLE `rdn`
  ADD PRIMARY KEY (`id_rdn`);

--
-- Indeks untuk tabel `skp`
--
ALTER TABLE `skp`
  ADD PRIMARY KEY (`idSkp`);

--
-- Indeks untuk tabel `skpkecamatan`
--
ALTER TABLE `skpkecamatan`
  ADD PRIMARY KEY (`idSkpKec`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indeks untuk tabel `spn`
--
ALTER TABLE `spn`
  ADD PRIMARY KEY (`id_spn`);

--
-- Indeks untuk tabel `surat_perjalanan_dinas`
--
ALTER TABLE `surat_perjalanan_dinas`
  ADD PRIMARY KEY (`idSuratPerjalanan`);

--
-- Indeks untuk tabel `s_keluarga`
--
ALTER TABLE `s_keluarga`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_msy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `idCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `rdn`
--
ALTER TABLE `rdn`
  MODIFY `id_rdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `skp`
--
ALTER TABLE `skp`
  MODIFY `idSkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `skpkecamatan`
--
ALTER TABLE `skpkecamatan`
  MODIFY `idSkpKec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `spn`
--
ALTER TABLE `spn`
  MODIFY `id_spn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `surat_perjalanan_dinas`
--
ALTER TABLE `surat_perjalanan_dinas`
  MODIFY `idSuratPerjalanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `s_keluarga`
--
ALTER TABLE `s_keluarga`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
