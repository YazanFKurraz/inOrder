<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\backend\Color\Store;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $colors = Color::paginate(10);
        return view('back-end.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        return view('back-end.colors.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Store $request)
    {
        $color = Color::create($request->all());

        alert()->success('Color Added Successfully','Done');

        return redirect()->route('colors.index');
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
        $color = Color::findOrFail($id);
        return view('back-end.colors.edit',compact('color'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, $id)
    {
        
        $color = Color::findOrFail($id); 
        $requstArray = $request->all();
        
        $color->update($requstArray);

        alert()->success('Color Updated Successfully','Done');

        return redirect()->route('colors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
        {
            $color = Color::findOrFail($id);
            $color->delete();
            alert()->success('Color deleted Successfully','Done');
            return redirect()->route('colors.index');
        }
}
