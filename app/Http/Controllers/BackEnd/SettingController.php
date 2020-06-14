<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\backend\Setting\Update;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('back-end.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $setting = Setting::findOrFail($id);
        return view('back-end.settings.edit',compact('setting'));
        return view('back-end.layouts.side-bar',compact('setting'));
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
        $setting = Setting::findOrFail($id); 
        $requstArray = $request->all();

        if($request->hasFile('logo')) {

        $file = $request->file('logo');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        if(File::exists(public_path('siteLogo/') . $setting->logo)){
            File::delete(public_path('siteLogo/') .  $setting->logo);
        }                
        $file->move(public_path('siteLogo') , $fileName);
        $requstArray = ['logo' => $fileName] + $requstArray; 
        }

        $setting->update($requstArray);

          alert()->success('Setting Updated Successfully','Done');

        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
