-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2023 pada 07.21
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
(5, 'Penata Muda Tk.I ( III/b )'),
(7, 'Eselon IIIiiiiiiii');

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
(3, 'CAMAT'),
(6, 'PEGAWAI');

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
(12, 18, '  6303020201990007  ', 'Raisa Noor Islami', 'Banjarmasin  ', '2000-01-01', 'Jl. Sultan Adam Komp. Malken Temon.', 'Islam', 'Laki-Laki', '0812345679');

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
(9, 'Silaturahmi dan Sosialisasi Perumda PALD Banjarmasin Bersama Tokoh Masyarakat Wilayah Kecamatan Kota Banjarmasin.', '\"Menyelamatkan Bumi dan Air Dengan Pengelolaan Sanitasi yang Baik untuk mencapai Kinerja Barasih wan Nyaman di Kota Banjarmasin Tahun 2023 di Aula Kecamatan Banjarmasin Timur', '../img/imgnews/photo1685958361.jpeg', '2023-03-21'),
(10, 'RAKORCAM', 'Rapat Koordinasi Kecamatan Program Keluarga Harapan (PKH) Kota Banjarmasin th 2023 di Wilayah Banjarmasin Timur.', '../img/imgnews/photo1685958052.jpeg', '2023-05-31');

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
(15, 6, 2, 3, 'Annisa Yuliani', ' 001 009 29180 007 ', 'Bentok ', '2002-01-31', 'Jl. Kelapa Komp. Dahlia No. 4 ', 'Perempuan', 'Lajang', 'Islam', '08222900011 ', '../img/wxmceo7nudyy3zygvzb7.jpg', '@nisayulia ', '12376123@gmail.com '),
(16, 19, 6, 5, 'Fitri Aulia', ' 089000 00811 900 ', 'Marabahan ', '1992-02-07', 'Jl. Handil Bakti Komp.Arum ', 'Perempuan', 'Single', 'Islam', '085276670001 ', '../img/wxmceo7nudyy3zygvzb7.jpg', '@aulia_fit ', 'aulia_fit@gmail.com ');

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
  `s_pernyataan` varchar(99) DEFAULT NULL,
  `s_permohonan` varchar(99) DEFAULT NULL,
  `ktp_p` varchar(99) DEFAULT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_lp`, `id_msy`, `id_pelayanan`, `s_pernyataan`, `s_permohonan`, `ktp_p`, `tgl`) VALUES
(1, 2, 6, '63c40468becb4.pdf', '63c40440cb961.pdf', '63c40440cbbb6.jpg', '2023-01-02'),
(3, 4, 6, '63cbb2bccd9dc.pdf', '63cbb2bccdf5d.pdf', '63cbb2bccec50.jpg', '2023-01-04');

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
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rdn`
--

INSERT INTO `rdn` (`id_rdn`, `id_msy`, `id_pelayanan`, `ktp_p`, `kk_p`, `s_kua`, `tgl`) VALUES
(3, 2, 5, '63c01099435ac.jpg', '63c0109943d00.jpg', '63c3f5043e60c.pdf', '2023-01-01'),
(6, 5, 5, '63cbb084c78f5.png', '63cbb084c7b7b.png', '63cbb084c7d52.pdf', '2023-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `id_msy` int(11) NOT NULL,
  `id_pelayanan` int(11) NOT NULL,
  `s_sktm` varchar(99) DEFAULT NULL,
  `ktp` varchar(99) DEFAULT NULL,
  `kk` varchar(99) DEFAULT NULL,
  `s_pernyataan` varchar(99) DEFAULT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_msy`, `id_pelayanan`, `s_sktm`, `ktp`, `kk`, `s_pernyataan`, `tgl`) VALUES
(5, 2, 1, '63bd74940deeb.pdf', '63bd74940e391.jpg', '63bd74940e594.jpg', '63bd74940e18c.pdf', '2023-01-01'),
(7, 6, 1, '63cbac2e4b07e.pdf', '63cbac2e4c266.png', '63cbac2e4cf04.jpg', '63cbac2e4c061.pdf', '2023-01-11');

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
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `spn`
--

INSERT INTO `spn` (`id_spn`, `id_msy`, `id_pelayanan`, `spn`, `ktp`, `pas_foto`, `akte_c`, `sk`, `skwn`, `tgl`) VALUES
(35, 4, 3, '63bd73028a270.pdf', '63bd5e6bb6305.png', '63bd5e56ca6ff.jpg', '63bd5f2437c48.pdf', '63bd5f2437f57.pdf', '63bd5e97791af.pdf', '2023-01-01'),
(47, 6, 3, '63cbacc425e66.pdf', '63cbacc4260e9.png', '63cbacc4264f1.jpg', '63cbacc426796.pdf', '63cbacc426953.pdf', '63cbacc42705d.', '2023-01-03');

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
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `s_keluarga`
--

INSERT INTO `s_keluarga` (`id_sk`, `id_msy`, `id_pelayanan`, `p_ktp`, `p_kk`, `ktp_k`, `tgl`) VALUES
(6, 2, 4, '63c013133f820.png', '63c013133fb57.jpg', '63c013133fdef.png', '2023-01-01'),
(8, 7, 4, '63ca96a823a5f.png', '63ca96a823d04.png', '63ca96a823ed0.jpg', '2023-01-02');

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
(18, 2, 'Raisa Noor Islami', 'raisa008', '4b8ed057e4f0960d8413e37060d4c175'),
(19, 1, 'Fitri Aulia', 'aulia_fit', '614913bc360cdfd1c56758cb87eb9e8f');

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
-- Indeks untuk tabel `rdn`
--
ALTER TABLE `rdn`
  ADD PRIMARY KEY (`id_rdn`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`);

--
-- Indeks untuk tabel `spn`
--
ALTER TABLE `spn`
  ADD PRIMARY KEY (`id_spn`),
  ADD UNIQUE KEY `id_msy` (`id_msy`);

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
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_msy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rdn`
--
ALTER TABLE `rdn`
  MODIFY `id_rdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `spn`
--
ALTER TABLE `spn`
  MODIFY `id_spn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `s_keluarga`
--
ALTER TABLE `s_keluarga`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
