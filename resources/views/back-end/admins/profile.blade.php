@extends('back-end.layouts.app')

@section('title')
Admin Profile
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Profile'])
@endcomponent

 @if(auth()->user() && $admin->id == auth()->user()->id )
  <div class="row">
     <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Admin</h4>
                  <p class="card-admin">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="{{route('profile.update',['id' => $admin->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Admin Name</label>
                          <input type="text" name="name" class="form-control" value="{{$admin->name}}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6"{{$errors->has('image') ? 'has-error' : ''}}>
                        <div class="">
                          <label class="">Admin image</label>
                          <input type="file" name="image"><br>
                    		</div>
                  	   </div><br>

                  	    <div class="col-md-6" {{$errors->has('email') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="{{$admin->email}}">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
					         </div>

                  	   <div class="col-md-6" {{$errors->has('phone') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">phone</label>
                          <input type="text" name="phone" class="form-control" value="{{$admin->phone}}">
                            <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6" {{$errors->has('password') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </div>
               
                    <button type="submit" class="btn btn-primary pull-left">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

   <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a>
                    <img class="img" src="{{url('/admin_uploads/admin_image').'/'.$admin->image}}">
                  </a>
                </div>
                <div class="card-body">
                  <i class="material-icons">library_books</i>
                  <h6 class="card-category text-gray">{{$admin->name}}</h6>
                  <i class="material-icons">person</i>
                  <h4 class="card-title">{{$admin->email}}</h4>
                  <i class="material-icons">phone</i>
                  <h4 class="card-title">{{$admin->phone}}</h4>
                </div>
              </div>
        </div>
     </div>
     @else
     <div class="text-center">
     	
     <p style="text-align: center;color: red;margin: 80px">Sorry ,You don't have permission :)
     </p>
     <img src="{{asset('assets/whoops.jpg')}}" width="500px" style="text-align: center;">
     </div>
   @endif

@endsection