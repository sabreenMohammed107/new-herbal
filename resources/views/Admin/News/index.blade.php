@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"news/create") }}" class="red-button btn  pointer white-text"> 
                {{ Lang::get('headings.NewNews')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> {{Lang::get('headings.news')}} </h4>
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
                <input type="text" name="search" class="form-control" id="news_search" placeholder="{{Lang::get('headings.Search')}}">
            </div>
        </div>
        <div class="seacrch_new_contrent"></div>
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
                                    <th>{{Lang::get('labels.active')}}</th>   
                                    <th><i class="fa fa-trash"></i></th>
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                    <th>
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($news as $new)                           
                                <tr>                               
                                    <td> <?php echo $i ?></td>        
                                    <td>{{$new->arabic_name}}</td>

                                    <td>{{$new->english_name}}</td>

                                    <td>
                                        @if($new->active ==1)
                                        <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                        @elseif ($new->active ==0)
                                        <i class="fa fa-times red-text" aria-hidden="true"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$new->id}}" ></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$new->id}}">
                                        </i>
                                    </td>  
                                    <td>
                                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"news/{$new->id}") }}">
                                            <i class="fa fa-file-text-o view" aria-hidden="true" title="??????" ></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody> 
                        </table>
                        @foreach($news as $new)  
                        <div class="modal fade" id="DeleteModal{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                                {{$new->arabic_name}}
                                                @else
                                                {{$new->english_name}}
                                                @endif
                                            </span> ) !!

                                        </div>
                                        <div class="modal-footer border-none">
                                            {{ csrf_field()}}
                                            <button data-id="{{$new->id}}" type="button"  class="btn actionBtn btn-danger news-delete delete-button" data-dismiss="modal">
                                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($news as $new)  
                        <div class="modal fade" id="EditModal{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
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
                                    {!! Form::model($new ,['method'=>'PATCH','action'=>['NewsController@update' ,$new->id],'id'=>'new-form','enctype'=>'multipart/form-data']) !!}
                                    <div class="modal-body mt-3">
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">                      
                                                    {!! Form::text('arabic_name',$new->arabic_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group"> 
                                                    {!! Form::text('english_name',$new->english_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('arabic_desc',trans('labels.arabic_desc')) !!} : 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <textarea class='form-control' rows="3" name="arabic_desc" id='arabic_desc' >{{$new->arabic_desc}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3 reversible-text">
                                                {!! Form::label('english_desc',trans('labels.english_desc')) !!} : 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <textarea class='form-control' rows="3" name="english_desc" id='english_desc' >{{$new->english_desc}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('image',trans('labels.image')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input required type="file" class="form-control" name="image"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                <label class="custom-control custom-checkbox">
                                                    @if($new->active == 1)
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
                {{ $news->render() }}  
            </nav>
        </div>
    </div>
</div>
<div>
</div>
@stop

