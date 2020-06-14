<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>InOrder</title>

<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}"/>

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{asset('website/css/slick.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('website/css/slick-theme.css')}}"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{asset('website/css/nouislider.min.css')}}"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="{{asset('website/css/font-awesome.min.css')}}">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{asset('website/css/style.css')}}"/>




</head>

<body>   
<header>
<!-- TOP HEADER -->
<div id="top-header">
<div class="container">
<ul class="header-links pull-left">
	<li><a href="#"><i class="fa fa-phone"></i>{{$settings->phone}}</a></li>
	<li><a href="#"><i class="fa fa-envelope-o"></i>{{$settings->email}}</a></li>
	<li><a href="#"><i class="fa fa-map-marker"></i>{{$settings->loaction}}</a></li>
</ul>
<ul class="header-links pull-right">
<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>


	@guest
	<li><a href="{{route('userLogin')}}"><i class="fa fa-user-o"></i>login</a></li>
	<li><a href="{{route('userRegiater')}}"><i class="fa fa-user-o"></i>Register</a></li>
	@else
	<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" title ="Your Profile" href="{{route('front.profile',['id'=> auth()->user()->id ,'slug'=>slug(auth()->user()->name)])}}"
		 >
		{{ Auth::user()->name }}
	</a>
	
</li>

<li class="nav-item dropdown">
	<a class="fa fa-share-square-o" title ="Logout" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			{{ __('Logout')  }}
	</a>
					<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
</li>
@endguest
						
</ul>
</div>
</div>
<!-- /TOP HEADER -->

<!-- MAIN HEADER -->
<div id="header">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
	<!-- LOGO -->
	<div class="col-md-3">
		<div class="header-logo">
			<a href="{{route('landing.index')}}" class="logo">
				<img src="{{asset('website/img/logo.png')}}" alt="">
			</a>
		</div>
	</div>
	<!-- /LOGO -->

	<!-- SEARCH BAR -->
	<div class="col-md-6">
		<div class="header-search">
			<form class="form-inline ml-auto" action="{{route('home')}}">
				<input class="input" name="search" placeholder="Search here">
				<button class="search-btn">Search</button>
			</form>
		</div>
	</div>
	<!-- /SEARCH BAR -->

	<!-- ACCOUNT -->
	<div class="col-md-3 clearfix">
		<div class="header-ctn">
			<!-- Wishlist -->
			<div>
				<a href="#">
					<i class="fa fa-heart-o"></i>
					<span>Your Wishlist</span>
					<div class="qty">2</div>
				</a>
			</div>
			<!-- /Wishlist -->

			<!-- Cart -->
	<div class="dropdown">
		<a href="{{ route('cart.index') }}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
			<i class="fa fa-shopping-cart"></i>
			<span>Your Cart</span>
			@if (Cart::count() > 0)
				<div class="qty">{{Cart::count()}}</div>
			@endif
		</a>
	<div class="cart-dropdown">
		<div class="cart-list">
			@if (Cart::count() > 0)
			@foreach (Cart::content() as $item)
			<div class="product-widget">
				<div class="product-img">
					<img src="{{asset('/admin_uploads/product').'/'.$item->model->image}}"  alt="">
				</div>
				<div class="product-body">
					<h3 class="product-name"><a href="#">{{ $item->model->name }} ( {{ $item->qty }}× )</a></h3>
					<h4 class="product-price">{{ $item->model->price_offer }}</h4>
				</div><a href="{{route('cart.destroy', $item->rowId)}}"></a>
				<button class="delete"><i class="fa fa-close"></i></button>
			</div>
			@endforeach
			@endif
			</div>
		<div class="cart-summary">
			@if (Cart::count() > 0)
				<small>{{ Cart::count() }} Item(s) selected</small>	
				<h5>SUBTOTAL: {{ Cart::total() }}</h5>
			@else
				<h5>No Item In Cart</h5>
			@endif
		</div>
		<div class="cart-btns">
			<a href="#">View Cart</a>
			<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
			<!-- /Cart -->

			<!-- Menu Toogle -->
			<div class="menu-toggle">
				<a href="#">
					<i class="fa fa-bars"></i>
					<span>Menu</span>
				</a>
			</div>
			<!-- /Menu Toogle -->
		</div>
	</div>
	<!-- /ACCOUNT -->
</div>
<!-- row -->
</div>
<!-- container -->
</div>
<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
<!-- container -->
<div class="container">
<!-- responsive-nav -->
<div id="responsive-nav">
<!-- NAV -->

<div class="dropdown">
	<button type="button" class="btn btn-danger  btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<a href="{{route('landing.index')}}">MENU</a>
</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		@foreach($categories as $category)	
	  <a class="dropdown-item" href="{{route('product.category',['id'=>$category->id , 'slug'=>slug($category->name)])}}">{{$category->name}}
		@endforeach
	</div>
  </div>

<!-- /NAV -->
</div>
<!-- /responsive-nav -->
</div>
<!-- /container -->
</nav>

</body>