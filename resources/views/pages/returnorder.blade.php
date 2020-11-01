@extends('layouts.app')
@section('content')
@php 
  $order=DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp

    <div class="contact_form">
        <div class="" style="padding: 20px;">
            <div class="row" style="padding-top: 50px;">
               <div class="col-md-8 card">
                 <table class="table table-response">
                   <thead>
                     <tr>
                       <th scope="col">PaymentType</th>
                       <th scope="col">Return</th>
                       <th scope="col">Amount</th>
                       <th scope="col">Date</th>
                        <th scope="col">Status </th>
                        <th scope="col">Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($order as $row)
                     <tr>
                       <th >{{ $row->payment_type }}</th>
                       <td>
                           @if($row->return_order == 0)
                             <span class="badge badge-warning">No Request</span>
                            @elseif($row->return_order == 1)
                            <span class="badge badge-info">Pending</span>
                            @elseif($row->return_order == 2) 
                             <span class="badge badge-info">Success </span>
                            @endif
                       </td>
                       <td>{{ $row->total }} $</td>
                       <td>{{ $row->date }}</td>
                       <td>
                        @if($row->status == 0)
                         <span class="badge badge-warning">Pending</span>
                        @elseif($row->status == 1)
                        <span class="badge badge-info">Payment Accept</span>
                        @elseif($row->status == 2) 
                         <span class="badge badge-info">Progress </span>
                         @elseif($row->status == 3)  
                         <span class="badge badge-success">Delevered </span>
                         @else
                         <span class="badge badge-danger">Cancel </span>
                         @endif
                       </td>
                       <td>
                        @if($row->return_order == 0)
                         <a href="{{ url('/request/return/'.$row->id) }}" class="btn btn-sm btn-danger" id="return">Return</a>
                         @elseif($row->return_order == 1)
                            <span class="badge badge-info">Pending</span>
                     @elseif($row->return_order == 2) 
                             <span class="badge badge-info">Success </span>
                         @endif
                       </td>
                     </tr>
                    @endforeach
                   </tbody>
                 </table>
               </div>
                <div class="row">
               <div class="col-md-4">
                 <div class="card" style="width: 10rem;">
                  <img src="{{ asset('avatar.jpg') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%;" ></div>
                  <br>
                  <div class="card-body">
                    <h5 class="card-title text-center"></h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('password.change') }}"> Password Change </a></li>
                    <li class="list-group-item"><a href=""> Edit Profile </a></li>
                    <li class="list-group-item"><a href=" {{ route('success.orderlist') }}"> Return Order </a></li>
                  </ul>
                  <div class="card-body">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    <br>
                  </div>
                </div>
               </div>
             </div>
            </div>
        </div>
    </div>

@endsection
