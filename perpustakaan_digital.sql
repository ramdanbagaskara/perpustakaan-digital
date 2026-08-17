-- =========================================================
-- Database: perpustakaan_digital
-- Aplikasi : Perpustakaan Buku Digital (CodeIgniter 3 + MySQL)
-- =========================================================

CREATE DATABASE IF NOT EXISTS `perpustakaan_digital`
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;

USE `perpustakaan_digital`;

-- ---------------------------------------------------------
-- Tabel: users  (untuk login / penanganan session)
-- ---------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id`         INT(11) NOT NULL AUTO_INCREMENT,
  `nama`       VARCHAR(100) NOT NULL,
  `username`   VARCHAR(50) NOT NULL,
  `password`   VARCHAR(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Password default: admin123 (sudah di-hash pakai password_hash / bcrypt)
-- Hash di bawah = hasil password_hash('admin123', PASSWORD_BCRYPT)
INSERT INTO `users` (`nama`, `username`, `password`) VALUES
('Administrator', 'admin', '$2b$10$LUJF7/1E7lzhzqbJIWjX..DPDcelV1aEhJcWFLHZBpfbhzzoRBp1i');

-- ---------------------------------------------------------
-- Tabel: buku  (data buku digital perpustakaan)
-- ---------------------------------------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id`            INT(11) NOT NULL AUTO_INCREMENT,
  `judul`         VARCHAR(150) NOT NULL,
  `penulis`       VARCHAR(100) NOT NULL,
  `penerbit`      VARCHAR(100) DEFAULT NULL,
  `tahun_terbit`  YEAR DEFAULT NULL,
  `kategori`      VARCHAR(50) DEFAULT NULL,
  `stok`          INT(11) NOT NULL DEFAULT 0,
  `sinopsis`      TEXT,
  `sampul`        VARCHAR(255) DEFAULT NULL COMMENT 'nama file cover buku',
  `created_at`    DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data contoh (dummy) supaya fitur pagination & search bisa langsung dites
INSERT INTO `buku` (`judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori`, `stok`, `sinopsis`) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 'Novel', 5, 'Kisah perjuangan anak-anak Belitung mengejar pendidikan.'),
('Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980, 'Novel', 3, 'Kisah Minke pada masa kolonial Hindia Belanda.'),
('Filosofi Teras', 'Henry Manampiring', 'Kompas', 2018, 'Pengembangan Diri', 7, 'Pengantar filsafat Stoa untuk kehidupan modern.'),
('Sapiens', 'Yuval Noah Harari', 'Pustaka Alvabet', 2011, 'Sejarah', 4, 'Perjalanan singkat umat manusia.'),
('Atomic Habits', 'James Clear', 'Gramedia', 2018, 'Pengembangan Diri', 10, 'Cara membangun kebiasaan baik dan menghilangkan kebiasaan buruk.'),
('Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 2009, 'Novel', 6, 'Kisah santri di Pondok Madani mengejar mimpi.'),
('Clean Code', 'Robert C. Martin', 'Prentice Hall', 2008, 'Teknologi', 2, 'Panduan menulis kode program yang bersih dan mudah dirawat.'),
('Belajar CodeIgniter', 'Tim Penulis', 'Elex Media', 2020, 'Teknologi', 8, 'Panduan dasar membangun web dengan framework CodeIgniter.'),
('Pulang', 'Tere Liye', 'Republika', 2015, 'Novel', 5, 'Kisah Bujang, seorang pemuda dari dunia hitam.'),
('Cosmos', 'Carl Sagan', 'Ballantine Books', 1980, 'Sains', 3, 'Eksplorasi alam semesta dan sejarah sains.'),
('Sejarah Indonesia Modern', 'M.C. Ricklefs', 'Serambi', 2005, 'Sejarah', 4, 'Sejarah Indonesia dari abad ke-13 hingga sekarang.'),
('Rich Dad Poor Dad', 'Robert Kiyosaki', 'Gramedia', 1997, 'Ekonomi', 9, 'Perbandingan pola pikir finansial dua figur ayah.');

-- =========================================================
-- Catatan:
-- - Password admin default: admin123
-- - Kolom "sampul" opsional (upload cover buku)
-- =========================================================
