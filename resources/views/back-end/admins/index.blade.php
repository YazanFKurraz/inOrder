@extends('back-end.layouts.app')

@section('title')
   Admin
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Admin'])
@endcomponent	


<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Admin</h4>
                		  <p class="card-category"> List of Admin</p>
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{route('admins.create')}}" class="btn btn-white btn-round">Add New Admin</a>
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
                          Email
                        </th>
                        <th>
                          Phone
                        </th>
                          <th>
                        Image
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($admins as $admin)
                        	<tr>
                        	<td>{{$admin->id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->phone}}</td>
                            <td><img 
                              src="{{url('/admin_uploads/admin_image').'/'.$admin->image}}"
                              alt="" class="img-thumbnail"
                             style="width: 100px"></td>
	                        <td class="td-actions text-right">
	                        	 @include('back-end.admins.Buttons.edit')
	                           @include('back-end.admins.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                      {!!  $admins->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection

