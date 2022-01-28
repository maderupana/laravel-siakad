{{-- @extends('main')
@section('wrapper')
    <h1>INI ADALAH HALAMAN INDEX</h1>
@endsection --}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets-home/css/bootstrap.rtl.min.css">
        <link rel="stylesheet" href="assets-home/css/animate.css">
        <link rel="stylesheet" href="assets-home/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="assets-home/css/responsive.css">
        <!-- RTL CSS -->
        <link rel="stylesheet" href="assets-home/css/rtl.css">

        <!-- Title -->
        <title>PUSHAR - PUSAT SISTEM INFORMASI SATYA DHARMA</title>

        <!-- Favicon Link -->
        <link rel="icon" type="image/png" href="assets-home/img/favicon.png">      
    </head>

    <body data-bs-spy="scroll" data-bs-offset="70" style="background:#069ee8">
        <!-- Pre-loader CSS Start -->
        <div class="loader-content">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Banner Section Start -->
        <div id="home" class="main-banner banner-style-four">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <span>SEMESTER BARU TELAH DIMULAI</span>
                                    <h1>SAATNYA MENYUSUN KRS</h1>
                                   
                                        <div class="banner-btn">
                                        <a href="{{url('dashboard')}}">SIGN</a>
                                        <!-- <a href="#" class="cv-btn">Download CV</a>      -->
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-5 offset-lg-1">
                                <div class="banner-img-two">
                                    <img src="assets/images/error/auth-img-register3.png" alt="iphone">
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>

            <div class="banner-shape">
                <img src="assets-home/img/shape/home-shape.png" alt="shape">
                <img src="assets-home/img/shape/home-shape-two.png" alt="shape">
                <img src="assets-home/img/shape/home-shape-four.png" alt="shape">
            </div>
        </div>
        <!-- Banner Section End -->

        <!-- Back to Top -->
        <div class="top-btn">
            <i class="flaticon-startup"></i>
        </div>

        <!-- Jquery JS -->
        <script src="assets-home/js/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="assets-home/js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="assets-home/js/bootstrap.min.js"></script>
        <!-- Owl Carousel JS -->
        <script src="assets-home/js/owl.carousel.min.js"></script>
        <!-- Form Ajaxchimp JS -->
		<script src="assets-home/js/jquery.ajaxchimp.min.js"></script>
		<!-- Form Validator JS -->
        <script src="assets-home/js/form-validator.min.js"></script>
        <!-- Slick Slider Popup JS -->
        <script src="assets-home/js/slick.min.js"></script>
        <!-- MixitUp JS -->
        <script src="assets-home/js/jquery.mixitup.min.js"></script>
        <!-- WOW JS -->
        <script src="assets-home/js/wow.min.js"></script>
        <!-- Magnific Popup JS -->
        <script src="assets-home/js/jquery.magnific-popup.min.js"></script>
        <!-- Custom JS -->
        <script src="assets-home/js/custom.js"></script>
    </body>
</html>