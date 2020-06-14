@extends('back-end.layouts.app')

@section('title')
	 Products
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Products'])
@endcomponent	

<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Product</h4>
                		  <p class="card-category">List of Product</p>
                		</div>
                      <div class="col-md-4 text-right">
                      <a href="{{route('products.create')}}" class="btn btn-white btn-round">Add New Product</a>
                    </div>
                	</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>
                          Name
                        </th>
                          <th>
                          price
                        </th>
                          <th>
                        price offer
                        </th>
                        <th>
                         Quantity
                        </th>
                        <th>
                        details
                        </th>
                         <th>
                        description
                        </th>
                          <th>
                        Category
                        </th>
                        <th>
                        Created by
                        </th>
                        <th>
                        image
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        	<tr>
                        	  <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->price_offer}}%</td>
                            <td>{{$product->quantity}}</td>
                            <td>{!!str_limit($product->details,10,'...')!!}</td>
                            <td>{!!str_limit($product->description,10,'...')!!}</td>
                            <td>
                              @if(empty($product->category->name))
                             <span style="color: red">No Category Selected</span> 
                              @else
                              {{$product->category->name}}
                              @endif
                            </td>
                            <td>{{$product->admin->name}}</td>
                           <td><img 
                            src="{{url('admin_uploads/product/').'/'.$product->image}}"
                              alt="" class="img-thumbnail"
                             style="width: 100px"></td>
	                        <td class="td-actions text-right">
                             @include('back-end.products.Buttons.edit')
                             @include('back-end.products.Buttons.delete')
                          </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $products->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection
