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
                            <li class="breadcrumb-item active"><a href="#">View</a></li>
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
          <h3 class="mb-0">View Blog</h3>
          <a href="{{ route('all.blog') }}" style="margin-top:-25px; " class="btn btn-sm btn-primary float-right">All-Blog</a>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >Title:</label>
                <br>
                  {{ $blog->title }}
                </div>
             </div>
             <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">Date:</label>
                  <br>
                  {{ $blog->date }}
                </div>
             </div>  
            <div class="col-md-6 " style="">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Blog Category:</label>
              <br>
                {{ $blog->blogcategory_name }}  
             </div>
              <!--  -->
            </div> 

            <div class="col-md-6 " style="">
               <div class="form-group">
              <label class="form-control-label" for="example3cols1Input">Tags:</label>
              <br>
                {{ $blog->tag_name }} 
             </div>
              <!--  -->
            </div> 
             
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" >Description:</label>
                <br>
                  {!! $blog->details !!}
             </div>
           </div>
        
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" >Image:</label><br>
                <img src="{{ URL::to($blog->image_one) }}" id="one" style="margin-top:5px; height: 70px;width: 60px;">        
               </div>
            </div>
          </div>
          <hr style="margin-top:25px;">
         <div class="row">
          <div class="col-md-4" >
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
              
          <label class="custom-control-label">
            @if($blog->main == 1)
            <span class="badge badge-success">Active</span> |
          @else
          <span class="badge badge-danger">Inactive</span> |
          @endif
            <span>Main:</span>
          </label>
               </div>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="form-group">
                <div class="custom-control custom-checkbox mb-3">
               <label class="custom-control-label">
            @if($blog->latest == 1)
            <span class="badge badge-success">Active</span> |
          @else
          <span class="badge badge-danger">Inactive</span> |
          @endif
            <span>Latest:</span>
          </label>
               </div>
              </div>
          </div>
          </div> 
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
@endsection
