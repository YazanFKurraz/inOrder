@extends('back-end.layouts.app')

@section('title')
	 Setting
@endsection	

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Setting'])
@endcomponent	

<div class="row">
		       <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                	
                  <div class="row">
                		<div class="col-md-8">
                			<h4 class="card-title ">Setting</h4>
                		  <p class="card-category">Setting</p>
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
                        email
                        </th>
                          <th>
                        Facebook
                        </th>
                        <th>
                        phone
                        </th>
                        <th>
                        loaction
                        </th>
                         <th>
                        About
                        </th>
                          <th>
                        Logo
                        </th>
                          <th class="text-right">
                          Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($settings as $setting)
                        	<tr>
                        	<td>{{$setting->id}}</td>
                            <td>{{$setting->site_name}}</td>
                            <td>{{$setting->email}}</td>
                            <td>{{$setting->facebook_url}}</td>
                            <td>{{$setting->phone}}</td>
                            <td>{{$setting->loaction}}</td>
                           <td>{!!str_limit($setting->about_us,10,'...')!!}</td>

                            <td><img 
                              src="{{url('siteLogo/').'/'.$setting->logo}}"
                              alt="" class="img-thumbnail"
                             style="width: 100px"></td>
	                        <td class="td-actions text-right">
                            	  @include('back-end.settings.Buttons.edit')
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
	     </div>

@endsection
