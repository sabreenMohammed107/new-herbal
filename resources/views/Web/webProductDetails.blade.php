@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid p-5">
            <div class="row">
                <div class="col-md-12 text-center p-3">
                    <h2 class="quote-sub-header">
                        {{ Html::image("public/images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$product->arabic_name}}
                        @else
                        {{$product->english_name}}
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="product">
    <div class="container">
        <div class="row mt-5 mb-5 pt-5 pb-5 reversible-form">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        @if(count($product->productImages)>0 && count($product->productImages)<4)
                            @foreach($product->productImages as $productImage)
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    {{ Html::image("public/images/Product/$productImage->image", 'alt text', array('class' => 'img-fluid w100')) }}
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-9">
                        {{ Html::image("public/images/Product/$product->image", 'alt text', array('class' => 'img-fluid w100 product-main-image')) }}
                    </div>
                </div>

            </div>
            <div class="col-md-6 text-left">
                <!--                <h6 class="welcome-messgae">
                                    welcome to Bio<span class="light-dark-leaf">A</span>gri!
                                </h6>-->
                <h2 class="quote-sub-header mb-4 reversible-text ">
                    @if( LaravelLocalization::getCurrentLocale() === "ar")
                    {{$product->arabic_name}}
                    @else
                    {{$product->english_name}}
                    @endif
                </h2>
                <!--                <div class="product-stars">
                                    <i class="fa fa-star leaf dark-green-leaf"></i>
                                    <i class="fa fa-star leaf dark-green-leaf"></i>
                                    <i class="fa fa-star leaf dark-green-leaf"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>-->
                <div class="cost p-1 reversible-text"> {{$product->price}}  <span class="leaf green-leaf">$</span></div>
                <p class="mb-4 reversible-text arabic-line-height">
                    @if( LaravelLocalization::getCurrentLocale() === "ar")
                    {{$product->arabic_overview}}
                    @else
                    {{$product->english_overview}}
                    @endif
                </p>
                <ul class="list-inline reversible-text p-0">
                    <li class="pb-3">
                        <!--<img src="img/leaf2.png" alt="" class="special-logo-leaf"/>-->
                        {{ Lang::get('labels.productCategory')}} :
                        <span class="green-leaf">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            {{$product->ProductCategory->arabic_name}}
                            @else
                            {{$product->ProductCategory->english_name}}
                            @endif
                        </span>
                    </li>
                    <!--                    <li class="pb-3">
                                            <img src="img/leaf2.png" alt="" class="special-logo-leaf"/>
                                            Vendor: Spice shop
                                        </li>-->
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="misson" class="mt-5 ml-2 mr-2 mb-5  color-back reversible-form">
    <div class="light-transpert-grey pt-4 pb-4">
        <div class="container pt-3 pb-3 ">
            <div class="row mt-5 mb-5 mb-2">
                <div class="col-md-12">
                    <ul class="nav nav-pills about-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#home"> {{ Lang::get('labels.describtion')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu1"> {{ Lang::get('labels.dataSheet')}} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#menu2">
                                {{ Lang::get('labels.video')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="col-md-12 tab-container">
                    <div class="tab-content">
                        <div id="home" class="container p-5 tab-pane active reversible-text"><br>
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            <p class="quote-paragraph">{{$product->arabic_desc}} </p>
                            @else
                            <p class="quote-paragraph">{{$product->english_desc}} </p>
                            @endif
                        </div>
                        <div id="menu1" class="container p-5 tab-pane fade"><br>
                            <table class="table table-striped">
                                <tbody>
                                    @if(count($product->productSheets)>0)
                                    @foreach($product->productSheets as $productSheet)
                                    <tr class="reversible-text">
                                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                                        <td class="f700 uppercase">{{$productSheet->arabic_name}}</td>
                                        <td>{{$productSheet->arabic_value}}</td>
                                        @else
                                        <td class="f700 uppercase">{{$productSheet->english_name}}</td>
                                        <td>{{$productSheet->english_value}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @else
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div id="menu2" class="container p-5 tab-pane fade">
                            <br>
                            @if($product->video != null)
                            <video height="350" class="full-width border-box" loop=""  controls="">
                                <source src="{{ asset('public/public/images/Product/'.$product->video.'')}}" type="video/mp4">
                                <source src="{{ asset('public/public/images/Product/'.$product->video.'')}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="relatedProduct">
    <div class="container reversible-form">
        <div class="row mt-5 mb-5 pt-5 pb-5">
            @if(count($products)>0)
            @foreach($products as $itemproduct)
            <div class="col-md-4">
                <div class="row p-3 text-center">
                    {{ Html::image("public/images/Product/$itemproduct->image", 'alt text', array('class' => 'full-width img-fluid related-product-imgae')) }}
                    <div class="product-details mt-3">
                        <h5  class="product-title uppercase">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            {{$itemproduct->arabic_name}}
                            @else
                            {{$itemproduct->english_name}}
                            @endif
                        </h5>
                        <p class="product-paragph pt-1 pb-1">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            <?php echo mb_substr($itemproduct->arabic_desc, 0, 50, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>

                            @else
                            <?php echo mb_substr($itemproduct->english_desc, 0, 50, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>
                            @endif
                        </p>
                        <a class="button-details2 btn" <a class="button-details2 btn" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webProductDetails/{$itemproduct->id}") }}">
                                {{ Lang::get('headings.viewMore')}}
                            </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

@stop
