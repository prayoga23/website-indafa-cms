# Product Requirements Document (PRD)

## Website Resmi Institut Agama Islam Darul Falah Bondowoso (INDAFA)

Version: 1.0

Status: Frontend Development

---

# 1. Project Overview

Website ini merupakan website resmi **Institut Agama Islam Darul Falah Bondowoso (INDAFA)**.

Proyek saat ini difokuskan pada pengembangan **Frontend** untuk membangun pengalaman pengguna yang modern, responsif, konsisten, dan mudah digunakan. Seluruh struktur halaman mengacu pada sitemap dan daftar menu yang telah disusun dalam dokumen perencanaan website.

Frontend yang sudah ada menjadi acuan utama pengembangan selanjutnya.

Wajib Dipertahankan
Logo kampus.
Hero banner.
Banner setiap halaman.
Foto gedung kampus.
Foto fasilitas.
Foto kegiatan kampus.
Foto dosen.
Foto pimpinan.
Foto galeri.
Background image.
Icon khusus yang telah digunakan.
Ilustrasi yang telah tersedia.

---

# 2. Current Development Phase

Fase pengembangan saat ini hanya mencakup **Frontend Development**.

Seluruh halaman dikembangkan menggunakan data sementara (dummy/mock data) agar nantinya mudah diintegrasikan dengan backend.

Backend akan dikerjakan pada fase berikutnya setelah seluruh tampilan frontend selesai.

---

# 3. Project Scope

## In Scope

* Pengembangan halaman frontend.
* Penyempurnaan UI/UX.
* Responsive Design.
* Reusable Components.
* Navigasi website.
* Layout.
* Animasi ringan.
* Dummy Data.
* Optimasi frontend.
* Accessibility.
* SEO dasar.

## Out of Scope

Untuk saat ini **tidak dikerjakan**:

* Backend
* REST API
* Database
* Authentication
* Authorization
* CMS / Admin Panel
* CRUD
* Upload File
* Email Service
* Payment Gateway
* Third-party Integration

---

# 4. Development Principles

Seluruh pengembangan harus mengikuti prinsip berikut:

* Mempertahankan desain frontend yang sudah ada.
* Tidak mengubah identitas visual website.
* Menjaga konsistensi seluruh halaman.
* Menggunakan komponen reusable.
* Mengutamakan clean code.
* Mengutamakan maintainability.
* Mengutamakan responsive design.

---

# 5. Frontend Preservation Rules

Frontend yang telah dibuat merupakan standar utama proyek.

AI tidak diperbolehkan mengubah tampilan website tanpa instruksi langsung dari developer.

## Wajib Dipertahankan

* Layout
* Navbar
* Footer
* Color Palette
* Typography
* Grid System
* Card Design
* Button Style
* Form Style
* Responsive Behavior
* Section Layout
* Component Structure
* Folder Structure
* Naming Convention
* Coding Style

## Boleh Dilakukan

* Menambah halaman baru.
* Menambah section baru.
* Menambah reusable component apabila diperlukan.
* Memperbaiki bug.
* Refactoring tanpa mengubah tampilan.
* Optimasi performa.
* Optimasi accessibility.
* Optimasi SEO frontend.

## Tidak Boleh Dilakukan

* Mendesain ulang website.
* Mengubah layout utama.
* Mengubah warna utama.
* Mengubah tipografi.
* Mengubah navigasi.
* Menghapus komponen lama.
* Mengganti library UI tanpa instruksi.
* Mengubah struktur halaman yang sudah selesai.

---

# 6. AI Development Rules

Saat menghasilkan kode, AI wajib:

* Mengikuti PRD sebagai acuan utama.
* Mengikuti sitemap yang telah ditentukan.
* Tidak membuat halaman di luar requirement.
* Tidak mengubah desain frontend yang sudah ada.
* Menggunakan reusable components yang telah tersedia.
* Menggunakan dummy data apabila diperlukan.
* Menjaga konsistensi UI di seluruh halaman.
* Menjelaskan perubahan yang dilakukan sebelum memberikan implementasi.
* Tidak membuat backend, API, database, maupun CMS.

---

# 7. Development Goal

