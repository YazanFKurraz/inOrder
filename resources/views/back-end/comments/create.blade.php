<div class="row">
<div class="col-md-12">
      <div class="card">
      <div class="card-body">
      <form action="{{route('comment.store') }}" method="post">
      	@csrf
      	<input type="hidden" value="{{$product->id}}" name="product_id">
           <div class="col-md-12" {{$errors->has('comment') ? 'has-error' : ''}}>
               <div class="form-group bmd-form-group">
                 <label class="bmd-label-floating">Add Comment</label>
                 <textarea   cols="30" rows="5" name ="comment" class="form-control"></textarea>
                    <span class="text-danger">{{ $errors->has('comment') ? $errors->first('comment') : ''}}</span>
                  </div>
              </div>
          <button type="submit" class="btn btn-primary pull-right">Comment</button>
        <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>