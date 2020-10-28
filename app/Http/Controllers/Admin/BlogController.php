<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Brand;

class BlogController extends Controller
{  
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     public function index()
    {
        $blog=DB::table('blogs')->join('blogcategories','blogs.blogcategory_id','blogcategories.id')
        ->select('blogs.*','blogcategories.blogcategory_name')->orderBy('id','DESC')
        ->get();
        return view('admin.blog.index',compact('blog'));
    }

     public function create()
    {
        $blogcategory=DB::table('blogcategories')->get();
        $tag=DB::table('tags')->get();
        return view('admin.blog.create',compact('blogcategory','tag'));
    }


    public function storeblog(Request $request)
    {
        $validatedData = $request->validate([
        'title' => 'required|unique:blogs|max:255',
        'date' => 'required',
        ]);

        $data=array();
        $data['blogcategory_id']=$request->blogcategory_id;
        $data['tag_id']=$request->tag_id;
        $data['title']=$request->title; 
        $data['date']=$request->date; 
        $data['details']=$request->details;  
        $data['main']=$request->main; 
        $data['latest']=$request->latest; 
        $data['status']=1; 
        
        $image_one=$request->image_one;


        if($image_one){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)
                ->save('backend/blog/'.$image_one_name);
                $data['image_one']='backend/blog/'.$image_one_name;    
                
                $blog=DB::table('blogs')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Blog Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }
   
    }

    
    public function DeleteBlog($id)
    {
        $data=DB::table('blogs')->where('id',$id)->first();
        $image=$data->image_one;
        unlink($image);
        $blog=DB::table('blogs')->where('id',$id)->delete();
                $notification=array(
                     'messege'=>'Successfully Blog Deleted ',
                     'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);   

    }

    public function EditBlog($id)
    {
         $blog=DB::table('blogs')->where('id',$id)->first();
         return view('admin.blog.edit',compact('blog'));
    }


    public function UpdateBlogWithoutPhoto(Request $request,$id)
    {

       $data=array();
        $data['blogcategory_id']=$request->blogcategory_id;
        $data['tag_id']=$request->tag_id;
        $data['title']=$request->title; 
        $data['date']=$request->date; 
        $data['details']=$request->details;  
        $data['main']=$request->main; 
        $data['latest']=$request->latest; 
      
           DB::table('blogs')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.blog')->with($notification);

        }

        public function UpdateBlogPhoto(Request $request,$id)
        {
         $old_one=$request->old_one;

         $image_one=$request->image_one;

         $data=array();

            if($request->has('image_one')) {
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(300,300)->save('backend/blog/'.$image_one_name);
           $data['image_one']='backend/blog/'.$image_one_name;

            DB::table('blogs')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.blog')->with($notification);

        }

         return Redirect()->route('all.blog');
    }


    public function ViewBlog($id)
    {
        $blog=DB::table('blogs')
                ->join('blogcategories','blogs.blogcategory_id','blogcategories.id')
                ->join('tags','blogs.tag_id','tags.id')
                ->select('blogs.*','blogcategories.blogcategory_name','tags.tag_name')
                ->where('blogs.id',$id)
                ->first();
        return view('admin.blog.show',compact('blog'));

    }


}