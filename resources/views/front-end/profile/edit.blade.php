<div class="card text-left" id="profilecard" style="display: none;">
  <div class="card-header" >
        <h4 style="margin-top: 10px">Update Profile</h4>
  </div>
  <div class="card-body" >
   
      <form action="{{route('profile.update')}}" method="post">
        @csrf
        <div class="row">
             <div class="col-md-6" {{$errors->has('name') ? 'has-error' : ''}}>
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name ="name" class="form-control" value="{{$user->name}}">
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                      </div>

                      <div class="col-md-6" >
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name ="email" class="form-control" value="{{$user->email}}">
                      <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                   </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password"  name ="password" class="form-control">
                             <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ''}}</span>
                   </div>
                  </div>
               </div>
                  <button type="submit" class="primary-btn cta-btn">Update</button>
                    <div class="clearfix"></div>
      </form>
  </div>
</div>

