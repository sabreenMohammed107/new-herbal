@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">
                        {{ Html::image("images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}
                        {{ Lang::get('headings.galleries')}}
                    </h2>                           
                </div>
            </div>
        </div>
    </div>
</section>
<section id="gallery" class="ml-2 mr-2 mb-5">  
    <div class=" pt-4 pb-4">
        <div class="container pt-3 pb-3 ">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 gallery_images">
                    <!--{{ Html::image("images/ajax-loader.gif", 'alt text', array('style' =>"display:none;margin:0px auto;width:200px;height:200px;transition:all 1s;",'id'=>'loading-image')) }}-->
                    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
                         
                        <!-- Loading Screen -->
<!--                        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            {{ Html::image("images/ajax-loader.gif", 'alt text', array('style' =>"margin-top:-19px;position:relative;top:50%;width:38px;height:38px;")) }}
                        </div>-->
                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:240px;width:720px;height:480px;overflow:hidden;">
                            @if(count($galleryTypes)>0)
                            @foreach ($galleryTypes as $key =>$galleryType)

                            @if($key == 0)
                            @foreach ($galleryType->galleries as $key =>$gallery)
                            <div>
                                {{ Html::image("images/Gallery/$gallery->image", 'alt text', array('data-u' =>"image")) }}
                                {{ Html::image("images/Gallery/$gallery->image", 'alt text', array('data-u' =>"thumb",'class'=>
                 'img-thumb-gallery')) }}
                    <!--            <img data-u="image" src="images/004.jpg" />
                                <img data-u="thumb" src="images/004-s99x66.jpg" />-->
                            </div>

                            @endforeach()
                            @endif
                            @endforeach()
                            @endif
                        </div>
                        <!-- Thumbnail Navigator -->
                        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;top:0px;width:240px;height:480px;background-color:#000;" data-autocenter="2" data-scale-left="0.75">
                            <div data-u="slides">
                                <div data-u="prototype" class="p" style="width:99px;height:66px;">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                    <svg viewbox="0 0 16000 16000" class="cv">
                                    <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                    <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                    <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:270px;" data-autocenter="2">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                            </svg>
                        </div>
                    </div>
                    <!--                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                                <ol class="carousel-indicators">
                                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                                </ol>
                                                                <div class="carousel-inner">
                                        
                                                                    @if(count($galleryTypes)>0)
                                                                    @foreach ($galleryTypes as $key =>$galleryType)
                                        
                                                                    @if($key == 0)
                                                                    @foreach ($galleryType->galleries as $key =>$gallery)
                                        
                                                                    @if($key ==0)
                                                                    <div class="carousel-item active">
                                                                        @else
                                                                        <div class="carousel-item">
                                                                            @endif
                                                                            <p class="quote-paragraph">
                                                                                {{ Html::image("images/Gallery/$gallery->image", 'alt text', array('class' => 'd-block w-100')) }}
                                                                            </p>
                                                                        </div>
                                                                        @endforeach
                                                                        @endif
                                                                        @endforeach()
                                                                        @endif
                                                                    </div>
                                                                </div> 
                                                            </div>-->
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <div id="owl-category" class="owl-carousel owl-theme">      
                        @if(count($galleryTypes)>0)
                        @foreach ($galleryTypes as $key =>$galleryType)   

                        <div class="item gallery-type-id" data-id="{{$galleryType->id}}" >
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Html::image("images/Gallery/$galleryType->image", 'alt text', array('class' => 'img-fluid img-thumbnail full-width')) }}
                                </div>
                            </div>
                            @if($key == 0)
                                <div class="overlay text-center pointer active-gallery dyamic-gallery">
                            @else
                                <div class="overlay text-center pointer dyamic-gallery">
                            @endif
                            
                                @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                <h4 class="white-text pt-5"> {{$galleryType->arabic_name}} </h4>
                                @else
                                <h4 class="white-text pt-5"> {{$galleryType->english_name}} </h4>
                                @endif

                            </div>
                        </div>
                        @endforeach()
                        @endif
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
@stop
