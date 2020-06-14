@extends('back-end.layouts.app')

@section('title')
	 Colors
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Colors'])
@endcomponent	

<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Colors</h4>
                		  <p class="card-color">list of Colors</p>
                		</div>
                    <div class="col-md-4 text-right">
                      <a href="{{route('colors.create')}}" class="btn btn-white btn-round">Add New Color</a>
                    </div>
                	</div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table data-table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>
                          Color
                        </th>
                        <th>
                          Name
                        </th>
                        <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($colors as $color)
                        	<tr>
                          <td>{{$color->id}}</td>
                          <td>
                            <span class="badge" style="background-color: {{ $color->color }}; color: #FFF;">color</span>
                          </td>
                        	<td>{{$color->color_name}}</td>
                          <td class="td-actions text-right">
                             @include('back-end.colors.Buttons.edit')
                             @include('back-end.colors.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                    {!! $colors->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection
