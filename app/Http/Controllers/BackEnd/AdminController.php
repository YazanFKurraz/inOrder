<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\backend\Admin\Store;
use App\Http\Requests\backend\Admin\Update;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id','desc')->paginate(10);
        return view('back-end.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.admins.create');
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
        $file->move(public_path('admin_uploads/admin_image') , $fileName);

        $requestArray = ['image' => $fileName] + $request->all() ;   
        $requestArray['password'] = Hash::make($requestArray['password']);

        $admin = Admin::create($requestArray);
        alert()->success('Admin Added Successfully','Done');

        return redirect()->route('admins.index');

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
        $admin = Admin::findOrFail($id);
        return view('back-end.admins.edit',compact('admin'));
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
        
        $admin = Admin::findOrFail($id); 
        $requstArray = $request->all();

        if($request->hasFile('image')) {

        $file = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        if(File::exists(public_path('admin_uploads/admin_image/') . $admin->image)){
            File::delete(public_path('admin_uploads/admin_image/') .  $admin->image);
        }                
        $file->move(public_path('admin_uploads/admin_image') , $fileName);
        $requstArray = ['image' => $fileName] + $requstArray; 

        }

        if(isset($requstArray['password']) && $requstArray['password'] != "")
        {
        $requstArray['password'] = Hash::make($requstArray['password']);
        
        }else{
            unset($requstArray['password']);
        }

        $admin->update($requstArray);

       alert()->success('Admin Updated Successfully','Done');

        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        
         if(File::exists(public_path('admin_uploads/admin_image/') . $admin->image)){
            File::delete(public_path('admin_uploads/admin_image/') .  $admin->image);
        }
        $admin->delete();
        alert()->success('Admin deleted Successfully','Done');
        return redirect()->route('admins.index');
         
    }

    public function profile($id ,$slug = null)
    {
        $admin = Admin::findOrFail($id);

        return view('back-end.admins.profile',compact('admin'));
    }

  public function Updateprofile(Update $request)
    {
        $admin = Admin::findOrFail(auth()->user()->id);
         $array = []; 

        if($request->hasFile('image')) {

        $file = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        if(File::exists(public_path('admin_uploads/admin_image/') . $admin->image)){
            File::delete(public_path('admin_uploads/admin_image/') .  $admin->image);
        }                
        $file->move(public_path('admin_uploads/admin_image') , $fileName);
        $array = ['image' => $fileName] + $array; 

        }
         if($request->email != $admin->email)
      {
          $email = Admin::where('email',$request->email)->first();
            if ($email == null) {
             $array['email'] = $request->email;
            }
      }
         if($request->name != $admin->name)
      {
          $array['name'] = $request->name;
      }

           if($request->phone != $admin->phone)
      {
          $array['phone'] = $request->phone;
      }


        if($request->password != '')
      {
          $array['password'] = Hash::make($request->password);
      }

         if (!empty($array)) {
        $admin->update($array);
      }

       alert()->success('Your Profile Updated Successfully','Done');

        return redirect()->route('profile.index',
      ['id' => $admin->id , 'slug' => slug($admin->name)]);

    }

    
}
