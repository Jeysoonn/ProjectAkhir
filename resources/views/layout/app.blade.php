<!DOCTYPE html>
<html lang="en">
<head>
@include('home.css')
</head>
<body>

    @include('home.navbar')



    @yield('content')

</body>
<!-- Footer -->
<footer>
    @include('home.footer')
</footer>
</html>
