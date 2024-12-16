@extends('layout.app')

@section('title', 'Produk dan Kategori')

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar Kategori -->
        <div class="col-md-3">
            <h3 class="my-4">Kategori</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('kategori', 'Silicone Sealant') }}">Silicone Sealant</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('kategori', 'Hardware') }}">Hardware</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('kategori', 'Doors & Windows') }}">Doors & Windows</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('kategori', 'Smart Lock') }}">Smart Lock</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('kategori', 'Other Product') }}">Other Product</a>
                </li>
            </ul>
        </div>

        <!-- Daftar Produk -->
        <div class="col-md-9">
            <h3 class="text-center my-4">Produk</h3>

            <!-- Menampilkan Produk -->
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($produk->foto)
                        <a href="{{ \Storage::url($produk->foto) }}" target="blank">
                            <img src="{{ \Storage::url($produk->foto) }}" width="250" alt=""></a>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text">
                                    <strong>Stok:</strong> {{ $produk->stock }}<br>
                                    <strong>Deskripsi:</strong> {{ $produk->deskripsi }}<br>
                                    <strong>Harga:</strong> Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                               <!-- Tombol Tambah ke Keranjang -->
                               <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection


