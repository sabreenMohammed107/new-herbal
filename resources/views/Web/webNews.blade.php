@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">
                        {{ Html::image("public/images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}{{ Lang::get('headings.news')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="events" class="ml-2 mr-2 mb-5">
    <div class=" pt-4 pb-4">
        <div class="container pt-3 pb-3 ">
            @if(count($news)>0)
            @foreach($news as $new)
            <div class="event  mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row p-0">
                            <div class="col-md-2 col-3 pl-1 pr-1">
                                <div class="text-center event-date"> {{date("d",strtotime($new->created_at))}}
                                    <span class="d-block">{{date("M",strtotime($new->created_at))}} </span>
                                </div>
                            </div>
                            <div class="col-md-10 col-9">
                                {{ Html::image("public/images/$new->image", 'alt text', array('class' => 'img-fluid w100 event-image')) }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2 class="quote-sub-header mt-4 event-title ml-2 mr-2">
                                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                                            {{$new->arabic_name}}
                                            @else
                                            {{$new->english_name}}
                                            @endif
                                        </h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10 text-center">
                                <p class="quote-paragraph mt-3 mb-3 ">

                                    @if( LaravelLocalization::getCurrentLocale() === "ar")
                                    <?php
                                    echo mb_substr($new->arabic_desc, 0, 200, "UTF-8");?>
                                   <span class="d-block" >
                                       <?php echo '...'; ?>
                                   </span>

                                    @else
                                    <?php
                                     echo mb_substr($new->english_desc, 0, 200, "UTF-8");?>
                                   <span class="d-block" >
                                       <?php echo '...'; ?>
                                   </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10 text-center">
                                 <a class="button-details2 btn" <a class="button-details2 btn" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webNewsDetails/{$new->id}") }}">
                                {{ Lang::get('headings.viewMore')}}
                                 </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
</section>
@stop
