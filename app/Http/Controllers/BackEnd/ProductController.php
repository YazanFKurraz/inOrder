<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\backend\Product\Store;
use App\Http\Requests\backend\Product\Update;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\CommentTrait;

class ProductController extends Controller
{

    use CommentTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('back-end.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        
        return view('back-end.products.create',compact('categories','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $admin_id = Auth::guard('admin')->user()->id;
        $file  = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin_uploads/product') , $fileName);

        $request['product_new']     = $request['product_new'] ? 1 : 0;
        $request['start_offer_at']  = date('Y/m/d H:i:s');
        $request['end_offer_at']    = date('Y/m/d H:i:s');
        $requstArray =['admin_id'=> $admin_id, 'image' => $fileName] + $request->all();

        $product = Product::create($requstArray);
         if (isset($requstArray['sizes']) && !empty($requstArray['sizes'])){
            $product->sizes()->sync($requstArray['sizes']);
        }
        if (isset($requstArray['colors']) && !empty($requstArray['colors'])){
            $product->colors()->sync($requstArray['colors']);
        }

        if($product) {
        alert()->success('Product Added Successfully','Done');
        return redirect()->route('products.index');
        
        }else{
        alert()->error('That is error','Error');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        $comments = $product->comments()->orderBy('id','desc')->with('admin')->get();
        return view('back-end.products.edit',compact('product','colors','sizes','categories','comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $product = Product::findOrFail($id);
        $requstArray = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
            if(File::exists(public_path('admin_uploads/product/') . $product->image)){
                File::delete(public_path('admin_uploads/product/') .  $product->image);
            }                
            $file->move(public_path('admin_uploads/product') , $fileName);
            $requstArray = ['image' => $fileName] + $requstArray; 
        }

        $request['start_offer_at']   = date('Y/m/d H:i:s');
        $request['end_offer_at']   = date('Y/m/d H:i:s');
        $requstArray['product_new'] = isset($requstArray['product_new']) ? 1 : 0;
        // dd($requstArray);
        $product->Update($requstArray);
        if (isset($requstArray['colors']) && !empty($requstArray['colors'])){
                $product->colors()->sync($requstArray['colors']);
            }   

        if (isset($requstArray['sizes']) && !empty($requstArray['sizes'])){
                $product->sizes()->sync($requstArray['sizes']);
            }

       alert()->success('product Updated Successfully','Done');

        return redirect()->route('products.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
         if(File::exists(public_path('admin_uploads/product/') . $product->image)){
            File::delete(public_path('admin_uploads/product/') .  $product->image);
        }
        //delete the product comment before deleting the video   
        $productComment = Comment::where('product_id',"=",$product->id);
        if($productComment != null)
            $productComment->delete();
        $product->delete();
        alert()->success('Product deleted Successfully','Done');
        return redirect()->route('products.index');
         
    }
}
