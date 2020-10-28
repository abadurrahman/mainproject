<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
   public function index()
    {
        $category=DB::table('categories')->orderBy('id','DESC')->get();
        return view('admin.category.index',compact('category'));
    }


     public function create()
    {
      
        return view('admin.category.create');
    }


    public function storecatgory(Request $request)
    {
        $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $category = new Category();
        $category->category_name =$request->category_name;
        $category->save();
        $notification=array(
                 'messege'=>'Category Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteCategory($id)
    {
         DB::table('categories')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Category Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    public function UpdateCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'category_name' => 'required|max:55',
        ]);
         $data=array();
         $data['category_name']=$request->category_name;
         $update= DB::table('categories')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Category Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.category')->with($notification);
        }
    }
}
