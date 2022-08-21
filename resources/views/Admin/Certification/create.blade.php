@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"certifcate/") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.NewCertification')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3 mt-3 reversible-form"  >
        {!! Form::open(['action'=>'CertificationController@store','id'=>'certification-form','enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('name',trans('labels.name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    {!! Form::text('name',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'name'])  !!}
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('image',trans('labels.image')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input required type="file" class="form-control" name="image"  >
                </div>
            </div>
            <div class="col-md-3 reversible-text">
                {!! Form::label('number',trans('labels.number')) !!} : 
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="number" placeholder="number" >
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('arabic_desc',trans('labels.arabic_desc')) !!} : 
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <textarea class='form-control' rows="3" name="arabic_desc" id='arabic_desc' ></textarea>
                </div>
            </div>
            <div class="col-md-3 reversible-text">
                {!! Form::label('english_desc',trans('labels.english_desc')) !!} : 
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <textarea class='form-control' rows="3" name="english_desc" id='english_desc' ></textarea>
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


