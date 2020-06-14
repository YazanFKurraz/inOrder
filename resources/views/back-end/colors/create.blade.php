@extends('back-end.layouts.app')

@section('title')
	Create Color
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Color'])
@endcomponent	

	<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Color</h4>
                  <p class="card-Color">Add new Color</p>
                </div>
                <div class="card-body">
                  <form action="{{route('colors.store')}}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6" {{$errors->has('color') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">color</label>
                          <input type="color" name="color" class="form-control" value="{{ old('color') }}">
                            <span class="text-danger">{{ $errors->has('color') ? $errors->first('color') : ''}}</span>
                        </div>
                      </div>
                      <div class="col-md-6" {{$errors->has('color_name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">name</label>
                          <input type="text" name="color_name" class="form-control" value="{{ old('color_name') }}">
                            <span class="text-danger">{{ $errors->has('color_name') ? $errors->first('color_name') : ''}}</span>
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