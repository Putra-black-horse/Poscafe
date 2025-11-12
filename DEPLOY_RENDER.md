# 🚀 Panduan Deploy ke Render.com

Panduan lengkap untuk deploy aplikasi POS Cafe ke Render.com (100% GRATIS).

## 📋 Prasyarat

1. Akun GitHub (untuk push repository)
2. Akun Render.com (gratis, tanpa kartu kredit)
3. Project sudah di-push ke GitHub

---

## 🔧 Langkah 1: Persiapan Repository

### 1.1 Push Project ke GitHub

Jika belum, push project Anda ke GitHub:

```bash
# Inisialisasi git (jika belum)
git init

# Add semua file
git add .

# Commit
git commit -m "Initial commit - Ready for Render deployment"

# Add remote repository (ganti dengan repo Anda)
git remote add origin https://github.com/username/Poscafe.git

# Push ke GitHub
git push -u origin main
```

### 1.2 Pastikan File Konfigurasi Ada

File-file berikut sudah dibuat otomatis:
- ✅ `build.sh` - Script untuk build aplikasi
- ✅ `render.yaml` - Konfigurasi Render
- ✅ `Procfile` - Command untuk menjalankan aplikasi
- ✅ `.env.example` - Template environment variables

---

## 🌐 Langkah 2: Setup di Render.com

### 2.1 Buat Akun Render

1. Buka [https://render.com](https://render.com)
2. Klik **"Get Started for Free"**
3. Sign up dengan GitHub (recommended)
4. Authorize Render untuk akses repository Anda

### 2.2 Buat Database PostgreSQL

1. Di dashboard Render, klik **"New +"**
2. Pilih **"PostgreSQL"**
3. Isi form:
   - **Name**: `poscafe-db`
   - **Database**: `poscafe`
   - **User**: `poscafe`
   - **Region**: Pilih yang terdekat (Singapore untuk Indonesia)
   - **Plan**: **Free** (pilih yang $0/month)
4. Klik **"Create Database"**
5. ⏳ Tunggu database selesai dibuat (~2-3 menit)
6. **PENTING**: Simpan kredensial database (akan muncul setelah selesai)

### 2.3 Deploy Web Service

1. Kembali ke dashboard, klik **"New +"**
2. Pilih **"Web Service"**
3. Connect repository GitHub Anda (pilih repository Poscafe)
4. Isi form deployment:

#### Basic Settings:
- **Name**: `poscafe` (atau nama lain yang Anda inginkan)
- **Region**: Sama dengan database (Singapore)
- **Branch**: `main` (atau branch yang Anda gunakan)
- **Root Directory**: (kosongkan)
- **Runtime**: **PHP**
- **Build Command**: `./build.sh`
- **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`

#### Plan:
- Pilih **"Free"** ($0/month)

### 2.4 Setup Environment Variables

Scroll ke bagian **"Environment Variables"** dan tambahkan:

```
APP_NAME=POS Cafe
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:GENERATE_THIS_LATER
APP_URL=https://your-app-name.onrender.com

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=<dari database yang dibuat tadi>
DB_PORT=5432
DB_DATABASE=poscafe
DB_USERNAME=poscafe
DB_PASSWORD=<dari database yang dibuat tadi>

SESSION_DRIVER=file
SESSION_LIFETIME=120

CACHE_DRIVER=file
QUEUE_CONNECTION=sync

FILESYSTEM_DISK=local
```

**Cara mendapatkan kredensial database:**
1. Buka database `poscafe-db` yang sudah dibuat
2. Klik tab **"Info"**
3. Copy nilai:
   - **Internal Database URL** atau
   - **Hostname** untuk `DB_HOST`
   - **Password** untuk `DB_PASSWORD`

### 2.5 Generate APP_KEY

Setelah deploy pertama kali (akan gagal karena APP_KEY kosong):

1. Buka **"Shell"** di web service Anda
2. Jalankan command:
   ```bash
   php artisan key:generate --show
   ```
3. Copy output (contoh: `base64:xxxxxxxxxxxxx`)
4. Update environment variable `APP_KEY` dengan nilai tersebut
5. Klik **"Save Changes"** dan aplikasi akan auto-redeploy

---

## 🎯 Langkah 3: Deploy!

1. Setelah semua setting selesai, klik **"Create Web Service"**
2. Render akan mulai build dan deploy aplikasi Anda
3. ⏳ Proses ini memakan waktu ~5-10 menit untuk deploy pertama
4. Anda bisa monitor progress di tab **"Logs"**

### Status Deploy:

- 🔵 **Building** - Sedang install dependencies
- 🟡 **Deploying** - Sedang deploy aplikasi
- 🟢 **Live** - Aplikasi sudah online! 🎉

---

## ✅ Langkah 4: Verifikasi

1. Setelah status **"Live"**, klik URL aplikasi Anda
   - Format: `https://your-app-name.onrender.com`
2. Aplikasi POS Cafe Anda seharusnya sudah berjalan!

---

## 🔄 Update Aplikasi

Setiap kali Anda push ke GitHub:

```bash
git add .
git commit -m "Update fitur baru"
git push origin main
```

Render akan **otomatis** detect perubahan dan deploy ulang! 🚀

---

## ⚠️ Catatan Penting

### Free Tier Limitations:

1. **Database PostgreSQL Free**:
   - Expire setelah 90 hari
   - Setelah expire, buat database baru dan migrate data
   - Storage: 1GB

2. **Web Service Free**:
   - Service akan **sleep** setelah 15 menit tidak ada traffic
   - First request setelah sleep akan lambat (~30 detik)
   - 750 jam/bulan (cukup untuk hobby project)

3. **Performance**:
   - Shared CPU
   - 512MB RAM
   - Cukup untuk development/testing

### Tips:

- ✅ Gunakan **file** untuk session & cache (bukan database)
- ✅ Set `QUEUE_CONNECTION=sync` (jangan gunakan queue)
- ✅ Backup database secara berkala
- ✅ Monitor usage di dashboard Render

---

## 🐛 Troubleshooting

### Error: "Permission denied: ./build.sh"

**Solusi**: Buat file executable di local:
```bash
git update-index --chmod=+x build.sh
git commit -m "Make build.sh executable"
git push
```

### Error: "APP_KEY not set"

**Solusi**: Generate APP_KEY via Shell (lihat Langkah 2.5)

### Error: Database Connection Failed

**Solusi**: 
1. Cek kredensial database di Environment Variables
2. Pastikan `DB_CONNECTION=pgsql` (bukan mysql)
3. Pastikan database sudah dalam status "Available"

### Aplikasi Lambat/Sleep

**Solusi**: Ini normal untuk free tier. Aplikasi sleep setelah 15 menit idle.
Untuk keep-alive, bisa gunakan service seperti UptimeRobot (gratis) untuk ping setiap 5 menit.

---

## 📞 Butuh Bantuan?

- 📖 [Dokumentasi Render](https://render.com/docs)
- 💬 [Render Community](https://community.render.com)
- 📧 [Support Render](https://render.com/support)

---

## 🎉 Selamat!

Aplikasi POS Cafe Anda sekarang sudah online dan bisa diakses dari mana saja! 🚀

**URL Aplikasi**: `https://your-app-name.onrender.com`

---

**Dibuat dengan ❤️ untuk POS Cafe**
