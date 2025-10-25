# POS Cafe

Sistem Point of Sale (POS) untuk Cafe yang dibangun menggunakan Laravel 11.

## Fitur

- **Manajemen Menu** - Kelola menu makanan dan minuman
- **Transaksi Penjualan** - Proses pemesanan dan pembayaran
- **Manajemen Kategori** - Organisasi menu berdasarkan kategori
- **Dashboard** - Monitoring penjualan dan statistik
- **User Management** - Kelola pengguna dan hak akses

## Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Vite, TailwindCSS, DaisyUI
- **Icons**: Tabler Icons
- **Database**: MySQL/MariaDB
- **PHP Version**: 8.2+

## Instalasi

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Langkah Instalasi

1. Clone repository
```bash
git clone https://github.com/Putra-black-horse/Poscafe.git
cd Poscafe
```

2. Install dependencies PHP
```bash
composer install
```

3. Install dependencies JavaScript
```bash
npm install
```

4. Copy file environment
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Konfigurasi database di file `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=poscafe
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migrasi database
```bash
php artisan migrate
```

8. (Opsional) Jalankan seeder untuk data dummy
```bash
php artisan db:seed
```

9. Buat symbolic link untuk storage
```bash
php artisan storage:link
```

## Menjalankan Aplikasi

1. Jalankan server Laravel
```bash
php artisan serve
```

2. Di terminal terpisah, jalankan Vite untuk asset development
```bash
npm run dev
```

3. Akses aplikasi di browser
```
http://127.0.0.1:8000
```

## Build untuk Production

```bash
npm run build
```

## Kontribusi

Kontribusi selalu diterima! Silakan buat pull request atau laporkan issue.

## Lisensi

Project ini menggunakan lisensi MIT.