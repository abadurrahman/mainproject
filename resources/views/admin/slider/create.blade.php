@extends('layouts.admin')

@section('title', 'Slider')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Slider</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Slider</a></li>
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
          <h3 class="mb-0">Add Slider</h3>
          <a href="{{ route('all.slider')}}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Slider</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ route('store.slider') }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One</label>
                <input type="file" class="form-control" id="example3cols1Input" required="" name="image_one" onchange="readURL1(this);" required="" accept="image"> 
                <img src="#" id="one" style="margin-top:25px;" >             
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_two" onchange="readURL2(this);" accept="image" required=""> 
                <img src="#" id="two" style="margin-top:25px;" >             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Three</label>
                <input type="file" class="form-control" id="example3cols1Input" name="image_three" onchange="readURL3(this);" accept="image" required=""> 
                <img src="#" id="three" style="margin-top:25px;" >             
              </div>
            </div> 
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="main_slider_one" value="1">
               <label class="custom-control-label" for="customCheck1">Main Slider One</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="main_slider_two" value="1">
               <label class="custom-control-label" for="customCheck2">Main Slider Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck3" type="checkbox" name="mens_slider_one" value="1">
               <label class="custom-control-label" for="customCheck3">Men's Slider one</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck4" type="checkbox" name="mens_slider_two" value="1">
               <label class="custom-control-label" for="customCheck4">Men's Slider Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck5" type="checkbox" name="womens_slider_one" value="1">
               <label class="custom-control-label" for="customCheck5">Women's Slider one</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck6" type="checkbox" name="womens_slider_two" value="1">
               <label class="custom-control-label" for="customCheck6">Women's Slider Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck8" type="checkbox" name="electronics_slider" value="1">
               <label class="custom-control-label" for="customCheck8">Electronics Slider</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck9" type="checkbox" name="blog_slider" value="1">
               <label class="custom-control-label" for="customCheck9">Blog Slider</label>
               </div>
              </div>
          </div>
           <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck10" type="checkbox" name="contact_slider" value="1">
               <label class="custom-control-label" for="customCheck10">Contact Slider</label>
               </div>
              </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck11" type="checkbox" name="fotter_slider" value="1">
               <label class="custom-control-label" for="customCheck11">Fotter Slider</label>
               </div>
              </div>
          </div>
          </div> 
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Save Slider</button>
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
  function readURL1(input) {
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
@endsection

