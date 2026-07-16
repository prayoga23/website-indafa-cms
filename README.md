# Panduan Instalasi Project Kampus CMS

Project ini menggunakan **Laravel 11** sebagai backend, **AdminLTE** sebagai template dashboard admin, dan **Vite + Tailwind CSS + Alpine.js** untuk asset bundling serta frontend.

---

## 📋 Prasyarat Sistem (Prerequisites)

Sebelum memulai instalasi, pastikan sistem Anda sudah terpasang:
1. **PHP >= 8.2** (pastikan ekstensi PHP yang diperlukan oleh Laravel telah diaktifkan di `php.ini`)
2. **Composer** (Dependency Manager untuk PHP)
3. **Node.js (versi LTS rekomendasi)** & **NPM** (untuk asset compiler)
4. **Database Engine**:
   - **SQLite** (Bawaan Laravel 11, sangat mudah digunakan tanpa setup tambahan)
   - ATAU **MySQL / MariaDB** (melalui XAMPP/MAMP/laragon)

---

## 🚀 Langkah-Langkah Instalasi

Silakan ikuti urutan langkah di bawah ini untuk menjalankan project di lokal Anda:

### 1. Dapatkan Source Code
Buka terminal Anda, arahkan ke direktori server lokal (misalnya di XAMPP: `/Applications/XAMPP/xamppfiles/htdocs/`), lalu clone atau salin folder project ini:
```bash
cd /Applications/XAMPP/xamppfiles/htdocs/
# atau folder project Anda saat ini:
cd kampus-cms
```

### 2. Install Dependency PHP
Jalankan perintah berikut untuk mengunduh semua package PHP yang didefinisikan dalam `composer.json`:
```bash
composer install
```

### 3. Install Dependency Node.js (Frontend)
Jalankan perintah berikut untuk mengunduh modul-modul Javascript yang diperlukan (Tailwind, Alpinejs, SweetAlert2, DataTables, dll.):
```bash
npm install
```

### 4. Duplikasi Konfigurasi Lingkungan (`.env`)
Salin file konfigurasi `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

### 5. Generate Application Key
Jalankan perintah berikut untuk membuat key enkripsi unik untuk aplikasi Anda:
```bash
php artisan key:generate
```

### 6. Konfigurasi Database
Buka file `.env` yang baru saja dibuat, lalu sesuaikan konfigurasi database Anda. Ada 2 pilihan yang bisa Anda gunakan:

#### Pilihan A: Menggunakan SQLite (Rekomendasi / Paling Mudah)
Secara bawaan Laravel 11 menggunakan SQLite. Cukup pastikan konfigurasinya seperti ini di `.env`:
```env
DB_CONNECTION=sqlite
# Kosongkan atau komentari baris DB_HOST, DB_PORT, dll. jika menggunakan SQLite
```
*Catatan: Laravel akan otomatis membuat file `database/database.sqlite` saat migrasi pertama kali.*

#### Pilihan B: Menggunakan MySQL (melalui XAMPP)
Jika ingin menggunakan MySQL bawaan XAMPP:
1. Aktifkan service **MySQL** di XAMPP Control Panel.
2. Buat database baru bernama `kampus_cms` (atau nama lain) melalui phpMyAdmin (`http://localhost/phpmyadmin`).
3. Sesuaikan konfigurasi di `.env` Anda menjadi:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kampus_cms
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Jalankan Migrasi & Database Seeder
Jalankan perintah berikut untuk membuat tabel-tabel di database sekaligus mengisi data bawaan (seperti Roles, Permissions, dan user Admin):
```bash
php artisan migrate --seed
```
*Perintah ini akan menjalankan seeder `RoleSeeder` dan `AdminSeeder`.*

### 8. Hubungkan Storage Link
Untuk mendukung unggahan file (gambar, dokumen, dll.) agar dapat diakses secara publik, jalankan link folder storage:
```bash
php artisan storage:link
```

---

## 💻 Cara Menjalankan Project

Project ini sudah dilengkapi dengan konfigurasi server dev terpadu. Anda cukup menjalankan satu perintah berikut untuk menjalankan server PHP, Vite asset bundling, antrean queue, dan log secara bersamaan:

```bash
composer run dev
```

Atau jika Anda ingin menjalankannya secara terpisah di terminal yang berbeda:
1. **Untuk server lokal Laravel:**
   ```bash
   php artisan serve
   ```
2. **Untuk server aset Vite (tailwind & frontend assets):**
   ```bash
   npm run dev
   ```

Aplikasi Anda kini dapat diakses di browser melalui alamat:  
👉 **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🔑 Informasi Akun Default (Login Admin)

Setelah database berhasil di-seed, Anda dapat login ke panel dashboard AdminLTE dengan data kredensial berikut:

- **Halaman Login Dashboard:** `http://127.0.0.1:8000/login`
- **Email:** `admin@kampus.com`
- **Password:** `password`
- **Role Utama:** `Super Admin`

### Struktur Hak Akses (Roles) yang Tersedia:
1. **Super Admin** (Akses penuh)
2. **Admin Fakultas** (Akses terbatas area fakultas)
3. **Editor** (Hanya untuk mengelola konten/tulisan)
