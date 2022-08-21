@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">

                        {{ Html::image("public/images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}
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
</section>
<section id="eventDetails" class="content-margin">
    <div class="container light-grey-bg event-detail custom-container">
        <div class="row p-0">
            <div class="col-md-12 p-0">
                <article>
                    {{ Html::image("public/images/News/$new->image", 'alt text', array('class' => 'img-fluid full-width event-detail-image')) }}
                </article><!--/#post-->
                <div class="clearfix"></div>
            </div> <!-- #content -->
        </div> <!-- .row -->
        <div class="row">
            <div class="col-md-12 text-center title-margin">
                <h2 class="quote-sub-header  event-title ">
                    @if( LaravelLocalization::getCurrentLocale() === "ar")
                    {{$new->arabic_name}}
                    @else
                    {{$new->english_name}}
                    @endif
                </h2>
            </div>
        </div>
        <div class="row text-center paragraph-margin">
            <div class="col-md-12">
                <p class="quote-paragraph">
                    @if( LaravelLocalization::getCurrentLocale() === "ar")
                    {{$new->arabic_desc}}
                    @else
                    {{$new->english_desc}}
                    @endif
                </p>
            </div>
        </div>
        <div class="row reversible-form" style="border-top: 1px solid #ccc;">
            <div class="col-md-12 paragraph-margin">
                <div class="event-list">
                    <ol class="thim-list-content">
                        @if(count($new->newsPoints)>0)
                        @foreach($new->newsPoints as $newsPoint)
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        <li> {{$newsPoint->arabic_value}} </li>
                        @else
                        <li> {{$newsPoint->english_value}} </li>
                        @endif
                        @endforeach
                        @endif
                    </ol>
                </div>
            </div>
        </div>
        <div class="row reversible-form" style="border-top: 1px solid #ccc;">
            @if(count($news)>0)
            @foreach($news as $itemNews)
            <div class="col-md-4 p-5 col-12 col-sm-6">
                <div class="row text-center">
                    {{ Html::image("public/images/News/$itemNews->image", 'alt text', array('class' => 'full-width img-fluid related-product-imgae')) }}
                    <div class="product-details mt-3">
                        <h5  class="product-title uppercase">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            {{$itemNews->arabic_name}}
                            @else
                            {{$itemNews->english_name}}
                            @endif
                        </h5>
                        <p class="product-paragph pt-1 pb-1">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            <?php echo mb_substr($itemNews->arabic_desc, 0, 50, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>

                            @else
                            <?php echo mb_substr($itemNews->english_desc, 0, 50, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>
                            @endif
                        </p>
                        <a class="button-details2 btn" <a class="button-details2 btn" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webNewsDetails/{$itemNews->id}") }}">
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
