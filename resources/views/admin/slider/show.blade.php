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
          <h3 class="mb-0">Show Slider</h3>
          <a href="{{ route('all.slider')}}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Slider</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image One</label>
                </br>
                <img src="{{ URL::to($slider->image_one) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Two</label>
                </br>
                <img src="{{ URL::to($slider->image_two) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 

             <div class="col-md-4">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image Three</label>
               </br>
                <img src="{{ URL::to($slider->image_three) }}" id="one" style="margin-top:25px; height:80px; width:70px;">             
              </div>
            </div> 
         </div>

          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
              @if($slider->main_slider_one == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck1">Main Slider One</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
              @if($slider->main_slider_two == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck2">Main Slider Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($slider->mens_slider_one == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck3">Men's Slider one</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($slider->mens_slider_two == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck4">Men's Slider Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($slider->womens_slider_one == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck5">Women's Slider one</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($slider->womens_slider_two == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck6">Women's Slider Two</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($slider->electronics_slider == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck8">Electronics Slider</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               @if($slider->blog_slider == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck9">Blog Slider</label>
               </div>
              </div>
          </div>
           <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control">
               @if($slider->contact_slider == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck10">Contact Slider</label>
               </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control">
               @if($slider->fotter_slider == 1)
               <span class="badge badge-success">Active</span> |
               @else
              <span class="badge badge-danger">Inactive</span> |
              @endif
               <label for="customCheck10">Contact Slider</label>
               </div>
              </div>
          </div>
          </div> 
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

