@section('content')
<div class="section profile-content" style="text-align: center;">
    <div class="container">
      <div class="owner">
        <div class="avatar">
              <img src="/website/img/clem-onojeghuo-3.jpg" alt="Circle Image" width="200px" style=" border-radius: 100px;
        margin-top: -100;">
        </div><br>
        <div class="name">
          <h4 class="title" style="margin-left: 70px;">{{$user->name}} <span class="label label-purple arrowed-in-right">
              <i class="ace-icon fa fa-circle smaller-80 align-middle" title="active" style="color: green"></i>
              online
            </span>
            <br>
          </h4>
          <h6 class="description">{{$user->email}}</h6>
        </div>
      </div>
      	@if(auth()->user() && $user->id == auth()->user()->id )
	      <br>
	      <div class="row">
	        <div class="text-center">
	          <br>
            <button class="primary-btn cta-btn" onclick="$('#profilecard').slideToggle(2000)"><i class="fa fa-cog"></i>Update Profile</button>
            </div>
	      </div>
		<br>
     @endif
     @include('front-end.profile.edit')	
	</div>
  </div>
@endsection
@include('front-end.layouts.app')