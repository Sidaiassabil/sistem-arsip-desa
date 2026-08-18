# 📁 Sistem Pengarsipan Desa Luwuk

<p align="center">
    <strong>Sistem Informasi Pengarsipan Desa Luwuk</strong>
</p>

<p align="center">
    Aplikasi berbasis web untuk membantu pengelolaan arsip,
    surat, pemerintahan, pembangunan, keuangan, dan aktivitas
    administrasi Desa Luwuk secara terstruktur dan terintegrasi.
</p>

---

## 📌 Tentang Project

**Sistem Pengarsipan Desa Luwuk** merupakan aplikasi berbasis web yang
dikembangkan untuk membantu proses pengelolaan, penyimpanan, pencarian,
dan pemantauan dokumen administrasi Desa Luwuk.

Sistem ini dirancang untuk mempermudah Admin Desa dalam mengelola
dokumen secara terstruktur sehingga proses pencatatan dan pencarian
dokumen menjadi lebih mudah, cepat, dan terorganisir.

Aplikasi menyediakan beberapa bagian utama, yaitu:

- Arsip
- Surat
- Pemerintahan
- Pembangunan
- Keuangan
- Laporan
- Dashboard

Sistem dibangun menggunakan **Laravel 12** sebagai framework utama dan
**Filament 4** sebagai panel administrasi.

---

# ✨ Fitur Utama

## 📊 Dashboard

Dashboard menyediakan ringkasan informasi sistem dalam satu halaman.

Fitur Dashboard:

- Welcome Dashboard
- Statistik Sistem
- Statistik Arsip
- Arsip Terbaru
- Aktivitas Terbaru
- Tampilan responsive
- Informasi ringkasan data
- Tampilan dashboard yang disesuaikan dengan kebutuhan administrasi desa

---

# 📁 ARSIP

## Arsip Dokumen

Digunakan untuk mengelola seluruh dokumen arsip desa.

Fitur:

- Tambah arsip
- Edit arsip
- Hapus arsip
- Kategori arsip
- Kode arsip
- Nomor dokumen
- Judul dokumen
- Tahun
- Tanggal dokumen
- Sumber dokumen
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Sorting
- Trash
- Restore
- Permanent Delete

## Kategori Arsip

Digunakan untuk mengelompokkan arsip berdasarkan kategori.

Fitur:

- Tambah kategori
- Edit kategori
- Hapus kategori
- Pencarian kategori
- Pengelompokan arsip berdasarkan kategori

---

# ✉️ SURAT

## Surat Masuk

Digunakan untuk mengelola administrasi surat yang diterima oleh
Pemerintah Desa.

Fitur:

- Tambah surat masuk
- Edit surat masuk
- Hapus surat masuk
- Nomor surat
- Tanggal surat
- Asal surat
- Perihal
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Trash
- Restore
- Permanent Delete

## Surat Keluar

Digunakan untuk mengelola administrasi surat yang dikeluarkan oleh
Pemerintah Desa.

Fitur:

- Tambah surat keluar
- Edit surat keluar
- Hapus surat keluar
- Nomor surat
- Tanggal surat
- Tujuan surat
- Perihal
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Trash
- Restore
- Permanent Delete

---

# 🏛️ PEMERINTAHAN

## Perangkat Desa

Digunakan untuk mengelola data Perangkat Desa Luwuk.

Data yang dikelola meliputi:

- Foto perangkat desa
- Nama
- Jabatan
- NIP / NIK
- Nomor SK
- Tanggal SK
- Status
- Keterangan
- File SK

Fitur dokumen:

- Upload SK
- Preview SK
- Membuka dokumen pada browser
- Pengelolaan data perangkat desa

Status perangkat dapat digunakan untuk membedakan perangkat yang
masih aktif dan tidak aktif.

---

# 🏗️ PEMBANGUNAN

## Kegiatan Pembangunan

Digunakan untuk mencatat dan mengelola kegiatan pembangunan desa.

