
        <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i class="material-icons">store</i>
                </div>
                <p class="card-category">Product</p>
                <h3 class="card-title"><span class="badge badge-danger">{{\App\Models\Product::count()}}</span>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="{{route('products.index')}}">Products</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="material-icons">category</i>
                </div>
                <p class="card-category">Categories</p>
                <h3 class="card-title"><span class="badge badge-danger">{{\App\Models\Category::count()}}</span></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <a href="{{route('categories.index')}}">categories</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                <i class="material-icons">messages</i>
                </div>
                <p class="card-category">Messages</p>
                <h3 class="card-title"><span class="badge badge-danger">{{\App\Models\Message::count()}}</span></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <a href="{{route('messages.index')}}">Messages</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <i class="fa fa-twitter"></i>
                </div>
                <p class="card-category">Followers</p>
                <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">update</i> Just Updated
                </div>
            </div>
            </div>
        </div>
        </div>


        <div class="row">
            <div class="col-lg">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Messages</h4>
                  <p class="card-category">Letest Messages</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th class="td-actions text-right">Action</th>
                    </tr></thead>
                    <tbody>
                      @foreach($messages as $message)
                      <tr>
                        <td>{{$message->id}}</td>
                        <td>
                         {{ $message->name }}
                          </a>
                        </td>
                        <td>{{$message->email}}</td>
                       
                        <td>{{$message->message}}</td>
                        
                        <td>{{$message->created_at}}</td>
                        
                        <td class="td-actions text-right">
                        @include('back-end.messages.Buttons.delete')
                        @include('back-end.messages.Buttons.edit')
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {!! $messages->links() !!}
                </div>
              </div>
            </div>
           </div>