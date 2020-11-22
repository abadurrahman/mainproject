@extends('layouts.admin')

@section('title', 'Category')

@section('content')
 
@php 
  $brand=DB::table('brands')->get();
  $category=DB::table('categories')->get();
  $subcategory=DB::table('subcategories')->get();
@endphp

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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
                            <li class="breadcrumb-item active"><a href="#">Edit</a></li>
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
          <h3 class="mb-0">Edit SubCategoryPage</h3>
          <a href="{{ route('all.subcategorypages') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-SubCategoryPage</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ url('update/subcategorypage/withoutphoto/'.$subcategorypage->id) }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Name:</label>
                  <input type="text" class="form-control" placeholder="name" name="product_name" value="{{ $subcategorypage->product_name }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Code:</label>
                  <input type="text" class="form-control" placeholder="code" name="product_code" value="{{ $subcategorypage->product_code }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Quantity:</label>
                  <input type="text" class="form-control" placeholder="quantity" name="product_quantity" value="{{ $subcategorypage->product_quantity }}">
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product size:</label>
                  <input type="text" class="form-control" placeholder="size" name="product_size" value="{{ $subcategorypage->product_size }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Color:</label>
                  <input type="text" class="form-control" placeholder="color" name="product_color" value="{{ $subcategorypage->product_color }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Selling Prize:</label>
                  <input type="text" class="form-control" placeholder="selling prize" name="selling_price" value="{{ $subcategorypage->selling_price }}">
                </div>
             </div>

              <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                <option label="Choose Category"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" <?php if ($row->id == $subcategorypage->category_id) {
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
                    <option value="{{ $row->id }}" <?php if ($row->id == $subcategorypage->subcategory_id) {
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
                    <option value="{{ $br->id }}" <?php if ($subcategorypage->brand_id == $br->id) {
                      echo "selected";
                    } ?> >{{ $br->brand_name }}</option>
                    @endforeach    
               </select>
             </div>
            </div> 

             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >Discount Prize:</label>
                  <input type="text" class="form-control" placeholder="discount prize" name="discount_price" value="{{ $subcategorypage->discount_price }}">
                </div>
             </div>

             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >video Link:</label>
                  <input type="text" class="form-control" placeholder="link" name="video_link" value="{{ $subcategorypage->video_link }}">
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <textarea id="summernote" name="product_details">{{ $subcategorypage->product_details}}</textarea>
             </div>
           </div>
         </div>

          <hr style="margin-top:25px;">
         <div class="row"> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="image_1" value="1" <?php if ($subcategorypage->image_1 == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck1">Image_1</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="image_2" value="1" <?php if ($subcategorypage->image_2 == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck2">Image_2</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck3" type="checkbox" name="product_1" value="1" <?php if ($subcategorypage->product_1 == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck3">Product_1</label>
               </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck4" type="checkbox" name="product_2" value="1" <?php if ($subcategorypage->product_2 == 1) {
                    echo "checked";
                  }?>>
               <label class="custom-control-label" for="customCheck4">Product_2</label>
               </div>
              </div>
          </div>
          </div> 
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Update</button>
        </form>  
        </div>
    </div>
</div>

<div style="padding:25px;margin-top:-1.5rem">
  <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">Add With Photo</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ url('update/subcategorypage/photo/'.$subcategorypage->id) }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            
             <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail One)</label>
                <input type="file" class="form-control" id="example3cols1Input" required="" name="image_one" onchange="readURL(this);" required="" accept="image"> 
                <img src="#" id="one" style="margin-top:25px;" > 
                <input type="hidden" name="old_one" value="{{ $subcategorypage->image_one }}"> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($subcategorypage->image_one) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div>  

             <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_two" onchange="readURL2(this);" accept="image"> 
                <img src="#" id="two" style="margin-top:25px;" > 
                <input type="hidden" name="old_two" value="{{ $subcategorypage->image_two }}">            
              </div>
            </div> 
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($subcategorypage->image_two) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image There</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_three" onchange="readURL3(this);"  accept="image"> 
                <img src="#" id="three" style="margin-top:25px;" >
                <input type="hidden" name="old_three" value="{{ $subcategorypage->image_three }}">             
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($subcategorypage->image_three) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
               </div>
            </div> 

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Four</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_four" onchange="readURL4(this);" accept="image"> 
                <img src="#" id="four" style="margin-top:25px;" > 
                <input type="hidden" name="old_four" value="{{ $subcategorypage->image_four }}">            
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img src="{{ URL::to($subcategorypage->image_four) }}" id="one" style="margin-top:25px; height: 70px;width: 60px;">        
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

