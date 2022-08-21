@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"news/{$new->id}") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.NewNewsPoint')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3 mt-3 reversible-form"  >
        {!! Form::open(['action'=>'NewsController@assignNewsPointStore']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="new" value="{{$new->id }}">
        <div class="row form-group mb-4 mt-4">
            <div class="col-md-2 reversible-text">
                {!! Form::label('value',trans('headings.value')) !!} :
            </div>
            <div class="col-md-1 p0 reversible-text">
                <span id="add-new-value" class="insert-button found pointer">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-12" >
                <div class="table-responsive text-center">
                    <table class="table table-bordered news-values">
                        <thead class="white-text thead-background">
                        <th>{{Lang::get('labels.arabic_value')}}</th>
                        <th>{{Lang::get('labels.english_value')}}</th>                      
                        <th><i class="fa fa-trash"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
        <div class="row form-group mb-4">
            <div class="col-md-11 mt-3 reversible-text" >
                {!! Form::submit(Lang::get('labels.add'), ['class' => 'red-button btn  pointer white-text']); !!}
            </div>
            <div class="clear-fix"></div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop


