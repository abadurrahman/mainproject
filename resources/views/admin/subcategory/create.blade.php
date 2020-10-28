@extends('layouts.admin')

@section('title', 'Category')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Sub Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
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
              <h3 class="mb-0">Add SubCategory</h3>
              <a href="{{ route('all.subcategory') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-SubCategory</a>
            </div>
          </div>
        </div>
        <div class="card-body">
       <form action="{{ route('store.subcategory') }}" method="POST">
            @csrf
            <div class="pl-lg-4">
              <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">SubCategory Name*</label>
                <input type="text" class="form-control" id="example3cols1Input" placeholder="Name" name="subcategory_name">
              </div>
            </div>  

            <div class="col-md-6 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <select class="form-control" id="exampleFormControlSelect1" required="" name="category_id">
                <option label="Choose Category"></option>
                @foreach($category as $row)
                      <option value="{{ $row->id }}">{{  $row->category_name }}</option>
                @endforeach    
               </select>
             </div>
            </div>  

            <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="subcat_1" value="1">
               <label class="custom-control-label" for="customCheck1">Subcat-1</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="subcat_2" value="1">
               <label class="custom-control-label" for="customCheck2">Subcat-2</label>
               </div>
              </div>
          </div> 
              <button class="btn btn-primary" type="submit">Save Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
