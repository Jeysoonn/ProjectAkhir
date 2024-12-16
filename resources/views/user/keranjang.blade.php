@extends('layout.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Keranjang Belanja</h1>

    @if ($orders && $orders->produks->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->produks as $produk)
                    <tr>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->pivot->jumlah_produk }}</td>
                        <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($produk->pivot->jumlah_produk * $produk->harga, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.hapus', $produk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            <strong>Total:</strong> Rp{{ number_format($orders->produks->sum(fn($p) => $p->pivot->jumlah_produk * $p->harga), 0, ',', '.') }}
            <br>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success mt-3">Checkout</button>
            </form>
        </div>
    @else
        <p class="text-center">Keranjang Anda kosong.</p>
    @endif
</div>
@endsection
