@extends('back-end.layouts.app')

@section('title')
   Messages
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Message'])
@endcomponent	


<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Messages</h4>
                		  <p class="card-category"> List of Messages</p>
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
                        Message
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($messages as $message)
                        	<tr>
                        	<td>{{$message->id}}</td>
                            <td>{{$message->name}}</td>
                            <td>{{$message->email}}</td>
                            <td>{{$message->message}}</td>
	                        <td class="td-actions text-right">
	                           @include('back-end.messages.Buttons.edit')
	                           @include('back-end.messages.Buttons.delete')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                      {!!  $messages->links() !!}
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection

