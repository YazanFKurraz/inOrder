@include('front-end.layouts.header')	
	
@if(session()->has('error'))
<div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
@yield('content')
		
@include('front-end.layouts.signUp')

@include('front-end.layouts.footer')

	
