@extends('back-end.layouts.app')


@section('title')
Messages
@endsection

@section('content')

@component('back-end.layouts.header',['nav_title' => 'Edit Message'])
@endcomponent

<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Messages</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" class="form-control" value="{{$message->name}}">
                        </div>
                      </div>

                  	    <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="{{$message->email}}">
                        </div>
					         </div>

                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Message</label>
                          <textarea class="form-control" name="message" >{{ $message->message }}</textarea>
                        </div>
                    </div>
                </div>
                  <hr>
          <h4>Replay on Message</h4>
          <br>
          <form action="{{route('message.replay',['id'=>$message->id])}}" method="post">
            @csrf
            <div class="col-md-12" >
                    <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Message</label>
                          <textarea cols="30" rows="5" name ="message" class="form-control"></textarea>
                   </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Replay</button>
                  <div class="clearfix"></div>
          </form>        
              </div>
            </div>
           </div>
          </div>

                </div>
              </div>
              
            </div>
           
@endsection