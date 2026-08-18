# 📁 Sistem Pengarsipan Desa Luwuk

<p align="center">
    <strong>Sistem Informasi Pengarsipan Desa Luwuk</strong>
</p>

<p align="center">
    Aplikasi berbasis web untuk mengelola arsip, surat, pemerintahan,
    pembangunan, keuangan, dan aktivitas administrasi Desa Luwuk
    secara terstruktur dan terintegrasi.
</p>

---

## 📌 Tentang Project

**Sistem Pengarsipan Desa Luwuk** merupakan aplikasi berbasis web yang
dikembangkan untuk membantu proses pengelolaan dan penyimpanan dokumen
administrasi desa.

Sistem ini dirancang untuk mempermudah Admin Desa dalam melakukan
pengarsipan dokumen, pengelolaan surat masuk dan surat keluar,
pengelolaan data perangkat desa, dokumentasi kegiatan pembangunan,
dokumen pembangunan, dokumen keuangan, serta pemantauan aktivitas
yang terjadi di dalam sistem.

Aplikasi menggunakan **Laravel 12** sebagai framework utama dan
**Filament 4** sebagai panel administrasi.

---

## ✨ Fitur Utama

### 📊 Dashboard

Dashboard menyediakan ringkasan informasi sistem secara terpusat.

Fitur Dashboard:

- Welcome Dashboard
- Statistik sistem
- Statistik arsip
- Arsip terbaru
- Aktivitas terbaru
- Tampilan responsive
- Informasi tanggal dan waktu

---

### 📁 Arsip

Digunakan untuk mengelola dokumen arsip desa.

Fitur:

- Arsip Dokumen
- Kategori Arsip
- Tambah arsip
- Edit arsip
- Hapus arsip
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian arsip
- Filter arsip
- Trash
- Restore
- Permanent Delete

---

### ✉️ Surat

Digunakan untuk mengelola administrasi surat desa.

#### Surat Masuk

- Tambah surat masuk
- Edit surat masuk
- Hapus surat masuk
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Trash
- Restore
- Permanent Delete

#### Surat Keluar

- Tambah surat keluar
- Edit surat keluar
- Hapus surat keluar
- Upload dokumen
- Preview dokumen
- Download dokumen
- Pencarian
- Filter
- Trash
- Restore
- Permanent Delete

---

### 🏛️ Pemerintahan

#### Perangkat Desa

Digunakan untuk mengelola data perangkat Desa Luwuk.

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

Status perangkat:

- Aktif
- Tidak Aktif

Fitur dokumen SK:

- Upload SK
- Preview SK
- Membuka dokumen SK di tab baru

---

### 🏗️ Pembangunan

#### Kegiatan Pembangunan

Digunakan untuk mencatat kegiatan pembangunan desa.

Informasi yang tersedia:

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
- Status kegiatan

Status kegiatan:

1. Perencanaan
2. Berjalan
3. Selesai

Urutan kegiatan pada tabel mengikuti prioritas status:

```text
Perencanaan
     ↓
Berjalan
     ↓
Selesai