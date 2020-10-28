<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth:admin');
    }
     
   public function index()
    {
        $tag=DB::table('tags')->orderBy('id','DESC')->get();
        return view('admin.tag.index',compact('tag'));
    }


     public function create()
    {
      
        return view('admin.tag.create');
    }


    public function storetag(Request $request)
    {
        $validatedData = $request->validate([
        'tag_name' => 'required|unique:tags|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $tag = new Tag();
        $tag->tag_name =$request->tag_name;
        $tag->save();
        $notification=array(
                 'messege'=>'Tag Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteTag($id)
    {
         DB::table('tags')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Tag Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditTag($id)
    {
        $tag=DB::table('tags')->where('id',$id)->first();
        return view('admin.tag.edit',compact('tag'));
    }

    public function UpdateTag(Request $request,$id)
    {
        $validatedData = $request->validate([
        'tag_name' => 'required|max:55',
        ]);
         $data=array();
         $data['tag_name']=$request->tag_name;
         $update= DB::table('tags')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Tag Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.tag')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.tag')->with($notification);
        }
    }
}