Data yang tersedia:

- Foto kegiatan
- Nama kegiatan
- Lokasi
- Tahun
- Anggaran
- Sumber dana
- Volume
- Pelaksana
- Tanggal mulai
- Tanggal selesai
- Status

### Status Kegiatan

Kegiatan pembangunan memiliki tiga status:

```text
Perencanaan
     ↓
Berjalan
     ↓
Selesai
```

Urutan kegiatan pada tabel dibuat berdasarkan prioritas status:

1. Perencanaan
2. Berjalan
3. Selesai

Dengan demikian kegiatan yang masih dalam tahap **Perencanaan**
ditampilkan terlebih dahulu, kemudian kegiatan **Berjalan**, dan
kegiatan **Selesai** berada setelahnya.

## Dokumen Pembangunan

Digunakan untuk mengelola dokumen yang berkaitan dengan pembangunan
desa.

Fitur:

- Tambah dokumen
- Edit dokumen
- Hapus dokumen
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Informasi dokumen pembangunan

---

# 💰 KEUANGAN

## Dokumen Keuangan

Digunakan untuk mengelola dokumen administrasi keuangan desa.

Fitur:

- Tambah dokumen
- Edit dokumen
- Hapus dokumen
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Pengelolaan dokumen keuangan

---

# 📋 LAPORAN

## Log Aktivitas

Log Aktivitas digunakan sebagai catatan aktivitas pengguna di dalam
sistem.

Log digunakan untuk membantu mengetahui aktivitas yang dilakukan
di dalam aplikasi.

Informasi aktivitas dapat mencakup:

- Pengguna
- Aktivitas
- Modul
- Data yang diproses
- Waktu aktivitas
- Informasi aktivitas lainnya

Log Aktivitas digunakan sebagai **audit trail**.

Log Aktivitas bukan merupakan modul CRUD data biasa.

---

# 🧭 Struktur Navigasi

Struktur menu sistem:

```text
Dashboard

ARSIP
├── Arsip Dokumen
└── Kategori Arsip

SURAT
├── Surat Masuk
└── Surat Keluar

PEMERINTAHAN
└── Perangkat Desa

PEMBANGUNAN
├── Kegiatan Pembangunan
└── Dokumen Pembangunan

KEUANGAN
└── Dokumen Keuangan

LAPORAN
└── Log Aktivitas
```

---

# 🛠️ Teknologi

Teknologi utama yang digunakan:

| Teknologi | Versi / Keterangan |
|---|---|
| PHP | 8.3+ |
| Laravel | 12 |
| Filament | 4 |
| Livewire | 3 |
| MySQL / MariaDB | Database |
| Vite | Asset bundling |
| Composer | Dependency management |
| NPM | Frontend dependency |
| Laragon | Local development |

---

# 📋 Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan komputer telah memiliki:

- PHP 8.3 atau lebih baru
- Composer
- Node.js
- NPM
- MySQL atau MariaDB
- Git
- Laragon atau web server lainnya

Pastikan juga extension PHP yang dibutuhkan Laravel tersedia pada
instalasi PHP yang digunakan.

---

# 🚀 Instalasi

Ikuti langkah berikut untuk menjalankan Sistem Pengarsipan Desa Luwuk
pada lingkungan lokal.

## 1. Clone Repository

Clone repository dari GitHub:

```bash
git clone https://github.com/Sidaiassabil/sistem-arsip-desa.git
```

Masuk ke folder project:

```bash
cd sistem-arsip-desa
```

---

## 2. Install Dependency Laravel

Install seluruh dependency PHP menggunakan Composer:

```bash
composer install
```

---

## 3. Install Dependency Frontend

Install dependency JavaScript:

```bash
npm install
```

---

## 4. Membuat File Environment

Salin `.env.example` menjadi `.env`.

### Windows PowerShell

```powershell
Copy-Item .env.example .env
```

### Windows Command Prompt

```cmd
copy .env.example .env
```

---

## 5. Konfigurasi Environment

