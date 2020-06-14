@extends('back-end.layouts.app')

@section('title')
  Edit Brand
@endsection 

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Brand'])
@endcomponent 
  
<div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Brand</h4>
                </div>
                <div class="card-body">
                <form method="post" action="{{route('brands.update',['id' => $brand->id])}}" enctype="multipart/form-data">
                  {{ method_field('PUT') }}
                  @csrf
                    <div class="row">
                  <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">brand Name</label>
                          <input type="text" name ="name" class="form-control" value="{{$brand->name}}">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>

                   <div class="col-md-6">
                        <div class="">
                          <label class="">Brand image</label>
                          <input type="file" name="brand_image">
                          <span class="text-danger">
                        </div>
                       </div>
                
                 </div>
                    <button type="submit" class="btn btn-primary pull-left">Update</button>
                    <div class="clearfix"></div>
                  </form>
              </div>

            </div>
           </div>
          </div>
@endsection
