<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\frontend\Comment\Store;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Size;
use App\Models\User;
use App\Models\Message;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //   $this->middleware()->only([

    //     'commentUpdate','commentStore','profileUpdate'
    //  ]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile($id , $slug = null)
    {
       $user = User::findOrFail($id);
        return view('front-end.users.profile',compact('user'));

    }

    //update user prpfile
    public function profileUpdate(\App\Http\Requests\frontend\User\Store $request)
    {
      $user = User::findOrFail(auth()->user()->id);
      $array = []; 
      if($request->email != $user->email)
      {
          $email = User::where('email',$request->email)->first();
            if ($email == null) {
             $array['email'] = $request->email;
            }
      }

       if($request->name != $user->name)
      {
          $array['name'] = $request->name;
      }

      if($request->password != '')
      {
          $array['password'] = Hash::make($request->password);
      }

      if (!empty($array)) {
        $user->update($array);
      }
      alert()->success('Your Profile Updated Successfully','Done');
      return redirect()->route('front.profile',
       ['id' => $user->id , 'slug' => slug($user->name)]);

    }

    public function index()
    {

        $products = Product::orderBy('id','desc');
        if (request()->has('search') && request()->get('search')  != '') {
          $products = $products->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $products = $products->paginate(30);
        return view('home',compact('products'));
    }


    public function welcome()
    {
        $products = Product::inRandomOrder()->take(4)->get();
        $topSilling = Product::inRandomOrder()->take(4)->get();
        return view('front-end.index',compact('products','topSilling'));
    }

    public function product($id , $slug = null)
    {

    $product = Product::findOrFail($id);
    $setting = Setting::orderBy('created_at' , 'desc')->limit(1)->get()->first();
    $colors = Color::get();
    $sizes = Size::get();
    $relatedProduct = Product::inRandomOrder()->take(4)->get();
     if ($product->quantity > $setting->stock_threshold) { //is true
        $stockLevel = 'In Stock';
    } elseif($product->quantity <= $setting->stock_threshold && $product->quantity > 0) {
        $stockLevel = 'Low Stock';
    } else {
        $stockLevel = 'Not availabel';
    }

    return view('front-end.product',
    compact('product','setting','stockLevel','sizes','colors','relatedProduct'));
}

    public function shop()
    {
      $products = Product::all();
      $categories = Category::all()->take(10);
      $brands = Brand::all()->take(10);
      $topSilling = Product::orderBy('id','desc')->take(10)->get();
      return view('front-end.shopping',compact('products','categories','brands','topSilling'));
    }

    public function category($id , $slug = null)
    {
    $category = Category::findOrFail($id);
    $products = Product::where('category_id',$id)->orderBy('id' , 'desc')->paginate(10);
    return view('front-end.category.index',compact('products','category'));
    }

    public function search()
    {
        $products = Product::orderBy('id','desc');
        if (request()->has('search') && request()->get('search')  != '') {
          $products = $products->where('name' , 'like' , "%".request()->get('search')."%");
        }
        // dd($product);
        $products = $products->paginate(10);
        return view('home',compact('products'));
    }

    public function showMessege ()
    {
      
      return view('front-end.messages.index');

    }

    public function storeMessege (\App\Http\Requests\frontend\Message\Store $request)
    {
      Message::create($request->all());
      alert()->success('Your Message Sent Successfully','Done');
      return redirect()->route('landing.index');

    }


    public function commentStore (Store $request , $id)
    {
      $product = Product::findOrFail($id);

     

       Comment::create([
        'user_id' =>auth()->user()->id,
        'product_id' => $product->id,
        'comment' =>$request->comment
      ]);
       alert()->success('Comment Add','Done');
      return redirect()->route('landing.product' , ['id' => $product->id , '#comments']);

    }


    public function commentUpdate($id , Store $request)
    { 
      $comment = Comment::findOrFail($id);
      if ($comment->user_id == auth()->user()->id ) {
          
       $comment->update(['comment' => $request->comment]);

      }
      alert()->success('Comment Updated Successfully','Done');
      return redirect()->route('landing.product' , ['id' => $comment->product_id , '#comments']);
    }

}
