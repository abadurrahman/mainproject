<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SubscriberController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function Newslater()
    {
        $sub=DB::table('subscribers')->get();
        return view('admin.newslater.newslater',compact('sub'));
    }

      public function DeleteSub($id)
    {
        DB::table('subscribers')->where('id',$id)->delete();
        $notification=array(
                 'messege'=>'Subscriber Delete Done',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

  public function Seo()
    {
        $seo=DB::table('seo')->first();
        return view('admin.newslater.seo',compact('seo'));
    }

    public function UpdateSeo(Request $request)
    {
        $id=$request->id;
         $data=array();
         $data['meta_title']=$request->meta_title;
         $data['meta_author']=$request->meta_author;
         $data['meta_tag']=$request->meta_tag;
         $data['meta_description']=$request->meta_description;
         $data['google_analytics']=$request->google_analytics;
         $data['bing_analytics']=$request->bing_analytics;
         DB::table('seo')->where('id',$id)->update($data);
         $notification=array(
                 'messege'=>'SEO Updated',
                 'alert-type'=>'success'
                       );
        return Redirect()->back()->with($notification);
    }

}
