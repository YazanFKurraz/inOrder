 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">

            <a class="navbar-brand" href="">{{ $nav_title }}</a>

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
             <div class="top-menu" style="padding-right: 17px;">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" width="50px"
                                    style="border-radius: 50px" 
                                     class="img-circle" src="{{URL::asset('/admin_uploads/admin_image/'.Auth::user()->image)}}"/>
                                    <span class="username username-hide-on-mobile">{{ auth()->guard('admin')->check() ? auth()->user()->name : 'Account'}}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default" >
                                     <li>
                                 <a href="{{route('profile.index',['id'=> auth()->user()->id ,'slug'=>slug(auth()->user()->name)])}}">
                               <i class="material-icons">person</i>
                                         <span>Profile</span>
                                        </a>
                                      </li>
                                    <li>
                                        <a href="{{ url('admin/logout') }}" >
                                         <i class="material-icons">logout</i>
                                           <span>logout</span>  
                                         </a>
                                  </li>
                            </ul>
                        </ul>
                    </div>
          </div>
        </div>
      </nav>