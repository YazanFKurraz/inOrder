@extends('back-end.layouts.app')

@section('title')
	Edit Size
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Size'])
@endcomponent	

	<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Size</h4>
                </div>
                <div class="card-body">
                <form action="{{route('sizes.update',['id' => $size->id])}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('size') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Size</label>
                          <input type="text" name="size" class="form-control" value="{{$size->size}}">
                            <span class="text-danger">{{ $errors->has('size') ? $errors->first('size') : ''}}</span>
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