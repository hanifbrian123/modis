# MODIS — Sistem Monitoring Aktivitas Dan Pelanggaran Peserta Didik Sman 1 Gresik Berbasis Website

## Overview Aplikasi

Aplikasi **MODIS** digunakan oleh tiga aktor utama: **Admin**, **Guru BK**, dan **Siswa**. Berikut beberapa tampilan (berdasarkan folder `public/img`) dalam ukuran yang lebih kecil.

### Guru BK


* Halaman laporan 

<img src="public/img/halaman-laporan-g.png" width="350" />

* Daftar pelanggaran 

<img src="public/img/daftar-pelanggaran.png" width="350" />

* Daftar pesan konseling 

<img src="public/img/daftar-pesan-konseling.png" width="350" />

* Background halaman utama Guru BK 

<img src="public/img/bg-all.png" width="350" />

### Siswa


* Homepage siswa 

<img src="public/img/homepage-siswa.png" width="350" />

* Melaporkan pelanggaran 

<img src="public/img/melaporkan-pelanggaran.png" width="350" />

* Menu konsultasi 

<img src="public/img/menu-konsultasi.png" width="350" />

* Background halaman login siswa 

<img src="public/img/bg-login.png" width="350" />

### Admin


* Daftar akun dan password guru & siswa 

<img src="public/img/daftar-akun-pw.png" width="350" />

* Tambah akun siswa 

<img src="public/img/tambah-akun-s.png" width="350" />

* Tambah akun guru BK 

<img src="public/img/tambah-akun-g.png" width="350" />

---

## Menjalankan Aplikasi MODIS

### 1. Clone Repository

```bash
git clone https://github.com/hanifbrian123/modis.git
cd modis
```

### 2. Setup Database

* Pastikan web server dan database sudah berjalan (XAMPP/WAMP/Laragon).
* Import database dari file **`modis.sql`** yang berada di root repository.

### 3. Menjalankan Aplikasi

Akses aplikasi melalui folder public.

Jika menggunakan XAMPP dan repo berada di `xampp/htdocs/modis`, maka aplikasi dapat diakses menggunakan:

```
http://localhost/modis/public
```

## Kredensial Login Untuk Demo

Berikut beberapa kredensial untuk mencoba aplikasi:

### Admin

* **Username/NIP/NIS:** `ADM001`
* **Password:** `adminpass1`

### Siswa

**Siswa 1**

* Username/NIP/NIS: `232312010001`
* Password: `aa15ceb1f0a50087`

**Siswa 2**

* Username/NIP/NIS: `232312010002`
* Password: `3464ba574d5f440a`

**Siswa 3**

* Username/NIP/NIS: `232312010003`
* Password: `e88973d2c2484b3e`

### Guru BK

**Guru BK 1**

* Username/NIP/NIS: `198807152001`
* Password: `bkpass1`

**Guru BK 2**

* Username/NIP/NIS: `197905102002`
* Password: `bkpass2`

**Guru BK 3**

* Username/NIP/NIS: `351456789159`
* Password: `1qaz2wsx`
