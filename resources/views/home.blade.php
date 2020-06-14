
@section('content')

@if($products->count() < request()->has('search') && request()->get('search'))

<div class="container">
				<div class="row" style="padding-top: 30px;">
					<div class="alert alert-danger">
					<ul class="breadcrumb-tree" style=" text-align: center;">
							<li><a><span style="color:red;"> No Result</a></li>
						</ul>
					</div>
				</div>
			</div>
            @else
<div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>Latest Products</h2>
            	@if(request()->has('search') && request()->get('search')  != '')
            		<p style="margin-top: 10px">
            			Search Results <b style="color: red">{{ request()->get('search') }}</b> | <a href="{{route('landing.index')}}">Reset</a>
            		</p>
            	@endif
            </div>    
            <div class="row">
        @foreach($products as $product)
  <div class="col-md-3">
<!-- product -->
<div class="product">
	<div class="product-img">
		<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
		<div class="product-label">
			@if($product->discount_value)
			<span class="sale">{{$product->discount_value }}%			</span>
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
			<a href="{{ route('landing.product',['id'=>$product->id]) }}">
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
            </div>
          @endforeach       
        </div>
     </div>
  </div>
  @endif
@endsection
@include('front-end.layouts.app')
