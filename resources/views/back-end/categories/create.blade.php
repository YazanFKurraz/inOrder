@extends('back-end.layouts.app')

@section('title')
	Create Category
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Create Category'])
@endcomponent	

	<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Category</h4>
                  <p class="card-category">Add new Category</p>
                </div>
                <div class="card-body">
                  <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6"{{$errors->has('image') ? 'has-error' : ''}}>
                        <div class="">
                          <label class="">Category image</label>
                          <input type="file" name="image"><br>
                          <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
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