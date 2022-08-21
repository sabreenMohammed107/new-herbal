@extends('Layouts.admin')
@section('content')
<div  class="button-header mb-4 white-background p-3">
    <div class="row">
        <div class="col-md-12 reversible-text">                                
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"sliderImage/create") }}" class="red-button btn  pointer white-text"> 
                {{ Lang::get('headings.NewSliderImage')}}
            </a>
        </div>
    </div>
</div>
<div class="white-background content-details">                        
    <div class="content-header white-text">
        <h4 class="p-3 f16 f400 reversible-text"> {{Lang::get('headings.sliderImages')}} </h4>
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
                <!--<input type="text" name="search" class="form-control" id="sliderImage_search" placeholder="{{Lang::get('headings.Search')}}">-->
            </div>
        </div>
        <div class="orginal-search">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="white-text thead-background">
                                <tr>
                                    <th>#</th>
                                    <th>{{Lang::get('labels.image')}}</th>
                                    <th>{{Lang::get('labels.active')}}</th>
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($sliderImages as $sliderImage)                           
                                <tr>                               
                                    <td> <?php echo $i ?></td>
                                    <td>
                                        {{ Html::image("images/SliderImage/$sliderImage->image", 'course', array('class' => 'img-size img-fluid')) }}
                                    </td>
                                    <td>
                                        @if($sliderImage->active ==1)
                                        <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                        @elseif ($sliderImage->active ==0)
                                        <i class="fa fa-times red-text" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$sliderImage->sliderImage_id}}">
                                        </i>
                                    </td>  
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody> 
                        </table>
                        @foreach($sliderImages as $sliderImage)  
                        <div class="modal fade " style="direction:ltr !important" id="EditModal{{$sliderImage->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
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
                                    {!! Form::model($sliderImage ,['method'=>'PATCH','action'=>['SliderImageController@update' ,$sliderImage->id,'id'=>'sliderImage-form']]) !!}
                                    <div class="modal-body mt-3 reversible-form"  >
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                <label class="custom-control custom-checkbox">
                                                    @if($sliderImage->active == 1)
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
                {{ $sliderImages->render() }}  
            </nav>
        </div>
    </div>
</div>
<div>
</div>
@stop

