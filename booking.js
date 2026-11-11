(function () {
  if (!document.getElementById('bkSearch')) return;

  /* ===== DATA (ubah sesuai kebutuhan) ===== */
  var CITIES = {
    Jakarta: [-6.20, 106.82], Bandung: [-6.91, 107.61], Yogyakarta: [-7.80, 110.36], Semarang: [-6.97, 110.42],
    Surabaya: [-7.25, 112.75], Solo: [-7.57, 110.82], Malang: [-7.98, 112.63], Bogor: [-6.60, 106.80],
    Tangerang: [-6.18, 106.63], Cirebon: [-6.71, 108.56], Medan: [3.59, 98.67],
    Singapore: [1.35, 103.82], 'Kuala Lumpur': [3.14, 101.69], Bangkok: [13.76, 100.50],
    'Hat Yai': [7.01, 100.47], 'Johor Bahru': [1.49, 103.74], Phuket: [7.88, 98.39],
    'Ho Chi Minh City': [10.82, 106.63], Manila: [14.60, 120.98], 'Hong Kong': [22.32, 114.17],
    Taipei: [25.03, 121.57], Tokyo: [35.68, 139.69], Osaka: [34.69, 135.50],
    Seoul: [37.57, 126.98], Sydney: [-33.87, 151.21], Melbourne: [-37.81, 144.96],
    Dubai: [25.20, 55.27], Istanbul: [41.01, 28.98]
  };
  var COUNTRIES = {
    Jakarta: 'Indonesia', Bandung: 'Indonesia', Yogyakarta: 'Indonesia', Semarang: 'Indonesia',
    Surabaya: 'Indonesia', Solo: 'Indonesia', Malang: 'Indonesia', Bogor: 'Indonesia',
    Tangerang: 'Indonesia', Cirebon: 'Indonesia', Medan: 'Indonesia',
    Singapore: 'Singapura', 'Kuala Lumpur': 'Malaysia', Bangkok: 'Thailand',
    'Hat Yai': 'Thailand', 'Johor Bahru': 'Malaysia', Phuket: 'Thailand',
    'Ho Chi Minh City': 'Vietnam', Manila: 'Filipina', 'Hong Kong': 'Hong Kong',
    Taipei: 'Taiwan', Tokyo: 'Jepang', Osaka: 'Jepang', Seoul: 'Korea Selatan',
    Sydney: 'Australia', Melbourne: 'Australia', Dubai: 'Uni Emirat Arab', Istanbul: 'Turki'
  };
  var INTERNATIONAL_ROUTES = {
    'Jakarta-Singapore': { fare: 700000, duration: 2160 },
    'Jakarta-Kuala Lumpur': { fare: 500000, duration: 1800 },
    'Medan-Kuala Lumpur': { fare: 350000, duration: 960 },
    'Kuala Lumpur-Singapore': { fare: 150000, duration: 360 },
    'Kuala Lumpur-Johor Bahru': { fare: 80000, duration: 300 },
    'Kuala Lumpur-Hat Yai': { fare: 250000, duration: 600 },
    'Hat Yai-Bangkok': { fare: 200000, duration: 900 },
    'Kuala Lumpur-Phuket': { fare: 250000, duration: 600 },
    'Kuala Lumpur-Ho Chi Minh City': { fare: 450000, duration: 1200 }
  };
  var KELAS = {
    Ekonomi: { m: 1, seat: 14, info: 'AC, kursi standar' },
    Executive: { m: 1.35, seat: 10, info: 'Reclining seat, USB charger' },
    VIP: { m: 1.8, seat: 6, info: 'Ruang kaki ekstra' }
  };
  var TIMES = ['05:00', '07:00', '09:00', '12:00', '15:00', '18:00', '21:00'];
  var FLIGHT_TIMES = ['06:00', '09:00', '12:00', '15:00', '18:00', '21:00'];
  var FLIGHT_SEATS = { Ekonomi: 180, Executive: 36, VIP: 12 };
  var MAX_PAX = 8;
  var WA = '6281221697690';
  var csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
  var apiBase = location.port === '8001'
    ? location.origin
    : (['http:', 'https:'].includes(location.protocol) ? location.protocol : 'http:') +
      '//' + (location.hostname || '127.0.0.1') + ':8001';
  // Tarif dasar demo untuk beberapa rute; rute lainnya dihitung dari jarak.
  var TARIF = { 'Jakarta-Bandung': 105000, 'Jakarta-Yogyakarta': 160000, 'Semarang-Surabaya': 130000 };

  /* ===== PERHITUNGAN ===== */
  function km(a, b) {
    var r = Math.PI / 180, p = CITIES[a], q = CITIES[b], dl = (q[0] - p[0]) * r, dn = (q[1] - p[1]) * r;
    var h = Math.pow(Math.sin(dl / 2), 2) + Math.cos(p[0] * r) * Math.cos(q[0] * r) * Math.pow(Math.sin(dn / 2), 2);
    return 2 * 6371 * Math.asin(Math.sqrt(h)) * 1.3;
  }
  function internationalRoute(o, d) {
    return INTERNATIONAL_ROUTES[o + '-' + d] || INTERNATIONAL_ROUTES[d + '-' + o] || null;
  }
  function price(o, d, k) {
    if (transportType === 'flight') {
      var distance = km(o, d) / 1.3;
      var international = COUNTRIES[o] !== COUNTRIES[d];
      var flightBase = 300000 + distance * (international ? 1250 : 1050) + (international ? 350000 : 0);
      return Math.round(flightBase * KELAS[k].m / 25000) * 25000;
    }
    var international = internationalRoute(o, d);
    if (international) return Math.round(international.fare * KELAS[k].m / 5000) * 5000;
    var base = TARIF[o + '-' + d] || TARIF[d + '-' + o] || (50000 + km(o, d) * 250);
    return Math.round(base * KELAS[k].m / 5000) * 5000;
  }
  function duration(o, d) {
    if (transportType === 'flight') {
      var flightMinutes = (km(o, d) / 1.3 / 750 * 60) + 100;
      return Math.max(60, Math.round(flightMinutes / 15) * 15);
    }
    var international = internationalRoute(o, d);
    return international ? international.duration : Math.max(60, Math.round(km(o, d) / 55 * 4) * 15);
  }
  function durationLabel(minutes) {
    var days = Math.floor(minutes / 1440), hours = Math.round((minutes % 1440) / 60);
    if (hours === 24) { days++; hours = 0; }
    return (days ? days + ' hari ' : '') + (hours ? hours + ' jam' : '');
  }
  function routeName(from, to) {
    return from + ', ' + COUNTRIES[from] + ' → ' + to + ', ' + COUNTRIES[to];
  }
  function classLabel(k) {
    if (transportType === 'flight') return { Ekonomi: 'Ekonomi', Executive: 'Bisnis', VIP: 'First Class' }[k];
    return k;
  }
  function arrivalLabel(day, time, minutes) {
    var arrival = new Date(day + 'T' + time + ':00');
    arrival.setMinutes(arrival.getMinutes() + minutes);
    var arrivalDay = iso(arrival);
    return 'Tiba ± ' + (arrivalDay !== day ? nice(arrivalDay) + ', ' : '') +
      addTime(time, minutes) + ' (± ' + durationLabel(minutes) + ')';
  }
  function addTime(t, m) {
    var p = t.split(':'), total = (Number(p[0]) * 60 + Number(p[1]) + m) % 1440;
    return String(Math.floor(total / 60)).padStart(2, '0') + ':' + String(total % 60).padStart(2, '0');
  }

  /* ===== UTIL UI ===== */
  var $ = function (i) { return document.getElementById(i); };
  // Keep the success dialog outside transformed/overflow-hidden booking sections.
  document.body.appendChild($('bkDone'));
  var failureDialog = document.createElement('div');
  failureDialog.className = 'bk-failure-dialog bk-hide';
  failureDialog.setAttribute('role', 'alertdialog');
  failureDialog.setAttribute('aria-modal', 'true');
  failureDialog.setAttribute('aria-labelledby', 'bkFailureTitle');
  failureDialog.innerHTML = '<div class="bk-failure-card"><span class="bk-failure-eyebrow">STATUS PEMESANAN</span><h3 id="bkFailureTitle"></h3><p id="bkFailureMessage"></p><button class="bk-cta" id="bkFailureClose" type="button">Kembali ke pemesanan</button></div>';
  document.body.appendChild(failureDialog);
  function showBookingFailure(title, message) {
    failureDialog.querySelector('#bkFailureTitle').textContent = title;
    failureDialog.querySelector('#bkFailureMessage').textContent = message;
    failureDialog.classList.remove('bk-hide');
  }
  var pax = 1, sel = null, q = null, tripType = 'domestic', transportType = 'shuttle';
  function rp(n) { return 'Rp' + n.toLocaleString('id-ID'); }
  function iso(d) { return d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0'); }
  function nice(s) { var p = s.split('-'); return new Date(p[0], p[1] - 1, p[2]).toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' }); }
  function show(e, m) { e.textContent = m; e.style.display = m ? 'block' : 'none'; }
  function el(tag, text, cls) { var e = document.createElement(tag); if (text) e.textContent = text; if (cls) e.className = cls; return e; }
  function view(id) { ['bkSearch', 'bkForm', 'bkDone'].forEach(function (v) { $(v).classList.toggle('bk-hide', v !== id); }); }
  function clearRes() { $('bkRes').innerHTML = ''; show($('bkErr'), ''); }
  function updateMinimumTravelDate() {
    var today = iso(new Date()), dateField = $('bkDate');
    dateField.min = today;
    if (dateField.value && dateField.value < today) dateField.value = today;
    return today;
  }
  function fill(s, label, cities) {
    s.innerHTML = ''; s.appendChild(el('option', label)).value = '';
    cities.forEach(function (c) { s.appendChild(el('option', c + ', ' + COUNTRIES[c])).value = c; });
  }
  function availableDestinations(from) {
    if (tripType === 'domestic') {
      return Object.keys(CITIES).filter(function (city) { return COUNTRIES[city] === 'Indonesia' && city !== from; });
    }
    if (transportType === 'flight') {
      return Object.keys(CITIES).filter(function (city) { return COUNTRIES[city] !== COUNTRIES[from]; });
    }
    return Object.keys(INTERNATIONAL_ROUTES).reduce(function (cities, route) {
      var stops = route.split('-');
      if (stops.indexOf(from) !== -1) cities.push(stops[stops[0] === from ? 1 : 0]);
      return cities;
    }, []);
  }
  function setTripType(type) {
    tripType = type;
    var origins = Object.keys(CITIES).filter(function (city) {
      if (type === 'domestic') return COUNTRIES[city] === 'Indonesia';
      return transportType === 'flight' ? true : availableDestinationsFor(city).length > 0;
    });
    fill($('bkFrom'), 'Pilih kota asal', origins);
    $('bkFrom').value = 'Jakarta';
    updateDestinations(type === 'domestic' ? 'Bandung' : 'Singapore');
    $('bkDomestic').classList.toggle('active', type === 'domestic');
    $('bkInternational').classList.toggle('active', type === 'international');
    $('bkDomestic').setAttribute('aria-pressed', String(type === 'domestic'));
    $('bkInternational').setAttribute('aria-pressed', String(type === 'international'));
    $('bkInternationalNote').hidden = type !== 'international' && transportType !== 'flight';
    if (transportType === 'flight') {
      $('bkInternationalNote').textContent = 'Jadwal dan tarif pesawat di sini hanya perkiraan, bukan data langsung maskapai. Hubungi kami untuk memastikan harga dan ketersediaan.';
    } else {
      $('bkInternationalNote').textContent = 'Untuk perjalanan ke luar negeri, pastikan dokumen perjalanan Anda lengkap. Hubungi kami untuk memastikan jadwal dan layanan.';
    }
    clearRes();
  }
  function updateClassCards() {
    var labels = transportType === 'flight'
      ? { Ekonomi: ['Ekonomi', 'Kabin ekonomi'], Executive: ['Bisnis', 'Kabin bisnis'], VIP: ['First Class', 'Kabin premium'] }
      : { Ekonomi: ['Ekonomi', 'AC, kursi standar'], Executive: ['Executive', 'Reclining seat, USB charger'], VIP: ['VIP', 'Ruang kaki ekstra'] };
    document.querySelectorAll('input[name=bkKelas]').forEach(function (radio) {
      var text = labels[radio.value], card = radio.parentNode;
      card.querySelector('b').textContent = text[0];
      card.querySelector('small').textContent = text[1];
    });
  }
  function setTransportType(type) {
    transportType = type;
    $('bkTransportShuttle').classList.toggle('active', type === 'shuttle');
    $('bkTransportFlight').classList.toggle('active', type === 'flight');
    $('bkTransportShuttle').setAttribute('aria-pressed', String(type === 'shuttle'));
    $('bkTransportFlight').setAttribute('aria-pressed', String(type === 'flight'));
    updateClassCards();
    setTripType(tripType);
  }
  function availableDestinationsFor(from) {
    var matches = [];
    Object.keys(INTERNATIONAL_ROUTES).forEach(function (route) {
      var stops = route.split('-');
      if (stops.indexOf(from) !== -1) matches.push(stops[stops[0] === from ? 1 : 0]);
    });
    return matches;
  }
  function updateDestinations(selected) {
    var destinations = availableDestinations($('bkFrom').value);
    fill($('bkTo'), 'Pilih kota tujuan', destinations);
    if (destinations.indexOf(selected) !== -1) $('bkTo').value = selected;
  }
  function summary(r) {
    var d = el('div');
    var route = r.tripType === 'international' ? routeName(r.origin, r.dest) : r.origin + ' → ' + r.dest;
    [['Jenis perjalanan', r.tripType === 'international' ? 'Antar Negara' : 'Antar Kota'],
     ['Moda transportasi', r.transportType === 'flight' ? 'Pesawat (estimasi)' : 'Shuttle'],
     ['Rute', route], ['Berangkat', nice(r.date) + ', pukul ' + r.depart], ['Kelas', classLabel(r.kelas)],
     ['Penumpang', r.pax + ' orang (' + r.name + ')'], ['Total', rp(r.total)]].forEach(function (x) {
      var p = el('div', '', 'bk-detail-item');
      p.appendChild(el('span', x[0], 'bk-detail-label'));
      p.appendChild(el('strong', x[1]));
      d.appendChild(p);
    });
    return d;
  }

  /* ===== INISIALISASI ===== */
  setTripType('domestic');
  Object.keys(KELAS).forEach(function (k, i) {
    var l = el('label', '', 'bk-cls'), r = el('input'); r.type = 'radio'; r.name = 'bkKelas'; r.value = k; r.checked = i === 1;
    r.addEventListener('change', clearRes);
    l.appendChild(r); l.appendChild(el('b', k)); l.appendChild(el('small', KELAS[k].info)); $('bkClasses').appendChild(l);
  });
  updateMinimumTravelDate();
  document.querySelectorAll('.bk-chip[data-off]').forEach(function (c) {
    c.onclick = function () { var d = new Date(); d.setDate(d.getDate() + Number(c.dataset.off)); $('bkDate').value = iso(d); clearRes(); };
  });
  function setPax(n) { pax = Math.min(MAX_PAX, Math.max(1, n)); $('bkPax').textContent = pax; $('bkMinus').disabled = pax <= 1; $('bkPlus').disabled = pax >= MAX_PAX; }
  $('bkMinus').onclick = function () { setPax(pax - 1); clearRes(); };
  $('bkPlus').onclick = function () { setPax(pax + 1); clearRes(); };
  setPax(1);
  $('bkDomestic').onclick = function () { setTripType('domestic'); };
  $('bkInternational').onclick = function () { setTripType('international'); };
  $('bkTransportShuttle').onclick = function () { setTransportType('shuttle'); };
  $('bkTransportFlight').onclick = function () { setTransportType('flight'); };
  $('bkFrom').addEventListener('change', function () { updateDestinations(); clearRes(); });
  ['bkTo', 'bkDate'].forEach(function (id) { $(id).addEventListener('change', clearRes); });
  var turns = 0;
  $('bkSwap').onclick = function () {
    var from = $('bkFrom').value, to = $('bkTo').value;
    if (!to) return;
    $('bkFrom').value = to;
    updateDestinations(from);
    turns++; $('bkSwap').style.transform = 'rotate(' + turns * 180 + 'deg)'; clearRes();
  };

  /* ===== CARI JADWAL ===== */
  $('bkGo').onclick = function () {
    var today = updateMinimumTravelDate();
    clearRes();
    var from = $('bkFrom').value, to = $('bkTo').value, day = $('bkDate').value;
    if (!from || !to) return show($('bkErr'), 'Pilih kota asal dan tujuan.');
    if (from === to) return show($('bkErr'), 'Kota asal dan tujuan harus berbeda.');
    if (tripType === 'international' && COUNTRIES[from] === COUNTRIES[to]) {
      return show($('bkErr'), 'Pilih rute yang melintasi negara.');
    }
    if (!day) return show($('bkErr'), 'Pilih tanggal keberangkatan.');
    var now = new Date();
    if (day < today) return show($('bkErr'), 'Tanggal tersebut sudah lewat. Pilih tanggal lain.');
    var hm = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
    var k = document.querySelector('input[name=bkKelas]:checked').value;
    q = { from: from, to: to, date: day, kelas: k, type: tripType };
    var dur = duration(from, to), unit = price(from, to, k);
    var times = transportType === 'flight' ? FLIGHT_TIMES : TIMES;
    var list = times.filter(function (t) { return day !== iso(now) || t > hm; });
    if (!list.length) return show($('bkErr'), 'Tidak ada keberangkatan lagi hari ini. Silakan pilih tanggal lain.');
    var resultsHeading = el('div', '', 'bk-results-heading');
    resultsHeading.appendChild(el('strong', 'Pilihan jadwal'));
    resultsHeading.appendChild(el('span', transportType === 'flight'
      ? 'Jadwal dan tarif pesawat hanya perkiraan. Hubungi kami untuk memastikan ketersediaannya.'
      : 'Jadwal dan tarif ini merupakan data demo. Ketersediaan akan diperiksa saat Anda memesan.'));
    $('bkRes').appendChild(resultsHeading);
    list.forEach(function (t) {
      var it = el('div', '', 'bk-item'), a = el('div'), p = el('div');
      a.appendChild(el('b', t, 't'));
      a.appendChild(el('small', (transportType === 'flight' ? 'Pesawat · ' : 'Shuttle · ') +
        (tripType === 'international' ? routeName(from, to) : from + ' → ' + to) + ' · ' + classLabel(k)));
      a.appendChild(el('small', arrivalLabel(day, t, dur) + ' · Ketersediaan diperiksa saat pemesanan'));
      p.appendChild(el('b', rp(unit * pax))); p.appendChild(el('small', rp(unit) + ' / orang'));
      var b = el('button', 'Pilih', 'bk-pick'); b.type = 'button';
      b.onclick = function () {
        sel = { depart: t, price: unit };
        $('bkPicked').textContent = (transportType === 'flight' ? 'Pesawat · ' : 'Shuttle · ') +
          (tripType === 'international' ? routeName(from, to) : from + ' → ' + to) + ', ' +
          nice(day) + ', ' + t + ', ' + classLabel(k) + ', ' + pax + ' penumpang, ' + rp(unit * pax);
        show($('bkErr2'), ''); view('bkForm');
      };
      it.appendChild(a); it.appendChild(p); it.appendChild(b); $('bkRes').appendChild(it);
    });
  };
  $('bkBack').onclick = function () { clearRes(); view('bkSearch'); };

  /* ===== PESAN ===== */
  $('bkPay').onclick = async function () {
    var today = updateMinimumTravelDate();
    if (q && q.date < today) {
      showBookingFailure('Jadwal keberangkatan sudah lewat', 'Booking belum dikirim. Kembali ke jadwal, pilih tanggal '+nice(today)+' atau setelahnya, lalu cari jadwal baru.');
      return;
    }
    var name = $('bkName').value.trim(), phone = $('bkPhone').value.trim(), digits = phone.replace(/\D/g, '');
    if (name.length < 2 || digits.length < 9 || digits.length > 15) {
      showBookingFailure('Booking belum dikirim', 'Periksa kembali nama dan nomor WhatsApp. Nama minimal 2 karakter dan nomor harus berisi 9 sampai 15 digit.');
      return;
    }
    var button = $('bkPay'), originalText = button.textContent;
    button.disabled = true;
      button.textContent = 'Menyimpan pesanan...';
    show($('bkErr2'), '');
    var bookingRequestStarted = false;
    var bookingWasSaved = false;

    try {
      var tokenResponse = await fetch(new URL('/csrf-token', apiBase), {
        headers: { 'Accept': 'application/json' },
        credentials: 'include',
        cache: 'no-store'
      });
      if (!tokenResponse.ok) throw new Error('Laravel tidak dapat memberikan token keamanan.');
      var tokenData = await tokenResponse.json();
      csrfToken = tokenData.token || '';
      if (!csrfToken) throw new Error('Token keamanan kosong. Muat ulang halaman lalu coba lagi.');

      var bookingUrl = new URL($('bkSearch').dataset.bookingEndpoint || '/bookings', apiBase);
      var bookingRequest = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        credentials: 'include',
        body: JSON.stringify({
          origin: q.from,
          destination: q.to,
          travel_date: q.date,
          departure_time: sel.depart,
          transport_type: transportType,
          travel_class: q.kelas,
          passenger_count: pax,
          customer_name: name,
          customer_phone: phone
        })
      };
      bookingRequestStarted = true;
      var response = await fetch(bookingUrl, bookingRequest);
      if (response.status === 419) {
        var refreshedTokenResponse = await fetch(new URL('/csrf-token', apiBase), {
          headers: { 'Accept': 'application/json' },
          credentials: 'include',
          cache: 'no-store'
        });
        var refreshedToken = refreshedTokenResponse.ok ? await refreshedTokenResponse.json() : {};
        if (!refreshedToken.token) throw new Error('Sesi keamanan berubah. Muat ulang halaman lalu coba lagi.');
        csrfToken = refreshedToken.token;
        bookingRequest.headers['X-CSRF-TOKEN'] = csrfToken;
        response = await fetch(bookingUrl, bookingRequest);
      }
      var result = await response.json().catch(function () { return {}; });
      if (!response.ok) {
        var firstError = result.errors && Object.values(result.errors)[0];
        var errorMessage = firstError ? firstError[0] : (result.message || 'Pesanan belum berhasil disimpan. Silakan coba lagi.');
        showBookingFailure(response.status >= 500 ? 'Status booking belum bisa dipastikan' : 'Booking belum tersimpan', errorMessage);
        return;
      }

      bookingWasSaved = true;
      if (!result.booking) {
        showBookingFailure('Booking tersimpan', 'Server menerima booking, tetapi detail konfirmasi tidak terbaca. Jangan kirim ulang; periksa daftar booking admin.');
        return;
      }
      var rec = { code: result.booking.booking_code, origin: q.from, dest: q.to, tripType: q.type,
        transportType: transportType, depart: sel.depart, kelas: q.kelas,
        date: q.date, pax: result.booking.passenger_count, name: name, phone: phone,
        total: result.booking.total_fare };
      $('bkCode').textContent = rec.code;
      $('bkDoneMessage').textContent = rec.transportType === 'flight'
        ? 'Jadwal dan tarif pesawat masih berupa perkiraan. Klik tombol WhatsApp untuk mengirim kode dan mengecek ketersediaan.'
        : 'Pesanan tercatat. Klik tombol WhatsApp di bawah untuk mengirim konfirmasi; kursi ditahan selama 30 menit.';
    $('bkDetail').innerHTML = ''; $('bkDetail').appendChild(summary(rec));
      var msg = 'Halo Harlie Tour, saya ingin konfirmasi pesanan.\nKode: ' + rec.code +
      '\nJenis perjalanan: ' + (rec.tripType === 'international' ? 'Antar Negara' : 'Antar Kota') +
      '\nModa: ' + (rec.transportType === 'flight' ? 'Pesawat (estimasi)' : 'Shuttle') +
      '\nRute: ' + (rec.tripType === 'international' ? routeName(rec.origin, rec.dest) : rec.origin + ' → ' + rec.dest) +
      '\nTanggal: ' + nice(rec.date) + ', ' + rec.depart + '\nKelas: ' + classLabel(rec.kelas) + '\nPenumpang: ' + rec.pax +
      ' orang\nNama: ' + rec.name + '\nTotal: ' + rp(rec.total);
      var whatsappUrl = 'https://wa.me/' + WA + '?text=' + encodeURIComponent(msg);
      $('bkWa').href = whatsappUrl;
      view('bkDone');
    } catch (error) {
      if (bookingWasSaved) {
        showBookingFailure('Booking berhasil tersimpan', 'Konfirmasi WhatsApp gagal ditampilkan. Jangan kirim ulang booking; periksa daftar booking admin.');
      } else if (bookingRequestStarted) {
        showBookingFailure('Status booking belum bisa dipastikan', 'Koneksi terputus saat mengirim booking. Periksa daftar booking admin sebelum mencoba lagi agar tidak membuat pesanan ganda.');
      } else {
        showBookingFailure('Booking belum terkirim', error.message || 'Tidak dapat terhubung ke Laravel. Pastikan server berjalan, lalu coba lagi.');
      }
    } finally {
      button.disabled = false;
      button.textContent = originalText;
    }
  };
  $('bkFailureClose').onclick = function () { failureDialog.classList.add('bk-hide'); };
  $('bkAgain').onclick = function () { clearRes(); view('bkSearch'); };

})();
