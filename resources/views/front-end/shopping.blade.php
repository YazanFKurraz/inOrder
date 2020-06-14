
@section('content')

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                <li><a href="{{route('landing.index')}}">Home</a></li>
                    <li><a>All Categories</a></li>
                <li class="active" href="{{route('shop')}}">Shopping</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>


<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        @foreach ($categories as $item)
                        <li class="list-unstyled" style="margin-bottom: 16px; font-size: 13px;">
                            <a href="{{route('product.category', $item->id)}}">{{$item->name}} <small style="color: #8D99AE;">({{$item->product->count()}})</small></a>
                        </li>
                        @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                
                    @foreach ($brands as $item)
                    <li class="list-unstyled" style=" font-size: 13px;">
                        <a>{{$item->name}}</a>
                        <img src="{{asset('/admin_uploads/brand').'/'.$item->brand_image}}" alt="" width="80px">
                     </li>
                    @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                     @foreach ($topSilling as $item)
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="{{asset('/admin_uploads/product').'/'.$item->image}}" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $item->category->name }}</p>
                        <h3 class="product-name"><a href="{{route('landing.product',['id'=>$item->id , 'slug'=>slug($item->name)])}}">{{$item->name}}</a></h3>
                            
                        <h4 class="product-price">
                                @if($item->price_offer)
                                 {{$item->price_offer}}	
                                 <del class="product-old-price">
                                    {{$item->price}}
                                 </del>
                                 @else
                                    {{$item->price}}
                                @endif
                                </h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>

                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    
                    @foreach ($products as $product)
                    <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <a href="{{ route('landing.product', $product->id) }}">
                                    <img src="{{asset('/admin_uploads/product').'/'.$product->image}}" style="width: 100%;" alt=""></a>
                                    <div class="product-label">
                                        @if ($product->discount_value)
                                            <span class="sale">
                                                {{$product->discount_value }}%
                                            </span>
                                        @endif

                                        @if ($product->product_new)
                                            <span class="new">
                                                New
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $product->category->name }}</p>
                                    <h3 class="product-name"><a href="{{route('landing.product', $product->id)}}">{{ $product->name }}</a></h3>
                                    <h4 class="product-price">
                                        @if ($product->price_offer)
                                            {{$product->price_offer}}
                                            <del class="product-old-price">
                                                {{$product->price}}
                                            </del>
                                        @else
                                            {{$product->price}}
                                        @endif
                                    </h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="add-to-cart" style="margin-top: 10px">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price_offer" value="{{$product->price_offer}}">
                                        <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- /product -->
                    @endforeach
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection

@extends('front-end.layouts.app')