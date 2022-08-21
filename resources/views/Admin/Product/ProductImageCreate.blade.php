@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"product/{$product->id}") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.NewProductImage')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3 mt-3 reversible-form"  >
            {!! Form::open(['action'=>'ProductController@assignProductImageStore','enctype'=>'multipart/form-data']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="product" value="{{$product->id }}">
            <div class="row form-group mb-4">
                <div class="col-md-2 reversible-text">
                    {!! Form::label('image',trans('labels.image')) !!} : <span class="star"> * </span>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
                    </div>
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


