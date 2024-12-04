<!DOCTYPE html>
<html lang="en">
<head>
@include('home.css')
</head>
<body>
    <!-- Navbar -->
    <header>
        @include('home.navbar')
    </header>

    <!-- Main Content -->

    @yield('content')

    <!-- Footer -->
    <footer>
        @include('home.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('novenna/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('novenna/js/main.js') }}"></script>
</body>
</html>
