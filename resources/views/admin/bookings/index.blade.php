<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelola Booking | Harlie Tour</title>
  <style>
    *{box-sizing:border-box}body{margin:0;background:#f3f7fa;color:#15364d;font-family:Inter,Arial,sans-serif}.topbar{display:flex;justify-content:space-between;align-items:center;gap:20px;padding:18px max(24px,calc((100% - 1320px)/2));background:#12384e;color:#fff}.brand{font-weight:800;font-size:1.1rem}.top-actions{display:flex;align-items:center;gap:16px}.top-actions span{color:#d5e5ef}.top-actions button{border:1px solid #ffffff70;background:transparent;color:#fff;border-radius:8px;padding:9px 13px;font:inherit;cursor:pointer}.main{max-width:1320px;margin:32px auto;padding:0 24px}.heading{display:flex;justify-content:space-between;align-items:end;gap:16px;margin-bottom:24px}.heading h1{margin:0 0 6px;font-size:1.8rem}.heading p{margin:0;color:#607789}.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:22px}.stat,.panel{background:#fff;border:1px solid #dce7ef;border-radius:14px}.stat{padding:18px 20px}.stat span{display:block;color:#64798a;font-size:.9rem}.stat strong{display:block;margin-top:8px;font-size:1.6rem}.panel{overflow:hidden}.toolbar{display:flex;justify-content:space-between;align-items:center;gap:14px;padding:16px 18px;border-bottom:1px solid #e4ecf2}.toolbar label{font-weight:600}.toolbar select,.update select{padding:9px 10px;border:1px solid #cad8e3;border-radius:8px;background:#fff;color:#15364d;font:inherit}.table-wrap{overflow:auto}table{width:100%;border-collapse:collapse;min-width:1060px}th,td{padding:15px 14px;text-align:left;vertical-align:top;border-bottom:1px solid #edf1f4}th{background:#f8fafc;color:#627789;font-size:.8rem;text-transform:uppercase;letter-spacing:.04em}td{font-size:.9rem}.muted{display:block;margin-top:4px;color:#718496;font-size:.82rem}.code{font-weight:800;color:#075985}.update{display:grid;grid-template-columns:1fr 1fr auto;align-items:center;gap:7px;min-width:300px}.update button{padding:9px 11px;border:0;border-radius:8px;background:#0876a6;color:white;font-weight:700;cursor:pointer}.flash{margin-bottom:18px;padding:13px 16px;border-radius:10px;background:#e6f7ee;color:#17643d}.errors{margin:0 0 18px;padding:13px 16px;border-radius:10px;background:#fff0ee;color:#9c2c20}.pagination{padding:16px}.empty{padding:36px;text-align:center;color:#607789}.footnote{margin-top:14px;color:#687e8e;font-size:.85rem;line-height:1.6}@media(max-width:700px){.topbar{align-items:flex-start}.top-actions{flex-direction:column;align-items:flex-end;gap:8px}.main{margin:24px auto;padding:0 14px}.heading{align-items:flex-start;flex-direction:column}.stats{gap:8px}.stat{padding:13px}.stat strong{font-size:1.3rem}.stat span{font-size:.78rem}.toolbar{align-items:flex-start;flex-direction:column}}
  </style>
</head>
<body>
  <header class="topbar">
    <div class="brand">Harlie Tour <span style="font-weight:400">/ Admin</span></div>
    <div class="top-actions">
      <span>{{ auth()->user()->name }}</span>
      <form method="post" action="{{ route('admin.logout') }}">@csrf<button type="submit">Keluar</button></form>
    </div>
  </header>
  <main class="main">
    <div class="heading">
      <div><h1>Booking perjalanan</h1><p>Lihat permintaan dan perbarui status booking.</p></div>
    </div>
    @if(session('success'))<div class="flash">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="errors">{{ $errors->first() }}</div>@endif

    <section class="stats" aria-label="Ringkasan booking">
      <div class="stat"><span>Menunggu konfirmasi</span><strong>{{ $counts['pending'] }}</strong></div>
      <div class="stat"><span>Booking terkonfirmasi</span><strong>{{ $counts['confirmed'] }}</strong></div>
      <div class="stat"><span>Keberangkatan hari ini</span><strong>{{ $counts['today'] }}</strong></div>
    </section>

    <section class="panel">
      <form class="toolbar" method="get" action="{{ route('admin.bookings.index') }}">
        <strong>Daftar booking</strong>
        <label for="status-filter">Filter status
          <select id="status-filter" name="status" onchange="this.form.submit()">
            <option value="">Semua status</option>
            @foreach(['pending' => 'Menunggu', 'confirmed' => 'Dikonfirmasi', 'cancelled' => 'Dibatalkan', 'completed' => 'Selesai'] as $value => $label)
              <option value="{{ $value }}" @selected($selectedStatus === $value)>{{ $label }}</option>
            @endforeach
          </select>
        </label>
      </form>
      @if($bookings->isEmpty())
        <div class="empty">Belum ada booking untuk filter ini.</div>
      @else
        <div class="table-wrap">
          <table>
            <thead><tr><th>Booking</th><th>Pemesan</th><th>Perjalanan</th><th>Jadwal</th><th>Biaya</th><th>Status &amp; pembayaran</th></tr></thead>
            <tbody>
            @foreach($bookings as $booking)
              @php($schedule = $booking->schedule)
              @php($route = $schedule?->route)
              <tr>
                <td><span class="code">{{ $booking->booking_code }}</span><span class="muted">{{ $booking->booked_at?->format('d M Y H:i') }}</span></td>
                <td>{{ $booking->customer_name }}<span class="muted">{{ $booking->customer_phone }}</span></td>
                <td>{{ $route?->origin?->name ?? '—' }} → {{ $route?->destination?->name ?? '—' }}<span class="muted">{{ ucfirst($route?->service_type ?? '—') }} · {{ $booking->travel_class }}</span></td>
                <td>{{ $schedule?->departure_at?->format('d M Y') ?? '—' }}<span class="muted">{{ $schedule?->departure_at?->format('H:i') ?? '' }} · {{ $booking->passenger_count }} penumpang</span></td>
                <td>Rp {{ number_format($booking->total_fare, 0, ',', '.') }}<span class="muted">Rp {{ number_format($booking->unit_fare, 0, ',', '.') }} / orang</span></td>
                <td>
                  <form class="update" method="post" action="{{ route('admin.bookings.update', $booking) }}">
                    @csrf @method('put')
                    <select name="status" aria-label="Status booking {{ $booking->booking_code }}">
                      @foreach(['pending' => 'Menunggu', 'confirmed' => 'Dikonfirmasi', 'cancelled' => 'Dibatalkan', 'completed' => 'Selesai'] as $value => $label)
                        <option value="{{ $value }}" @selected($booking->status === $value) @disabled($booking->status !== $value && ! in_array($value, ['pending' => ['pending', 'confirmed', 'cancelled'], 'confirmed' => ['confirmed', 'cancelled', 'completed'], 'cancelled' => ['cancelled'], 'completed' => ['completed']][$booking->status] ?? [], true))>{{ $label }}</option>
                      @endforeach
                    </select>
                    <select name="payment_status" aria-label="Status pembayaran {{ $booking->booking_code }}">
                      @foreach(['unpaid' => 'Belum bayar', 'pending' => 'Menunggu bayar', 'paid' => 'Dibayar', 'refunded' => 'Refund'] as $value => $label)
                        <option value="{{ $value }}" @selected($booking->payment_status === $value) @disabled($value === 'refunded' && $booking->payment_status !== 'paid')>{{ $label }}</option>
                      @endforeach
                    </select>
                    <button type="submit">Simpan</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="pagination">{{ $bookings->links() }}</div>
      @endif
    </section>
    <p class="footnote">Status pembayaran diperbarui secara manual setelah tim memeriksa transaksi. Perubahan status booking yang sudah selesai atau dibatalkan tidak dapat dibalik dari halaman ini.</p>
  </main>
</body>
</html>
