<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" href="img/favicon.png">

    {{-- fontawesome--}}
    <link href="{{asset('Admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('front/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('front/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    @stack('style')
</head>

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="{{asset('front/img/logo.png')}}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about')}}">about</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products.products_list')}}">product list
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('blog')}}">blog</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex align-items-center">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->
@include('partials._success')

@yield('content')

<!-- subscribe part here -->
<section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                    <h2>Get promotions & updates!</h2>
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                    {!! Form::open(['route' => 'subscribes.store','id'=>'subscribe_form','method'=>'post']) !!}
                    <div class="subscribe_form">
                        <input type="email" name="email" placeholder="Enter your mail">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <a href="#" id="subscribe-submit" class="btn_1">Subscribe</a>

                    </div>

                    {!! Form::close() !!}
                    @push('script')
                        <script>
                            $('#subscribe-submit').click(function (e) {
                                e.preventDefault();
                                $('#subscribe_form').submit();
                            })
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe part end -->

<!--::footer_part start::-->
<footer class="footer_part">
    <div class="footer_iner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="footer_menu">
                        <div class="footer_logo">
                            <a href="index.html"><img src="{{asset('front/img/logo.png')}}" alt="#"></a>
                        </div>
                        <div class="footer_menu_item">
                            <a href="{{route('home')}}">Home</a>
                            <a href="{{'about'}}">About</a>
                            <a href="product_list.html">Products</a>
                            <a href="#">Pages</a>
                            <a href="blog.html">Blog</a>
                            <a href="{{route('contact')}}">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="social_icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright_part">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        <div class="copyright_link">
                            <a href="#">Turms & Conditions</a>
                            <a href="#">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->

<!-- jquery plugins here-->
<script src="{{asset('front/js/jquery-1.12.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('front/js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- magnific popup js -->
<script src="{{asset('front/js/jquery.magnific-popup.js')}}"></script>
<!-- carousel js -->
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/jquery.nice-select.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('front/js/slick.min.js')}}"></script>
<script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('front/js/waypoints.min.js')}}"></script>
<script src="{{asset('front/js/contact.js')}}"></script>
<script src="{{asset('front/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('front/js/jquery.form.js')}}"></script>
<script src="{{asset('front/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('front/js/mail-script.js')}}"></script>

{{--axios--}}
<script src="{{asset('plugins/axios/axios.min.js')}}"></script>

<!-- custom js -->
<script src="{{asset('front/js/custom.js')}}"></script>
<script>
    window.axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
</script>

@stack('script')
</body>

</html>
