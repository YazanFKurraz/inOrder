<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\backend\Category\Store;
use App\Http\Requests\backend\Category\Update;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('back-end.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $file  = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin_uploads/category') , $fileName);

        $requstArray = ['image' => $fileName] + $request->all() ;   

        $category = Category::create($requstArray);
       
        alert()->success('Category Added Successfully','Done');

        return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);
        return view('back-end.categories.edit',compact('category'));
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
        $category = Category::findOrFail($id); 
        $requstArray = $request->all();

        if($request->hasFile('image')) {

        $file = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        if(File::exists(public_path('admin_uploads/category/') . $category->image)){
            File::delete(public_path('admin_uploads/category/') .  $category->image);
        }                
        $file->move(public_path('admin_uploads/category') , $fileName);
        $requstArray = ['image' => $fileName] + $requstArray; 
        }

        $category->update($requstArray);

          alert()->success('Category Updated Successfully','Done');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $category = Category::findOrFail($id);
        $categoryProduct = $category->product()->count();
        if ($categoryProduct > 0)
            return response()->json(['status' => 404, 'message' => 'This Category associated with Product']);
            $category->delete();
            
        if(File::exists(public_path('admin_uploads/category/') . $category->image)){
           File::delete(public_path('admin_uploads/category/') .  $category->image);
        }
           return response()->json(['status' => 200, 'message' => '']);
        $category->delete();
        }catch (ModelNotFoundException $modelNotFoundException) {
          return response()->json(['status' => 200, 'message' => 'Category not Found']);
        }
        alert()->success('Category deleted Successfully','Done');
         return redirect()->route('categories.index');
         
    }
}
