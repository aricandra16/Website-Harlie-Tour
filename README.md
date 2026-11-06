# Harlie Tour - Laravel

Website Harlie Tour ini menggunakan Laravel 12 dan Blade. Aset CSS, JavaScript,
dan gambar berada di `public/`; tampilan utama berada di
`resources/views/home.blade.php`.

## Persyaratan

- PHP 8.2 atau lebih baru beserta ekstensi Laravel yang dibutuhkan
- Composer

## Menjalankan secara lokal (PowerShell)

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve
```

Kemudian buka `http://127.0.0.1:8000`.

Alur booking yang sudah ada tetap merupakan simulasi di sisi browser dan
menyimpan data di `localStorage`; penyimpanan pesanan ke database belum dibuat.
