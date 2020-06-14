@extends('back-end.layouts.app')

@section('title')
	Create Brand
@endsection

@section('content')
@component('back-end.layouts.header',['nav_title' => 'Create Brand'])
@endcomponent

<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Brand</h4>
                  <p class="card-category">Add new Brand</p>
                </div>
                <div class="card-body">
                  <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Brand Name</label>
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6"{{$errors->has('brand_image') ? 'has-error' : ''}}>
                        <div class="">
                          <label class="">brand image</label>
                          <input type="file" name="brand_image"><br>
                          <span class="text-danger">{{ $errors->has('brand_image') ? $errors->first('brand_image') : ''}}</span>
                    		</div>
                  	   </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-left">Create</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>


@endsection