Buka file:

```text
.env
```

Kemudian sesuaikan konfigurasi aplikasi.

Contoh:

```env
APP_NAME="Sistem Arsip Desa"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arsip_desa_luwuk
DB_USERNAME=root
DB_PASSWORD=
```

Jika MySQL menggunakan password, isi:

```env
DB_PASSWORD=password_database
```

Jangan memasukkan file `.env` ke repository.

---

## 6. Generate Application Key

Setelah file `.env` tersedia, jalankan:

```bash
php artisan key:generate
```

Perintah ini akan membuat `APP_KEY` secara otomatis.

---

# 🗄️ Konfigurasi Database

## 7. Membuat Database

Buat database MySQL / MariaDB dengan nama:

```text
arsip_desa_luwuk
```

Jika menggunakan Laragon, database dapat dibuat melalui:

- HeidiSQL
- phpMyAdmin
- MySQL command line
- Database manager lainnya

Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arsip_desa_luwuk
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password dengan konfigurasi database
pada komputer masing-masing.

---

## 8. Menjalankan Migration

Setelah database dibuat, jalankan:

```bash
php artisan migrate
```

Migration akan membuat tabel yang dibutuhkan oleh aplikasi.

Termasuk tabel untuk:

- Users
- Cache
- Jobs
- Kategori Arsip
- Arsip
- Surat Masuk
- Surat Keluar
- Perangkat Desa
- Kegiatan Pembangunan
- Dokumen Pembangunan
- Dokumen Keuangan
- Log Aktivitas

---

## 9. Seeder Database

Jika project memiliki data awal yang perlu dibuat melalui seeder,
jalankan:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate --seed
```

Seeder dapat disesuaikan dengan kebutuhan data awal aplikasi.

---

# 📁 Konfigurasi Storage

## 10. Membuat Storage Link

Jalankan:

```bash
php artisan storage:link
```

Perintah ini membuat symbolic link dari storage Laravel ke folder
public sehingga file yang diizinkan dapat diakses oleh aplikasi.

Fitur yang menggunakan penyimpanan file antara lain:

- Arsip Dokumen
- Surat Masuk
- Surat Keluar
- SK Perangkat Desa
- Kegiatan Pembangunan
- Dokumen Pembangunan
- Dokumen Keuangan

---

# 🎨 Asset Frontend

## 11. Menjalankan Asset Development

Untuk menjalankan Vite dalam mode development:

```bash
npm run dev
```

Biarkan proses tersebut tetap berjalan selama development.

Pada terminal lain jalankan Laravel:

```bash
php artisan serve
```

---

## 12. Build Asset Production

Untuk membuat asset production:

```bash
npm run build
```

Hasil build akan digunakan oleh aplikasi Laravel pada environment
production.

---

# ▶️ Menjalankan Aplikasi

## 13. Menjalankan Laravel

Jalankan:

```bash
php artisan serve
```

Secara default aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

Panel Admin:

```text
http://127.0.0.1:8000/admin
```

Halaman login:

```text
http://127.0.0.1:8000/admin/login
```

---

# 👤 Hak Akses

Sistem menggunakan satu role pengguna:

```text
Admin
```

Admin memiliki akses ke seluruh fitur administrasi yang tersedia
di dalam panel.

Alur akses:

```text
Login
  ↓
Admin
  ↓
Dashboard
  ↓
