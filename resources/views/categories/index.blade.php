@extends('layouts.app')
@section('title', 'Kategori')
@section('top-title', 'Manajemen Kategori')
@section('content')
<div class="page-head"><div><h1>Kategori</h1><div class="muted">Kelola kelompok barang inventaris.</div></div><a class="btn" href="{{ route('categories.create') }}">＋ Tambah Kategori</a></div>
<div class="panel table-panel"><table><thead><tr><th>#</th><th>Nama Kategori</th><th>Jumlah Barang</th><th>Aksi</th></tr></thead><tbody>
@forelse($categories as $category)
<tr><td>{{ $categories->firstItem()+$loop->index }}</td><td><strong>{{ $category->name }}</strong></td><td>{{ $category->items_count }} barang</td><td><div class="actions"><a class="btn secondary small" href="{{ route('categories.edit',$category) }}">Edit</a><form method="POST" action="{{ route('categories.destroy',$category) }}" onsubmit="return confirm('Hapus kategori ini?')">@csrf @method('DELETE')<button class="btn danger small" type="submit">Hapus</button></form></div></td></tr>
@empty<tr><td colspan="4" class="muted">Belum ada kategori.</td></tr>@endforelse
</tbody></table><div style="margin-top:18px">{{ $categories->links() }}</div></div>
@endsection
