@extends('layout.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Riwayat Pesanan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        
    <a href="{{ route('order.detail', $bayar->order_id) }}" class="btn btn-info btn-sm">Lihat Pesanan</a>
@endsection
