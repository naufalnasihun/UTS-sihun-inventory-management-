@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="auth-page">
  <section class="auth-art">
    <div style="font-weight:800;margin-bottom:60px">◈ INVENTORY MANAGEMENT</div>
    <h1>Kelola inventaris dengan lebih cerdas.</h1>
    <p>Pantau barang, kategori, dan stok dalam satu ruang kerja yang sederhana, aman, dan tertata.</p>
    <div style="margin-top:45px;font-size:12px;color:#c5d5fa">Sistem Manajemen Inventaris · Laravel</div>
  </section>
  <section class="auth-form-wrap">
    <form class="auth-form" method="POST" action="{{ route('login.submit') }}">
      @csrf
      <h2>Selamat datang 👋</h2>
      <span class="muted">Masuk untuk melanjutkan ke dashboard inventaris.</span>
      @if(session('success'))<div class="flash success">{{ session('success') }}</div>@endif
      @if($errors->any())<div class="flash failure">Periksa kembali email dan password Anda.</div>@endif
      <div class="field"><label for="email">EMAIL</label><input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="admin@inventaris.test" required autofocus autocomplete="email">@error('email')<div class="error">{{ $message }}</div>@enderror</div>
      <div class="field"><label for="password">PASSWORD</label><input id="password" name="password" type="password" placeholder="Masukkan password" required autocomplete="current-password">@error('password')<div class="error">{{ $message }}</div>@enderror</div>
      <label style="display:flex;gap:8px;align-items:center;font-size:12px;margin:5px 0 20px;color:#526079"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
      <button class="btn full" type="submit">Masuk ke Dashboard →</button>
      <div class="form-foot">Belum punya akun? <a href="{{ route('register') }}">Buat akun</a></div>
    </form>
  </section>
</div>
@endsection
