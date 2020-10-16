<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
