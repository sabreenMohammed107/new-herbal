@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="quote-sub-header">
                        {{ Html::image("public/images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}{{ Lang::get('headings.contacts')}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="row contact-spacing reversible-form">
            <div class="col-md-6">
                {{ Html::image("public/images/Contact2.jpg", 'alt text', array('class' => 'img-fluid w100')) }}{
            </div>
            <div class="col-md-6 text-left mt-5 reversible-text">
                @if( LaravelLocalization::getCurrentLocale() === "ar")
                <h6 class="welcome-messgae">
                    مرحبا بكم فى
                    Bio<span class="light-dark-leaf">A</span>gri!
                </h6>
                <h2 class="quote-sub-header mb-4">فى اى وقت!</h2>
                <p class="mb-4">
                    يمكنك الاتصال بنا بأي طريقة مناسبة لك. نحن متواجدون 24/7 عبر البريد الإلكتروني أو الهاتف المحمول. يمكنك أيضًا
                    استخدام نموذج اتصال سريع أدناه أو زيارة مكتبنا شخصيًا

                </p>
                <ul class="list-inline p-0">
                    <li class="pb-3"> <img src="img/leaf2.png" alt="" class="special-logo-leaf"/>
                        ساعات العمل : 08:00 صباحا  <span class="leaf green-leaf"> الى</span> 06:00 مساء.
                    </li>
                    <li class="pb-3"> <img src="img/leaf2.png" alt="" class="special-logo-leaf"/>
                          أيام العمل : <span class="leaf green-leaf"> من </span> السبت  <span class="leaf green-leaf"> الى</span> الخميس.
                    </li>
                </ul>
                @else
                <h6 class="welcome-messgae">
                    welcome to Bio<span class="light-dark-leaf">A</span>gri!
                </h6>
                <h2 class="quote-sub-header mb-4">Any Time!</h2>
                <p class="mb-4">
                    You can contact us any way that is convenient for you. We are available 24/7 via Email or Mobile. You can also use a quick contact form below or visit our office personally
                </p>
                <ul class="list-inline">
                    <li class="pb-3"> <img src="img/leaf2.png" alt="" class="special-logo-leaf"/> Opening Hours : 08:00 am  <span class="leaf green-leaf"> To </span> 06:00 pm..
                    </li>
                    <li class="pb-3"> <img src="img/leaf2.png" alt="" class="special-logo-leaf"/> Opening Days : <span class="leaf green-leaf"> From </span> Saturday  <span class="leaf green-leaf"> To </span> Thursday.
                    </li>
                </ul>
                @endif

            </div>
        </div>
    </div>
</section>
<section id="contactDetails" class=" ml-2 mr-2 mb-5  color-back reversible-form">
    <div class="light-transpert-grey pt-4 pb-4">
        <div class="container">
            <div class="row pt-2 mt-3 pb-4">
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
    </div>
</section>
<section id="timeLine" class="contact-spacing reversible-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6906.036097464088!2d31.338925724707146!3d30.06501712749902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e0dd2418453%3A0x48a86997f284f8d6!2sSenior+Steps!5e0!3m2!1sen!2seg!4v1532447088042"  height="380" frameborder="0" style="border:0" allowfullscreen class="full-width"></iframe>
            </div>
            <div class="col-md-6">
                {!! Form::open(['action'=>'WebController@sendMessage','id'=>'about-form' ,'class' =>'custom-form p-4']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<form action="#"  method="POST" class="custom-form p-4">-->
                <h4 class="green-leaf reversible-text"> {{ Lang::get('headings.contacts')}}</h4>
                <div class="row form-group mb-2 reversible-text">
                    <div class="input col-md-6 pt-3">
                        <div class="input-group">
                            <input type="text" name="name" placeholder="{{Lang::get('labels.name')}}" class="form-control" />
                        </div>
                    </div>
                    <div class="input col-md-6 pt-3">
                        <div class="input-group">
                            <input type="text" name="email" placeholder="{{Lang::get('labels.email')}}" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="row form-group pt-3 reversible-text">
                    <div class="col-md-12 ">
                        <textarea name="message"  placeholder="{{Lang::get('labels.message')}}" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <!--                <div class="row form-group pt-3">
                                    <div class="col-md-12 ">
                                        <a class="btn custom-button red" href="page-doctor-details.html"> Send Message </a>
                                    </div>
                                </div>-->
                <div class="row form-group mb-4">
                    <div class="col-md-11 mt-3 reversible-text" >
                        {!! Form::submit(Lang::get('labels.send'), ['class' => 'btn custom-button red pointer white-text']); !!}
                    </div>
                    <div class="clear-fix"></div>
                </div>
                {!! Form::close() !!}
                <!--</form>-->
            </div>
        </div>
    </div>
</section>
@stop
