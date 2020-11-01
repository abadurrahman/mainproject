<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
  
  public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    public function Stock()
    {
        $product=DB::table('products')->get();
        return view('admin.stock.stock',compact('product'));

    }
}
