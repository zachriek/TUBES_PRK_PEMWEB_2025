# BeliLokal (Marketplace Lokal)

## Daftar Anggota
| No | Nama                                   | NPM         |
|----|----------------------------------------|-------------|
| 1  | Muhammad Zachrie Kurniawan             | 2315061113  |
| 2  | Aleea Carisa Danielle Kalalo           | 2315061023  |
| 3  | Anggun Azqiyah Azzahra                 | 2355061005  |
| 4  | Lutfiya Fakhira                        | 2315061085  |
| 5  | Nur Aila Zahra                         | 2315061035  |

---

## Judul Proyek  
**BeliLokal**

---

## Ringkasan Proyek  
BeliLokal adalah aplikasi berbasis website yang digunakan untuk membantu UMKM dalam memasarkan produk mereka secara digital di daerah tertentu.  
Fitur utama:
- Registrasi & Login Pengguna (Pembeli dan Penjual)
- Pengelolaan Produk oleh Penjual
- Keranjang Belanja oleh Pembeli
- Checkout dan Riwayat Transaksi
- Pencarian Produk & Kategori
- Dashboard sederhana untuk melihat aktivitas penjualan

Tujuan dibuatnya aplikasi ini adalah mendukung transformasi digital UMKM dan memperluas jangkauan pemasaran produk mereka.

---

## Cara Menjalankan Aplikasi

### Persyaratan Sistem
- PHP minimal versi 8.2.4 atau lebih tinggi
- MySQL/MariaDB
- Web Server (Apache/Nginx), disarankan menggunakan **XAMPP/Laragon**
- Browser Web

### Langkah Instalasi
1. Clone atau download repository
   ```bash
   git clone https://github.com/zachriek/TUBES_PRK_PEMWEB_2025.git
   ```

2. Pindahkan folder project ke dalam direktori web server:
   * Jika menggunakan XAMPP ➜ `C:\xampp\htdocs\TUBES_PRK_PEMWEB_2025\kelompok\kelompok_34\src`
   
3. Import database:
   * Buka **phpMyAdmin**
   * Buat database: `beli_lokal`
   * Import file `beli_lokal.sql` yang berada di folder `database/`

4. Konfigurasi koneksi database di file:
   ```
   src/config/database.php
   ```

   Sesuaikan:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "beli_lokal";
   ```

5. Jalankan aplikasi melalui browser:
   ```
   http://localhost/TUBES_PRK_PEMWEB_2025/kelompok/kelompok_34/src/
   ```

---

## Akun Demo

| Role    | Email          | Password  |
| ------- | -------------- | --------- |
| -----   | -----          | --------  |
| ------- | ------         | --------- |
| Pembeli | buyer          | buyer123  |

---