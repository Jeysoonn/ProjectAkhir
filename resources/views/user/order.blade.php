@extends('layout.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Order Anda</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($orders)
            <div class="card">
                <div class="card-header">
                    <h4>Detail Order</h4>
                </div>
                <div class="card-body">
                    <p><strong>No. Order:</strong> {{ $orders->id }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($orders->status) }}</p>
                    <p><strong>Total Belanja:</strong> Rp{{ number_format($orders->order_total, 0, ',', '.') }}</p>

                    <h5>Daftar Produk</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->produks as $produk)
                                <tr>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->pivot->jumlah_produk }}</td>
                                    <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($produk->pivot->jumlah_produk * $produk->harga, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p><strong>Total Pembayaran:</strong> Rp{{ number_format($orders->order_total, 0, ',', '.') }}</p>

                    @if ($orders && $orders->produks->count() > 0)
                        <div class="text-right">
                            <strong>Total:</strong>
                            Rp{{ number_format($orders->produks->sum(fn($p) => $p->pivot->jumlah_produk * $p->harga), 0, ',', '.') }}
                            <br>
                            <form action="{{ route('pembayaran', $orders->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-3">Proses Pembayaran</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <p class="text-center">Order tidak ditemukan.</p>
        @endif
    </div>
@endsection
