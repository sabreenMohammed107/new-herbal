<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title> {{ Lang::get('headings.BioAgri')}} </title>

        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous" />
        <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
        <!--<link href="{{ asset('public/css/prism.css') }}" rel="stylesheet">-->
        <link href="{{ asset('public/css/chosen.css') }}" rel="stylesheet">
        <link href="{{ asset('public/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        @if( LaravelLocalization::getCurrentLocale() == "ar")
        <link href="{{ asset('public/css/ar_style.css') }}" rel="stylesheet">
        @endif
        <link href="{{ asset('public/css/common.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class=" full-height">
            <div class="container-fluid h100">
                <div class="main-content ">
                    <nav class="row main-navbar white-background">
                        <div class="col-md-4 brand">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('public/public/images/logo.png') }}"  class="img-fluid bubble" width="100" alt="Senior Steps"/>
                            </a>
                        </div>
                        <div class="col-md-4 text-right">
                            <ul class="localization">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                    |
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4 text-right">

                            <ul class="localization">
                                @if (Auth::guest())
                                <li style="color:#000"><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                                @else
                            <li class="dropdown">
                                    <a style="color:#000" href="#" class="dropdown-toggle uppercase" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li class="d-block"><a href="{{ url('/register') }}"><i class="fa fa-btn fa-sign-out"></i>Register</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                    </ul>
                                </li
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <div class="row reversible-form mt-4">
                        <div class="col-md-3 sidebar sidebar-background pt-4 pb-4">
                            <div class="vertical-tabs pr-5 reversible-form" >
<!--                                <div class="mb-3 reversible-text" >
                                    <i class="fa fa-circle white-text pr-2"></i>
                                    <h4 class="smoky-blue-text d-inline-block  reversible-text white-text">
                                        Nour
                                    </h4>
                                </div>-->
                                <ul class="nav nav-pills p0 custom-nav">
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/sliderImage') }}"  >
                                            {{ Lang::get('headings.sliderImages')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/customerReview') }}"  >
                                            {{ Lang::get('headings.customerReviews')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/about') }}"  >
                                            {{ Lang::get('headings.about')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/aboutAchievement') }}"  >
                                            {{ Lang::get('headings.aboutAchievements')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/productCategory') }}"  >
                                            {{ Lang::get('headings.productCategories')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/product') }}"  >
                                            {{ Lang::get('headings.products')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/certifcate') }}"  >
                                            {{ Lang::get('headings.certifications')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/contact') }}"  >
                                            {{ Lang::get('headings.contacts')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/galleryType') }}"  >
                                            {{ Lang::get('headings.galleryTypes')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/gallery') }}"  >
                                            {{ Lang::get('headings.galleries')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/news') }}"  >
                                            {{ Lang::get('headings.news')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/usefulCategory') }}"  >
                                            {{ Lang::get('headings.usefulCategories')}}
                                        </a>
                                    </li>
                                    <li class="nav-item mb-4 white-background reversible-text"  >
                                        <a class=" nav-link black-text bold" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'/usefulLink') }}"  >
                                            {{ Lang::get('headings.usefulLinks')}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 p-4 content-background">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @yield('content')
                        </div>
                    </div>
                    <footer class="h8">
                        <div class="row text-center custom-footer h100 white-background white-text  f600 ">
                            <div class="col-md-12 pt-3 pb-3">
                                <span>
                                    &copy; 2018 {{ Lang::get('headings.BioAgri')}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ Lang::get('headings.Designby')}} | <a class="team-text" href="#"> {{ Lang::get('headings.SeniorTeam')}} </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <script  src="{{ asset('public/js/jquery-3.2.1.slim.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/popper.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/bootstrap.min.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/chosen.jquery.js') }}"  type="text/javascript"></script>
        <script  src="{{ asset('public/js/prism.js') }}"  type="text/javascript"></script>
        <script type="text/javascript">
$('.branch-chosen-select').chosen({no_results_text: "لايوجد نتايج", ltr: true});
        </script>
        <script type="text/javascript">
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <script type="text/javascript" src="{{ asset('public/vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/js/ajax.js') }}">
        </script>
        <script type="text/javascript">
            var customerReviewDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'customerReview/{customerReview}') }}";
            var customerReviewSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'customerReviewSearch') }}";
            var aboutDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'about/{about}') }}";
            var aboutSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'aboutSearch') }}";
            var galleryTypeDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'galleryType/{galleryType}') }}";
            var galleryTypeSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'galleryTypeSearch') }}";
            var galaryDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'gallery/{gallery}') }}";
            var aboutAchievementDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'aboutAchievement/{aboutAchievement}') }}";
            var aboutAchievementSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'aboutAchievementSearch') }}";
            var certificationDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'certifcate/{certifcate}') }}";
            var certificationSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'certificationSearch') }}";
            var UsefulCategoryDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'usefulCategory/{usefulCategory}') }}";
            var UsefulCategorySearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'UsefulCategorySearch') }}";
            var UsefulLinkDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'usefulLink/{usefulLink}') }}";
            var UsefulLinkSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'UsefulLinkSearch') }}";
            var contactDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'contact/{contact}') }}";
            var contactSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'contactSearch') }}";
            var contactValues = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'contactValues') }}";
            var contactValueDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'contactValueDelete') }}";
            var newsDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'news/{news}') }}";
            var newsSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'newsSearch') }}";
            var newsValues = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'newsValues') }}";
            var newsPointsDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'newsPointsDelete') }}";
            var productCategoryDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'productCategory/{productCategory}') }}";
            var productCategorySearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'productCategorySearch') }}";
            var productDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'product/{product}') }}";
            var productSearch = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'productSearch') }}";
            var productSheets = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'productSheets') }}";
            var productSheetsDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'productSheetsDelete') }}";
            var productImageDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'productImageDelete') }}";
            var sliderImageDelete = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),'sliderImage/{sliderImage}') }}";
        </script>

        {!! JsValidator::formRequest('App\Http\Requests\CustomerReviewRequest','#customer-review-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\AboutRequest','#about-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\GalleryTypeRequest','#gallery-type-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\GalleryRequest','#gallery-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\AboutAchievementRequest','#about-achievement-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\CertificationRequest','#certification-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UsefulCategoryRequest','#usefulCategory-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UsefulLinkRequest','#usefulLink-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\ContactRequest','#contact-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\NewsRequest','#news-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\ProductCategoryRequest','#productCategory-form'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\ProductRequest','#product-form'); !!}
    </body>
</html>

