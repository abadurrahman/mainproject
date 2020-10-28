@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Orders</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Orders</a></li>
                            <li class="breadcrumb-item active"><a href="#">Details</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> 


    <div class="sl-mainpanel">
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
         
         <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header"><strong>Order</strong> Details</div>

                  <div class="card-body">
                <table class="table">
                   <tr>
                    <th>Name: </th>
                    <th>{{ $order->name }}</th>
                   </tr>
                   <tr>
                    <th>Phone: </th>
                    <th>{{ $order->phone }}</th>
                   </tr>
                   <tr>
                    <th>Payment: </th>
                    <th>{{ $order->payment_type }}</th>
                   </tr>
                   <tr>
                    <th>Payment ID: </th>
                    <th>{{ $order->payment_id }}</th>
                   </tr>
                   <tr>
                    <th>Total :</th>
                    <th>{{ $order->total }} $</th>
                   </tr>
                    <tr>
                    <th>Month : </th>
                    <th>
                        {{ $order->month }}
                    </th>
                   </tr>
                    <tr>
                    <th>Date: </th>
                    <th>{{ $order->date }}</th>
                   </tr>
                </table>  

                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header"><strong>Shipping</strong> Details</div>

                  <div class="card-body">
                <table class="table">
                   <tr>
                    <th>Name: </th>
                    <th>{{ $shipping->ship_name }}</th>
                   </tr>
                   <tr>
                    <th>Phone: </th>
                    <th>{{ $shipping->ship_phone }}</th>
                   </tr>
                   <tr>
                    <th>Email: </th>
                    <th>{{ $shipping->ship_email }}</th>
                   </tr>
                   <tr>
                    <th>Address: </th>
                    <th>{{ $shipping->ship_address }}</th>
                   </tr>
                   <tr>
                    <th>City :</th>
                    <th>{{ $shipping->ship_city }}</th>
                   </tr>
                    <tr>
                    <th>Status : </th>
                    <th>
                          @if($order->status == 0)
                           <span class="badge badge-warning">Pending</span>
                          @elseif($order->status == 1)
                          <span class="badge badge-info">Payment Accept</span>
                          @elseif($order->status == 2) 
                           <span class="badge badge-info">Progress </span>
                           @elseif($order->status == 3)  
                           <span class="badge badge-success">Delevered </span>
                           @else
                           <span class="badge badge-danger">Cancel </span>
                           @endif
                    </th>
                   </tr>
                    
                </table>  

                  </div>
              </div>
          </div>
         </div>
          
         <div class="row">
          <div class="card pd-20 pd-sm-40 col-lg-12">
            <h3 class="card-body-title text-center" style="padding-top: 20px;">Product Details </h3>
            <br>
            <div class="table-wrapper">
              <table  class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Product ID</th>
                    <th class="wd-15p">Product Name</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Color </th>
                    <th class="wd-15p">Size</th>
                    <th class="wd-15p">Quantity</th>
                    <th class="wd-15p">Unit Price</th>
                    <th class="wd-20p">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($details as $row)
                  <tr>
                    <td>{{ $row->product_code }}</td>
                    <td>{{ $row->product_name }}</td>
                    <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
                    <td>{{ $row->color }}</td>
                    <td>{{ $row->size }}</td>
                    <td>{{ $row->quantity }}</td>
                    <td>
                      {{ $row->singleprice }} $
                      
                    </td>
                    <td>
                    {{ $row->totalprice }} $
                      
                    </td>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
         </div>
        

          @if($order->status == 0)
              <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info">Payment Accept</a>
              <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger" id="delete">Cancel Order</a>
          @elseif($order->status == 1)
              <a href="{{ url('admin/delevery/progress/'.$order->id) }}" class="btn btn-info">Delevery Progress</a>
              <strong class="text-center"   style="padding-top: 20px; padding-bottom: 10px;"> Payment Already Checked and pass here for delevery request</strong>
          @elseif($order->status == 2)
               <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success">Delevered Done</a>
               <strong class="text-center"  style="padding-top: 20px; padding-bottom: 10px;"> Payment Already done your product are handover successfully</strong>
          @elseif($order->status == 4)
            <strong class="text-danger text-center"   style="padding-top: 20px; padding-bottom: 10px;">This order are not valid its canceled</strong>
            @else
             <strong class="text-success text-center" style="padding-top: 20px; padding-bottom: 10px;">This product are succesfully delevered</strong>
            @endif
                 
      </div>
    </div>
@endsection
