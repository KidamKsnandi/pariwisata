<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Penentuan Wisata</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('front/img/favicon.ico') }}" rel="icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}">
</head>

<body>
    <style>
        body {
            background-image: url('images/bg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bg-light {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 3px 10px;
        }

    </style>

    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <small class="nav-link text-body small">{{ date('l, d M Y') }}</small>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="/login">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://twitter.com/ksnnd06"><small
                                    class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://web.facebook.com/kidnan.creativity/"><small
                                    class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.instagram.com/kidamkusnandi06/"><small
                                    class="fab fa-instagram"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    {{-- Isi --}}
    <div class="col">
        <div class="position-relative overflow-hidden" style="background-image: url('img/slider-2.jpg');">

            <div class="container">
                <div class="row slider-text align-items-center justify-content-center text-center">
                    <div class="col-md-7 col-sm-12 element-animate">
                        <h1 class="mt-5 mb-4 bg-light"> Selamat Datang Di Website Penentuan Wisata</h1>
                        <hr>
                        <h2 class="bg-light">Jalan Jalan Di Bandung Enaknya Kemana Nih? </h2>
                        <hr>
                        <h2 class="bg-light">Pilih Sesuai Kategori :</h2>
                        <hr>
                        @foreach ($kategori as $data)
                            <p class="mb-4"><a href="/beranda/{{ $data->slug }}"
                                    class="btn btn-lg btn-dark btn-block text-white">{{ $data->nama_kategori }}</a>
                        @endforeach
                        <a href="beranda/" style="float: right;" class="mt-4 btn btn-lg btn-dark text-white"> Lewati <i
                                class="fa fa-arrow-right"></i></a>
                        </p>

                    </div>
                </div>
            </div>

        </div>

    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-5 col-md-6 mb-5">
                <h2 class="mb-4 text-white text-uppercase font-weight-bold text-center">
                    <a href="/">
                        <b>
                            <span class="text-primary">Penentuan</span><span class="text-light"> Wisata</span>
                        </b>
                    </a>
                </h2>
                <div class="mb-3">
                    <p class="small text-body text-uppercase font-weight-medium text-center" href="">
                        Website ini bertujuan untuk memuat informasi tentang objek wisata di bandung untuk memudahkan
                        pengunjung dalam menentukan objek wisata yang ingin di pilih</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Hubungi Saya</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Citamiang Kidul, Bandung,
                    Indonesia</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+62 838 074 64449</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>kidamkusnandi606@gmail.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://twitter.com/ksnnd06"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                        href="https://web.facebook.com/kidnan.creativity/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2"
                        href="https://www.instagram.com/kidamkusnandi06/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Update Selanjutnya</h5>
                <p class="font-weight-medium">Fitur Komentar dan Rating</p>
                <p class="font-weight-medium">Akan Datang :)</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Penentuan Wisata</a>. Tugas PKL Di Buat Oleh <a
                href="https://www.instagram.com/kidamkusnandi06/">Kidam Kusnandi</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('front/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js') }}"></script>

    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#f4b214" />
        </svg></div>

    <script src="{{ asset('welcome/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('welcome/js/popper.min.js') }}"></script>
    <script src="{{ asset('welcome/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('welcome/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('welcome/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('welcome/js/main.js') }}"></script>
</body>

</html>
