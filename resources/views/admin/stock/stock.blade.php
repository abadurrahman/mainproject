@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                    <h3 class="mb-0">Product</h3>
                    <a href="{{ route('add.product') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">Add-Product</a>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" style="width: 100%;" id="datatable-buttons">
                        <thead>
			                <tr>
			                  <th class="wd-15p">Product ID</th>
			                  <th class="wd-15p">Product Name</th>
			                  <th class="wd-15p">Image</th>
			                  <th class="wd-15p">Quantity</th>
			                  <th class="wd-15p">Status</th>
			                </tr>
			              </thead>
			              <tbody>
			                @foreach($product as $row)
			                <tr>
			                  <td>{{ $row->product_code }}</td>
			                  <td>{{ $row->product_name }}</td>
			                  <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
			                  <td>{{ $row->product_quantity }}</td>
			                  <td>
			                  	@if($row->status == 1)
			                  	 <span class="badge badge-success">Active</span>
			                  	@else
			                  	<span class="badge badge-danger">Inactive</span>
			                  	@endif
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
