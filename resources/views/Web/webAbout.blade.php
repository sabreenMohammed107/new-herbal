@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">
                        {{ Html::image("public/images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}
                        {{ Lang::get('headings.about')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container contact-spacing">
        <div class="row">
            <div class="col-md-6 mt-4 mb-4">
                {{ Html::image("public/images/herb1.jpg", 'alt text', array('class' => 'img-fluid w100')) }}
            </div>
            <div class="col-md-6 text-left mt-4 mb-4 reversible-text">
                @if( LaravelLocalization::getCurrentLocale() === "ar")
                <h6 class="welcome-messgae">
                    مرحبا بكم فى
                    Bio<span class="light-dark-leaf">A</span>gri!
                </h6>
                <h2 class="quote-sub-header mb-4">من نحن !</h2>
                <p class="mb-4 quote-paragraph">
                    بيو أجري إيجيبت هي شركة عالمية لإنتاج وتصدير الأعشاب و النباتات الطبية والتوابل والبذور و البقوليات…. (عضوية أو غير عضوية )
                    تأسست الشركة مع قدر كبير من الخبرة في  أعمال الأعشاب
                    لدينا قسم فني علي قدر كافي  من الخبرة  ، مدربين تدريباً عالياً ، ويتلقون التدريب الأكثر حداثة وملائماً لأداء واجباتهم بشكل مثالي
                </p>
                @else
                <h6 class="welcome-messgae">
                    welcome to Bio<span class="light-dark-leaf">A</span>gri!
                </h6>
                <h2 class="quote-sub-header mb-4">Who We Are!</h2>
                <p class="mb-4 quote-paragraph">
                    Bio - Agri Egypt is a global company for producing and exporting herbs, medicinal plants, spices, seeds and grains. (organic or inorganic)

                    Company was established with a great deal of experience in herbs Business.

                    We have a professional department with sufficient experience, highly trained, and receive the most up-to-date and appropriate training to perform their duties ideally.

                </p>
                @endif

            </div>
        </div>
    </div>
</section>
<section id="misson" class="mt-5 ml-2 mr-2 mb-5  color-back">
    <div class="light-transpert-grey pt-4 pb-4">
        <div class="container pt-3 pb-3 custom-container ">
            <div class="row mt-5 mb-5 mb-2 reversible-form">
                @if(count($abouts)>0)
                @foreach($abouts as $about)
                @if($about->arabic_name == "عنا")
                <div class="col-md-6 p-5 book-page reversible-text">
                    <h2 class="quote-sub-header mb-4 welcome-messgae">
                        @if($about->arabic_name == "عنا")
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$about->arabic_name}}
                        @else
                        {{$about->english_name}}
                        @endif
                        @endif
                    </h2>
                    <p class="quote-paragraph">
                        @if($about->arabic_name == "عنا")
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$about->arabic_value}}
                        @else
                        {{$about->english_value}}
                        @endif
                        @endif
                    </p>
                </div>
                @endif
                @if($about->english_name == "Mission" || $about->english_name == "Vission")
                <div class="col-md-6 p-5 book-page reversible-text">
                    <h5 class="green-leaf">
                        @if($about->english_name == "Mission" )
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$about->arabic_name}}
                        @else
                        {{$about->english_name}}
                        @endif
                        @endif
                    </h5>
                    <p class="quote-paragraph">
                        @if($about->english_name == "Mission")
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$about->arabic_value}}
                        @else
                        {{$about->english_value}}
                        @endif
                        @endif
                    </p>
                    <h5 class="green-leaf">
                        @if($about->english_name == "Vission")
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$about->arabic_name}}
                        @else
                        {{$about->english_name}}
                        @endif
                        @endif
                    </h5>
                    <p class="quote-paragraph">
                        @if($about->english_name == "Vission")
                        @if( LaravelLocalization::getCurrentLocale() === "ar")
                        {{$about->arabic_value}}
                        @else
                        {{$about->english_value}}
                        @endif
                        @endif
                    </p>

                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@if($aboutAchievement !=null)
<section id="timeLine">
    <div class="container contact-spacing">
        <div class="row">
            <div class="col-md-2 mt-2 mb-3">
                @if($aboutAchievement->year !=null)
                <?php $array = str_split($aboutAchievement->year); ?>
                @foreach ($array as $key =>$char)
                @if($key ==1)
                <span class="number-style leaf">{{$char}}</span>
                @else
                <span class="number-style">{{$char}}</span>
                @endif
                @endforeach
                @endif
            </div>
            <div class="col-md-10">
                <div class="time-container p-5">
                    <div class="row mb-3 reversible-form ">
                        <div class="col-md-6 reversible-text col-12"> <h4> {{ Lang::get('headings.OurBestAcheviements')}}</h4> </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3 text-right left-reversible-text col-12"> <span class="leaf green-leaf">
                                {{ $aboutAchievement->year }}</span></div>
                    </div>
                    <p class="quote-paragraph reversible-text">
                        @if( LaravelLocalization::getCurrentLocale() == "ar")         @if($aboutAchievement->arabic_achievement !=null)
                        {{ $aboutAchievement->arabic_achievement}}
                        @endif
                        @else
                        @if($aboutAchievement->english_achievement !=null)
                        {{ $aboutAchievement->english_achievement}}
                        @endif
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@stop


