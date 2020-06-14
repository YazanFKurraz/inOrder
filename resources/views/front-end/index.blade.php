@extends('layouts.app')

@section('content')

<div class="section">

	<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
<!-- shop -->
@foreach($categories->take(100) as $category)
<div class="col-md-4 col-xs-6">
	<div class="shop">
		<div class="shop-img">
			<img src="{{asset('/admin_uploads/category').'/'.$category->image}}" alt="">
		</div>
		<div class="shop-body">
			<h3>{{$category->name}}</h3>
			<a href="{{route('product.category',['id'=>$category->id, 'slug'=>slug($category->name)])}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
@endforeach
<!-- /shop -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
	<!-- row -->
	<div class="row">

		<!-- section title -->
		<div class="col-md-12">
			<div class="section-title">
				<h3 class="title">New Products</h3>
				<div class="section-nav">
					
				</div>
			</div>
		</div>
	
<div class="col-md-12">
<div class="row">
@foreach($products as $product)	
<div class="col-md-3">
<!-- product -->
	<div class="product">
		<div class="product-img">
			<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			<div class="product-label">
				@if($product->discount_value)
				<span class="sale">{{$product->discount_value }}%
				</span>
			@endif

			@if($product->product_new == true)
				<span class="new">
					New
					@endif
				</span>
			</div>
	</div>
	<div class="product-body">
		<p class="product-category">
			@if(empty($product->category->name))
		<span style="color: red">Product dosn't have Category</span> 
		@else
		{{$product->category->name}}
		@endif
		</p>
		<h3 class="product-name">
			<a href="{{ route('landing.product',['id'=>$product->id,'slug'=>slug($product->name)]) }}">
			{{$product->name}}
		</a></h3>

		<h4 class="product-price">
			@if($product->price_offer)
				{{ $product->price_offer }}
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
		<div class="product-btns">
			<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
		</div>
	</div>
		<div class="add-to-cart">
			<form action="{{route('cart.store')}}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{$product->id}}">
				<input type="hidden" name="name" value="{{$product->name}}">
				<input type="hidden" name="price_offer" value="{{$product->price_offer}}">
				<input type="hidden" name="price" value="{{$product->price}}">
			<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
			</form>
		  </div>
		</div>
<!-- /product -->

<div id="slick-nav-1" class="products-slick-nav"></div>
</div>
@endforeach
</div>
					<!-- Products tab & slick -->
					</div>
				<!-- /row -->
				</div>
			<!-- /container -->
			</div>
		</div>
</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
<div class="col-md-12">
	<div class="row">
			@foreach($topSilling as $product)
		 <div class="col-md-3">
			<div class="product">
				<div class="product-img">
					<img src="{{asset('/admin_uploads/product').'/'.$product->image}}">
					<div class="product-label">
						@if($product->discount_value)
						<span class="sale">
							{{ $product->discount_value }}%
						</span>
						 @endif

						 @if($product->product_new)
						<span class="new">
							New
						</span>
						 @endif
					</div>
				</div>
				<div class="product-body">
					<p class="product-category">
							@if(empty($product->category->name))
							<span style="color: red">Product dosn't have Category</span> 
							@else
							{{$product->category->name}}
							@endif
					</p>
					<h3 class="product-name"><a href="{{route('landing.product',['id'=>$product->id,'slug'=>slug($product->name) ])}}">
						{{$product->name}}
					</a></h3>
					<h4 class="product-price">
						@if($product->price_offer)
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
					<div class="product-btns">
						<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
					</div>
				</div>
				<div class="add-to-cart">
					<form action="{{route('cart.store')}}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{$product->id}}">
				<input type="hidden" name="name" value="{{$product->name}}">
				<input type="hidden" name="price_offer" value="{{$product->price_offer}}">
				<input type="hidden" name="price" value="{{$product->price}}">
		     	<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
					</form>
				 </div>
              </div>
	    	</div>	
			    @endforeach	
				</div>
			  </div>
			</div>
			<!-- /Products tab & slick -->
			</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</div>
		<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row">
        <!-- section title -->
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">Top Rating</h3>
            </div>
        </div>
        <!-- /section title -->
    </div>

    <div class="row">

        @foreach ($topSilling as $product)
            <div class="col-md-3">
                <!-- product -->
                <div class="product">
                    <div class="product-img">
                        <a href=""><img src="{{asset('/admin_uploads/product').'/'.$product->image}}" style="width: 100%;" alt=""></a>
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
                        <p class="product-category">
								@if(empty($product->category->name))
								<span style="color: red">Product dosn't have Category</span> 
								@else
								{{$product->category->name}}
								@endif
						</p>
                        <h3 class="product-name"><a href="">{{ $product->name }}</a></h3>
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
                    <div class="add-to-cart">
				<form action="{{route('cart.store')}}" method="post">
					@csrf
					<input type="hidden" name="id" value="{{$product->id}}">
					<input type="hidden" name="name" value="{{$product->name}}">
					<input type="hidden" name="price_offer" value="{{$product->price_offer}}">
					<input type="hidden" name="price" value="{{$product->price}}">
				       <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
				</form>
			  </div>
            </div>	
                <!-- /product -->
            </div>
        @endforeach
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
@endsection
@include('front-end.layouts.app')
