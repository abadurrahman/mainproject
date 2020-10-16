@extends('layouts.admin')

@section('title', 'Seo Setting')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Seo Setting</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Seo Setting</a></li>
                            <li class="breadcrumb-item active"><a href="#">Update</a></li>
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
          <h3 class="mb-0">Update Web Setting</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
        <form method="POST" action="{{ route('update.seo') }}">
          @csrf
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Meta Title:</label>
                  <input type="text" class="form-control"  name="meta_title" value="{{ $seo->meta_title }}">
                </div>
             </div>
             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Meta Author:</label>
                  <input type="text" class="form-control" name="meta_author"value="{{ $seo->meta_author }}">
                </div>
             </div>

             <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" >Meta Tag:</label>
                  <input type="text" class="form-control" name="meta_tag"value="{{ $seo->meta_tag }}">
                </div>
             </div>
             
            
           <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Meta Description:</label>
                   <textarea class="form-control"  name="meta_description">
                   {{ $seo->meta_description }}
                   </textarea>
                </div>
             </div>
             <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Google Analytics:</label>
                 <textarea class="form-control"  name="google_analytics">
                     {{ $seo->google_analytics }}
                   </textarea>
                </div>
             </div>

             <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" >Bing Analytics:</label>
                 <textarea class="form-control"  name="bing_analytics">
                    {{ $seo->bing_analytics }}
                   </textarea>
                   <input type="hidden" name="id" value="{{ $seo->id }}">
                </div>
             </div>
         </div>
          <button class="btn btn-primary" style="margin-top:15px;" type="submit">Update Setting</button>
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
@endsection

