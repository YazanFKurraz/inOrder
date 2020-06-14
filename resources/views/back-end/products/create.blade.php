@extends('back-end.layouts.app')

@section('title')
	Create Product
@endsection

@section('content')
@component('back-end.layouts.header',['nav_title' => 'Create Product'])
@endcomponent

<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Product</h4>
                  <p class="card-category">Add new Product</p>
                </div>
                <div class="card-body">
                  <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                       <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product Name</label>
                          <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>
                     <div class="col-md-6"{{$errors->has('image') ? 'has-error' : ''}}>
                        <div class="">
                          <label class="">Product image</label>
                          <input type="file" name="image"><br>
                          <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
                   		</div>
                     </div>
                  	<div class="col-md-4" {{$errors->has('quantity') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product quantity</label>
                          <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                            <span class="text-danger">{{ $errors->has('quantity') ? $errors->first('quantity') : ''}}</span>
                        </div>
                      </div>
                      <div class="col-md-4" {{$errors->has('price') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product price</label>
                          <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                            <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : ''}}</span>
                        </div>
                      </div>
                   <div class="col-md-4" {{$errors->has('price_offer') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Product price offer</label>
                          <input type="text" name="price_offer" class="form-control" value="{{ old('price_offer') }}">
                            <span class="text-danger">{{ $errors->has('price_offer') ? $errors->first('price_offer') : ''}}</span>
                        </div>
                      </div>
                       <div class="col-md-4" >
                		 <div class="form-check">
                                <label class="form-check-label">Product New
                                  <input class="form-check-input" type="checkbox"
                                   name="product_new" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                          </div>
                        <div class="col-md-4">
                         <div class="md-form">
                                <label class="form-check-label">Start Offer
			      			  <input placeholder="Selected date" name="start_offer_at" type="text" id="datepicker" class="form-control datepicker" value="{{ old('start_offer_at') }}">
							</div>
						  </div>
					<div class="col-md-4">
                       <div class="md-form">
                         <label class="form-check-label">End Offer
			   			  <input placeholder="Selected date" name="end_offer_at" type="text" id="datepicker1" class="form-control datepicker" value="{{ old('end_offer_at') }}">
						</div>
					</div>
					<div class="col-md-8" {{$errors->has('discount_value') ? 'has-error' : ''}}>
                <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Product discount</label>
                       <input type="number" name="discount_value" class="form-control" value="{{ old('discount_value') }}">
                            <span class="text-danger">{{ $errors->has('discount_value') ? $errors->first('discount_value') : ''}}</span>
                        </div>
                      </div>
					<div class="col-md-12">
				          <div class="form-group bmd-form-group">
				             <label class="">Category</label>
						     <select name="category_id" class="form-control {{$errors->has('category_id') ? 'has-error' : ''}}" value="{{ old('category_id') }}">
		                			 @foreach($categories as $category)
		                      <option value="{{$category->id}}" 
		                      	{{isset($products) && $products->category_id == $category->id ? 'selected' : ''}} >{{$category->name}}
		                       </option>
		                           @endforeach
		                     </select>
		                    <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
		                   </div>
		                  </div>
		           <div class="col-md-12">
			          <div class="form-group bmd-form-group">
			             <label >Product Size</label>
			              <select name="sizes[]" class="form-control {{$errors->has('sizes[]') ? 'has-error' : ''}}" multiple style="height: 100px;" >
			                 @foreach($sizes as $size)
			                <option value="{{$size->id}}">{{$size->size}}</option>
			                           @endforeach
			               </select>
			                 <span class="text-danger">{{ $errors->has('sizes[]') ? $errors->first('sizes[]') : ''}}</span>
			              </div>
			          </div>
			        <div class="col-md-12">
			          <div class="form-group bmd-form-group">
			             <label >Product Color</label>
			              <select name="colors[]" class="form-control {{$errors->has('colors[]') ? 'has-error' : ''}}" multiple style="height: 100px;" >
			                 @foreach($colors as $color)
			                <option value="{{$color->id}}" style="background-color: {{ $color->color }}; color: #FFF;"><span class="badge">
			                	{{ $color->color_name }}
			                </span>
			               </option>
			                 @endforeach
			               </select>
			                 <span class="text-danger">{{ $errors->has('colors[]') ? $errors->first('colors[]') : ''}}</span>
			              </div>
			          </div> 	
                     <div class="col-md-12" >
		                    <div class="form-group bmd-form-group">
		                          <label class="bmd-label-floating">details</label>
		                          <textarea cols="30" rows="5" name ="details" class="form-control" value="{{ old('details') }}"></textarea>
		                          <span class="text-danger">{{ $errors->has('details') ? $errors->first('details') : ''}}</span>
		                   </div>
                		  </div>
                	<div class="col-md-12" >
		              <div class="form-group bmd-form-group">
		                          <label class="bmd-label-floating">description</label>
		                          <textarea cols="30" rows="5" name ="description" class="form-control" value="{{ old('description') }}"></textarea>
		                          <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : ''}}</span>
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
