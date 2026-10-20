@extends('layouts.app')
@section('title', 'Tambah Barang')
@section('top-title', 'Tambah Barang')
@section('content')
<div class="page-head"><div><h1>Tambah Barang</h1><div class="muted">Isi data barang dan pilih kategori yang valid.</div></div><a class="btn secondary" href="{{ route('items.index') }}">Kembali</a></div>
<div class="panel" style="max-width:760px"><form method="POST" action="{{ route('items.store') }}">@csrf
<div class="field"><label>NAMA BARANG</label><input name="name" value="{{ old('name') }}" required maxlength="255" placeholder="Contoh: Keyboard">@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label>KATEGORI</label><select name="category_id" required><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{ $category->name }}</option>@endforeach</select>@error('category_id')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label>HARGA (RUPIAH)</label><input name="price" type="number" min="0.01" step="0.01" value="{{ old('price') }}" required placeholder="150000">@error('price')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label>STOK</label><input name="stock" type="number" min="0" step="1" value="{{ old('stock',0) }}" required>@error('stock')<div class="error">{{ $message }}</div>@enderror</div>
<button class="btn" type="submit">Simpan Barang</button></form></div>
@endsection
