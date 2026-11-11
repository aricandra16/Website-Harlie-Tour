<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Harlie Tour | Booking Perjalanan dan Paket Wisata</title>
  <meta name="description" content="Cari rute shuttle, lihat perkiraan perjalanan udara, dan jelajahi pilihan paket wisata bersama Harlie Tour.">
  <meta name="theme-color" content="#0c4a6e">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Harlie Tour | Booking Perjalanan dan Paket Wisata">
  <meta property="og:description" content="Cari rute shuttle, lihat perkiraan perjalanan udara, dan jelajahi pilihan paket wisata bersama Harlie Tour.">
  <meta property="og:image" content="{{ asset('assets/harlie-tour-logo.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/harlie-tour-logo.png') }}?v=4">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=16">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar" aria-label="Navigasi utama">
    <div class="container nav-inner">
      <a href="#beranda" class="logo">
        <img class="logo-image" src="{{ asset('assets/harlie-tour-logo.png') }}" alt="Logo Harlie Tour Indonesia">
      </a>

      <ul class="nav-links" id="navLinks">
        <li><a href="#beranda" class="nav-link active">Home</a></li>
        <li><a href="#paket-tour" class="nav-link nav-link-highlight">Paket Wisata</a></li>
        <li><a href="#booking" class="nav-link nav-link-highlight">Booking Tiket</a></li>
        <li class="nav-dropdown" id="aboutDropdown">
          <button class="nav-link nav-dropdown-toggle" id="aboutMenuToggle" type="button" aria-expanded="false" aria-controls="aboutSubmenu">
            About
            <svg viewBox="0 0 16 16" aria-hidden="true"><path d="m3.5 6 4.5 4 4.5-4"/></svg>
          </button>
          <ul class="nav-submenu" id="aboutSubmenu">
            <li><a href="#tentang">Tentang Harlie Tour</a></li>
            <li><a href="#info-perjalanan">Informasi Perjalanan</a></li>
            <li><a href="#ulasan">Ulasan Pelanggan</a></li>
          </ul>
        </li>
        <li><a href="#dokumentasi" class="nav-link">Dokumentasi</a></li>
        <li><a href="#kontak" class="nav-link">Hubungi Kami</a></li>
      </ul>

      <div class="nav-right">
        <button class="hamburger" id="hamburger" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="navLinks">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </nav>

  <!-- BERANDA / HERO -->
  <section class="hero" id="beranda">
    <div class="hero-bg"></div>
    <div class="container hero-content">
      <div class="hero-badge">Shuttle antarkota dan pilihan perjalanan udara</div>
      <h1 class="hero-title">
        Berangkat ke kota tujuan,<br>
        <span class="text-gradient">dengan lebih mudah</span>
      </h1>
      <p class="hero-desc">
        Pilih shuttle antarkota atau lihat perkiraan perjalanan udara. Hubungi tim kami untuk memastikan jadwal dan harga.
      </p>
      <div class="hero-actions">
        <a href="#booking" class="btn btn-primary btn-lg">Cari Perjalanan</a>
        <a href="#tentang" class="btn btn-outline btn-lg">Tentang Harlie Tour</a>
      </div>

      <div class="hero-stats">
        <div class="stat-item">
          <strong>Shuttle</strong>
          <span>Antarkota &amp; lintas negara</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <strong>Pesawat</strong>
          <span>Jadwal dan tarif perkiraan</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <strong>3 Kelas</strong>
          <span>Ekonomi, Executive, dan VIP</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <strong>WhatsApp</strong>
          <span>Konfirmasi pemesanan</span>
        </div>
      </div>
    </div>
  </section>

  <!-- TENTANG KAMI -->
  <section class="section about-section" id="tentang">
    <div class="container">
      <div class="about-grid">
        <div class="about-content">
          <span class="section-label">Tentang Harlie Tour</span>
          <h2>Layanan perjalanan Harlie Tour</h2>
          <p class="about-lead">
            Kami melayani shuttle antarkota dan membantu pelanggan mencari pilihan perjalanan udara.
          </p>
          <p>
            Berdiri sejak 2007, Harlie Tour membantu pelanggan merencanakan perjalanan dan mengirim permintaan pemesanan dengan lebih mudah.
          </p>

          <div class="about-points">
            <div class="point">
              <div class="point-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              </div>
              <div>
                <strong>Keselamatan sebagai prioritas</strong>
                <span>Pengemudi berpengalaman dan armada yang terawat mendukung perjalanan Anda.</span>
              </div>
            </div>
            <div class="point">
              <div class="point-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div>
                <strong>Informasi perjalanan yang jelas</strong>
                <span>Lihat pilihan rute dan jadwal sebelum mengirim permintaan pemesanan.</span>
              </div>
            </div>
            <div class="point">
              <div class="point-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
              </div>
              <div>
                <strong>Dukungan yang ramah</strong>
                <span>Hubungi tim kami untuk menanyakan jadwal dan layanan.</span>
              </div>
            </div>
          </div>
          <a class="about-cta" href="#booking">
            Lihat pilihan perjalanan
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg>
          </a>
        </div>

        <div class="about-visual">
          <div class="about-photo">
            <img class="about-photo-image" src="{{ asset('assets/harlie-about-travel.jpg') }}" alt="Rumah warna-warni di tepi laut Cinque Terre, Italia" loading="lazy">
            <span class="about-photo-badge">Melayani perjalanan sejak 2007</span>
            <span class="about-photo-globe" role="img" aria-label="Perjalanan domestik dan internasional">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/></svg>
            </span>
            <div class="about-photo-copy">
              <strong>Mau ke mana hari ini?</strong>
              <span>Cek rute dan tanggal, lalu hubungi kami untuk memastikan jadwal.</span>
            </div>
          </div>
          <div class="about-card-main">
            <div class="about-card-stat">
              <span class="big-num">8+</span>
              <span>Tahun pengalaman</span>
            </div>
            <div class="about-card-stat">
              <span class="big-num">200+</span>
              <span>Pool dan outlet</span>
            </div>
            <div class="about-card-stat">
              <span class="big-num">98%</span>
              <span>Kepuasan Pelanggan</span>
            </div>
            <div class="about-card-stat">
              <span class="big-num">24/7</span>
              <span>Layanan Siaga</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PAKET TOUR -->
  <section class="section tour-packages-section" id="paket-tour">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Pilih Destinasi</span>
        <h2>Paket Tour Harlie</h2>
        <p>Pilih destinasi favoritmu. Hubungi tim kami untuk detail itinerary, jadwal, dan harga terbaru.</p>
      </div>

      <div class="tour-package-group">
        <div class="tour-group-heading"><span>01</span><h3>Destinasi Domestik</h3></div>
        <div class="tour-package-grid">
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-mountain tour-destination-yogyakarta" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Yogyakarta, DI Yogyakarta</p><h3>Yogyakarta</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Yogyakarta." target="_blank" rel="noopener" aria-label="Tanya paket tour Yogyakarta">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-coast tour-destination-pangandaran" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Pangandaran, Jawa Barat</p><h3>Pangandaran</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Pangandaran." target="_blank" rel="noopener" aria-label="Tanya paket tour Pangandaran">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-city tour-destination-bandung" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Bandung, Jawa Barat</p><h3>Bandung</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Bandung." target="_blank" rel="noopener" aria-label="Tanya paket tour Bandung">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-green tour-destination-banyuwangi" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Banyuwangi, Jawa Timur</p><h3>Banyuwangi</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Banyuwangi." target="_blank" rel="noopener" aria-label="Tanya paket tour Banyuwangi">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-island tour-destination-lombok" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Lombok, Nusa Tenggara Barat</p><h3>Lombok</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Lombok." target="_blank" rel="noopener" aria-label="Tanya paket tour Lombok">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-tropical tour-destination-bali" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Bali, Indonesia</p><h3>Bali</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Bali." target="_blank" rel="noopener" aria-label="Tanya paket tour Bali">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-mountain tour-destination-garut" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Garut, Jawa Barat</p><h3>Garut</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Garut." target="_blank" rel="noopener" aria-label="Tanya paket tour Garut">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-island tour-destination-pulau-seribu" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Kepulauan Seribu, DKI Jakarta</p><h3>Pulau Seribu</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Pulau%20Seribu." target="_blank" rel="noopener" aria-label="Tanya paket tour Pulau Seribu">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-coast tour-destination-lampung" aria-hidden="true"></div>
            <div class="tour-card-content"><p class="tour-location">Lampung, Sumatra</p><h3>Lampung</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Lampung." target="_blank" rel="noopener" aria-label="Tanya paket tour Lampung">↗</a></div>
            </div>
          </article>
        </div>
      </div>

      <div class="tour-package-group tour-international-group">
        <div class="tour-group-heading"><span>02</span><h3>Destinasi Internasional</h3></div>
        <div class="tour-package-grid">
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-japan" aria-hidden="true"><span>🗻</span></div>
            <div class="tour-card-content"><p class="tour-location">Jepang</p><h3>Jepang</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Jepang." target="_blank" rel="noopener" aria-label="Tanya paket tour Jepang">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-china" aria-hidden="true"><span>🏯</span></div>
            <div class="tour-card-content"><p class="tour-location">China</p><h3>China</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20China." target="_blank" rel="noopener" aria-label="Tanya paket tour China">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-korea" aria-hidden="true"><span>🌆</span></div>
            <div class="tour-card-content"><p class="tour-location">Korea Selatan</p><h3>Korea</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Korea." target="_blank" rel="noopener" aria-label="Tanya paket tour Korea">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-malaysia" aria-hidden="true"><span>🏙️</span></div>
            <div class="tour-card-content"><p class="tour-location">Malaysia</p><h3>Malaysia</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Malaysia." target="_blank" rel="noopener" aria-label="Tanya paket tour Malaysia">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-singapore" aria-hidden="true"><span>🦁</span></div>
            <div class="tour-card-content"><p class="tour-location">Singapura</p><h3>Singapur</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Singapur." target="_blank" rel="noopener" aria-label="Tanya paket tour Singapur">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-vietnam" aria-hidden="true"><span>🏮</span></div>
            <div class="tour-card-content"><p class="tour-location">Vietnam</p><h3>Vietnam</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Vietnam." target="_blank" rel="noopener" aria-label="Tanya paket tour Vietnam">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-thailand" aria-hidden="true"><span>🛕</span></div>
            <div class="tour-card-content"><p class="tour-location">Thailand</p><h3>Thailand</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Thailand." target="_blank" rel="noopener" aria-label="Tanya paket tour Thailand">↗</a></div>
            </div>
          </article>
          <article class="tour-card">
            <div class="tour-card-visual tour-scene-turkey" aria-hidden="true"><span>🕌</span></div>
            <div class="tour-card-content"><p class="tour-location">Turki</p><h3>Turkey</h3>
              <div class="tour-card-price"><strong>Konsultasi harga</strong><span>/ orang</span></div>
              <div class="tour-card-footer"><div><span>Durasi perjalanan</span><strong>Menyesuaikan paket</strong></div><a href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20menanyakan%20paket%20tour%20Turkey." target="_blank" rel="noopener" aria-label="Tanya paket tour Turkey">↗</a></div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- BOOKING TIKET -->
  <section class="booking-menu-group" id="booking" aria-label="Booking tiket dan rute populer">
  <section class="section booking-section">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Rencanakan Perjalanan</span>
        <h2>Pilih Rute dan Jadwal</h2>
        <p>Pilih kota, tanggal, moda, dan kelas untuk melihat perkiraan jadwal serta tarif.</p>
      </div>

      <div class="bk">
        <!-- Langkah 1: cari jadwal -->
        <div id="bkSearch" data-booking-endpoint="{{ route('bookings.store') }}">
          <div class="bk-mode-wrap">
            <div class="bk-field-heading">
              <span class="bk-step-number">01</span>
              <span>
                <strong>Pilih jenis perjalanan</strong>
                <small>Pilih perjalanan dalam negeri atau lintas negara.</small>
              </span>
            </div>
            <div class="bk-mode" role="group" aria-label="Jenis perjalanan">
              <button class="bk-mode-option active" id="bkDomestic" type="button" aria-pressed="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5M5.5 10v9h13v-9M9 19v-5h6v5"/></svg>
                <span><strong>Antar Kota</strong><small>Perjalanan ke berbagai kota di Indonesia</small></span>
              </button>
              <button class="bk-mode-option" id="bkInternational" type="button" aria-pressed="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3.5 9h17M3.5 15h17M12 3c2.3 2.5 3.4 5.5 3.4 9s-1.1 6.5-3.4 9c-2.3-2.5-3.4-5.5-3.4-9S9.7 5.5 12 3Z"/></svg>
                <span><strong>Antar Negara</strong><small>Perjalanan ke luar negeri</small></span>
              </button>
            </div>
          </div>
          <div class="bk-transport-wrap">
            <div class="bk-field-heading">
              <span class="bk-step-number">02</span>
              <span>
                <strong>Pilih moda transportasi</strong>
                <small>Pilih perjalanan darat atau lihat perkiraan perjalanan udara.</small>
              </span>
            </div>
            <div class="bk-transport" role="group" aria-label="Moda transportasi">
              <button class="bk-transport-option active" id="bkTransportShuttle" type="button" aria-pressed="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 16V8a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v8M5 12h14M7 16h.01M17 16h.01M7 19v-3m10 3v-3M8 8h8"/></svg>
                <span><strong>Shuttle</strong><small>Perjalanan darat yang nyaman</small></span>
              </button>
              <button class="bk-transport-option" id="bkTransportFlight" type="button" aria-pressed="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m3 14 8.5-2.5L9 4.5a1 1 0 0 1 1.7-1L16 10l5-1.5a1.5 1.5 0 0 1 .8 2.9L16 13l-2 7-2 1-1-7-6 2-1.5 2L2 18l1-4Z"/></svg>
                <span><strong>Pesawat</strong><small>Estimasi perjalanan udara</small></span>
              </button>
            </div>
          </div>
          <div class="bk-route">
            <div class="bk-city">
              <label for="bkFrom"><span class="bk-route-dot"></span>Kota keberangkatan</label>
              <select id="bkFrom"></select>
            </div>
            <button class="bk-swap" id="bkSwap" type="button" aria-label="Tukar kota asal dan tujuan">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M7 7h13l-3-3m3 3-3 3M17 17H4l3 3m-3-3 3-3"/></svg>
            </button>
            <div class="bk-city bk-to">
              <label for="bkTo"><span class="bk-route-dot bk-route-dot-end"></span>Kota tujuan</label>
              <select id="bkTo"></select>
            </div>
          </div>
          <p class="bk-international-note" id="bkInternationalNote" hidden>
            Untuk perjalanan ke luar negeri, pastikan dokumen perjalanan Anda lengkap. Hubungi kami untuk memastikan jadwal dan layanan.
          </p>
          <div class="bk-body">
            <div class="bk-row">
              <div class="bk-field">
                <label class="bk-h" for="bkDate">Tanggal keberangkatan</label>
                <input type="date" id="bkDate">
                <div class="bk-chips">
                  <button class="bk-chip" type="button" data-off="0">Hari ini</button>
                  <button class="bk-chip" type="button" data-off="1">Besok</button>
                  <button class="bk-chip" type="button" data-off="2">Lusa</button>
                </div>
              </div>
              <div class="bk-field">
                <span class="bk-h">Jumlah penumpang</span>
                <div class="bk-step">
                  <button type="button" id="bkMinus" aria-label="Kurangi penumpang">−</button>
                  <b id="bkPax">1</b>
                  <button type="button" id="bkPlus" aria-label="Tambah penumpang">+</button>
                </div>
              </div>
            </div>
            <div class="bk-field">
              <span class="bk-h">Pilih kelas perjalanan</span>
              <p class="bk-field-hint">Pilih kenyamanan yang sesuai untuk perjalanan Anda.</p>
              <div class="bk-classes" id="bkClasses"></div>
            </div>
            <div class="bk-err" id="bkErr" role="alert"></div>
            <button class="bk-cta" id="bkGo" type="button">
              Cari Jadwal &amp; Harga
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6"/></svg>
            </button>
          </div>
          <div class="bk-res" id="bkRes" aria-live="polite"></div>
        </div>

        <!-- Langkah 2: data penumpang -->
        <div id="bkForm" class="bk-hide">
          <div class="bk-body">
            <div class="bk-selected-trip">
              <span class="bk-h">Jadwal terpilih</span>
              <b id="bkPicked"></b>
            </div>
            <div class="bk-row">
              <div class="bk-field"><label class="bk-h" for="bkName">Nama lengkap</label><input id="bkName" autocomplete="name" minlength="2" maxlength="120" required placeholder="Sesuai identitas"></div>
              <div class="bk-field"><label class="bk-h" for="bkPhone">Nomor HP / WhatsApp</label><input id="bkPhone" type="tel" inputmode="tel" autocomplete="tel" minlength="9" maxlength="25" required placeholder="08xxxxxxxxxx"></div>
            </div>
            <div class="bk-err" id="bkErr2" role="alert"></div>
            <button class="bk-cta" id="bkPay" type="button">Lanjutkan Pemesanan</button>
            <button class="bk-chip" id="bkBack" type="button">Kembali ke jadwal</button>
          </div>
        </div>

        <!-- Langkah 3: konfirmasi -->
        <div id="bkDone" class="bk-hide" role="dialog" aria-modal="true" aria-labelledby="bkSummaryTitle">
          <div class="bk-body bk-confirmation">
            <header class="bk-confirmation-header">
              <span class="bk-success-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
              </span>
              <div>
              <span class="bk-confirmation-eyebrow">PEMESANAN TERCATAT</span>
                <h3>Detail perjalanan Anda</h3>
              <p id="bkDoneMessage">Klik tombol WhatsApp di bawah untuk mengirim konfirmasi booking Anda.</p>
              </div>
            </header>

            <section class="bk-reference" aria-label="Kode pemesanan">
              <div>
                <span class="bk-detail-label">KODE PEMESANAN</span>
                <small>Simpan kode ini untuk konfirmasi perjalanan.</small>
              </div>
              <div class="bk-code" id="bkCode"></div>
            </section>

            <section class="bk-confirmation-details" aria-labelledby="bkSummaryTitle">
              <h4 id="bkSummaryTitle">Ringkasan perjalanan</h4>
              <div class="bk-detail-list" id="bkDetail"></div>
            </section>

            <div class="bk-confirmation-actions">
              <a class="bk-cta bk-wa" id="bkWa" href="#" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.87 11.87 0 0 0 12.06 0C5.48 0 .13 5.35.13 11.93c0 2.1.55 4.16 1.6 5.97L.03 24l6.25-1.64a11.9 11.9 0 0 0 5.78 1.48h.01c6.57 0 11.92-5.35 11.93-11.93a11.86 11.86 0 0 0-3.48-8.43ZM12.07 21.8h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.72.98.99-3.63-.23-.37a9.87 9.87 0 0 1-1.52-5.26c0-5.46 4.44-9.9 9.89-9.9a9.83 9.83 0 0 1 7 2.9 9.84 9.84 0 0 1 2.89 7c0 5.46-4.44 9.9-9.89 9.9Zm5.43-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.47-.88-.79-1.48-1.76-1.65-2.06-.18-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.61-.91-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.06 2.88 1.21 3.08c.15.2 2.1 3.2 5.08 4.49.71.3 1.26.49 1.69.62.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.42-.07-.12-.27-.2-.57-.35Z"/></svg>
                Konfirmasi via WhatsApp
              </a>
              <button class="bk-chip bk-again" id="bkAgain" type="button">Buat pemesanan baru</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  </section>

  <!-- DOKUMENTASI -->
  <section class="section documentation-section" id="dokumentasi">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Momen Perjalanan</span>
        <h2>Dokumentasi Harlie Tour</h2>
        <p>Foto berikut merupakan ilustrasi destinasi untuk membantu Anda menemukan inspirasi perjalanan.</p>
      </div>

      <div class="documentation-filters" role="group" aria-label="Filter kategori dokumentasi">
        <button class="documentation-filter active" type="button" data-filter="all" aria-pressed="true">View All</button>
        <button class="documentation-filter" type="button" data-filter="city" aria-pressed="false">City Tour</button>
        <button class="documentation-filter" type="button" data-filter="coast" aria-pressed="false">Pantai &amp; Laut</button>
        <button class="documentation-filter" type="button" data-filter="mountain" aria-pressed="false">Gunung</button>
        <button class="documentation-filter" type="button" data-filter="adventure" aria-pressed="false">Petualangan</button>
        <button class="documentation-filter" type="button" data-filter="outbound" aria-pressed="false">Outbound</button>
        <button class="documentation-filter" type="button" data-filter="gathering" aria-pressed="false">Outing &amp; Gathering</button>
      </div>

      <div class="documentation-grid">
        <article class="documentation-card" data-categories="mountain adventure">
          <img src="https://localexperience.id/media/tours/state_banner/jawa_timur.webp" alt="Pemandangan alam Gunung Bromo saat perjalanan wisata" loading="lazy">
          <div class="documentation-caption"><span>Gunung · Petualangan</span><h3>Amazing Sunrise Bromo</h3></div>
        </article>
        <article class="documentation-card" data-categories="coast adventure">
          <img src="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?auto=format&amp;fit=crop&amp;w=1000&amp;q=85" alt="Pantai dan laut tropis Karimunjawa" loading="lazy">
          <div class="documentation-caption"><span>Pantai &amp; Laut · Petualangan</span><h3>Jelajah Karimunjawa</h3></div>
        </article>
        <article class="documentation-card" data-categories="outbound gathering adventure">
          <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&amp;fit=crop&amp;w=1000&amp;q=85" alt="Teman-teman menikmati kegiatan bersama di luar ruang" loading="lazy">
          <div class="documentation-caption"><span>Outbound · Outing &amp; Gathering</span><h3>Keseruan Fun Games di Lembang</h3></div>
        </article>
        <article class="documentation-card" data-categories="mountain gathering">
          <img src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&amp;fit=crop&amp;w=1000&amp;q=85" alt="Pemandangan pegunungan dan danau saat liburan keluarga" loading="lazy">
          <div class="documentation-caption"><span>Gunung · Outing &amp; Gathering</span><h3>Liburan Keluarga di Dieng</h3></div>
        </article>
        <article class="documentation-card" data-categories="city">
          <img src="https://dvgddkosknh6r.cloudfront.net/live/media/img/1765328386-rabu3.jpg" alt="Gedung Sate, ikon wisata Kota Bandung" loading="lazy">
          <div class="documentation-caption"><span>City Tour</span><h3>Menjelajah Kota Bandung</h3></div>
        </article>
        <article class="documentation-card" data-categories="coast adventure">
          <img src="https://static.tripzilla.id/media/20090/conversions/2-Pantai-Teluk-Ijo-w768.webp" alt="Teluk Hijau dengan pantai dan hutan tropis di Banyuwangi" loading="lazy">
          <div class="documentation-caption"><span>Pantai &amp; Laut · Petualangan</span><h3>Pesona Teluk Hijau</h3></div>
        </article>
        <article class="documentation-card" data-categories="mountain adventure">
          <img src="https://images.unsplash.com/photo-1654046920188-6e7ee051d7a4?auto=format&amp;fit=crop&amp;fm=jpg&amp;q=85&amp;w=1000" alt="Gunung Rinjani dan danau kawah di Lombok" loading="lazy">
          <div class="documentation-caption"><span>Gunung · Petualangan</span><h3>Menikmati Alam Lombok</h3></div>
        </article>
        <article class="documentation-card" data-categories="coast gathering">
          <img src="https://radarjabar.disway.id/upload/c04a53632587838a2216b045d3dddaac.jpg" alt="Pulau kecil tropis di Kepulauan Seribu" loading="lazy">
          <div class="documentation-caption"><span>Pantai &amp; Laut · Outing</span><h3>Waktu Santai di Pulau Seribu</h3></div>
        </article>
      </div>
    </div>
  </section>

  <!-- INFORMASI PERJALANAN -->
  <section class="section journey-info-section" id="info-perjalanan">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Sebelum Memesan</span>
        <h2>Informasi Perjalanan</h2>
        <p>Ketahui hal penting tentang jadwal, tarif, dan konfirmasi sebelum mengirim permintaan booking.</p>
      </div>

      <div class="journey-info-grid">
        <article class="journey-info-card">
          <span class="journey-info-number">01</span>
          <h3>Jadwal shuttle</h3>
          <p>Daftar jadwal yang tampil adalah pilihan keberangkatan untuk rute yang tersedia. Ketersediaan kursi diperiksa kembali saat permintaan booking dikirim.</p>
        </article>
        <article class="journey-info-card">
          <span class="journey-info-number">02</span>
          <h3>Tarif dan penerbangan</h3>
          <p>Tarif shuttle serta jadwal dan tarif pesawat di halaman ini merupakan perkiraan. Hubungi tim Harlie Tour untuk memastikan informasi terbaru.</p>
        </article>
        <article class="journey-info-card">
          <span class="journey-info-number">03</span>
          <h3>Status pemesanan</h3>
          <p>Form booking mencatat permintaan dengan status menunggu konfirmasi. Ini belum merupakan tiket terbit atau bukti pembayaran.</p>
        </article>
        <article class="journey-info-card">
          <span class="journey-info-number">04</span>
          <h3>Konfirmasi melalui WhatsApp</h3>
          <p>Simpan kode pemesanan yang muncul setelah pengiriman, lalu gunakan tombol WhatsApp untuk melanjutkan konfirmasi dengan tim kami.</p>
        </article>
      </div>
    </div>
  </section>
  <!-- ULASAN PELANGGAN -->
  <section class="section customer-reviews-section" id="ulasan">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Rating Pelanggan</span>
        <h2>Ulasan Perjalanan</h2>
        <p>Contoh tampilan rating dan ulasan. Nilai berikut belum berasal dari ulasan pelanggan terverifikasi.</p>
      </div>

      <svg class="rating-icon-library" aria-hidden="true" focusable="false">
        <symbol id="ratingStar" viewBox="0 0 24 24"><path d="M12 2.5 14.9 8.4l6.5.9-4.7 4.6 1.1 6.5L12 17.3l-5.8 3.1 1.1-6.5-4.7-4.6 6.5-.9L12 2.5Z"/></symbol>
      </svg>

      <div class="rating-overview" role="group" aria-label="Contoh rating pelanggan">
        <strong class="rating-score">4.7</strong>
        <div>
          <div class="rating-stars" role="img" aria-label="Contoh rating 4,7 dari 5">
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
          </div>
          <span>Contoh rating dari 5</span>
        </div>
      </div>

      <div class="customer-reviews-grid">
        <article class="customer-review-card">
          <div class="customer-review-heading">
            <span class="customer-review-avatar" aria-hidden="true">P</span>
            <div><strong>Penumpang shuttle</strong><span>Rute demo: Jakarta - Bandung</span></div>
          </div>
          <div class="rating-stars" role="img" aria-label="Contoh rating 5 dari 5">
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
          </div>
          <p>Contoh ulasan: proses pemesanan mudah dan perjalanan terasa nyaman.</p>
        </article>
        <article class="customer-review-card">
          <div class="customer-review-heading">
            <span class="customer-review-avatar" aria-hidden="true">P</span>
            <div><strong>Penumpang shuttle</strong><span>Rute demo: Bandung - Yogyakarta</span></div>
          </div>
          <div class="rating-stars" role="img" aria-label="Contoh rating 4 dari 5">
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon empty" aria-hidden="true"><use href="#ratingStar"/></svg>
          </div>
          <p>Contoh ulasan: informasi jadwal mudah ditemukan dan layanan ramah.</p>
        </article>
        <article class="customer-review-card">
          <div class="customer-review-heading">
            <span class="customer-review-avatar" aria-hidden="true">P</span>
            <div><strong>Penumpang shuttle</strong><span>Rute demo: Semarang - Surabaya</span></div>
          </div>
          <div class="rating-stars" role="img" aria-label="Contoh rating 5 dari 5">
            <svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg><svg class="rating-star-icon filled" aria-hidden="true"><use href="#ratingStar"/></svg>
          </div>
          <p>Contoh ulasan: perjalanan sesuai rencana dan pemesanan terasa praktis.</p>
        </article>
      </div>
    </div>
  </section>
  <!-- SEWA ARMADA -->
  <section class="section fleet-rental-section" id="sewa-armada">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Layanan Perjalanan</span>
        <h2>Sewa Armada</h2>
        <p>Rencanakan perjalanan bersama tim Harlie Tour. Tanyakan pilihan armada yang sesuai dengan kebutuhan Anda.</p>
      </div>
      <div class="fleet-rental-card">
        <div class="fleet-rental-copy">
          <span class="fleet-rental-kicker">LAYANAN SEWA</span>
          <h3>Ceritakan rencana perjalanan Anda</h3>
          <p>Hubungi tim kami untuk membahas kebutuhan perjalanan, titik jemput, jadwal, kapasitas, dan tarif sewa.</p>
          <a class="btn btn-primary fleet-rental-button" href="https://wa.me/6281221697690?text=Halo%20Harlie%20Tour%2C%20saya%20ingin%20bertanya%20tentang%20sewa%20armada.%20Mohon%20informasi%20kapasitas%2C%20jadwal%2C%20dan%20tarif." target="_blank" rel="noopener">Tanya Sewa Armada</a>
        </div>
        <div class="fleet-rental-details">
          <div class="fleet-rental-step"><span>01</span><div><strong>Sampaikan kebutuhan</strong><p>Tujuan, tanggal, dan jumlah penumpang.</p></div></div>
          <div class="fleet-rental-step"><span>02</span><div><strong>Diskusikan pilihan</strong><p>Tim membantu menjelaskan pilihan yang tersedia.</p></div></div>
          <div class="fleet-rental-step"><span>03</span><div><strong>Konfirmasi layanan</strong><p>Pastikan jadwal dan tarif langsung dengan tim.</p></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-box">
        <h2>Ada yang ingin ditanyakan?</h2>
        <p>Hubungi tim Harlie Tour untuk memastikan rute, jadwal, dan harga.</p>
        <a href="#booking" class="btn btn-white btn-lg">Mulai Booking</a>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer" id="kontak">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="#beranda" class="logo">
            <img class="logo-image" src="{{ asset('assets/harlie-tour-logo.png') }}" alt="Logo Harlie Tour Indonesia">
          </a>
          <p>Pilih rute dan tanggal, lalu kirim permintaan pemesanan kepada tim kami.</p>
        </div>

        <div>
          <h4>Navigasi</h4>
          <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#info-perjalanan">Informasi Perjalanan</a></li>
            <li><a href="#ulasan">Ulasan Pelanggan</a></li>
            <li><a href="#booking">Pemesanan</a></li>
          </ul>
        </div>

        <div>
          <h4>Layanan</h4>
          <ul>
            <li><a href="#booking">Shuttle Antarkota</a></li>
            <li><a href="#booking">Antar-jemput bandara</a></li>
            <li><a href="#sewa-armada">Sewa Armada</a></li>
            <li><a href="#paket-tour">Paket Wisata</a></li>
          </ul>
        </div>

        <div>
          <h4>Kontak</h4>
          <ul class="contact-list">
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              Lavenue Office &amp; Residence, Jl. Raya Pasar Minggu Kav. 16, Lantai 11-G, RT.7/RW.9, Pancoran, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
              021-1234-5678
            </li>
            <li>
              <a href="https://wa.me/6281221697690" target="_blank" rel="noopener" class="wa-link">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                +62 812-2169-7690
              </a>
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg>
              cs@harlie-travelindo.com
            </li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>© 2026 Harlie Tour Indonesia. Hak cipta dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Button -->
  <a href="https://wa.me/6281221697690" target="_blank" rel="noopener" class="wa-float" aria-label="Chat WhatsApp">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
  </a>

  <script src="{{ asset('js/scripts.js') }}?v=9"></script>
  <script src="{{ asset('js/booking.js') }}?v=14"></script>
</body>
</html>
