@extends('layouts.app')
@section('title', 'Data Barang')
@section('top-title', 'Manajemen Barang')
@section('content')
<div class="page-head"><div><h1>Data Barang</h1><div class="muted">Kelola nama, kategori, harga, dan jumlah stok.</div></div><a class="btn" href="{{ route('items.create') }}">＋ Tambah Barang</a></div>
<div class="panel table-panel">
<form class="search" method="GET" action="{{ route('items.index') }}"><input name="q" value="{{ request('q') }}" placeholder="Cari nama barang..."><select name="category_id"><option value="">Semua kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected((string)request('category_id')===(string)$category->id)>{{ $category->name }}</option>@endforeach</select><button class="btn" type="submit">Filter</button><a class="btn secondary" href="{{ route('items.index') }}">Reset</a></form>
<table><thead><tr><th>#</th><th>Nama Barang</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr></thead><tbody>
@forelse($items as $item)
<tr><td>{{ $items->firstItem()+$loop->index }}</td><td><strong>{{ $item->name }}</strong></td><td><span class="badge">{{ $item->category->name }}</span></td><td>Rp {{ number_format((float)$item->price,0,',','.') }}</td><td>{{ $item->stock }}</td><td><div class="actions"><a class="btn secondary small" href="{{ route('items.edit',$item) }}">Edit</a><form method="POST" action="{{ route('items.destroy',$item) }}" onsubmit="return confirm('Hapus barang ini?')">@csrf @method('DELETE')<button class="btn danger small" type="submit">Hapus</button></form></div></td></tr>
@empty<tr><td colspan="6" class="muted">Belum ada barang yang cocok.</td></tr>@endforelse
</tbody></table><div style="margin-top:18px">{{ $items->links() }}</div></div>
@endsection