Seluruh Modul
```

Seluruh panel administrasi dilindungi oleh autentikasi.

---

# 🔐 Keamanan

Sistem menerapkan beberapa mekanisme keamanan Laravel dan Filament,
antara lain:

- Authentication
- Session management
- CSRF protection
- Middleware authentication
- Validasi form
- Validasi upload
- Laravel Filesystem
- Soft Delete
- Restore data
- Permanent Delete
- Pencatatan aktivitas
- Proteksi halaman admin

## File Environment

File berikut tidak boleh dipublikasikan:

```text
.env
```

Repository hanya menyediakan:

```text
.env.example
```

Setiap pengguna yang melakukan instalasi harus membuat `.env`
sendiri.

---

# 📤 Upload Dokumen

Sistem menyediakan fitur upload dokumen untuk beberapa modul.

Dokumen digunakan pada:

```text
Arsip
Surat Masuk
Surat Keluar
Perangkat Desa
Dokumen Pembangunan
Dokumen Keuangan
```

Setelah instalasi, pastikan:

```bash
php artisan storage:link
```

telah dijalankan.

---

# 👁️ Preview Dokumen

Sistem menyediakan halaman preview untuk dokumen tertentu.

Alur penggunaan:

```text
Data
  ↓
Dokumen
  ↓
Preview
  ↓
Browser
```

Dokumen yang dapat ditampilkan oleh browser dapat dibuka melalui
halaman preview.

Dokumen juga dapat disediakan melalui fitur download sesuai
konfigurasi aplikasi.

---

# 🗑️ Trash dan Restore

Data tertentu menggunakan mekanisme Soft Delete.

Alur penghapusan:

```text
Data Aktif
     ↓
Delete
     ↓
Trash
     ├── Restore
     └── Permanent Delete
```

### Restore

Data yang berada di Trash dapat dikembalikan ke data aktif.

### Permanent Delete

Data dapat dihapus secara permanen apabila memang sudah tidak
dibutuhkan.

---

# 📊 Dashboard

Dashboard memberikan ringkasan informasi sistem.

Komponen dashboard meliputi:

```text
Welcome Dashboard
        ↓
Statistik Sistem
        ↓
Statistik Arsip
        ↓
Arsip Terbaru
        ↓
