@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">

                        {{ Html::image("public/images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}{{ Lang::get('headings.certifications')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="certifications-slider">
    <div class="container">
        <div class="row content-spacing ">
            <div class="col-md-12 text-center">

                <h6 class="light-grey-green-leaf quote"> We Beleive in Quality</h6>
                <h2 class="quote-main-header p-3">
                    We are aiming for better serving
                </h2>
                <p class="quote-paragraph">
                    Looking for a nice cup of tea?
                    We offer a wide selection of the world's best black, green, white and herbal teas.
                    Aside from the tea itself, we offer exquisite tea accessories so that you could always enjoy .
                </p>
                <!--</div>-->
            </div>
        </div>
    </div>
</section>
<section id="certifications" class="mt-5 ml-2 mr-2 mb-5  color-back reversible-form">
    <div class="light-transpert-grey pt-4 pb-4">
        <div class="container  pb-5 ">
            <div class="row">
                @if(count($certifications)>0)
                @foreach($certifications as $certification)
                <div class="col-md-6 certificate-first-box mt-5">
                    {{ Html::image("public/images/Certification/$certification->image", 'alt text', array('class' => 'img-fluid certificate-image full-width')) }}
                    <div class="certification-details text-center pt-4 pb-4">
                        <h5  class="product-title">
                            {{$certification->name}}
                        </h5>
                        {{ Lang::get('headings.CertificateNo')}}: <span class="leaf green-leaf">{{$certification->number}}</span>
                        <p class="quote-paragph  pt-1 pb-1">
                            @if( LaravelLocalization::getCurrentLocale() === "ar")
                            {{$certification->arabic_desc}}
                            @else
                            {{$certification->english_desc}}
                            @endif
                        </p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</section>
@stop
