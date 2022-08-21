@extends('Layouts.web')
@section('content')
<section class="color-back">
    <div class="light-transpert-grey">
        <div class="container-fluid header-padding">
            <div class="row">
                <div class="col-md-12 text-center ">
                    <h2 class="quote-sub-header">
                        {{ Html::image("images/leaf.png", 'alt text', array('class' => 'logo-leaf')) }}
                        @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                        {{$product_category->arabic_name}} 
                        @else
                        {{$product_category->english_name}}
                        @endif
                    </h2>                           
                </div>
            </div>
        </div>
    </div>
</section>
<section id="products" class="ml-2 mr-2 mb-5">  
    <div class=" pt-4 pb-4">
        <div class="container-fluid pt-3 pb-3 ">
            <div class="row declare-head text-center reversible-form filter-links mb-5">
                <div class="col-md-12">      
                    <div id="filters" class="filter-links"> 
                        <button class=" mb-2 uppercase green-active-background" >
                            {{ Html::image("images/ProductCategory/$product_category->image", 'alt text', array('class' => 'product-category-img')) }}
                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                            <span class="pt-1 pb-1 inline-block" > {{$product_category->arabic_name}} </span>
                            @else
                            <span class="pt-1 pb-1 inline-block" > {{$product_category->english_name}} </span>
                            @endif
                        </button>   
                        @foreach($product_categories as $product_categori)                       
                        <button class=" mb-2 uppercase opacity">
                            {{ Html::image("images/ProductCategory/$product_categori->image", 'alt text', array('class' => 'product-category-img')) }}

                            @if( LaravelLocalization::getCurrentLocale() === "ar")                        
                            <span class="pt-1 pb-1 inline-block" > {{$product_categori->arabic_name}} </span>
                            @else
                            <span class="pt-1 pb-1 inline-block" > {{$product_categori->english_name}} </span>
                            @endif
                        </button>        
                        @endforeach
                    </div>       
                </div>              
            </div>

            <!--            <div class="text-center mt-4 mb-4">
                            <form role="search" action="http://demo.virtuti.info/demonstrations/vt28/" method="get" id="searchform" class=" search-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="search" name="s"  placeholder="search" id="webProductSearch"/>
                                {{ Html::image("images/zoom1.png", 'alt text', array('class' => 'img-fluid img-seacrh')) }}
                            </form>
                        </div>-->
            <div class="row mt-5 reversible-form">
                @if(count($product_category->products)>0)
                @foreach($product_category->products as $product) 
                <div class="col-md-3">
                    <div class="view relative">
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
                            <?php echo mb_substr($product->arabic_overview, 0, 50, "UTF-8"); ?>
                            <span class="d-block" >
                                <?php echo '...'; ?>
                            </span>
                            @else
                            <?php echo mb_substr($product->english_overview, 0, 50, "UTF-8"); ?>
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
            </div>
        </div>
    </div>
</section>
@stop