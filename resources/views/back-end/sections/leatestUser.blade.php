<div class="row">
            <div class="col-lg">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">users</h4>
                  <p class="card-category">Letest users</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <tr><th>ID</th>
                      <th>UserName</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr></thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>
                          {{$user->name}}
                        </td>
                        <td>
                          {{$user->email}}
                        </td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>
                          <form id="delete-form-{{$user->id }}" method="post" action="{{route('users.destroy',['id'=> $user->id])}}" style="display: none">
                                             {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                         </form>
                                            <a href="" onclick="if(confirm('Are You Sure, you want to delete ?')){
                                                    event.preventDefault();
                                            document.getElementById('delete-form-{{$user->id }}').submit();
                                                    }
                                            else{
                                                event.preventDefault();
                                            }"><button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Remove Comment">
                                <i class="material-icons">close</i>
                              </button></a>
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {!! $users->links() !!}
                </div>
              </div>
            </div>
           
          </div>