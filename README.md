# 📚 Perpustakaan Buku Digital

Aplikasi web sederhana untuk mengelola data buku perpustakaan, dibangun dengan
**CodeIgniter 3** dan **MySQL**.

## Fitur

- **CRUD** data buku (Create, Read, Update, Delete)
- **Penanganan Session** — login/logout admin, halaman buku hanya bisa diakses
  setelah login (lihat `application/core/MY_Controller.php`)
- **Searching** — cari buku berdasarkan judul, penulis, penerbit, kategori
- **Pagination** — daftar buku ditampilkan per halaman (5 data/halaman)

## Tech Stack

- PHP (CodeIgniter 3.1.13)
- MySQL / MySQLi
- Bootstrap 5 (CDN, untuk tampilan)

## Struktur Folder Penting

```
application/
├── controllers/
│   ├── Auth.php          # login & logout (session)
│   └── Buku.php          # CRUD buku, search, pagination
├── core/
│   └── MY_Controller.php # cek session sebelum akses halaman buku
├── models/
│   ├── User_model.php    # query tabel users (login)
│   └── Buku_model.php    # query tabel buku (CRUD + search)
├── views/
│   ├── auth/login.php
│   ├── buku/{index,create,edit,detail}.php
│   └── templates/{header,footer}.php
└── config/
    ├── database.php      # konfigurasi koneksi database
    ├── autoload.php       # autoload session, database, form_validation
    └── routes.php         # default_controller = buku
```

## Konfigurasi Penting

| Konfigurasi   | Lokasi                                | Nilai                                   |
|---------------|----------------------------------------|------------------------------------------|
| Base URL      | `application/config/config.php`        | `http://localhost/perpustakaan-digital/` |
| Database      | `application/config/database.php`      | `perpustakaan_digital`                   |
| Session driver| `application/config/config.php`        | `files` (default)                        |
| Default route | `application/config/routes.php`        | `buku` (list buku)                       |

> Jika project diletakkan di folder/nama lain, ubah `base_url` di
> `application/config/config.php` agar sesuai.

## Alur Aplikasi

1. User membuka aplikasi → belum login → diarahkan ke `/auth/login`
2. Login berhasil → session (`logged_in`, `user_id`, `nama`) disimpan
3. User diarahkan ke halaman daftar buku (`/buku`) → bisa cari, tambah, edit, hapus, lihat detail
4. Logout → session dihapus (`sess_destroy`) → kembali ke halaman login

## Catatan Keamanan

- Password disimpan dengan hash (`password_hash` / bcrypt), diverifikasi via `password_verify()`.
- Semua input form melalui `form_validation` sebelum diproses.
- Output ke view di-escape dengan `htmlspecialchars()` untuk mencegah XSS dasar.
