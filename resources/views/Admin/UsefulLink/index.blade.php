@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"usefulLink/create") }}" class="red-button btn  pointer white-text"> 
                {{ Lang::get('headings.NewUsefulLink')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> {{Lang::get('headings.usefulLinks')}} </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3"  >
        <div class="row justify-content-end mb-4">
            <div class="col-md-9 reversible-text">
                <span class="found"> {{Lang::get('headings.Found')}} : 
                    {{$count}}
                </span>
            </div>
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" id="usefulLink_search" placeholder="{{Lang::get('headings.Search')}}">
            </div>
        </div>
        <div class="seacrch_usefulLink_contrent"></div>
        <div class="orginal-search">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="white-text thead-background">
                                <tr>
                                    <th>#</th>
                                    <th>{{Lang::get('labels.arabic_name')}}</th>   
                                    <th>{{Lang::get('labels.english_name')}}</th> 
                                    <th>{{Lang::get('labels.usefulCategory')}}</th> 
                                    <th>{{Lang::get('labels.link')}}</th> 
                                    <th>{{Lang::get('labels.active')}}</th>   
                                    <th><i class="fa fa-trash"></i></th>
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($usefulLinks as $usefulLink)                           
                                <tr>                               
                                    <td> <?php echo $i ?></td>        
                                    <td>{{$usefulLink->arabic_name}}</td>

                                    <td>{{$usefulLink->english_name}}</td>
                                    @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                    <td> {{$usefulLink->UsefulCategory->arabic_name}} </td>
                                    @else
                                    <td> {{$usefulLink->UsefulCategory->english_name}} </td>
                                    @endif

                                    <td><textarea class="form-control" rows="3" disabled="">{{$usefulLink->link}}</textarea></td>
                                    <td>
                                        @if($usefulLink->active ==1)
                                        <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                        @elseif ($usefulLink->active ==0)
                                        <i class="fa fa-times red-text" aria-hidden="true"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$usefulLink->id}}" ></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$usefulLink->id}}">
                                        </i>
                                    </td>  
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody> 
                        </table>
                        @foreach($usefulLinks as $usefulLink)  
                        <div class="modal fade" id="DeleteModal{{$usefulLink->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                            {{Lang::get('headings.DeleteConfirm')}} 
                                            (
                                            <span class="yellow-text">
                                                @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                                {{$usefulLink->arabic_name}}
                                                @else
                                                {{$usefulLink->english_name}}
                                                @endif
                                            </span> ) !!

                                        </div>
                                        <div class="modal-footer border-none">
                                            {{ csrf_field()}}
                                            <button data-id="{{$usefulLink->id}}" type="button"  class="btn actionBtn btn-danger usefulLink-delete delete-button" data-dismiss="modal">
                                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($usefulLinks as $usefulLink)  
                        <div class="modal fade" id="EditModal{{$usefulLink->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header content-header white-text" >
                                        <div class="col-md-5 text-left reversible-text">
                                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditUsefulLink')}} </h4>
                                        </div>
                                        <div class="col-md-7 text-right left-reversible-text">
                                            <a data-dismiss="modal" aria-label="Close">
                                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {!! Form::model($usefulLink ,['method'=>'PATCH','action'=>['UsefulLinkController@update' ,$usefulLink->id],'id'=>'usefulLink-form']) !!}
                                    <div class="modal-body mt-3">
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('usefulCategory',trans('labels.usefulCategory')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <select name="useful_category_id" id="usefulCategory" data-placeholder="{{ Lang::get('labels.ChooseCity')}}..." class="chosen-select form-control" tabindex="-1" style="display: none;" required="">                                                 
                                                        <option value=""></option>  
                                                        @if(count($usefulCategories) > 0)
                                                        @foreach($usefulCategories as $usefulCategory)
                                                        @if( LaravelLocalization::getCurrentLocale() == "ar")  
                                                        @if($usefulLink->useful_category_id == $usefulCategory->id)
                                                        <option value="{{$usefulCategory->id}}" selected="">{{$usefulCategory->arabic_name}}</option>
                                                        @else
                                                        <option value="{{$usefulCategory->id}}">{{$usefulCategory->arabic_name}}</option>
                                                        @endif
                                                        @elseif ( LaravelLocalization::getCurrentLocale() == "en")
                                                        @if($usefulLink->useful_category_id == $usefulCategory->id)
                                                        <option value="{{$usefulCategory->id}}" selected="">{{$usefulCategory->english_name}}</option>
                                                        @else
                                                        <option value="{{$usefulCategory->id}}">{{$usefulCategory->english_name}}</option>
                                                        @endif
                                                        @endif
                                                        @endforeach 
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">                      
                                                    {!! Form::text('arabic_name',$usefulLink->arabic_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group"> 
                                                    {!! Form::text('english_name',$usefulLink->english_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('link',trans('labels.link')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group"> 
                                                    {!! Form::text('link',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'link'])  !!}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                <label class="custom-control custom-checkbox">
                                                    @if($usefulLink->active == 1)
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
                                        <button type="button" class="btn add-button pointer white-text mb-4" data-dismiss="modal"> {{Lang::get('headings.Close')}} </button>
                                        {!! Form::submit(Lang::get('headings.Edit'),['class'=>"btn add-button pointer white-text mb-4"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3 select_container">
        <div class="col-md-3 reversible-text">
        </div>
        <div class="col-md-9">
            <nav class="paginate margin-20 pl-10 pr-10 pt-2 ">
                {{ $usefulLinks->render() }}  
            </nav>
        </div>
    </div>
</div>
<div>
</div>
@stop

