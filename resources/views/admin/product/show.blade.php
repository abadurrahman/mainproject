@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

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
          <h3 class="mb-0">Show Product</h3>
          <a href="{{ route('all.product') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Product</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Name:</label>
                  <br>
                  {{ $product->product_name }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Title:</label>
                  <br>
                  {{ $product->title }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Code:</label>
                  <br>
                 {{ $product->product_code }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Quantity:</label>
                  <br>
                  {{ $product->product_quantity }}
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product size:</label>
                  <br>
                  {{ $product->product_size }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Color:</label>
                  <br>
                {{ $product->product_color }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Selling Prize:</label>
                  <br>
                 {{ $product->selling_price }}
                </div>
             </div>

              <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <br>
                 {{ $product->category_name }}
             </div>
            </div> 
              
             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Sub Category</label>
              <br>
              {{ $product->subcategory_name }}
             </div>
            </div> 

             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Brand</label>
              <br>
               {{ $product->brand_name }}
             </div>
            </div> 

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Discount Prize:</label>
                  <br>
                {{ $product->discount_price }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >video Link:</label>
                  <br>
                  {{ $product->video_link }}
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <br>
                  {!! $product->product_details !!}
             </div>
           </div>

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail One)</label>
                </br>
                <img src="{{ URL::to($product->image_one) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail Two)</label>
                </br>
                <img src="{{ URL::to($product->image_one_1) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                </br>
                <img src="{{ URL::to($product->image_two) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image There</label>
                </br>
                <img src="{{ URL::to($product->image_three) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Four</label>
                </br>
                <img src="{{ URL::to($product->image_four) }}" id="one" style="margin-top:25px; height:80px; width:70px;">            
              </div>
            </div>
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->newarrivals_one == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck1">New Arrivals One</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->newarrivals_two == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck2">New Arrivals Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->newarrivals_three == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck3">New Arrivals Three</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->newarrivals_four == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck4">New Arrivals Four</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->newarrivals_five == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck5">New Arrivals Five</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->latest_design == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck6">Latest Design</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->special_offer == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck8">Special Offer</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($product->collection == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck8">Collection</label>
               </div>
              </div>
          </div>
          </div> 
        </div>
    </div>
</div>

@endsection

