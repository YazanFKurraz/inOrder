<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\backend\Brand\Store;
use App\Http\Requests\backend\Brand\Update;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('back-end.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $file  = $request->file('brand_image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin_uploads/brand') , $fileName);

        $requstArray = ['brand_image' => $fileName] + $request->all() ;

         $brand = Brand::create($requstArray);
       
        alert()->success('Brand Added Successfully','Done');

        return redirect()->route('brands.index');   
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
        $brand = Brand::findOrFail($id);
        return view('back-end.brands.edit',compact('brand'));
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
        $brand = Brand::findOrFail($id); 
        $requstArray = $request->all();

        if($request->hasFile('brand_image')) {
        $file = $request->file('brand_image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        if(File::exists(public_path('admin_uploads/brand/') . $brand->brand_image)){
            File::delete(public_path('admin_uploads/brand/') .  $brand->brand_image);
        }                
        $file->move(public_path('admin_uploads/brand') , $fileName);
        $requstArray = ['brand_image' => $fileName] + $requstArray; 
        }

        $brand->update($requstArray);

          alert()->success('Brand Updated Successfully','Done');

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        
         if(File::exists(public_path('admin_uploads/brand/') . $brand->brand_image)){
            File::delete(public_path('admin_uploads/brand/') .  $brand->brand_image);
        }
        $brand->delete();
        alert()->success('Brand deleted Successfully','Done');
        return redirect()->route('brands.index');
         
    }
}
