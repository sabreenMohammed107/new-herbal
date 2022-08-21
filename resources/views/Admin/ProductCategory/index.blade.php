@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"productCategory/create") }}" class="red-button btn  pointer white-text">
                {{ Lang::get('headings.NewProductCategory')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> {{Lang::get('headings.productCategories')}} </h4>
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
                <input type="text" name="search" class="form-control" id="productCategory_search" placeholder="{{Lang::get('headings.Search')}}">
            </div>
        </div>
        <div class="seacrch_productCategory_contrent"></div>
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
                                    <th>{{Lang::get('labels.image')}}</th>
                                    <th>{{Lang::get('labels.active')}}</th>
                                    <th><i class="fa fa-trash"></i></th>
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($productCategories as $productCategory)
                                <tr>
                                    <td> <?php echo $i ?></td>
                                    <td>{{$productCategory->arabic_name}}</td>

                                    <td>{{$productCategory->english_name}}</td>
                                    <td>
                                        {{ Html::image("public/images/ProductCategory/$productCategory->image", 'alt text', array('class' => 'pb-3 img-fluid img-size')) }}
                                    </td>
                                    <td>
                                        @if($productCategory->active ==1)
                                        <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                        @elseif ($productCategory->active ==0)
                                        <i class="fa fa-times red-text" aria-hidden="true"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$productCategory->id}}" ></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$productCategory->id}}">
                                        </i>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        @foreach($productCategories as $productCategory)
                        <div class="modal fade" id="DeleteModal{{$productCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                                {{$productCategory->arabic_name}}
                                                @else
                                                {{$productCategory->english_name}}
                                                @endif
                                            </span> ) !!

                                        </div>
                                        <div class="modal-footer border-none">
                                            {{ csrf_field()}}
                                            <button data-id="{{$productCategory->id}}" type="button"  class="btn actionBtn btn-danger productCategory-delete delete-button" data-dismiss="modal">
                                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($productCategories as $productCategory)
                        <div class="modal fade" id="EditModal{{$productCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header content-header white-text" >
                                        <div class="col-md-5 text-left reversible-text">
                                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditProductCategory')}} </h4>
                                        </div>
                                        <div class="col-md-7 text-right left-reversible-text">
                                            <a data-dismiss="modal" aria-label="Close">
                                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {!! Form::model($productCategory ,['method'=>'PATCH','action'=>['ProductCategoryController@update' ,$productCategory->id],'id'=>'productCategory-form','enctype'=>'multipart/form-data']) !!}
                                    <div class="modal-body mt-3">
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('arabic_name',trans('labels.arabic_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    {!! Form::text('arabic_name',$productCategory->arabic_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    {!! Form::text('english_name',$productCategory->english_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}

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
                                                    @if($productCategory->active == 1)
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
                {{ $productCategories->render() }}
            </nav>
        </div>
    </div>
</div>
<div>
</div>
@stop

