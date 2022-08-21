@if(count($products)>0)
    @foreach($products as $product) 
    <div class="element-item {{$product->ProductCategory->english_name}}">
        <div class="view relative mt-3">
            {{ Html::image("images/Product/$product->image", 'alt text', array('class' => 'product-image img-fluid')) }}
            <!--<img  src="http://verdure.mikado-themes.com/wp-content/uploads/2018/04/shop-img-1.jpg" class="product-image img-fluid" alt="f" />-->
        </div>
        <div class="product-details p-4">
            <h5  class="product-title uppercase">
                @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                <a>{{$product->arabic_name}} </a>
                @else
                <a>{{$product->english_name}} </a>
                @endif
            </h5>
            <p class="product-paragph pl-2 pr-2 pt-1 pb-1">
                @if( LaravelLocalization::getCurrentLocale() === "ar")       
                <?php echo mb_substr($product->arabic_overview, 0, 30, "UTF-8"); ?>
                <span class="d-block" >
                    <?php echo '...'; ?>
                </span>
                @else
                <?php echo mb_substr($product->english_overview, 0, 30, "UTF-8"); ?>
                <span class="d-block" >
                    <?php echo '...'; ?>
                </span>
                @endif
            </p>
            <a class="button-details2 btn" <a class="button-details2 btn" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),"webProductDetails/{$product->id}") }}">
                    {{ Lang::get('headings.viewMore')}}
                </a>
        </div>
    </div>
    @endforeach
@endif