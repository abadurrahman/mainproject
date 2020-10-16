@extends('layouts.admin')

@section('title', 'Brand')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Brand</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Brand</a></li>
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
    <div class="col-xl-3 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-12">
              <h3 class="mb-0">Add Brand</h3>
              <a href="{{ route('all.brand') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Brand</a>
            </div>
          </div>
        </div>
        <div class="card-body">
             @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
           <form method="post" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
              @csrf
               <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Brand Name*</label>
                <input type="text" class="form-control" id="example3cols1Input" placeholder="Name" name="brand_name" required="" value="{{ $brand->brand_name }}">
              </div>
            </div> 
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Logo*</label>
                <input type="file" class="form-control" id="example3cols1Input" name="logo">              
              </div>
            </div> 
            <div class="col-md-6 " style="">
              <div class="form-group">
                
                <div class="col-md-6">
                     <img src="{{ URL::to($brand->logo) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $brand->logo }}">
                  </div>
              </div>
            </div> 
          </div>
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Save Brand</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
