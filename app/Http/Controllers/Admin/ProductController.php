<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Color;
use App\Size;
use App\Subcategory;
use App\Brand;
use Image;

class ProductController extends Controller
{
  
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     public function index()
    {
      $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
        return view('admin.product.index',compact('product'));

    }

   public function create()
    {
      $category=DB::table('categories')->get();
      $brand=DB::table('brands')->get();
      return view('admin.product.create',compact('category','brand'));
    }


   public function store(Request $request)
    {
      $data=array();
        $data['product_name']=$request->product_name;
        $data['title']=$request->title;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_price']=$request->selling_price;
        $data['product_details']=$request->product_details;
        $data['video_link']=$request->video_link;
        $data['newarrivals_one']=$request->newarrivals_one;
        $data['newarrivals_two']=$request->newarrivals_two;
        $data['newarrivals_three']=$request->newarrivals_three;
        $data['newarrivals_four']=$request->newarrivals_four;
        $data['newarrivals_five']=$request->newarrivals_five;
        $data['latest_design']=$request->latest_design;
        $data['special_offer']=$request->special_offer;
        $data['collection']=$request->collection;
        $data['status']=1;


        $image_one=$request->image_one;
      $image_one_1=$request->image_one_1;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
      $image_four=$request->image_four;

    if($image_one && $image_one_1 && $image_two && $image_three && $image_four){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)
                ->save('backend/product/'.$image_one_name);
                $data['image_one']='backend/product/'.$image_one_name;

            $image_one_1_name= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
                Image::make($image_one_1)->resize(230,300)->save('backend/product/'.$image_one_1_name);
                $data['image_one_1']='backend/product/'.$image_one_1_name;   

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('backend/product/'.$image_two_name);
                $data['image_two']='backend/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('backend/product/'.$image_three_name);
                $data['image_three']='backend/product/'.$image_three_name; 

            $image_four_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                Image::make($image_four)->resize(230,300)->save('backend/product/'.$image_four_name);
                $data['image_four']='backend/product/'.$image_four_name;    
                
                $product=DB::table('products')
                          ->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Product Inserted ',
                     'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);   
        }
   
    }
    
    
       public function Inactive($id)
    {
         DB::table('products')->where('id',$id)->update(['status'=> 0]);
         $notification=array(
                     'messege'=>'Successfully Product Inactive ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);  
    }

    public function Active($id)
    {
         DB::table('products')->where('id',$id)->update(['status'=> 1]);
         $notification=array(
                     'messege'=>'Successfully Product Aactive ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $image1=$product->image_one;
        $image1_one=$product->image_one_1;
        $image2=$product->image_two;
        $image3=$product->image_three;
        $image4=$product->image_four;
        unlink($image1);
        unlink($image1_one);
        unlink($image2);
        unlink($image3);
        unlink($image4);
        DB::table('products')->where('id',$id)->delete();
        $notification=array(
                     'messege'=>'Successfully Product Deleted ',
                     'alert-type'=>'success'
                    );
         return Redirect()->back()->with($notification);

    }

    public function ViewProduct($id)
    {
        $product=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('brands','products.brand_id','brands.id')
                ->join('subcategories','products.subcategory_id','subcategories.id')
                ->select('products.*','categories.category_name','brands.brand_name','subcategories.subcategory_name')
                ->where('products.id',$id)
                ->first();
        return view('admin.product.show',compact('product'));

      }
    

    public function EditProduct($id)
    {
        $product=DB::table('products')->where('id',$id)->first();

        return view('admin.product.edit',compact('product'));
    }

    public function UpdateProductWithoutPhoto(Request $request,$id)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['title']=$request->title;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['discount_price']=$request->discount_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_price']=$request->selling_price;
        $data['product_details']=$request->product_details;
        $data['video_link']=$request->video_link;
        $data['newarrivals_one']=$request->newarrivals_one;
        $data['newarrivals_two']=$request->newarrivals_two;
        $data['newarrivals_three']=$request->newarrivals_three;
        $data['newarrivals_four']=$request->newarrivals_four;
        $data['newarrivals_five']=$request->newarrivals_five;
        $data['latest_design']=$request->latest_design;
        $data['special_offer']=$request->special_offer;
        $data['collection']=$request->collection;
        
        $update=DB::table('products')->where('id',$id)->update($data);
        if ($update) {
             $notification=array(
                     'messege'=>'Successfully Product Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);

        }else{
            $notification=array(
                     'messege'=>'Nothing To Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
        }
    }

    public function UpdateProductPhoto(Request $request,$id)
    {
        $old_one=$request->old_one;
        $old_one_1=$request->old_one_1;
        $old_two=$request->old_two;
        $old_three=$request->old_three;
        $old_four=$request->old_four;

        $image_one=$request->image_one;
        $image_one_1=$request->image_one_1;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
        $image_four=$request->image_four;

        $data=array();

        if($request->has('image_one')) {
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(300,300)->save('backend/product/'.$image_one_name);
           $data['image_one']='backend/product/'.$image_one_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);

        }if($request->has('image_one_1')) {
           unlink($old_one_1);
           $image_one_name_1= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
           Image::make($image_one_1)->resize(300,300)->save('backend/product/'.$image_one_name_1);
           $data['image_one_1']='backend/product/'.$image_one_name_1;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);


        }if($request->has('image_two')) {
           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('backend/product/'.$image_two_name);
           $data['image_two']='backend/product/'.$image_two_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
        }if($request->has('image_three')) {
           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('backend/product/'.$image_three_name);
           $data['image_three']='backend/product/'.$image_three_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image Three Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);

             }if($request->has('image_four')) {
           unlink($old_four);
           $image_four_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
           Image::make($image_four)->resize(300,300)->save('backend/product/'.$image_four_name);
           $data['image_four']='backend/product/'.$image_four_name;
           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);

        }if($request->has('image_one') && $request->has('image_one_1')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('backend/product/'.$image_one_name);
           $data['image_one']='backend/product/'.$image_one_name;
            
           unlink($old_one_1); 
           $image_one_name_1= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
           Image::make($image_one_1)->resize(230,300)->save('backend/product/'.$image_one_name_1);
           $data['image_one_1']='backend/product/'.$image_one_name_1;

           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
           
        }if($request->has('image_one') && $request->has('image_one_1') && $request->has('image_two')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('backend/product/'.$image_one_name);
           $data['image_one']='backend/product/'.$image_one_name;
            
           unlink($old_one_1); 
           $image_one_name_1= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
           Image::make($image_one_1)->resize(230,300)->save('backend/product/'.$image_one_name_1);
           $data['image_one_1']='backend/product/'.$image_one_name_1;

           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('backend/product/'.$image_two_name);
           $data['image_two']='backend/product/'.$image_two_name;

           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);

        }if($request->has('image_one') && $request->has('image_one_1') && $request->has('image_two') && $request->has('image_three')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('backend/product/'.$image_one_name);
           $data['image_one']='backend/product/'.$image_one_name;
            
           unlink($old_one_1); 
           $image_one_name_1= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
           Image::make($image_one_1)->resize(230,300)->save('backend/product/'.$image_one_name_1);
           $data['image_one_1']='backend/product/'.$image_one_name_1;

           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('backend/product/'.$image_two_name);
           $data['image_two']='backend/product/'.$image_two_name;

           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('backend/product/'.$image_three_name);
           $data['image_three']='backend/product/'.$image_three_name;

           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);
        
        }if($request->has('image_one') && $request->has('image_one_1') && $request->has('image_two') && $request->has('image_three') && $request->has('image_four')){
            
           unlink($old_one);
           $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make($image_one)->resize(230,300)->save('backend/product/'.$image_one_name);
           $data['image_one']='backend/product/'.$image_one_name;
            
           unlink($old_one_1); 
           $image_one_name_1= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
           Image::make($image_one_1)->resize(230,300)->save('backend/product/'.$image_one_name_1);
           $data['image_one_1']='backend/product/'.$image_one_name_1;

           unlink($old_two);
           $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make($image_two)->resize(230,300)->save('backend/product/'.$image_two_name);
           $data['image_two']='backend/product/'.$image_two_name;

           unlink($old_three);
           $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make($image_three)->resize(230,300)->save('backend/product/'.$image_three_name);
           $data['image_three']='backend/product/'.$image_three_name;

           unlink($old_four);
           $image_four_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
           Image::make($image_four)->resize(230,300)->save('backend/product/'.$image_four_name);
           $data['image_four']='backend/product/'.$image_four_name;

           DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                     'messege'=>'Image One and Two Updated ',
                     'alert-type'=>'success'
                    );
             return Redirect()->route('all.product')->with($notification);   
       
        }
         return Redirect()->route('all.product');
    }




   //color

    public function allcolor()
    {
        $color=DB::table('colors')->orderBy('id','DESC')->get();
        return view('admin.color.index',compact('color'));
    }


     public function addcolor()
    {
      
        return view('admin.color.create');
    }


    public function storecolor(Request $request)
    {
        $validatedData = $request->validate([
        'color' => 'required|unique:colors|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $color = new Color();
        $color->color =$request->color;
        $color->save();
        $notification=array(
                 'messege'=>'Color Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteColor($id)
    {
         DB::table('colors')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Color Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditColor($id)
    {
        $color=DB::table('colors')->where('id',$id)->first();
        return view('admin.color.edit',compact('color'));
    }

    public function UpdateColor(Request $request,$id)
    {
        $validatedData = $request->validate([
        'color' => 'required|max:55',
        ]);
         $data=array();
         $data['color']=$request->color;
         $update= DB::table('colors')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Color Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.color')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.color')->with($notification);
        }
    }

   //size

    public function allsize()
    {
        $size=DB::table('sizes')->orderBy('id','DESC')->get();
        return view('admin.size.index',compact('size'));
    }


     public function addsize()
    {
      
        return view('admin.size.create');
    }


    public function storesize(Request $request)
    {
        $validatedData = $request->validate([
        'size' => 'required|unique:sizes|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $size = new Size();
        $size->size =$request->size;
        $size->save();
        $notification=array(
                 'messege'=>'Size Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteSize($id)
    {
         DB::table('sizes')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Size Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditSize($id)
    {
        $size=DB::table('sizes')->where('id',$id)->first();
        return view('admin.size.edit',compact('size'));
    }

    public function UpdateSize(Request $request,$id)
    {
        $validatedData = $request->validate([
        'size' => 'required|max:55',
        ]);
         $data=array();
         $data['size']=$request->size;
         $update= DB::table('sizes')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Color Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.size')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.size')->with($notification);
        }
    }

     //subcategory collect by ajax request
    public function GetSubcat($category_id)
    {
      $cat = DB::table("subcategories")->where("category_id",$category_id)->get();
        return json_encode($cat);
    }
    

}
