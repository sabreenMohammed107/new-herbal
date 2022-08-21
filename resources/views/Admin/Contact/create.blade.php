@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"contact/") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.NewContact')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3 mt-3 reversible-form"  >
        {!! Form::open(['action'=>'ContactController@store','id'=>'contact-form']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row form-group mb-4">
            <div class="col-md-2 reversible-text">
                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    {!! Form::text('arabic_name',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
             <div class="col-md-2 reversible-text">
                {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    {!! Form::text('english_name',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}
                </div>
            </div>
        </div>
        <div class="row form-group mb-4 mt-4">
            <div class="col-md-3 reversible-text">
                <label class="custom-control custom-checkbox">
                    <input name="active" type="checkbox" class="custom-control-input" checked="">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">
                        {!! Form::label('name',trans('labels.active')) !!}
                    </span>
                </label>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-11 mt-3 reversible-text" >
                {!! Form::submit(Lang::get('labels.add'), ['class' => 'add-button btn  pointer white-text']); !!}
            </div>
            <div class="clear-fix"></div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop


