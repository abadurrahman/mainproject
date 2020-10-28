<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Blogcategory;

class BlogcategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index()
    {
        $blogcategory=DB::table('blogcategories')->orderBy('id','DESC')->get();
        return view('admin.blogcategory.index',compact('blogcategory'));
    }


     public function create()
    {
      
        return view('admin.blogcategory.create');
    }


    public function storeblogcategory(Request $request)
    {
        $validatedData = $request->validate([
        'blogcategory_name' => 'required|unique:blogcategories|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $blogcategory = new Blogcategory();
        $blogcategory->blogcategory_name =$request->blogcategory_name;
        $blogcategory->save();
        $notification=array(
                 'messege'=>'Blogcategory Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteBlogcategory($id)
    {
         DB::table('blogcategories')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Blogcategory Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditBlogcategory($id)
    {
        $blogcategory=DB::table('blogcategories')->where('id',$id)->first();
        return view('admin.blogcategory.edit',compact('blogcategory'));
    }

    public function UpdateBlogcategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'blogcategory_name' => 'required|max:55',
        ]);
         $data=array();
         $data['blogcategory_name']=$request->blogcategory_name;
         $update= DB::table('blogcategories')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Blogcategory Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.blogcategory')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.blogcategory')->with($notification);
        }
    }
}
