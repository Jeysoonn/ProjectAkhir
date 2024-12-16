@extends('layout.applogin')

@section('title', 'Produk dan Kategori')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg" style="width: 950px; border-radius: 15px; overflow: hidden;">
            <div class="row g-0">
                <!-- Bagian Gambar -->
                <div class="col-md-6">
                    <img src="{{ asset('/images/bg/login.jpg') }}" class="img-fluid h-100" style="object-fit: cover;">
                </div>

                <!-- Bagian Form -->
                <div class="col-md-6 p-5">

                    <h4 class="mb-4 text-center">Masuk ke Akun Anda</h4>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('dologin') }}">
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
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div class="mt-3 text-center">
                            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
