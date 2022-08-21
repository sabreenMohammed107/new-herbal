@extends('Layouts.web')
@section('content')
<!-- Revolution Slider -->
<section id="home"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="rev_slider_wrapper">
                    <div class="rev_slider" id="slider1" data-version="5.0">
                        <ul>
                            <li data-transition="zoomout"
                                data-easein="default" 
                                data-easeout="default"
                                data-slotamount="1"
                                data-masterspeed="1200"
                                data-delay="8000"
                                data-title="Creative &amp; Emotional"
                                >
                                <!-- MAIN IMAGE -->
                                <img src="images/cub_1.jpg"
                                     alt=""
                                     data-bgrepeat="no-repeat"
                                     data-bgfit="100"
                                     data-bgparallax="7"
                                     class="rev-slidebg"
                                     >

                            </li> <!-- end slide 2 -->
                            <!-- SLIDE 2 -->
                            <li data-transition="zoomout"
                                data-easein="default" 
                                data-easeout="default"
                                data-slotamount="1"
                                data-masterspeed="1200"
                                data-delay="8000"
                                data-title="Creative &amp; Emotional"
                                >
                                <!-- MAIN IMAGE -->
                                <img src="images/cub4.jpg"
                                     alt=""
                                     data-bgrepeat="no-repeat"
                                     data-bgfit=""
                                     data-bgparallax="7"
                                     class="rev-slidebg"
                                     >
                            </li> <!-- end slide 2 -->

                            <!-- SLIDE 3 -->
                            <li data-transition="zoomout"
                                data-easein="default" 
                                data-easeout="default"
                                data-slotamount="1"
                                data-masterspeed="1200"
                                data-delay="8000"
                                data-title="Amazing Agency"
                                >
                                <!-- MAIN IMAGE -->
                                <img src="images/cub5.jpg"
                                     alt=""
                                     data-bgrepeat="no-repeat"
                                     data-bgfit="cover"
                                     data-bgparallax="7"
                                     class="rev-slidebg"
                                     >

                            </li> <!-- end slide 3 -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="quote" class="contact-spacing  ml-2 mr-2  pt-4 pb-4">
    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div class="col-md-10 text-center">
                <h2 class="quote-sub-header p-3">
                    <img src="images/leaf.png" alt="" class="logo-leaf">{{ Lang::get('headings.CustomerTalk')}}
                </h2>  
                <div class="item  ">
                    <p class="quote-paragraph">
                        @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                        مرحباً بكم في الموقع الرسمى لشركة بيو- أجري إيجيبت هي شركة عالمية لإنتاج وتصدير الأعشاب و النباتات الطبية والتوابل والبذور و البقوليات (عضوية أو غير عضوية )
                        لمعلومات أكثر عن الشركة 
                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webAbout") }}">
                            اضغط هنا
                        </a>.
                        @else
                        Welcome to the official website of Bio-Agri Egypt company for producing and exporting herbs, medicinal plants, spices, seeds and grains (organic or inorganic).
                        For more about the company <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webAbout") }}">
                            click here
                        </a>.
                        @endif
                    </p>
                </div>
            </div>  
        </div>
    </div>
