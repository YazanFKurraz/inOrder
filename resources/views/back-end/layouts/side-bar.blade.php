 <div class="sidebar" data-color="purple" data-background-color="white">
    
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          InOrder
         
        </a>
        <a href="">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  {{ is_active('home') }} ">
            <a class="nav-link" href="{{route('dashboard.index')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
           <li class="nav-item  {{ is_active('categories') }} ">
            <a class="nav-link" href="{{route('categories.index')}}">
              <i class="material-icons">category</i>
              <p>Categories <span class="badge badge-danger">{{\App\Models\Category::count()}}</span></p>
            </a>
          </li>
           <li class="nav-item  {{ is_active('products') }} ">
            <a class="nav-link" href="{{route('products.index')}}">
              <i class="material-icons">category</i>
              <p>Products <span class="badge badge-danger">{{\App\Models\Product::count()}}</span></p>
            </a>
          </li>
           <li class="nav-item  {{ is_active('all') }} ">
            <a class="nav-link" href="{{route('admins.index')}}">
              <i class="material-icons">person</i>
              <p>Admins <span class="badge badge-danger">{{\App\Models\Admin::count()}}</span></p>
            </a>
          </li>
          <li class="nav-item  {{ is_active('sizes') }} ">
            <a class="nav-link" href="{{route('sizes.index')}}">
              <i class="material-icons">list</i>
              <p>Sizes</p>
            </a>
          </li>
           <li class="nav-item  {{ is_active('colors') }} ">
            <a class="nav-link" href="{{route('colors.index')}}">
              <i class="material-icons">list</i>
              <p>Colors</p>
            </a>
          </li>
            <li class="nav-item  {{ is_active('brands') }} ">
            <a class="nav-link" href="{{route('brands.index')}}">
              <i class="material-icons">library_books</i>
              <p>Brands</p>
            </a>
          </li>
          <li class="nav-item  {{ is_active('settings') }} ">
            <a class="nav-link" href="{{route('settings.index')}}">
              <i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
          </li>

          <li class="nav-item  {{ is_active('messages') }} ">
            <a class="nav-link" href="{{route('messages.index')}}">
              <i class="material-icons">messages</i>
              <p>messages <span class="badge badge-danger">{{\App\Models\Message::count()}}</span></p>
            </a>
          </li>

          
          <li class="nav-item  {{ is_active('users') }} ">
            <a class="nav-link" href="{{route('users.index')}}">
              <i class="material-icons">person</i>
              <p>users <span class="badge badge-danger">{{\App\Models\User::count()}}</span></p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>