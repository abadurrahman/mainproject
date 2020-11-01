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
    

    public function UserRole()
    {
         $user=DB::table('admins')->where('type',2)->get();
         return view('admin.role.index',compact('user'));
    }  

    public function UserCreate()
    {
          return view('admin.role.create');
    }

    public function UserStore(Request $request)
    {
         $data=array();
         $data['name']=$request->name;
         $data['address']=$request->address;
         $data['education']=$request->education;
         $data['phone']=$request->phone;
         $data['email']=$request->email;
         $data['password']= Hash::make($request->password);

         $data['category']=$request->category;
         $data['blog']=$request->blog;
         $data['report']=$request->report;
         $data['contact']=$request->contact;
         $data['coupon']=$request->coupon;
         $data['order']=$request->order;
         $data['role']=$request->role;
         $data['comment']=$request->comment;
         $data['product']=$request->product;
         $data['return']=$request->return;
         $data['tag']=$request->tag;
         $data['subcategory']=$request->subcategory;
         $data['stock']=$request->stock;
         $data['slider']=$request->slider;
         $data['brand']=$request->brand;
         $data['categorypages']=$request->categorypages;
         $data['subcategorypages']=$request->subcategorypages;
         $data['advertise']=$request->advertise;
         $data['newslater']=$request->newslater;
         $data['websetting']=$request->websetting;
         $data['seo']=$request->seo;

         $data['type']=2;
         DB::table('admins')->insert($data);
         $notification=array(
                 'messege'=>'Child Admin Create Successfully',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

    public function UserDelete($id)
    {
         DB::table('admins')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>' Admin Delete Successfully',
                 'alert-type'=>'success'
                       );
         return Redirect()->back()->with($notification);
    }

    public function UserEdit($id)
    {
         $user=DB::table('admins')->where('id',$id)->first();
         return view('admin.role.edit',compact('user'));
    }

    public function UserUpdate(Request $request)
    {
         $id=$request->id;
          $data=array();
         $data['name']=$request->name;
         $data['address']=$request->address;
         $data['education']=$request->education;
         $data['phone']=$request->phone;
         $data['email']=$request->email;
         $data['category']=$request->category;
         $data['blog']=$request->blog;
         $data['report']=$request->report;
         $data['contact']=$request->contact;
         $data['coupon']=$request->coupon;
         $data['order']=$request->order;
         $data['role']=$request->role;
         $data['comment']=$request->comment;
         $data['product']=$request->product;
         $data['return']=$request->return;
         $data['tag']=$request->tag;
         $data['subcategory']=$request->subcategory;
         $data['stock']=$request->stock;
         $data['slider']=$request->slider;
         $data['brand']=$request->brand;
         $data['categorypages']=$request->categorypages;
         $data['subcategorypages']=$request->subcategorypages;
         $data['advertise']=$request->advertise;
         $data['newslater']=$request->newslater;
         $data['websetting']=$request->websetting;
         $data['seo']=$request->seo;
         DB::table('admins')->where('id',$id)->update($data);
         $notification=array(
                 'messege'=>'Child Admin Update Successfully',
                 'alert-type'=>'success'
                       );
        return Redirect()->route('create.user.role')->with($notification);


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
