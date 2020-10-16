@extends('layouts.admin')

@section('title', 'CategoryPage')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Category Page</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Category Page</a></li>
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
          <h3 class="mb-0">Add Category Page</h3>
          <a href="{{ route('all.categorypages') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Category Page</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ route('store.categorypages') }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Title (only single image part):</label>
                  <input type="text" class="form-control" placeholder="title" name="title" required="">
                </div>
             </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Name:</label>
                  <input type="text" class="form-control" placeholder="name" name="product_name" required="">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Code:</label>
                  <input type="text" class="form-control" placeholder="code" name="product_code">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Quantity:</label>
                  <input type="text" class="form-control" placeholder="quantity" name="product_quantity">
                </div>
             </div>
             
            
           <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product size:</label>
                  <input type="text" class="form-control" placeholder="size" name="product_size">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Product Color:</label>
                  <input type="text" class="form-control" placeholder="color" name="product_color">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Selling Prize:</label>
                  <input type="text" class="form-control" placeholder="selling prize" name="selling_price" required="">
                </div>
             </div>

              <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                <option label="Choose Category"></option>
                @foreach($category as $row)
                      <option value="{{ $row->id }}">{{  $row->category_name }}</option>
                @endforeach    
               </select>
             </div>
            </div> 

             <div class="col-md-4 ">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Brand</label>
              <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                <option label="Choose Brand"></option>
                @foreach($brand as $row)
                      <option value="{{ $row->id }}">{{  $row->brand_name }}</option>
                @endforeach    
               </select>
             </div>
            </div> 

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Discount Prize:</label>
                  <input type="text" class="form-control" placeholder="discount prize" name="discount_price" >
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >video Link:</label>
                  <input type="text" class="form-control" placeholder="link" name="video_link">
                </div>
             </div>

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <textarea id="summernote" name="product_details"></textarea>
             </div>
           </div>

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One(Main Thumbnail One)</label>
                <input type="file" class="form-control" id="example3cols1Input" required="" name="image_one" onchange="readURL(this);" required="" accept="image"> 
                <img src="#" id="one" style="margin-top:25px;" >             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_two" onchange="readURL2(this);" required="" accept="image"> 
                <img src="#" id="two" style="margin-top:25px;" >             
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image There</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_three" onchange="readURL3(this);" required="" accept="image"> 
                <img src="#" id="three" style="margin-top:25px;" >             
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Four</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_four" onchange="readURL4(this);" required="" accept="image"> 
                <img src="#" id="four" style="margin-top:25px;" >             
              </div>
            </div>
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="image_1" value="1">
               <label class="custom-control-label" for="customCheck1">Image 1</label>
               </div>
              </div>
          </div> 
 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="image_2" value="1">
               <label class="custom-control-label" for="customCheck2">Image 2</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck3" type="checkbox" name="product_1" value="1">
               <label class="custom-control-label" for="customCheck3">Product 1</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck4" type="checkbox" name="product_2" value="1">
               <label class="custom-control-label" for="customCheck4">Product 2</label>
               </div>
              </div>
          </div>
          </div> 
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Save Blog</button>
        </form>  
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
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

