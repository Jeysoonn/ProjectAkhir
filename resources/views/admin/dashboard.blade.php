@extends('layoutadmin.appadmin')

@section('title', 'Dashboard')

@section('content')
<div class="col-lg-12">
    <div class="row">
        <!-- Card Total Produk Terjual -->
        <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Produk Terjual</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $totalproduk}}</h6>
                            <span class="text-success small pt-1 fw-bold">Total Barang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Total Nilai Produk Terjual -->
        <div class="col-xxl-6 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total Nilai Produk Terjual</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">

                        </div>
                        <div class="ps-3">
                            <h6>Rp {{ number_format($totaljual, 0, ',', '.') }}</h6>
                            <span class="text-success small pt-1 fw-bold">Total Pendapatan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order History</h5>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderHistories as $history)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $history->email }}</td>
                                    <td>{{ $history->produk_nama }}</td>
                                    <td>Rp {{ number_format($history->produk_harga, 2) }}</td>
                                    <td>{{ $history->jumlah_produk }}</td>
                                    <td>Rp {{ number_format($history->produk_subtotal, 2) }}</td>
                                    <td>{{ $history->status }}</td>
                                    <td>
                                        {{-- <a href="{{ route('order.history.view', $history->id) }}" --}}
                                            {{-- class="btn btn-primary btn-sm">View</a> --}}
                                        <!-- If needed, add delete functionality here -->
                                        {{-- <!-- <a href="{{ route('order.history.delete', $history->id) }}" class="btn btn-danger btn-sm">Delete</a> --> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Pagination (optional, if you want to paginate the records) -->
                    <div class="d-flex justify-content-end">
                        {{-- {{ $orderHistories->links() }} --}}
                    </div>
                </div>
            </div>
        </div>

@endsection
