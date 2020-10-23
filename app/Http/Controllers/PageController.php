<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class PageController extends Controller
{



    public function ProductView($id,$product_name)
    {   
      $product=DB::table('products')->where('products.id',$id)->first();
      
      $color=$product->product_color;
      $product_color = explode(',', $color);

      $size=$product->product_size;
      $product_size = explode(',', $size);

      return  view('pages.page_details',compact('product','product_color','product_size'));
    }

   public function AddCart(Request $request,$id)
    {
       $product=DB::table('products')->where('id',$id)->first();
        $data=array();
        if ($product->discount_price == NULL) {
                      $data['id']=$id;
                      $data['name']=$product->product_name;
                      $data['qty']=$request->qty;
                      $data['price']= $product->selling_price;          
              $data['weight']=1;
                      $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                     Cart::add($data);
                      $notification=array(
                           'messege'=>'Successfully Added',
                           'alert-type'=>'success'
                         );
                       return Redirect()->to('/')->with($notification);
         }else{
                       $data['id']=$id;
                      $data['name']=$product->product_name;
                      $data['qty']=$request->qty;
                      $data['price']= $product->discount_price;          
              $data['weight']=1;
                      $data['options']['image']=$product->image_one;
                        $data['options']['color']=$request->color;
                        $data['options']['size']=$request->size;
                      Cart::add($data);  
                      $notification=array(
                              'messege'=>'Successfully Added',
                             'alert-type'=>'success'
                         );
                       return Redirect()->to('/')->with($notification);
       }
    }


    public function pageView($id)
    {
         
      return view('pages.page_by_subcategory');
    }


    public function Electronic()
    {

    return view('pages.electronic');
    }

    public function blog()
    {

    return view('pages.blog');
    }

    public function contact()
    {

    return view('pages.contact');
    }
}
