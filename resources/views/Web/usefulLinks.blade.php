@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">
                        {{ Html::image("images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}{{ Lang::get('headings.usefulLinks')}}
                    </h2>                           
                </div>
            </div>
        </div>
    </div>
</section>
<section id="certifications-slider">
    <div class="container">
        <div class="row content-spacing reversible-form">
            <div class="col-md-12 text-center">
                @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                    <h6 class="light-grey-green-leaf quote"> نحن نتميز دائماً بالجودة </h6>
                    <h2 class="quote-main-header p-3">
                       نحن نهدف لخدمة أفضل
                    </h2>
                    <p class="quote-paragraph">
                        فيما يلي قائمة بعدد من الروابط المفيدة للمواقع التي قد تجدها موضع اهتمام.
                    </p>
                @else
                    <h6 class="light-grey-green-leaf quote"> We Beleive in Quality</h6>
                    <h2 class="quote-main-header p-3">
                        We are aiming for better serving
                    </h2>
                    <p class="quote-paragraph">
                        Listed below are a number of useful links to sites which you may find of interest.
                    </p>
                @endif

                <!--</div>-->
            </div>
        </div>
    </div>
</section>
<section id="usefulLinks" class="ml-2 mr-2 reversible-form">  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-useful-container">
                <div class="card card-useful">
                    @if(count($usefulCategories)>0)
                    @foreach($usefulCategories as $usefulCategory)
                    <h5 class="useful-title p-3 reversible-text"> 
                        @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                        {{$usefulCategory->arabic_name}} 
                        @else
                        {{$usefulCategory->english_name}} 
                        @endif
                    </h5>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                @if(count($usefulCategory->usefulLinks)>0)
                                @foreach($usefulCategory->usefulLinks as $usefulLink)
                                <tr>
                                    <td class="f700 reversible-text">
                                        @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                        {{$usefulLink->arabic_name}} 
                                        @else
                                        {{$usefulLink->english_name}} 
                                        @endif

                                    </td>
                                    <td> 
                                        <a href="{{$usefulLink->link}} " class="useful-link" target="blank">
                                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                            {{$usefulLink->arabic_name}} 
                                            @else
                                            {{$usefulLink->english_name}} 
                                            @endif 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
@stop