@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('top-title', 'Edit Kategori')
@section('content')
<div class="page-head"><div><h1>Edit Kategori</h1><div class="muted">Perbarui nama kategori.</div></div><a class="btn secondary" href="{{ route('categories.index') }}">Kembali</a></div>
<div class="panel" style="max-width:680px"><form method="POST" action="{{ route('categories.update',$category) }}">@csrf @method('PUT')
<div class="field"><label for="name">NAMA KATEGORI</label><input id="name" name="name" value="{{ old('name',$category->name) }}" required maxlength="255">@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<button class="btn" type="submit">Simpan Perubahan</button></form></div>
@endsection
