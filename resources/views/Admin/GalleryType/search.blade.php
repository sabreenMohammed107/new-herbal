<div class="row">
    <div class="col-md-12">
        <div class="table-responsive text-center">
            <table class="table table-bordered">
                <thead class="white-text thead-background">
                    <tr>
                        <th>#</th>
                        <th>{{Lang::get('headings.galleryTypes')}}</th>   
                        <th>{{Lang::get('labels.active')}}</th>   
                        <th><i class="fa fa-trash"></i></th>
                        <th>
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($gallery_types as $gallery_type)                           
                    <tr>                               
                        <td> <?php echo $i ?></td>
                        @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                        <td> {{$gallery_type->arabic_name}} </td>
                        @else
                        <td> {{$gallery_type->english_name}} </td>
                        @endif
                        <td>
                            @if($gallery_type->active ==1)
                            <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                            @elseif ($gallery_type->active ==0)
                            <i class="fa fa-times red-text" aria-hidden="true"></i>
                            @endif

                        </td>
                        <td>
                            <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$gallery_type->id}}" ></i>
                        </td>
                        <td>
                            <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$gallery_type->id}}">
                            </i>
                        </td>  
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody> 
            </table>
            @foreach($gallery_types as $gallery_type)  
            <div class="modal fade" id="DeleteModal{{$gallery_type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                {{Lang::get('headings.DeleteConfirm')}} (
                                <span class="yellow-text">
                                    @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                    {{$gallery_type->arabic_name}}
                                    @else
                                    {{$gallery_type->english_name}}
                                    @endif
                                </span> ) !!

                            </div>
                            <div class="modal-footer border-none">
                                {{ csrf_field()}}
                                <button data-id="{{$gallery_type->id}}" type="button"  class="btn actionBtn btn-danger gallery_type-delete red-button" data-dismiss="modal">
                                    <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($gallery_types as $gallery_type)  
            <div class="modal fade" id="EditModal{{$gallery_type->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header content-header white-text" >
                            <div class="col-md-5 text-left reversible-text">
                                <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditGalleryType')}} </h4>
                            </div>
                            <div class="col-md-7 text-right left-reversible-text">
                                <a data-dismiss="modal" aria-label="Close">
                                    <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        {!! Form::model($gallery_type ,['method'=>'PATCH','action'=>['GalleryTypeController@update' ,$gallery_type->id],'id'=>'gallery_type-form']) !!}
                        <div class="modal-body mt-3">
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('name',trans('labels.ar_name')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">                      
                                        {!! Form::text('arabic_name',$gallery_type->arabic_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false" ,'required'=>'required','max'=>100])  !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('name',trans('labels.en_name')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        {!! Form::text('english_name',$gallery_type->english_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'required','max'=>100])  !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    <label class="custom-control custom-checkbox">
                                        @if($gallery_type->active == 1)
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
        </div>
    </div>
</div>
