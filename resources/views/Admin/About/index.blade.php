@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"about/create") }}" class="red-button btn  pointer white-text"> 
                {{ Lang::get('headings.NewAboutValue')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> {{Lang::get('headings.about')}} </h4>
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
                <input type="text" name="search" class="form-control" id="about_search" placeholder="{{Lang::get('headings.Search')}}">
            </div>
        </div>
        <div class="seacrch_about_contrent"></div>
        <div class="orginal-search">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="white-text thead-background">
                                <tr>
                                    <th>#</th>
                                    <th>{{Lang::get('labels.arabic_name')}}</th>   
                                    <th>{{Lang::get('labels.arabic_value')}}</th> 
                                    <th>{{Lang::get('labels.english_name')}}</th>   
                                    <th>{{Lang::get('labels.english_value')}}</th> 
                                    <th>{{Lang::get('labels.active')}}</th>   
                                    <th><i class="fa fa-trash"></i></th>
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($abouts as $about)                           
                                <tr>                               
                                    <td> <?php echo $i ?></td>        
                                    <td>{{$about->arabic_name}}</td>
                                    <td> <textarea class="form-control" rows="3" disabled="">{{$about->arabic_value}}</textarea></td>
                                    <td>{{$about->english_name}}</td>
                                    <td> <textarea class="form-control" rows="3" disabled="">{{$about->english_value}}</textarea></td>
                                    <td>
                                        @if($about->active ==1)
                                        <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                        @elseif ($about->active ==0)
                                        <i class="fa fa-times red-text" aria-hidden="true"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$about->id}}" ></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$about->id}}">
                                        </i>
                                    </td>  
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody> 
                        </table>
                        @foreach($abouts as $about)  
                        <div class="modal fade" id="DeleteModal{{$about->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                                {{$about->arabic_name}}
                                                @else
                                                {{$about->english_name}}
                                                @endif
                                            </span> ) !!

                                        </div>
                                        <div class="modal-footer border-none">
                                            {{ csrf_field()}}
                                            <button data-id="{{$about->id}}" type="button"  class="btn actionBtn btn-danger about-delete delete-button" data-dismiss="modal">
                                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($abouts as $about)  
                        <div class="modal fade" id="EditModal{{$about->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header content-header white-text" >
                                        <div class="col-md-5 text-left reversible-text">
                                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditCustomerReview')}} </h4>
                                        </div>
                                        <div class="col-md-7 text-right left-reversible-text">
                                            <a data-dismiss="modal" aria-label="Close">
                                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {!! Form::model($about ,['method'=>'PATCH','action'=>['AboutController@update' ,$about->id],'id'=>'about-form']) !!}
                                    <div class="modal-body mt-3">
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">                      
                                                    {!! Form::text('arabic_name',$about->arabic_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                                                </div>
                                            </div>
                                            <div class="col-md-3 reversible-text text-left">
                                                {!! Form::label('arabic_value',trans('labels.arabic_value')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <textarea class='form-control' rows="3" name="arabic_value" id='arabic_value' required="" >{{$about->arabic_value}}]</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                           <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group"> 
                                                     {!! Form::text('english_name',$about->english_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-3 reversible-text text-left">
                                                 {!! Form::label('english_value',trans('labels.english_value')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <textarea class='form-control' rows="3" name="english_value" id='english_value' required="" >{{$about->english_value}}]</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                <label class="custom-control custom-checkbox">
                                                    @if($about->active == 1)
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
                {{ $abouts->render() }}  
            </nav>
        </div>
    </div>
</div>
<div>
</div>
@stop

