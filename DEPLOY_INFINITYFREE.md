# 🚀 Panduan Deploy ke InfinityFree

Panduan lengkap untuk deploy aplikasi POS Cafe ke InfinityFree.com (100% GRATIS tanpa kartu kredit).

## ✅ Keunggulan InfinityFree

- ✅ **100% GRATIS** - Tidak perlu kartu kredit
- ✅ **PHP 8.x Support** - Compatible dengan Laravel
- ✅ **MySQL Database** - 400MB storage
- ✅ **Unlimited Bandwidth**
- ✅ **cPanel** - Easy management
- ✅ **Free SSL** - HTTPS otomatis

## ⚠️ Limitasi Free Tier

- ⏱️ **50,000 hits/day** - Cukup untuk hobby project
- 💾 **5GB Disk Space**
- 🗄️ **400MB MySQL Database**
- 🚫 **No cron jobs** di free tier
- ⏳ **Account suspend** jika tidak aktif 30 hari

---

## 📋 Prasyarat

1. ✅ Project Laravel sudah siap
2. ✅ Akun InfinityFree (gratis)
3. ✅ FileZilla atau FTP client lainnya

---

## 🌐 Langkah 1: Buat Akun InfinityFree

### 1.1 Registrasi

1. Buka [https://infinityfree.net](https://infinityfree.net)
2. Klik **"Sign Up"** atau **"Create Account"**
3. Isi form registrasi:
   - Email address
   - Password
   - Verify CAPTCHA
4. Klik **"Create Account"**
5. Cek email untuk verifikasi
6. Klik link verifikasi di email

### 1.2 Buat Hosting Account

1. Login ke dashboard InfinityFree
2. Klik **"Create Account"** atau **"New Account"**
3. Pilih subdomain atau custom domain:
   - **Subdomain gratis**: `poscafe.rf.gd` atau `poscafe.wuaze.com` (pilih salah satu)
   - **Custom domain**: Jika punya domain sendiri
4. Isi form:
   - **Domain**: Pilih subdomain gratis atau masukkan domain Anda
   - **Label**: `POS Cafe` (untuk identifikasi)
5. Klik **"Create Account"**
6. ⏳ Tunggu ~5-10 menit untuk aktivasi account

### 1.3 Catat Informasi Penting

Setelah account aktif, catat informasi berikut (ada di email atau dashboard):
- ✅ **FTP Hostname**: `ftpupload.net`
- ✅ **FTP Username**: `epiz_xxxxxxxxx`
- ✅ **FTP Password**: (yang Anda buat)
- ✅ **MySQL Hostname**: `sqlxxx.infinityfree.com`
- ✅ **MySQL Database Name**: `epiz_xxxxxxxxx_poscafe`
- ✅ **MySQL Username**: `epiz_xxxxxxxxx`
- ✅ **MySQL Password**: (yang Anda buat)

---

## 🗄️ Langkah 2: Setup Database MySQL

### 2.1 Buat Database

1. Login ke **Control Panel** (cPanel) InfinityFree
2. Scroll ke bagian **"Databases"**
3. Klik **"MySQL Databases"**
4. Di section **"Create New Database"**:
   - **Database Name**: `poscafe` (akan jadi `epiz_xxxxxxxxx_poscafe`)
   - Klik **"Create Database"**
5. Catat nama database lengkap: `epiz_xxxxxxxxx_poscafe`

### 2.2 Buat User Database (Biasanya Sudah Ada)

User database biasanya sama dengan FTP username. Jika perlu buat baru:
1. Di section **"MySQL Users"**
2. **Username**: (biasanya otomatis sama dengan account)
3. **Password**: Buat password kuat
4. Klik **"Create User"**

### 2.3 Assign User ke Database

1. Di section **"Add User To Database"**
2. Pilih **User** dan **Database** yang sudah dibuat
3. Klik **"Add"**
4. Centang **"ALL PRIVILEGES"**
5. Klik **"Make Changes"**

### 2.4 Akses phpMyAdmin (Opsional)

Untuk import database manual:
1. Kembali ke cPanel
2. Klik **"phpMyAdmin"**
3. Login otomatis
4. Pilih database `epiz_xxxxxxxxx_poscafe`

---

## 📦 Langkah 3: Persiapan Project Laravel

### 3.1 Build Assets Production

Di local computer, jalankan:

```bash
cd c:\laragon\www\Poscafe

# Install dependencies
composer install --optimize-autoloader --no-dev

# Build assets
npm install
npm run build
```

### 3.2 Update File .env

Buat file `.env` baru untuk production (jangan upload `.env` local Anda):

```env
APP_NAME="POS Cafe"
APP_ENV=production
APP_KEY=base64:GENERATE_THIS_LATER
APP_DEBUG=false
APP_URL=https://poscafe.rf.gd

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=sqlxxx.infinityfree.com
DB_PORT=3306
DB_DATABASE=epiz_xxxxxxxxx_poscafe
DB_USERNAME=epiz_xxxxxxxxx
DB_PASSWORD=your_mysql_password

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_DRIVER=file
QUEUE_CONNECTION=sync

FILESYSTEM_DISK=local
```

**PENTING**: Ganti nilai berikut:
- `APP_URL` → URL subdomain Anda
- `DB_HOST` → MySQL hostname dari InfinityFree
- `DB_DATABASE` → Nama database lengkap
- `DB_USERNAME` → MySQL username
- `DB_PASSWORD` → MySQL password

### 3.3 Generate APP_KEY

```bash
php artisan key:generate --show
```

Copy output (contoh: `base64:xxxxxxxxxxxxx`) dan paste ke `.env` di `APP_KEY`

### 3.4 Optimize untuk Production

```bash
# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📤 Langkah 4: Upload Project via FTP

### 4.1 Install FileZilla

Download: [https://filezilla-project.org](https://filezilla-project.org)

### 4.2 Connect ke Server

1. Buka FileZilla
2. Isi connection details:
   - **Host**: `ftpupload.net`
   - **Username**: `epiz_xxxxxxxxx` (dari InfinityFree)
   - **Password**: FTP password Anda
   - **Port**: `21`
3. Klik **"Quickconnect"**

### 4.3 Upload Files

**PENTING**: Upload ke folder `htdocs` (bukan root)

#### Struktur Upload:

```
htdocs/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── (assets lainnya)
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env (file production yang sudah diedit)
├── .htaccess
├── artisan
└── composer.json
```

#### Cara Upload:

1. Di FileZilla, panel kiri = local computer
2. Panel kanan = server (navigate ke `htdocs`)
3. **Drag & drop** semua folder/file dari local ke `htdocs`
4. ⏳ Tunggu upload selesai (~10-30 menit tergantung koneksi)

**File yang TIDAK perlu diupload:**
- ❌ `node_modules/` (terlalu besar, tidak perlu)
- ❌ `.git/` (tidak perlu)
- ❌ `.env.example` (opsional)
- ❌ `tests/` (opsional)

### 4.4 Set Permission Folder Storage

1. Di FileZilla, klik kanan folder `storage`
2. Pilih **"File permissions"**
3. Set permission: **755** atau **777**
4. Centang **"Recurse into subdirectories"**
5. Klik **"OK"**

Ulangi untuk folder:
- `bootstrap/cache` → **755** atau **777**

---

## 🔧 Langkah 5: Setup Laravel di Server

### 5.1 Akses Terminal (Online File Manager)

InfinityFree tidak punya SSH, jadi kita gunakan workaround:

**Opsi 1: Upload Script PHP untuk Run Artisan**

Buat file `setup.php` di local:

```php
<?php
// setup.php - Upload ke htdocs
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "<pre>";
echo "Running migrations...\n";
$kernel->call('migrate', ['--force' => true]);
echo "\nMigrations completed!\n";

echo "\nCreating storage link...\n";
$kernel->call('storage:link');
echo "Storage link created!\n";

echo "\nClearing cache...\n";
$kernel->call('cache:clear');
$kernel->call('config:clear');
$kernel->call('view:clear');
echo "Cache cleared!\n";

echo "\n✅ Setup completed successfully!\n";
echo "</pre>";
```

Upload `setup.php` ke `htdocs`, lalu akses:
```
https://poscafe.rf.gd/setup.php
```

**⚠️ PENTING**: Setelah selesai, **HAPUS** file `setup.php` untuk keamanan!

**Opsi 2: Import Database Manual**

1. Di local, export database:
   ```bash
   php artisan migrate --path=database/migrations
   ```
2. Export database dari phpMyAdmin local
3. Import ke phpMyAdmin InfinityFree

---

## 🎯 Langkah 6: Konfigurasi Final

### 6.1 Update .htaccess Root

Pastikan file `.htaccess` di root (`htdocs/.htaccess`) sudah benar untuk redirect ke `public`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ /public/$1 [L]
</IfModule>
```

### 6.2 Test Aplikasi

Buka browser dan akses:
```
https://poscafe.rf.gd
```

Aplikasi seharusnya sudah berjalan! 🎉

---

## 🐛 Troubleshooting

### Error: "500 Internal Server Error"

**Penyebab**: Permission folder atau .htaccess error

**Solusi**:
1. Cek permission `storage/` dan `bootstrap/cache/` → set **755** atau **777**
2. Cek file `.htaccess` di root dan `public/`
3. Cek `.env` → pastikan `APP_DEBUG=false`

### Error: "Database Connection Failed"

**Solusi**:
1. Cek kredensial database di `.env`
2. Pastikan database sudah dibuat di cPanel
3. Pastikan user sudah di-assign ke database
4. Gunakan **MySQL hostname** dari InfinityFree (bukan `127.0.0.1`)

### Error: "APP_KEY not set"

**Solusi**:
1. Generate APP_KEY di local: `php artisan key:generate --show`
2. Copy output ke `.env` di server
3. Upload ulang file `.env`

### Assets (CSS/JS) Tidak Load

**Solusi**:
1. Pastikan `npm run build` sudah dijalankan di local
2. Upload folder `public/build/` ke server
3. Cek `APP_URL` di `.env` → harus sesuai domain Anda
4. Clear cache browser (Ctrl+F5)

### Error: "Too Many Requests" atau "403 Forbidden"

**Penyebab**: Hit limit InfinityFree (50,000 hits/day)

**Solusi**:
1. Tunggu 24 jam untuk reset
2. Optimize aplikasi untuk reduce requests
3. Gunakan cache lebih agresif

### Website Lambat

**Penyebab**: Shared hosting free tier

**Solusi**:
1. Enable caching di Laravel:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
2. Optimize database queries
3. Gunakan CDN untuk assets (opsional)

---

## 📊 Monitoring & Maintenance

### Cek Resource Usage

1. Login ke cPanel InfinityFree
2. Dashboard menampilkan:
   - Disk usage
   - Bandwidth usage
   - Daily hits

### Backup Database

**Rutin backup database** (minimal 1x seminggu):

1. Login ke phpMyAdmin
2. Pilih database `epiz_xxxxxxxxx_poscafe`
3. Klik tab **"Export"**
4. Pilih **"Quick"** atau **"Custom"**
5. Klik **"Go"**
6. Download file `.sql`

### Update Aplikasi

Untuk update aplikasi:

1. Update code di local
2. Test di local
3. Build assets: `npm run build`
4. Upload file yang berubah via FTP
5. Jika ada migration baru, jalankan via `setup.php` atau import manual

---

## 🔒 Keamanan

### Tips Keamanan:

1. ✅ **Jangan upload `.env` local** - Buat `.env` production terpisah
2. ✅ **Set `APP_DEBUG=false`** di production
3. ✅ **Gunakan password kuat** untuk database
4. ✅ **Hapus file setup.php** setelah digunakan
5. ✅ **Backup database rutin**
6. ✅ **Update Laravel & dependencies** secara berkala

---

## 🎉 Selamat!

Aplikasi POS Cafe Anda sekarang sudah online di InfinityFree! 🚀

**URL Aplikasi**: `https://poscafe.rf.gd` (atau subdomain Anda)

---

## 📞 Butuh Bantuan?

- 📖 [InfinityFree Forum](https://forum.infinityfree.net)
- 💬 [InfinityFree Knowledge Base](https://infinityfree.net/support)
- 📧 [Support Ticket](https://infinityfree.net/support)

---

## 🔄 Alternatif Jika InfinityFree Tidak Cocok

Jika InfinityFree terlalu lambat atau limitasi terlalu ketat:

1. **000webhost** - Mirip InfinityFree, gratis
2. **Awardspace** - Free hosting dengan PHP & MySQL
3. **FreeHosting.com** - 10GB storage gratis
4. **Upgrade ke Paid Hosting** - Hostinger, Niagahoster (~Rp 10-20rb/bulan)

---

**Dibuat dengan ❤️ untuk POS Cafe**
