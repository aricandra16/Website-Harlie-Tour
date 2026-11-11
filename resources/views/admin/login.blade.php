<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk Admin | Harlie Tour</title>
  <style>
    *{box-sizing:border-box}body{margin:0;min-height:100vh;display:grid;place-items:center;padding:24px;background:#eef4f8;color:#12344b;font-family:Inter,Arial,sans-serif}.card{width:min(100%,430px);padding:36px;background:#fff;border:1px solid #dce7ef;border-radius:20px;box-shadow:0 18px 50px #173d5514}h1{margin:0 0 8px;font-size:1.7rem}p{margin:0 0 26px;color:#63788a;line-height:1.6}label{display:block;margin:16px 0 7px;font-weight:600}input{width:100%;padding:12px 14px;border:1px solid #cbd8e2;border-radius:10px;font:inherit}input:focus{outline:3px solid #0ea5e933;border-color:#0284c7}.remember{display:flex;align-items:center;gap:9px;margin:16px 0;color:#526779}.remember input{width:auto}.button{width:100%;padding:13px;border:0;border-radius:10px;background:#075985;color:#fff;font:inherit;font-weight:700;cursor:pointer}.error{margin:8px 0 0;color:#b42318;font-size:.9rem}.back{display:block;margin-top:20px;text-align:center;color:#075985;text-decoration:none}
  </style>
</head>
<body>
  <main class="card">
    <h1>Admin Harlie Tour</h1>
    <p>Masuk untuk mengelola booking dan konfirmasi pembayaran.</p>
    <form method="post" action="{{ route('admin.login.store') }}">
      @csrf
      <label for="email">Email</label>
      <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
      @error('email')<div class="error">{{ $message }}</div>@enderror
      <label for="password">Kata sandi</label>
      <input id="password" name="password" type="password" autocomplete="current-password" required>
      @error('password')<div class="error">{{ $message }}</div>@enderror
      <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
      <button class="button" type="submit">Masuk</button>
    </form>
    <a class="back" href="{{ route('home') }}">Kembali ke website</a>
  </main>
</body>
</html>
