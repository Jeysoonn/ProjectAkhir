<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Novena- Health & Care Medical template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css') }}">

    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="/solusi">Solusi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kebijakan">Kebijakan</a></li>
                    <li class="nav-item">
                        <form action="{{ route('keranjang') }}" method="GET">
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="icofont-cart"></i>
                            </button>
                        </form>
                    </li>

                    <!-- Dropdown Profil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icofont-user-alt-4"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            @auth
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            @endauth
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

</body>
<!-- Footer -->
<footer class="footer section gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <img src="images/logo.png" alt="" class="img-fluid">
                    </div>
                    <p>Office Address: Rm 1904, Building A4, Lvdao Office,
                        Town, Chancheng District, Foshan City, Guangdong Province, China.</p>
                    <p>Tel: +86-757-82252117</p>
                    <p>Email: info@chngoo.com.</p>

                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Product</h4>
                    <div class="divider mb-4"></div>
                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="{{ route('kategori', 'Silicone Sealant') }}">Silicone Sealant</a></li>
                        <li><a href="{{ route('kategori', 'Hardware') }}">Hardware</a></li>
                        <li><a href="{{ route('kategori', 'Doors & Windows') }}">Doors & Windows</a></li>
                        <li><a href="{{ route('kategori', 'Smart Lock') }}">Smart Lock</a></li>
                        <li><a href="{{ route('kategori', 'Other Product') }}">Other Product</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Menu</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                    <li><a href="/home">Home</a></li>
                    <li><a href="/about">Tentang Kami</a></li>
                    <li><a href="/produk">Produk</a></li>
                    <li><a href="/solusi">Solusi</a></li>
                    <li><a href="/berita">Berita</a></li>
                    <li><a href="/kontak">Kontak</a></li>
                    <li><a href="/kebijakan">Kebijakan</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Contact Us</h4>
                    <div class="divider mb-4"></div>

                    <div class="footer-contact-block mb-4">
                        <div class="icon d-flex align-items-center">
                            <i class="icofont-email mr-3"></i>
                            <span class="h6 mb-0">Support Available for 24/7</span>
                        </div>
                        <h4 class="mt-2"><a href="tel:+23-345-67890">Support@email.com</a></h4>
                    </div>

                    <div class="footer-contact-block">
                        <div class="icon d-flex align-items-center">
                            <i class="icofont-support mr-3"></i>
                            <span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
                        </div>
                        <h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Main jQuery -->
<script src="plugins/jquery/jquery.js"></script>
<!-- Bootstrap 4.3.2 -->
<script src="plugins/bootstrap/js/popper.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/counterup/jquery.easing.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<!-- Counterup -->
<script src="plugins/counterup/jquery.waypoints.min.js"></script>

<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="plugins/counterup/jquery.counterup.min.js"></script>
<!-- Google Map -->
<script src="plugins/google-map/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
</script>

<script src="js/script.js"></script>
<script src="js/contact.js"></script>
<!-- Scripts -->
<script src="{{ asset('novenna/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('novenna/js/main.js') }}"></script>

</html>
