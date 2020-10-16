@extends('layouts.admin')

@section('title', 'CategoryPage')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">CategoryPage</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">CategoryPage</a></li>
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
          <h3 class="mb-0">Show CategoryPage</h3>
          <a href="{{ route('all.categorypages') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-SubCategoryPage</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Name:</label>
                  <br>
                  {{ $categorypage->product_name }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Code:</label>
                  <br>
                 {{ $categorypage->product_code }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Quantity:</label>
                  <br>
                  {{ $categorypage->product_quantity }}
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product size:</label>
                  <br>
                  {{ $categorypage->product_size }}
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Color:</label>
                  <br>
                {{ $categorypage->product_color }}
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Selling Prize:</label>
                  <br>
                 {{ $categorypage->selling_price }}
                </div>
             </div>

              <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <br>
                 {{ $categorypage->category_name }}
             </div>
            </div> 

             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Brand</label>
              <br>
               {{ $categorypage->brand_name }}
             </div>
            </div> 

             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >Discount Prize:</label>
                  <br>
                {{ $categorypage->discount_price }}
                </div>
             </div>

             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >video Link:</label>
                  <br>
                  {{ $categorypage->video_link }}
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <br>
                  {!! $categorypage->product_details !!}
             </div>
           </div>

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail One)</label>
                </br>
                <img src="{{ URL::to($categorypage->image_one) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                </br>
                <img src="{{ URL::to($categorypage->image_two) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image There</label>
                </br>
                <img src="{{ URL::to($categorypage->image_three) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Four</label>
                </br>
                <img src="{{ URL::to($categorypage->image_four) }}" id="one" style="margin-top:25px; height:80px; width:70px;">            
              </div>
            </div>
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($categorypage->image_1 == 1)
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
               @if($categorypage->image_2 == 1)
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
               @if($categorypage->product_1 == 1)
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
               @if($categorypage->product_2 == 1)
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

