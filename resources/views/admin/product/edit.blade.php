@extends('layouts.admin')

@section('title', 'Category')

@section('content')

@php 
  $brand=DB::table('brands')->get();
  $category=DB::table('categories')->get();
  $subcategory=DB::table('subcategories')->get();
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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
          <h3 class="mb-0">Add Product</h3>
          <a href="{{ route('all.product') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Product</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ url('update/product/withoutphoto/'.$product->id) }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Name:</label>
                  <input type="text" class="form-control" placeholder="name" name="product_name" value="{{ $product->product_name }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Title:</label>
                  <input type="text" class="form-control" placeholder="title" name="title" value="{{ $product->title }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Code:</label>
                  <input type="text" class="form-control" placeholder="code" name="product_code" value="{{ $product->product_code }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Quantity:</label>
                  <input type="text" class="form-control" placeholder="quantity" name="product_quantity" value="{{ $product->product_quantity }}">
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product size:</label>
                  <input type="text" class="form-control"  data-role="tagsinput" name="product_size" value="{{ $product->product_size }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Color:</label>
                  <input type="text" class="form-control" data-role="tagsinput" name="product_color" value="{{ $product->product_color }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Selling Prize:</label>
                  <input type="text" class="form-control" placeholder="selling prize" name="selling_price" value="{{ $product->selling_price }}">
                </div>
             </div>

              <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $product->category_id) {
                      echo "selected";
                    } ?> >{{ $row->category_name }}</option>
                    @endforeach    
               </select>
             </div>
            </div> 

             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Sub Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="subcategory_id">
                 @foreach($subcategory as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $product->subcategory_id) {
                      echo "selected";
                    } ?> >{{ $row->subcategory_name }}</option>
                    @endforeach
               </select>
             </div>
            </div> 

             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Brand</label>
              <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                <option label="Choose Brand"></option>
                    @foreach($brand as $br)
                    <option value="{{ $br->id }}" <?php if ($product->brand_id == $br->id) {
                      echo "selected";
                    } ?> >{{ $br->brand_name }}</option>
                    @endforeach    
               </select>
             </div>
            </div> 

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Discount Prize:</label>
                  <input type="text" class="form-control" placeholder="discount prize" name="discount_price" value="{{ $product->discount_price }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >video Link:</label>
                  <input type="text" class="form-control" placeholder="link" name="video_link" value="{{ $product->video_link }}">
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <textarea id="summernote" name="product_details">{{ $product->product_details}}</textarea>
             </div>
           </div>
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="newarrivals_one" value="1" <?php if ($product->newarrivals_one == 1) {
              echo "checked";
            }?> >
               <label class="custom-control-label" for="customCheck1">New Arrivals One</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="newarrivals_two" value="1" <?php if ($product->newarrivals_two == 1) {
              echo "checked";
            }?>>
               <label class="custom-control-label" for="customCheck2">New Arrivals Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck3" type="checkbox" name="newarrivals_three" value="1" <?php if ($product->newarrivals_three == 1) {
              echo "checked";
            }?>>
        
               <label class="custom-control-label" for="customCheck3">New Arrivals Three</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck4" type="checkbox" name="newarrivals_four" value="1" <?php if ($product->newarrivals_four == 1) {
              echo "checked";
            }?>>
               <label class="custom-control-label" for="customCheck4">New Arrivals Four</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck5" type="checkbox" name="newarrivals_five" value="1" <?php if ($product->newarrivals_five == 1) {
              echo "checked";
            }?>>
               <label class="custom-control-label" for="customCheck5">New Arrivals Five</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck6" type="checkbox" name="latest_design" value="1" <?php if ($product->latest_design == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck6">Latest Design</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck8" type="checkbox" name="special_offer" value="1" <?php if ($product->special_offer == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck8">Special Offer</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck8" type="checkbox" name="collection" value="1" <?php if ($product->collection == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck8">Collection</label>
               </div>
              </div>
          </div>
          </div> 
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Update Product</button>
        </form>  
        </div>
    </div>
</div>

<div style="padding:25px;margin-top:-1.5rem">
  <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Add Product With Photo</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ url('update/product/photo/'.$product->id) }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            
             <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail One)</label>
                <input type="file" class="form-control" id="example3cols1Input" required="" name="image_one" onchange="readURL(this);" required="" accept="image"> 
                <img src="#" id="one" style="margin-top:25px;" > 
                <input type="hidden" name="old_one" value="{{ $product->image_one }}"> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($product->image_one) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div> 

             <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail Two)</label>
                <input type="file" class="form-control" id="example3cols1Input" required="" name="image_one_1" onchange="readURL1(this);" required="" accept="image"> 
                <img src="#" id="one_1" style="margin-top:25px;" >
                <input type="hidden" name="old_one_1" value="{{ $product->image_one_1 }}">              
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($product->image_one_1) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div>  

             <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_two" onchange="readURL2(this);" accept="image"> 
                <img src="#" id="two" style="margin-top:25px;" > 
                <input type="hidden" name="old_two" value="{{ $product->image_two }}">            
              </div>
            </div> 
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($product->image_two) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image There</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_three" onchange="readURL3(this);"  accept="image"> 
                <img src="#" id="three" style="margin-top:25px;" >
                <input type="hidden" name="old_three" value="{{ $product->image_three }}">             
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($product->image_three) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Four</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_four" onchange="readURL4(this);" accept="image"> 
                <img src="#" id="four" style="margin-top:25px;" > 
                <input type="hidden" name="old_four" value="{{ $product->image_four }}">            
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($product->image_four) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div> 
         </div>
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Update</button>
        </form>  
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script type="text/javascript">
    $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                           $.each(data, function(key, value){

                               $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                           });
  
                     },
                    
                 });
             } else {
                 alert('danger');
             }

         });
     });

</script>

<script>
      $('#summernote').summernote({
        placeholder: 'Text Here.....',
        tabsize: 2,
        height: 150
      });
    </script>

<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one_1')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
  function readURL4(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#four')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection

