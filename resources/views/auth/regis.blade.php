@extends('layout.applogin')

@section('title', 'Produk dan Kategori')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg" style="width: 600px; border-radius: 15px; overflow: hidden;">

            <div class="row p-5">

                <!-- Bagian Form -->
                <div class="col-md-12 p-5">

                    <h4 class="mb-4 text-center">Daftar Akun Baru</h4>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                value="{{ old('alamat') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        <div class="mt-3 text-center">
                            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
