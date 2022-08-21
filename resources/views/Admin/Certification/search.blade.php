<div class="row">
    <div class="col-md-12">
        <div class="table-responsive text-center">
            <table class="table table-bordered">
                <thead class="white-text thead-background">
                    <tr>
                        <th>#</th>
                        <th>{{Lang::get('labels.name')}}</th>
                        <th>{{Lang::get('labels.number')}}</th>
                        <th>{{Lang::get('labels.image')}}</th>
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
                    @foreach($certifications as $certification)
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> {{$certification->name}} </td>
                        <td> {{$certification->number}} </td>
                        <td>
                            {{ Html::image("public/images/Certification/$certification->image", 'alt text', array('class' => 'pb-3 img-fluid img-size')) }}
                        </td>
                        <td>
                            @if($certification->active ==1)
                            <i class="fa fa-check-circle active-item " aria-hidden="true"></i>
                            @elseif ($certification->active ==0)
                            <i class="fa fa-times red-text" aria-hidden="true"></i>
                            @endif

                        </td>
                        <td>
                            <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$certification->id}}" ></i>
                        </td>
                        <td>
                            <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$certification->id}}">
                            </i>
                        </td>
                        <td>
                            <i class="fa fa-file-text-o view" aria-hidden="true" title="view certification" data-toggle="modal" data-target="#showModal{{$certification->id}}"></i>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            @foreach($certifications as $certification)
            <div class="modal fade" id="DeleteModal{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                    {{$certification->name}}
                                </span> ) !!

                            </div>
                            <div class="modal-footer border-none">
                                {{ csrf_field()}}
                                <button data-id="{{$certification->id}}" type="button"  class="btn actionBtn btn-danger certification-delete delete-button" data-dismiss="modal">
                                    <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($certifications as $certification)
            <div class="modal fade" id="EditModal{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header content-header white-text" >
                            <div class="col-md-5 text-left reversible-text">
                                <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditCertification')}} </h4>
                            </div>
                            <div class="col-md-7 text-right left-reversible-text">
                                <a data-dismiss="modal" aria-label="Close">
                                    <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        {!! Form::model($certification ,['method'=>'PATCH','action'=>['CertificationController@update' ,$certification->id],'id'=>'certification-form','files'=>true ,'enctype'=>'multipart/form-data']) !!}
                        <div class="modal-body mt-3">
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('name',trans('labels.name')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        {!! Form::text('name',null,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'name'])  !!}
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
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('number',trans('labels.number')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" value="{{$certification->number}}" class="form-control" name="number" placeholder="number" >
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('arabic_desc',trans('labels.arabic_desc')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <textarea class="form-control" name="arabic_desc" rows="3">{{$certification->arabic_desc}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('english_desc',trans('labels.english_desc')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <textarea class="form-control" name="english_desc" rows="3">{{$certification->english_desc}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    <label class="custom-control custom-checkbox">
                                        @if($certification->active == 1)
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
            @foreach($certifications as $certification)
            <div class="modal fade" id="showModal{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header content-header white-text" >
                            <div class="col-md-5 text-left reversible-text">
                                <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditCertification')}} </h4>
                            </div>
                            <div class="col-md-7 text-right left-reversible-text">
                                <a data-dismiss="modal" aria-label="Close">
                                    <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row p-3 border-bottom text-left">
                                <div class="col-md-4 reversible-text text-left">
                                    <span class="red-text f600">
                                        {{Lang::get('labels.name')}}:
                                    </span>
                                </div>
                                <div class="col-md-8 reversible-text text-left">
                                    {{ $certification->name }}
                                </div>
                            </div>
                            <div class="row p-3 border-bottom text-left">
                                <div class="col-md-4 reversible-text text-left">
                                    <span class="red-text f600">
                                        {{Lang::get('labels.number')}}:
                                    </span>
                                </div>
                                <div class="col-md-8 reversible-text text-left">
                                    {{ $certification->number }}
                                </div>
                            </div>
                            <div class="row p-3 border-bottom text-left">
                                <div class="col-md-4 reversible-text text-left">
                                    <span class="red-text f600">
                                        {{Lang::get('labels.image')}} :
                                    </span>
                                </div>
                                <div class="col-md-8 reversible-text text-left">
                                    {{ Html::image("public/images/Certification/$certification->image", 'alt text', array('class' => 'pb-3 img-fluid img-size')) }}

                                </div>
                            </div>
                            <div class="row p-3 border-bottom text-left">
                                <div class="col-md-4 reversible-text text-left">
                                    <span class="red-text f600">
                                        {{Lang::get('labels.arabic_desc')}}:
                                    </span>
                                </div>
                                <div class="col-md-8 reversible-text text-left">
                                    <textarea class="form-control" rows="3" disabled="">{{ $certification->arabic_desc }}</textarea>
                                </div>
                            </div>
                            <div class="row p-3 border-bottom text-left">
                                <div class="col-md-4 reversible-text text-left">
                                    <span class="red-text f600">
                                        {{Lang::get('labels.english_desc')}}:
                                    </span>
                                </div>
                                <div class="col-md-8 reversible-text text-left">
                                    <textarea class="form-control" rows="3" disabled="">{{ $certification->	english_desc }}</textarea>
                                </div>
                            </div>
                            <div class="row p-3 text-left">
                                <div class="col-md-4 reversible-text text-left">
                                    <span class="red-text f600"> {{Lang::get('labels.active')}} :</span>
                                </div>
                                <div class="col-md-8 reversible-text text-left">
                                    @if($certification->active ==1)
                                    <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                    @elseif ($certification->active ==0)
                                    <i class="fa fa-times red-text" aria-hidden="true"></i>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn add-button pointer white-text mb-4" data-dismiss="modal"> {{Lang::get('headings.Close')}} </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
