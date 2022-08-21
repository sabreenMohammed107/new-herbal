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
                    @foreach($products as $product)
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td>{{$product->arabic_name}}</td>

                        <td>{{$product->english_name}}</td>

                        <td>
                            @if($product->active ==1)
                            <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                            @elseif ($product->active ==0)
                            <i class="fa fa-times red-text" aria-hidden="true"></i>
                            @endif

                        </td>
                        <td>
                            <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$product->id}}" ></i>
                        </td>
                        <td>
                            <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$product->id}}">
                            </i>
                        </td>
                        <td>
                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"product/{$product->id}") }}">
                                <i class="fa fa-file-text-o view" aria-hidden="true" title="عرض" ></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            @foreach($products as $product)
            <div class="modal fade" id="DeleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                    {{$product->arabic_name}}
                                    @else
                                    {{$product->english_name}}
                                    @endif
                                </span> ) !!

                            </div>
                            <div class="modal-footer border-none">
                                {{ csrf_field()}}
                                <button data-id="{{$product->id}}" type="button"  class="btn actionBtn btn-danger product-delete delete-button" data-dismiss="modal">
                                    <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($products as $product)
            <div class="modal fade" id="EditModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
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
                        {!! Form::model($product ,['method'=>'PATCH','action'=>['ProductController@update' ,$product->id],'id'=>'product-form','enctype'=>'multipart/form-data']) !!}
                        <div class="modal-body mt-3">
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('productCategory',trans('labels.productCategory')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <select name="product_category_id" id="productCategory" data-placeholder="{{ Lang::get('labels.ChooseProductCategory')}}..." class="product-category-chosen-select form-control" tabindex="-1" style="display: none;" required="">
                                            <option value=""></option>
                                            @if(count($product_categories) > 0)
                                            @foreach($product_categories as $product_category)
                                            @if( LaravelLocalization::getCurrentLocale() == "ar")
                                            @if($product->product_category_id == $product_category->id)
                                            <option value="{{$product_category->id}}" selected="">{{$product_category->arabic_name}}</option>
                                            @else
                                            <option value="{{$product_category->id}}">{{$product_category->arabic_name}}</option>
                                            @endif
                                            @elseif ( LaravelLocalization::getCurrentLocale() == "en")
                                            @if($product->product_category_id == $product_category->id)
                                            <option value="{{$product_category->id}}" selected="">{{$product_category->english_name}}</option>
                                            @else
                                            <option value="{{$product_category->id}}">{{$product_category->english_name}}</option>
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
                                        {!! Form::text('arabic_name',$product->arabic_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'arabic_name'])  !!}
                                    </div>
                                </div>
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('english_name',trans('labels.english_name')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        {!! Form::text('english_name',$product->english_name,['class'=>'form-control','aria-required'=>"true" ,'aria-invalid'=>"false",'id'=>'english_name'])  !!}

                                    </div>
                                </div>

                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('arabic_review',trans('labels.arabic_review')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <textarea class='form-control' rows="3" name="arabic_overview" id='arabic_review' >{{$product->arabic_overview}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('english_review',trans('labels.english_review')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <textarea class='form-control' rows="3" name="english_overview" id='english_review'  >{{$product->english_overview}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('arabic_desc',trans('labels.arabic_desc')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <textarea class='form-control' rows="3" name="arabic_desc" id='arabic_desc' >{{$product->arabic_desc}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('english_desc',trans('labels.english_desc')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <textarea class='form-control' rows="3" name="english_desc" id='english_desc' >{{$product->english_desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('link-name',trans('labels.link-name')) !!} : <span class="star"> * </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input required type="text" class="form-control" name="link_name" value="{{$product->link_name}}" >
                                    </div>
                                </div>
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('link-value',trans('labels.link-value')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_value" value="{{$product->link_value}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('link_arabic_name',trans('labels.link_arabic_name')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input required type="text" class="form-control" name="link_arabic_name" value="{{$product->link_arabic_name}}" >
                                    </div>
                                </div>
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('link_arabic_value',trans('labels.link_arabic_value')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="link_arabic_value" value="{{$product->link_arabic_value}}">
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
                                    {!! Form::label('price',trans('labels.price')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="price" placeholder="price" >
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    {!! Form::label('video',trans('labels.video')) !!} :
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        {!! Form::file('video',['class'=>'control-label']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group mb-4">
                                <div class="col-md-3 reversible-text text-left  pl-4">
                                    <label class="custom-control custom-checkbox">
                                        @if($product->active == 1)
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
<script src="{{ asset('public/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/prism.js') }}"  type="text/javascript"></script>
<script type="text/javascript">
$('.product-category-chosen-select').chosen({no_results_text: "لايوجد نتايج"});
</script>
