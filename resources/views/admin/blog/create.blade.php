@extends('layouts.admin')

@section('title', 'Category')

@section('content') 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Blog</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
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
          <h3 class="mb-0">Add Blog</h3>
          <a href="{{ route('all.blog') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Blog</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ route('store.blog') }}" enctype="multipart/form-data">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >Title</label>
                  <input type="text" class="form-control" placeholder="title" name="title" required="">
                </div>
             </div>
             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Date</label>
                  <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018" name="date" required="">
                </div>
             </div>  
            <div class="col-md-6 " style="">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Blog Category</label>
              <select class="form-control" id="exampleFormControlSelect1" name="blogcategory_id">
                @foreach($blogcategory as $row)
                      <option value="{{ $row->id }}">{{  $row->blogcategory_name }}</option>
                @endforeach    
               </select>
             </div>
            </div> 
            <div class="col-md-6 " style="">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Tags</label>
              <select class="form-control" id="exampleFormControlSelect1" name="tag_id">
                @foreach($tag as $row)
                      <option value="{{ $row->id }}">{{ $row->tag_name }}</option>
                @endforeach    
               </select>
             </div>
              <!--  -->
            </div>  
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Description</label>
                <textarea id="summernote" name="details"></textarea>

             </div>
           </div>
              <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="example3cols1Input">Image</label>
                <input type="file" class="form-control" id="example3cols1Input" required="" name="image_one" onchange="readURL(this);" required="" accept="image"> 
                <img src="#" id="one" style="margin-top:25px;" >             
              </div>
            </div> 

            
          </div>
          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck1" type="checkbox" name="main" value="1">
               <label class="custom-control-label" for="customCheck1">Main</label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <input class="custom-control-input" id="customCheck2" type="checkbox" name="latest" value="1">
               <label class="custom-control-label" for="customCheck2">Latest</label>
               </div>
              </div>
          </div>
          </div> 
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Save Blog</button>
        </form>  
        </div>
    </div>
</div>

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
@endsection
