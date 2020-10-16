@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">SubCategoryPage</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">SubCategoryPage</a></li>
                            <li class="breadcrumb-item active"><a href="#">Show</a></li>
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
          <h3 class="mb-0">Show SubCategoryPage</h3>
          <a href="{{ route('all.subcategorypages') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-SubCategoryPage</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Name:</label>
                  <br>
                  {{ $subcategorypage->product_name }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Code:</label>
                  <br>
                 {{ $subcategorypage->product_code }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Quantity:</label>
                  <br>
                  {{ $subcategorypage->product_quantity }}
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product size:</label>
                  <br>
                  {{ $subcategorypage->product_size }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Color:</label>
                  <br>
                {{ $subcategorypage->product_color }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Selling Prize:</label>
                  <br>
                 {{ $subcategorypage->selling_price }}
                </div>
             </div>

              <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <br>
                 {{ $subcategorypage->category_name }}
             </div>
            </div> 

             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Brand</label>
              <br>
               {{ $subcategorypage->brand_name }}
             </div>
            </div> 

             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >Discount Prize:</label>
                  <br>
                {{ $subcategorypage->discount_price }}
                </div>
             </div>

             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >video Link:</label>
                  <br>
                  {{ $subcategorypage->video_link }}
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <br>
                  {!! $subcategorypage->product_details !!}
             </div>
           </div>

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail One)</label>
                </br>
                <img src="{{ URL::to($subcategorypage->image_one) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                </br>
                <img src="{{ URL::to($subcategorypage->image_two) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image There</label>
                </br>
                <img src="{{ URL::to($subcategorypage->image_three) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Four</label>
                </br>
                <img src="{{ URL::to($subcategorypage->image_four) }}" id="one" style="margin-top:25px; height:80px; width:70px;">            
              </div>
            </div>
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($subcategorypage->image_1 == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck1">Image_1</label>
               </div>
              </div>
          </div> 
           <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($subcategorypage->image_2 == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck1">Image_2</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($subcategorypage->product_1 == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck2">Product_1</label>
               </div>
              </div>
          </div> 

          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($subcategorypage->product_2 == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck8">Product_2</label>
               </div>
              </div>
          </div>
          </div> 
        </div>
    </div>
</div>

@endsection

