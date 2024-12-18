@extends('layoutadmin.appadmin')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-md-6 mb-4">
                <!-- Card Produk -->
                <div class="card shadow-sm">
                    <div class="row g-0">
                        <!-- Bagian Gambar -->
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <img src="{{ asset(Storage::url($produk->foto)) }}"
                                 class="img-fluid rounded-start"
                                 alt="{{ $produk->nama_produk }}"
                                 style="width: 100%; height: 200px; object-fit: cover;">
                        </div>
                        <!-- Bagian Detail Produk -->
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- Nama Produk -->
                                <h5 class="card-title mb-3">{{ $produk->nama_produk }}</h5>

                                <!-- Informasi Produk -->
                                <p class="card-text">
                                    <strong>Stok:</strong> {{ $produk->stock }} <br>
                                    <strong>Kategori:</strong> {{ $produk->kategori }} <br>
                                    <strong>Harga:</strong> Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>

                                <!-- Tombol Aksi -->
                                <div class="d-flex">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('edit', $produk->id) }}"
                                       class="btn btn-warning btn-sm me-2 d-flex align-items-center">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('destroy', $produk->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center"
                                                onclick="return confirm('Yakin ingin menghapus data?')">
                                            <i class="bi bi-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row -->
                </div> <!-- End Card -->
            </div> <!-- End Col -->
        @endforeach
    </div> <!-- End Row -->
</div> <!-- End Container -->
@endsection
