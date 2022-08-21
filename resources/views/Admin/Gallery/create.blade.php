@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"gallery/") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.NewGallery')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3 mt-3 reversible-form"  >
        {!! Form::open(['action'=>'GalleryController@store','id'=>'gallery-form','enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row form-group mb-4">
            <div class="col-md-2 reversible-text">
                {!! Form::label('gallery_type',trans('labels.gallery_type')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <select name="gallery_type_id" id="gallery_type" data-placeholder="{{ Lang::get('labels.ChooseCity')}}..." class="chosen-select form-control" tabindex="-1" style="display: none;" required="">  
                    @if(count($gallery_types) > 0)
                    @foreach($gallery_types as $gallery_type)
                    @if( LaravelLocalization::getCurrentLocale() === "ar")  
                    <option value="{{$gallery_type->id}}">{{$gallery_type->arabic_name}}</option>
                    @elseif ( LaravelLocalization::getCurrentLocale() === "en")
                    <option value="{{$gallery_type->id}}">{{$gallery_type->english_name}}</option>
                    @endif
                    @endforeach 
                    @endif
                </select> 
            </div>
        </div>
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