Target fase ini adalah menyelesaikan seluruh tampilan frontend website INDAFA sehingga siap diintegrasikan dengan backend pada fase berikutnya.

Seluruh halaman harus:

* Konsisten.
* Responsif.
* Mudah dipelihara.
* Siap menerima data dari API di masa mendatang tanpa perlu mengubah struktur komponen.

# 8. Website Sitemap

Seluruh halaman website harus mengikuti struktur menu di bawah ini. AI tidak diperbolehkan menambah, menghapus, atau mengubah struktur menu tanpa instruksi developer. Struktur ini mengacu pada dokumen perencanaan website INDAFA.

```
Website INDAFA
│
├── Beranda
│   ├── Hero Banner
│   ├── Sambutan Rektor
│   ├── Statistik Kampus
│   ├── Fakultas
│   ├── Program Studi
│   ├── Berita Terbaru
│   ├── Pengumuman
│   ├── Prestasi Mahasiswa
│   ├── Gallery
│   └── Call To Action PMB
│
├── Profil
│   ├── Sejarah
│   ├── Visi, Misi & Tujuan
│   ├── Struktur Organisasi
│   └── Filosofi Logo
│
├── Fakultas
│   │
│   ├── Fakultas Syariah
│   │   ├── Beranda
│   │   ├── Profil
│   │   │   ├── Sejarah
│   │   │   ├── Visi, Misi & Tujuan
│   │   │   └── Pimpinan
│   │   ├── Program Studi
│   │   │   ├── Hukum Keluarga Islam
│   │   │   └── Hukum Ekonomi Syariah
│   │   ├── Akademik
│   │   │   ├── Dokumen
│   │   │   └── Sertifikat Akreditasi
│   │   ├── Pengumuman
│   │   ├── Berita
│   │   └── Kontak
│   │
│   └── Fakultas Ekonomi Bisnis Islam & Tarbiyah
│       └── Struktur sama seperti Fakultas Syariah
│
├── Program Studi
│   ├── Beranda
│   ├── Profil
│   │   ├── Sejarah
│   │   ├── Visi, Misi & Tujuan
│   │   └── Pimpinan
│   ├── Akademik
│   │   ├── Dokumen
│   │   ├── Persuratan
│   │   ├── Form Persuratan
│   │   ├── Layanan Digital
│   │   ├── Cek Turnitin
│   │   ├── Pendaftaran KKN
│   │   ├── Kalender Akademik
│   │   ├── Jadwal Kuliah
│   │   ├── Alur Kelulusan
│   │   └── Sertifikat Akreditasi
│   ├── Pengumuman
│   ├── Berita
│   └── Kontak
│
├── Unit & Lembaga
│   │
│   ├── LPM
│   │   ├── Beranda
│   │   ├── Profil
│   │   ├── Bidang Pengawasan
│   │   ├── Bidang Penjaminan
│   │   ├── Pengumuman
│   │   ├── Berita
│   │   └── Kontak
│   │
│   └── LP2M
│       ├── Beranda
│       ├── Profil
│       ├── Riset
│       ├── Pusat
│       ├── Layanan
│       ├── Survei
│       └── Kontak
│
├── Akademik
│   ├── Kalender Akademik
│   ├── Jadwal Kuliah
│   ├── Dokumen Akademik
│   ├── Persuratan
│   ├── Layanan Akademik
│   └── Download
│
├── Pengumuman
│   ├── Daftar Pengumuman
│   ├── Detail Pengumuman
│   └── Search
│
├── Berita
│   ├── Daftar Berita
│   ├── Detail Berita
│   ├── Kategori
│   └── Search
│
└── Kontak
    ├── Informasi Kampus
    ├── Maps
    ├── Form Kontak
    ├── WhatsApp
    └── Sosial Media
```

---

# 9. Development Flow

Pengerjaan website dilakukan sesuai urutan berikut:

1. Global Layout
2. Navbar
3. Footer
4. Beranda
5. Profil
6. Fakultas
7. Program Studi
8. Unit & Lembaga
9. Akademik
10. Pengumuman
11. Berita
12. Kontak
13. Responsive Testing
14. UI Consistency Review
15. Performance Optimization
16. Final Frontend Review

AI tidak boleh melompati urutan pengerjaan tanpa instruksi developer.
