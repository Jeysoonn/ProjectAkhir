@extends('layout.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Detail Pesanan</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders->produks as $produk)
                <tr>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->pivot->jumlah_produk }}</td>
                    <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($produk->pivot->jumlah_produk * $produk->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-right">
        <strong>Total:</strong> Rp{{ number_format($orders->order_total, 0, ',', '.') }}
    </div>
</div>
@endsection
