@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"gallery/create") }}" class="red-button btn  pointer white-text"> 
                {{ Lang::get('headings.NewGallery')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> {{Lang::get('headings.galleries')}} </h4>
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
                <!--<input type="text" name="search" class="form-control" id="gallery_search" placeholder="{{Lang::get('headings.Search')}}">-->
            </div>
        </div>
        <div class="seacrch_gallery_contrent"></div>
        <div class="orginal-search">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="white-text thead-background">
                                <tr>
                                    <th>#</th>
                                    <th>{{Lang::get('labels.gallery_type')}}</th>   
                                    <th>{{Lang::get('labels.date')}}</th>   
                                    <!--<th><i class="fa fa-trash"></i></th>-->
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($galleries as $gallery)                           
                                <tr>                               
                                    <td> <?php echo $i ?></td>
                                    @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                    <td> {{$arabic_names[$gallery->gallery_type_id]}} </td>
                                    @else
                                    <td> {{$english_names[$gallery->gallery_type_id]}} </td>
                                    @endif
                                    <td>
                                        {{$gallery->created_at}}
                                    </td>
<!--                                    <td>
                                        <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$gallery->id}}" ></i>
                                    </td>-->
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$gallery->gallery_type_id}}">
                                        </i>
                                    </td>  
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody> 
                        </table>
                        @foreach($galleries as $gallery)  
                        <div class="modal fade " style="direction:ltr !important" id="EditModal{{$gallery->gallery_type_id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header content-header white-text reversible-form" >
                                        <div class="col-md-5 text-left reversible-text">
                                            <h4 class="pt-3 pb-3 pl-3 f16 f400"> {{Lang::get('headings.EditGallery')}} </h4>
                                        </div>
                                        <div class="col-md-7 text-right left-reversible-text">
                                            <a data-dismiss="modal" aria-label="Close">
                                                <i class="pt-3 pb-3 f16 fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    {!! Form::model($gallery ,['method'=>'PATCH','action'=>['GalleryController@update' ,$gallery->gallery_type_id,'id'=>'gallery-form']]) !!}
                                    <div class="modal-body mt-3 reversible-form"  >
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left pl-4">
                                                {!! Form::label('gallery_type',trans('labels.gallery_type')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                                                    <input type="text" class="form-control" readonly="" value="{{$arabic_names[$gallery->gallery_type_id]}}" />
                                                    @else
                                                    <input type="text" class="form-control" readonly="" value="{{$english_names[$gallery->gallery_type_id]}}" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="white-text thead-background">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{Lang::get('labels.image')}}</th>   
                                                        <th>{{Lang::get('labels.active')}}</th>  
                                                        <th><i class="fa fa-trash"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="galleryTable">
                                                    <?php $i = 1; ?>
                                                    @foreach($gallery_types[$gallery->gallery_type_id]->galleries as $galleri)                           
                                                    <tr class="{{$galleri->id}}">  
                                                <input  type='hidden' name='gallery[{{$galleri->id}}]' value="{{$galleri->id}}" />
                                                <td> <?php echo $i ?></td>
                                                <td>
                                                    {{ Html::image("images/Gallery/$galleri->image", 'alt text', array('class' => 'pb-3 img-fluid img-size')) }}
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        @if($galleri->active == 1)
                                                        <input type="checkbox" name="actives[{{$galleri->id}}]" class="custom-control-input"  checked>
                                                        @else
                                                        <input type="checkbox" name="actives[{{$galleri->id}}]" class="custom-control-input" >
                                                        @endif
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">
                                                            {{ Lang::get('labels.active')}}
                                                        </span>
                                                    </label>
                                                </td>
                                                 <td><i class="fa fa-trash-o tip pointer posdel remove gallery-delete" title="Remove" data-id="{{$galleri->id}}" ></i> </td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer reversible-form">
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
                {{ $galleries->render() }}  
            </nav>
        </div>
    </div>
</div>
<div>
</div>
@stop

