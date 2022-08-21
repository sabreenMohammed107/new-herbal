 <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="white-text thead-background">
                                <tr>
                                    <th>#</th>
                                    <th>{{Lang::get('labels.arabic_review')}}</th>   
                                    <th>{{Lang::get('labels.english_review')}}</th> 
                                    <th>{{Lang::get('labels.active')}}</th>   
                                    <th><i class="fa fa-trash"></i></th>
                                    <th>
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($customerReviews as $customer_review)                           
                                <tr>                               
                                    <td> <?php echo $i ?></td>                      
                                    <td> <textarea class="form-control" rows="3" disabled="">{{$customer_review->arabic_review}}</textarea></td>
                                    <td> <textarea class="form-control" rows="3" disabled="">{{$customer_review->english_review}}</textarea></td>
                                    <td>
                                        @if($customer_review->active ==1)
                                        <i class="fa fa-check-circle active-item" aria-hidden="true"></i>
                                        @elseif ($customer_review->active ==0)
                                        <i class="fa fa-times red-text" aria-hidden="true"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <i class="fa fa-trash-o tip pointer posdel remove" title="Remove" data-toggle="modal" data-target="#DeleteModal{{$customer_review->id}}" ></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-pencil edit" aria-hidden="true"  title="edit" data-toggle="modal" data-target="#EditModal{{$customer_review->id}}">
                                        </i>
                                    </td>  
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody> 
                        </table>
                        @foreach($customerReviews as $customer_review)  
                        <div class="modal fade" id="DeleteModal{{$customer_review->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
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
                                            <button data-id="{{$customer_review->id}}" type="button"  class="btn actionBtn btn-danger customer_review-delete delete-button" data-dismiss="modal">
                                                <span id="footer_action_button" class="glyphicon glyphicon-trash"> {{Lang::get('headings.Delete')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($customerReviews as $customer_review)  
                        <div class="modal fade" id="EditModal{{$customer_review->id}}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
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
                                    {!! Form::model($customer_review ,['method'=>'PATCH','action'=>['CustomerReviewController@update' ,$customer_review->id],'id'=>'customer-review-form']) !!}
                                    <div class="modal-body mt-3">
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                               {!! Form::label('arabic_review',trans('labels.arabic_review')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">                      
                                                    <textarea class='form-control' rows="3" name="arabic_review" id='arabic_review' required="" >{{$customer_review->arabic_review}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                  {!! Form::label('english_review',trans('labels.english_review')) !!} : <span class="star"> * </span>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                   <textarea class='form-control' rows="3" name="english_review" id='english_review' required="" >{{$customer_review->english_review}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group mb-4">
                                            <div class="col-md-3 reversible-text text-left  pl-4">
                                                <label class="custom-control custom-checkbox">
                                                    @if($customer_review->active == 1)
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