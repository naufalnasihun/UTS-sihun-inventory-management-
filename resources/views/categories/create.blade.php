@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('top-title', 'Tambah Kategori')
@section('content')
<div class="page-head"><div><h1>Tambah Kategori</h1><div class="muted">Buat kategori baru untuk mengelompokkan barang.</div></div><a class="btn secondary" href="{{ route('categories.index') }}">Kembali</a></div>
<div class="panel" style="max-width:680px"><form method="POST" action="{{ route('categories.store') }}">@csrf
<div class="field"><label for="name">NAMA KATEGORI</label><input id="name" name="name" value="{{ old('name') }}" required maxlength="255" placeholder="Contoh: Aksesori">@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<button class="btn" type="submit">Simpan Kategori</button></form></div>
@endsection
