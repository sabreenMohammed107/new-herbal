@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"product/") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.NewProduct')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3 mt-3 reversible-form"  >
        {!! Form::open(['action'=>'ProductController@store','id'=>'product-form','enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('productCategory',trans('labels.productCategory')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <select name="product_category_id" id="productCategory" data-placeholder="{{ Lang::get('labels.ChooseProductCategory')}}..." class="chosen-select form-control" tabindex="-1" style="display: none;" required="">  
                    @if(count($product_categories) > 0)
                    @foreach($product_categories as $productCategory)
                    @if( LaravelLocalization::getCurrentLocale() === "ar")  
                    <option value="{{$productCategory->id}}">{{$productCategory->arabic_name}}</option>
                    @elseif ( LaravelLocalization::getCurrentLocale() === "en")
                    <option value="{{$productCategory->id}}">{{$productCategory->english_name}}</option>
                    @endif
                    @endforeach 
                    @endif
                </select> 
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    {!! Form::text('arabic_name',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                </div>
            </div>
            <div class="col-md-3 reversible-text">
                {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    {!! Form::text('english_name',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('arabic_review',trans('labels.arabic_review')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <textarea class='form-control' rows="3" name="arabic_overview" id='arabic_review' ></textarea>
                </div>
            </div>
            <div class="col-md-3 reversible-text">
                {!! Form::label('english_review',trans('labels.english_review')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <textarea class='form-control' rows="3" name="english_overview" id='english_review'  ></textarea>
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
                {!! Form::label('price',trans('labels.price')) !!} : 
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="price" placeholder="price" >
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('link-name',trans('labels.link-name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input required type="text" class="form-control" name="link_name"  >
                </div>
            </div>
            <div class="col-md-3 reversible-text">
                {!! Form::label('link-value',trans('labels.link-value')) !!} : 
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="link_value" >
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('link_arabic_name',trans('labels.link_arabic_name')) !!} : <span class="star"> * </span>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input required type="text" class="form-control" name="link_arabic_name"  >
                </div>
            </div>
            <div class="col-md-3 reversible-text">
                {!! Form::label('link_arabic_value',trans('labels.link_arabic_value')) !!} : 
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="link_arabic_value" >
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-3 reversible-text">
                {!! Form::label('video',trans('labels.video')) !!} :
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    {!! Form::file('video',['class'=>'control-label']) !!}
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


