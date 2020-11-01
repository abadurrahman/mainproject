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
                            <li class="breadcrumb-item active"><a href="#">List</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
<div class="row">
    <div class="col-xl-9 order-xl-2">
      <div class="card card-profile">
        <div class="card-body pt-0">
          <div class="row">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="mb-0">Orders List</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                              <th class="wd-15p">Payment Type</th>
                              <th class="wd-15p">Transection ID</th>
                              <th class="wd-15p">Subtotal</th>
                              <th class="wd-20p">Shipping</th>
                              <th class="wd-20p">Total</th>
                              <th class="wd-20p">Date</th>
                              <th class="wd-20p">Return</th>
                              <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                      <tbody>
                      @foreach($order as $row)
                       <tr>
                        <td>{{ $row->payment_type }}</td>
                        <td>{{ $row->blnc_transection }}</td>
                        <td>{{ $row->subtotal }} $</td>
                        <td>{{ $row->shipping }} $</td>
                        <td>{{ $row->total }} $</td>
                        <td>{{ $row->date }} </td>
                        <td>
                    @if($row->return_order == 1)
                     <span class="badge badge-warning">Pending</span>
                    @elseif($row->status == 2)
                    <span class="badge badge-success">Success</span>
                     @endif
              
                  <td>

                    <a href="{{ URL::to('admin/approve/return/'.$row->id) }}" class="btn btn-sm btn-info">Approve</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
