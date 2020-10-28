<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class WebsettingController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$websetting=DB::table('websettings')->get();
        return view('admin.websetting.index',compact('websetting'));

    }

    public function create()
    {
    	$category=DB::table('categories')->get();
    	return view('admin.websetting.create');
    }


   public function store(Request $request)
    {
      $data=array();
        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['company_name']=$request->company_name;
        $data['email']=$request->email;
        $data['company_address']=$request->company_address;
        $data['facebook']=$request->facebook;
        $data['youtube']=$request->youtube;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['description']=$request->description;

        $logo=$request->logo;


        if($logo){
            $image_one_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                Image::make($logo)->resize(230,300)
                ->save('backend/setting/'.$image_one_name);
                $data['logo']='backend/setting/'.$image_one_name;    
                
                     
        $websetting=DB::table('websettings')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);  
        }
        
        }

    public function DeleteSetting($id)
    {
        $websetting=DB::table('websettings')->where('id',$id)->first();
        DB::table('websettings')->where('id',$id)->delete();
        $notification=array(
                     'messege'=>'Successfully Product Deleted ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);

    }

    public function EditSetting($id)
    {
        $websetting=DB::table('websettings')->where('id',$id)->first();

        return view('admin.websetting.edit',compact('websetting'));
    }

    public function UpdateSetting(Request $request,$id)
    {
        $data=array();
        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['company_name']=$request->company_name;
        $data['email']=$request->email;
        $data['company_address']=$request->company_address;
        $data['facebook']=$request->facebook;
        $data['youtube']=$request->youtube;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['description']=$request->description;

       DB::table('websettings')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.websetting')->with($notification);

    }

    public function UpdateSettingPhoto(Request $request,$id)
        {
         $old_one=$request->old_one;

         $logo=$request->logo;

         $data=array();

            if($request->has('logo')) {
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
           Image::make($logo)->resize(300,300)->save('backend/setting/'.$image_one_name);
           $data['logo']='backend/setting/'.$image_one_name;

            DB::table('websettings')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Logo Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.websetting')->with($notification);

        }

         return Redirect()->route('all.websetting');
    }
  }