<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Harlie Tour | Perjalanan Nyaman di Dalam dan Luar Negeri</title>
  <meta name="description" content="Harlie Tour membantu Anda merencanakan perjalanan nyaman melalui layanan shuttle dan pilihan perjalanan udara.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="navbar">
    <div class="container nav-inner">
      <a href="#beranda" class="logo">
        <img class="logo-image" src="{{ asset('assets/harlie-tour-logo.png') }}" alt="Logo Harlie Tour Indonesia">
      </a>

      <ul class="nav-links" id="navLinks">
        <li><a href="#beranda" class="nav-link active">Beranda</a></li>
        <li><a href="#tentang" class="nav-link">Tentang Kami</a></li>
        <li><a href="#booking" class="nav-link">Booking</a></li>
        <li><a href="#ulasan" class="nav-link">Ulasan</a></li>
      </ul>

      <div class="nav-right">
        <a href="#booking" class="btn btn-primary btn-nav">Pesan Tiket</a>
        <button class="hamburger" id="hamburger" aria-label="Menu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </nav>

  <!-- BERANDA / HERO -->
  <section class="hero" id="beranda">
    <div class="hero-bg"></div>
    <div class="container hero-content">
      <div class="hero-badge">Perjalanan nyaman, ke mana pun tujuanmu</div>
      <h1 class="hero-title">
        Melangkah lebih jauh,<br>
        <span class="text-gradient">menjelajah dunia</span>
      </h1>
      <p class="hero-desc">
        Dari kota-kota di Indonesia hingga destinasi lintas negara, rencanakan perjalanan nyaman bersama Harlie Tour.
      </p>
      <div class="hero-actions">
        <a href="#booking" class="btn btn-primary btn-lg">Booking Sekarang</a>
        <a href="#tentang" class="btn btn-outline btn-lg">Pelajari Lebih Lanjut</a>
      </div>

      <div class="hero-stats">
        <div class="stat-item">
          <strong>50.000+</strong>
          <span>Penumpang / bulan</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <strong>120+</strong>
          <span>Armada aktif</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <strong>35+</strong>
          <span>Kota tujuan</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <strong>4.9</strong>
          <span>Rating pelanggan</span>
        </div>
      </div>
    </div>
  </section>

  <!-- TENTANG KAMI -->
  <section class="section about-section" id="tentang">
    <div class="container">
      <div class="about-grid">
        <div class="about-content">
          <span class="section-label">Mengenal Kami</span>
          <h2>Mitra perjalanan yang mengutamakan kenyamanan</h2>
          <p class="about-lead">
            Harlie Tour membantu perjalanan Anda terasa lebih mudah melalui layanan shuttle antarkota yang nyaman dan informasi perjalanan lintas negara.
          </p>
          <p>
            Sejak 2018, kami berfokus pada pengalaman perjalanan yang aman, nyaman, dan praktis. Kami terus meningkatkan kualitas layanan, fasilitas armada, serta kemudahan pelanggan dalam merencanakan perjalanan.
          </p>

          <div class="about-points">
            <div class="point">
              <div class="point-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              </div>
              <div>
                <strong>Keselamatan sebagai prioritas</strong>
                <span>Perjalanan didukung pengemudi berpengalaman dan perhatian pada kondisi armada.</span>
              </div>
            </div>
            <div class="point">
              <div class="point-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              </div>
              <div>
                <strong>Informasi perjalanan yang jelas</strong>
                <span>Pilihan rute dan jadwal membantu Anda merencanakan perjalanan dengan lebih baik.</span>
              </div>
            </div>
            <div class="point">
              <div class="point-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
              </div>
              <div>
                <strong>Dukungan yang ramah</strong>
                <span>Tim kami siap membantu menjawab pertanyaan dan kebutuhan perjalanan Anda.</span>
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
            <span class="about-photo-badge">Melayani perjalanan sejak 2018</span>
            <span class="about-photo-globe" role="img" aria-label="Perjalanan domestik dan internasional">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/></svg>
            </span>
            <div class="about-photo-copy">
              <strong>Setiap perjalanan punya cerita.</strong>
              <span>Kami hadir untuk membantu Anda sampai ke tujuan dengan nyaman.</span>
            </div>
          </div>
          <div class="about-card-main">
            <div class="about-card-stat">
              <span class="big-num">8+</span>
              <span>Tahun Pengalaman</span>
            </div>
            <div class="about-card-stat">
              <span class="big-num">200+</span>
              <span>Pool & Outlet</span>
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

  <!-- BOOKING -->
  <section class="section booking-section" id="booking">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Rencanakan Perjalanan</span>
        <h2>Booking Perjalanan</h2>
        <p>Tentukan tujuan, tanggal, dan kelas perjalanan. Kami bantu temukan pilihan yang sesuai.</p>
      </div>

      <div class="bk">
        <!-- Langkah 1: cari jadwal -->
        <div id="bkSearch">
          <div class="bk-mode-wrap">
            <div class="bk-field-heading">
              <span class="bk-step-number">01</span>
              <span>
                <strong>Pilih jenis perjalanan</strong>
                <small>Mulai dengan menentukan tujuan perjalanan Anda</small>
              </span>
            </div>
            <div class="bk-mode" role="group" aria-label="Jenis perjalanan">
              <button class="bk-mode-option active" id="bkDomestic" type="button" aria-pressed="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5M5.5 10v9h13v-9M9 19v-5h6v5"/></svg>
                <span><strong>Antar Kota</strong><small>Jelajahi berbagai kota di Indonesia</small></span>
              </button>
              <button class="bk-mode-option" id="bkInternational" type="button" aria-pressed="false">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3.5 9h17M3.5 15h17M12 3c2.3 2.5 3.4 5.5 3.4 9s-1.1 6.5-3.4 9c-2.3-2.5-3.4-5.5-3.4-9S9.7 5.5 12 3Z"/></svg>
                <span><strong>Antar Negara</strong><small>Rencanakan perjalanan lintas negara</small></span>
              </button>
            </div>
          </div>
          <div class="bk-transport-wrap">
            <div class="bk-field-heading">
              <span class="bk-step-number">02</span>
              <span>
                <strong>Pilih moda transportasi</strong>
                <small>Sesuaikan dengan jarak dan kebutuhan perjalanan</small>
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
            Rute lintas negara menampilkan simulasi jadwal dan estimasi tarif. Pastikan dokumen perjalanan dan persyaratan imigrasi, serta konfirmasi ketersediaan layanan sebelum berangkat.
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
              <div class="bk-field"><label class="bk-h" for="bkName">Nama lengkap</label><input id="bkName" autocomplete="name" placeholder="Sesuai identitas"></div>
              <div class="bk-field"><label class="bk-h" for="bkPhone">Nomor HP / WhatsApp</label><input id="bkPhone" type="tel" autocomplete="tel" placeholder="08xxxxxxxxxx"></div>
            </div>
            <div class="bk-err" id="bkErr2" role="alert"></div>
            <button class="bk-cta" id="bkPay" type="button">Lanjutkan Pemesanan</button>
            <button class="bk-chip" id="bkBack" type="button">Kembali ke jadwal</button>
          </div>
        </div>

        <!-- Langkah 3: konfirmasi -->
        <div id="bkDone" class="bk-hide">
          <div class="bk-body bk-confirmation">
            <header class="bk-confirmation-header">
              <span class="bk-success-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
              </span>
              <div>
                <span class="bk-confirmation-eyebrow">PERMINTAAN BOOKING DIBUAT</span>
                <h3>Detail perjalanan Anda</h3>
                <p id="bkDoneMessage">Permintaan perjalanan siap dikonfirmasi. Simpan kode ini dan kirim ke WhatsApp kami.</p>
              </div>
            </header>

            <section class="bk-reference" aria-label="Kode booking">
              <div>
                <span class="bk-detail-label">KODE BOOKING</span>
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

  <!-- RUTE POPULER -->
  <section class="section routes-section">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Destinasi</span>
        <h2>Rute Populer</h2>
        <p>Pilihan rute favorit untuk perjalanan bersama Harlie Tour.</p>
      </div>

      <div class="routes-grid">
        <article class="route-card">
          <div class="route-badge popular">Populer</div>
          <div class="route-cities">
            <div class="route-city">
              <strong>Jakarta</strong>
              <small>Grogol / Bintaro</small>
            </div>
            <div class="route-arrow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
            <div class="route-city">
              <strong>Bandung</strong>
              <small>Pasteur / Dipatiukur</small>
            </div>
          </div>
          <div class="route-meta">
            <span>± 3 jam</span>
            <span class="route-price">mulai Rp 75.000</span>
          </div>
        </article>

        <article class="route-card">
          <div class="route-badge favorite">Favorit</div>
          <div class="route-cities">
            <div class="route-city">
              <strong>Jakarta</strong>
              <small>Bintaro</small>
            </div>
            <div class="route-arrow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
            <div class="route-city">
              <strong>Yogyakarta</strong>
              <small>Seturan / Giwangan</small>
            </div>
          </div>
          <div class="route-meta">
            <span>± 9 jam</span>
            <span class="route-price">mulai Rp 145.000</span>
          </div>
        </article>

        <article class="route-card">
          <div class="route-badge airport">Airport</div>
          <div class="route-cities">
            <div class="route-city">
              <strong>Bandung</strong>
              <small>Dipatiukur</small>
            </div>
            <div class="route-arrow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
            <div class="route-city">
              <strong>Soekarno-Hatta</strong>
              <small>Terminal 1–3</small>
            </div>
          </div>
          <div class="route-meta">
            <span>± 3.5 jam</span>
            <span class="route-price">mulai Rp 165.000</span>
          </div>
        </article>

        <article class="route-card">
          <div class="route-badge new">Baru</div>
          <div class="route-cities">
            <div class="route-city">
              <strong>Semarang</strong>
              <small>Karangayu</small>
            </div>
            <div class="route-arrow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
            <div class="route-city">
              <strong>Surabaya</strong>
              <small>Bungurasih</small>
            </div>
          </div>
          <div class="route-meta">
            <span>± 5 jam</span>
            <span class="route-price">mulai Rp 120.000</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ULASAN -->
  <section class="section reviews-section" id="ulasan">
    <div class="container">
      <div class="section-header">
        <span class="section-label">Testimoni</span>
        <h2>Apa Kata Mereka?</h2>
        <p>Rasakan perjalanan yang nyaman bersama Harlie Tour.</p>
      </div>

      <div class="reviews-grid">
        <article class="review-card">
          <div class="review-stars">★★★★★</div>
          <p class="review-text">“Pelayanannya ramah banget, armadanya bersih dan AC-nya dingin. Driver juga driving-nya nyaman. Pasti naik lagi!”</p>
          <div class="review-author">
            <div class="author-avatar">AS</div>
            <div>
              <strong>Aulia Safitri</strong>
              <span>Jakarta → Bandung</span>
            </div>
          </div>
        </article>

        <article class="review-card">
          <div class="review-stars">★★★★★</div>
          <p class="review-text">“Booking online gampang, e-ticket langsung masuk WA. Pool-nya strategis, gak perlu jauh-jauh. Recommended deh.”</p>
          <div class="review-author">
            <div class="author-avatar">RF</div>
            <div>
              <strong>Rizky Fauzan</strong>
              <span>Bandung → Yogyakarta</span>
            </div>
          </div>
        </article>

        <article class="review-card">
          <div class="review-stars">★★★★☆</div>
          <p class="review-text">“Harga bersaing, kursi executive leg space-nya lega. Cocok buat perjalanan jauh. Terima kasih Harlie Tour!”</p>
          <div class="review-author">
            <div class="author-avatar">DW</div>
            <div>
              <strong>Dewi Wulandari</strong>
              <span>Semarang → Surabaya</span>
            </div>
          </div>
        </article>

        <article class="review-card">
          <div class="review-stars">★★★★★</div>
          <p class="review-text">“Airport shuttle-nya on time banget. Dari Bandung ke Soetta tinggal duduk santai, sampai terminal langsung. Mantap.”</p>
          <div class="review-author">
            <div class="author-avatar">BP</div>
            <div>
              <strong>Budi Pratama</strong>
              <span>Bandung → Soetta</span>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-box">
        <h2>Siap berangkat hari ini?</h2>
        <p>Pesan tiket Anda dan nikmati perjalanan yang lebih nyaman bersama Harlie Tour.</p>
        <a href="#booking" class="btn btn-white btn-lg">Booking Tiket Sekarang</a>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <a href="#beranda" class="logo">
            <img class="logo-image" src="{{ asset('assets/harlie-tour-logo.png') }}" alt="Logo Harlie Tour Indonesia">
          </a>
          <p>Harlie Tour menyediakan informasi perjalanan dan membantu Anda merencanakan perjalanan dengan nyaman, praktis, dan mudah.</p>
        </div>

        <div>
          <h4>Navigasi</h4>
          <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#ulasan">Ulasan</a></li>
            <li><a href="#booking">Booking</a></li>
          </ul>
        </div>

        <div>
          <h4>Layanan</h4>
          <ul>
            <li><a href="#booking">Shuttle Antarkota</a></li>
            <li><a href="#booking">Airport Transfer</a></li>
            <li><a href="#">Sewa Armada</a></li>
            <li><a href="#">Paket Express</a></li>
          </ul>
        </div>

        <div>
          <h4>Kontak</h4>
          <ul class="contact-list">
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
              Jl. Contoh Raya No. 12, Jakarta Selatan
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
        <p>© 2026 Harlie Tour Indonesia. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Floating WhatsApp Button -->
  <a href="https://wa.me/6281221697690" target="_blank" rel="noopener" class="wa-float" aria-label="Chat WhatsApp">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
  </a>

  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/booking.js') }}"></script>
</body>
</html>