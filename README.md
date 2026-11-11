# Website Harlie Tour

Website Harlie Tour dibuat dengan Laravel 12 dan Blade. Tampilan utama ada di
`resources/views/home.blade.php`; file CSS, JavaScript, dan gambar berada di
`public/`.

## Persyaratan

- PHP 8.2 atau lebih baru dengan ekstensi yang dibutuhkan Laravel
- Composer

## Menjalankan secara lokal

Jalankan perintah berikut dari PowerShell di folder proyek:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item -ItemType File -Path database/database.sqlite -Force
php artisan migrate --seed
php artisan serve
```

Buka `http://127.0.0.1:8000`. Jika menggunakan PHP XAMPP, ganti `php artisan`
dengan:

```powershell
& 'C:\xampp\php\php.exe' artisan migrate --seed
```

### Menggunakan VS Code Live Server

Live Server dapat dipakai untuk membuka `index.html` sekaligus mengirim booking
ke Laravel. Jalankan Laravel di port `8001`, lalu buka halaman lewat Live Server
di port `5500`. Gunakan hostname yang sama untuk kedua alamat, misalnya
`127.0.0.1` untuk Live Server dan Laravel. Origin yang diizinkan diatur melalui
`LIVE_SERVER_ORIGINS` pada `.env`; jika Live Server memakai port lain, sesuaikan
nilainya dan jalankan `php artisan config:clear`.

```dotenv
LIVE_SERVER_ORIGINS=http://127.0.0.1:5500,http://localhost:5500
```

Contoh: buka `http://127.0.0.1:5500/index.html` dari Live Server dan biarkan
Laravel tetap berjalan di `http://127.0.0.1:8001`. Jangan campur hostname
`localhost` dan `127.0.0.1` dalam satu alur, karena cookie sesi harus ikut
terkirim ke Laravel.

## Database dan data demo

SQLite digunakan sebagai database lokal bawaan. Untuk memakai MySQL dari XAMPP,
buat database `harlie_tour`, lalu atur `DB_CONNECTION`, `DB_HOST`, `DB_PORT`,
`DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`. Setelah itu jalankan:

```powershell
php artisan migrate --seed
```

Migrasi membuat tabel kota, rute, jadwal, dan booking. Seeder mengisi kota serta
rute untuk keperluan demo. Tarif, durasi, dan jadwal yang ditampilkan merupakan
perkiraan aplikasi; konfirmasikan ketersediaan dan harga aktual kepada Harlie
Tour sebelum perjalanan.

## Alur booking

Form di halaman utama mengirim permintaan ke `POST /bookings`. Laravel
memvalidasi data, menghitung tarif berdasarkan rute dan kelas, memeriksa
kapasitas, lalu menyimpan booking dengan status `pending`. Untuk shuttle, kursi
ditahan selama 30 menit sambil menunggu konfirmasi melalui WhatsApp. Informasi
penerbangan dan tarifnya hanya perkiraan dan perlu dikonfirmasi secara manual.

Booking dan pembayaran dapat diperbarui secara manual melalui halaman admin.
Pengelolaan jadwal dari dashboard dan integrasi pembayaran online belum
tersedia. Ulasan di halaman utama merupakan contoh tampilan, bukan ulasan
pelanggan terverifikasi.

## Admin

Jalankan migrasi untuk membuat tabel pengguna, lalu buat akun admin dari
terminal. Perintah ini meminta nama, email, dan kata sandi; tidak ada akun admin
default maupun halaman pendaftaran publik.

```powershell
php artisan migrate
php artisan admin:create
```

Buka `http://127.0.0.1:8000/admin/login` untuk masuk dan mengelola booking.
Admin dapat mengonfirmasi atau membatalkan booking, menandai perjalanan selesai,
serta memperbarui status pembayaran setelah memeriksa transaksi secara manual.

## Menjalankan test

Test memeriksa halaman utama, penyimpanan booking, validasi data pemesan, dan
batas kapasitas kursi. Jalankan dengan PHP XAMPP:

```powershell
& 'C:\xampp\php\php.exe' vendor/phpunit/phpunit/phpunit --configuration phpunit.xml
```

Database test menggunakan SQLite in-memory sehingga tidak mengubah database
lokal.
