<div class="col-md-8">
  <div class="card">
    <div class="card-header card-header-primary">
      <div class="row">
        <div class="col-md-8">
          <h4 class="card-title ">Comments</h4>
          <p class="card-category"> List of Comments</p>
        </div>
      </div>
    </div>
<table class="table" id="comments">
            <tbody>
                  @foreach($comments as $comment)
                  <tr>
                    <td>{{ $comment->id }}</td>
                    <td>
                      <small>
                		<i class="fa fa-comments"></i>
                      {{ $comment->user->name }}
                      </small>
                      <p>{{ $comment->comment }}</p>
                      <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </td>
                <td class="td-actions text-right">
                  <button type="button" rel="tooltip"
                  onclick="$('#commentcard').slideToggle()"
                    class="btn btn-dark btn-link btn-sm" 
                    data-original-title="Edit Comment">
                    <i class="material-icons">edit</i>
                  </button>
                <form id="delete-form-{{$comment->id }}" method="post" action="{{route('comment.destroy',$comment->id)}}"   style="display: none">
                                  {{csrf_field()}}
                                {{method_field('DELETE')}}
                              </form>
                                <a href="" onclick="if(confirm('Are You Sure, you want to delete ?')){
                                        event.preventDefault();
                                document.getElementById('delete-form-{{$comment->id }}').submit();
                                        }
                                else{
                                    event.preventDefault();
                                }"><button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Remove Comment">
                    <i class="material-icons">close</i>
                  </button></a>
                </td>
              </tr>
<tr style="display: none;" id="commentcard">
<td colspan="4">

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
  <form action="{{route('comment.update',['id' => $comment->id]) }}" method="post">
        @csrf
    <input type="hidden" value="{{$product->id}}" name="product_id">
        <div class="col-md-12">
        <div class="form-group bmd-form-group">
          <textarea cols="5" rows="2" name ="comment" class="form-control">{{$comment->comment}}</textarea>
                  <span class="text-danger">{{ $errors->has('comment') ? $errors->first('comment') : ''}}</span>
              </div>
            </div>
        <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
        <div class="clearfix"></div>
      </form>
        </div>
      </div>
    </div>
  </div>
        </td>
      </tr>
        @endforeach
            </tbody>
          </table>
</div>
</div>
</div>
