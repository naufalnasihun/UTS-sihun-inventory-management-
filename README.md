# UTS-sihun-inventory-management-

# Inventory Management

Aplikasi Inventory Management berbasis Laravel untuk mengelola data kategori dan barang. Aplikasi ini dibuat untuk memenuhi tugas Ujian Tengah Semester (UTS) dengan menerapkan autentikasi, operasi CRUD, validasi data, dan relasi database.

## Fitur Aplikasi

- Login dan logout pengguna.
- Autentikasi menggunakan sistem Laravel.
- Proteksi halaman menggunakan middleware `auth`.
- Dashboard yang menampilkan jumlah kategori, barang, dan total stok.
- CRUD kategori (Create, Read, Update, Delete).
- CRUD barang (Create, Read, Update, Delete).
- Relasi antara kategori dan barang menggunakan Eloquent ORM.
- Validasi input pada formulir.
- Penyimpanan password menggunakan hashing.
- Pagination pada daftar kategori dan barang.
- Tampilan responsif untuk laptop dan perangkat mobile.
- Seeder untuk membuat data awal.

## Teknologi yang Digunakan

- PHP
- Laravel
- MySQL / MariaDB
- phpMyAdmin
- HTML
- CSS
- Blade Template Engine
- Git dan GitHub

## Struktur Database

### Tabel `users`

Menyimpan data pengguna untuk autentikasi aplikasi.

### Tabel `categories`

Menyimpan data kategori barang dengan kolom:
- `id`
- `name`
- `created_at`
- `updated_at`

### Tabel `items`

Menyimpan data barang dengan kolom:
- `id`
- `category_id`
- `name`
- `price`
- `stock`
- `created_at`
- `updated_at`

Kolom `category_id` merupakan foreign key yang menghubungkan tabel `items` dengan tabel `categories`.

Relasi yang digunakan:
- Category memiliki banyak Item (`hasMany`).
- Item dimiliki oleh satu Category (`belongsTo`).

## Persyaratan Sistem

Pastikan perangkat sudah memiliki:
- PHP dengan ekstensi yang dibutuhkan Laravel.
- Composer.
- MySQL atau MariaDB.
- Laravel sesuai versi project.
- Git.
- Laragon untuk lingkungan pengembangan lokal.

## Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/NAMA-REPOSITORY.git
```

Ganti `USERNAME` dan `NAMA-REPOSITORY` dengan informasi repository GitHub yang sebenarnya.

### 2. Masuk ke Folder Project

```bash
cd NAMA-REPOSITORY
```

### 3. Install Dependency

```bash
composer install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Windows Command Prompt:

```bash
copy .env.example .env
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```dotenv
APP_NAME="Inventory Management"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventaris_uts
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password database dengan konfigurasi MySQL lokal.

### 5. Buat Application Key

```bash
php artisan key:generate
```

### 6. Buat Database

Buka Laragon dan jalankan layanan MySQL. Buka phpMyAdmin, kemudian buat database bernama `inventaris_uts` dengan collation `utf8mb4_unicode_ci`.

### 7. Jalankan Migration dan Seeder

```bash
php artisan migrate --seed
```

Perintah ini membuat tabel database dan mengisi data awal melalui seeder. Pastikan database sudah benar dan migration project belum menimbulkan konflik.

### 8. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser dan akses:

http://127.0.0.1:8000

## Akun Pengujian Lokal

Jika seeder demo telah dijalankan, gunakan akun berikut:

- Email: `admin@inventaris.test`
- Password: `Admin123!`

Akun ini hanya untuk pengujian lokal. Ganti atau nonaktifkan akun demo sebelum aplikasi digunakan di lingkungan produksi.

## Data Awal

Seeder menyediakan contoh data berikut.

### Kategori
1. Aksesori
2. Perangkat Komputer
3. Penyimpanan

### Barang
1. Keyboard
2. Mouse
3. Monitor
4. Headset
5. Flashdisk

Data dapat diperiksa dan dikelola melalui menu kategori dan barang pada aplikasi.

## Pengujian

Jalankan test Laravel menggunakan:

```bash
php artisan test
```

Periksa daftar route menggunakan:

```bash
php artisan route:list
```

Periksa status migration menggunakan:

```bash
php artisan migrate:status
```

Pengujian manual mencakup:
- Login dengan kredensial yang benar dan salah.
- Logout dan proteksi halaman.
- Menambah, melihat, mengubah, dan menghapus kategori.
- Menambah, melihat, mengubah, dan menghapus barang.
- Validasi nama, harga, stok, dan kategori.
- Pemeriksaan relasi kategori dengan barang.
- Pemeriksaan data pada database.

## Keamanan

- Jangan mengunggah file `.env` ke repository publik.
- Jangan mengunggah password, token, atau kredensial database.
- Gunakan hashing untuk menyimpan password.
- Gunakan validasi server-side untuk input pengguna.
- Gunakan akun dan konfigurasi berbeda untuk pengembangan dan produksi.

## Pengembang

Nama: [Naufal Nashihun Nizhom]  
NIM: [2495114016]  
Program Studi: [TEKNIK INFORMATIKA]  
Mata Kuliah: [Pemograman Web Lanjut]  
Tugas: Ujian Tengah Semester (UTS)

## Repository dan Video Demonstrasi

Repository GitHub: [Isi URL Repository]

Video demonstrasi: [Isi URL Video]

## Lisensi

Project ini dibuat untuk keperluan pembelajaran dan pemenuhan tugas akademik.
