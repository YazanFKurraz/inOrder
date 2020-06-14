
@section('content')

	<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{route('landing.index')}}">Home</a></li>
							<li><a>
							@if(empty($product->category->name))	
								<span style="color: red">Product dosn't have Category</span> 
								@else
								{{ $product->category->name }}
								@endif	
							</a></li>
							<li class="active">{{$product->name}}</li>
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
		<!-- Product main img -->
		<div class="col-md-5 col-md-push-2">
			<div id="product-main-img">
				<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
				</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>
			</div>
		</div>
		<!-- /Product main img -->

		<!-- Product thumb imgs -->
	<div class="col-md-2  col-md-pull-5">
		<div id="product-imgs">
			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>
			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>

			<div class="product-preview">
				<img src="{{asset('/admin_uploads/product').'/'.$product->image}}" alt="">
			</div>
		</div>
	</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
		<div class="col-md-5">
			<div class="product-details">
				<h2 class="product-name">{{$product->name}}</h2>
				<div>
					<div class="product-rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<a class="review-link" >10 Review(s) | Add your review</a>
				</div>
				<div>
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
					
					<span class="product-available">{!! $stockLevel !!}</span>
				</div>
				<p>{!!  $product->details !!}</p>

				<div class="product-options">
					<label>
						Size
					<select name="sizes[]" class="form-control">
							@foreach($sizes as $size)
                  <option value="{{ $size->id }}"
				  @foreach($product->sizes as $productSize)
                         @if($productSize->id == $size->id)
                                    selected
                           @endif
                          @endforeach>{{ $size->size }}
                    </option>
                   @endforeach
              </select>
					</label>
					<label>
						Color
						<select name="colors[]" class="form-control ">
						@foreach($colors as $color)
                  <option value="{{ $color->id }}"
				   @foreach($product->colors as $productColor)
                         @if($productColor->id == $color->id)
                                    selected
                           @endif
                          @endforeach>{{ $color->color_name }}
                    </option>
                   @endforeach
						</select>
					</label>
				</div>
				@if ($product->quantity > 0)
							<div class="add-to-cart">
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{$product->id}}">
										<input type="hidden" name="name" value="{{$product->name}}">
										<input type="hidden" name="price_offer" value="{{$product->price_offer}}">
										<input type="hidden" name="price" value="{{$product->price}}">
										<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</form>
								</div>
							@endif
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="{{route('product.category',['id'=>$product->category->id ,'slug'=>slug($product->category->name)])}}">
								@if(empty($product->category->name))	
								<span style="color: red">Product dosn't have Category</span> 
								@else
								{{ $product->category->name }}
								@endif
								</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" >Description</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{$product->description}}</p>
										</div>
									</div>
								</div>
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
			<hr>
	<div class="row" id="comments">
	<div class="col-md-12">
    	<div class="card text-left">
			<div class="card-header card-header-rose">
			@php $comments = $product->comments @endphp
			<h5>Comments ({{count($comments)}})</h5>
			</div>
			<div class="card-body">
			@foreach($comments as $comment)
				<div class="row">
				<div class="col-md-8">
					<i class="nc-icon nc-chat-33"></i> 
					
		<i class="fa fa-comments"></i>
		@if(empty($comment->user->name))
		<del> InOrder User</del>
		@else
		<a href="{{route('front.profile',['id'=>$comment->user->id , 'slug'=>slug($comment->user->name)])}}">
		{{ $comment->user->name }}
		@endif
	</a>

	</div>
	<div class="col-md-4 text-right">
	<span> <i class="nc-icon nc-calendar-60"></i> {{ $comment->created_at->diffForHumans() }} |</span>
	
	</div>
	</div>
		<li>{{$comment->comment}}</li>
		@if(auth()->user()) 
			@if(auth()->user()->id == $comment->user->id)
		<a href="" onclick="$(this).next('div').slideToggle(2000);return false;">Edit</a>
		@endif       

		<div style="display: none;">
		<form action="{{route('front.comment.update',['id' => $comment->id])}}" method="post">
			@csrf
			{{csrf_field()}}
			<div class="form-group">
			<textarea name="comment" rows="4" class="form-control">{{$comment->comment}}</textarea>
			</div>
			<button type="submit" class="primary-btn cta-btn">Edit</button>
		</form>
		</div>
			@endif

		@if(!$loop->last)
			<hr>
		@endif
		@endforeach
			</div>
		</div>          			
        </div>
	  </div><br>
	  @if(auth()->user())	
	  <form action="{{route('front.commentStore',['id' => $product->id])}}" method="post">
			@csrf
			{{csrf_field()}}
			<div class="form-group">
			<label for="comment">Add Comment</label>
			<textarea name="comment" rows="4" class="form-control"></textarea>
			<span class="text-danger">{{ $errors->has('comment') ? $errors->first('comment') : ''}}</span>
			</div>
			<button type="submit" class="primary-btn cta-btn">Add Comment</button>
	  </form>
	  @endif
	</div>

</div>
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
						@guest
						<p>Sign in to add Comment </strong></p>
						<a class="primary-btn cta-btn" 
						href="{{route('userLogin')}}" style="margin-bottom:10px;">Sign In now</a>
						@else
						@endguest	
						</div>
					</div>
				<!-- /row -->

		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
			@foreach($relatedProduct as $relatedproduct)
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{asset('/admin_uploads/product').'/'.$relatedproduct->image}}" alt="">
						<div class="product-label">
							@if($relatedproduct->discount_value)
							<span class="sale">
								{{ $relatedproduct->discount_value }}%
							</span>
							@endif	
						@if($relatedproduct->product_new == true)
							<span class="new">
								New
								@endif
							</span>
						</div>
					</div>
					<div class="product-body">
						<p class="product-category">
						@if(empty($relatedproduct->category->name))
						<span style="color: red">Product dosn't have Category</span> 
							@else
							{{$relatedproduct->category->name}}
							@endif	
						</p>
						<h3 class="product-name"><a href="#">{{$relatedproduct->name}}</a></h3>
					
				<h4 class="product-price">
							@if($relatedproduct->price_offer)
							{{$relatedproduct->price_offer}}	
						<del class="product-old-price">
								{{$relatedproduct->price}}
						</del>
							@else
								{{$relatedproduct->price}}
							@endif
				</h4>
						<div class="product-rating">
						</div>
						<div class="product-btns">
							<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
						</div>
					</div>
					<div class="add-to-cart">
									<form action="{{ route('cart.store') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{$relatedproduct->id}}">
										<input type="hidden" name="name" value="{{$relatedproduct->name}}">
										<input type="hidden" name="price_offer" value="{{$relatedproduct->price_offer}}">
										<input type="hidden" name="price" value="{{$relatedproduct->price}}">
										<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</form>
								</div>
				</div>
			</div>

					<div class="clearfix visible-sm visible-xs"></div>

				@endforeach	
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>


@endsection

@include('front-end.layouts.app')
