@extends('back-end.layouts.app')

@section('title')
   Users
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Users'])
@endcomponent	


<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Users</h4>
                		  <p class="card-category"> List of Users</p>
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
                        Registration at
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        	<tr>
                        	<td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
	                        <td class="td-actions text-right">
	                           @include('back-end.users.Buttons.edit')
	                           @include('back-end.users.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                      {!!  $users->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection

