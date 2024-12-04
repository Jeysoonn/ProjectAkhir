@extends('layout.app')

@section('title', 'Produk dan Kategori')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar Kategori -->
        <div class="col-md-3">
            <h4 class="my-4">Kategori</h4>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('produk.kategori', 'Kategori 1') }}">Kategori 1</a></li>
                <li class="list-group-item"><a href="{{ route('produk.kategori', 'Kategori 2') }}">Kategori 2</a></li>
                <li class="list-group-item"><a href="{{ route('produk.kategori', 'Kategori 3') }}">Kategori 3</a></li>
                <!-- Anda bisa menambahkan kategori lain di sini -->
            </ul>
        </div>

        <!-- Daftar Produk -->
        <div class="col-md-9">
            <h1 class="text-center my-4">Produk</h1>

            <!-- Menampilkan Produk -->
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/produk-placeholder.jpg') }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text">
                                    <strong>Stok:</strong> {{ $produk->stock }}<br>
                                    <strong>Deskripsi:</strong> {{ $produk->deskripsi }}<br>
                                    <strong>Harga:</strong> Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
