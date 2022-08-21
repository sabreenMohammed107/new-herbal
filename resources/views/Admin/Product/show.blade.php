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
            {{ Lang::get('headings.products')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3  reversible-form"  >
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.productCategory')}}:</span>
            </div>
            <div class="col-md-3">
                @if( LaravelLocalization::getCurrentLocale() === "ar")
                <td> {{$product->ProductCategory->arabic_name}} </td>
                @else
                <td> {{$product->ProductCategory->english_name}} </td>
                @endif
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.arabic_name')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->arabic_name}}
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.english_name')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->english_name}}
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.arabic_review')}}:</span>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" rows="3" disabled="">{{$product->arabic_overview}}</textarea>
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.english_review')}}:</span>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" rows="3" disabled="">{{$product->english_overview}}</textarea>
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.arabic_desc')}}:</span>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" rows="3" disabled="">{{$product->arabic_desc}}</textarea>
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.english_desc')}}:</span>
            </div>
            <div class="col-md-3">
                <textarea class="form-control" rows="3" disabled="">{{$product->english_desc}}</textarea>
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.image')}}:</span>
            </div>
            <div class="col-md-3">
                {{ Html::image("public/images/Product/$product->image", 'course', array('class' => 'pb-3 img-fluid')) }}
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.price')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->price}}
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.link-name')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->link_name}}
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.link-value')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->link_value}}
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.link_arabic_name')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->link_arabic_name}}
            </div>
            <div class="col-md-3 reversible-text">
                <span class=" f600"> {{Lang::get('labels.link_arabic_value')}}:</span>
            </div>
            <div class="col-md-3">
                {{$product->link_arabic_value}}
            </div>
        </div>
        <div class="row p-3  reversible-text">
            <div class="col-md-3 ">
                {!! Form::label('video',trans('labels.video')) !!} :
            </div>
            <div class="col-md-3">
                <video width="320" height="240" controls>
                    <source src="{{ asset('public/public/images/Product/'.$product->video.'')}}" type="video/mp4">
                    <source src="{{ asset('public/public/images/Product/'.$product->video.'')}}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="row p-3 reversible-text">
            <div class="col-md-3 ">
                <span class=" f600"> {{Lang::get('labels.active')}}:</span>
            </div>
            <div class="col-md-3">
                @if($product->active ==1)
                <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                @elseif ($product->active ==0)
                <i class="fa fa-times red-text " aria-hidden="true"></i>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="white-background mt-4 content-details">
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text">
            {{ Lang::get('headings.AssignProductSheets')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3  reversible-form"  >
        @if(count($product->productSheets)>0)
        <div class="row form-group mb-4">
            <div class="col-md-12" >
                <div class="table-responsive text-center">
                    <table class="table table-bordered product-prerequist">
                        <thead class="white-text sub-thead-background">
                            <tr>
                                <th>{{Lang::get('labels.arabic_name')}}</th>
                                <th>{{Lang::get('labels.english_name')}}</th>
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
                            @foreach ($product->productSheets as $productValue)
                            <tr>
                                <td>{{$productValue->arabic_name}}</td>
                                <td>
                                    <textarea class="form-control" rows="3" disabled="">{{$productValue->arabic_value}}</textarea>
                                </td>
                                <td>{{$productValue->english_name}}</td>
                                <td>
                                    <textarea class="form-control" rows="3" disabled="">{{$productValue->english_value}}</textarea>
                                </td>
                                <td>
                                    @if($productValue->active ==1)
                                    <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                    @elseif ($productValue->active ==0)
                                    <i class="fa fa-times red-text" aria-hidden="true"></i>
                                    @endif

                                </td>
                                <td>
                                    <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#contentEditModal{{$productValue->id}}">
                                    </i>
                                </td>
                                <td>
                                    <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$productValue->id}}" ></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach ($product->productSheets as $productValue)
        <div class="modal fade" id="DeleteModal{{$productValue->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                            <button data-id="{{$productValue->id}}" type="button"  class="btn actionBtn btn-danger product-sheet-delete delete-button" data-dismiss="modal">
                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($product->productSheets as $productValue)
        <div class="modal fade" id="contentEditModal{{$productValue->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header content-header white-text" >
                        <div class="col-md-5 text-left reversible-text">
                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditProduct')}} </h4>
                        </div>
                        <div class="col-md-7 text-right left-reversible-text">
                            <a data-dismiss="modal" aria-label="Close">
                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    {!! Form::open(['action'=>'ProductController@assignProductSheetUpdate']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$productValue->id }}">
                    <div class="modal-body mt-3">
                        <div class="row form-group mb-4">
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} :
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" rows="3" name="arabic_name" id="arabic_name" value="{{$productValue->arabic_name}}" required="">
                                </div>
                            </div>
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                {!! Form::label('arabic_value',trans('labels.english_value')) !!} :
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <textarea class="form-control" name="arabic_value" id="arabic_value" rows="3" required="">{{$productValue->arabic_value}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                {!! Form::label('english_name',trans('labels.english_name')) !!} :
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input class="form-control" rows="3" name="english_name" id="english_name" value="{{$productValue->english_name}}" required="">
                                </div>
                            </div>
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                {!! Form::label('english_value',trans('labels.english_value')) !!} :
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <textarea class="form-control" name="english_value" id="english_value" rows="3" required="">{{$productValue->english_value}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-3 reversible-text text-left  pl-4">
                                <label class="custom-control custom-checkbox">
                                    @if($productValue->active == 1)
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
                <a class="red-button btn  pointer white-text" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"assignProductSheet/{$product->id}") }}">
                    {{Lang::get('labels.add')}}
                </a>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
</div>
<div class="white-background mt-4 content-details">
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text">
            {{ Lang::get('headings.AssignProductImages')}}
        </h4>
        <div class="clearfix"></div>
    </div>
    <div class="p-3  reversible-form"  >
        @if(count($product->productImages)>0)
        <div class="row form-group mb-4">
            <div class="col-md-12" >
                <div class="table-responsive text-center">
                    <table class="table table-bordered product-prerequist">
                        <thead class="white-text sub-thead-background">
                            <tr>
                                <th>{{Lang::get('labels.image')}}</th>
                                <th><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->productImages as $productImage)
                            <tr>
                                <td>
                                     {{ Html::image("public/images/Product/$productImage->image", 'alt text', array('class' => 'pb-3 img-fluid img-size')) }}
                                </td>
                                <td>
                                    <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#ProductSheetDeleteModal{{$productImage->id}}" ></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach ($product->productImages as $productImage)
        <div class="modal fade" id="ProductSheetDeleteModal{{$productImage->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                            <button data-id="{{$productImage->id}}" type="button"  class="btn actionBtn btn-danger product-image-delete delete-button" data-dismiss="modal">
                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @endif
        <div class="row form-group mb-4">
            <div class="col-md-11 mt-3 reversible-text" >
                <a class="red-button btn  pointer white-text" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"assignProductImage/{$product->id}") }}">
                    {{Lang::get('labels.add')}}
                </a>
            </div>
            <div class="clear-fix"></div>
        </div>
    </div>
</div>
@stop


