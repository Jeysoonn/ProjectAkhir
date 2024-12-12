@extends('layoutadmin.appadmin')

@section('title', 'Edit Produk')

@section('content')
<div class="pagetitle">
    <h1>Edit Produk</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Produk</h5>
                    <form action="{{ route('update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="stock" name="stock"
                                value="{{ old('stock', $produk->stock) }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Silicone Sealant" {{ old('kategori', $produk->kategori) == 'Silicone Sealant' ? 'selected' : '' }}>Silicone Sealant</option>
                                    <option value="Hardware" {{ old('kategori', $produk->kategori) == 'Hardware' ? 'selected' : '' }}>Hardware</option>
                                    <option value="Doors & Windows" {{ old('kategori', $produk->kategori) == 'Doors & Windows' ? 'selected' : '' }}>Doors & Windows</option>
                                    <option value="Smart Lock" {{ old('kategori', $produk->kategori) == 'Smart Lock' ? 'selected' : '' }}>Smart Lock</option>
                                    <option value="Other Product" {{ old('kategori', $produk->kategori) == 'Other Product' ? 'selected' : '' }}>Other Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga', $produk->harga) }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">Foto Produk</label>
                            <div class="col-sm-10">
                                @if ($produk->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset(Storage::url($produk->foto)) }}" alt="{{ $produk->nama_produk }}" class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
