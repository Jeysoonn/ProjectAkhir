@extends('layoutadmin.appadmin')

@section('title', 'Dashboard')

@section('content')
<!-- Modal -->
<div class="row">
    @foreach ($produks as $produk)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-img-top text-center p-3">
                    <!-- Gambar Produk -->
                    <img src="{{ asset('images/produk-placeholder.jpg') }}" alt="{{ $produk->nama_produk }}" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <div class="card-body d-flex flex-column">
                    <!-- Nama Produk -->
                    <h5 class="card-title text-start">{{ $produk->nama_produk }}</h5>

                    <!-- Informasi Produk -->
                    <p class="card-text text-start">
                        <strong>Stok:</strong> {{ $produk->stock }}<br>
                        <strong>Kategori:</strong> {{ $produk->kategori }}<br>
                        <strong>Harga:</strong> Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>

                    <!-- Tombol Tambah -->
                    <div class="text-center mt-auto">
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-cart-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
