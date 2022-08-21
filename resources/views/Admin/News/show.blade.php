@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"news/") }}" class="red-button btn  pointer white-text ">
                {{ Lang::get('headings.Back')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.news')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3  reversible-form"  >
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.arabic_name')}}:</span>
            </div>
            <div class="col-md-3">
                {{$new->arabic_name}}
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.english_name')}}:</span>
            </div>
            <div class="col-md-3">
                {{$new->english_name}}
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.arabic_desc')}}:</span>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" rows="3" disabled="">{{$new->arabic_desc}}</textarea>
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.english_desc')}}:</span>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" rows="3" disabled="">{{$new->english_desc}}</textarea>
            </div>
        </div>
        <div class="row p-3 reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.active')}}:</span>
            </div>
            <div class="col-md-3">
                @if($new->active ==1)
                <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                @elseif ($new->active ==0)
                <i class="fa fa-times red-text " aria-hidden="true"></i>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="white-background mt-4 content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> 
            {{ Lang::get('headings.AssignNewsPoints')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3  reversible-form"  >
        @if(count($new->newsPoints)>0)
        <div class="row form-group mb-4">
            <div class="col-md-12" >
                <div class="table-responsive text-center">
                    <table class="table table-bordered new-prerequist">
                        <thead class="white-text sub-thead-background">
                            <tr>
                                <th>{{Lang::get('labels.arabic_value')}}</th>
                                <th>{{Lang::get('labels.english_value')}}</th>
                                <th>{{Lang::get('labels.active')}}</th>

                                <th>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </th>
                                <th><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($new->newsPoints as $newsPoint)
                            <tr>
                                <td>
                                    <textarea class="form-control" rows="3" disabled="">{{$newsPoint->arabic_value}}</textarea>
                                </td>  
                                <td>
                                    <textarea class="form-control" rows="3" disabled="">{{$newsPoint->english_value}}</textarea>
                                </td>  
                                <td>
                                    @if($newsPoint->active ==1)
                                    <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                    @elseif ($newsPoint->active ==0)
                                    <i class="fa fa-times red-text" aria-hidden="true"></i>
                                    @endif

                                </td>
                                <td>
                                    <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#contentEditModal{{$newsPoint->id}}">
                                    </i>
                                </td>  
                                <td>
                                    <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$newsPoint->id}}" ></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
        @foreach ($new->newsPoints as $newsPoint)
        <div class="modal fade" id="DeleteModal{{$newsPoint->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header white-text content-header" >
                        <div class="col-md-3 text-left reversible-text">
                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.Delete')}} </h4>
                        </div>
                        <div class="col-md-9 text-right left-reversible-text">
                            <a data-dismiss="modal" aria-label="Close">
                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="modal-body"> 
                        <div class="deleteContent text-left pl-3 mt-2 reversible-text" style="display: block;">
                            {{Lang::get('headings.DeleteConfirm')}} ?
                           

                        </div>
                        <div class="modal-footer border-none">
                            {{ csrf_field()}}
                            <button data-id="{{$newsPoint->id}}" type="button"  class="btn actionBtn btn-danger news-point-delete delete-button" data-dismiss="modal">
                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($new->newsPoints as $newsPoint)
        <div class="modal fade" id="contentEditModal{{$newsPoint->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header content-header white-text" >
                        <div class="col-md-5 text-left reversible-text">
                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditNews')}} </h4>
                        </div>
                        <div class="col-md-7 text-right left-reversible-text">
                            <a data-dismiss="modal" aria-label="Close">
                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    {!! Form::open(['action'=>'NewsController@assignNewsPointsUpdate']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$newsPoint->id }}">
                    <div class="modal-body mt-3">
                        <div class="row form-group mb-4">
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                {!! Form::label('arabic_value',trans('labels.arabic_value')) !!} : 
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <textarea class="form-control" name="arabic_value" id="arabic_value" rows="3" required="">{{$newsPoint->arabic_value}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                {!! Form::label('english_value',trans('labels.english_value')) !!} : 
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <textarea class="form-control" name="english_value" id="english_value" rows="3" required="">{{$newsPoint->english_value}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                <label class="custom-control custom-checkbox">
                                    @if($newsPoint->active == 1)
                                    <input type="checkbox" name="active" class="custom-control-input"  checked>
                                    @else
                                    <input type="checkbox" name="active" class="custom-control-input" >
                                    @endif
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">
                                        {{ Lang::get('labels.active')}}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn red-button pointer white-text mb-4" data-dismiss="modal"> {{Lang::get('headings.Close')}} </button>
                        {!! Form::submit(Lang::get('headings.Edit'),['class'=>"btn red-button pointer white-text mb-4"]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="row form-group mb-4">
            <div class="col-md-11 mt-3 reversible-text" >
                <a class="red-button btn  pointer white-text" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"assignNewsPoint/{$new->id}") }}">
                    {{Lang::get('labels.add')}}
                </a>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
</div>
@stop


