@extends('layoutadmin.appadmin')

@section('title', 'Dashboard')

@section('content')
<!-- Modal -->
<div class="row">
    @foreach ($produks as $produk)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-img-top text-center">
                    <!-- Gambar Produk -->
                    <img src="{{ asset(Storage::url($produk->foto)) }}" alt="" style="width: 250px; height: 250px;">
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

                    <!-- Tombol Aksi -->
                    <div class="mt-auto">
                        <div class="row">
                            <!-- Tombol Edit -->
                            <div class="col-6">
                                <a href="{{ route('edit', $produk->id) }}" class="btn btn-warning btn-sm w-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-pencil-square me-2"></i> Edit
                                </a>
                            </div>

                            <!-- Tombol Hapus -->
                            <div class="col-6">
                                <form action="{{ route('destroy', $produk->id) }}" method="POST" class="d-inline w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100 d-flex align-items-center justify-content-center" onclick="return confirm('Yakin ingin menghapus data?')">
                                        <i class="bi bi-trash me-2"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
