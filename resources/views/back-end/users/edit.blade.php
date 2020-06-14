@extends('back-end.layouts.app')

@section('title')
	 User
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit User'])
@endcomponent	

<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit user</h4>
                  <p class="card-setting">Complete user</p>
                </div>
                <div class="card-body">
                  <form action="{{route('users.update',['id' => $user->id])}}" method="post" >
                    @csrf
                    {{method_field('put')}}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">User name</label>
                          <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>

                  	    <div class="col-md-6" {{$errors->has('email') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                               </div>
                             </div>
                             
                        <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">password</label>
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
