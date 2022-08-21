<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <title> My protofolio </title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="front end developer">
        <meta name="keywords" content="freelancer,front-end developer,HTML,CSS,JavaScript , part time">
        <meta name="author" content="Nourhan Sherief">
        <!--<link href="https://necolas.github.io/normalize.css/7.0.0/normalize.css" rel="stylesheet" />-->
        <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('public/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/owl.theme.default.css') }}" rel="stylesheet">
        <!--<link href="{{ asset('public/css/animate.css/animate.min.css') }}" rel="stylesheet">-->
        <link href="{{ asset('public/css/template.css') }}" rel="stylesheet">
        <link href="{{ asset('public/js/revolution/css/settings.css') }}" rel="stylesheet">
        <link href="{{ asset('public/js/revolution/css/rev-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/customResponsive.css') }}" rel="stylesheet">
        @if( LaravelLocalization::getCurrentLocale() === "ar")
        <link href="{{ asset('public/css/ar_style.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amiri|Scheherazade" rel="stylesheet">
        @else
        @endif
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/images/fav/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('public/images/fav/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/images/fav/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/images/fav/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/images/fav/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/images/fav/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/images/fav/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/images/fav/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/images/fav/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('public/images/fav/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/images/fav/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/images/fav/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/fav/favicon-16x16.png') }}">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body>
        <div class="loader">
            <div class="corners">
                <div class="corner corner--1"></div>
                <div class="corner corner--2"></div>
                <div class="corner corner--3"></div>
                <div class="corner corner--4"></div>
            </div>
        </div>
        <a id="back-to-top" href="#" class="pointer">
            <i class="fa fa-arrow-circle-up"></i>
        </a>
        <header class="header">
            <div class="green-background">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                        </div>

                        <div class="col-md-4 reversible-text text-right pl-0 pr-0 pt-2">
                            <div class="header-social-logos mr-2 pl-0 pr-0 custom-hide">
                                <ul class="mr-2 pl-0 pr-0">
                                    <li class="pl-3"><a href="#" target="_self"><span class="fa fa-twitter"></span></a></li>
                                    <li class="pl-3"><a href="#" target="_self"><span class="fa fa-facebook-f light-grey-green-leaf"></span></a></li>
                                    <li class="pl-3"><a href="#" target="_self"><span class="fa fa-instagram"></span></a></li>
                                    <li class="pl-3"><a href="#" target="_self"><span class="fa fa-google-plus light-grey-green-leaf"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <ul class="localization">

                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    @if( LaravelLocalization::getCurrentLocale() != "ar" && $localeCode == "ar")

                                    <a class="white-text" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <!--{{ $properties['native'] }}-->
                                        {{ Html::image("images/Egypt-Flag.png", 'alt text', array('class' => 'flag img-fluid')) }}


                                    </a>

                                    @endif
                                    @if( LaravelLocalization::getCurrentLocale() != "en" && $localeCode == "en")
                                    <a class="white-text" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">

                                        {{ Html::image("images/1350769815_united-kingdom-flag.png", 'alt text', array('class' => 'flag img-fluid')) }}

                                    </a>
                                    @endif
                                    <!--|-->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-expand-lg justify-content-end white-background p-0">
                <div class="container nav-padding">
                    <a class="navbar-brand d-block" href="#">
                        {{ Html::image("images/logo.png", 'alt text', array('class' => 'img-fluid logo-img bubble mb-1')) }}
                    </a>
                    <button class="navbar-toggler mt-2 mb-2" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="col-md-10  reversible-form reversible-text text-right menu-font">
                        <div class="collapse navbar-collapse  pt-4 pb-4 custom-navbar ml90" id="navbar1">
                            <ul class="navbar-nav pr-0">
                                <li class="nav-item">
                                    <a  class="{{ Request::segment(2)==null? 'nav-link nav-item-active' : 'nav-link' }}"
                                     href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/') }}"  role="button" >
                                     {{ Lang::get('headings.home')}}
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a  class="{{ Request::segment(2) === 'webAbout'  ? 'nav-link nav-item-active' : 'nav-link' }}"
                                    href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webAbout') }}" role="button" >
                            {{ Lang::get('headings.about')}}
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="{{ Request::segment(2) === 'webProductCategories'  ? 'nav-link nav-item-active' : 'nav-link' }} dropbtn"
                                     href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webProductCategories') }}"  >
                                        {{ Lang::get('headings.products')}} <span class="sr-only">(current)</span> <i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-content">
                                        @foreach($product_catgegories as $product_catgegory)
                                        <a class="dropdown-item mb-2" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webProductCategory/{$product_catgegory->id}") }}">
                                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                                            {{$product_catgegory->arabic_name}}
                                            @else
                                            {{$product_catgegory->english_name}}
                                            @endif
                                        </a>
                                        @endforeach
                                    </div>
                                </li>
                                <!--                                <li class="nav-item">
                                                                    <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webCertifications') }}"  >
                                                                        {{ Lang::get('headings.certifications')}}
                                                                    </a>
                                                                </li>-->
                                <li class="nav-item">
                                    <a class=" {{ Request::segment(2) === 'webContact'  ? 'nav-link nav-item-active' : 'nav-link' }}"
                                     href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webContact') }}"  >
                                        {{ Lang::get('headings.contacts')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class=" {{ Request::segment(2) === 'webGallery'  ? 'nav-link nav-item-active' : 'nav-link' }}"
                                    href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webGallery') }}"  >
                                        {{ Lang::get('headings.galleries')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ Request::segment(2) === 'webNews'  ? 'nav-link nav-item-active' : 'nav-link' }}"
                                     href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webNews') }}"  >
                                        {{ Lang::get('headings.news')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ Request::segment(2) === 'webUsefulLink'  ? 'nav-link nav-item-active' : 'nav-link' }}"
                                     href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/webUsefulLink') }}"  >
                                        {{ Lang::get('headings.usefulLinks')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
<!--        <section class='white-area' style="; background: #fff;width:100%"></section>-->

        @yield('content')
        <hr>
        <section id="footer" class="mt-5 ml-2 mr-2 mb-5 ligh">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="social-logos">
                            <ul class="p-0 m-0">
                                <li class="pl-4"><a href="#" target="_self"><span class="fa fa-twitter"></span></a></li>
                                <li class="pl-4"><a href="#" target="_self"><span class="fa fa-facebook-f"></span></a></li>
                                <li class="pl-4"><a href="#" target="_self"><span class="fa fa-instagram"></span></a></li>
                                <li class="pl-4"><a href="#" target="_self"><span class="fa fa-google-plus"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center footer-size">
                        2018 © {{ Lang::get('headings.copyright')}}
                        <a class="dark-green-leaf">{{ Lang::get('headings.seniorConsulting')}}</a>

                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--<script  src="{{ asset('public/js/jquery-3.2.1.slim.min.js') }}"  type="text/javascript"></script>-->
        <script  src="{{ asset('public/js/myjs.js') }}"  type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script  src="{{ asset('public/js/bootstrap.min.js') }}"  type="text/javascript"></script>

        <script  src="{{ asset('public/js/revolution/js/jquery.themepunch.tools.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/jquery.themepunch.revolution.min.js.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/rev-slider.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.carousel.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.actions.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.navigation.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/revolution/js/extensions/revolution.extension.parallax.min.js') }}"  type="text/javascript"></script>
        <!--        <script src="js/revolution/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
                <script src="js/revolution/js/jquery.themepunch.revolution.min.js.js" type="text/javascript"></script>
                <script src="js/rev-slider.js" type="text/javascript"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.actions.min.js"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
                <script type="text/javascript" src="js/revolution/js/extensions/revolution.extension.parallax.min.js"></script>-->

        <script>
$(document).on('scroll', function ()
{

//    if ($(this).scrollTop() === 0)
//    {

//                    $("#navbar").removeClass("sticky");
//        console.log($(this).scrollTop());
//    }
//    if ($(this).scrollTop() + 20 >= $('#navbar').position().top) {
//                    $("#navbar").addClass("sticky");
//    }
});</script>

        <script  src="{{ asset('public/js/owl.carousel.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/jquery.owl-filter.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/basic-js.js') }}"  type="text/javascript"></script>

        <script>
$(function () {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        dots: false,
        //                    animateOut: 'slideOutDown',
        //                    animateIn: 'slideInDown',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


});</script>
        <!---->

        <script  src="{{ asset('public/js/jquery.easing.1.3.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/isotope.pkgd.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/grid.js') }}"  type="text/javascript"></script>
<!--        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/isotope.pkgd.min.js" type="text/javascript"></script>
        <script src="js/grid.js" type="text/javascript"></script>-->
        <script type="text/javascript">
$(document).ready(function () {
    $(".loader").fadeOut(3000);




//    $("a").on('click', function (event) {
//
//        // Make sure this.hash has a value before overriding default behavior
//        if (this.hash !== "") {
//            // Prevent default anchor click behavior
//            event.preventDefault();
//            // Store hash
//            var hash = this.hash;
//            // Using jQuery's animate() method to add smooth page scroll
//            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//            $('html, body').animate({
//                scrollTop: $(hash).offset().top
//            }, 800, function () {
//
//                // Add hash (#) to URL when done scrolling (default click behavior)
//                window.location.hash = hash;
//            });
//        } // End if
//    });
    // declare variable
    var scrollTop = $("#back-to-top");
    $(window).scroll(function () {
        // declare variable
        var topPos = $(this).scrollTop();
        // if user scrolls down - show scroll to top button
        if (topPos > 100) {
            $(scrollTop).css("opacity", "1");
        } else {
            $(scrollTop).css("opacity", "0");
        }

    }); // scroll END

//    //Click event to scroll to top
    $(scrollTop).click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    }); // click() scroll top EMD

});
var owlCategory = $("#owl-category");
owlCategory.owlCarousel({
    slideSpeed: 300,
    nav: true,
    dots: false,
    rewind: true,
    paginationSpeed: 300,
    responsiveClass: true,
//                    items: 4,
    margin: 20,
    loop: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 3,
            nav: true
        },
        1000: {
            items: 4,
            nav: true,
            loop: false
        }
    }

});

        </script>

        <script type="text/javascript" src="{{ asset('public/js/webAjax.js') }}">
        </script>
        <script type="text/javascript">
            var galleryTypeImages = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'galleryTypeImages') }}";
            var webProductSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'webProductSearch') }}";
        </script>
        <script  src="{{ asset('public/js/jssor.slider-27.5.0.min.js') }}"  type="text/javascript"></script>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {

                var jssor_1_SlideshowTransitions = [
                    {$Duration: 1200, $Zoom: 1, $Easing: {$Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad}, $Opacity: 2},
                    {$Duration: 1000, $Zoom: 11, $SlideOut: true, $Easing: {$Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear}, $Opacity: 2},
                    {$Duration: 1200, $Zoom: 1, $Rotate: 1, $During: {$Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]}, $Easing: {$Zoom: $Jease$.$Swing, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$Swing}, $Opacity: 2, $Round: {$Rotate: 0.5}},
                    {$Duration: 1000, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: {$Zoom: $Jease$.$InQuint, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint}, $Opacity: 2, $Round: {$Rotate: 0.8}},
                    {$Duration: 1200, x: 0.5, $Cols: 2, $Zoom: 1, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$Linear}, $Opacity: 2},
                    {$Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear}, $Opacity: 2},
                    {$Duration: 1200, x: 0.6, $Zoom: 1, $Rotate: 1, $During: {$Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]}, $Opacity: 2, $Round: {$Rotate: 0.5}},
                    {$Duration: 1000, x: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: {$Left: $Jease$.$InQuint, $Zoom: $Jease$.$InQuart, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint}, $Opacity: 2, $Round: {$Rotate: 0.8}},
                    {$Duration: 1200, x: -0.6, $Zoom: 1, $Rotate: 1, $During: {$Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8]}, $Opacity: 2, $Round: {$Rotate: 0.5}},
                    {$Duration: 1000, x: 4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: {$Left: $Jease$.$InQuint, $Zoom: $Jease$.$InQuart, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint}, $Opacity: 2, $Round: {$Rotate: 0.8}},
                    {$Duration: 1200, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic}, $Opacity: 2, $Round: {$Rotate: 0.7}},
                    {$Duration: 1000, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: {$Column: 15}, $Easing: {$Left: $Jease$.$InExpo, $Top: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InExpo}, $Opacity: 2, $Round: {$Rotate: 0.7}},
                    {$Duration: 1200, x: -4, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: {$Row: 28}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic}, $Opacity: 2, $Round: {$Rotate: 0.7}},
                    {$Duration: 1200, x: 1, y: 2, $Cols: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: {$Column: 19}, $Easing: {$Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}}
                ];

                var jssor_1_options = {
                    $AutoPlay: 1,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,
                        $Rows: 2,
                        $SpacingX: 14,
                        $SpacingY: 12,
                        $Orientation: 2,
                        $Align: 156
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                /*#region responsive code begin*/

                var MAX_WIDTH = 960;

                function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                        jssor_1_slider.$ScaleWidth(expectedWidth);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                ScaleSlider();

                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
            });
        </script>



    </body>
</html>