</section>
<section id="products" class="mt-5 ml-2 mr-2 mb-5 color-back reversible-form ">  
    <div class="light-transpert-grey pt-4 pb-5">
        <div class="container-fluid pt-3 pb-5 ">
            <div class="row product-spacing text-center ">
                <div class="col-md-12">
                    <h2 class="quote-sub-header green"> <img src="images/leaf.png" alt="" class="logo-leaf">
                        {{ Lang::get('headings.OnlineProducts')}} 
                    </h2>
                </div>
            </div>
            <div class="row declare-head text-center ">
                <div class="col-md-12">
                    <div id="filters" class="filter-links"> 

                        <button class="btn-filter green-active-background text-white  mb-2" data-filter="*">
                            {{ Lang::get('headings.ShowAll')}} 
                        </button> 
                        @foreach($product_categories as $product_category)                       
                        <button class="btn-filter  mb-2 uppercase" data-filter=".{{$product_category->english_name}}">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                            {{$product_category->arabic_name}} 
                            @else
                            {{$product_category->english_name}} 
                            @endif
                        </button>        
                        @endforeach


                    </div>              
                </div>
            </div>
            <div class="grid  mt-4" >
                @foreach($products as $product) 
                <div class="element-item {{$product->ProductCategory->english_name}}">
                    <div class="view relative mt-3">
                        {{ Html::image("images/Product/$product->image", 'alt text', array('class' => 'product-image img-fluid')) }}
                        <!--<img  src="http://verdure.mikado-themes.com/wp-content/uploads/2018/04/shop-img-1.jpg" class="product-image img-fluid" alt="f" />-->
                    </div>
                    <div class="product-details p-4">
                        <h5  class="product-title uppercase">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                            <a>{{$product->arabic_name}} </a>
                            @else
                            <a>{{$product->english_name}} </a>
                            @endif
                        </h5>
                        <p class="product-paragph pl-2 pr-2 pt-1 pb-1">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")       
                            <?php echo mb_substr($product->arabic_overview, 0, 30, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>
                            @else
                            <?php echo mb_substr($product->english_overview, 0, 30, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>
                            @endif
                        </p>
                        <a class="button-details2 btn" <a class="button-details2 btn" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webProductDetails/{$product->id}") }}">
                                {{ Lang::get('headings.viewMore')}}
                            </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<div id="leaves" class="contact-spacing">
    <div class="container-fluid pt-5 pb-5">
        <div class="row reversible-form">
            @if( LaravelLocalization::getCurrentLocale() === "ar") 
            <div class="col-md-4  petal-box">
                <div class="petal pt-3 pb-3">
                    <i class="fa fa-envira fa-4x green-leaf leaf"></i>
                    <h6 class="header pt-4"> خبرة كاملة  </h6>
                    <div class="descr pt-2"> نسعى لأن نكون الأفضل. </div>
                </div>
            </div>
            <div class="col-md-4 petal-box">
                <div class="petal pt-3 pb-3">
                    <i class="fa fa-certificate fa-4x green-leaf leaf "></i>
                    <h6 class="header pt-4"> جودة عالية</h6>
                    <div class="descr pt-2"> نتفوق عن التوقعات. </div>
                </div>
            </div>
            <div class="col-md-4  petal-box">
                <div class="petal pt-3">
                    <i class="fa fa-bus fa-4x green-leaf leaf"></i>
                    <h6 class="header pt-4"> أسعار تنافسية </h6>
                    <div class="descr pt-2">أفضل العروض التنافسية. </div>
                </div>
            </div>
            @else
            <div class="col-md-4  petal-box">
                <div class="petal pt-3 pb-3">
                    <i class="fa fa-envira fa-4x green-leaf leaf"></i>
                    <h6 class="header pt-4"> Full Experience  </h6>
                    <div class="descr pt-2"> We aim to be the best. </div>
                </div>
            </div>
            <div class="col-md-4 petal-box">
                <div class="petal pt-3 pb-3">
                    <i class="fa fa-certificate fa-4x green-leaf leaf "></i>
                    <h6 class="header pt-4"> High Quality </h6>
                    <div class="descr pt-2"> Elevating expectations. </div>
                </div>
            </div>
            <div class="col-md-4  petal-box">
                <div class="petal pt-3">
                    <i class="fa fa-bus fa-4x green-leaf leaf"></i>
                    <h6 class="header pt-4"> Competitive Price </h6>
                    <div class="descr pt-2"> Best Deals and special offers. </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>
<section id="bubble" class="mt-5 ml-2 mr-2 mb-5  color-back">  
    <div class="light-transpert-grey pt-4 pb-4">
        <div class="row mt-5 mb-5 justify-content-center p-3 reversible-form">
            <div class="col-md-3">
                <img src="images/logo.png" alt="" class="img-fluid bubble logo-welcome"/>
            </div>
            <div class="col-md-9 reversible-text">
                @if( LaravelLocalization::getCurrentLocale() === "ar")  
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h2 class="quote-sub-header green"> 
                            <img src="images/leaf.png" alt="" class="logo-leaf">
                            انضم لنا
                        </h2>
                    </div>
                </div>
                <p class="quote-paragraph">
                    عزيزي العميل .لو انك تبحث عن منتج نقي بجودة عالية و سعر منافس .لا تتواني في 
                    <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webContact") }}">
                        الاتصال بنا
                    </a>.
                </p>
                @else
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h2 class="quote-sub-header green"> 
                            <img src="images/leaf.png" alt="" class="logo-leaf">
                            Join Us
                        </h2>
                    </div>
                </div>
                <p class="quote-paragraph">
                    Dear Customer, If you are looking for a pure product with high quality and competitive price. Don’t hesitate to 
                    <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webContact") }}">
                        contact us
                    </a>.
                </p>
                @endif

            </div>

        </div>
    </div>
</section>
<section id="contact" class="contact-spacing" >
    <div class="container-fluid  ">
        <div class="row mt-5 mb-2 text-center ">
            <div class="col-md-12">
                <h2 class="quote-sub-header green">
                    {{ Html::image("images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}
                    {{ Lang::get('headings.contacts')}}
                </h2>
                <p class="quote-paragraph pt-2">
                    {{ Lang::get('headings.contactWelcome')}}
                </p>
            </div>
        </div>
        <div class="row pb-2">
            @if(count($contacts)>0)
            @foreach($contacts as $contact)
            <div class="col-md-4">
                <div class="contact-item">
                    <div class="contact-i">
                        @if($contact->arabic_name == "بريد الكترونى" )
                        <i class="fa fa-anchor fa-3x" aria-hidden="true"></i>
                        @elseif($contact->arabic_name == "للاتصال" )
                        <i class="fa fa-volume-control-phone fa-3x" aria-hidden="true"></i>
                        @elseif($contact->arabic_name == "العنوان" )
                        <i class="fa fa-envelope fa-3x" aria-hidden="true"></i>
                        @endif
                    </div>
                    <div class='text-center p-3'>
                        <h6> 
                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                            {{$contact->arabic_name}}
                            @else
                            {{$contact->english_name}}
                            @endif
                        </h6>
                        <span>
                            @if(count($contact->contactValues)>0)
                            @foreach($contact->contactValues as $contactValue)
                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                            {{$contactValue->arabic_value}}
                            @else
                            {{$contactValue->english_value}}
                            @endif

                            @endforeach
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div> 
</section>

@stop
