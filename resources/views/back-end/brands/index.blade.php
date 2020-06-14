@extends('back-end.layouts.app')

@section('title')
   Brands
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Brands'])
@endcomponent	


<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Brands</h4>
                		  <p class="card-category"> List of Brands</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('brands.create')}}" class="btn btn-white btn-round">Add New Brand</a>
                		</div>
                	</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table data-table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>
                          Name
                        </th>
                          <th>
                        Image
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($brands as $brand)
                        	<tr>
                        	<td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td><img 
                              src="{{url('/admin_uploads/brand').'/'.$brand->brand_image}}"
                              alt="" class="img-thumbnail"
                             style="width: 100px"></td>
	                        <td class="td-actions text-right">
	                        	 @include('back-end.brands.Buttons.edit')
	                             @include('back-end.brands.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                      {!!  $brands->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection

