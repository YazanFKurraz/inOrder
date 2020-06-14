<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\backend\Comment\Store;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

trait CommentTrait{
    
    public function commentStore(Store $request)
    {	
        $requestArray = $request->all() + ['admin_id' => auth()->guard('admin')->user()->id];
        Comment::create($requestArray);
        
           alert()->success('Comment Add Successfully','Done');

        return redirect()->route('products.edit',['id' => $requestArray['product_id'],'#comments']);
    }


    public function destroyComment($id)
	{	
		$comment = Comment::FindOrFail($id);

    try {
    $comment = Comment::where('id',$id)->first();
  } catch (ModelNotFoundException $e) {
       alert()->error('Comment not Found','Error');
    return redirect()->back();
  }
  	$comment->delete();
    alert()->success('Comment Deleted Successfully','Done');
       
     return redirect()->route('products.edit',['id' => $comment->product_id , '#comments']);  
    }


    public function UpdateComment($id , Store $request)
	{	
		$comment = Comment::FindOrFail($id);
		$comment->update($request->all());	
       
       alert()->success('Comment Updated Successfully','Done');

        return redirect()->route('products.edit',['id' => $comment->product_id , '#comments']);  

	}
}