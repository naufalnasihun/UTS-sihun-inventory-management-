# Aplikasi Manajemen Inventaris

Aplikasi Manajemen Inventaris berbasis Laravel untuk mengelola data kategori dan barang. Aplikasi ini dibuat untuk memenuhi tugas Ujian Tengah Semester (UTS) dengan menerapkan autentikasi, operasi CRUD, validasi data, dan relasi antartabel.

## Fitur Aplikasi

- **Login dan Logout** untuk membatasi akses pengguna.
- **Autentikasi pengguna** menggunakan session.
- **Password hashing** untuk menyimpan kata sandi secara aman.
- **Dashboard** untuk menampilkan halaman utama aplikasi.
- **Manajemen Kategori** meliputi tambah, lihat, edit, dan hapus kategori.
- **Manajemen Barang** meliputi tambah, lihat, edit, dan hapus barang.
- **Relasi Kategori dan Barang** menggunakan foreign key.
- **Validasi Input** untuk memastikan data yang dimasukkan sesuai ketentuan.
- **Middleware Auth** untuk melindungi halaman yang memerlukan login.

## Teknologi yang Digunakan

- PHP
- Laravel
- MySQL
- phpMyAdmin
- HTML dan CSS
- Git dan GitHub

## Persyaratan

Pastikan perangkat sudah memiliki:

- PHP sesuai versi Laravel yang digunakan.
- Composer.
- MySQL atau MariaDB.
- Laragon.
- Git.

## Instalasi dan Menjalankan Aplikasi

### 1. Clone Repository

Jika project diambil dari GitHub, jalankan:

```bash
git clone URL_REPOSITORY_KAMU
cd uts-inventaris
```

Ganti `URL_REPOSITORY_KAMU` dengan URL repository GitHub milikmu.

Jika project sudah tersedia di komputer, buka folder project melalui VS Code.

### 2. Install Dependency

Jalankan perintah berikut di terminal:

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file konfigurasi:

```bash
copy .env.example .env
```

Jika file `.env` sudah tersedia, langkah ini dapat dilewati.

Buka file `.env`, lalu sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris_uts
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password MySQL dengan konfigurasi Laragon di komputer masing-masing.

### 4. Buat Database

1. Jalankan Laragon dan aktifkan layanan database.
2. Buka phpMyAdmin melalui menu Laragon.
3. Buat database bernama `inventaris_uts`.
4. Gunakan collation `utf8mb4_unicode_ci` jika tersedia.

### 5. Generate Application Key

Jalankan:

```bash
php artisan key:generate
```

### 6. Jalankan Migration dan Seeder

Untuk membuat tabel dan mengisi data awal:

```bash
php artisan migrate --seed
```

**Catatan:** Jika database sudah berisi data penting, jangan menggunakan `php artisan migrate:fresh --seed` karena perintah tersebut akan menghapus tabel dan membuatnya kembali.

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Buka alamat berikut di browser:

```text
http://127.0.0.1:8000
```

## Struktur Database

### Tabel `categories`

Menyimpan data kategori barang.

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `name` | Nama kategori |
| `created_at` | Waktu data dibuat |
| `updated_at` | Waktu data diperbarui |

### Tabel `items`

Menyimpan data barang inventaris.

| Kolom | Keterangan |
|---|---|
| `id` | Primary key |
| `category_id` | Foreign key ke tabel `categories` |
| `name` | Nama barang |
| `price` | Harga barang |
| `stock` | Jumlah stok |
| `created_at` | Waktu data dibuat |
| `updated_at` | Waktu data diperbarui |

Relasi database: satu kategori dapat memiliki banyak barang (*one-to-many*).

## Akun Demo

Jika seeder akun demo sudah dijalankan dan menggunakan kredensial berikut, kamu dapat mencoba login dengan:

- **Email:** `admin@inventaris.test`
- **Password:** `Admin123!`

Jika akun tersebut tidak tersedia, periksa konfigurasi seeder pengguna pada project.

## Pengujian Aplikasi

Pengujian dapat dilakukan dengan langkah berikut:

1. Membuka halaman login.
2. Mencoba login dengan akun yang valid.
3. Memastikan pengguna yang belum login tidak dapat membuka halaman yang dilindungi.
4. Menguji tambah, lihat, edit, dan hapus kategori.
5. Menguji tambah, lihat, edit, dan hapus barang.
6. Memastikan validasi berjalan ketika input tidak sesuai.
7. Memastikan relasi kategori dan barang berfungsi.
8. Melakukan logout dan memastikan akses kembali memerlukan login.

## Keamanan

- Password disimpan dalam bentuk hash.
- Halaman tertentu dilindungi menggunakan middleware autentikasi.
- Input divalidasi sebelum disimpan.
- Relasi database menggunakan foreign key untuk menjaga integritas data.

## Pengembang

- **Nama:** [Naufal Nashihun Nizhom]
- **NIM:** [2495114016]
- **Program Studi:** Teknik Informatika
- **Mata Kuliah:** [Pemogroman Web Lanjnut]
- **Tugas:** Ujian Tengah Semester (UTS)

---

Dibuat untuk memenuhi tugas Ujian Tengah Semester (UTS) pada pengembangan aplikasi berbasis Laravel.
