<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use DB;


class SubcategoryController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     public function index()
    {
       $category=DB::table('categories')->get();
       $subcategory=DB::table('subcategories')
               ->join('categories','subcategories.category_id','categories.id')
               ->select('subcategories.*','categories.category_name')
               ->get();

             return view('admin.subcategory.index',compact('category','subcategory'));   
    }


     public function create()
    {
       $category=DB::table('categories')->get();
        return view('admin.subcategory.create', compact('category'));
    }


    public function storesubcatgory(Request $request)
    {
        $validatedData = $request->validate([
         'category_id' => 'required',
         'subcategory_name' => 'required|',

        ]);
       
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcat_1']=$request->subcat_1;
        $data['subcat_2']=$request->subcat_2;
        DB::table('subcategories')->insert($data);
            $notification=array(
                'messege'=>'Sub Category Inserted',
                'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);
    }
    
     public function DeleteSubCategory($id)
    {
         DB::table('subcategories')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Subcategory Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditSubCategory($id)
    {
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('admin.subcategory.edit',compact('subcategory','category'));
    }

    public function UpdateSubCategory(Request $request,$id)
    {
       $validatedData = $request->validate([
         'category_id' => 'required',
         'subcategory_name' => 'required|',

        ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;
        $data['subcat_1']=$request->subcat_1;
        $data['subcat_2']=$request->subcat_2;
        $update= DB::table('subcategories')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Subcategory Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.subcategory')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.subcategory')->with($notification);
        }
    }
}
