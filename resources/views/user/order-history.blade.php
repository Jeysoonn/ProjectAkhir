@extends('layout.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Riwayat Pesanan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($orderHistories->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderHistories as $orderHistory)
                    <tr>
                        <td>{{ $orderHistory->created_at->format('d-m-Y') }}</td>
                        <td>Rp{{ number_format($orderHistory->order_total, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($orderHistory->status) }}</td>
                        <td>
                            {{ $orderHistory->produk_nama }} -
                            Rp{{ number_format($orderHistory->produk_harga, 0, ',', '.') }} ({{ $orderHistory->jumlah_produk }} pcs)
                        </td>
                        <td>
                            {{-- <a href="{{ route('order.detail', $orderHistory->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">Anda belum memiliki pesanan.</p>
    @endif
</div>
@endsection
