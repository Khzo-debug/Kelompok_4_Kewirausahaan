# KELOMPOK 4 - KEWIRAUSAHAAN B

## PENCATATAN & PEMANTAUAN PEMBAYARAN KOS

### ANGGOTA KELOMPOK

| No. | Nama | NIM |
|---|---|---|
| 1. | Alifasya Fahrizy Tamher | 4525210121 |
| 2. | Aban Riziq Ariyanto | 4524210002 |
| 3. | Khoiril Chandra | 4524210049 |
| 4. | Steven Marvellius Agusto S | 4524210098 |
| 5. | Maria Natalia Alyssa Beli | 4524210133 |

**Dosen Pengampu**: Adi Wahyu Pribadi, S.Si., M.Kom

**Program Studi Teknik Informatika**  
**Fakultas Teknik Universitas Pancasila**  
**2026/2027**

---

# Link Video Wawancara
https://drive.google.com/drive/folders/1l4nOx1xUz2FCpVMeaJBx3_wZJZzMScea

---

## 🛠️ Teknologi & Tech Stack

* **Framework:** Laravel 13
* **Bahasa Pemrograman:** PHP 8.5.11
* **Database:** SQLite
* **Styling Framework:** Tailwind CSS
* **Autentikasi & Authorization:** Laravel Breeze (Admin/Pemilik vs Tenant/Penghuni)
* **Laporan Cetak:** `barryvdh/laravel-dompdf`

---

## ✨ Fitur Utama Sistem

1. **Dashboard Pemantauan Keuangan & Kamar:**
   - Ringkasan total pemasukan kos.
   - Status kamar terisi (`occupied`) dan kosong (`available`).
   - Statistik total penghuni aktif.
2. **Hak Akses Berdasarkan Role (RBAC):**
   - **Admin (Pemilik Kos):** Memiliki hak akses penuh untuk pencatatan pembayaran baru, mengunggah bukti bayar, dan mengunduh laporan PDF.
   - **Tenant (Penghuni Kos):** Dapat login untuk melihat riwayat serta status tagihan pembayaran milik sendiri.
3. **Pencatatan & Riwayat Pembayaran:**
   - Pencatatan metode bayar (Transfer / Cash).
   - Penambahan & pratinjau bukti foto transfer via `storage:link`.
4. **Ekspor Laporan PDF:**
   - Cetak rekapitulasi data pembayaran kos secara otomatis.

---

## 🚀 Panduan Jalankan Proyek

<Sequence>
  <Step title="1. Clone & Install Dependencies">
    ```bash
    git clone [https://github.com/username/my-app.git](https://github.com/username/my-app.git)
    cd my-app
    composer install
    npm install && npm run build
    ```
  </Step>

  <Step title="2. Konfigurasi Environment & Key">
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
  </Step>

  <Step title="3. Jalankan Migration & Seeder">
    ```bash
    php artisan migrate:fresh --seed
    ```
  </Step>

  <Step title="4. Buat Storage Link & Jalankan Server">
    ```bash
    php artisan storage:link
    php artisan serve
    ```
  </Step>
</Sequence>

---

## 🔑 Kredensial Akun Testing

* **Admin (Pemilik Kos):** `admin@kos.com` | Password: `password123`
* **Tenant (Penghuni):** `budi@gmail.com` | Password: `password123`
