@extends('back-end.layouts.app')


@section('title')
Admin
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Admin'])
@endcomponent

<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Admin</h4>
                  <p class="card-admin">Edit Admin</p>
                </div>
                <div class="card-body">
                  <form action="{{route('admins.update',['id' => $admin->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}
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
                  	   </div>

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

@endsection