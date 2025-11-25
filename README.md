# Sistem Informasi RW

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue)](https://www.php.net)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)

## 📖 Deskripsi

Sistem Informasi RW (Rukun Warga) adalah aplikasi web berbasis **Laravel** yang memudahkan pengelolaan data warga, agenda kegiatan, galeri foto, dan struktur organisasi RW. Aplikasi ini dirancang dengan tampilan modern, responsif, dan mendukung **dark mode** serta animasi halus untuk pengalaman pengguna yang premium.

## ✨ Fitur Utama

- **Manajemen Data Warga**: CRUD lengkap untuk data penduduk, termasuk pencarian dan filter.
- **Agenda Kegiatan**: Buat, edit, dan lihat agenda RW dengan tampilan kalender.
- **Galeri Foto**: Upload foto kegiatan, tampilkan dalam grid modern dengan efek hover.
- **Struktur Organisasi**: Visualisasi struktur RW dalam kartu interaktif.
- **Dashboard Admin**: Sidebar responsif, statistik cepat, dan kontrol penuh.
- **Responsive Design**: Tampilan optimal di desktop, tablet, dan smartphone.
- **Dark Mode**: Tema gelap otomatis berdasarkan preferensi sistem.

## 🛠️ Teknologi

- **Backend**: Laravel 10.x, PHP 8.2, MySQL
- **Frontend**: Blade templating, TailwindCSS (untuk komponen UI), Alpine.js (interaksi ringan)
- **Version Control**: Git & GitHub

## 🚀 Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/SidikWaluyaa/sistem-informasi-rw.git
   cd sistem-informasi-rw
   ```
2. **Install dependencies**
   ```bash
   composer install
   npm install   # optional, jika ada asset front‑end yang dikelola dengan npm
   ```
3. **Copy environment file & generate key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Configure database** – edit `.env` dengan kredensial MySQL Anda, lalu jalankan migrasi:
   ```bash
   php artisan migrate --seed   # seed data contoh
   ```
5. **Jalankan server**
   ```bash
   php artisan serve
   ```
   Akses aplikasi di `http://127.0.0.1:8000`.

## 📦 Deploy (Opsional)

- **Heroku / Render / Vercel**: Pastikan `Procfile` dan `composer.json` sudah terkonfigurasi.
- **Docker**: Gunakan file `Dockerfile` yang ada di repo (jika tersedia) atau buat image berbasis `php:8.2-fpm`.

## 🤝 Kontribusi

1. Fork repository ini.
2. Buat branch fitur (`git checkout -b feature/awesome-feature`).
3. Commit perubahan Anda (`git commit -m "Add awesome feature"`).
4. Push ke remote (`git push origin feature/awesome-feature`).
5. Buat Pull Request ke `main`.

Semua kontribusi sangat dihargai! Pastikan mengikuti standar coding Laravel dan menulis tes bila diperlukan.

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License** – lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

---

*Dibuat dengan ❤️ oleh **Sidik Waluyaa**.*
