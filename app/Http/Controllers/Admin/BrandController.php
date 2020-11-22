<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Brand; 

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     public function index()
    {
        $brand=DB::table('brands')->orderBy('id','DESC')->get();
        return view('admin.brand.index',compact('brand'));
    }

     public function create()
    {
      
        return view('admin.brand.create');
    }



    public function storebrand(Request $request)
    {
        $validatedData = $request->validate([
        'brand_name' => 'required|unique:brands|max:55',
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('logo');
            if ($image) {
                // $image_name= str_random(5);
                $image_name= date('dmy_H_s_i');

                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='backend/brand/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
              
                $data['logo']=$image_url;
                $brand=DB::table('brands')->insert($data);
                $notification=array(
                     'messege'=>'Successfully Brand Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);                      
            }else{
                 $brand=DB::table('brands')->insert($data);
                 $notification=array(
                     'messege'=>'Done!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }
    }

    public function DeleteBrand($id)
    {
        $data=DB::table('brands')->where('id',$id)->first();
        $image=$data->logo;
        unlink($image);
        $brand=DB::table('brands')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully Brand Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }

    public function EditBrand($id)
    {
         $brand=DB::table('brands')->where('id',$id)->first();
         return view('admin.brand.edit',compact('brand'));
    }

    
     public function UpdateBrand(Request $request,$id)
    {
       $oldlogo=$request->old_logo;
        $data=array();
        $data['brand_name']=$request->brand_name; 
        $image=$request->file('logo');
            if ($image) {
                unlink($oldlogo);
                $image_name= date('dmy_H_s_i');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.'.'.$ext;
                $upload_path='public/backend/brand/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $data['logo']=$image_url;
                $brand=DB::table('brands')->where('id',$id)->update($data);
                    $notification=array(
                     'messege'=>'Successfully Brand Updated ',
                     'alert-type'=>'success'
                    );
                return Redirect()->route('all.brand')->with($notification);                      
            }else{
              $brand=DB::table('brands')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('all.brand')->with($notification); 
            
    }}


}
