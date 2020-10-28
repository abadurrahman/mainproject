<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Coupon;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $coupon=DB::table('coupons')->orderBy('id','DESC')->get();
        return view('admin.coupon.index',compact('coupon'));
    }


     public function create()
    {
      
        return view('admin.coupon.create');
    }


    public function storecoupon(Request $request)
    {
        $validatedData = $request->validate([
        'coupon' => 'required|unique:coupons|max:55',
        ]);

        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        $coupon = new Coupon();
        $coupon->coupon =$request->coupon;
        $coupon->discount =$request->discount;
        $coupon->save();
        $notification=array(
                 'messege'=>'Coupon Insert Done',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }
    
     public function DeleteCoupon($id)
    {
         DB::table('coupons')->where('id',$id)->delete();
         $notification=array(
                 'messege'=>'Coupon Successfully Deleted',
                 'alert-type'=>'success'
                       );
            return Redirect()->back()->with($notification);
    }

    public function EditCoupon($id)
    {
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function UpdateCoupon(Request $request,$id)
    {
        $validatedData = $request->validate([
        'coupon' => 'required|max:55',
        'discount' => 'required|max:55',
        ]);
         $data=array();
         $data['coupon']=$request->coupon;
         $data['discount']=$request->discount;
         $update= DB::table('coupons')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                 'messege'=>'Coupon Successfully Updated',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.coupon')->with($notification);
        }else{
            $notification=array(
                 'messege'=>'Nothing to update',
                 'alert-type'=>'success'
                       );
            return Redirect()->route('all.coupon')->with($notification);
        }
    }
}
