@extends('layouts.admin')

@section('title', 'Category')

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
                            <li class="breadcrumb-item active"><a href="#">Add</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="padding:25px;margin-top:-5.5rem">
  <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Add Brand</h3>
          <a href="{{ route('all.brand') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Brand</a>
        </div>
        <!-- Card body -->
       
        <div class="card-body">
        <form method="POST" action="{{ route('store.brand') }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Brand Name*</label>
                <input type="text" class="form-control" id="example3cols1Input" placeholder="Name" name="brand_name" required="">
              </div>
            </div> 
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Logo*</label>
                <input type="file" class="form-control" id="example3cols1Input" name="logo" required="">              
              </div>
            </div> 
            <div class="col-md-6 " style="">
              <div class="form-group">
                
                <div class="col-md-6">
                    <img src="" style="height:40px; width: 40px; margin:30px;" >
                  </div>
              </div>
            </div> 
          </div>
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Save Brand</button>
        </form>  
        </div>
    </div>
</div>
@endsection
