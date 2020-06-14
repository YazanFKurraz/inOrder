@extends('back-end.layouts.app')

@section('title')
	 Sizes
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Sizes'])
@endcomponent	

<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Sizes</h4>
                		  <p class="card-category">list of Sizes</p>
                		</div>
                    <div class="col-md-4 text-right">
                      <a href="{{route('sizes.create')}}" class="btn btn-white btn-round">Add New Size</a>
                    </div>
                	</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>
                          Size
                        </th>
                        <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($sizes as $size)
                        	<tr>
                        	<td>{{$size->id}}</td>
                          <td>{{$size->size}}</td>
                          <td class="td-actions text-right">
                             @include('back-end.sizes.Buttons.edit')
                               @include('back-end.sizes.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $sizes->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection
