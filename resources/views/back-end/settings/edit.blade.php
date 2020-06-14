@extends('back-end.layouts.app')

@section('title')
	 Setting
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Setting'])
@endcomponent	

<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit setting</h4>
                  <p class="card-setting">Complete setting</p>
                </div>
                <div class="card-body">
                  <form action="{{route('settings.update',['id' => $setting->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('site_name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Site name</label>
                          <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
                            <span class="text-danger">{{ $errors->has('site_name') ? $errors->first('site_name') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6"{{$errors->has('logo') ? 'has-error' : ''}}>
                        <div class="">
                          <label class="">Setting logo</label>
                          <input type="file" name="logo"><br>
                    		</div>
                  	   </div>

                  	    <div class="col-md-6" {{$errors->has('email') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="{{$setting->email}}">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                        </div>
					         </div>

                  	   <div class="col-md-6" {{$errors->has('phone') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">phone</label>
                          <input type="text" name="phone" class="form-control" value="{{$setting->phone}}">
                            <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6" {{$errors->has('loaction') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">loaction</label>
                          <input type="text" name="loaction" class="form-control"value="{{$setting->loaction}}">
                        </div>
                    </div>
                <div class="col-md-6" {{$errors->has('facebook_url') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">facebook</label>
                          <input type="text" name="facebook_url" class="form-control"value="{{$setting->facebook_url}}">
                        </div>
                    </div>
                          <div class="col-md-6" {{$errors->has('twitter_url') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">twitter</label>
                          <input type="text" name="twitter_url" class="form-control"value="{{$setting->twitter_url}}">
                        </div>
                    </div>

                        <div class="col-md-6" {{$errors->has('instagram_url') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">instagram</label>
                          <input type="text" name="instagram_url" class="form-control"value="{{$setting->instagram_url}}">
                        </div>
                    </div>

                    <div class="col-md-12" >
                    <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">About Us</label>
                          <textarea cols="30" rows="5" name ="about_us" class="form-control">{{$setting->about_us}}</textarea>
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
