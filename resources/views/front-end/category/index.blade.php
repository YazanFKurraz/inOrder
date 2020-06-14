@section('content')

<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{route('landing.index')}}">Home</a></li>
							<li><a >{{ $category->name }}</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

	@if($products->count() > 0)
<div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$category->name}}</h1>
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
			<span class="sale">{{$product->discount_value }}%</span>
		   @endif

		   @if($product->product_new == true)
			<span class="new">
				New
				@endif
			</span>
		</div>
	</div>
	<div class="product-body">
		<p class="product-category">{{$product->category->name}}</p>
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
    <div class="row">
         <div class="col-md-12">
                {{ $products->links() }}
            </div>
        </div>

     </div>
  </div>
	@else
	<div class="container">
				<!-- row -->
				<div class="row">
					<div class="alert alert-danger">
					<ul class="breadcrumb-tree" style=" text-align: center;">
							<li><a><span style="color:red">{{ $category->name }}</span> has no Product</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
  @endif
@endsection

@include('front-end.layouts.app')