Aktivitas Terbaru
```

## Statistik Arsip

Menampilkan informasi seperti:

- Total Arsip
- Arsip Aktif
- Arsip di Sampah
- Arsip Tahun Ini

## Arsip Terbaru

Menampilkan dokumen arsip yang baru ditambahkan ke sistem.

## Aktivitas Terbaru

Menampilkan aktivitas terbaru yang tercatat pada sistem.

---

# 🧪 Testing

Pengujian dilakukan pada fitur utama sistem.

Fitur yang diuji meliputi:

- Login Admin
- Dashboard
- Arsip Dokumen
- Kategori Arsip
- Surat Masuk
- Surat Keluar
- Perangkat Desa
- Preview SK
- Kegiatan Pembangunan
- Status kegiatan
- Dokumen Pembangunan
- Dokumen Keuangan
- Log Aktivitas
- Upload dokumen
- Preview dokumen
- Download dokumen
- Trash
- Restore
- Permanent Delete
- Search
- Filter
- Sorting
- Responsive interface

Status pengujian:

```text
✅ Sistem berjalan dengan baik
```

---

# 📂 Struktur Folder Project

Struktur utama project:

```text
sistem-arsip-desa/
│
├── app/
│   ├── Filament/
│   │   ├── Pages/
│   │   ├── Resources/
│   │   └── Widgets/
│   │
│   ├── Http/
│   │   └── Controllers/
│   │
│   ├── Models/
│   ├── Observers/
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│
├── storage/
│
├── tests/
│
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── vite.config.js
└── README.md
```

---

# 🧰 Perintah Artisan yang Berguna

## Membersihkan Cache

```bash
php artisan optimize:clear
```

## Menjalankan Server

```bash
php artisan serve
```

## Menjalankan Migration

```bash
php artisan migrate
```

## Menjalankan Seeder

```bash
php artisan db:seed
```

## Membuat Storage Link

```bash
php artisan storage:link
```

## Membuat Model

```bash
php artisan make:model NamaModel
```

## Membuat Migration

```bash
php artisan make:migration nama_migration
```

## Membuat Filament Resource

```bash
php artisan make:filament-resource NamaModel
```

## Membuat Filament Widget

```bash
php artisan make:filament-widget NamaWidget
```

---

# 🔄 Pengembangan Setelah Clone

Setelah repository berhasil di-clone dan project sudah di-install,
alur pengembangan secara umum:

```bash
git pull
```

Kemudian setelah melakukan perubahan:

```bash
git add .
git commit -m "Deskripsi perubahan"
git push
```

Contoh:

```bash
git add .
git commit -m "Update dashboard"
git push
```

---

# 💾 Backup Database

Git hanya menyimpan source code dan file yang memang masuk ke
repository.

Data database MySQL tidak otomatis tersimpan di GitHub.

Oleh karena itu database sebaiknya di-backup secara berkala.

Contoh menggunakan `mysqldump`:

```bash
mysqldump -u root -p arsip_desa_luwuk > arsip_desa_luwuk.sql
```

Jika MySQL tidak menggunakan password:

```bash
mysqldump -u root arsip_desa_luwuk > arsip_desa_luwuk.sql
```

Untuk melakukan restore:

```bash
mysql -u root -p arsip_desa_luwuk < arsip_desa_luwuk.sql
```

> File backup database sebaiknya disimpan di tempat yang aman dan
> tidak perlu dimasukkan ke repository GitHub.

---

# 🚀 Deployment

Untuk deployment ke server production, beberapa konfigurasi harus
disesuaikan.

## Environment Production

Contoh:

```env
APP_ENV=production
APP_DEBUG=false
```

Database harus menggunakan database production.

## Build Asset

Jalankan:

```bash
npm run build
```

## Storage

Pastikan storage telah dikonfigurasi:

```bash
php artisan storage:link
```

## Migration

Jika diperlukan:

```bash
php artisan migrate --force
```

Document root web server harus diarahkan ke:

```text
public/
```

Jangan menggunakan:

```env
APP_DEBUG=true
```

pada production.

---

# 🔄 Alur Sistem

Secara umum alur aplikasi:

```text
                    ┌──────────────┐
                    │    LOGIN     │
                    └──────┬───────┘
                           │
                           ▼
                    ┌──────────────┐
                    │   DASHBOARD  │
                    └──────┬───────┘
                           │
          ┌────────────────┼────────────────┐
          │                │                │
          ▼                ▼                ▼
       ARSIP             SURAT        PEMERINTAHAN
          │                │                │
          ▼                ▼                ▼
    Arsip Dokumen     Surat Masuk     Perangkat Desa
    Kategori Arsip    Surat Keluar
          │
          └────────────────┐
                           ▼
                     PEMBANGUNAN
                           │
                ┌──────────┴──────────┐
                ▼                     ▼
        Kegiatan Pembangunan   Dokumen Pembangunan
                │
                ▼
          KEUANGAN
                │
                ▼
        Dokumen Keuangan
                │
                ▼
           LOG AKTIVITAS
```

---

# 📌 Catatan Pengembangan

Sistem ini dirancang dengan satu role utama:

```text
Admin
```

Tidak terdapat modul khusus untuk pengelolaan Role & Permission
karena sistem dirancang untuk kebutuhan administrasi internal desa.

Log Aktivitas digunakan sebagai catatan aktivitas sistem dan bukan
sebagai tempat untuk membuat aktivitas secara manual.

---

# 📝 Git Repository

Repository project:

```text
https://github.com/Sidaiassabil/sistem-arsip-desa
```

Branch utama:

```text
main
```

---

# 📄 Lisensi

Project ini dikembangkan untuk kebutuhan:

**Sistem Pengarsipan Desa Luwuk**

Penggunaan, pengembangan, dan distribusi project dapat disesuaikan
dengan kebutuhan serta kebijakan pihak Desa Luwuk.

---

# 👨‍💻 Pengembangan

**Sistem Pengarsipan Desa Luwuk**

Teknologi utama:

```text
Laravel 12
Filament 4
Livewire 3
MySQL / MariaDB
Vite
```

---

<p align="center">
    <strong>© Sistem Pengarsipan Desa Luwuk</strong>
</p>