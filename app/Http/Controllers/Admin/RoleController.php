<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   public function index()
    {
    	 
    	$user=DB::table('users')->where('type',2)->get();
    	 return view('admin.role.index',compact('user'));
    }

    public function create()
    {
    	  return view('admin.role.create');
    }


    public function UserStore(Request $request)
    {
    	 $data=array();
    	 $data['name']=$request->name;
    	 $data['address']=$request->address;
    	 $data['email']=$request->email;
         $data['description']=$request->description;
         $data['education']=$request->education;
    	 $data['password']= Hash::make($request->password);
    	 $data['category']=$request->category;
    	 $data['tag']=$request->tag;
         $data['type']=2;
    	 DB::table('users')->insert($data);
    	 $notification=array(
                 'messege'=>'Child Admin Create Successfully',
                 'alert-type'=>'success'
                       );
        return redirect()->back()->with($notification);
    }

    public function UserDelete($id)
    {
    	 DB::table('users')->where('id',$id)->delete();
    	 $notification=array(
                 'messege'=>' Admin Delete Successfully',
                 'alert-type'=>'success'
                      );
         return redirect()->back()->with($notification);
    }

     public function UserEdit($id)
    {
    	 $user=DB::table('users')->where('id',$id)->first();
    	 return view('admin.role.edit',compact('user'));
    }

    public function UserUpdate(Request $request)
    {
    	 $id=$request->id;
    	 $data=array();
         $data['name']=$request->name;
         $data['address']=$request->address;
         $data['email']=$request->email;
         $data['description']=$request->description;
         $data['education']=$request->education;
         $data['category']=$request->category;
         $data['tag']=$request->tag;
    	 DB::table('users')->where('id',$id)->update($data);
    	 $notification=array(
                 'messege'=>'Child Admin Update Successfully',
                 'alert-type'=>'success'
                       );
        return redirect()->route('create.user.role')->with($notification);


    }

    public function user_show()
    {
          return view('admin.role.user_profile');
    }

    public function edit()
    {
          return view('admin.role.edit_profile');
    }

    public function update_profile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->description = $request->description;
        $user->save();
        
        return redirect()->route('user.profile');
    }
   
}
