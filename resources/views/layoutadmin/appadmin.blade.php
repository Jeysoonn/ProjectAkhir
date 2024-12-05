<!DOCTYPE html>
<html lang="en">
<head>
@include('homeadmin.css')
</head>
<body>
    <!-- Navbar -->
    <header>
        @include('homeadmin.sidebar')
    </header>

    <!-- Main Content -->
    <main id="main" class="main">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer>
        @include('homeadmin.footer')
    </footer>

    <!-- Scripts -->

</body>
</html>


