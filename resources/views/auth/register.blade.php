@extends('layouts.app')
@section('title', 'Buat Akun')
@section('content')
<div class="auth-page">
  <section class="auth-art">
    <div style="font-weight:800;margin-bottom:60px">◈ INVENTORY MANAGEMENT</div>
    <h1>Mulai kelola stok tanpa berantakan.</h1>
    <p>Buat akun untuk mengakses dashboard dan pengelolaan data inventaris.</p>
  </section>
  <section class="auth-form-wrap">
    <form class="auth-form" method="POST" action="{{ route('register.submit') }}">
      @csrf
      <h2>Buat akun</h2><span class="muted">Isi data berikut untuk membuat akun baru.</span>
      @if($errors->any())<div class="flash failure">Periksa kembali isian formulir.</div>@endif
      <div class="field"><label> NAMA LENGKAP </label><input name="name" value="{{ old('name') }}" required maxlength="255" autocomplete="name">@error('name')<div class="error">{{ $message }}</div>@enderror</div>
      <div class="field"><label> EMAIL </label><input name="email" type="email" value="{{ old('email') }}" required autocomplete="email">@error('email')<div class="error">{{ $message }}</div>@enderror</div>
      <div class="field"><label> PASSWORD (MINIMAL 8 KARAKTER) </label><input name="password" type="password" required minlength="8" autocomplete="new-password">@error('password')<div class="error">{{ $message }}</div>@enderror</div>
      <div class="field"><label> KONFIRMASI PASSWORD </label><input name="password_confirmation" type="password" required minlength="8" autocomplete="new-password"></div>
      <button class="btn full" type="submit">Buat Akun →</button>
      <div class="form-foot">Sudah punya akun? <a href="{{ route('login') }}">Login</a></div>
    </form>
  </section>
</div>
@endsection
